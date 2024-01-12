@extends("adminlte::page")

@section('content_header_title')
            เพิ่มรายละเอียดแม่แบบเงินเดือน
@stop
@section('content_header')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">หน้าแรก</a></li>
    <li class="breadcrumb-item active"> เพิ่มรายละเอียดแม่แบบเงินเดือน </li>
@stop
@section('css')
    <style>
        .dataTables_length {
            position: absolute;
        }
    </style>
@stop
{{-- end header --}}
@section('content')
    <div class="card">
        <!-- <div class="card-header">
            <h6 class="">ตัวเลือกการค้นหา</h6>
            <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
                <div class="col-md-3 user_plan">
                    <select id="company_id" class="form-select text-capitalize select2 list-filter">
                        <option value="-1"> -- บริษัท -- </option>
{{--                        @foreach ($companies as $company)--}}
{{--                            <option value="{{ $company->id }}">{{ $company->name_th }}</option>--}}
{{--                        @endforeach--}}
                        <option value="0">ทดลองงาน</option>
                    </select>
                </div>
                <div class="col-md-3 user_role">
                    <select id="department_id" class="form-select text-capitalize select2">
                        <option value=""> -- แผนก --</option>
                        <option value="Admin">Admin</option>
                        <option value="Author">Author</option>
                        <option value="Editor">Editor</option>
                        <option value="Maintainer">Maintainer</option>
                        <option value="Subscriber">Subscriber</option>
                    </select>
                </div>
                <div class="col-md-3 user_role">
                    <select id="position_id" class="form-select text-capitalize select2">
                        <option value=""> -- ดำแหน่ง --</option>
                        <option value="Admin">Admin</option>
                        <option value="Author">Author</option>
                        <option value="Editor">Editor</option>
                        <option value="Maintainer">Maintainer</option>
                        <option value="Subscriber">Subscriber</option>
                    </select>
                </div>
                <div class="col-md-3 user_status">
                    <select id="FilterTransaction" class="form-select text-capitalize select2">
                        <option value=""> -- สถานะ -- </option>
                        <option value="Pending" class="text-capitalize">Pending</option>
                        <option value="Active" class="text-capitalize">Active</option>
                        <option value="Inactive" class="text-capitalize">Inactive</option>
                    </select>
                </div>
            </div>
        </div> -->
        <div class="card-body ">
        <a href="/saraly/template/detail/add" class="btn btn-sm rounded-pill btn-add btn-danger" data-ac="add"><em class="fas fa-plus"></em></a>
            <table class="table dt-responsive w-100 nowrap mt-2" id="data_tables" aria-describedby="data_tables">
                <thead class="border-top table-light">
                <tr>
                    {{--                    <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1" style="width: 1px; display: none;" aria-label=""></th> --}}
                    {{-- <th class="dt-checkboxes-cell dt-checkboxes-select-all" data-col="1" aria-label=""><input type="checkbox" class="form-check-input"></th> --}}
                    <th>#</th>
                    <th>ชื่อแม่แบบ</th>
                    <th>ชื่อ</th>
                    <th>ตำแหน่ง</th>
                    <th>ฝั่ง</th>
                    <th>จัดการ</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

    
@stop


@section('js')
    <script>
    $(() => {
        var list_table = $("#data_tables").DataTable({
                pageLength: 25,
                responsive: true,
                processing: true,
                serverSide: true,
                serverMethod: 'post',
                ajax: {
                    url: '{{ route('api.v1.salary.template.detail.list') }}',
                    type: 'POST'
                },
                columns: [
                    {
                        data: "id"
                    },
                    {
                        data: "id",
                        render: function(data, type, row, meta) {
                            return row.template_salary.template_name;
                        }
                    },
                    {
                        data: "template_name_detail"
                    },
                    {
                        data: "position"
                    },
                    {
                        data: "id",
                        render: function(data, type, row, meta) {
                            if(row.type == "left"){
                                return "ซ้าย";
                            }else if(row.type == "right"){
                                return "ขวา";
                            }
                            
                        }
                    },
                    {
                        data: "id",
                        render: function(data, type, row, meta) {
                            info_button =
                                `<a data-id="${row.id}" data-ac="edit" data-bs-toggle="modal" data-bs-target="#departmentModal" class="btn btn-xs rounded-pill text-es-pink btn-edit"><i class="fas fa-edit"></i></a>`;
                            info_button +=
                                `<a data-id="${row.id}" class="btn btn-xs rounded-pill text-es-red btn-delete"><i class="fas fa-trash-alt"></i></a>`;
                            return info_button;
                        }
                    },
                    
                ],
                "dom": '<"top my-1 mr-1"lf>rt<"bottom d-flex position-absolute w-100 justify-content-between px-1 mt-3" ip  ><"clear">'
            });
        }); 
    </script>
@stop
