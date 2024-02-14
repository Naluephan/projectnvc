@extends("adminlte::page")

@section('content_header_title')
    ระดับพนักงาน
@stop
@section('content_header')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">หน้าแรก</a></li>
    <li class="breadcrumb-item active"> ระดับพนักงาน </li>
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
        <button class="btn btn-sm rounded-pill btn-add btn-danger" data-ac="add"><em class="fas fa-plus"></em></button>
            <table class="table dt-responsive w-100 nowrap" id="data_tables" aria-describedby="data_tables">
                <thead class="border-top table-light">
                <tr>
                    {{--                    <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1" style="width: 1px; display: none;" aria-label=""></th> --}}
                    {{-- <th class="dt-checkboxes-cell dt-checkboxes-select-all" data-col="1" aria-label=""><input type="checkbox" class="form-check-input"></th> --}}
                    <th>#</th>
                    
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
       
        }); 
    </script>
@stop
