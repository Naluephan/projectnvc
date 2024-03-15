@extends('setting_menu')
@section('side-card')

    <div class="card rounded-4 bg-hr-card">
        <div class="card-header border-0">
            <h6 class="text-bold"><svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentcolor" viewBox="0 0 1024 1024"> 
                <path d="M170.7 469.3h256a42.7 42.7 0 0 0 42.6-42.6V170.7a42.7 42.7 0 0 0-42.6-42.7H170.7a42.7 42.7 0 0 0-42.7 42.7v256a42.7 42.7 0 0 0 42.7 42.6z m426.6 0h256a42.7 42.7 0 0 0 42.7-42.6V170.7a42.7 42.7 0 0 0-42.7-42.7h-256a42.7 42.7 0 0 0-42.6 42.7v256a42.7 42.7 0 0 0 42.6 42.6zM170.7 896h256a42.7 42.7 0 0 0 42.6-42.7v-256a42.7 42.7 0 0 0-42.6-42.6H170.7a42.7 42.7 0 0 0-42.7 42.6v256a42.7 42.7 0 0 0 42.7 42.7z m554.6 0c94.1 0 170.7-76.5 170.7-170.7s-76.5-170.7-170.7-170.6-170.7 76.5-170.6 170.6 76.5 170.7 170.6 170.7z"> 
                </path> 
                </svg> หมวดหมู่ทรัพย์สิน</h6>
        </div>
        <div class="card-body pt-0">
            <div class="row mt-1 list_asset" id="list_asset"></div>
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

    <div class="modal fade" id="assetModal" tabindex="-1" aria-labelledby="assetModalLabel" aria-hidden="true"
        data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content modal-radius">
                <div class="modal-header background2 modal-header-radius">
                    <h6 class="modal-title" id="assetModalLabel"><i class="fa-solid fa-file-circle-plus"></i></h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="assetForm">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3 pr-3 pl-3">
                            <label for="cetegory_name" class="col-form-label text-color"><svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="#e6896a" viewBox="0 0 1024 1024"> 
                                <path d="M170.7 469.3h256a42.7 42.7 0 0 0 42.6-42.6V170.7a42.7 42.7 0 0 0-42.6-42.7H170.7a42.7 42.7 0 0 0-42.7 42.7v256a42.7 42.7 0 0 0 42.7 42.6z m426.6 0h256a42.7 42.7 0 0 0 42.7-42.6V170.7a42.7 42.7 0 0 0-42.7-42.7h-256a42.7 42.7 0 0 0-42.6 42.7v256a42.7 42.7 0 0 0 42.6 42.6zM170.7 896h256a42.7 42.7 0 0 0 42.6-42.7v-256a42.7 42.7 0 0 0-42.6-42.6H170.7a42.7 42.7 0 0 0-42.7 42.6v256a42.7 42.7 0 0 0 42.7 42.7z m554.6 0c94.1 0 170.7-76.5 170.7-170.7s-76.5-170.7-170.7-170.6-170.7 76.5-170.6 170.6 76.5 170.7 170.6 170.7z"> 
                                </path> 
                                </svg>
                                ชื่อหมวดหมู่</label>
                            <input type="text" class="form-control input-modal rounded-pill text-color"
                                id="cetegory_name" name="cetegory_name" required>
                        </div>
                        <div class="pr-3 pl-3">
                            <label for="cetegory_code" class="col-form-label text-color"><svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="#e6896a" viewBox="0 0 1024 1024"> 
                                <path d="M120 160H72c-4.4 0-8 3.6-8 8v688c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8V168c0-4.4-3.6-8-8-8z m833 0h-48c-4.4 0-8 3.6-8 8v688c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8V168c0-4.4-3.6-8-8-8zM200 736h112c4.4 0 8-3.6 8-8V168c0-4.4-3.6-8-8-8H200c-4.4 0-8 3.6-8 8v560c0 4.4 3.6 8 8 8z m321 0h48c4.4 0 8-3.6 8-8V168c0-4.4-3.6-8-8-8h-48c-4.4 0-8 3.6-8 8v560c0 4.4 3.6 8 8 8z m126 0h178c4.4 0 8-3.6 8-8V168c0-4.4-3.6-8-8-8H647c-4.4 0-8 3.6-8 8v560c0 4.4 3.6 8 8 8z m-255 0h48c4.4 0 8-3.6 8-8V168c0-4.4-3.6-8-8-8h-48c-4.4 0-8 3.6-8 8v560c0 4.4 3.6 8 8 8z m-79 64H201c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h112c4.4 0 8-3.6 8-8v-48c0-4.4-3.6-8-8-8z m257 0h-48c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8v-48c0-4.4-3.6-8-8-8z m256 0H648c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h178c4.4 0 8-3.6 8-8v-48c0-4.4-3.6-8-8-8z m-385 0h-48c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8v-48c0-4.4-3.6-8-8-8z"> 
                                </path> 
                                </svg> 
                                รหัสหมวดหมู่ (กำหนดตัวอักษรภาษาอังกฤษ 3
                                อักษร)</label>
                            <input type="text" class="form-control input-modal rounded-pill text-color"
                                id="cetegory_code" name="cetegory_code" required>
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
                            <button class="btn btn-hr-confirm form-control rounded-pill save-asset">บันทึก</button>
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
            getAssetCategory();

            function getAssetCategory() {
                let id = "{{ Auth::user()->id }}";
                const listAsset = document.getElementById('list_asset');
                listAsset.innerHTML = '';
                $.ajax({
                    type: 'post',
                    url: "{{ route('api.v1.asset.category.list') }}",
                    data: {
                        'id': id,
                    },
                    dataType: "json",
                    success: function(response) {
                        //console.log(response);
                        var assetContainer = $(".list_asset");
                        response.forEach(function(assetInfo) {
                            var cetegoryId = assetInfo.id;
                            var cetegoryName = assetInfo.cetegory_name;
                            var cetegoryCode = assetInfo.cetegory_code;
                            var Item = `
                            <div class="test pt-2">
                                <div class="row">
                                    <div class="col-12 d-flex hhh">
                                        <div class="input-group">
                                            <input type="text" class="form-control rounded-pill bg-white text-sm"
                                                style="border-color: #c0e7e7; height: 45px;" disabled>
                                            <label class="position-main pt-2">${cetegoryName}</label>
                                            <label class="position-main2 pt-2">#${cetegoryCode}</label>
                                        </div>&nbsp;&nbsp;
                                        <button class="btn btn-sm rounded-pill btn-edit" style="color: #ffff;" data-id="${cetegoryId}"
                                            data-ac="edit" data-bs-toggle="modal" data-bs-target="#assetModal"><em
                                                class="fas fa-edit" style="font-size: 20px;"></em></button>&nbsp;&nbsp;
                                        <button class="btn btn-sm rounded-pill btn-delete" style="color: #ffff;" data-id="${cetegoryId}"><em
                                                class="fas fa-trash-alt" style="font-size: 20px;"></em></button>
                                    </div>
                                </div>
                            </div>
                        `;
                            assetContainer.append(Item);
                        });

                    },
                });
            }

            var asset_modal = $("#assetModal");
            $(document).on('click', '.btn-add', function() {
                asset_modal.modal('show')
            })

            $(document).on('click', '.save-asset', function() {
                let id = $("#id").val();
                let assetForm = $("#assetForm");
                if (assetForm.valid()) {
                    const formData = new FormData($("#assetForm")[0]);
                    const data = Object.fromEntries(formData.entries());
                    if (id.length == 0) {

                        $.ajax({
                            type: 'post',
                            url: "{{ route('api.v1.asset.category.create') }}",
                            data: data,
                            dataType: "json",
                            success: function(response) {
                                asset_modal.modal('hide');
                                getAssetCategory();
                            }
                        });
                    } else {
                        $.ajax({
                            type: 'post',
                            url: "{{ route('api.v1.asset.category.update') }}",
                            data: data,
                            dataType: "json",
                            success: function(response) {
                                asset_modal.modal('hide');
                                getAssetCategory();
                            }
                        });
                    }
                }
            })

            $(document).on('click', '.btn-edit', function() {
                let id = $(this).data('id');
                $.ajax({
                    type: 'post',
                    url: "{{ route('api.v1.pickup.tools.show.detail.by.id') }}",
                    data: {
                        'id': id
                    },
                    dataType: "json",
                    success: function(response) {
                        setAssetFormData(response);
                        $("#id").val(response.id);
                        asset_modal.modal('show')
                    }
                });
            })

            function setAssetFormData(data) {
                $("#cetegory_name").val(data.cetegory_name);
                $("#cetegory_code").val(data.cetegory_code);
            }

            asset_modal.on('show.bs.modal', function(event) {
                let btn = $(event.relatedTarget);
                let title = btn.data('ac') === 'edit' ? '<em class="fas fa-edit"></em>&nbsp;แก้ไขรายการ' :
                    '<i class="fa-solid fa-file-circle-plus"></i>&nbsp;เพิ่มข้อมูล';
                //console.log(btn.data('ac'));
                let obj = $(this);
                obj.find('.modal-title').html(title);
            });

            asset_modal.on('hide.bs.modal', function() {
                let obj = $(this);
                obj.find('#id').val("");
                obj.find('#cetegory_name').val("");
                obj.find('#cetegory_code').val("");
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
                            url: "{{ route('api.v1.asset.category.delete') }}",
                            data: {
                                'id': id
                            },
                            dataType: "json",
                            success: function(response) {
                                getAssetCategory();
                            }
                        });

                    }
                })
            })

        });
    </script>
@stop
