@extends('setting_menu')
@section('side-card')
    <style>
        .cursor-pointer {
            cursor: pointer;
        }


        .modal-dialog {
            top: 10% !important;
            width: 450px;
        }
    </style>

    <div class="card p-3 rounded-4 bg-hr-card">
        <div class="card-header border-0 pb-0">
            <h6 class="text-bold"><i class="fas fa-cubes"></i> Item Organics Coins</h6>
        </div>
        <div class="card-body pt-0">
            <div class="row mt-1 list_itemOrganicsCoins p-2" id="list_itemOrganicsCoins"></div>
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
                            <label for="reward_image" class="col-form-label text-color"><i
                                    class="fas fa-newspaper text-sm"></i>
                                รูป Item Organics Coins</label>
                            <input type="text" class="form-control input-modal rounded-pill text-color" id="reward_image"
                                name="reward_image" required>
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



@stop
@section('js')
    <script>
        $(() => {

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
                            var rewardImage = coinsInfo.reward_image;
                            var rewardCoinsChange = coinsInfo.reward_coins_change;
                            var rewardDescription = coinsInfo.reward_description;
                            var Item = `
                            <div class="content p-2">
                                <div class="row button-details p-0 w-100 mb-3 cursor-pointer" style="height: 130px;">
                                    <span class="button-text w-100 pt-3">
                                        <div class="row">
                                            <div class="col-4 col-sm-3 pl-0">
                                                <img src="${rewardImage}" alt=""
                                                    style="max-width: 100%; height: 100%;">
                                            </div>
                                            <div class="col-6 col-sm-7">
                                                <h6 class="text-bold mb-0 mr-2 py-2 text-truncate">${rewardName}</h6>
                                                <p class="text-bold mb-0" style="color: #d4d4d4;">ใช้คะแนน ${rewardCoinsChange} คะแนน</p>
                                            </div>
                                            <div class="col-2 col-sm-2 d-flex justify-content-end">
                                                <div class="icons">
                                                    <i class="fas fa-edit mr-2 text-color btn-edit cursor-pointer" data-id="${rewardId}"></i>
                                                    <i class="fas fa-trash-alt btn-delete cursor-pointer" style="color: #FA9583;" data-id="${rewardId}"></i>
                                                </div>
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
            })

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

            $(document).on('click', '.save-itemOrganicsCoins', function() {
                let id = $("#id").val();
                let itemOrganicsCoinsForm = $("#itemOrganicsCoinsForm");
                if (itemOrganicsCoinsForm.valid()) {
                    const formData = new FormData($("#itemOrganicsCoinsForm")[0]);
                    const data = Object.fromEntries(formData.entries());
                    if (id.length == 0) {

                        $.ajax({
                            type: 'post',
                            url: "{{ route('api.v1.reward.create') }}",
                            data: data,
                            dataType: "json",
                            success: function(response) {
                                asset_modal.modal('hide');
                                getItemOrganicsCoins();
                            }
                        });
                    } else {
                        $.ajax({
                            type: 'post',
                            url: "{{ route('api.v1.reward.update') }}",
                            data: data,
                            dataType: "json",
                            success: function(response) {
                                asset_modal.modal('hide');
                                getItemOrganicsCoins();
                            }
                        });
                    }
                }
            })

            $(document).on('click', '.btn-edit', function() {
                let id = $(this).data('id');
                // console.log(id);
                $.ajax({
                    type: 'post',
                    url: "{{ route('api.v1.reward.get.by.id') }}",
                    data: {
                        'id': id
                    },
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
                        getItemOrganicsCoins(response);
                        $("#id").val(response.id);
                        asset_modal.modal('show')
                    }
                });
            })

            $(document).on('click', '.btn-delete', function() {
                let obj = $(this);
                let id = obj.data('id');
                // console.log(id);
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
                                getItemOrganicsCoins();
                            }
                        });

                    }
                })
            })

        });
    </script>
@stop
