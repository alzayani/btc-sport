@extends('layouts.master')
@section('css')

    <!-- INTERNAL Select2 css -->
    <link href="{{URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet"/>
    <!-- INTERNAL File Uploads css -->
    <link href="{{URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet"/>
    <!-- INTERNAL Time picker css -->
    <link href="{{URL::asset('assets/plugins/time-picker/jquery.timepicker.css')}}" rel="stylesheet"/>
    <!-- INTERNAL Date Picker css -->
    <link href="{{URL::asset('assets/plugins/date-picker/date-picker.css')}}" rel="stylesheet"/>
    <!-- INTERNAL File Uploads css-->
    <link href="{{URL::asset('assets/plugins/fileupload/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
    <!-- INTERNAL Mutipleselect css-->
    <link rel="stylesheet" href="{{URL::asset('assets/plugins/multipleselect/multiple-select.css')}}">
    <!-- INTERNAL Sumoselect css-->
    <link rel="stylesheet" href="{{URL::asset('assets/plugins/sumoselect/sumoselect.css')}}">
    <!-- INTERNAL telephoneinput css-->
    <link rel="stylesheet" href="{{URL::asset('assets/plugins/telephoneinput/telephoneinput.css')}}">
    <!-- INTERNAL Jquerytransfer css-->

    <style>
        .hideDiv {
            display: none;
        }
    </style>
@endsection
@section('page-header')
    <!--Page header-->
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title mb-0">New Employee</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index">Dashbaord</a></li>
                <li class="breadcrumb-item">Employees</li>
                <li class="breadcrumb-item active" aria-current="page">New Employee</li>
            </ol>
        </div>

    </div>
    <!--End Page header-->
@endsection
@section('content')
    <!-- Start Page-->
    <!-- Row -->
    <form onsubmit="$(this).find('input').prop('disabled', false)" class="form" method="POST"
          action="{{route('employee.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <!--div-->
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Employee Details</div>
                    </div>
                    <div class="card-body">
                        <div class="row row-sm">
                            <div class="col-lg">
                                <label>Full Name <span style="color:red;">*</span> </label>
                                <input class="form-control mb-4" id="full_name" name="full_name"
                                       value="{{ old('full_name') }}" type="text" required>
                                @error('full_name')
                                <div style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label>Gender <span style="color:red;">*</span></label>
                                <select id="gender" name="gender" class="form-control select2  mb-4" required>
                                    <option @if(old('gender') == "")        selected @endif   value="" disabled>Choose
                                        Gender
                                    </option>
                                    <option @if(old('gender') == "Male")    selected @endif   value="Male">Male</option>
                                    <option @if(old('gender') == "Female")  selected @endif   value="Female">Female
                                    </option>
                                </select>

                                @error('gender')
                                <div style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label>Marital Status</label><span style="color:red;">*</span>
                                <select id="marital_status" name="marital_status" class="form-control select2  mb-4"
                                        required>
                                    <option @if(old('marital_status') == "")        selected @endif disabled value="">
                                        Choose Martial Status
                                    </option>
                                    <option @if(old('marital_status') == "Single")  selected @endif value="Single">
                                        Single
                                    </option>
                                    <option @if(old('marital_status') == "Married") selected @endif  value="Married">
                                        Married
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="row row-sm">
                            <div class="col-lg">
                                <label>Phone Number <span style="color:red;">*</span></label>
                                <input id="phone_number" name="phone_number" class="form-control mb-4" type="number"
                                       value="{{ old('phone_number') }}" required>
                                @error('phone_number')
                                <div style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg mg-t-10 mg-lg-t-0 ">
                                <label>Employee Serial <span style="color:red;">*</span></label>
                                <input id="emp_serial" name="emp_serial" class="form-control mb-4" type="text"
                                       placeholder="eg ... 001" value="{{ old('emp_serial') }}" required>
                                @error('emp_serial')
                                <div style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label>Date of birth</label>
                                <input id="dob" name="dob" class="form-control mb-4" type="date"
                                       value="{{ old('dob') }}">
                            </div>
                        </div>

                        <div class="row row-sm">

                            <div class="col-lg mg-t-10 mg-lg-t-0 ">
                                <label>Address</label>
                                <input id="address" name="address" class="form-control mb-4" type="text"
                                       value="{{ old('address') }}">
                            </div>
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label>CPR number <span style="color:red;">*</span></label>
                                <input id="cpr_no" name="cpr_no" class="form-control mb-4" type="number"
                                       value="{{ old('cpr_no') }}" required>
                                @error('cpr_no')
                                <div style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg">
                                <label>CPR Expiry Date</label>
                                <input id="cpr_no_expiry" name="cpr_no_expiry" class="form-control mb-4" type="date"
                                       value="{{ old('cpr_no_expiry') }}">
                            </div>
                        </div>

                        <div class="row row-sm">

                            <div class="col-lg mg-t-10 mg-lg-t-0 ">
                                <label>Passport number</label>
                                <input id="passport_no" name="passport_no" class="form-control mb-4" type="text"
                                       value="{{ old('passport_no') }}">
                            </div>

                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label>Passport Expiry Date</label>
                                <input id="passport_expiry" name="passport_expiry" class="form-control mb-4" type="date"
                                       value="{{ old('passport_expiry') }}">
                            </div>
                            <div class="col-lg">
                                <label>Bahraini ? </label> <span style="color:red;">*</span>
                                <select id="bahraini" onchange="bahrainiFunction()" name="bahraini"
                                        class="form-control select2  mb-4" required>
                                    <option @if(old('bahraini') == "") selected @endif disabled value="">Select</option>
                                    <option @if(old('bahraini') == "Yes") selected @endif  value="Yes">Yes</option>
                                    <option @if(old('bahraini') == "No") selected @endif value="No">No</option>
                                </select>
                                @error('bahraini')
                                <div style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row row-sm" id="bahraini-div">
                            <div id="nationality-div" class="col-lg hideDiv">
                                <label>Nationality</label>
                                <input id="nationality" name="nationality" class="form-control mb-4" type="text"
                                       value="{{ old('nationality') ? old('nationality') : '' }}">
                                @error('nationality')
                                <div style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>


                    </div>
                </div>
                <!--/div-->
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <!--div-->
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Job information</div>
                    </div>
                    <div class="card-body">
                        <div class="row row-sm">
                            <div class="col-lg">
                                <label>Working As <span style="color:red;">*</span></label>
                                <select id="working_as" name="working_as" class="form-control select2  mb-4" required>
                                    <option @if(old('working_as') == "") selected @endif value="" disabled>Choose
                                        Working As
                                    </option>
                                    <option @if(old('working_as') == "Full Time") selected @endif value="Full Time">Full
                                        Time
                                    </option>
                                    <option @if(old('working_as') == "Part Time") selected @endif value="Part Time">Part
                                        Time
                                    </option>
                                    <option @if(old('working_as') == "Outsource") selected @endif value="Outsource">
                                        Outsource
                                    </option>
                                </select>
                            </div>
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label>Department</label>
                                <select id="department_id" name="department_id" class="form-control  mb-4" required>
                                    <option @if(old('department_id') == "") selected @endif   disabled value="">Choose
                                        Department
                                    </option>

                                    @if(!empty($departments))
                                        @foreach($departments as $department)

                                            <option @if(old('department_id') == $department->id) selected
                                                    @endif  value="{{ $department->id }}">{{ $department->name }}</option>

                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label>Designation</label>
                                <input id="designation" name="designation" class="form-control mb-4" type="text"
                                       value="{{ old('designation') }}">
                            </div>
                        </div>

                        <div class="row row-sm">
                            <div class="col-lg">
                                <label>Joining Date</label>
                                <input id="join_date" name="join_date" class="form-control mb-4" type="date"
                                       value="{{ old('join_date') }}">
                            </div>
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label>Ending Date</label>
                                <input id="end_date" name="end_date" class="form-control mb-4" type="date"
                                       value="{{ old('end_date') }}">
                            </div>
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label>Total Leaves days Per year</label>
                                <input id="leave_days" name="leave_days" class="form-control mb-4" type="text"
                                       value="{{  old('leave_days') ? old('leave_days') : '0' }}">
                            </div>
                        </div>
                        <div class="row row-sm">
                            <div class="col-lg">
                                <label>Total Sick Leave days Per year</label>
                                <input id="sick_leave_days" name="sick_leave_days" class="form-control mb-4" type="text"
                                       value="{{  old('sick_leave_days') ? old('sick_leave_days') : '15' }}">
                            </div>
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label>Total dayoff per week</label>
                                <input id="tot_days_off" name="tot_days_off" class="form-control mb-4" type="text"
                                       value="{{  old('tot_days_off') ? old('tot_days_off') : '1' }}">
                            </div>
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label>Working Hours per day </label><span style="color:red;">*</span>
                                <input id="working_hours" name="working_hours" class="form-control mb-4" type="text"
                                       value="{{  old('working_hours') ? old('working_hours') : '8' }}">
                            </div>
                        </div>
                        {{-- <div class="row row-sm">
                            <div class="col-lg">
                                <label>OverTime in Night (BD)</label>
                                <input id="overtime_night_amount" name="overtime_night_amount" class="form-control mb-4" type="text" value="{{  old('overtime_night_amount') ? old('overtime_night_amount') : '0.000' }}">
                            </div>
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label>OverTime in Morning (BD)</label>
                                <input id="overtime_morning_amount" name="overtime_morning_amount" class="form-control mb-4" type="text" value="{{  old('overtime_morning_amount') ? old('overtime_morning_amount') : '0.000' }}">
                            </div>
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label>OverTime Night Start At</label>
                                <input id="overtime_night_startAt" name="overtime_night_startAt" class="form-control mb-4" type="time" value="{{ old('overtime_night_startAt') }}">
                            </div>
                        </div> --}}
                        <div class="row row-sm">
                            <div class="col-lg">
                                <label>Manager Line</label>
                                <select id="manager_id" name="manager_id" class="form-control select2 ">
                                    <option @if(old('manager_id') == "") selected @endif selected disabled value="">
                                        Choose Manager Line
                                    </option>
                                    @if(!empty($supervisors))
                                        @foreach($supervisors as $supervisor)
                                            <option @if(old('manager_id') == $supervisor->id) selected
                                                    @endif value="{{ $supervisor->id }}">{{ $supervisor->full_name }}</option>
                                        @endforeach
                                    @endif
                                </select>

                            </div>

                        </div>

                    </div>
                </div>
                <!--/div-->
            </div>
        </div>
        <!-- /Row -->

        <!-- Row -->
        <div class="row">
            <div class="col-12">
                <!--div-->
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Salary</div>
                    </div>
                    <div class="card-body">
                        <div class="row row-sm">
                            <div class="col-lg">
                                <label>Salary Transfer type</label>
                                <select id="salary_type" name="salary_type" class="form-control select2 c mb-4"
                                        required>
                                    <option @if(old('salary_type') == "")              selected @endif  value=""
                                            disabled>Choose Salary Transfer Type
                                    </option>
                                    <option @if(old('salary_type') == "Cash")          selected @endif  value="Cash">
                                        Cash
                                    </option>
                                    <option @if(old('salary_type') == "Bank Transfer") selected
                                            @endif  value="Bank Transfer">Bank Transfer
                                    </option>
                                    <option @if(old('salary_type') == "Cheque")        selected @endif  value="Cheque">
                                        Cheque
                                    </option>
                                </select>
                            </div>
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label>Basic Salary</label> <span style="color:red;">*</span>
                                <input id="basic_salary" name="basic_salary" class="form-control mb-4" type="number"
                                       step="​.001" value="{{ old('basic_salary') ? old('basic_salary') : '0' }}"
                                       required>
                            </div>
                            {{-- <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label>Housing allowance</label>
                                <input id="housing_allowance" name="housing_allowance" class="form-control mb-4" type="number" step="​.001" value="0.000">
                            </div> --}}
                        </div>
                        <div class="row row-sm">
                            <div class="col-lg">
                                <label>Name</label>
                                <input name="allowance_name[]" class="form-control mb-4" type="text"
                                       placeholder="Housing allowance etc" required>
                            </div>
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label>Amount</label>
                                <input name="allowance_amount[]" class="form-control mb-4" type="number" step="​.001"
                                       value="0.000" required>
                            </div>
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <br>
                                <button onclick="addAllowance()" type="button" class="btn btn-success mb-4"><i
                                        class="fe fe-plus mr-1"></i> ADD
                                </button>
                            </div>
                        </div>
                        <div id="allowances-div">
                        </div>

                        <div class="row row-sm">
                            {{-- <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label>Other allowance</label>
                                <input id="other_allowance" name="other_allowance" class="form-control mb-4" type="number" step="​.001" value="0.000">
                            </div> --}}
                            <div class="col-lg">
                                <label>Health Insurance</label>
                                <select id="health_insurance" name="health_insurance" class="form-control select2 mb-4"
                                        required>
                                    <option @if(old('health_insurance') == "")              selected @endif  value=""
                                            disabled>Have Health Insurance
                                    </option>
                                    <option @if(old('health_insurance') == "No")            selected @endif  value="No">
                                        No
                                    </option>
                                    <option @if(old('health_insurance') == "Yes")           selected
                                            @endif  value="Yes">Yes
                                    </option>

                                </select>
                            </div>
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label>Insurance No.</label>
                                <input id="insurance_no" name="insurance_no" class="form-control mb-4" type="text"
                                       value="{{ old('insurance_no') }}">
                            </div>

                        </div>
                        <div class="row row-sm">
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label>Insurance Catogrey</label>
                                <input id="insurance_category" name="insurance_category" class="form-control mb-4"
                                       type="text" value="{{ old('insurance_category') }}">
                            </div>
                            <div class="col-lg">
                                <label>GOSI on Employee (%)</label>
                                <input id="emp_gosi" name="emp_gosi" class="form-control mb-4" type="number"
                                       value="{{ old('emp_gosi') ? old('emp_gosi') : '7' }}">
                            </div>
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label>GOSI On Company (%)</label>
                                <input id="comp_gosi" name="comp_gosi" class="form-control mb-4" type="text"
                                       value="{{ old('comp_gosi') ? old('comp_gosi') : '12' }}">
                            </div>

                        </div>
                        <div class="row row-sm">
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label>Bank Name</label>
                                <input id="bank_name" name="bank_name" class="form-control mb-4" type="text"
                                       value="{{ old('bank_name') }}">
                            </div>
                            <div class="col-lg">
                                <label>Bank Account Number</label>
                                <input id="acc_no" name="acc_no" class="form-control mb-4" type="text"
                                       value="{{ old('acc_no') }}">
                            </div>
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label>IBAN</label>
                                <input id="iban" name="iban" class="form-control mb-4" type="text"
                                       value="{{ old('iban') }}">
                            </div>

                        </div>
                        {{-- <div class="row row-sm">
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label>Total Salary with allowance</label>
                                <input id="tot_salary_allowance" name="tot_salary_allowance" class="form-control mb-4" type="text" value="{{ old('tot_salary_allowance') ? old('tot_salary_allowance') : 0 }}" disabled>
                            </div>
                            <div class="col-lg">
                                <label>Total Deduction</label>
                                <input id="total_deduction" name="total_deduction" class="form-control mb-4" type="text" value="{{ old('total_deduction') ? old('total_deduction') : 0 }}" disabled>
                            </div>
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label>Net Salary</label>
                                <input id="net_salary" name="net_salary" class="form-control mb-4" type="text" value="{{ old('net_salary') ? old('net_salary') : 0 }}" disabled>
                            </div>

                        </div> --}}
                        <div class="row row-sm">
                            {{-- <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label>Total Paid</label>
                                <input id="total_paid" name="total_paid" class="form-control mb-4" type="text" value="{{ old('total_paid') ? old('total_paid') : 0 }}" disabled>
                            </div> --}}
                            {{-- <div class="col-lg">
                                <label>Maximum Discount (%)</label>
                                <input id="maximum_discount" name="maximum_discount" class="form-control mb-4" type="number" value="{{ old('maximum_discount') ? old('maximum_discount') : 0 }}">
                            </div>
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label>Total Discount Per month (BD)</label>
                                <input id="tot_discount_per_month" name="tot_discount_per_month" class="form-control mb-4" type="number" value="{{ old('tot_discount_per_month') ? old('tot_discount_per_month') : 0 }}">
                            </div> --}}

                        </div>

                        <div class="row row-sm">
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label>Monthly Target</label>
                                <input id="monthly_target" name="monthly_target" class="form-control mb-4" type="number"
                                       value="{{ old('monthly_target') ? old('monthly_target') : 0 }}">
                            </div>
                        </div>

                    </div>
                </div>
                <!--/div-->
            </div>
        </div>
        <!-- /Row -->
        <!-- Row -->
        <div class="row">
            <div class="col-12">
                <!--div-->
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Other Information</div>
                    </div>
                    <div class="card-body">
                        <div class="row row-sm">
                            <div class="col-lg">
                                <label>Driving license <span style="color:red;">*</span></label>
                                <select id="driving_license" name="driving_license" class="form-control select2  mb-4"
                                        required>
                                    <option @if(old('driving_license') == "")              selected @endif value=""
                                            disabled>Have Driving license ?
                                    </option>
                                    <option @if(old('driving_license') == "No")            selected @endif value="No">
                                        No
                                    </option>
                                    <option @if(old('driving_license') == "Yes")           selected @endif value="Yes">
                                        Yes
                                    </option>
                                </select>
                                @error('driving_license')
                                <div style="color: red;">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label>Driving license exp. Date</label>
                                <input id="driving_license_expiry" name="driving_license_expiry"
                                       class="form-control mb-4" type="date"
                                       value="{{ old('driving_license_expiry') }}">
                            </div>
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label>Emergency contact name <span style="color:red;">*</span></label>
                                <input id="eme_name" name="eme_name" class="form-control mb-4" type="text"
                                       value="{{ old('eme_name') }}" required>
                            </div>
                            @error('eme_name')
                            <div style="color: red;">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row row-sm">
                            <div class="col-lg">
                                <label>Emergency contact Number <span style="color:red;">*</span></label>
                                <input id="eme_no" name="eme_no" class="form-control mb-4" type="text"
                                       value="{{ old('eme_no') }}">
                            </div>
                            @error('eme_no')
                            <div style="color: red;">{{ $message }}</div>
                            @enderror
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label>Emergency contact relationship <span style="color:red;">*</span></label>
                                <select id="eme_relationship" name="eme_relationship" class="form-control mb-4"
                                        required>
                                    <option @if(old('eme_relationship') == "")              selected @endif   disabled
                                            value="">Choose emergency contact relationship
                                    </option>
                                    <option @if(old('eme_relationship') == "Brother")       selected
                                            @endif  value="Brother">Brother
                                    </option>
                                    <option @if(old('eme_relationship') == "Sister")        selected
                                            @endif  value="Sister">Sister
                                    </option>
                                    <option @if(old('eme_relationship') == "Son")           selected
                                            @endif  value="Son">Son
                                    </option>
                                    <option @if(old('eme_relationship') == "Friend")        selected
                                            @endif  value="Friend">Friend
                                    </option>
                                    <option @if(old('eme_relationship') == "Mother")        selected
                                            @endif  value="Mother">Mother
                                    </option>
                                    <option @if(old('eme_relationship') == "Father")        selected
                                            @endif  value="Father">Father
                                    </option>
                                    <option @if(old('eme_relationship') == "Wife")          selected
                                            @endif  value="Wife">Wife
                                    </option>
                                    <option @if(old('eme_relationship') == "Grandfather")   selected
                                            @endif  value="Grandfather">Grandfather
                                    </option>
                                    <option @if(old('eme_relationship') == "Grandmother")   selected
                                            @endif  value="Grandmother">Grandmother
                                    </option>
                                    <option @if(old('eme_relationship') == "Other")         selected
                                            @endif  value="Other">Other
                                    </option>
                                </select>
                                @error('eme_relationship')
                                <div style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>


                    </div>
                </div>
                <!--/div-->
            </div>
        </div>
        <!-- /Row -->
        <!-- Row -->
        <div class="row">
            <div class="col-12">
                <!--div-->
                <div class="card">

                    <div class="card-header">
                        <label class="custom-control custom-checkbox">
                            <input id="create_user" type="checkbox" class="custom-control-input" name="create_user"
                                   value="No">
                            <span class="custom-control-label card-title"></span>
                        </label>
                        <div class="card-title">Create Username</div>

                    </div>
                    <div class="card-body" id="users_div" style="display:none">
                        <div class="row row-sm">
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <div class="row">
                                    <div class="col-lg">
                                        <label>Username</label>
                                        <input id="user_name" name="user_name" class="form-control mb-4" type="text"
                                               value="{{ old('user_name') }}">
                                    </div>
                                    <div class="col-lg">
                                        <label>Email</label>
                                        <input id="user_email" name="user_email" class="form-control mb-4" type="email"
                                               value="{{ old('user_email') }}">
                                    </div>
                                    <div class="col-lg mg-t-10 mg-lg-t-0">
                                        <label>Password</label>
                                        <input id="user_pass" name="user_pass" class="form-control mb-4" type="password"
                                               value="{{ old('password') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-sm">
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <div class="row">
                                    <div class="col-lg">
                                        <label>Group</label>
                                        <select id="group_ids" name="group_ids" class="custom-select">
                                            <option @if(old('group_ids') == "")     selected @endif   disabled value="">
                                                Select Group
                                            </option>
                                            @if(!empty($groups))
                                                @foreach($groups as $group)
                                                    <option @if(old('group_ids') == $group->id)     selected
                                                            @endif   id="result{{ $group->id }}"
                                                            value="{{ $group->id }}">{{ $group->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/div-->
            </div>
        </div>
        <!-- /Row -->

        <!-- Row -->
        <div class="row">
            <div class="col-12">
                <!--div-->
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Documents</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg mg-t-10 mg-lg-t-0">
                                <label>Personal Photo</label>

                                <div class="dropify-wrapper " style="height: 192px;">
                                    {{-- <div class="dropify-message">
                                        <span class="file-icon">
                                        <p>Drag and drop a file here or click</p>
                                        </span>
                                        <p class="dropify-error">Ooops, something wrong appended.</p>
                                    </div> --}}
                                    <div class="dropify-loader"></div>
                                    <div class="dropify-errors-container">
                                        <ul></ul>
                                    </div>
                                    <input type="file" class="dropify" name="personal_photo" data-height="180">
                                    <button type="button" class="dropify-clear">Remove</button>
                                    <div class="dropify-preview">
                                    <span class="dropify-render">
                                    </span>
                                        <div class="dropify-infos">
                                            <div class="dropify-infos-inner">
                                                <p class="dropify-filename">
                                                    <span class="dropify-filename-inner"></span>
                                                </p>
                                                <p class="dropify-infos-message">Drag and drop or click to replace</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label>Attachments</label>
                        </div>
                        <div id="attachment-div-append">


                            <div id="attachement-div">

                                <div>
                                    <input type="text" class="form-control" name="attachments_name[]" id=""
                                           placeholder="write image name">
                                </div>

                                <div class="input-group file-browser mb-5">
                                    {{-- <input id="demo" type="file" name="files" class="form-control" accept=".jpg, .png, image/jpeg, image/png" multiple> --}}

                                    <input type="text" class="form-control border-right-0 browse-file"
                                           placeholder="choose" readonly="">
                                    <label class="input-group-btn">
                                    <span class="btn btn-primary">
                                        Browse <input type="file" name="attachments[]" style="display: none;">
                                    </span>
                                    </label>

                                </div>

                            </div>
                        </div>
                        <div>
                            <button type="button" onclick="attachmentAppend()" class="form-control btn btn-primary"> +
                                Add More
                            </button>
                        </div>

                    </div>
                </div>
                <!--/div-->
            </div>
        </div>
        <!-- /Row -->
        <button type="submit" class="btn btn-primary btn-block">Save</button>

    </form>
    <!-- End Page-->
    </div>
    </div>
    </div>
@endsection
@section('js')

    <!-- JS Data tables -->
    <!-- INTERNAL Select2 js -->
    <script src="{{URL::asset('assets/plugins/select2/select2.full.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/select2.js')}}"></script>

    <!-- INTERNAL Timepicker js -->
    <script src="{{URL::asset('assets/plugins/time-picker/jquery.timepicker.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/time-picker/toggles.min.js')}}"></script>

    <!-- INTERNAL Datepicker js -->
    <script src="{{URL::asset('assets/plugins/date-picker/date-picker.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/date-picker/jquery-ui.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/input-mask/jquery.maskedinput.js')}}"></script>

    <!-- INTERNAL File-Uploads Js-->
    <script src="{{URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>

    <!-- INTERNAL File uploads js -->
    <script src="{{URL::asset('assets/plugins/fileupload/js/dropify.js')}}"></script>
    <script src="{{URL::asset('assets/js/filupload.js')}}"></script>

    <!-- INTERNAL Multipleselect js -->
    <script src="{{URL::asset('assets/plugins/multipleselect/multiple-select.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/multipleselect/multi-select.js')}}"></script>

    <!--INTERNAL Sumoselect js-->
    <script src="{{URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>

    <!--INTERNAL telephoneinput js-->
    <script src="{{URL::asset('assets/plugins/telephoneinput/telephoneinput.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>

    <!--INTERNAL jquery transfer js-->
    <script src="{{URL::asset('assets/plugins/jQuerytransfer/jquery.transfer.js')}}"></script>

    <!--INTERNAL multi js-->
    <script src="{{URL::asset('assets/plugins/multi/multi.min.js')}}"></script>

    <!--INTERNAL Form Advanced Element -->
    <script src="{{URL::asset('assets/js/formelementadvnced.js')}}"></script>
    <script src="{{URL::asset('assets/js/form-elements.js')}}"></script>
    <script src="{{URL::asset('assets/js/file-upload.js')}}"></script>
    <!-- START Page JS Code -->

    <script src="{{ asset('js/Pages/Employees/Employee.js') }}"></script>

    <script>
        let loop_allowance = 0;

        function addAllowance() {
            loop_allowance = loop_allowance + 1;
            $('#allowances-div').append(`<div id="allowance-div` + loop_allowance + `" class="row row-sm" ><div class="col-lg">
                            <label>Name</label>
                            <input  name="allowance_name[]" class="form-control mb-4" type="text" placeholder="Housing allowance etc">
                        </div>
                        <div class="col-lg mg-t-10 mg-lg-t-0">
                            <label>Amount</label>
                            <input  name="allowance_amount[]" class="form-control mb-4" type="number" step="​.001" value="0.000">
                        </div>
                        <div class="col-lg mg-t-10 mg-lg-t-0">
                            <button onclick="deleteAllowace(` + loop_allowance + `)" type="button" class="dropdown-item" ><i class="fe fe-trash mr-2"></i> Delete</button>
                        </div> </div>`);
        }

        function deleteAllowace(id) {
            $('#allowance-div' + id).remove();
        }

        function bahrainiFunction() {
            if ($('#bahraini').val() == "No") {
                $('#nationality-div').removeClass('hideDiv');
                $('#nationality').val('');


            } else {
                $('#nationality-div').addClass('hideDiv');
                $('#nationality').val('Bahraini');
            }


        }

        $(document).ready(function () {
            if ("{{ old('bahraini') }}" == "No") {
                $('#nationality-div').removeClass('hideDiv');


            }


        });

    </script>

    <script>
        $(document).ready(function () {

            initImageUpload();

            function initImageUpload() {
                $("#btn-submit").click(function (e) {
                    e.preventDefault();

                    var everlive = new Everlive({
                        appId: "",
                        scheme: "https"
                    });

                    // construct the form data and apply new file name
                    var file = $('#image-file').get(0).files[0];

                    var newFileName = file.filename + "new";
                    var formData = new FormData();
                    formData.append('file', file, newFileName);


                    $.ajax({
                        url: everlive.files.getUploadUrl(), // get the upload URL for the server
                        success: function (fileData) {
                            alert('Created file with Id: ' + fileData.Result[0].Id); // access the result of the file upload for the created file
                            alert('The created file Uri is available at URL: ' + fileData.Result[0].Uri);
                        },
                        error: function (e) {
                            alert('error ' + e.message);
                        },
                        // Form data
                        data: formData,
                        type: 'POST',
                        cache: false,
                        contentType: false,
                        processData: false
                    });
                    return false;
                });
            }
        });
    </script>

    <script>
        var increment = 1;

        function attachmentAppend() {
            increment = parseInt(increment) + 1;

            $('#attachment-div-append').append(`<div id="attachement-div` + increment + `">
                        <div>
                            <input type="text" class="form-control" name="attachments_name[]" id="" placeholder="write image name">
                        </div>

                        <div class="input-group file-browser mb-5">

                                <input type="text" class="form-control border-right-0 browse-file" placeholder="choose" readonly="">
                                <label class="input-group-btn">
                                    <span class="btn btn-primary">
                                        Browse <input type="file" name="attachments[]" style="display: none;" required >
                                    </span>
                                </label>
                                <button class="btn btn-danger" onclick="deleteDiv(` + increment + `)">Delete</button>

                        </div>
                        </div>`);
        }

        function deleteDiv(iteration) {

            $('#attachement-div' + iteration).remove();
        }
    </script>



    <!--END Page JS Code -->
@endsection
