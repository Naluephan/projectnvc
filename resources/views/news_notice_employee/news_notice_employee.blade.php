@extends('adminlte::page')

@section('content_header_title')
    แจ้งเตือนพนักงาน
@stop
@section('content_header')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">หน้าแรก</a></li>
    <li class="breadcrumb-item active"> แจ้งเตือนพนักงาน </li>
@stop
@section('css')
    <style>
        .pre-line {
            white-space: pre-line;
        }
    </style>
@stop
@section('content')
    <div class="card">
        <div class="card-body ">
            <div class="mb-2">
                <button class="btn btn-sm rounded-pill btn-add btn-danger" data-bs-toggle="modal" data-bs-target="#myModal"><em
                        class="fas fa-plus"></em></button>
            </div>

            <table class="table dt-responsive w-100 nowrap" id="data_table" aria-describedby="data_table">
                <thead class="border-top table-light">
                    <tr>
                        <th scope="col" class="">#</th>
                        <th scope="col">ประเภท</th>
                        <th scope="col">หัวข้อข่าว</th>
                        <th scope="col">รายละเอียดข่าว</th>
                        <th scope="col">วันที่ประกาศ</th>
                        <th scope="col">สถานะ</th>
                        <th scope="col">จัดการ</th>
                    </tr>
                </thead>
                <tbody class="text-muted">

                </tbody>
            </table>
        </div>
    </div>

    {{-- Modal --}}

    <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="validForm">
                    <div class="modal-body">
                        <div class="container">
                            <div class="form-group mb-1">
                                <h4><span class="reg-modal-text"></span>เพิ่มประชาสัมพันธ์</h4>
                                <div class="breakline-primary w-40 mx-0"></div>
                            </div>
                            <div class="form-group row" id="noticeForm">
                                <div class="col-6">
                                    <label class="col-form-label">หัวข้อ :</label>
                                    <input type="text" class="form-control input-value" id="news_notice_name"
                                        name="news_notice_name" required>
                                </div>

                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-6">
                                            <label class="col-form-label">ประเภท :</label>
                                            <select class="form-select" id="notice_category_id" name="notice_category_id"
                                                required>
                                                <option selected>กรุณาเลือก</option>
                                                <option value="1">กิจกรรม</option>
                                                <option value="2">ข่าว</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label class="col-form-label">ลำดับความสำคัญ :</label>
                                            <select class="form-select" id="news_priority" name="news_priority" required>
                                                <option selected>กรุณาเลือก</option>
                                                <option value="1">สำคัญ</option>
                                                <option value="2">ทั่วไป</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="col-form-label">รายละเอียด :</label>
                                    <textarea class="form-control" id="news_notice_description" name="news_notice_description"></textarea>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success button btn-save">บันทึก</button>
                        <button type="button" class="btn btn-success button btn-update">อัพเดท</button>
                        <button type="button" class="btn btn-secondary button btn-reset"
                            data-bs-dismiss="modal">ยกเลิก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop


@section('js')
    <script>
        $(() => {
            var document_list = $('#data_table').DataTable({
                pageLength: 10,
                responsive: true,
                processing: true,
                serverSide: true,
                serverMethod: 'post',
                ajax: {
                    url: '{{ route('api.v1.news.notice.employee.lists') }}',
                    type: "post",
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                },
                columns: [{
                        data: 'id',
                        className: "text-center ",
                        render: function(data, type, row, meta) {
                            return meta.row + 1;
                        }
                    },
                    {
                        data: 'notice_category_id',
                        render: function(data, type, row, meta) {
                            return row.news_type.name_category;
                        }
                    },
                    {
                        data: 'news_notice_name',
                        render: function(data, type, row, meta) {
                            return `<p class="pre-line">${data}</p>`;
                        }
                    },
                    {
                        data: 'news_notice_description',
                        render: function(data, type, row, meta) {
                            return `<p class="pre-line">${data}</p>`;
                        }
                    },
                    {
                        data: 'created_at',
                        render: function(data, type, row, meta) {
                            // แยกสตริงวันที่
                            let dateParts = data.split('T')[0].split('-');
                            let year = parseInt(dateParts[0]);
                            let month = parseInt(dateParts[1]);
                            let day = parseInt(dateParts[2]);

                            // พิจารณาว่าเป็นปีอธิกสุรทินหรือไม่
                            let isLeapYear = (year % 4 === 0 && year % 100 !== 0) || (year % 400 ===
                                0);

                            // รับจำนวนวันในเดือน
                            let daysInMonth;
                            if (month === 2) {
                                daysInMonth = isLeapYear ? 29 : 28;
                            } else if ([4, 6, 9, 11].includes(month)) {
                                daysInMonth = 30;
                            } else {
                                daysInMonth = 31;
                            }

                            const thaiMonths = [
                                'มกราคม', 'กุมภาพันธ์', 'มีนาคม',
                                'เมษายน', 'พฤษภาคม', 'มิถุนายน',
                                'กรกฎาคม', 'สิงหาคม', 'กันยายน',
                                'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'
                            ];

                            // แปลงเป็นรูปแบบวันที่ไทย
                            let thaiDate;
                            if (day <= daysInMonth) {
                                thaiDate = `${day} ${thaiMonths[month - 1]} ${year + 543}`;
                            } else {
                                // หากวันไม่ถูกต้อง ให้คืนวันที่เดิม
                                thaiDate = data;
                            }

                            return thaiDate;
                        }
                    },
                    {
                        data: 'record_status',
                        render: function(data, type, row, meta) {
                            if (data === 1) {
                                return "กำลังประกาศ";
                            } else {
                                return "เลิกประกาศ";
                            }
                        }
                    },
                    {
                        data: 'record_status',
                        className: "text-center ",
                        render: function(data, type, row, meta) {
                            let icons = 'fa-edit'
                            return `<div class="d-inline-block text-nowrap">
                                <button class="btn btn-sm btn-text-secondary rounded-pill" data-bs-toggle="dropdown" style="border: 5;color: gray;"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                                <div class="dropdown-menu dropdown-menu-end m-0">
                                    <a href="#" data-id="${row.id}" class="dropdown-item btn-edit"><i class="fas ${icons} mr-1"  data-bs-toggle="modal" data-bs-target="#myModal"></i><span>แก้ไข</span></a>
                                    <a href="#" data-id="${row.id}" class="dropdown-item btn-delete"><i class="fas fa-trash-alt text-red mr-1 "></i><span>ลบ</span></a>
                                </div>
                            </div>`
                        }
                    },
                ],
                columnDefs: [{
                        responsivePriority: 1,
                        targets: [0, 3]
                    },
                    {
                        orderable: false,
                        targets: [2, 3]
                    }
                ]
            });

            $(document).on('click', '.btn-add', function() {
                $('.btn-update').hide();
                $('.btn-save').show();
            });

            $(document).on('click', '.btn-reset', function() {
                $('#validForm')[0].reset();
            });

            $(document).on('click', '.btn-save', function() {
                let form = $('#validForm');
                let noticeCategory = $('#notice_category_id').val();
                let newsPriority = $('#news_priority').val();

                if (noticeCategory !== "กรุณาเลือก" && newsPriority !== "กรุณาเลือก" && form.valid()) {
                    let id = $(this).data('id');
                    Swal.fire({
                        title: 'บันทึกข้อมูลประชาสัมพันธ์ ?',
                        text: "ต้องการดำเนินการใช่หรือไม่!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#588157',
                        cancelButtonColor: '#646464',
                        confirmButtonText: 'ยืนยัน',
                        cancelButtonText: 'ปิด'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "post",
                                url: '{{ route('api.v1.news.notice.employee.create') }}',
                                data: {
                                    id: $('#id').val(),
                                    news_notice_name: $('#news_notice_name').val(),
                                    news_notice_description: $('#news_notice_description')
                                        .val(),
                                    notice_category_id: $('#notice_category_id').val(),
                                    news_priority: $('#news_priority').val(),
                                },
                                dataType: "json",
                                success: function(response) {
                                    Swal.fire({
                                        position: 'center-center',
                                        icon: 'success',
                                        title: 'บันทึกรายการสำเร็จ',
                                        showConfirmButton: false,
                                        timer: 1500
                                    }).then(() => {
                                        document_list.ajax.reload();
                                    });
                                    $('#myModal').modal('hide');
                                    document.getElementById('validForm').reset();
                                }
                            });
                        }
                    });
                } else {
                    Swal.fire({
                        title: 'กรุณากรอกข้อมูลให้ครบถ้วน',
                        icon: 'error',
                        confirmButtonColor: '#588157',
                    });
                }
            });


            var myModal = $("#myModal");

            function setNoticFormData(data) {
                $("#news_notice_name").val(data.news_notice_name);
                $("#notice_category_id").val(data.notice_category_id);
                $("#news_priority").val(data.news_priority);
                $("#news_notice_description").val(data.news_notice_description);
            }

            $(document).on('click', '.btn-edit', function() {
                $('.btn-save').hide();
                $('.btn-update').show();
                let id = $(this).data('id');
                $('.btn-update').data('id', id); // กำหนดค่า id ให้กับปุ่ม .btn-update
                $.ajax({
                    type: 'post',
                    url: '{{ route('api.v1.news.notice.employee.by.id') }}',
                    data: {
                        'id': id
                    },
                    dataType: "json",
                    success: function(response) {
                        setNoticFormData(response);
                        $("#id").val(response.id);
                        myModal.modal('show');
                    }
                });
            });

            $(document).on('click', '.btn-update', function() {
                let form = $('#validForm');
                let id = $(this).data('id'); // ดึงค่า id จากปุ่ม .btn-update
                console.log(id);
                if (form.valid()) {
                    Swal.fire({
                        title: 'อัพเดทข้อมูลประชาสัมพันธ์ ?',
                        text: "ต้องการดำเนินการใช่หรือไม่!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#588157',
                        cancelButtonColor: '#646464',
                        confirmButtonText: 'ยืนยัน',
                        cancelButtonText: 'ปิด'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "post",
                                url: '{{ route('api.v1.news.notice.employee.update') }}',
                                data: {
                                    id: id,
                                    news_notice_name: $('#news_notice_name').val(),
                                    news_notice_description: $('#news_notice_description')
                                        .val(),
                                    notice_category_id: $('#notice_category_id').val(),
                                    news_priority: $('#news_priority').val(),
                                },
                                dataType: "json",
                                success: function(response) {
                                    Swal.fire({
                                        position: 'center-center',
                                        icon: 'success',
                                        title: 'บันทึกรายการสำเร็จ',
                                        showConfirmButton: false,
                                        timer: 1500
                                    }).then(() => {
                                        // location.reload();
                                        document_list.ajax.reload();
                                    });
                                    $('#myModal').modal('hide');
                                }
                            });
                        }
                    });
                }
            });

            $(document).on("click", ".btn-delete", function() {
                let id = $(this).data('id');
                Swal.fire({
                    title: 'ลบข้อมูลประชาสัมพันธ์ ?',
                    text: "ต้องการดำเนินการใช่หรือไม่!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#588157',
                    cancelButtonColor: '#646464',
                    confirmButtonText: 'ยืนยัน',
                    cancelButtonText: 'ปิด'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('api.v1.news.notice.employee.delete') }}',
                            method: 'POST',
                            data: {
                                id: id
                            },
                            success: function(response) {
                                Swal.fire({
                                    position: 'center-center',
                                    icon: 'success',
                                    title: 'ลบสำเร็จ',
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(() => {
                                    // location.reload();
                                    document_list.ajax.reload();
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@stop
