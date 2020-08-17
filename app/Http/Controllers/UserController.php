<?php

namespace App\Http\Controllers;

use App\User;
use App\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    /*public function index(User $model)
    {
        return view('users.users', ['users' => $model->paginate(15)]);
    }*/
    public function index(){
        $users=User::select('users.id','users.name','users.email','companies.name as company_name')
        ->join('companies_user','users.id','=','companies_user.user_id')
        ->join('companies','companies_user.companies_id','=','companies.id')
        ->get();
        return view('users.users',compact('users'));
    }

    public function add(Request $rquest){
        $companies = Companies::pluck('name','id');
        return view('users.add_user',compact('companies'));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required |max:255 ',
            'email' => 'required |max:255 ',
            'password' => 'required |max:255 ',
          ],[
            'name.required' => 'name is a required field.',
            'name.max' => 'name can only be 255 characters.',
            'email.required' => 'email is a required field.',
            'email.max' => 'email can only be 255 characters.',
            'password.required' => 'password is a required field.',
            'password.max' => 'password can only be 255 characters.',
        ]);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        $user->company()->attach(Companies::where('id',$request['company'])->first());
        return redirect('users');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        //return view('users.edit_user',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        index();
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect('users');
    }
}
