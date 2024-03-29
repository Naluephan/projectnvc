@extends('setting_menu')
@section('side-card')

    <div class="card rounded-4 bg-hr-card">
        <div class="card-header border-0">
            <h6 class="text-bold"> <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentcolor"
                    viewBox="0 0 1024 1024">
                    <path
                        d="M170.7 469.3h256a42.7 42.7 0 0 0 42.6-42.6V170.7a42.7 42.7 0 0 0-42.6-42.7H170.7a42.7 42.7 0 0 0-42.7 42.7v256a42.7 42.7 0 0 0 42.7 42.6z m426.6 0h256a42.7 42.7 0 0 0 42.7-42.6V170.7a42.7 42.7 0 0 0-42.7-42.7h-256a42.7 42.7 0 0 0-42.6 42.7v256a42.7 42.7 0 0 0 42.6 42.6zM170.7 896h256a42.7 42.7 0 0 0 42.6-42.7v-256a42.7 42.7 0 0 0-42.6-42.6H170.7a42.7 42.7 0 0 0-42.7 42.6v256a42.7 42.7 0 0 0 42.7 42.7z m554.6 0c94.1 0 170.7-76.5 170.7-170.7s-76.5-170.7-170.7-170.6-170.7 76.5-170.6 170.6 76.5 170.7 170.6 170.7z">
                    </path>
                </svg> หมวดหมู่อุปกรณ์
            </h6>
        </div>
        <div class="card-body">
            <div class="row mt-n4 list_supply" id="list_supply">

            </div>
            <button type="button" class="form-control btn btn-outline-success rounded-pill mt-3 btn-add"><i
                    class="fa-solid fa-plus"></i>
                เพิ่มข้อมูล</button>
        </div>
    </div>


    <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModal" aria-hidden="true"
        data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content modal-radius">
                <div class="modal-header background2 modal-header-radius">
                    <h6 class="modal-title " id="securityModalLabel"><i class="fa-solid fa-file-circle-plus"></i> <span
                            class="add-data">เพิ่มข้อมูล</span>
                    </h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="categoryForm">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3 pr-3 pl-3">
                            <label for="category_name" class="col-form-label text-color"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="#e6896a"
                                    viewBox="0 0 1024 1024">
                                    <path
                                        d="M170.7 469.3h256a42.7 42.7 0 0 0 42.6-42.6V170.7a42.7 42.7 0 0 0-42.6-42.7H170.7a42.7 42.7 0 0 0-42.7 42.7v256a42.7 42.7 0 0 0 42.7 42.6z m426.6 0h256a42.7 42.7 0 0 0 42.7-42.6V170.7a42.7 42.7 0 0 0-42.7-42.7h-256a42.7 42.7 0 0 0-42.6 42.7v256a42.7 42.7 0 0 0 42.6 42.6zM170.7 896h256a42.7 42.7 0 0 0 42.6-42.7v-256a42.7 42.7 0 0 0-42.6-42.6H170.7a42.7 42.7 0 0 0-42.7 42.6v256a42.7 42.7 0 0 0 42.7 42.7z m554.6 0c94.1 0 170.7-76.5 170.7-170.7s-76.5-170.7-170.7-170.6-170.7 76.5-170.6 170.6 76.5 170.7 170.6 170.7z">
                                    </path>
                                </svg>
                                ชื่อหมวดหมู่</label>
                            <input type="text" class="form-control input-modal rounded-pill text-color"
                                id="category_name" name="category_name" required>
                        </div>
                        <div class="pr-3 pl-3">
                            <label for="category_code" class="col-form-label text-color"> <svg
                                    xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="#e6896a"
                                    viewBox="0 0 1024 1024">
                                    <path
                                        d="M120 160H72c-4.4 0-8 3.6-8 8v688c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8V168c0-4.4-3.6-8-8-8z m833 0h-48c-4.4 0-8 3.6-8 8v688c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8V168c0-4.4-3.6-8-8-8zM200 736h112c4.4 0 8-3.6 8-8V168c0-4.4-3.6-8-8-8H200c-4.4 0-8 3.6-8 8v560c0 4.4 3.6 8 8 8z m321 0h48c4.4 0 8-3.6 8-8V168c0-4.4-3.6-8-8-8h-48c-4.4 0-8 3.6-8 8v560c0 4.4 3.6 8 8 8z m126 0h178c4.4 0 8-3.6 8-8V168c0-4.4-3.6-8-8-8H647c-4.4 0-8 3.6-8 8v560c0 4.4 3.6 8 8 8z m-255 0h48c4.4 0 8-3.6 8-8V168c0-4.4-3.6-8-8-8h-48c-4.4 0-8 3.6-8 8v560c0 4.4 3.6 8 8 8z m-79 64H201c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h112c4.4 0 8-3.6 8-8v-48c0-4.4-3.6-8-8-8z m257 0h-48c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8v-48c0-4.4-3.6-8-8-8z m256 0H648c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h178c4.4 0 8-3.6 8-8v-48c0-4.4-3.6-8-8-8z m-385 0h-48c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8v-48c0-4.4-3.6-8-8-8z">
                                    </path>
                                </svg>
                                รหัสหมวดหมู่ (กำหนดตัวอักษรภาษาอังกฤษ 3
                                อักษร)</label>
                            <input type="text" class="form-control input-modal rounded-pill text-color"
                                id="category_code" name="category_code" required maxlength="3">
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
                let data = {};

                $.ajax({
                    url: "{{ route('api.v1.category.list') }}",
                    data: data,
                    type: "post",
                    dataType: "json",
                    success: function(responses) {
                        // console.log(responses);
                        $(".list_supply").empty();
                        $.each(responses.data, function(index, assetInfo) {
                            var id = assetInfo.id;
                            var category_name = assetInfo.category_name;
                            var category_code = assetInfo.category_code;
                            var item = `
                                <div class="test pt-2">
                                    <div class="row">
                                        <div class="col-12 d-flex hhh px-0">
                                            <div class="input-group">
                                                <input type="text" class="form-control rounded-pill bg-white text-sm"
                                                    style="border-color: #c0e7e7; height: 45px;" disabled>
                                                <label class="position-main pt-2">${category_name}</label>
                                                <label class="position-main2 pt-2">#${category_code}</label>
                                            </div>&nbsp;&nbsp;
                                            <button class="btn btn-sm rounded-pill btn-edit" style="color: #ffff;" data-id="${id}"
                                                data-ac="edit" data-bs-toggle="modal" data-bs-target="#assetModal"><em
                                                    class="fas fa-edit" style="font-size: 20px;"></em></button>&nbsp;&nbsp;
                                            <button class="btn btn-sm rounded-pill btn-delete" style="color: #ffff;" data-id="${id}"><em
                                                    class="fas fa-trash-alt" style="font-size: 20px;"></em></button>
                                        </div>
                                    </div>
                                </div>
                            `;
                            $(".list_supply").append(item);
                        });
                    }
                });
            }

            var category_modal = $("#categoryModal");
            $(document).on('click', '.btn-add', function() {
                category_modal.modal('show')
                $('#id').val('');
                $('#cetegory_name').val('');
                $('#category_code').val('');
                category_modal.modal('hide')
                $('.add-data').text('เพิ่มหมวดหมู่ใหม่');
            });

            $(document).on('click', '.save-category', function() {
                var id = $('#id').val();
                if ($('#categoryForm').valid()) {
                    var formData = new FormData();
                    formData.append('_token', $('#_token').val());
                    formData.append('id', $('#id').val());
                    formData.append('category_name', $('#category_name').val());
                    formData.append('category_code', $('#category_code').val());
                    if (!id) {
                        Swal.fire({
                            title: 'ยืนยันการเพิ่มรายการ?',
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
                                    type: "post",
                                    url: "{{ route('api.v1.category.create') }}",
                                    data: formData,
                                    contentType: false,
                                    processData: false,
                                    cache: false,
                                    success: function(response) {
                                        if (response.status == 'success') {
                                            Swal.fire({
                                                position: 'center-center',
                                                icon: 'success',
                                                title: 'เพิ่มรายการสำเร็จ',
                                                showConfirmButton: false,
                                                timer: 1500
                                            })
                                            $('#id').val('');
                                            $('#category_name').val('');
                                            $('#category_code').val('');
                                            category_modal.modal('hide')
                                            getSupplyCategory();
                                        } else if ((response.statusCode == '200')) {
                                            Swal.fire({
                                                position: 'center-center',
                                                icon: 'error',
                                                title: 'เพิ่มรายการไม่สำเร็จ',
                                                text: 'หมวดหมู่อุปกรณ์ซ้ำ',
                                                showConfirmButton: false,
                                                timer: 1500
                                            })
                                        } else {
                                            Swal.fire({
                                                position: 'center-center',
                                                icon: 'error',
                                                title: 'เพิ่มรายการไม่สำเร็จ',
                                                showConfirmButton: false,
                                                timer: 1500
                                            })
                                        }
                                    }
                                });
                            }
                        });
                    } else {
                        Swal.fire({
                            title: 'ยืนยันการแก้ไขรายการ?',
                            text: "ต้องการดำเนินการใช่หรือไม่!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#136E68',
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
                                    type: "post",
                                    url: "{{ route('api.v1.category.update') }}",
                                    data: formData,
                                    contentType: false,
                                    processData: false,
                                    cache: false,
                                    success: function(response) {
                                        if (response.status == 'success') {
                                            Swal.fire({
                                                position: 'center-center',
                                                icon: 'success',
                                                title: 'แก้ไขรายการสำเร็จ',
                                                showConfirmButton: false,
                                                timer: 1500
                                            })
                                            $('#id').val('');
                                            $('#category_name').val('');
                                            $('#category_code').val('');
                                            category_modal.modal('hide')
                                            getSupplyCategory();
                                        } else {
                                            Swal.fire({
                                                position: 'center-center',
                                                icon: 'error',
                                                title: 'รายการซ้ำแก้ไขไม่สำเร็จ',
                                                showConfirmButton: false,
                                                timer: 1500
                                            })
                                        }
                                    }
                                });
                            }
                        });
                    }
                } else {
                    Swal.fire({
                        title: 'กรุณากรอกข้อมูล',
                        icon: 'warning',
                        iconColor: '#FA9583',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });

            $(document).on('click', '.btn-edit', function() {
                let id = $(this).data('id');
                $('.add-data').text('แก้ไขรายการ');
                $.ajax({
                    type: 'post',
                    url: "{{ route('api.v1.category.by.id') }}",
                    data: {
                        'id': id
                    },
                    dataType: "json",
                    success: function(response) {
                        $("#id").val(response.id);
                        $("#category_name").val(response.category_name);
                        $("#category_code").val(response.category_code);
                        category_modal.modal('show')
                    }
                });
            })

            $(document).on('click', '.btn-delete', function() {
                let id = $(this).data('id');
                // console.log(id);
                Swal.fire({
                    title: 'ยืนยันการลบรายการ?',
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
                            type: "post",
                            url: "{{ route('api.v1.category.delete') }}",
                            data: {
                                'id': id
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
                                    category_modal.modal('hide')
                                    getSupplyCategory();
                                } else {
                                    Swal.fire({
                                        position: 'center-center',
                                        icon: 'error',
                                        iconColor: '#FA9583',
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
        });
    </script>
@stop
