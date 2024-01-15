@extends("adminlte::page")

@section('content_header_title')
    รายละเอียดการอบรมและสัมมนา
@stop
@section('content_header')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">หน้าแรก</a></li>
    <li class="breadcrumb-item"><a href="{{ url('/tas/list') }}">การอบรมและสัมมนา</a></li>
    <li class="breadcrumb-item active"> รายละเอียดการอบรมและสัมมนา </li>
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
            <h3 class="title" id="title">ชื่อกิจกรรม</h3>
            <h6 class="date" id="date">วันที่ทำกิจกรรม</h6>
            <table class="table dt-responsive w-100 nowrap" id="data_tables" aria-describedby="data_tables">
                <thead class="border-top table-light">
                <tr>
                    {{-- <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1" style="width: 1px; display: none;" aria-label=""></th> --}}
                    {{-- <th class="dt-checkboxes-cell dt-checkboxes-select-all" data-col="1" aria-label=""><input type="checkbox" class="form-check-input"></th> --}}
                    <th>#</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>ชื่อเล่น</th>
                    <th>แผนก</th>
                    <th>สถานะการเข้าร่วม</th>
                    <th>สถานะใบเซอร์</th>
                    <th>โน๊ต1</th>
                    <th>โน๊ต2</th>
                    <th>โน๊ต3</th>
                    <th>จัดการ</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

        <div class="modal fade" id="editremarkModal" tabindex="-1" aria-labelledby="editremarkModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editremarkModalLabel">แก้ไข</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editremarkForm">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                            <label for="remark1" class="col-form-label">โน๊ต1 :</label>
                            <input type="text" class="form-control" id="remark1" name="remark1" required>
                    </div>
                    <div class="mb-3">
                            <label for="remark2" class="col-form-label">โน๊ต2 :</label>
                            <input type="text" class="form-control" id="remark2" name="remark2" required></input>
                    </div>
                    <div class="mb-3">
                            <label for="remark3" class="col-form-label">โน๊ต3 :</label>
                            <input type="text" class="form-control" id="remark3" name="remark3" required></input>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                <button type="button" class="btn btn-primary btn-save">บันทึก</button>
            </div>
        </div>
    </div>
</div>    
@stop


@section('js')
    <script>
    $(() => {
        var tas_id = "{{ $param }}";
        var list_table = $("#data_tables").DataTable({
                pageLength: 25,
                responsive: true,
                processing: true,
                serverSide: true,
                serverMethod: 'post',
                ajax: {
                    url: '{{ route('api.v1.tasemployees.list') }}',
                    type: 'POST',
                    data: {
                        'tas_id': tas_id
                    },
                    dataType: "json",
                },
                columns: [
                    {
                        data: "id"
                    },
                    {
                        data: "id",
                        render: function(data, type, row, meta) {
                            info_button =
                                `<p>${row.employees.f_name}  ${row.employees.l_name}</p>`;
                            
                            return info_button;
                        }
                    },
                    {
                        data: "id",
                        render: function(data, type, row, meta) {
                            info_button =
                                `<p>${row.employees.n_name}</p>`;
                            
                            return info_button;
                        }
                    },
                    {
                        data: "id",
                        render: function(data, type, row, meta) {
                            info_button =
                                `<p>${row.employees.position.name_th}</p>`;
                            
                            return info_button;
                        }
                    },
                    {
                        data: "id",
                        render: function(data, type, row, meta) {
                        if(row.participate_status==0){
                            return "ยังไม่เข้าร่วม";
                        }else if(row.participate_status==1){
                            return "เข้าร่วมแล้ว";
                        };
                        }
                    },
                    {
                        data: "id",
                        render: function(data, type, row, meta) {
                        if(row.cert_status==0){
                            return "ยังไม่ได้รับ";
                        }else if(row.cert_status==1){
                            return "ได้รับแล้ว";
                        };
                        }
                    },
                    
                    {
                        data: "remark1"
                    },
                    {
                        data: "remark2"
                    },
                    {
                        data: "remark3"
                    },
                    {
                        data: "id",
                        render: function(data, type, row, meta) {
                            info_button =
                                `<a data-id="${row.id}" data-tas_id="${row.tas_id}" class="btn btn-xs rounded-pill text-es-red btn-edit"><i class="fas fa-edit"></i></a>`;
                            info_button +=
                                `<a data-id="${row.id}" data-tas_id="${row.tas_id}" class="btn btn-xs rounded-pill text-es-red btn-delete"><i class="fas fa-trash-alt"></i></a>`;
                            
                            return info_button;
                        }
                    },
                ],
                "dom": '<"top my-1 mr-1"lf>rt<"bottom d-flex position-absolute w-100 justify-content-between px-1 mt-3" ip  ><"clear">'
            });

            var tas_id = "{{ $param }}";
            $.ajax({
                    type: 'POST',
                    url: "{{ route('api.v1.tas.by.id') }}",
                    data: {
                        'id': tas_id
                    },
                    dataType: "json",
                    success: function(response) {
                        var monthNames = ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม",
                        "มิถุนายน", "กรกฎาคม",
                        "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
                    ];
                    
                        console.log(response);
                        $("#title").text(response.title);
                        $("#date").text(response.day_start + " " + monthNames[response.month_start - 1] + " " +response.year_start + " " + "-" + " " +response.day_end + " " + monthNames[response.month_end - 1] + " " +response.year_end);
                    }
                });

                $(document).on('click', '.btn-delete', function() {
                let obj = $(this);
                let id = obj.data('id');
                let tas_id = obj.data('tas_id');
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
                            url: "{{ route('api.v1.tasemployees.delete') }}",
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

            var edit_modal = $("#editremarkModal");
            $(document).on('click', '.btn-edit', function() {
                let id = $(this).data('id');
                $.ajax({
                    type: 'post',
                    url: "{{ route('api.v1.tasemployees.by.id') }}",
                    data: {
                        'id': id
                    },
                    dataType: "json",
                    success: function(response) {
                        setEditFormData(response);
                        $("#id").val(response.id);
                        edit_modal.modal('show')
                    }
                });
                
            })

            function setEditFormData(data) {
                $("#id").val(data.id);
                $("#remark1").val(data.remark1);
                $("#remark2").val(data.remark2);
                $("#remark3").val(data.remark3);
                
            }


            $(document).on('click', '.btn-save', function() {
                let id = $(this).data('id');
                let editremarkForm = $("#editremarkForm");
                if (editremarkForm.valid()) {
                    const formData = new FormData($("#editremarkForm")[0]);
                    const data = Object.fromEntries(formData.entries());
                    $.ajax({
                            type: 'post',
                            url: "{{ route('api.v1.tasemployees.update') }}",
                            data: data,
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
                                    edit_modal.modal('hide');
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
                } else {
                    Swal.fire({
                        title: 'กรุณาตรวจสอบข้อมูล',
                        icon: 'warning',
                        showConfirmButton: false,
                        timer: 2000,
                        toast: true
                    });
                }
            })
        }); 
    </script>
@stop
