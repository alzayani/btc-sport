@extends('backend.layouts.master')



@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="ik ik-users bg-secondary"></i>
                            <div class="d-inline">
                                <h5>Employees</h5>
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
                                    <a href="{{route('employee.index')}}">Employees List</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget bg-primary">
                        <div class="widget-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="state">
                                    <h6>Total Employees</h6>
                                    <h2>{{$tot_emp}}</h2>
                                </div>
                                <div class="icon">
                                    <i class="ik ik-box"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget bg-success">
                        <div class="widget-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="state">
                                    <h6>Total Departments</h6>
                                    <h2>{{$tot_dep}}</h2>
                                </div>
                                <div class="icon">
                                    <i class="ik ik-shopping-cart"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget bg-warning">
                        <div class="widget-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="state">
                                    <h6>Gender</h6>
                                    <h2>Man {{$tot_male}} | Woman {{$tot_female}}</h2>
                                </div>
                                <div class="icon">
                                    <i class="ik ik-inbox"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget bg-danger">
                        <div class="widget-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="state">
                                    <h6>Total Managers</h6>
                                    <h2>123</h2>
                                </div>
                                <div class="icon">
                                    <i class="ik ik-users"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <h3>Employees List</h3>
                            <a class="btn btn-twitter pull-right"  href="{{route('employee.create')}}">Add</a>
                        </div>
                        <div class="card-body p-0 table-border-style">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Photo</th>
                                        <th>Employee Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Department</th>
                                        <th>Gender</th>
                                        <th class="nosort">&nbsp;</th>
                                    </tr>
                                    </thead>
                                    <tbody>
{{--                                    @foreach($members as $member)--}}
{{--                                        <tr>--}}
{{--                                            <td>{{$member->id}}</td>--}}
{{--                                            <td>{{$member->profile->memberID}}</td>--}}
{{--                                            <td>{{$member->profile->title}} {{$member->firstname}} {{$member->lastname}}</td>--}}
{{--                                            @if( $member->gender == 0 )--}}
{{--                                                <td><span class="badge badge-pink">Female</span></td>--}}
{{--                                            @else--}}
{{--                                                <td><span class="badge badge-blue">Male</span></td>--}}
{{--                                                --}}{{--                                        <td>{{$member->gender}}</td>--}}
{{--                                            @endif--}}
{{--                                            <td>{{$member->profile->job_title}}</td>--}}
{{--                                            <td>{{$member->nationality->name}}</td>--}}
{{--                                            <td>{{$member->profile->date_of_join}}</td>--}}
{{--                                            <td>{{$member->profile->expiry_date}}</td>--}}
{{--                                            @if( $member->status == 0 )--}}
{{--                                                <td><span class="badge badge-danger">Inactive</span></td>--}}
{{--                                            @else--}}
{{--                                                <td><span class="badge badge-success">Active</span></td>--}}
{{--                                            @endif--}}
{{--                                            --}}{{--                                        <td>{{$member->status}}</td>--}}
{{--                                            <td>--}}
{{--                                                <div class="table-actions">--}}
{{--                                                    <a href="#"><i class="ik ik-eye"></i></a>--}}
{{--                                                    <a href="#"><i class="ik ik-edit-2"></i></a>--}}
{{--                                                    <a href="#"><i class="ik ik-trash-2"></i></a>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                    @endforeach--}}
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
