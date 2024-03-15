@extends('setting_menu')
@section('side-card')
    <style>

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
                        <div class="pr-3 pl-3">
                            <label for="reward_coins_change" class="col-form-label text-color"><i
                                    class="fas fa-newspaper text-sm"></i>
                                เหรียญที่ใช้แลก</label>
                            <input type="text" class="form-control input-modal rounded-pill text-color"
                                id="reward_coins_change" name="reward_coins_change" required>
                        </div>
                        <div class="mb-3 pr-3 pl-3">
                            <label for="reward_description" class="col-form-label text-color"><i
                                    class="fas fa-th-list text-sm"></i>
                                รายละเอียด Item Organics Coins</label>
                            <input type="text" class="form-control input-modal rounded-pill text-color"
                                id="reward_description" name="reward_description" required>
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

            // getItemOrganicsCoins();

            // function getItemOrganicsCoins() {
            //     let id = "{{ Auth::user()->id }}";
            //     const listItemOrganicsCoins = document.getElementById('list_itemOrganicsCoins');
            //     listItemOrganicsCoins.innerHTML = '';
            //     $.ajax({
            //         type: 'post',
            //         url: "{{ route('api.v1.asset.category.list') }}",
            //         data: {
            //             'id': id,
            //         },
            //         dataType: "json",
            //         success: function(response) {
            //             //console.log(response);
            //             var itemOrganicsCoinsContainer = $(".list_itemOrganicsCoins");
            //             response.forEach(function(assetInfo) {
            //                 var cetegoryId = assetInfo.id;
            //                 var cetegoryName = assetInfo.cetegory_name;
            //                 var cetegoryCode = assetInfo.cetegory_code;
            //                 var Item = `
            //                 <div class="test pt-2">
            //                     <div class="row">
            //                         <div class="col-12 d-flex hhh px-0">
            //                             <div class="input-group">
            //                                 <input type="text" class="form-control rounded-pill bg-white text-sm"
            //                                     style="border-color: #c0e7e7; height: 45px;" disabled>
            //                                 <label class="position-main pt-2">${cetegoryName}</label>
            //                                 <label class="position-main2 pt-2">#${cetegoryCode}</label>
            //                             </div>&nbsp;&nbsp;
            //                             <button class="btn btn-sm rounded-pill btn-edit" style="color: #ffff;" data-id="${cetegoryId}"
            //                                 data-ac="edit" data-bs-toggle="modal" data-bs-target="#assetModal"><em
            //                                     class="fas fa-edit" style="font-size: 20px;"></em></button>&nbsp;&nbsp;
            //                             <button class="btn btn-sm rounded-pill btn-delete" style="color: #ffff;" data-id="${cetegoryId}"><em
            //                                     class="fas fa-trash-alt" style="font-size: 20px;"></em></button>
            //                         </div>
            //                     </div>
            //                 </div>
            //             `;
            //                 itemOrganicsCoinsContainer.append(Item);
            //             });

            //         },
            //     });
            // }

            var asset_modal = $("#itemOrganicsCoinsModal");
            $(document).on('click', '.btn-add', function() {
                asset_modal.modal('show')
            })
        });
    </script>
@stop
