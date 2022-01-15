<?php

namespace App\Http\Controllers;

use App\Models\Musica;
use App\Models\Album;
use App\Models\Artist;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Cache;

class UserController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

     /**
     * Show user online status.
     *
     */
    public function userOnlineStatus(){
        $users= User::all();
        return view('usersOnline', compact('users'))->with([
           'users' => User::paginate(5,['*'],'users')
        ]);
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $users = User::all();
        return view('users.index', compact('users'))->with([
            'users' => User::paginate(5,['*'],'users')
         ]);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'],
            'pais' => ['required', 'string'],
            'cidade' => ['required', 'string'],
            'zipcode' => ['required', 'string'],
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'pais' => $request['pais'],
            'cidade' => $request['cidade'],
            'zipcode' => $request['zipcode'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user){
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user){
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user){
        $request->validate([
            'name' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'pais' => ['required', 'string'],
            'cidade' => ['required', 'string'],
            'zipcode' => ['required', 'string'],
            'type' => ['required', 'numeric', 'min:0','max:2'],
        ]);
        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'type' => $request['type'],
            'pais' => $request['pais'],
            'cidade' => $request['cidade'],
            'zipcode' => $request['zipcode'],
            'password' =>$request['password'],
        ]);

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }









    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user){
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }

    /** AJAX METHOD GET USERS  */
    public function getUsersJson(Request $request){
        $userId = $request->userId;
        $users = User::where('id',$userId)->get();
        $users = json_decode($users);
        return response()->json(['data'=>$users]);
    }
}
