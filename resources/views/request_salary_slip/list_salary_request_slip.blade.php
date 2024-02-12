@extends('adminlte::page')

@section('content_header_title')
    แจ้งขอสลิปเงินเดือนย้อนหลัง
@stop
@section('content_header')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">หน้าแรก</a></li>
    <li class="breadcrumb-item active"> แจ้งขอสลิปเงินเดือนย้อนหลัง </li>
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
            <table class="table dt-responsive w-100 nowrap" id="data_table" aria-describedby="data_table">
                <thead class="border-top table-light">
                    <tr>
                        <th scope="col" class="">#</th>
                        <th scope="col">ชื่อผู้ร้องขอ</th>
                        <th scope="col">เดือนทั้งหมดที่ร้องขอ</th>
                        <th scope="col">เหตุผล</th>
                        <th scope="col">วันที่ใช้</th>
                        <th scope="col">สถานะ</th>
                        <th scope="col">จัดการ</th>
                    </tr>
                </thead>
                <tbody class="text-muted">

                </tbody>
            </table>
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
                    url: '{{ route('api.v1.salary.request.slip.list') }}',
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
                        data: 'emp_id',
                        className: "text-center ",
                        render: function(data, type, row, meta) {

                            return row.employees.f_name + ' ' + row.employees.l_name;
                        }
                    },
                    {
                        data: 'month_request',
                        render: function(data, type, row, meta) {
                            return `<p class="pre-line">${data}</p>`;
                        }
                    },
                    {
                        data: 'reason_request',
                        render: function(data, type, row, meta) {
                            return `<p class="pre-line">${data}</p>`;
                        }
                    },
                    {
                        data: 'use_date'
                    },
                    {
                        data: 'request_approve',
                        className: "text-center ",
                        render: function(data, type, row, meta) {
                            let status_txt = ''
                            let status_color = ''
                            if (row.request_approve == 1) {
                                status_txt = 'ดำเนินการแล้ว'
                                status_color = 'success'
                            }
                            if (row.request_approve == 0) {
                                status_txt = 'รอดำเนินการ'
                                status_color = 'warning'
                            }
                            return `<span id="request_approve" class="badge rounded-pill badge-${status_color}">${status_txt}</span>`;
                        }
                    },
                    {
                        data: 'request_approve',
                        className: "text-center ",
                        render: function(data, type, row, meta) {
                            let icons = ''
                            if (row.request_approve == 0) {
                                status_txt = 'อนุมัติ'
                                icons = 'fa-chevron-circle-right text-success'
                            }
                            if (row.request_approve == 1) {
                                status_txt = 'รอดำเนินการ'
                                icons = 'fa-undo-alt text-warning'
                            }
                            return `<div class="d-inline-block text-nowrap">
                                <button class="btn btn-sm btn-text-secondary rounded-pill" data-bs-toggle="dropdown" style="border: 5;color: gray;"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                                <div class="dropdown-menu dropdown-menu-end m-0">
                                    <a href="#" data-id="${row.id}" data-request_approve="${row.request_approve}" class="dropdown-item request_approve"><i class="fas ${icons} mr-1"></i><span>${status_txt}</span></a>
                                    <a href="#" data-id="${row.id}" class="dropdown-item see-request"><i class="fas fa-eye text-secondary mr-1"></i><span>ดู</span></a>
                                    <a href="#" data-id="${row.id}" class="dropdown-item delete-request"><i class="fas fa-trash-alt text-red mr-1 "></i><span>ลบ</span></a>
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

            $(document).on('click', '.request_approve', function() {
                var id = $(this).data('id');
                var request_approve = $(this).data('request_approve');

                if (request_approve == 0) {
                    request_approve = 1;
                } else if (request_approve == 1) {
                    request_approve = 0;
                }
                Swal.fire({
                    title: 'ยืนยันการบันทึก ?',
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
                            url: '{{ route('api.v1.salary.request.slip.approve') }}',
                            data: {
                                id: id,
                                request_approve: request_approve,
                            },
                            dataType: "json",
                            success: function(response) {
                                Swal.fire({
                                    position: 'center-center',
                                    icon: 'success',
                                    title: 'บันทึกการเปลี่ยนแปลงสำเร็จ',
                                    showConfirmButton: false,
                                    timer: 1200
                                }).then(() => {
                                    document_list.ajax.reload();
                                });
                            },
                            error: function(xhr, textStatus, errorThrown) {
                                Swal.fire({
                                    title: 'อัพเดทเปลี่ยนแปลงไม่สำเร็จ',
                                    icon: 'error',
                                    confirmButtonColor: '#588157',
                                });
                            }
                        });
                    }
                });
            });

            $(document).on("click", ".delete-request", function() {
                let id = $(this).data('id');
                Swal.fire({
                    title: 'ลบคำร้องขอ สลิปเงินเดือน ?',
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
                            url: '{{ route('api.v1.salary.request.slip.approve') }}',
                            method: 'POST',
                            data: {
                                id: id,
                                'record_status': 0,
                            },
                            success: function(response) {
                                Swal.fire({
                                    position: 'center-center',
                                    icon: 'success',
                                    title: 'ลบสำเร็จ',
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(() => {
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
