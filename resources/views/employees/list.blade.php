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

    <!-- <div class="row mb-2">
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="me-1">
                            <p class="text-heading mb-2">พนักงานทั้งหมด</p>
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
                            <p class="text-heading mb-2">พนักงานประจำ</p>
                            <div class="d-flex align-items-center">
                                <h4 class="mb-2 me-1 display-6">180</h4>
                                <p class="text-success mb-2">(+18%)</p>
                            </div>
                            <p class="mb-0">ชาย (100) / หญิง (90)</p>
                        </div>
                        <div class="avatar">
                            <div class="avatar-initial bg-label-danger rounded text-lg">
                                <i class="fa-solid fa-users-line p-2 rounded-2 bg-primary-subtle text-white"></i>
                                {{--                                <i class="fa-solid fa-venus-mars p-2 rounded-2 bg-primary-subtle text-white"></i> --}}
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
                            <p class="text-heading mb-2">ทดลองงาน</p>
                            <div class="d-flex align-items-center">
                                <h4 class="mb-2 me-1 display-6">19</h4>
                                <p class="text-danger mb-2">(14%)</p>
                            </div>
                            <p class="mb-0">ชาย (1) / หญิง (18)</p>
                        </div>
                        <div class="avatar">
                            <div class="avatar-initial bg-label-success rounded text-lg">
                                <i class="fa-solid fa-users-between-lines p-2 rounded-2 bg-danger-subtle text-danger"></i>
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
                            <p class="text-heading mb-2">ลาหยุด</p>
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

    </div> -->


    <div class="card">
        <!-- <div class="card-header">
            <h6 class="">ตัวเลือกการค้นหา</h6>
            <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
                <div class="col-md-3 user_plan">
                    <select id="company_id" class="form-select text-capitalize select2 list-filter">
                        <option value="-1"> -- บริษัท -- </option>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name_th }}</option>
                        @endforeach
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
            <table class="table dt-responsive w-100 nowrap" id="data_tables" aria-describedby="data_tables">
                <thead class="border-top table-light">
                    <tr>
                        {{--                    <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1" style="width: 1px; display: none;" aria-label=""></th> --}}
                        {{-- <th class="dt-checkboxes-cell dt-checkboxes-select-all" data-col="1" aria-label=""><input type="checkbox" class="form-check-input"></th> --}}
                        <th>รหัสบัตร</th>
                        <th>ชื่อ - สกุล</th>
                        <th>ตำแหน่ง</th>
                        <th>บริษัท</th>
                        <th>สถานะ</th>
                        <th>จัดการ</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        @include('partials.detailModal')
    @stop
    @section('js')
        <script>
            $(() => {
                $(".select2").select2({
                    width: "100%",
                });
                var list_table = $('#data_tables').DataTable({
                    pageLength: 25,
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    serverMethod: 'post',
                    ajax: {
                        url: '{{ route('api.v1.employee.list') }}',
                        type: "post",
                        data: function(d) {
                            d._token = "{{ csrf_token() }}";
                            d.company_id = $("#company_id").val();
                        },

                    },
                    columns: [
                        // {data: 'id',  render : function(data, type, row, meta){
                        //     return `<input type="checkbox" class="form-check-input">`
                        // }},
                        {
                            data: 'employee_code'
                        },
                        {
                            data: 'id',
                            render: function(data, type, row, meta) {
                                if (row.mid_name == null) {
                                    row.mid_name = '';
                                }
                                profile_img = `{{ asset('uploads/images/employee/profilef.png') }}`;
                                if (row.gender_id == 1) {
                                    profile_img = `{{ asset('uploads/images/employee/profile.png') }}`
                                }
                                if (row.image) {
                                    profile_img = `{{ asset('uploads/images/employee/') }}/${row.company.order_prefix.toLowerCase()}/${row.image}`
                                }
                                return `<div class="d-flex justify-content-start align-items-center user-name">
                            <img src="${profile_img}" alt="Profile" class="img-thumbnail img-size-50 rounded-circle">
                                <div class="d-flex flex-column ml-2">
                                    <a href="#" class="text-heading text-truncate">
                                        <span class="fw-medium">${row.f_name}</span></a><small>${row.l_name}</small>
                                </div>
                        </div>`
                            }
                        },
                        {
                            data: 'position_id',
                            render: function(data, type, row, meta) {
                                let position = '';
                                let icon = 'fa-cog ';
                                if (row.position != null) {
                                    position = row.position.name_th;
                                    // icon = row.position.icon;
                                }
                                return `<i class="fas ${icon} text-warning mr-1"></i>${position}`;
                            }
                        },
                        {
                            data: 'company_id',
                            render: function(data, type, row, meta) {
                                let company = 'ทดลองงาน';
                                if (row.company != null) {
                                    company = row.company.name_th;
                                }
                                return `${company}`;
                            }
                        },
                        {
                            data: 'id',
                            render: function(data, type, row, meta) {
                                let status_txt = 'พนักงาน'
                                let status_color = 'success';
                                if (row.record_status == 0) {
                                    status_txt = 'ลาออก'
                                    status_color = 'muted';
                                }
                                if (row.company == null) {
                                    status_txt = 'ทดลองงาน'
                                    status_color = 'warning';

                                }
                                return `<span class="badge rounded-pill badge-${status_color}" text-capitalized="">${status_txt}</span>`
                            }
                        },
                        {
                            data: 'id',
                            render: function(data, type, row, meta) {
                                let url = "{{ route('emp.detail', "__id") }}".replaceAll("__id",row.id);
                                return `<div class="d-inline-block text-nowrap">
                                <button class="btn btn-sm btn-text-secondary rounded-pill" data-bs-toggle="dropdown"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                                <div class="dropdown-menu dropdown-menu-end m-0">
                                    <a href="${url}" data-id="${row.id}" class="dropdown-item"><i class="fas fa-eye text-success mr-1"></i><span>ดู</span></a>
                                    <a href="#" data-id="${row.id}" class="dropdown-item"><i class="fas fa-pencil text-warning mr-1"></i><span>แก้ไข</span></a>
                                    <a href="#" data-id="${row.id}" class="dropdown-item delete-record"><i class="fas fa-trash-alt text-red mr-1 "></i><span>ลบ</span></a>
                                </div>
                            </div>`
                            }
                        },
                    ],
                    columnDefs: [
                        // { responsivePriority: 1, targets: [1,2] },
                    ],
                });

                $(document).on('change', '.list-filter', function() {
                    list_table.ajax.reload();
                })

                $(document).on('click', '.delete-record', function() {
                    const id = $(this).data('id');
                    Swal.fire({
                        title: 'ยืนยันการลบรายการ?',
                        text: "ต้องการดำเนินการใช่หรือไม่!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#a7c957',
                        cancelButtonColor: '#646464',
                        confirmButtonText: 'ยืนยัน',
                        cancelButtonText: 'ปิด'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "post",
                                url: "{{ route('api.v1.delete.employee') }}",
                                data: {
                                    'id': id,
                                    'record_status': 0
                                },
                                dataType: "json",
                                success: function(response) {
                                    if (response) {
                                        Swal.fire({
                                            position: 'center-center',
                                            icon: 'success',
                                            title: 'ลบรายการสำเร็จ',
                                            showConfirmButton: false,
                                            timer: 1500
                                        })
                                        $('.btn-reset').click();
                                        list_table.ajax.reload(null, false);
                                    } else {
                                        Swal.fire({
                                            position: 'center-center',
                                            icon: 'error',
                                            title: 'ลบรายการไม่สำเร็จ',
                                            showConfirmButton: false,
                                            timer: 1500
                                        })
                                    }
                                }
                            });
                        }
                    });
                })

                $(document).on('click', '.view-detail', function() {
                    let id = $(this).data('id');
                    $('#emp-detail').modal('show');
                    $.ajax({
                        type: 'post',
                        url: "{{ route('api.v1.find.employee.by.id') }}",
                        data: {
                            'id': id
                        },
                        dataType: "json",
                        success: function(data) {
                            console.log(data);
                            full_name = data.pre_name + data.f_name + ' ' + data.l_name + ' (' +
                                data.n_name + ')';
                            full_name2 = data.pre_name + data.f_name + ' ' + data.l_name;
                            position = 'ตำแหน่ง ' + data.position.name_th;
                            formattedDate = convertDateFormat(data.birthday);

                            profile_img = `{{ asset('uploads/images/employee/profilef.png') }}`;
                            if (data.gender_id == 1) {
                                profile_img = `{{ asset('uploads/images/employee/profile.png') }}`
                            }
                            if (data.image) {
                                profile_img =
                                    `{{ asset('uploads/images/employee/') }}/${data.image}`
                            }

                            $('#full_name').text(full_name);
                            $('#full_name2').text(full_name2);
                            $('#company').text(data.company.name_th);
                            $('#position').text(position);
                            $('#phone').text(data.mobile);
                            $('#address').text(data.current_add);
                            $('#employee_card_id').text(data.employee_card_id);
                            $('#birthday').text(formattedDate);
                            $('#profile').attr('src', profile_img);

                        },
                    });
                });

                function convertDateFormat(inputDate) {
                    // แยกปี เดือน และวัน
                    var parts = inputDate.split('-');
                    var year = parts[0];
                    var month = parts[1];
                    var day = parts[2];

                    // แปลงเดือนเป็นชื่อเดือน
                    var monthNames = [
                        "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน",
                        "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
                    ];
                    var monthName = monthNames[parseInt(month, 10) - 1];

                    // แสดงผลลัพธ์
                    var result = day + " " + monthName + " พ.ศ. " + year;

                    return result;
                }


            })
        </script>
    @stop
