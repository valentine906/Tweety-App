<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// ADDED
use App\Models\User;
use Illuminate\validation\Rule;
// END

class ProfileController extends Controller
{
    //
     public function show(User $user)
    {
    
        return view('profile.show',[
            'user' => $user,
            'tweets' => $user->tweets()->paginate(1)
        ]);
    }

     public function edit(User $user)
    {
    	// abort_if($user->isNot(current_user()), 404);
        return view('profile.edit',compact('user'));
    }

     public function update(User $user)
    {
        
       $attributes = request()->validate([
            'username' => [
                'string',
                'required',
                 'max:255',
                 'alpha_dash',
                 Rule::unique('users')->ignore($user)
             ],
            'name' => [
                'string',
                'required',
                 'max:255'
             ],
             'avater' => [
                'file'
             ],
            'email' => [
                'string',
                'required',
                'email',
                 'max:255',
                  Rule::unique('users')->ignore($user)
             ],
            'password' => [
                'string',
                'required',
                'min:5',
                 'max:255',
                 'confirmed'
             ],

        ]);
       if(request('avater')){
            $attributes['avater'] = request('avater')->store('avaters_image');
       }
    

       $user->update($attributes);
       return redirect('profile/'.$user->username);

      

       // ANOTHER WAY IS TO REDIRECT TO THE PATH FUNCTION YOU PROVIDE ON USERS MODEL
        //redirect($user->path());
    }
}
