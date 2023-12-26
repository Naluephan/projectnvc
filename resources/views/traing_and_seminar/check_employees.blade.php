@extends("adminlte::page")

@section('content_header_title')
    เช็คชื่อพนักงาน
@stop
@section('content_header')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">หน้าแรก</a></li>
    <li class="breadcrumb-item"><a href="{{ url('/tas/list') }}">การอบรมและสัมมนา</a></li>
    <li class="breadcrumb-item active"> เช็คชื่อพนักงาน </li>
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
        <h5>ผู้เข้าร่วมกิจกรรม</h5>
        <hr>
        <div class="content">
        <div class="row">
            <div class="col-1 text-center">
                <h6>ลำดับ</h6>
            </div>
            <div class="col-9">
                <h6>รหัส ชื่อ-นามสกุล</h6>
            </div>
            <div class="col-2">
                <h6>เลือก</h6>
                <input class="form-check-input ml-2 checkAllCheckbox checkPresent checkAllPresent checkAllPresentLow" type="checkbox" id="checkAll">
            </div>
        </div>
        <div class="row employeeslist" id="employeeslist">
        
        </div>
        <div class="row" >
            <div class="col-10">
                
            </div>
            <div class="col-2">
                <div class="row">
                    <div class="col-6">
                    <button class="btn btn-primary btn-add" style="width: fit-content;">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <i class="fas fa-user-plus" style="margin-right: 5px;"></i>
                                            <p class="btn-checkname mt-3">เช็คชื่อ</p>
                                        </div>
                                    </button>
                    </div>
                    <div class="col-6">
                    <button class="btn btn-primary btn-add" style="width: fit-content;">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <p class="btn-cert mt-3">ใบรับรอง</p>
                                        </div>
                                    </button>
                    </div>
                </div>
                
            </div>
        </div>
        </div>

@stop


@section('js')
    <script>
    $(() => {
        var tas_id = "{{ $param }}";
        $.ajax({
                    type: 'post',
                    url: "{{ route('api.v1.employee.get.by.tas') }}",
                    data: {
                        'tas_id': tas_id,
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        const employeesContainer = document.getElementById('employeeslist');
                        response.forEach(function (employeesInfo, index) {
                        var employeesFName = employeesInfo.employees.f_name;
                        var employeesLName = employeesInfo.employees.l_name;
                        var employeesCode = employeesInfo.employees.employee_code;
                        var employeesId = employeesInfo.employees.id;
                        var participateStatus = employeesInfo.participate_status;
                        var isChecked = participateStatus == 1 ? 'checked' : '';

                        var employeesItem = `
                        <hr class="mt-3"> 
                            <div class="col-1 text-center">
                            <p > ${index+1} </p>
                            </div>
                            <div class="col-9 list-1" id=emp-${index} data-emp_id=${employeesId}>
                                <p > ${employeesCode} ${employeesFName} ${employeesLName}</p>
                            </div>
                            <div class="col-2">
                                <input class="form-check-input ml-2 checkBoxClass checkPresent checkRow " type="checkbox" id="check-${employeesId}" name="check-${employeesId}" value="1" ${isChecked}>
                            </div>
                        `;

                        employeesContainer.innerHTML += employeesItem;
                        });
                    },

                    
                });

                let clickCount = 0;
            $(document).on('click', '.checkAllCheckbox', function() {
                clickCount++;
                if (clickCount % 2 === 0) {
                    $(".checkBoxClass").prop("checked", false);
                } else {
                    $(".checkBoxClass").prop("checked", true);
                }
            });

            function constructData() {
                var tas_id = "{{ $param }}";
                var employees = [];
                $(".list-1").each(function(key, obj) {
                    var emp = $(obj);
                    var empId = emp.data('emp_id');
                    var isChecked = $('#check-' + empId).prop('checked'); // เช็กค่าของ checkbox
                    var checkboxValue = $('#check-' + empId).val();
                    var data = {
                        tas_id: tas_id,
                        emp_id: empId,
                        check: isChecked ? checkboxValue : 0, 
                    };
                    console.log(data)
                    employees.push(data);
                });
                return employees;
            }

            $(document).on('click', '.btn-checkname', function() {
                var empdata = constructData();
                var jsonData = JSON.stringify(empdata);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('api.v1.employee.update.status.participate') }}",
                    data: jsonData,
                    dataType: "json",
                    contentType: "application/json",
                    success: function(response) {
                        console.log(response);
                        if (response.status == 'Success') {
                            Swal.fire({
                                title: 'ดำเนินการเรียบร้อยแล้ว',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 2000,
                                toast: true
                            });
                        } else {
                            Swal.fire({
                                title: 'เกิดข้อผิดพลาด',
                                icon: 'warning',
                                showConfirmButton: false,
                                timer: 2000,
                                toast: true
                            })
                        }
                    }
                });
            })

            $(document).on('click', '.btn-cert', function() {
                var empdata = constructData();
                var jsonData = JSON.stringify(empdata);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('api.v1.employee.update.status.cert') }}",
                    data: jsonData,
                    dataType: "json",
                    contentType: "application/json",
                    success: function(response) {
                        console.log(response);
                        if (response.status == 'Success') {
                            Swal.fire({
                                title: 'ดำเนินการเรียบร้อยแล้ว',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 2000,
                                toast: true
                            });
                        } else {
                            Swal.fire({
                                title: 'เกิดข้อผิดพลาด',
                                icon: 'warning',
                                showConfirmButton: false,
                                timer: 2000,
                                toast: true
                            })
                        }
                    }
                });
            })

        }); 
    </script>
@stop
