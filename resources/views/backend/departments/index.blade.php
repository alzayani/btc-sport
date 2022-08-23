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
                                <h5>Departments</h5>
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
                                    <a href="{{route('department.index')}}">Departments</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <h3>Department List</h3>
                        </div>
                        <div class="card-body p-0 table-border-style">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Department Name</th>
                                        <th class="nosort">&nbsp;</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(!empty($departments))
                                        @foreach( $departments as $department )
                                            <tr id="cid{{ $department->id }}">
                                                <td id="name{{ $department->id }}"
                                                    class="align-middle">{{ $department->name }}</td>
                                                <td>
                                                    <div class="table-actions">
{{--                                                        <a href="javascript:void(0)"--}}
{{--                                                           onclick="editDepartment({{ $department->id }})"><i--}}
{{--                                                                    class="ik ik-edit-2"></i></a>--}}
{{--                                                        <a href="javascript:void(0)"  onclick="deleteDepartment({{ $department->id }})"><i class="ik ik-trash-2"></i></a>--}}
                                                        <a id="editDepartment" data-toggle="#edit" onclick="popUp({{$department->id}})" type="button" class="btn btn-icon btn-outline-warning"><i class="ik ik-edit-2"></i></a>
{{--                                                        <button type="button" class="btn btn-icon btn-outline-warning" data-toggle="modal" data-target="#addDepartment"><i class="ik ik-edit-2"></i></button>--}}
                                                        <button type="button" class="btn btn-icon btn-outline-danger" data-toggle="modal" data-target="#deleteDepartment"><i class="ik ik-trash-2"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
{{--                <div id="editx" class="modal">--}}
{{--                    <div class="modal-dialog modal-lg" role="document">--}}
{{--                        <div class="modal-content ">--}}
{{--                            <div class="modal-header pd-x-20">--}}
{{--                                <h6 class="modal-title">Edit User</h6>--}}
{{--                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                    <span aria-hidden="true">&times;</span>--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                            <form id="updateForm">--}}
{{--                                @csrf--}}
{{--                                <input type="hidden" name="user_id" id="user_id">--}}
{{--                                <div class="modal-body pd-20">--}}
{{--                                    <div class="card-body pb-2">--}}
{{--                                        <div class="row row-sm">--}}
{{--                                            <div class="col-lg">--}}

{{--                                                <label class="required">Username</label>--}}
{{--                                                <input type="text" class="form-control mb-4" id="username2" value="" required>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-lg mg-t-10 mg-lg-t-0">--}}
{{--                                                <label class="required">Email Address</label>--}}
{{--                                                <input type="email" class="form-control mb-4" id="email2" value="" required>--}}
{{--                                            </div>--}}
{{--                                            --}}{{-- <div class="col-lg mg-t-10 mg-lg-t-0">--}}
{{--                                                <label class="required">Password</label>--}}
{{--                                                <input type="password" class="form-control mb-4" name="password2"  >--}}
{{--                                            </div> --}}
{{--                                        </div>--}}
{{--                                        <div class="row row-sm">--}}

{{--                                            <div class="col-lg mg-t-10 mg-lg-t-0">--}}
{{--                                                <label>Employee Link</label>--}}
{{--                                                <select id="employee_id2" class="form-control" name="employee_id2">--}}

{{--                                                    <option >Select Employee Name</option>--}}
{{--                                                    @isset($employees)--}}
{{--                                                        @foreach($employees as $employee)--}}
{{--                                                            <option value="{{ $employee->id }}" selected>{{ $employee->full_name }}</option>--}}
{{--                                                        @endforeach--}}
{{--                                                    @endif--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-lg mg-t-10 mg-lg-t-0">--}}
{{--                                                <label>Status</label>--}}
{{--                                                <select id="status2" class="form-control">--}}
{{--                                                    <option value="1">Enable</option>--}}
{{--                                                    <option value="0">Disable</option>--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                </div><!-- modal-body -->--}}
{{--                                <div class="modal-footer">--}}
{{--                                    <button type="submit" class="btn btn-primary">Update</button>--}}
{{--                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="modal fade" id="addDepartment" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterLabel">New Department</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                            </div>
                            <form id="updateForm" class="form-horizontal">
                                @csrf
                                <input type="hidden" name="department_id" id="department_id">
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label for="inputName" class="col-md-3 form-label">Department Name <span
                                                    style="color:red;">*</span> </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="name2" name="name"
                                                   placeholder="Name"
                                                   autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

{{--                <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12" id="addDiv">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-header justify-content-between">--}}
{{--                            <h3>New Department</h3>--}}
{{--                            <a class="btn btn-twitter pull-right" href="#">Add</a>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <form id="addForm" class="form-horizontal">--}}
{{--                                @csrf--}}
{{--                                <div class="form-group row">--}}
{{--                                    <label for="inputName" class="col-md-3 form-label">Department Name <span--}}
{{--                                                style="color:red;">*</span> </label>--}}
{{--                                    <div class="col-md-9">--}}
{{--                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name"--}}
{{--                                               autocomplete="off" required>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <button type="submit" class="btn btn-primary btn-block">Save</button>--}}
{{--                                </div>--}}

{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--                <div class="col-lg-12 col-xl-6 col-md-12 col-sm-12" id="updDiv" style="display: none;">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-header">--}}
{{--                            <h4 id="title" class="card-title form_heading">Edit Department</h4>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <form id="updForm" class="form-horizontal">--}}
{{--                                @csrf--}}
{{--                                <input type="hidden" id="updId" value=""/>--}}
{{--                                <div class="form-group row">--}}
{{--                                    <label for="inputName" class="col-md-3 form-label">Department Name <span--}}
{{--                                                style="color:red;">*</span> </label>--}}
{{--                                    <div class="col-md-9">--}}
{{--                                        <input type="text" class="form-control" id="name2" name="name" value=""--}}
{{--                                               autocomplete="off">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <button type="submit" class="btn btn-primary btn-block">Update</button>--}}
{{--                                </div>--}}

{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                {{ $departments->links() }}

            </div>
        </div>
    </div>



@endsection



@section('js')

    <script>
        function popUp(id) {

            let sid = id;
            let _token = $('input[name=_token]').val();
            $.ajax({
                url: "{{ route('department.edit') }}",
                type: "POST",
                data: {
                    sid: sid,
                    _token: _token
                },
                success: function (response) {
                    console.log(response)
                    $('#addDepartment').modal('show');
                    $('#user_id').val(response.user.id);
                    $('#username2').val(response.user.username);
                }
            });
            // $('#user_id').val(id)
            // $('#username').val(username)
        }
    </script>

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

    <script>
        $('#addForm').on('submit', function (e) {
            e.preventDefault();
            let name = $('#name').val();
            let _token = $('input[name=_token]').val();
            $.ajax({
                url: "{{ route('department.store') }}",
                type: "POST",
                data: {
                    name: name,
                    _token: _token
                },
                success: function (response) {
                    $('tbody').prepend(`tr id="cid` + response.id + `">
                    <td id="name` + response.id + `" class="align-middle">` + response.name + `</td>
                    <td class="align-middle">
                        <div class="btn-group align-middle">
                            <button class="btn btn-sm btn-warning" type="button" onclick="editDepartment(` + response.id + `)">Edit</button>
                            <button onclick="deleteDepartment(` + response.id + `)"    class="btn btn-sm btn-red" type="button" ><i class="fe fe-trash-2"></i></button>
                        </div>
                    </td>



                </tr>`);
                    swal({
                        text: "Data has been Added Successfully",
                        icon: "success",
                        timer: 1500,
                    })
                    $('#addForm')[0].reset();


                }
            });
        })

        function editDepartment(id) {

            $('#addDiv').attr('style', 'display:none');
            $('#updDiv').removeAttr('style');
            $('#updId').val(id);
            let name = $('#name' + id).text();
            $('#name2').val(name);
        }

        $('#updForm').on('submit', function (e) {
            e.preventDefault();
            let name = $('#name2').val();
            let department_id = $('#updId').val();
            let _token = $('input[name=_token]').val();
            $.ajax({
                url: "{{ route('department.update') }}",
                type: "POST",
                data: {
                    name: name,
                    department_id: department_id,
                    _token: _token
                },
                success: function (response) {

                    $('#updDiv').attr('style', 'display:none');
                    $('#addDiv').removeAttr('style');
                    $('#name' + department_id).text(name);
                    swal({
                        text: "Data has been updated Successfully",
                        icon: "success",
                        timer: 1500,
                    })


                }
            });
        })

        function deleteDepartment(id) {
            swal({
                title: "Are you sure?",
                text: "Once Delete cannot be retrived!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {

                        let _token = $('input[name=_token]').val();
                        $.ajax({
                            url: "/departments/delete/" + id,
                            type: "Delete",
                            data: {
                                _token: _token,
                            },
                            success: function (response) {
                                if (response) {
                                    $('#cid' + id).remove();
                                    swal({
                                        text: response.message,
                                        icon: "success",
                                    })
                                }


                            }
                        })


                    }
                });


        }


    </script>
@endsection