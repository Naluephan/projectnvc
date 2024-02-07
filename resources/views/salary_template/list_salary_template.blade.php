@extends("adminlte::page")

@section('content_header_title')
            แม่แบบเงินเดือน
@stop
@section('content_header')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">หน้าแรก</a></li>
    <li class="breadcrumb-item active"> แม่แบบเงินเดือน </li>
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
                    <th>ชื่อแม่แบบ</th>
                    <th>จัดการ</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

        <div class="modal fade" id="templatesalaryModal" tabindex="-1" aria-labelledby="templatesalaryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="templatesalaryModalLabel">แม่แบบ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="templatesalaryForm">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3">
                            <label for="template_name" class="col-form-label">ชื่อแม่แบบ :</label>
                            <input type="text" class="form-control" id="template_name" name="template_name" required>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="button" class="btn btn-primary save-template">บันทึก</button>
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
                    url: '{{ route('api.v1.salary.template.list') }}',
                    type: 'POST'
                },
                columns: [
                    {
                        data: "id"
                    },
                    {
                        data: "id",
                        render: function(data, type, row, meta) {
                            info_button =
                                `<a href="/saraly/template/detail/add/${row.id}">${row.template_name}</a>`;
                            return info_button;
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
                "dom": '<"top my-1 mr-1"lf>rt<"bottom d-flex  w-100 justify-content-between px-1 mt-3" ip  ><"clear">'
            });

            var template_modal = $("#templatesalaryModal");
        $(document).on('click', '.btn-add', function() {
            template_modal.modal('show')
        })

        $(document).on('click', '.save-template', function() {
            let id = $("#id").val();
            let templatesalaryForm = $("#templatesalaryForm");
            if (templatesalaryForm.valid()) {
                const formData = new FormData($("#templatesalaryForm")[0]);
                const data = Object.fromEntries(formData.entries());
                if (id.length == 0) {
                    $.ajax({
                        type: 'post',
                        url: "{{ route('api.v1.salary.template.create') }}",
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
                                template_modal.modal('hide');
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
                    $.ajax({
                        type: 'post',
                        url: "{{ route('api.v1.salary.template.update') }}",
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
                                template_modal.modal('hide');
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

        $(document).on('click', '.btn-edit', function() {
            let id = $(this).data('id');
            $.ajax({
                type: 'post',
                url: "{{ route('api.v1.salary.template.get.by.id') }}",
                data: {
                    'id': id
                },
                dataType: "json",
                success: function(response) {
                    setFormData(response);
                    $("#id").val(response.id);
                    template_modal.modal('show')
                }
            });
        })

        function setFormData(data) {
            $("#template_name").val(data.template_name);
        }

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
                        url: "{{ route('api.v1.salary.template.delete') }}",
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


        }); 
    </script>
@stop
