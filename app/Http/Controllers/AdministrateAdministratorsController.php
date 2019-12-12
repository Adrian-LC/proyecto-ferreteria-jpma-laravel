<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Hash;

class AdministrateAdministratorsController extends Controller
{
    public function index()
    {
      $administrators = User::where('user_category_id', '=', 2)->paginate(10);
      return view('administrators.administrateAdministrators')->with('administrators', $administrators);
    }

    public function create()
    {
      return view('administrators.addAdministrator');
    }

    public function save(Request $request)
    {
      $rules = [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'state_u' => 'required|integer|min:0|max:1'
      ];
      $this->validate($request, $rules);
      $addAdministrator = new User();
      $addAdministrator->first_name = ucwords(strtolower($request->input('first_name')));
      $addAdministrator->last_name = ucwords(strtolower($request->input('last_name')));
      $addAdministrator->email = $request->input('email');
      $addAdministrator->password = Hash::make($request->input('password'));
      $addAdministrator->state_u = $request->input('state_u');
      $addAdministrator->user_category_id = 2;
      $addAdministrator->save();
      return redirect()->route('administrateAdministrators');
    }

    public function edit($id)
    {
      $administrator = User::find($id);
      return view('administrators.editAdministrator')->with('administrator', $administrator);
    }

    public function update(Request $request, $id)
    {
      $users = User::where('id', '!=', $id)->get();
      $rules = [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'password' => 'required|string|min:8|confirmed',
        'avatar' => 'file|mimes:jpeg,bmp,png',
        'state_u' => 'required|integer|min:0|max:1'
      ];
      foreach ($users as $user) {
        if($user->email == $request->input('email')){
          $rules['email'] = 'required|string|email|max:255|unique:users';
        }
      }
      $this->validate($request, $rules);
      $editAdministrator = User::find($id);
      $editAdministrator->first_name = ucwords(strtolower($request->input('first_name')));
      $editAdministrator->last_name = ucwords(strtolower($request->input('last_name')));
      $editAdministrator->email = $request->input('email');
      $editAdministrator->state_u = $request->input('state_u');
      if($editAdministrator->password != $request->input('password')){
        $editAdministrator->password = Hash::make($request->input('password'));
      }
      if($request->file('avatar')){
        $route = $request->file('avatar')->storePublicly('public/avatar');
        $namePoster = basename($route);
        $editAdministrator->avatar = $namePoster;
      }
      $editAdministrator->update();
      return redirect()->route('administrateAdministrators');
    }

    public function show($id)
    {
      $administrator = User::find($id);
      return view('administrators.detailsAdministrator')->with('administrator', $administrator);
    }

    public function search(Request $request)
    {
      if($request->input('search')){
        $administratorsToFilter = User::where('user_category_id', '=', 2)->get();
        $administratorsId = [];
        foreach($administratorsToFilter as $administrator){
          if(stripos($administrator->fullName(), $request->input('search')) !== false){
            $administratorsId[] = $administrator->id;
          }
        }
        $administrators = User::where('user_category_id', '=', 2)->whereIn('id', $administratorsId)->paginate(10);
      }else{
        $administrators = User::where('user_category_id', '=', 2)->paginate(10);
      }
      return view('administrators.administrateAdministrators')->with('administrators', $administrators);
    }
}
