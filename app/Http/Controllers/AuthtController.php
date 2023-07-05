<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Auth\SessionGuard;
use Illuminate\Http\Request;
use App\Models\User;
// use App\Models\Auth as CustomAuth;

class AuthController extends Controller {
    // public function index() {
    //     return view( 'auth.login' );
    // }

    // public function login( Request $request ) {
    //     // validate data
    //     $request->validate( [
    //         'email' => 'required',
    //         'password' => 'required'
    // ] );

    //     // login code

    //     if ( \Auth::attempt( $request->only( 'email', 'password' ) ) ) {
    //         return redirect( 'home' );
    //     }

    //     return redirect( 'login' )->withError( 'Login details are not valid' );

    // }

    // public function register_view() {
    //     return view( 'auth.register' );
    // }

    // public function register( Request $request ) {
    //     // validate
    //     $request->validate( [
    //         'name'=>'required',
    //         'email' => 'required|unique:users|email',
    //         'password'=>'required|confirmed'
    // ] );

    //     // save in users table

    //     User::create( [
    //         'name'=>$request->name,
    //         'email'=>$request->email,
    //         'password'=> $request->password ,
    // ] );

    //     // login user here

    //     if ( \Auth::attempt( $request->only( 'email', 'password' ) ) ) {
    //         return redirect( 'home' );
    //     }

    //     return redirect( 'register' )->withError( 'Error' );

    // }

    // public function home() {
    //     return view( 'home' );
    // }

    // public function logout() {
    //     \Session::flush();
    //     \Auth::logout();
    //     return redirect( '' );
    // }

    // public function show() {
    //     $auth = Auth::user();
    //     return view( 'auth.show', compact( 'auth' ) );
    // }

    // public function edit( $id ) {
    //     $auth = User::find( $id );

    //     return view( 'auth.edit', [ 'auth' => $auth ] );
    // }

    // public function update( Request $request, $id ) {
    //     //form validation//
    //     $request->validate( [
    //         'name'=>'required',

    //         'email'=>'required',
    //         'password'=>'required|confirmed',
    // ] );

    //     $auth = User::where( 'id', $id )->first();
    //     $auth->name = $request->name;

    //     $auth->email = $request->email;
    //     $auth->password = $request->password;
    //     $auth->save();

    //     return back()->with( 'success', 'Profile updated successfully' );

    // }

}