@extends('setting_menu')
@section('side-card')
    <style>
        .cursor-pointer {
            cursor: pointer;
        }

        .modal {
            overflow: auto !important;
        }

        .modal-dialog {
            top: 10% !important;
            width: 450px;
        }

        .import-file {
            height: 150px;
            width: auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border: 1px dashed #b3b3b3;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .import-file:hover {
            background-color: #f3f4f6;
        }

        .import-file svg {
            width: auto;
            height: 50px;
            fill: none;
            stroke: #898585;
            stroke-width: 3;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .import-file p {
            font-size: 12px;
            white-space: nowrap;
        }

        .import-file input[type="file"] {
            display: none;
        }
    </style>

    <div class="card p-3 rounded-4 bg-hr-card">
        <div class="card-header border-0 pb-0">
            <h6 class="text-bold"><i class="fas fa-cubes"></i> Item Organics Coins</h6>
        </div>
        <div class="card-body pt-0">
            <div class="mt-1 list_itemOrganicsCoins pb-2" id="list_itemOrganicsCoins"></div>
            <div class="button px-0">
                <button type="button" class="form-control btn btn-outline-success rounded-pill mt-3 btn-add"><i
                        class="fa-solid fa-plus"></i>
                    เพิ่มข้อมูล</button>
            </div>
            {{-- <div class="card-footer bg-transparent px-0 mt-4">
                <button class="btn btn-hr-confirm form-control rounded-pill">บันทึก</button>
            </div> --}}
        </div>
    </div>

    <div class="modal fade" id="itemOrganicsCoinsModal" tabindex="-1" aria-labelledby="itemOrganicsCoinsModalLabel"
        aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content modal-radius">
                <div class="modal-header background2 modal-header-radius">
                    <h6 class="modal-title" id="itemOrganicsCoinsModalLabel"><i class="fa-solid fa-file-circle-plus"></i>
                        <span class="add-data">เพิ่มข้อมูล</span>
                    </h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="itemOrganicsCoinsForm">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3 pr-3 pl-3">
                            <label for="reward_name" class="col-form-label text-color"><i
                                    class="fas fa-th-list text-sm"></i>
                                ชื่อ Item Organics Coins</label>
                            <input type="text" class="form-control input-modal rounded-pill text-color" id="reward_name"
                                name="reward_name" required>
                        </div>
                        <div class="mb-3 pr-3 pl-3">
                            <label for="reward_coins_change" class="col-form-label text-color"><i
                                    class="fas fa-newspaper text-sm"></i>
                                เหรียญที่ใช้แลก</label>
                            <input type="text" class="form-control input-modal rounded-pill text-color"
                                id="reward_coins_change" name="reward_coins_change" required>
                        </div>
                        <div class="pr-3 pl-3">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label for="reward_image" class="col-form-label text-color"><i
                                            class="fas fa-image hr-icon"></i> รูป Item Organics Coins</label>
                                    <input type="file" class="dropify" id="image_file" name="image_file" placeholder="">
                                </div>
                            </div>
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
                            <button
                                class="btn btn-hr-confirm form-control rounded-pill save-itemOrganicsCoins">บันทึก</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal detail --}}
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true"
        data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content modal-radius">
                <div class="modal-header background2 modal-header-radius">
                    <h6 class="modal-title" id="detailModalLabel">
                        Item Organics Coins
                    </h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="detailModal">
                        <div class="d-flex justify-content-end">
                            <div class="icons">
                                <i class="fas fa-edit mr-2 text-color btn-edit cursor-pointer"></i>
                                <i class="fas fa-trash-alt btn-delete cursor-pointer" style="color: #FA9583;"></i>
                            </div>
                        </div>
                        <div class="row list_detail" id="list_detail">
                            <div class="col-12">
                                <input type="hidden" name="id" id="id">
                                <div class="mb-3 pr-3 pl-3">
                                    <label for="detail-reward_name" class="col-form-label text-color"><i
                                            class="fas fa-th-list text-sm"></i>
                                        ชื่อ Item Organics Coins : </label>
                                    <label class="text-black-50 pt-1" id="detail-reward_name"></label>
                                </div>
                                <div class="mb-3 pr-3 pl-3">
                                    <label for="detail-reward_coins_change" class="col-form-label text-color"><i
                                            class="fas fa-newspaper text-sm"></i>
                                        เหรียญที่ใช้แลก : </label>
                                    <label class="text-black-50 pt-1" id="detail-reward_coins_change"></label>
                                </div>
                                <div class="pr-3 pl-3">
                                    <label for="detail-reward_image" class="col-form-label text-color"><i
                                            class="fas fa-image hr-icon"></i> รูป Item Organics Coin :
                                    </label>
                                    <div class="text-center pt-2">
                                        <img src="" class="border border-0 rounded-start-4 rounded-end-4 "
                                            alt="" style=" width: 180px; height: 180px;"
                                            id="detail-reward_image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="button-footer">
                    <div class="row">
                        <div class="col-12">
                            <button type="button" class="btn btn-hr-confirm form-control rounded-pill"
                                data-bs-dismiss="modal">ตกลง</button>
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
            $('.dropify').dropify({
                tpl: {
                    message: '<div class="dropify-message"><span class="file-icon"/><p><h6>อัพโหลดรูปภาพ<br/>ไฟล์ JPG, PNG, PDF</h6></p></div>',
                    preview: '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message"></p></div></div></div>',
                },
            });

            getItemOrganicsCoins();

            function getItemOrganicsCoins() {
                const listItemOrganicsCoins = document.getElementById('list_itemOrganicsCoins');
                listItemOrganicsCoins.innerHTML = '';
                $.ajax({
                    type: 'post',
                    url: "{{ route('api.v1.reward.list') }}",
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
                        var itemOrganicsCoinsContainer = $("#list_itemOrganicsCoins");
                        response.forEach(function(coinsInfo) {
                            var rewardId = coinsInfo.id;
                            var rewardName = coinsInfo.reward_name;
                            var img_path =
                                '{{ asset('uploads/images/setting/itemOrganicsCoins') }}';
                            var rewardImage = img_path + '/' + coinsInfo
                                .reward_image;
                            var rewardCoinsChange = coinsInfo.reward_coins_change;
                            var rewardDescription = coinsInfo.reward_description;
                            var Item = `
                            <div class="pb-2">
                                <div class="button-details btn-detail cursor-pointer p-0 w-100"
                                data-id="${rewardId}"
                                data-reward_name="${rewardName}"
                                data-reward_coins_change="${rewardCoinsChange}"
                                data-reward_image="${rewardImage}">
                                    <span class="button-text w-100">
                                        <div class="row">
                                            <div class="col-4 col-sm-3 px-0 d-flex align-items-center justify-content-center">
                                                <img src="${rewardImage}" alt=""
                                                    style="max-width: 111.94px; max-height: 111.94px;">
                                            </div>
                                            <div class="col-6 col-sm-7">
                                                <h6 class="text-bold mb-0 mr-2 py-2 text-truncate">${rewardName}</h6>
                                                <p class="text-bold mb-0" style="color: #d4d4d4;">ใช้คะแนน ${rewardCoinsChange} คะแนน</p>
                                            </div>
                                        </div>
                                    </span>
                                </div>
                            </div>
                            `;
                            itemOrganicsCoinsContainer.append(Item);
                        });
                    },
                });
            }

            var asset_modal = $("#itemOrganicsCoinsModal");
            $(document).on('click', '.btn-add', function() {
                asset_modal.modal('show')
                $('.add-data').text('เพิ่มข้อมูล');
                $('#reward_name').val('');
                $('#reward_coins_change').val('');
                $('#import-file').val('');
                $(".dropify-clear").trigger("click");
            })

            $(document).on('click', '.save-itemOrganicsCoins', function() {
                var id = $('#id').val();
                if ($('#itemOrganicsCoinsForm').valid()) {
                    var formData = new FormData();
                    formData.append('_token', $('#_token').val());
                    formData.append('id', $('#id').val());
                    formData.append('reward_name', $('#reward_name').val());
                    formData.append('reward_coins_change', $('#reward_coins_change').val());
                    if (document.getElementById("image_file").files.length != 0) {
                        formData.append('reward_image', $('#image_file').prop('files')[0]);
                    }
                    if (!id) {
                        Swal.fire({
                            title: 'ยืนยันการเพิ่มรายการ?',
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
                                    url: "{{ route('api.v1.reward.create') }}",
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
                                            $('#reward_name').val('');
                                            $('#reward_coins_change').val('');
                                            $('#import-file').val('');
                                            $('#id').val('');
                                            asset_modal.modal('hide');
                                            $(".dropify-clear").trigger("click");
                                            getItemOrganicsCoins();
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
                                    url: "{{ route('api.v1.reward.update') }}",
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
                                            $('#reward_name').val('');
                                            $('#reward_coins_change').val('');
                                            $('#import-file').val('');
                                            $('#id').val('');
                                            asset_modal.modal('hide');
                                            $(".dropify-clear").trigger("click");
                                            getItemOrganicsCoins();
                                        } else {
                                            Swal.fire({
                                                position: 'center-center',
                                                icon: 'error',
                                                title: 'แก้ไขรายการไม่สำเร็จ',
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

            $(document).on('click', '.btn-detail', function() {
                let id = $(this).data('id');
                let reward_name = $(this).data('reward_name');
                let reward_coins_change = $(this).data('reward_coins_change');
                let reward_image = $(this).data('reward_image');
                let data = {
                    id,
                    reward_name,
                    reward_coins_change,
                    reward_image
                }

                $('.btn-delete').data('id', id)
                $('.btn-edit').data('data', data)
                $('#detailModal').modal('show');

                $.ajax({
                    type: "post",
                    url: "{{ route('api.v1.reward.get.by.id') }}",
                    data: {
                        'id': id
                    },
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
                        var img_url = ''
                        if (response.data.reward_image != null) {
                            img_url =
                                "{{ asset('uploads/images/setting/itemOrganicsCoins') }}/" +
                                response.data.reward_image;
                        }
                        $('#detail-reward_name').text(response.data.reward_name);
                        $('#detail-reward_coins_change').text(response.data
                            .reward_coins_change);
                        $('#detail-reward_image').attr('src', img_url);
                    }
                });
            });

            $(document).on('click', '.btn-edit', function() {
                $('#detailModal').modal('hide');
                $('#itemOrganicsCoinsModal').modal('show');
                $('.add-data').text('แก้ไขข้อมูล');
                let data = $(this).data('data');
                // console.log(id);
                // console.log(reward_name);
                // console.log(reward_image);
                // console.log(reward_coins_change);
                $('#id').val(data.id);
                $('#reward_name').val(data.reward_name);
                $('#reward_coins_change').val(data.reward_coins_change);
                // $('#reward_image').val(reward_image);
                $("#image_file").attr("data-default-file", data.reward_image); //dropify
                // $('#image_file').prop('required',false);
                $('.dropify-render').html('<img src="" />');
                $('.dropify-render img').attr('src', data.reward_image);
                $('.dropify-preview').css('display', 'block');
                $('.dropify-filename-inner').text(image);
            });

            $(document).on('click', '.btn-delete', function() {
                let obj = $(this);
                let id = obj.data('id');
                console.log(id);
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
                            url: "{{ route('api.v1.reward.delete') }}",
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
                                    $('#detailModal').modal('hide');
                                    $('#itemOrganicsCoinsModal').modal('hide');
                                    getItemOrganicsCoins();
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
                })
            })

        });
    </script>
@stop
