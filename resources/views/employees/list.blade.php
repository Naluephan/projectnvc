@extends('adminlte::page')
{{-- header --}}
@section('content_header_title')
    พนักงาน
@stop
@section('content_header')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">หน้าแรก</a></li>
    <li class="breadcrumb-item active"> พนักงาน </li>
@stop

{{-- end header --}}
@section('content')

    <div class="row mb-2">
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="me-1">
                            <p class="text-heading mb-2">Session</p>
                            <div class="d-flex align-items-center">
                                <h4 class="mb-2 me-1 display-6">21,459</h4>
                                <p class="text-success mb-2">(+29%)</p>
                            </div>
                            <p class="mb-0">Total Users</p>
                        </div>
                        <div class="avatar">
                            <div class="avatar-initial bg-label-primary rounded text-lg">
                                <i class="fa-solid fa-users p-2 rounded-2 bg-success-subtle text-dark"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="me-1">
                            <p class="text-heading mb-2">Paid Users</p>
                            <div class="d-flex align-items-center">
                                <h4 class="mb-2 me-1 display-6">4,567</h4>
                                <p class="text-success mb-2">(+18%)</p>
                            </div>
                            <p class="mb-0">Last week analytics</p>
                        </div>
                        <div class="avatar">
                            <div class="avatar-initial bg-label-danger rounded text-lg">
                                <i class="fa-solid fa-venus-mars p-2 rounded-2 bg-primary-subtle text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="me-1">
                            <p class="text-heading mb-2">Active Users</p>
                            <div class="d-flex align-items-center">
                                <h4 class="mb-2 me-1 display-6">19,860</h4>
                                <p class="text-danger mb-2">(-14%)</p>
                            </div>
                            <p class="mb-0">Last week analytics</p>
                        </div>
                        <div class="avatar">
                            <div class="avatar-initial bg-label-success rounded text-lg">
                                <i class="fa-solid fa-user-injured p-2 rounded-2 bg-danger-subtle text-danger"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="me-1">
                            <p class="text-heading mb-2">Pending Users</p>
                            <div class="d-flex align-items-center">
                                <h4 class="mb-2 me-1 display-6">237</h4>
                                <p class="text-success mb-2">(+42%)</p>
                            </div>
                            <p class="mb-0">Last week analytics</p>
                        </div>
                        <div class="avatar">
                            <div class="avatar-initial bg-label-warning rounded text-lg">
                                <i class="fa-solid fa-user-clock p-2 rounded-2 bg-warning-subtle text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="card">
        <div class="card-header">
            <h6 class="">ตัวเลือกการค้นหา</h6>
            <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
                <div class="col-md-4 user_role">
                    <select id="UserRole" class="form-select text-capitalize">
                        <option value=""> Select Role </option>
                        <option value="Admin">Admin</option>
                        <option value="Author">Author</option>
                        <option value="Editor">Editor</option>
                        <option value="Maintainer">Maintainer</option>
                        <option value="Subscriber">Subscriber</option>
                    </select></div>
                <div class="col-md-4 user_plan">
                    <select id="UserPlan" class="form-select text-capitalize">
                        <option value=""> Select Plan </option>
                        <option value="Basic">Basic</option>
                        <option value="Company">Company</option>
                        <option value="Enterprise">Enterprise</option>
                        <option value="Team">Team</option>
                    </select>
                </div>
                <div class="col-md-4 user_status">
                    <select id="FilterTransaction" class="form-select text-capitalize">
                        <option value=""> Select Status </option>
                        <option value="Pending" class="text-capitalize">Pending</option>
                        <option value="Active" class="text-capitalize">Active</option>
                        <option value="Inactive" class="text-capitalize">Inactive</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body ">
            <table class="table dt-responsive w-100 nowrap" id="data_tables" aria-describedby="data_tables">
                <thead class="border-top table-light">
                <tr>
{{--                    <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1" style="width: 1px; display: none;" aria-label=""></th>--}}
                    <th class="dt-checkboxes-cell dt-checkboxes-select-all" data-col="1" aria-label=""><input type="checkbox" class="form-check-input"></th>
                    <th>รหัสบัตร</th>
                    <th>ชื่อ - สกุล</th>
                    <th>ตำแหน่ง</th>
                    <th>บริษััท</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
{{--                    <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>--}}
                    <td><input type="checkbox" class="form-check-input"></td>
                    <td>
                        <div class="d-flex justify-content-start align-items-center user-name">
                            <img src="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo/assets/img/avatars/2.png" alt="Avatar" class="img-thumbnail img-size-50 rounded-circle">
                            <div class="d-flex flex-column ml-2">
                                <a href="https://demos.themeselection.com/materio-bootstrap-html-laravel-admin-template/demo-1/app/user/view/account" class="text-heading text-truncate">
                                    <span class="fw-medium">Zsazsa McCleverty</span></a><small>@zmcclevertye</small>
                            </div>
                        </div>
                    </td>
                    <td><span>zmcclevertye@soundcloud.com</span></td>
                    <td><span class="text-truncate d-flex align-items-center"><i class="fas fa-cog text-warning mr-1"></i>Maintainer</span></td>
                    <td><span class="text-heading">Enterprise</span></td><td><span class="badge rounded-pill badge-success" text-capitalized="">Active</span></td>
                    <td class="" style="">

                    </td>
                </tr>
            </table>
        </div>
@stop
@section('js')
    <script>
        $(()=>{
            var list_table = $('#data_tables').DataTable({
                pageLength: 25,
                responsive: true,
                processing: true,
                serverSide: true,
                serverMethod: 'post',
                ajax: {
                    url: '{{route('api.v1.employee.list')}}',
                    type: "post",
                    data: {
                        _token: "{{csrf_token()}}",
                    },
                },
                columns: [
                    {data: 'id',  render : function(data, type, row, meta){
                        return `<input type="checkbox" class="form-check-input">`
                    }},
                    {data: 'employee_card_id'},
                    {data: 'id', render : function(data, type, row, meta){
                        if(row.mid_name==null){
                            row.mid_name = '';
                        }
                        return row.f_name+' '+row.l_name;
                    } },
                    {data: 'position_id', render : function(data, type, row, meta){
                            let position = '';
                            if(row.position!=null){
                                position = row.position.name_th;
                            }
                            return `<i class="fas fa-cog text-warning mr-1"></i>${position}`;
                        } },
                    {data: 'company_id', render : function(data, type, row, meta){
                            let company = 'ทดลองงาน';
                            if(row.company !=null){
                                company = row.company.name_th;
                            }
                            return `${company}`;
                        } },
                    {data: 'id', render : function(data, type, row, meta) {
                            let status_txt = 'ใช้งาน'
                            let status_color = 'success';
                            if (row.record_status == 1){
                                status_txt = 'ไม่ใช้งาน'
                                status_color = 'muted';
                            } if(row.company ==null){
                                status_txt = 'รอทดลองงาน'
                                status_color = 'warning';

                            }
                            return `<span class="badge rounded-pill badge-${status_color}" text-capitalized="">${status_txt}</span>`
                        }},
                    {data: 'id', render : function(data, type, row, meta){
                            return `<div class="d-inline-block text-nowrap">
                                <button class="btn btn-sm btn-text-secondary rounded-pill" data-bs-toggle="dropdown"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                                <div class="dropdown-menu dropdown-menu-end m-0">
                                    <a href="#" class="dropdown-item"><i class="fas fa-eye text-success mr-1"></i><span>ดู</span></a>
                                    <a href="#" class="dropdown-item"><i class="fas fa-pencil text-warning mr-1"></i><span>แก้ไข</span></a>
                                    <a href="#" class="dropdown-item delete-record"><i class="fas fa-trash-alt text-red mr-1"></i><span>ลบ</span></a>
                                </div>
                            </div>`
                        } },
                ],
                columnDefs: [
                    // { responsivePriority: 1, targets: [1,2] },
                ],
            });
        })
    </script>
@stop
