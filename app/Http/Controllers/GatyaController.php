<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Gatya;
use App\Models\User;

use Auth;

class GatyaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::id();
        
        $dates = Gatya::inRandomOrder()->first();

        $query = User::where('gatya_id', $dates->id)->doesntExist();

        if ($query) {
            //存在していない場合登録処理
            User::where('id', $user_id)
                ->update([
                    'gatya_id' => $dates->id
                ]);

            return view('gatyas.complate', compact('dates'));
        } else {

            return redirect()->to(route('home'))->with('flash_message', "既にチケットは取得済みです。");   
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
        $user_id = Auth::id();
        $user = User::find($user_id);

        if ($user->gatya_id == $id) {
            User::where('id', $user_id)
                    ->update([
                        'gatya_id' => null
                    ]);
            return redirect()
                ->route('user.edit', $user_id)
                ->with('flash_message', 'チケットを使用しました');
        }
        return redirect()
            ->route('user.edit', $user_id)
            ->with('flash_message', '選択したチケットは現在使用できません');
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
    
    public function complate()
    {
        //
        return view('gatyas/complate');
    }


}
