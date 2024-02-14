@extends("adminlte::page")

@section('content_header_title')
            ประวัติการลางาน
@stop
@section('content_header')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">หน้าแรก</a></li>
    <li class="breadcrumb-item active"> ประวัติการลางาน </li>
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
            <table class="table dt-responsive w-100 nowrap mt-2" id="data_tables" aria-describedby="data_tables">
                <thead class="border-top table-light">
                <tr>
                    {{--                    <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1" style="width: 1px; display: none;" aria-label=""></th> --}}
                    {{-- <th class="dt-checkboxes-cell dt-checkboxes-select-all" data-col="1" aria-label=""><input type="checkbox" class="form-check-input"></th> --}}
                    <th>#</th>
                    <th>รหัสพนักงาน</th>
                    <th>ชื่อ</th>
                    <th>ประเภทการลา</th>
                    <th>สถานะการลาจากหัวหน้า</th>
                    <th>สถานะการลาจากฝ่ายบุคคล</th>
                    <th>รายละเอียดการลา</th>
                    <th>จัดการ</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

    <div class="modal fade" id="leavedetailModal" tabindex="-1" aria-labelledby="leavedetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="leavedetailModalLabel">รายละเอียดการลา</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="leavedetailForm">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-6">
                                <label for="name_th" class="col-form-label">ชื่อ :</label>
                                <p class="emp_name" id="emp_name"> </p>
                            </div>
                            <div class="col-6">
                                <label for="name_en" class="col-form-label">ประเภทการลา :</label>
                                <p class="leave_type"> </p>
                            </div>
                        </div>  
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-6">
                                <label for="name_th" class="col-form-label">วันที่เริ่มลา :</label>
                                <p class="leave_date_start" id="leave_date_start"></p>
                            </div>
                            <div class="col-6">
                                <label for="name_en" class="col-form-label">วันสิ้นสุดการลา :</label>
                                <p class="leave_date_end" id="leave_date_end"></p>
                            </div>
                        </div>  
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-6">
                                <label for="name_th" class="col-form-label">จำนวนวันที่ลา :</label>
                                <p class="leave_day" id="leave_day"></p>
                            </div>
                            <div class="col-6">
                                <label for="name_en" class="col-form-label">จำนวนชั่วโมงที่ลา :</label>
                                <p class="leave_hours" id="leave_hours"></p>
                            </div>
                        </div>  
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-6">
                                <label for="name_th" class="col-form-label">สถานะการลาหัวหน้า :</label>
                                <p class="status_manager">อนุมัติ</p>
                            </div>
                            <div class="col-6">
                                <label for="name_en" class="col-form-label">สถานะการลาฝ่ายบุคคล :</label>
                                <p class="status_hr" id="status_hr">อนุมัติ</p>
                            </div>
                        </div>  
                    </div>
                    <div class="mb-3">
                            <div class="col-12">
                                <label for="name_th" class="col-form-label">รายละเอียด :</label>
                                <p class="leave_detail"> </p>
                            </div>
                    </div>
                    <div class="mb-3">
                            <div class="col-12">
                                <label for="name_th" class="col-form-label">ภาพประกอบการลา :</label>
                                <div class="row">
                                    <div class="col-4 image_1" id="image_1">
                                        
                                    </div>
                                    <div class="col-4 image_2" id="image_2">
                                        
                                    </div>
                                    <div class="col-4 image_3" id="image_3">
                                        
                                    </div>
                                    <div class="col-4 image_4" id="image_4">
                                        
                                    </div>
                                    <div class="col-4 image_5" id="image_5">
                                        
                                    </div>
                                </div>
                            </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                <button type="button" class="btn btn-success approve-leave">อนุมัติ</button>
            </div>
        </div>
    </div>
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
                    url: '{{ route('api.v1.emp.leave.list') }}',
                    type: 'POST'
                },
                columns: [
                    {
                        data: "id"
                        ,
                            render: function(data, type, row, meta) {
                                return meta.row + 1
                            }
                    },
                    {
                        data: "id"
                        ,
                            render: function(data, type, row, meta) {
                                return row.emp.employee_code
                            }
                    },
                    {
                        data: "id"
                        ,
                            render: function(data, type, row, meta) {
                                let emp_f_name = "-";
                                let emp_l_name = "-";

                                if(row.emp != null){
                                    emp_f_name = row.emp.f_name;
                                    emp_l_name = row.emp.l_name;
                                }
                                return `<p>${emp_f_name} ${emp_l_name}</p>`
                            }
                    },
                    {
                        data: "id"
                        ,
                            render: function(data, type, row, meta) {
                                return `<p>${row.leave_type.leave_type_name}</p>`
                            }
                    },
                    {
                        data: "status_manager_approve"
                        ,
                            render: function(data, type, row, meta) {
                                if(row.status_manager_approve == 0){
                                    return `<p>รอการอนุมัติ</p>`
                                }else if(row.status_manager_approve == 1){
                                    return `<p>อนุมัติแล้ว</p>`
                                }
                            }
                    },
                    {
                        data: "status_hr__approve"
                        ,
                            render: function(data, type, row, meta) {
                                if(row.status_hr__approve == 0){
                                    return `<p>รอการอนุมัติ</p>`
                                }else if(row.status_hr__approve == 1){
                                    return `<p>อนุมัติแล้ว</p>`
                                }
                                
                            }
                    },
                    {   
                        data: "leave_detail"
                    },
                    {
                        data: 'id',
                            render: function(data, type, row, meta) {
                                return `<div class="d-inline-block text-nowrap">
                                <button class="btn btn-sm btn-text-secondary rounded-pill" data-bs-toggle="dropdown"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                                <div class="dropdown-menu dropdown-menu-end m-0">
                                    <a data-id="${row.id}" data-ac="detail" data-bs-toggle="modal" data-bs-target="#leavedetailModal" class="dropdown-item btn-detail"><i class="fas fa-eye text-success mr-1"></i><span>ดู</span></a>
                                    <a data-id="${row.id}" class="dropdown-item btn-delete"><i class="fas fa-trash-alt text-red mr-1 "></i><span>ลบ</span></a>
                                </div>
                            </div>`
                            }
                    },
                ],
                "dom": '<"top my-1 mr-1"lf>rt<"bottom d-flex  w-100 justify-content-between px-1 mt-3" ip  ><"clear">'
            });

            $(document).on('click', '.btn-delete', function() {
                let obj = $(this);
                let id = obj.data('id');
                Swal.fire({
                    title: 'ยืนยัน!! ลบข้อมูล',
                    text: "ต้องการดำเนินการใช่หรือไม่!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#e83e3e',
                    cancelButtonColor: '#bb93ab',
                    confirmButtonText: 'ยืนยัน',
                    cancelButtonText: 'ปิด'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'post',
                            url: "{{ route('api.v1.emp.leave.delete') }}",
                            data: {
                                'id': id
                            },
                            dataType: "json",
                            success: function(response) {
                                if (response.status == 'Success') {
                                    Swal.fire({
                                        title: 'ดำเนินการเรียบร้อยแล้ว',
                                        icon: 'success',
                                        showConfirmButton: false,
                                        timer: 2000,
                                        toast: true
                                    });
                                    list_table.ajax.reload(null, false);
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

                    }
                })
            })

            $(document).on('click', '.btn-detail', function() {
                let obj = $(this);
                let id = obj.data('id');
                $.ajax({
                    type: 'post',
                    url: "{{ route('api.v1.emp.leave.by.id') }}",
                    data: {
                       'id': id
                        },
                    dataType: "json",
                    success: function(response) {
                            const imageIds = ['image_1', 'image_2', 'image_3', 'image_4', 'image_5'];
                            // ใช้ลูปเพื่อลบเนื้อหาของทุก image element
                            imageIds.forEach(id => {
                                const imageElement = document.getElementById(id);
                                imageElement.textContent = '';
                            });

                            let data = response;
                            $("#id").val(data.id);
                            $('.emp_name').html(data.emp.f_name + " " + data.emp.l_name);
                            let leave_type = $('.leave_type');
                            leave_type.html(data.leave_type.leave_type_name);
                            let leave_date_start = $('.leave_date_start');
                            leave_date_start.html(data.leave_date_start);
                            let leave_date_end = $('.leave_date_end');
                            leave_date_end.html(data.leave_date_end);
                            let leave_day = $('.leave_day');
                            leave_day.html(data.leave_day);
                            let leave_hours = $('.leave_hours');
                            leave_hours.html(data.leave_hours);
                            let status_manager = $('.status_manager');
                            if (data.status_manager_approve === 0) {
                                status_manager.html('รอการอนุมัติ');
                            } else if (data.status_manager_approve === 1) {
                                status_manager.html('อนุมัติ');
                            }
                            let status_hr = $('.status_hr');
                            if (data.status_hr__approve === 0) {
                                status_hr.html('รอการอนุมัติ');
                            } else if (data.status_hr__approve === 1) {
                                status_hr.html('อนุมัติ');
                            }
                            let leave_detail = $('.leave_detail');
                            leave_detail.html(data.leave_detail);

                            // สร้าง array ของชื่อ class ของ elements ที่ต้องการเพิ่มรูปภาพ
                                var imageClasses = [".image_1", ".image_2", ".image_3", ".image_4", ".image_5"];

                                // สร้าง array ของชื่อ properties ของ data ที่ต้องการเข้าถึง
                                var dataProperties = ["leave_img1", "leave_img2", "leave_img3", "leave_img4", "leave_img5"];

                                // ใช้ลูปเพื่อเพิ่มรูปภาพในแต่ละ element
                                for (var i = 0; i < imageClasses.length; i++) {
                                    var imageClass = imageClasses[i];
                                    var dataProperty = dataProperties[i];
                                    
                                    // สร้าง element img
                                    var imageElement = $("<img>", {
                                        src: `https://newhr.organicscosme.com/uploads/images/rewardcoin/${data[dataProperty]}`,
                                        class: "img-thumbnail",
                                        alt: "...",
                                        style: "width: 100%; height: 100%; object-fit: cover;"
                                    });
                                    
                                    // เพิ่มรูปภาพลงใน element ที่เลือก
                                    $(imageClass).append(imageElement);
                                }
                    }
                });   
               
            })

            var leavedetail_modal = $("#leavedetailModal");
            $(document).on('click', '.approve-leave', function() {
                let id = $("#id").val();
                $.ajax({
                    type: 'post',
                    url: "{{ route('api.v1.emp.approve.status') }}",
                    data: {
                       'id': id
                        },
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 'Success') {
                                    Swal.fire({
                                        title: 'ดำเนินการเรียบร้อยแล้ว',
                                        icon: 'success',
                                        showConfirmButton: false,
                                        timer: 2000,
                                        toast: true
                                    });
                                    leavedetail_modal.modal('hide');
                                    list_table.ajax.reload(null, false);
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
