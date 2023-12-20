@extends("adminlte::page")

@section('content_header_title')
เพิ่มพนักงานเข้าร่วมกิจกรรม
@stop
@section('content_header')
<li class="breadcrumb-item"><a href="{{ url('/home') }}">หน้าแรก</a></li>
<li class="breadcrumb-item active"> เพิ่มพนักงานเข้าร่วมกิจกรรม </li>
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
    <div class="card-header">
        <h6 class="">ตัวเลือกการค้นหา</h6>
        <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
            <div class="col-md-3 ">
                <select class="form-select select2" id="company">
                    <option value=""> -- บริษัท --</option>
                    @foreach($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name_th }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-select select2" id="department">
                    <option value=""> -- แผนก --</option>
                    <!-- @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name_th }}</option>
                        @endforeach -->
                </select>
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary btn-add" style="width: 100%;">
                    <div class="d-flex justify-content-center align-items-center">
                        <i class="fas fa-user-plus" style="margin-right: 5px;"></i>
                        <p class="name-btn mt-3">สร้างรายชื่อ</p>
                    </div>
                </button>

            </div>
            <div class="col-md-3">

            </div>
        </div>
    </div>

    <div class="card-body ">
        <h5>เลือกผู้เข้าร่วมกิจกรรม</h5>
        <hr>
        <div class="content">
        <div class="row">
            <div class="col-4">
                <h6>ชื่อ-นามสกุล</h6>
            </div>
            <div class="col-8">
                <h6>เลือก</h6>
                <input class="form-check-input ml-2" type="checkbox">
            </div>
        </div>
        <div class="row">
            <hr class="mt-3"> 
            <div class="col-4">
                <p>นายรัชโรจน์ อ่างทอง</p>
            </div>
            <div class="col-8">
                <div class="row">
                    <div class="col-1">
                        <input class="form-check-input ml-2" type="checkbox">
                    </div>
                    <div class="col-11">
                        <div class="row">
                            <div class="col-4">
                                <input class="input-group-text" type="text" placeholder="remark">
                            </div>
                            <div class="col-4">
                                <input class="input-group-text" type="text" placeholder="remark">
                            </div>
                            <div class="col-4">
                                <input class="input-group-text" type="text" placeholder="remark">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    </div>
    @stop


    @section('js')
    <script>
        $(() => {
            $('#company').select2();
            $('#department').select2();

            $('#company').on('select2:select', function(e) {
                // var data = e.params.data;
                // console.log(data);
                getDepartmentByCompany();

            });

            function getDepartmentByCompany() {
                var company = $('#company').select2('data')[0].id;
                console.log(company);
                $.ajax({
                    type: 'post',
                    url: "{{ route('api.v1.department.by.company.id') }}",
                    data: {
                        'company_id': company,
                    },
                    dataType: "json",
                    success: function(response) {
                        //console.log(response);
                        const list = document.getElementById('department');
                        list.textContent = '';
                        response.forEach(function(departmentlist) {
                            var departmentContainer = $("#department");
                            var departmentId = departmentlist.id;
                            var departmentName = departmentlist.name_th;
                            var departmentItem = `
                                <option  value="${ departmentId }">${ departmentName }</option>
                                 `;
                            departmentContainer.append(departmentItem);
                        });
                    },

                });
            }


            $(document).on('click', '.btn-add', function() {
                getListEmployeesAndCreate();
            })

            function getListEmployeesAndCreate() {
                var tas_id = "{{ $param }}";
                var company = $('#company').select2('data')[0].id;
                var department = $('#department').select2('data')[0].id;
                console.log(company, department);
                $.ajax({
                    type: 'post',
                    url: "{{ route('api.v1.employee.get.by.company.and.department') }}",
                    data: {
                        'company_id': company,
                        'department_id': department,
                        'tas_id': tas_id,
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        if (response.status == 'Success') {
                            Swal.fire({
                                title: 'สร้างรายชื่อเรียบร้อยแล้ว',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 2000,
                                toast: true
                            });
                        } else {
                            Swal.fire({
                                title: 'ไม่สามารถสร้างรายชื่อเพิ่มได้',
                                icon: 'warning',
                                showConfirmButton: false,
                                timer: 2000,
                                toast: true
                            })
                        }
                    },

                });

            }
        });
    </script>
    @stop