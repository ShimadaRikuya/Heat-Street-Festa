<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use Illuminate\Support\Facades\Auth; //Auth::id()でログイン中のユーザIDを取得するのに必要
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Event;
use App\Models\Team;
use App\Models\Category;
use App\Models\Like;

use Intervention\Image\Facades\Image; // Imageファサードを使う

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 公開設定データ・新しい順に表示
        $events = Event::PublicNew();
        return view('events.index', compact('events'));
    }

    public function getSelect()
    {
        //ログイン中のユーザーを取得
        $user_id = Auth::id();

        // ユーザーは1つのチームに所属。
        $teams = User::find($user_id)->team;

        return view('teams.select',[
            'teams' => $teams,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 新規登録（入力）
     * 
     */
    public function create(Request $request)
    {
        //チーム情報の取得
        $team = Team::find($request->team);
        $categories = Category::all();

        return view('events.create', compact('categories', 'team'));
    }

    /**
     * Undocumented function
     *
     * @return void
     * 
     * 新規登録（確認）
     * 
     */
    public function confirm(EventRequest $request)
    {
        // 入力内容の取得(画像以外)
        $event = $request->except('image_uploader', 'team_name', 'team_email', 'team_phone');
        $teams = Team::where('id', $request->team_id)->first();
        $hold = $request->event_start == now();

        // 選択カテゴリー取得
        $categories = Category::where('id', $request->category_id)->first();

        if($request->file('image_uploader')->isValid([])) {
            // saveEventPicture()で投稿画像のファイル名をDBに保存
            $fileName = $this->saveEventPicturePro($request->file('image_uploader')); // return file name
        }

        return view('events.confirm', 
        [
        'fileName' => $fileName,
        'categories' => $categories,
        'teams' => $teams,
        'hold' => $hold
        ])
        ->with($event);
    }

    public function getConfirm() 
    {
        return view('events.confirm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     * 新規登録（登録）
     * 
     */
    public function store(Request $request)
    {
        //ログイン中のユーザーを取得
        $user = Auth::user();
        // チーム取得
        $team = Team::find($request->team_id);

        try {
            // トランザクション開始
            DB::beginTransaction();
            // 登録対象のレコードの登録処理を実行
            $event = Event::create($request->all());
            // 処理に成功したらコミット
            DB::commit();
        } catch (\Throwable $e) {
            // 処理に失敗したらロールバック
            DB::rollback();
            // エラーログ
            \Log::error($e);
            // 登録処理失敗時にリダイレクト
            return redirect()
                ->route('teams.select')
                ->with('msg_danger', 'イベントの作成に失敗しました。');

        }
            return redirect()
                ->route('events.show', $event)
                ->with('msg_success', 'イベントを作成しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $event = Event::find($id);
        // カテゴリー一覧を取得
        $categories = Category::all();
        return view('events.edit', compact('categories', 'event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, $id)
    {
        $user_id = Auth::id();
        $event = Event::find($id);

        if ($request->file('image_uploader')->isValid([])) {
            // 画像ファイルインスタンス取得
            $filedel = $event->image_uploader;
            // 現在の画像ファイルの削除
            Storage::disk('s3')->delete('events/'.$filedel);
            // saveEventPicture()で投稿画像のファイル名をDBに保存
            $fileName = $this->saveEventPicturePro($request->file('image_uploader')); // return file name
            $event->image_uploader = $fileName;
        }

        // updateは更新する情報がなくても更新が走る（updated_atが更新される）
        $event->update([
            'user_id'                   =>$request->user_id,
            'team_id'                   =>$request->team_id,
            'category_id'               =>$request->category_id,
            'title'                     =>$request->title, 
            'discription'               =>$request->discription, 
            'event_start'               =>$request->event_start, 
            'event_end'                 =>$request->event_end, 
            'event_time_discription'    =>$request->event_time_discription,
            'fee'                       =>$request->fee,
            'official_url'              =>$request->official_url,
            'venue'                     =>$request->venue,
            'zip'                       =>$request->zip,
            'address1'                  =>$request->address1,
            'address2'                  =>$request->address2,
            'form_public'               =>$request->form_public,
            'image_uploader'            =>$event->image_uploader
        ]);

        if ($event) {
            return redirect()
                ->route('user.show', $user_id)
                ->with('msg_success', 'イベント記事の更新に成功しました。');
        } else {
            // 登録処理失敗時にリダイレクト
            return redirect()
                ->route('events.edit', $event)
                ->with('msg_danger', 'イベント記事の更新に失敗しました。');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_id = Auth::id();
        // 削除レコード取得
        $deleteEvent = Event::find($id);
        // 画像ファイルインスタンス取得
        $filedel = $deleteEvent->image_uploader;
        // 現在の画像ファイルの削除
        Storage::disk('s3')->delete('events/'.$filedel);
        // レコードの削除
        $deleteEvent->delete();

        return redirect()
            ->route('user.show', $user_id)
            ->with('msg_success', '削除に成功しました。');
    }

    /**
     * Display a listing of the search.
     * 
     * 検索機能
     *
     * @return \Illuminate\Http\Response
    */
    public function keyword(Request $request)
    {
        // クエリビルダ
        $query = Event::query();

        //$request->input()で検索時に入力した項目を取得します。
        $search = $request->input('search');

        // もし検索フォームにキーワードが入力されたら
        if ($search) {
            // 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($search, 's');

            // 単語を半角スペースで区切り、配列にする（例："山田 翔" → ["山田", "翔"]）
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);


            // 単語をループで回し、ユーザーネームと部分一致するものがあれば、$queryとして保持される
            foreach($wordArraySearched as $value) {
                $query->where('title', 'like', '%'.$value.'%');
            }
        } else {
            return redirect('')->with('msg_danger', 'キーワードを取得できませんでした');
        }

        $events = $query->paginate(24);

        return view('events.keyword', compact('events', 'search'));
    }


    /**
     * Display a listing of the search.
     *
     * @return \Illuminate\Http\Response
     * 
     * カテゴリー別イベント
     * 
     */
    public function search(Event $event, $category_id, $category)
    {
        $events = Event::where('category_id', $category_id)->paginate(24);
        return view('events.index', compact('events', 'category'));
    }

    private function saveEventPicturePro(UploadedFile $file): string {
        //makeTempPath()で一次保存用のファイルを生成
        $tempPath = $this->makeTempPath();
        //Intervention Imageを使用して、画像をリサイズ後、一時ファイルに保管
        Image::make($file)->fit(1080, 700)->save($tempPath);
        
        //Storageファサードを使用して画像ファイルをディスク（s3を選択）にeventsフォルダに保存
        $filePath = Storage::disk('s3')
                    ->putFile('events', new File($tempPath), 'public');
        return basename($filePath);
    }

    //一時ファイル生成して保存パスを生成。
    private function makeTempPath(): string
    {
        //tmpに一時ファイルが生成され、そのファイルポインタを取得
        $tmp_fp = tmpfile();

        //ファイルのメタ情報を取得
        $meta   = stream_get_meta_data($tmp_fp);

        //メタ情報からURI(ファイルのパス)を取得
        return $meta["uri"];
    }
}
