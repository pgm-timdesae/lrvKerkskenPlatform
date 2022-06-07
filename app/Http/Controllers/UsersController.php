<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    $users = User::orderBy('name', 'asc')
      ->filter(request(['search']))
      ->get();

    return view('users.index', [
      'users' => $users
    ]);
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
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    return view('users.show')->with('user', auth()->user());
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit()
  {
    return view('users.edit')->with('user', auth()->user());
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
    $request->validate([
      'name' => 'required|min:1|max:255',
      'country' => 'required|max:100',
      'city' => 'required|max:100',
      'street' => 'required|min:1|max:100',
      'zipcode' => 'required|integer|digits_between:3,5',
      'bus' => 'required|integer|digits_between:1,3',
      'phonenumber' => 'required|numeric|digits:10',
      'image' => 'required|mimes:jpg,png,jpeg|max:5048'
    ]);

    $newImageName = time() . '-' . $request->phonenumber . '.' . $request->image->extension();

    $request->image->move(public_path('storage/images'), $newImageName);

    $user = User::where('id', $id)
      ->update([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => $request->input('password'),
        'country' => $request->input('country'),
        'city' => $request->input('city'),
        'street' => $request->input('street'),
        'zipcode' => $request->input('zipcode'),
        'bus' => $request->input('bus'),
        'phonenumber' => $request->input('phonenumber'),
        'role' => $request->input('role'),
        'image_path' => $newImageName,
      ]);

    return redirect('/');
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
