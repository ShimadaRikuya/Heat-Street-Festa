<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        
        $dates = Gatya::inRandomOrder()->take(1)->first();

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
    
    public function complate()
    {
        //
        return view('gatyas/complate');
    }


}
