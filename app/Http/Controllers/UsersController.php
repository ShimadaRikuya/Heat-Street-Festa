<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function show($user_id)
    {
         // テンプレート「user/show.blade.php」を表示
        return view('users/show', compact('user_id'));
    }

    public function edit()
    {
        $user = Auth::user();
            
         // テンプレート「user/edit.blade.php」を表示
        return view('users/edit', compact('user'));
    }

    public function update($id, UserRequest $request) {
        $user = Auth::user();
        $form = $request->all();

        $profilePicture = $request->file('profile_picture');
        if ($profilePicture != null) {
            $form['profile_picture'] = $this->saveProfilePicture($profilePicture, $id); // return file name
        }

        unset($form['_token']);
        unset($form['_method']);
        $user->fill($form)->save();
        return redirect('/home');
    }

    private function saveProfilePicture($image, $id) {
        // get instance
        $img = \Image::make($image);
        // resize
        $img->fit(100, 100, function($constraint){
            $constraint->upsize(); 
        });
        // save
        $file_name = 'profile_'.$id.'.'.$image->getClientOriginalExtension();
        $save_path = 'public/profiles/'.$file_name;
        Storage::put($save_path, (string) $img->encode());
        // return file name
        return $file_name;
    }


}
