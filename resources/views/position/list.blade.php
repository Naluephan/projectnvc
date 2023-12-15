@extends("adminlte::page")

@section('content_header_title')
    ตำแหน่ง
@stop
@section('content_header')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">หน้าแรก</a></li>
    <li class="breadcrumb-item active"> ตำแหน่ง </li>
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
                    <th>ชื่อหน่วยงาน</th>
                    <th>ภาษาอังกฤษ</th>
                    <th>หน่วยงาน</th>
                    <th>บริษัท</th>
                    <th>จัดการ</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

        <div class="modal fade" id="positionModal" tabindex="-1" aria-labelledby="positionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="positionModalLabel">ตำแหน่ง</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="positionForm">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-6">
                                <label for="name_th" class="col-form-label">ชื่อตำแหน่ง :</label>
                                <input type="text" class="form-control" id="name_th" name="name_th" required>
                            </div>
                            <div class="col-6">
                                <label for="name_en" class="col-form-label">ชื่อตำแหน่งภาษาอังกฤษ :</label>
                                <input class="form-control" id="name_en" name="name_en" required></input>
                            </div>
                        </div>  
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">หน่วยงาน :</label>
                        <select class="form-select" id="department_id" name="department_id">
                            <option selected>กรุณาเลือก</option>
                            @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name_th}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">บริษัท :</label>
                        <select class="form-select" id="company_id" name="company_id">
                            <option selected>กรุณาเลือก</option>
                            @foreach($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name_th}}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                <button type="button" class="btn btn-primary save-position">บันทึก</button>
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
                    url: '{{ route('api.v1.position.list') }}',
                    type: 'POST'
                },
                columns: [
                    {
                        data: "id"
                    },
                    {
                        data: "name_th"
                    },
                    {
                        data: "name_en"
                    },
                    {
                        data: "department.name_th"
                    },
                    {
                        data: "company.name_th"
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

            var position_modal = $("#positionModal");
            $(document).on('click', '.btn-add', function() {
                position_modal.modal('show')
            })

            $(document).on('click', '.save-position', function() {
                let id = $("#id").val();
                let positionForm = $("#positionForm");
                if (positionForm.valid()) {
                    const formData = new FormData($("#positionForm")[0]);
                    const data = Object.fromEntries(formData.entries());
                    if (id.length == 0) {

                        $.ajax({
                            type: 'post',
                            url: "{{ route('api.v1.position.create') }}",
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
                                    position_modal.modal('hide');
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
                            url: "{{ route('api.v1.position.update') }}",
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
                                    position_modal.modal('hide');
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
                    url: "{{ route('api.v1.position.by.id') }}",
                    data: {
                        'id': id
                    },
                    dataType: "json",
                    success: function(response) {
                        setPositionFormData(response);
                        $("#id").val(response.id);
                        position_modal.modal('show')
                    }
                });
            })

            function setPositionFormData(data) {
                $("#name_th").val(data.name_th);
                $("#name_en").val(data.name_en);
                $("#department_id").val(data.department_id);
                $("#company_id").val(data.company_id);
            }
            position_modal.on('show.bs.modal', function(event) {
                let btn = $(event.relatedTarget);
                let title = btn.data('ac') === 'edit' ? "แก้ไขรายการ" : "สร้างรายการใหม่";
                console.log(btn.data('ac'))
                let obj = $(this);
                obj.find('.modal-title').text(title)
            })
            position_modal.on('hide.bs.modal', function() {
            let obj = $(this);
            obj.find('#name_th').val("");
            obj.find('#name_en').val("");
            obj.find('#department_id').val("");
            obj.find('#company_id').val("");
            })


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
                            url: "{{ route('api.v1.position.delete') }}",
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
