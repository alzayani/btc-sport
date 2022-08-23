@extends('backend.layouts.master')

@section('css')
{{--    <!-- INTERNAL Toster css -->--}}
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
                                <h5>Normal Users</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <nav class="breadcrumb-container" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{route('admin.dashboard')}}"><i class="ik ik-home"></i></a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <a href="{{route('user.index')}}">Normal Users List</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <h3>Normal Users List</h3>
                            <a class="btn btn-twitter pull-right"  href="{{route('user.create')}}">Add</a>
                        </div>
                        <div class="card-body p-0 table-border-style">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Full Name</th>
                                        <th>Gender</th>
                                        <th>Nationality</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th class="nosort">Status</th>
                                        <th class="nosort">&nbsp;</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->firstname}} {{$user->lastname}}</td>
                                            @if( $user->gender == 0 )
                                                <td><span class="badge badge-pink">Female</span></td>
                                            @else
                                                <td><span class="badge badge-blue">Male</span></td>
                                            @endif
                                            <td>{{$user->nationality->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone}}</td>
                                            @if( $user->status == 0 )
                                                <td><span class="badge badge-danger">Inactive</span></td>
                                            @else
                                                <td><span class="badge badge-success">Active</span></td>
                                            @endif
                                            <td>
                                                <div class="table-actions">
                                                    <a href="{{route('user.view',$user->id)}}"><i class="ik ik-eye"></i></a>
                                                    <a href="#"><i class="ik ik-edit-2"></i></a>
                                                    <a href="#"><i class="ik ik-trash-2"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



@endsection

@section('js')

    <script>
        $(document).ready(function () {
            // $("#create_member").click(function () {
            //     if ($("#create_member").is(":checked") == true) {
            //         // alert('You can rock now...');
            //         $("#member_dev").show();
            //         $("#create_member").val("Yes");
            //     } else {
            //         // alert('You can rock now...');
            //         $("#member_dev").hide();
            //         $("#create_member").val("No");
            //     }
            // });



        });
    </script>
@endsection