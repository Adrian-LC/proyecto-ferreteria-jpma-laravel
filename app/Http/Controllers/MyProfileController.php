<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Order;
use App\Sale;

class MyProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('profileUser.myProfile');
    }
    public function show()
    {
      $user = User::find(Auth::user()->id);
      return view('profileUser.detailsUser')->with('user', $user);
    }
    public function edit()
    {
      $client = User::find(Auth::user()->id);
      return view('profileUser.editUser')->with('client', $client);
    }

    public function update(Request $request)
    {
      $users = User::where('id', '!=', Auth::user()->id)->get();
      $rules = [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'avatar' => 'file|mimes:jpeg,bmp,png',
        //'state_u' => 'required|integer|min:0|max:1'
      ];
      if ($request->input('password')) {
        $rules['password'] = 'string|min:8|confirmed';
      }
      foreach ($users as $user) {
        if($user->email == $request->input('email')){
          $rules['email'] = 'required|string|email|max:255|unique:users';
        }
      }
      $this->validate($request, $rules);
      $editUser = User::find(Auth::user()->id);
      $editUser->first_name = ucwords(strtolower($request->input('first_name')));
      $editUser->last_name = ucwords(strtolower($request->input('last_name')));
      $editUser->email = $request->input('email');
      //$editUser->state_u = $request->input('state_u');
      if($request->input('password')){
        $editUser->password = Hash::make($request->input('password'));
      }
      if($request->file('avatar')){
        $route = $request->file('avatar')->storePublicly('public/avatar');
        $namePoster = basename($route);
        $editUser->avatar = $namePoster;
      }
      $editUser->update();
      return redirect()->route('myProfile');
    }
}
