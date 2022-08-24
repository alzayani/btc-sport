<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Employees;
use App\Models\User;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;


class EmployeesController extends Controller
{
    use UploadTrait;

    public function index()
    {
        $employees = Employees::with('department')->get();
        $tot_emp = Employees::get()->count();
        $tot_male = Employees::where('gender', 'Male')->get()->count();
        $tot_female = Employees::where('gender', 'Female')->get()->count();
//          $tot_manager = Employees::groupBy('manager_id')->where('manager_id', '!=', '')->get()->count();
        $tot_dep = Department::get()->count();
        return view('backend.employees.index', compact('employees', 'tot_emp', 'tot_male', 'tot_female', 'tot_dep'));
    }

    public function create()
    {
        $departments = Department::select('id', 'name')->get();
//        $supervisors = Employees::select('id', 'full_name')->get();
//        $groups = Role::select('id', 'name')->get();
//
//        return view('pages.employees.new', compact('departments', 'supervisors', 'groups'));
        return view('backend.employees.create', compact('departments',));


    }

    public function store(EmployeeRequest $request)
    {
        try {
            DB::beginTransaction();
            $employee = new Employees();

            // Employee Detail
            $employee->full_name = $request->full_name;
            $employee->gender = $request->gender;
            $employee->marital_status = $request->marital_status;
            $employee->phone_number = $request->phone_number;
            $employee->emp_serial = $request->emp_serial;
            $employee->dob = $request->dob;
            $employee->address = $request->address;
            $employee->cpr_no = $request->cpr_no;
            $employee->cpr_no_expiry = $request->cpr_no_expiry;
            $employee->passport_no = $request->passport_no;
            $employee->passport_expiry = $request->passport_expiry;
            $employee->nationality = $request->nationality;

            // Job Information
            $employee->working_as = $request->working_as;
            $employee->department_id = $request->department_id;
            $employee->designation = $request->designation;
            $employee->join_date = $request->join_date;
            $employee->end_date = $request->end_date;
            $employee->leave_days = $request->leave_days;
            $employee->sick_leave_days = $request->sick_leave_days;
            $employee->tot_days_off = $request->tot_days_off;
            $employee->working_hours = $request->working_hours;
            // $employee->overtime_night_amount = $request->overtime_night_amount;
            // $employee->overtime_morning_amount = $request->overtime_morning_amount;
            // $employee->overtime_night_startAt = $request->overtime_night_startAt;
            // $employee->manager_id = $request->manager_id;

            // Salary type
            $employee->salary_type = $request->salary_type;
            $employee->basic_salary = $request->basic_salary;
            $employee->health_insurance = $request->health_insurance;
            $employee->insurance_no = $request->insurance_no;
            $employee->insurance_category = $request->insurance_category;
            $employee->emp_gosi = $request->emp_gosi;
            $employee->comp_gosi = $request->comp_gosi;
            $employee->bank_name = $request->bank_name;
            $employee->acc_no = $request->acc_no;
            $employee->iban = $request->iban;
            // $employee->tot_salary_allowance = $request->tot_salary_allowance;
            // $employee->total_deduction = $request->total_deduction;
            // $employee->net_salary = $request->net_salary;
            // $employee->total_paid = $request->total_paid;
            // $employee->maximum_discount = $request->maximum_discount;
            // $employee->tot_discount_per_month = $request->tot_discount_per_month;
            $employee->monthly_target = $request->monthly_target;

            // Other Information
            $employee->driving_license = $request->driving_license;
            $employee->driving_license_expiry = $request->driving_license_expiry;
            $employee->eme_name = $request->eme_name;
            $employee->eme_no = $request->eme_no;
            $employee->eme_relationship = $request->eme_relationship;

            // Check if User profile
            if ($request->create_user == "Yes") {
                $user = new User();

                $user->username = $request->user_name;
                $user->password = Hash::make($request->user_pass);
                $user->email = $request->user_email;
                $user->role_id = $request->group_ids;
                $user->status = 1;
                $user->save();
                $user = User::find($user->id);
                $user->assignRole($request->input('group_ids'));
            }


            // Personal Photo
            if ($request->has('personal_photo')) {

                $personalPhoto = $request->file('personal_photo');

                $name = basename($request->file('personal_photo')->getClientOriginalName(), '.' . $request->file('personal_photo')->getClientOriginalExtension());
                $folder = '/uploads/employees/' . $employee->full_name . '/';
                $filePath = $folder . $name . '.' . $personalPhoto->getClientOriginalExtension();
                // return $filePath;

                $employee->personal_photo = $filePath;

                $this->uploadOne($personalPhoto, $folder, 'public', $name);
            }

            $employee->save();

            if ($request->create_user == "Yes") {

                $user->employee_id = $employee->id;
                $user->update();
            }


            foreach ($request->allowance_name as $key => $value) {
                $allowance = new Allowances();
                $allowance->name = $request->allowance_name[$key];
                $allowance->amount = $request->allowance_amount[$key];
                $allowance->emp_id = $employee->id;
                $allowance->save();
            }


            if ($request->has('attachments')) {
                $contracts = $request->file('attachments');
                $contract_paths = '';
                foreach ($contracts as $key => $contract) {


                    $name = basename($contract->getClientOriginalName(), '.' . $contract->getClientOriginalExtension());
                    $folder = '/uploads/employees/' . $employee->full_name . '/';
                    $filePath = $folder . $name . '.' . $contract->getClientOriginalExtension();
                    $contract_paths = $filePath;
                    // Attachemnts
                    $employee->attachments()->create([
                        'file_name' => $request->attachments_name[$key],
                        'file_path' => $contract_paths,
                    ]);
                    $this->uploadOne($contract, $folder, 'public', $name);
                }
            }
            DB::commit();
            $request->session()->flash('message', 'Created Successfully!');
            return redirect()->route('employee.index');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('user.index')->with('flash_message_error', 'There is an unexpected error, please try again');
        }
    }


    public function edit($id)
    {
        $departments = Department::select('id', 'name')->get();
        $supervisors = Employees::select('id', 'full_name')->get();
        $groups = Role::select('id', 'name')->get();
        $employee = Employees::with('user')->findOrFail($id);
        $allowances = $employee->allowances;
        // return $allowances;
        $attachments = $employee->attachments;


        return view('pages.employees.edit', compact('employee', 'departments', 'supervisors', 'groups', 'allowances', 'attachments'));
    }

    public function update($id, Request $request)
    {

        $employee = Employees::findOrFail($id);

        // Employee Detail
        $employee->full_name = $request->full_name;
        $employee->gender = $request->gender;
        $employee->marital_status = $request->marital_status;
        $employee->phone_number = $request->phone_number;
        $employee->emp_serial = $request->emp_serial;
        $employee->dob = $request->dob;
        $employee->address = $request->address;
        $employee->cpr_no = $request->cpr_no;
        $employee->cpr_no_expiry = $request->cpr_no_expiry;
        $employee->passport_no = $request->passport_no;
        $employee->passport_expiry = $request->passport_expiry;
        $employee->nationality = $request->nationality;

        // Job Information
        $employee->working_as = $request->working_as;
        $employee->department_id = $request->department_id;
        $employee->designation = $request->designation;
        $employee->join_date = $request->join_date;
        $employee->end_date = $request->end_date;
        $employee->leave_days = $request->leave_days;
        $employee->sick_leave_days = $request->sick_leave_days;
        $employee->tot_days_off = $request->tot_days_off;
        $employee->working_hours = $request->working_hours;
        // $employee->overtime_night_amount = $request->overtime_night_amount;
        // $employee->overtime_morning_amount = $request->overtime_morning_amount;
        // $employee->overtime_night_startAt = $request->overtime_night_startAt;
        // $employee->manager_id = $request->manager_id;

        // Salary type
        $employee->salary_type = $request->salary_type;
        $employee->basic_salary = $request->basic_salary;
        $employee->health_insurance = $request->health_insurance;
        $employee->insurance_no = $request->insurance_no;
        $employee->insurance_category = $request->insurance_category;
        $employee->emp_gosi = $request->emp_gosi;
        $employee->comp_gosi = $request->comp_gosi;
        $employee->bank_name = $request->bank_name;
        $employee->acc_no = $request->acc_no;
        $employee->iban = $request->iban;
        // $employee->tot_salary_allowance = $request->tot_salary_allowance;
        // $employee->total_deduction = $request->total_deduction;
        // $employee->net_salary = $request->net_salary;
        // $employee->total_paid = $request->total_paid;
        // $employee->maximum_discount = $request->maximum_discount;
        // $employee->tot_discount_per_month = $request->tot_discount_per_month;
        $employee->monthly_target = $request->monthly_target;

        // Other Information
        $employee->driving_license = $request->driving_license;
        $employee->driving_license_expiry = $request->driving_license_expiry;
        $employee->eme_name = $request->eme_name;
        $employee->eme_no = $request->eme_no;
        $employee->eme_relationship = $request->eme_relationship;


        if ($employee->user == "") {
            $user = new User();

            $user->username = $request->user_name;
            $user->password = Hash::make($request->user_pass);
            $user->email = $request->user_email;
            $user->role_id = $request->group_ids;
            $user->status = 1;

            $user->employee_id = $employee->id;

            $user->save();
        } else {
            $user = $employee->user;
            $user->username = $request->user_name;
            $user->email = $request->user_email;
            $user->role_id = $request->group_ids;
            $user->status = $request->status;
            $user->update();
        }


        // Personal Photo
        if ($request->has('personal_photo')) {

            $personalPhoto = $request->file('personal_photo');

            $name = basename($request->file('personal_photo')->getClientOriginalName(), '.' . $request->file('personal_photo')->getClientOriginalExtension());
            $folder = '/uploads/employees/' . $employee->full_name . '/';
            $filePath = $folder . $name . '.' . $personalPhoto->getClientOriginalExtension();
            // return $filePath;

            $employee->personal_photo = $filePath;

            $this->uploadOne($personalPhoto, $folder, 'public', $name);
        }


        $employee->update();

        $employee->allowances()->delete();

        foreach ($request->allowance_name as $key => $value) {
            $allowance = new Allowances();
            $allowance->name = $request->allowance_name[$key];
            $allowance->amount = $request->allowance_amount[$key];
            $allowance->emp_id = $employee->id;
            $allowance->save();
        }
        if ($request->has('attachments')) {
            $contracts = $request->file('attachments');
            $contract_paths = '';
            foreach ($contracts as $key => $contract) {


                $name = basename($contract->getClientOriginalName(), '.' . $contract->getClientOriginalExtension());
                $folder = '/uploads/employees/' . $employee->full_name . '/';
                $filePath = $folder . $name . '.' . $contract->getClientOriginalExtension();
                $contract_paths = $filePath;
                // Attachemnts
                $employee->attachments()->create([
                    'file_name' => $request->attachments_name[$key],
                    'file_path' => $contract_paths,
                ]);
                $this->uploadOne($contract, $folder, 'public', $name);
            }
        }


        $request->session()->flash('message', 'Updated Successfully!');

        return redirect()->route('employee.index');
    }

    public function destroy(Employees $employee)
    {
        // Delete Single Image
        $image = $employee->personal_photo;
        $filename = public_path() . '/storage' . $image;

        // File::delete($filename);

        if ($employee->delete()) {
            if ($employee->attachments->isNotEmpty()) {
                // To get all employee attachmnets for deletion
                foreach ($employee->attachments as $attachment) {
                    $attaches = explode(",", $attachment->file_path);
                }

                // Delete All files from storage
                foreach ($attaches as $attache) {
                    $filenames = storage_path() . $attache;
                    File::delete($filenames);
                }
                $employee->attachments()->delete();
            }
            if ($employee->user) {
                $employee->user->delete();
            }
            return response()->json(['message' => 'Employee Deleted Successfully!', 'type' => 'success']);
        }
    }

    public function attachments(Request $request)
    {
        return response()->json("we are here");
    }
}
