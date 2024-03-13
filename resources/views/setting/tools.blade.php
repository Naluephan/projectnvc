@extends('setting_menu')
@section('side-card')

    <style>
        .modal-dialog {
            margin: 0;
            position: absolute;
            top: 30%;
            left: 42%;
            transform: translate(-50%, -50%);
            width: 450px;
        }

        .modal-radius {
            border-radius: 1.5rem;
            border-color: none;
        }

        .modal-header-radius {
            border-radius: 1.5rem 1.5rem 0rem 0rem;
        }

        .background2 {
            background-color: #048482;
            color: white
        }

        .button-footer {
            padding-left: 35px;
            padding-right: 35px;
            padding-top: 10px;
            padding-bottom: 35px;
        }

        .button-footer .btn {
            width: 100%;
            height: 45px;
        }

        .modal-dialog .text-color {
            color: #048482;
        }

        .input-modal {
            height: 45px;
            border: 1px solid #dddddd;
            font-size: 13px;
            color: var(--color3);
            font-weight: 500;
        }

        .position {
            position: absolute;
            top: 40%;
            right: 20px;
            transform: translateY(-50%);
            z-index: 1;
            color: #a5d8d8;
        }

        .position-main {
            position: absolute;
            top: 40%;
            left: 20px;
            transform: translateY(-50%);
            z-index: 1;
            color: var(--color3);
        }

        .hhh .btn-edit {
            height: 40px;
            width: 40px;
            background-color: #77c6c5;
            border-color: #77c6c5;
        }

        .hhh .btn-delete {
            height: 40px;
            width: 40px;
            background-color: #fa9583;
            border-color: #fa9583;
        }

        .save-asset,
        .save-category,
        .btn-hr-confirm {
            border: none
        }

        .modal-body .fa-newspaper,
        .fa-th-list {
            color: #fa9583;
        }
    </style>

    <div class="card rounded-4 bg-hr-card">
        <div class="card-header border-0">
            <h6 class="text-bold"><i class="fas fa-th-large"></i> หมวดหมู่อุปกรณ์</h6>
        </div>
        <div class="card-body">
            <div class="row mt-1 list_supply" id="list_supply"></div>

            <button type="button" class="form-control btn btn-outline-success rounded-pill mt-3 btn-add"><i
                    class="fa-solid fa-plus"></i>
                เพิ่มหมวดหมู่</button>
        </div>
        <div class="card-footer bg-transparent">
            <button class="btn btn-hr-confirm form-control rounded-pill btn-save">บันทึก</button>
        </div>
    </div>

    <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModal" aria-hidden="true"
        data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content modal-radius">
                <div class="modal-header background2 modal-header-radius">
                    <h6 class="modal-title" id="categoryModal"><i class="fa-solid fa-file-circle-plus"></i></h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="categoryForm">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3 pr-3 pl-3">
                            <label for="category_name" class="col-form-label text-color"><i
                                    class="fas fa-th-list text-sm"></i>
                                ชื่อหมวดหมู่</label>
                            <input type="text" class="form-control input-modal rounded-pill text-color"
                                id="category_name" name="category_name" required>
                        </div>
                        <div class="pr-3 pl-3">
                            <label for="category_code" class="col-form-label text-color"><i
                                    class="fas fa-newspaper text-sm"></i>
                                รหัสหมวดหมู่ (กำหนดตัวอักษรภาษาอังกฤษ 3
                                อักษร)</label>
                            <input type="text" class="form-control input-modal rounded-pill text-color"
                                id="category_code" name="category_code" required>
                        </div>
                    </form>
                </div>
                <div class="button-footer">
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn card-text text-bold text-color"
                                data-bs-dismiss="modal">ยกเลิก</button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-hr-confirm form-control rounded-pill save-category">บันทึก</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@section('js')
    <script>
        $(() => {
            getSupplyCategory();

            function getSupplyCategory() {
                let id = "{{ Auth::user()->id }}";
                const listSupply = document.getElementById('list_supply');
                listSupply.innerHTML = '';
                $.ajax({
                    type: 'post',
                    url: "{{ route('api.v1.category.list') }}",
                    data: {
                        'id': id,
                    },
                    dataType: "json",
                    success: function(response) {
                        var supplyContainer = $(".list_supply");
                        response.forEach(function(supplyInfo) {
                            var categoryId = supplyInfo.id;
                            var categoryName = supplyInfo.category_name;
                            var categoryCode = supplyInfo.category_code;
                            // var supplyContainer
                            var Item = `
                                <div class="test pt-2">
                                    <div class="row">
                                        <div class="col-12 d-flex hhh">
                                            <div class="input-group">
                                                <input type="text" class="form-control rounded-pill bg-white text-sm"
                                                    style="border-color: #c0e7e7; height: 45px;" disabled>
                                                <label class="position-main pt-2">${categoryName}</label>
                                                <label class="position pt-2">#${categoryCode}</label>
                                            </div>&nbsp;&nbsp;
                                            <button class="btn btn-sm rounded-pill btn-success btn-edit" data-id="${categoryId}"
                                                data-ac="edit" data-bs-toggle="modal" data-bs-target="#assetModal"><em
                                                    class="fas fa-edit" style="font-size: 20px;"></em></button>&nbsp;&nbsp;
                                            <button class="btn btn-sm rounded-pill btn-danger btn-delete" data-id="${categoryId}"><em
                                                    class="fas fa-trash-alt" style="font-size: 20px;"></em></button>
                                        </div>
                                    </div>
                                </div>
                            `;
                            supplyContainer.append(Item);
                        });
                    },
                });
            }


            var category_modal = $("#categoryModal");
            $(document).on('click', '.btn-add', function() {
                category_modal.modal('show')
            })

            $(document).on('click', '.save-category', function() {
                let id = $("#id").val();
                let categoryForm = $("#categoryForm");
                if (categoryForm.valid()) {
                    const formData = new FormData($("#categoryForm")[0]);
                    const data = Object.fromEntries(formData.entries());
                    if (id.length == 0) {

                        $.ajax({
                            type: 'post',
                            url: "{{ route('api.v1.category.create') }}",
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
                                    category_modal.modal('hide');
                                    getSupplyCategory();
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
                            url: "{{ route('api.v1.category.update') }}",
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
                                    category_modal.modal('hide');
                                    getSupplyCategory();

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
            })

            $(document).on('click', '.btn-edit', function() {
                let id = $(this).data('id');
                $.ajax({
                    type: 'post',
                    url: "{{ route('api.v1.category.by.id') }}",
                    data: {
                        'id': id
                    },
                    dataType: "json",
                    success: function(response) {
                        setcategoryFormData(response);
                        $("#id").val(response.id);
                        category_modal.modal('show')
                    }
                });
            })

            function setcategoryFormData(data) {
                $("#category_name").val(data.category_name);
                $("#category_code").val(data.category_code);
            }

            category_modal.on('show.bs.modal', function(event) {
                let btn = $(event.relatedTarget);
                let title = btn.data('ac') === 'edit' ? '<em class="fas fa-edit"></em>&nbsp;แก้ไขรายการ' :
                    '<i class="fas fa-file-circle-plus"></i>&nbsp;เพิ่มหมวดหมู่ใหม่';
                let obj = $(this);
                obj.find('.modal-title').html(title);
            });


            category_modal.on('hide.bs.modal', function() {
                let obj = $(this);
                obj.find('#category_name').val("");
                obj.find('#category_code').val("");
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
                            url: "{{ route('api.v1.category.delete') }}",
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
                                    getSupplyCategory();

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
