<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //Auth::id()でログイン中のユーザIDを取得するのに必要
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use App\Models\Event;
use App\Models\Category;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('events.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 新規登録（入力）
     * 
     */
    public function create()
    {
        //
        $categories = Category::all();
        // ddd($categories);
        return view('events.create', compact('categories'));
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
        $event = $request->except('image_uploader');
        // ddd($request->all());
        // $categories = Category::find($request->category_id);
        $categories = Category::where('id', $request->category_id)->first();
        // ddd($categories);

        // 定義
        $image = $request->file('image_uploader');
        if($request->hasFile('image_uploader') && $image->isValid()) {
            // アップロードされたファイル名を取得
            $filename = $image->getClientOriginalName();
            // 取得したファイル名で保存
            $image->storeAs('public/event_images', $filename);
        } else {
            
        }
        $img_path = 'storage/event_images/'.$filename;

        return view('events.confirm', compact('img_path', 'categories'))->with($event);
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

        // 保存
        // $event = new Event;
        // $event->user_id = Auth::user()->id;
        // $event->category_id = $request->category_id;
        // $event->title = $request->title;
        // $event->discription = $request->discription;
        // $event->image_uploader = $request->image_uploader;
        // $event->event_start = $request->event_start;
        // $event->event_end = $request->event_end;
        // $event->event_time_discription = $request->event_time_discription;
        // $event->fee = $request->fee;
        // $event->official_url = $request->official_url;
        // $event->venue = $request->venue;
        // $event->zip1 = $request->zip1;
        // $event->zip2 = $request->zip2;
        // $event->address1 = $request->address1;
        // $event->address2 = $request->address2;
        // $event->form_public = $request->form_public;
        // $event->save();
        try {
            // トランザクション開始
            DB::beginTransaction();
            // 保存処理
            $event = new Event;
            $event->fill($request->all())->save();
            // 処理に成功したらコミット
            DB::commit();
        } catch (\Throwable $e) {
            // 処理に失敗したらロールバック
            DB::rollback();
            // エラーログ
            \Log::error($e);
            // 登録処理失敗時にリダイレクト
            return redirect()->route('events.create')->with('error', '登録に失敗しました。');
        }

        if ($event) {
            return redirect()
                    ->route('events.index')
                    ->withSuccess('データを登録しました。');
        } else {
            return redirect()
                    ->route('events.create')
                    ->withSuccess('データの登録に失敗しました。');
        }
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
