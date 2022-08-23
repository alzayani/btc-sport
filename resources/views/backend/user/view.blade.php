@extends('backend.layouts.master')



@section('css')


{{--    <link rel="stylesheet" href="{{ asset('assets/plugins/jquery-toast-plugin/dist/jquery.toast.min.css')}}">--}}

@endsection


@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="ik ik-users bg-secondary"></i>
                            <div class="d-inline">
                                <h5>Profile User</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <nav class="breadcrumb-container" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{route('admin.dashboard')}}"><i class="ik ik-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('user.index')}}">User List</a></li>
                                <li class="breadcrumb-item"><a href="{{route('member.index')}}">Members List</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add User</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="@if($user->image== null) {{asset('assets/default-avatar.png')}} @else {{asset('storage'). $user->image }} @endif" class="rounded-circle" width="150" />
                                <h4 class="card-title mt-10">{{$user->firstname}} {{$user->lastname}}</h4>
                                <p class="card-subtitle">Normal User</p>
                            </div>
                        </div>
                        <hr class="mb-0">
                        <div class="card-body">
                            <small class="text-muted d-block">Email address </small>
                            <h6>{{$user->email}}</h6>
                            <small class="text-muted d-block pt-10">Phone</small>
                            <h6>{{$user->phone}}</h6>
                            <small class="text-muted d-block pt-10">Registered since</small>
                            <h6>{{$user->created_at}}</h6>
                            <small class="text-muted d-block pt-10">Status</small>
                            @if( $user->status == 0 )
                                <span class="badge badge-danger">Inactive</span>
                            @else
                                <span class="badge badge-success">Active</span>
                            @endif
                            <small class="text-muted d-block pt-30">Social Profile</small>
                            <br/>
                            <button class="btn btn-icon btn-facebook"><i class="fab fa-facebook-f"></i></button>
                            <button class="btn btn-icon btn-twitter"><i class="fab fa-twitter"></i></button>
                            <button class="btn btn-icon btn-instagram"><i class="fab fa-instagram"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="card">
                        <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#profile" role="tab" aria-controls="pills-profile" aria-selected="true">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#setting" role="tab" aria-controls="pills-setting" aria-selected="false">Setting</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="pills-password" aria-selected="false">Password</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3 col-6"> <strong>Full Name</strong>
                                            <br>
                                            <p class="text-muted">{{$user->firstname}} {{$user->lastname}}</p>
                                        </div>
                                        <div class="col-md-3 col-6"> <strong>Gender</strong>
                                            <br>
                                            @if( $user->gender == 0 )
                                                <span class="badge badge-pink">Female</span>
                                            @else
                                                <span class="badge badge-blue">Male</span>
                                            @endif
                                        </div>
                                        <div class="col-md-3 col-6"> <strong>Email</strong>
                                            <br>
                                            <p class="text-muted">{{$user->email}}</p>
                                        </div>
                                        <div class="col-md-3 col-6"> <strong>Nationality</strong>
                                            <br>
                                            <p class="text-muted">{{$user->nationality->name}}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <h4 class="mt-30">Skill Set</h4>
                                    <hr>
                                    <h6 class="mt-30">Wordpress <span class="pull-right">80%</span></h6>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%;"> <span class="sr-only">50% Complete</span> </div>
                                    </div>
                                    <h6 class="mt-30">HTML 5 <span class="pull-right">90%</span></h6>
                                    <div class="progress  progress-sm">
                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%;"> <span class="sr-only">50% Complete</span> </div>
                                    </div>
                                    <h6 class="mt-30">jQuery <span class="pull-right">50%</span></h6>
                                    <div class="progress  progress-sm">
                                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%;"> <span class="sr-only">50% Complete</span> </div>
                                    </div>
                                    <h6 class="mt-30">Photoshop <span class="pull-right">70%</span></h6>
                                    <div class="progress  progress-sm">
                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%;"> <span class="sr-only">50% Complete</span> </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="setting" role="tabpanel" aria-labelledby="pills-setting-tab">
                                <div class="card-body">
                                    <form class="form-horizontal">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="exampleSelectGender">Title</label>
                                                    <select id="exampleSelectGender" name="title" id="title"
                                                            class="form-control @error('title') is-invalid @enderror">
                                                        <option @if($user->title== "")  selected  @endif   value=""  disabled  >Choose Title</option>
                                                        <option @if($user->title== "Mr.") selected  @endif   value="Mr." >Mr</option>
                                                        <option @if($user->title == "Ms.")  selected @endif   value="Ms.">Ms</option>
                                                        <option @if($user->title == "Miss.")  selected @endif   value="Miss.">Miss</option>
                                                        <option @if($user->title == "Prof.")  selected @endif   value="Prof.">Prof</option>
                                                        <option @if($user->title == "Dr.")  selected @endif   value="Dr.">Dr</option>
                                                        <option @if($user->title == "HE.")  selected @endif   value="HE.">HE</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <label for="exampleInputFirstname">First Name</label>
                                                    <input type="text" name="firstname" value="{{$user->firstname }}"
                                                           id="exampleInputFirstname"
                                                           class="form-control @error('firstname') is-invalid @enderror"
                                                           placeholder="First Name">
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <label for="exampleInputLastname">Last Name</label>
                                                    <input type="text" name="lastname" value="{{$user->lastname}}"
                                                           id="exampleInputLastname"
                                                           class="form-control @error('lastname') is-invalid @enderror"
                                                           placeholder="Last Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="exampleInputPhone">Phone number</label>
                                                    <input type="text" name="phone" value="{{$user->phone }}"
                                                           id="exampleInputPhone"
                                                           class="form-control  @error('phone') is-invalid @enderror"
                                                           placeholder="Phone number">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail">Email address</label>
                                                    <input type="email" name="email" value="{{$user->email }}"
                                                           id="exampleInputEmail"
                                                           class="form-control @error('email') is-invalid @enderror"
                                                           placeholder="Email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleSelectCountry">Nationality</label>
                                                    <select name="country_id" id="exampleSelectCountry"
                                                            class="form-control @error('country_id') is-invalid @enderror">
                                                        <option @if(old('country_id') == "") selected @endif   disabled
                                                                value="">Choose Nationality
                                                        </option>
                                                        @if(!empty($countries))
                                                            @foreach($countries as $country)
                                                                <option @if($user->country_id == $country->id) selected
                                                                        @endif  value="{{ $country->id }}">{{ $country->name }}</option>
                                                            @endforeach
                                                        @endif

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleSelectGender">Gender</label>
                                                    <select id="exampleSelectGender" name="gender" id="gender"
                                                            class="form-control @error('gender') is-invalid @enderror">
                                                        <option @if($user->gender == "") selected @endif   value="" disabled>Choose Gender</option>
                                                        <option @if($user->gender == "1") selected @endif   value="1">  Male  </option>
                                                        <option @if($user->gender == "0")  selected @endif   value="0">Female </option>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="exampleSelectStatus">Status</label>
                                                    <select id="exampleSelectStatus" name="status" id="status"
                                                            class="form-control @error('status') is-invalid @enderror">
                                                        <option @if($user->status == "") selected @endif   value="" disabled>Choose Status </option>
                                                        <option @if($user->status == "1") selected  @endif   value="1">Active </option>
                                                        <option @if($user->status == "0")  selected @endif   value="0">Inactive </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <label>File upload</label>
                                                    <input type="file" name="image" class="file-upload-default">
                                                    <div class="input-group col-xs-12">
                                                        <input type="text" name="images" id="images"
                                                               class="form-control file-upload-info" disabled
                                                               placeholder="Upload Image">
                                                        <span class="input-group-append">
                                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>

                                        <div class="form-check mx-sm-2">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" id="create_member" value="No" name="is_member"
                                                       class="custom-control-input">
                                                <span class="custom-control-label">&nbsp; Add As Member</span>
                                            </label>
                                        </div>
                                        <br><br>

                                        <div id="member_dev" style="display:none">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="memberID">Member Number</label>
                                                        <input type="text" name="memberID" value="{{ old('memberID') }}"
                                                               id="memberID"
                                                               class="form-control @error('memberID') is-invalid @enderror"
                                                               placeholder="Member Number">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="job_title">Job Title</label>
                                                        <input type="text" name="job_title" value="{{ old('job_title') }}"
                                                               id="job_title"
                                                               class="form-control @error('job_title') is-invalid @enderror"
                                                               placeholder="Job Title">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleSelectDOB">Date of Birth</label>
                                                        <input type="date" name="dob" value="{{ old('dob') }}"
                                                               id="exampleSelectDOB"
                                                               class="form-control @error('dob') is-invalid @enderror">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleSelectJoin">Date of Join</label>
                                                        <input type="date" name="date_of_join" value="{{ old('date_of_join') }}"
                                                               id="exampleSelectJoin"
                                                               class="form-control @error('date_of_join') is-invalid @enderror">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleSelectExpiry">Membership Expiry Date</label>
                                                        <input type="date" name="expiry_date" value="{{ old('expiry_date') }}"
                                                               id="exampleSelectExpiry"
                                                               class="form-control @error('expiry_date') is-invalid @enderror">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleSelectPtime">Preferred Time</label>
                                                        <input type="time" name="preferred_time"
                                                               value="{{ old('preferred_time') }}"
                                                               id="exampleSelectPtime"
                                                               class="form-control @error('preferred_time') is-invalid @enderror">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleSelectpcourt">Preferred Court</label>
                                                        <input type="text" name="preferred_court"
                                                               value="{{ old('preferred_court') }}"
                                                               id="exampleSelectpcourt"
                                                               class="form-control @error('preferred_court') is-invalid @enderror"
                                                               placeholder="Preferred Court">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleSelectpcoach">Preferred Coach</label>
                                                        <input type="text" name="preferred_coach"
                                                               value="{{ old('preferred_coach') }}"
                                                               id="exampleSelectpcoach"
                                                               class="form-control @error('preferred_coach') is-invalid @enderror"
                                                               placeholder="Preferred Coach">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-success" type="submit">Update Profile</button>
                                    </form>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="pills-password-tab">
                                <div class="card-body">
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label for="oldPassword">Old Password</label>
                                            <input type="password" class="form-control" name="oldPassword" id="oldPassword">
                                        </div>
                                        <div class="form-group">
                                            <label for="newPassword">New Password</label>
                                            <input type="password" class="form-control" name="newPassword" id="newPassword" placeholder="New Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="confirmPassword">Confirm Password</label>
                                            <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password">
                                        </div>

                                        <button class="btn btn-success" type="submit">Update Password</button>
                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>

@endsection


@section('js')
    <script src="{{ asset('assets/js/form-components.js')}}"></script>
    <script src="{{ asset('assets/js/form-picker.js')}}"></script>


    <script>
        $(document).ready(function () {
            $("#create_member").click(function () {
                if ($("#create_member").is(":checked") == true) {
                    // alert('You can rock now...');
                    $("#member_dev").show();
                    $("#create_member").val("Yes");
                } else {
                    // alert('You can rock now...');
                    $("#member_dev").hide();
                    $("#create_member").val("No");
                }
            });



        });
    </script>

@endsection
