<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Auth\User\User;

class ProfileController extends Controller {

    public function show() {
        $user = Auth::user();
        return view( 'auth.show', compact( 'user' ) );
    }

    public function edit( $id ) {
        $user = Auth::find( $id );

        return view( 'auth.edit', [ 'auth' => $user ] );
    }

    public function update( Request $request, $id ) {
        $request->validate( [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ] );

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt( $request->password );
        $user->save();

        return back()->with( 'success', 'Profile updated successfully' );
    }

}
