<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use App\Models\Profile;
use App\Models\User;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserController extends Controller
{
    use UploadTrait;

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

    public function view($id)
    {
//        return $id;
        $countries = Country::get();
        $user = User::with('nationality')->where('user_type', 'user')->find($id);

        return view('backend.user.view', compact('user','countries'));

    }

    public function store(Request $request)
    {
        //return $request;

        // Personal Photo




        if ($request->has('is_member')) {
            //upload image for member
            if ($request->has('image')) {

                $personalPhoto = $request->file('image');

                $name = basename(Str::random(25), '.' . $request->file('image')->getClientOriginalExtension());
                $folder = '/uploads/members/';
                $filePath = $folder . $name . '.' . $personalPhoto->getClientOriginalExtension();
                $this->uploadOne($personalPhoto, $folder, 'public', $name);
            }
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
                'image' => $filePath,
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
            return redirect()->route('member.index')->with('flash_message_success', 'Member created successfully');

        } else {
            //upload image for member
            if ($request->has('image')) {

                $personalPhoto = $request->file('image');

                $name = basename(Str::random(25), '.' . $request->file('image')->getClientOriginalExtension());
                $folder = '/uploads/users/';
                $filePath = $folder . $name . '.' . $personalPhoto->getClientOriginalExtension();
                $this->uploadOne($personalPhoto, $folder, 'public', $name);
            }
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
                'image' => $filePath,
            ]);
            return redirect()->route('user.index')->with('flash_message_success', 'User created successfully');
        }

        return redirect()->route('user.index')->with('flash_message_error', 'There is an unexpected error, please try again');


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
