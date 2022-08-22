@extends('backend.layouts.master')
@section('css')

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
                                <h5>Create User</h5>
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><h3>Create New User</h3></div>
                        <div class="card-body">
                            <form action="{{route('user.store')}}" method="POST">
                                @csrf
                                <input type="text" name="phone" class="form-control " placeholder="Phone number">

                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="exampleSelectGender">Title</label>
                                            <select id="exampleSelectGender" name="title" id="title"
                                                    class="form-control @error('title') is-invalid @enderror">
                                                <option @if(old('title') == "")        selected @endif   value=""
                                                        disabled>Choose Title
                                                </option>
                                                <option @if(old('title') == "Mr.")    selected @endif   value="Mr.">Mr
                                                </option>
                                                <option @if(old('title') == "Ms.")  selected @endif   value="Ms.">Ms
                                                </option>
                                                <option @if(old('title') == "Miss.")  selected @endif   value="Miss.">
                                                    Miss
                                                </option>
                                                <option @if(old('title') == "Prof.")  selected @endif   value="Prof.">
                                                    Prof
                                                </option>
                                                <option @if(old('title') == "Dr.")  selected @endif   value="Dr.">Dr
                                                </option>
                                                <option @if(old('title') == "HE.")  selected @endif   value="HE.">HE
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="exampleInputFirstname">First Name</label>
                                            <input type="text" name="firstname" value="{{ old('firstname') }}"
                                                   id="exampleInputFirstname"
                                                   class="form-control @error('firstname') is-invalid @enderror"
                                                   placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="exampleInputLastname">Last Name</label>
                                            <input type="text" name="lastname" value="{{ old('lastname') }}"
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
                                            <input type="text" name="phone" value="{{ old('phone') }}"
                                                   id="exampleInputPhone"
                                                   class="form-control  @error('phone') is-invalid @enderror"
                                                   placeholder="Phone number">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail">Email address</label>
                                            <input type="email" name="email" value="{{ old('email') }}"
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
                                                        <option @if(old('country_id') == $country->id) selected
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
                                                <option @if(old('gender') == "")        selected @endif   value=""
                                                        disabled>Choose Gender
                                                </option>
                                                <option @if(old('gender') == "Male")    selected @endif   value="Male">
                                                    Male
                                                </option>
                                                <option @if(old('gender') == "Female")  selected
                                                        @endif   value="Female">Female
                                                </option>
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
                                                <option @if(old('status') == "")        selected @endif   value=""
                                                        disabled>Choose Status
                                                </option>
                                                <option @if(old('status') == "Active")    selected
                                                        @endif   value="Male">Active
                                                </option>
                                                <option @if(old('status') == "Inactive")  selected
                                                        @endif   value="Female">Inactive
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label>File upload</label>
                                            <input type="file" name="img[]" class="file-upload-default">
                                            <div class="input-group col-xs-12">
                                                <input type="text" name="image" id="image"
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
                                        <input type="checkbox" id="create_member" value="No" name="member"
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
                                </div>


                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('js')
    {{--<script src="{{ asset('assets/js/datatables.js')}}"></script>--}}
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
