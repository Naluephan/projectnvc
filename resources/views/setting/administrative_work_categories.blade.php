@extends('setting_menu')
<style>
    .btn-danger {
        color: #fff !important;
        border-color: #FA9583 !important;
        background-color: #FA9583 !important;
    }

    .btn-danger:hover {
        color: #FA9583 !important;
        background-color: #fff !important;
        border-color: #FA9583 !important;
    }

    .btn-success {
        color: #fff !important;
        border-color: #77c6c5 !important;
        background-color: #77c6c5 !important;
    }

    .btn-success:hover {
        color: #77c6c5 !important;
        background-color: #fff !important;
        border-color: #77c6c5 !important;
    }

    div {
        color: #136E68;
    }

    .modal-body i {
        color: #FA9583;
        font-size: 1.2rem;
        margin: 0.5rem;
    }

    .form-control {
        color: #136E68 !important;
        border-color: #77c6c5 !important;
    }

    .btn-outline-successful {
        border-color: none !important;
        color: #136E68 !important;
    }

    .btn-outline-successful:hover {
        border-color: #136E68 !important;
        color: #fff !important;
        background-color: #136E68 !important;
    }

    input {
        background-color: #fff !important;
    }
</style>

@section('side-card')
    <div class="row">
        <div class="col-12">
            <div class="container p-4 m-2 rounded-3 shadow-sm bg-hr-card">
                <div class="row">
                    <h6><i class="fa-solid fa-file-circle-plus"></i> สร้างประเภทงานอำนวยการ</h6>
                    <div class="row list_administ" id="list_administ">
                    </div>
                </div>
                <div class="button p-2 mt-2">
                    <button type="button" class="form-control btn btn-outline-success rounded-pill add-administ"
                        id="add-administ" data-bs-toggle="modal" data-bs-target="#administModal" style="width: 100%; "><i
                            class="fa-solid fa-plus"></i> เพิ่มประเภทงาน</button>
                </div>
            </div>
        </div>
    </div>

    {{-- modal --}}
    <div class="modal fade" id="administModal" tabindex="-1" aria-labelledby="administModalLabel" aria-hidden="true"
        data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content modal-radius">
                <div class="modal-header bg-hr-green-app modal-header-radius">
                    <h5 class="modal-title text-white" id="exampleModalLabel"><i class="fa-solid fa-file-circle-plus"></i>
                        เพิ่มประเภทงาน</h5>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                <div class="modal-body">
                    <form id ="administ_FromModal">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label"><i class="fa-regular fa-newspaper"></i>
                                หัวข้อประเภทงาน</label>
                            <input type="text" class="form-control rounded-pill" id="administ_name" name="administ_name"
                                required>
                        </div>
                    </form>
                </div>
                <div class="row p-4 ">
                    <div class="row">
                        <button type="button" class="btn btn-outline-successful rounded-pill col-5 mx-auto p-2"
                            data-bs-dismiss="modal">ยกเลิก</button>
                        <button type="button" class="btn btn-danger rounded-pill save-administ col-5 mx-auto p-2"
                            id="save-administ">ยืนยัน</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@section('js')
    <script>
        $(() => {
            getAdministWorkCategories();

            function getAdministWorkCategories() {
                let id = "{{ Auth::user()->id }}";
                const listAdminist = document.getElementById('list_administ');
                listAdminist.innerHTML = '';
                $.ajax({
                    type: "POST",
                    url: "{{ route('api.v1.administrative.work.categories.list') }}",
                    data: {
                        'id': id,
                    },
                    datatype: "JSON",
                    success: function(response) {
                        var administContainer = $('.list_administ');
                        response.forEach(function(administ) {
                            var administ_id = administ.id;
                            var administ_name = administ.administ_name;
                            // console.log('name = ' + $(administ_name));
                            var Item = `
                            <div class="test pt-2 mb-1">
                                <div class="row">
                                    <div class="col-12 d-flex">
                                        <div class="input-group">
                                            <input type="text" class="form-control rounded-pill text-sm" disabled>
                                            <label class="position-main pt-2">${administ_name}</label>
                                        </div>

                                        <button class="btn btn-sm btn-success rounded-pill btn-edit mx-2"
                                             data-id="${administ_id}"
                                            data-ac="edit" data-bs-toggle="modal" data-bs-target="#administModal">
                                            <em class="fas fa-edit fs-5"></em>
                                        </button>

                                        <button class="btn btn-danger btn-sm rounded-pill btn-delete"
                                             data-id="${administ_id}">
                                            <em class="fas fa-trash-alt fs-5"></em>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        `;
                            administContainer.append(Item);
                        });
                    },
                });
            }

            var administ_model = $('#administModal');
            $(document).on('click', '.add-administ', function() {
                administ_model.modal('show')
            })

            ////// save news //////
            $(document).on('click', '.save-administ', function() {
                let id = $('#id').val();
                let administ_FromModal = $('#administ_FromModal');

                if (administ_FromModal.valid()) {
                    const formData = new FormData($('#administ_FromModal')[0]);
                    const data = Object.fromEntries(formData.entries());
                    if (id.length == 0) {
                        $.ajax({
                            type: 'post',
                            url: "{{ route('api.v1.administrative.work.categories.create') }}",
                            data: data,
                            dataType: "json",
                            success: function(response) {
                                if (response.data.status == 'Success') {
                                    Swal.fire({
                                        title: 'ดำเนินการเรียบร้อยแล้ว',
                                        icon: 'success',
                                        showConfirmButton: false,
                                        timer: 2000,
                                        toast: true
                                    });
                                    administ_model.modal('hide');
                                    getAdministWorkCategories();
                                } else if ((response.data.statusCode == '200')) {
                                    Swal.fire({
                                        title: 'หมวดหมูงานนี้มีอยู่แล้ว',
                                        icon: 'warning',
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
                                    });
                                }
                            }
                        });
                    } else {
                        $.ajax({
                            type: 'post',
                            url: "{{ route('api.v1.administrative.work.categories.update') }}",
                            data: data,
                            dataType: "json",
                            success: function(response) {
                                if (response.data.status == 'Success') {
                                    Swal.fire({
                                        title: 'ดำเนินการเรียบร้อยแล้ว',
                                        icon: 'success',
                                        showConfirmButton: false,
                                        timer: 2000,
                                        toast: true
                                    });
                                    administ_model.modal('hide');
                                    getAdministWorkCategories();

                                } else if ((response.data.statusCode == '200')) {
                                    Swal.fire({
                                        title: 'หมวดหมูงานนี้มีอยู่แล้ว',
                                        icon: 'warning',
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
                    }
                }
            });


            ////// edit news //////
            $(document).on('click', '.btn-edit', function() {
                let id = $(this).data('id');
                $.ajax({
                    type: 'post',
                    url: "{{ route('api.v1.administrative.work.categories.by.id') }}",
                    data: {
                        'id': id
                    },
                    dataType: "json",
                    success: function(response) {
                        setNewsCategoryFormData(response);
                        $("#id").val(response.data.id);
                        administ_model.modal('show')
                        // console.log(response);
                    }
                });
            })

            function setNewsCategoryFormData(data) {
                $("#administ_name").val(data.data.administ_name);
            }
            administ_model.on('show.bs.modal', function(event) {
                let btn = $(event.relatedTarget);
                let title = btn.data('ac') === 'edit' ? 'แก้ไขหัวข้อข่าว' : 'เพิ่มหัวข้อข่าว';
                let obj = $(this);
                obj.find('.modal-title').text(title)
            })
            administ_model.on('hide.bs.modal', function() {
                let obj = $(this);
                obj.find('#administ_name').val("");
            })

            ////// delete news //////
            $(document).on('click', '.btn-delete', function() {
                let obj = $(this);
                let id = obj.data('id');
                Swal.fire({
                    title: 'ยืนยัน!! ลบข้อมูล',
                    text: "ต้องการดำเนินการใช่หรือไม่!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#FA9583',
                    cancelButtonColor: 'transparent',
                    confirmButtonText: 'ยืนยัน',
                    cancelButtonText: 'ปิด',
                    customClass: {
                        confirmButton: 'rounded-pill',
                        cancelButton: 'text-hr-green rounded-pill',
                        popup: 'modal-radius'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'post',
                            url: "{{ route('api.v1.administrative.work.categories.delete') }}",
                            data: {
                                'id': id
                            },
                            dataType: "json",
                            success: function(response) {
                                if (response.data.status == 'Success') {
                                    Swal.fire({
                                        title: 'ดำเนินการเรียบร้อยแล้ว',
                                        icon: 'success',
                                        showConfirmButton: false,
                                        timer: 2000,
                                        toast: true
                                    });
                                    getAdministWorkCategories();
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
