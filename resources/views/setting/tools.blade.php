@extends('setting_menu')
@section('side-card')

    <div class="card rounded-4 bg-hr-card">
        <div class="card-header border-0">
            <h6 class="text-bold"> <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentcolor" viewBox="0 0 1024 1024"> 
                <path d="M170.7 469.3h256a42.7 42.7 0 0 0 42.6-42.6V170.7a42.7 42.7 0 0 0-42.6-42.7H170.7a42.7 42.7 0 0 0-42.7 42.7v256a42.7 42.7 0 0 0 42.7 42.6z m426.6 0h256a42.7 42.7 0 0 0 42.7-42.6V170.7a42.7 42.7 0 0 0-42.7-42.7h-256a42.7 42.7 0 0 0-42.6 42.7v256a42.7 42.7 0 0 0 42.6 42.6zM170.7 896h256a42.7 42.7 0 0 0 42.6-42.7v-256a42.7 42.7 0 0 0-42.6-42.6H170.7a42.7 42.7 0 0 0-42.7 42.6v256a42.7 42.7 0 0 0 42.7 42.7z m554.6 0c94.1 0 170.7-76.5 170.7-170.7s-76.5-170.7-170.7-170.6-170.7 76.5-170.6 170.6 76.5 170.7 170.6 170.7z"> 
                </path> 
                </svg>  หมวดหมู่อุปกรณ์
            </h6>
        </div>
        <div class="card-body pt-0">
            <div class="row mt-1 list_supply" id="list_supply"></div>
            <div class="button px-0">
                <button type="button" class="form-control btn btn-outline-success rounded-pill mt-3 btn-add"><i
                        class="fa-solid fa-plus"></i>
                    เพิ่มหมวดหมู่</button>
            </div>
            {{-- <div class="card-footer bg-transparent px-0 mt-4">
                <button class="btn btn-hr-confirm form-control rounded-pill btn-save">บันทึก</button>
            </div> --}}
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
                            <label for="category_name" class="col-form-label text-color"><svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="#e6896a" viewBox="0 0 1024 1024"> 
                                <path d="M170.7 469.3h256a42.7 42.7 0 0 0 42.6-42.6V170.7a42.7 42.7 0 0 0-42.6-42.7H170.7a42.7 42.7 0 0 0-42.7 42.7v256a42.7 42.7 0 0 0 42.7 42.6z m426.6 0h256a42.7 42.7 0 0 0 42.7-42.6V170.7a42.7 42.7 0 0 0-42.7-42.7h-256a42.7 42.7 0 0 0-42.6 42.7v256a42.7 42.7 0 0 0 42.6 42.6zM170.7 896h256a42.7 42.7 0 0 0 42.6-42.7v-256a42.7 42.7 0 0 0-42.6-42.6H170.7a42.7 42.7 0 0 0-42.7 42.6v256a42.7 42.7 0 0 0 42.7 42.7z m554.6 0c94.1 0 170.7-76.5 170.7-170.7s-76.5-170.7-170.7-170.6-170.7 76.5-170.6 170.6 76.5 170.7 170.6 170.7z"> 
                                </path> 
                                </svg>
                                ชื่อหมวดหมู่</label>
                            <input type="text" class="form-control input-modal rounded-pill text-color"
                                id="category_name" name="category_name" required>
                        </div>
                        <div class="pr-3 pl-3">
                            <label for="category_code" class="col-form-label text-color"> <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="#e6896a" viewBox="0 0 1024 1024"> 
                                <path d="M120 160H72c-4.4 0-8 3.6-8 8v688c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8V168c0-4.4-3.6-8-8-8z m833 0h-48c-4.4 0-8 3.6-8 8v688c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8V168c0-4.4-3.6-8-8-8zM200 736h112c4.4 0 8-3.6 8-8V168c0-4.4-3.6-8-8-8H200c-4.4 0-8 3.6-8 8v560c0 4.4 3.6 8 8 8z m321 0h48c4.4 0 8-3.6 8-8V168c0-4.4-3.6-8-8-8h-48c-4.4 0-8 3.6-8 8v560c0 4.4 3.6 8 8 8z m126 0h178c4.4 0 8-3.6 8-8V168c0-4.4-3.6-8-8-8H647c-4.4 0-8 3.6-8 8v560c0 4.4 3.6 8 8 8z m-255 0h48c4.4 0 8-3.6 8-8V168c0-4.4-3.6-8-8-8h-48c-4.4 0-8 3.6-8 8v560c0 4.4 3.6 8 8 8z m-79 64H201c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h112c4.4 0 8-3.6 8-8v-48c0-4.4-3.6-8-8-8z m257 0h-48c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8v-48c0-4.4-3.6-8-8-8z m256 0H648c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h178c4.4 0 8-3.6 8-8v-48c0-4.4-3.6-8-8-8z m-385 0h-48c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8v-48c0-4.4-3.6-8-8-8z"> 
                                </path> 
                                </svg> 
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
                                        <div class="col-12 d-flex hhh px-0">
                                            <div class="input-group">
                                                <input type="text" class="form-control rounded-pill bg-white text-sm"
                                                    style="border-color: #c0e7e7; height: 45px;" disabled>
                                                <label class="position-main pt-2">${categoryName}</label>
                                                <label class="position-main2 pt-2">#${categoryCode}</label>
                                            </div>&nbsp;&nbsp;
                                            <button class="btn btn-sm rounded-pill btn-edit" style="color: #ffff;" data-id="${categoryId}"
                                                data-ac="edit" data-bs-toggle="modal" data-bs-target="#categoryModal"><em
                                                    class="fas fa-edit" style="font-size: 20px;"></em></button>&nbsp;&nbsp;
                                            <button class="btn btn-sm rounded-pill btn-delete" style="color: #ffff;" data-id="${categoryId}"><em
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
                                category_modal.modal('hide');
                                getSupplyCategory();
                            }
                        });
                    } else {
                        $.ajax({
                            type: 'post',
                            url: "{{ route('api.v1.category.update') }}",
                            data: data,
                            dataType: "json",
                            success: function(response) {
                                category_modal.modal('hide');
                                getSupplyCategory();
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
                            url: "{{ route('api.v1.category.delete') }}",
                            data: {
                                'id': id
                            },
                            dataType: "json",
                            success: function(response) {
                                getSupplyCategory();
                            }
                        });

                    }
                })
            })

        });
    </script>
@stop
