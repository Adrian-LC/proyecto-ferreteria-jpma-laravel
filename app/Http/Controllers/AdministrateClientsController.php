<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Hash;

class AdministrateClientsController extends Controller
{
    public function index()
    {
      $clients = User::where('user_category_id', '=', 3)->paginate(10);
      return view('clients.administrateClients')->with('clients', $clients);
    }

    public function create()
    {
      return view('clients.addClient');
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
      $addClient = new User();
      $addClient->first_name = ucwords(strtolower($request->input('first_name')));
      $addClient->last_name = ucwords(strtolower($request->input('last_name')));
      $addClient->email = $request->input('email');
      $addClient->password = Hash::make($request->input('password'));
      $addClient->state_u = $request->input('state_u');
      $addClient->user_category_id = 3;
      $addClient->save();
      return redirect()->route('administrateClients');
    }

    public function edit($id)
    {
      $client = User::find($id);
      return view('clients.editClient')->with('client', $client);
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
      $editClient = User::find($id);
      $editClient->first_name = ucwords(strtolower($request->input('first_name')));
      $editClient->last_name = ucwords(strtolower($request->input('last_name')));
      $editClient->email = $request->input('email');
      $editClient->state_u = $request->input('state_u');
      if($editClient->password != $request->input('password')){
        $editClient->password = Hash::make($request->input('password'));
      }
      if($request->file('avatar')){
        $route = $request->file('avatar')->storePublicly('public/avatar');
        $namePoster = basename($route);
        $editClient->avatar = $namePoster;
      }
      $editClient->update();
      return redirect()->route('administrateClients');
    }

    public function show($id)
    {
      $client = User::find($id);
      return view('clients.detailsClient')->with('client', $client);
    }
}
