<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //Auth::id()でログイン中のユーザIDを取得するのに必要
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use App\Models\Event;
use App\Models\Team;
use App\Models\Category;

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
        $events = Event::publicList();
        return view('events.index', compact('events'));
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
        $teams = Team::where('id', $request->team_id)->first();
        $categories = Category::all();

        // ddd($categories);
        return view('events.create', compact('categories', 'teams'));
    }

    /**
     * Undocumented function
     *
     * @return void
     * 
     * 新規登録（確認）
     * 
     */
    public function confirm(Request $request)
    {
        // 入力内容の取得(画像以外)
        $event = $request->except('image_uploader', 'team_name', 'team_email', 'team_phone');
        $teams = Team::where('id', $request->team_id)->first();

        // 選択カテゴリー取得
        $categories = Category::where('id', $request->category_id)->first();
        // ddd($categories);

        // 画像
        $image = $request->file('image_uploader');
        if($request->hasFile('image_uploader') && $image->isValid()) {
            // アップロードされたファイル名を取得
            $filename = $image->getClientOriginalName();
            // 取得したファイル名で保存
            $image->storeAs('public/event_images', $filename);
        } else {
            
        }
        $img_path = 'storage/event_images/'.$filename;

        return view('events.confirm', compact('img_path', 'categories', 'teams'))->with($event);
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
        try {
            // トランザクション開始
            DB::beginTransaction();
            // 登録対象のレコードの登録処理を実行
            $event = Event::create($request->all());
            // 加工する画像のパスを取得
            $image_uploader = Image::make($request->image_uploader);
            // 指定する画像をリサイズする
            $image_uploader->resize(1080, null, function ($constraint) {$constraint->aspectRatio();})->save();
            // 処理に成功したらコミット
            DB::commit();
        } catch (\Throwable $e) {
            // 処理に失敗したらロールバック
            DB::rollback();
            // エラーログ
            \Log::error($e);
            // 登録処理失敗時にリダイレクト
            return redirect()
                ->route('events.create')
                ->with('flash_message', 'イベントの作成に失敗しました。');

        }
            return redirect()
                ->route('events.show', $event)
                ->with('flash_message', 'イベントを作成しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $events = Event::find($id);
        // ddd($events);
        return view('events.show', compact('events'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $categories = Category::all();
        
        $event = Event::find($id);
        // ddd($event);
        return view('events.edit', compact('categories', 'event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $form = $request->all();

        if (isset($form['image_uploader'])) {
            // 画像ファイルインスタンス取得
            $filedel = $event->image_uploader;
            // 現在の画像ファイルの削除
            Storage::disk('public')->delete($filedel);
            
            if ($form['image_uploader']) {
                $image = $request->file('image_uploader');
                // アップロードされたファイル名を取得
                $filename = $image->getClientOriginalName();
                $form['image_uploader'] = 'storage/event_images/'. $filename;
                // 取得したファイル名で保存
                $request->image_uploader->storeAs('public/event_images', $filename);
            }
        }

        //データ更新処理
        // updateは更新する情報がなくても更新が走る（updated_atが更新される）
        $event->update($form);

        if ($event) {
            return redirect()
                ->route('events.show', $event)
                ->with('flash_message', 'イベント記事の更新に成功しました。');
        } else {
            // 登録処理失敗時にリダイレクト
            return redirect()
                ->route('events.index')
                ->with('flash_message', 'イベント記事の更新に失敗しました。');
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
        if($id)
        {
            Event::where('id', $id)->delete();
            return redirect()
                ->route('events.index')
                ->with('flash_message', '削除に成功しました。');
        }
    }
}
