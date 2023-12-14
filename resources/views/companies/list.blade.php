@extends("adminlte::page")

@section('content_header_title')
    บริษัท
@stop
@section('content_header')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">หน้าแรก</a></li>
    <li class="breadcrumb-item active"> บริษัท </li>
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
                    <th>รหัสบัตร</th>
                    <th>ชื่อบริษัท</th>
                    <th>ชื่อย่อ</th>
                    <th>เบอร์ติดต่อ</th>
                    <th>เว็ปไซต์</th>
                    <th>อีเมล</th>
                    <th>โลโก้</th>
                    <th>จัดการ</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

    <div class="modal fade" id="companyModal" tabindex="-1" aria-labelledby="companyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="companyModalLabel">บริษัท</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="companyForm">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="name_th" class="col-form-label">ชื่อบริษัท :</label>
                        <input type="text" class="form-control" id="name_th" name="name_th" required>
                    </div>
                    <div class="mb-3">
                        <label for="name_en" class="col-form-label">ชื่อบริษัทภาษาอังกฤษ :</label>
                        <input class="form-control" id="name_en" name="name_en" required></input>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-6">
                                <label for="short_name" class="col-form-label">ชื่อย่อบริษัท :</label>
                                <input class="form-control" id="short_name" name="short_name" required></input>
                            </div>
                            <div class="col-6">
                                <label for="order_prefix" class="col-form-label">ตัวอักษรย่อบริษัท :</label>
                                <input class="form-control" id="order_prefix" name="order_prefix" required></input>
                            </div>
                        </div>  
                    </div>
                    <div class="mb-3">
                        <label for="address_th" class="col-form-label">ที่อยู่ :</label>
                        <textarea class="form-control" id="address_th" name="address_th" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="address_en" class="col-form-label">ที่อยู่ภาษาอังกฤษ :</label>
                        <textarea class="form-control" id="address_en" name="address_en" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="contact_number" class="col-form-label">เบอร์ติดต่อ :</label>
                        <input class="form-control" id="contact_number" name="contact_number" required></input>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col-6">
                                <label for="website" class="col-form-label">เว็ปไซต์ :</label>
                                <input class="form-control" id="website" name="website" required></input>
                            </div>
                            <div class="col-6">
                            <label for="email" class="col-form-label">อีเมล :</label>
                        <input class="form-control" id="email" name="email" required></input>
                            </div>
                        </div>  
                    </div>

                    <div class="mb-3">
                        <label for="logo" class="col-form-label">โลโก้ :</label>
                        <input class="form-control" id="logo" name="logo" required></input>
                    </div>
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                <button type="button" class="btn btn-primary save-company">บันทึก</button>
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
                    url: '{{ route('api.v1.companies.list') }}',
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
                        data: "short_name"
                    },
                    {
                        data: "contact_number"
                    },
                    {
                        data: "website"
                    },
                    {
                        data: "email"
                    },
                    {
                        data: "id",
                        render: function(data, type, row, meta) {
                            info_button =
                                `<img src="${row.logo}" class="img-thumbnail" alt="${row.id}">`;
                            return info_button;
                        }
                    },
                    {
                        data: "id",
                        render: function(data, type, row, meta) {
                            info_button =
                                `<a data-id="${row.id}" data-ac="edit" data-bs-toggle="modal" data-bs-target="#companyModal" class="btn btn-xs rounded-pill text-es-pink btn-edit"><i class="fas fa-edit"></i></a>`;
                            info_button +=
                                `<a data-id="${row.id}" class="btn btn-xs rounded-pill text-es-red btn-delete"><i class="fas fa-trash-alt"></i></a>`;
                            return info_button;
                        }
                    },
                ],
                "dom": '<"top my-1 mr-1"lf>rt<"bottom d-flex position-absolute w-100 justify-content-between px-1 mt-3" ip  ><"clear">'
            });

            var company_modal = $("#companyModal");
            $(document).on('click', '.btn-add', function() {
                company_modal.modal('show')
            })

            $(document).on('click', '.save-company', function() {
                let id = $("#id").val();
                let companyForm = $("#companyForm");
                if (companyForm.valid()) {
                    const formData = new FormData($("#companyForm")[0]);
                    const data = Object.fromEntries(formData.entries());
                    if (id.length == 0) {

                        $.ajax({
                            type: 'post',
                            url: "{{ route('api.v1.companies.create') }}",
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
                                    company_modal.modal('hide');
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
                            url: "{{ route('api.v1.companies.update') }}",
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
                                    company_modal.modal('hide');
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
                    url: "{{ route('api.v1.companies.by.id') }}",
                    data: {
                        'id': id
                    },
                    dataType: "json",
                    success: function(response) {
                        setCompanyFormData(response);
                        $("#id").val(response.id);
                        company_modal.modal('show')
                    }
                });
            })

            function setCompanyFormData(data) {
                $("#name_th").val(data.name_th);
                $("#name_en").val(data.name_en);
                $("#short_name").val(data.short_name);
                $("#order_prefix").val(data.order_prefix);
                $("#address_th").val(data.address_th);
                $("#address_en").val(data.address_en);
                $("#contact_number").val(data.contact_number);
                $("#website").val(data.website);
                $("#email").val(data.email);
                $("#logo").val(data.logo);
            }
            company_modal.on('show.bs.modal', function(event) {
                let btn = $(event.relatedTarget);
                let title = btn.data('ac') === 'edit' ? "แก้ไขรายการ" : "สร้างรายการใหม่";
                console.log(btn.data('ac'))
                let obj = $(this);
                obj.find('.modal-title').text(title)
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
                            url: "{{ route('api.v1.companies.delete') }}",
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
