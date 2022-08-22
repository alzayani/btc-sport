<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('auth:admin');
//    }

    public function index()
    {
        $users = User::with('nationality')->where('user_type', 'user')->get();
        return view('backend.user.index', compact('users'));
    }

    public function create()
    {
        $countries = Country::get();
        return view('backend.user.create',compact('countries'));

    }

    public function store(Request $request)
    {
        return $request;

        if($request->member == 'Yes')


//        try {
//            DB::beginTransaction();
//            $user = User::create([
//                'username' => $request->username,
//                'email' => $request->email,
//                'password' => Hash::make($request->password),
//                'role_id' => $request->roles,
//                'employee_id'=>$request->employee_id,
//                'status'=>$request->status,
//            ]);
//            $user = User::find($user->id);
//            $user->assignRole($request->input('roles'));
//
//            DB::commit();
//            return redirect()->route('user.index')->with('flash_message_success', 'User created successfully');
//        }catch (\Exception $ex){
//            DB::rollback();
//            return redirect()->route('user.index')->with('flash_message_error', 'There is an unexpected error, please try again');
//        }

    }

}
