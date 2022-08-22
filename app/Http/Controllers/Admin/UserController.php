<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $users = User::with('nationality')->where('user_type', 'user')->get();
        return view('backend.user.index', compact('users'));
    }

    public function create()
    {
        $countries = Country::get();
        return view('backend.user.create', compact('countries'));

    }

    public function store(Request $request)
    {
        //return $request;

        if ($request->has('is_member')) {
            //return 'member';
            // added to User Table
            $user = User::create([
                'country_id' => $request->country_id,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'title' => $request->username,
                'email' => $request->email,
                'password' => Hash::make('112233'),
                'phone' => $request->phone,
                'user_type' => 'member',
                'gender' => $request->gender,
                'status' => $request->status,
            ]);
            // added to Profile Table
            Profile::create([
                'user_id' => $user->id,
                'memberID' => $request->memberID,
                'job_title' => $request->job_title,
                'dob' => $request->dob,
                'date_of_join' => $request->date_of_join,
                'expiry_date' => $request->expiry_date,
                'preferred_time' => $request->preferred_time,
                'preferred_court' => $request->preferred_court,
                'preferred_coach' => $request->preferred_coach,
            ]);
            return redirect()->route('member.index')->with('flash_message_success', 'User created successfully');

        }
        else {
            // added to User Table
            $user = User::create([
                'country_id' => $request->country_id,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'title' => $request->username,
                'email' => $request->email,
                'password' => Hash::make('112233'),
                'phone' => $request->phone,
                'user_type' => 'user',
                'gender' => $request->gender,
                'status' => $request->status,
            ]);
            return redirect()->route('user.index')->with('flash_message_success', 'Member created successfully');
        }


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
