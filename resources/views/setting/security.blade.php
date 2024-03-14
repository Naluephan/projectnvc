@extends('setting_menu')

<style>
    .custom-file {
        position: relative;
        display: inline-block;
        width: 100%;
        height: calc(2.25rem + 2px);
        padding: 0.5rem 0.75rem;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        -webkit-transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .custom-file-input {
        position: absolute;
        top: 0;
        right: 0;
        left: 0;
        z-index: 3;
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        opacity: 0;
        cursor: pointer;
    }

    .custom-file-label {
        position: absolute;
        top: 0;
        right: 0;
        left: 0;
        z-index: 2;
        height: 100%;
        padding: 0.5rem 0.75rem;
        line-height: 1.5;
        color: #5a5e63;
        background-color: #fff;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        -webkit-transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .custom-file-label::after {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        z-index: 1;
        display: block;
        height: calc(2.25rem + 2px);
        padding: 0.5rem 0.75rem;
        line-height: 1.5;
        color: #495057;
        content: "Choose file";
        background-color: #fff;

        border: 1px solid #ced4da;
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

@section('side-card')

    <div class="card rounded-4 bg-hr-card">
        <div class="card-header border-0">
            <h6><i class="fas fa-user-shield"></i> รักษาความปลอดภัย</h6>
            <p class="mt-3"><i class="fas fa-exclamation-circle hr-icon"></i> กำหนดจุดสแกนเพื่อรักษาความปลอดภัย</p>
        </div>
        <div class="card-body">
            <div class="row mt-n4 security_list" id="security_list">

            </div>
            <button type="button" class="form-control btn btn-outline-success rounded-pill mt-3 btn-add"><i
                    class="fa-solid fa-plus"></i>
                เพิ่มหมวดหมู่</button>
        </div>
        <div class="card-footer bg-transparent">
            <button class="btn btn-hr-confirm form-control rounded-pill">บันทึก</button>
        </div>
    </div>
    <div class="modal fade" id="securityModal" tabindex="-1" aria-labelledby="securityModalLabel" aria-hidden="true"
        data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content modal-radius">
                <div class="modal-header background2 modal-header-radius">
                    <h6 class="modal-title" id="securityModalLabel"><i class="fa-solid fa-file-circle-plus"></i> เพิ่มข้อมูล
                    </h6>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                <div class="modal-body">
                    <form id="securityForm">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3 pr-3 pl-3">
                            <label for="security_name" class="col-form-label text-color"><i
                                    class="fas fa-th-list text-sm "></i> หัวข้อ</label>
                            <input type="text" class="form-control input-modal rounded-pill text-color"
                                id="security_name" name="security_name" required>
                        </div>
                        <div class="mb-3 pr-3 pl-3">
                            <label for="security_location" class="col-form-label text-color"><i
                                    class="fas fa-building text-sm hr-icon"></i> สถานที่</label>
                            <input type="text" class="form-control input-modal rounded-pill text-color"
                                id="security_location" name="security_location" required>
                        </div>
                        <div class="mb-3 pr-3 pl-3">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label for="security_patrol" class="col-form-label text-color"><i
                                            class="fas fa-user-shield hr-icon"></i> การตรวจตราทุกๆ(ชม.)</label>
                                    <input type="number" class="form-control input-modal rounded-pill text-color"
                                        id="security_patrol" name="security_patrol" required>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="security_time" class="col-form-label text-color"><i
                                            class="fas fa-clock hr-icon"></i> เวลาเริ่มต้น</label>
                                    <input type="time" class="form-control input-modal rounded-pill text-color"
                                        id="security_time" name="security_time" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 pr-3 pl-3">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label for="security_image" class="col-form-label text-color"><i
                                            class="fas fa-image hr-icon"></i> รูปสถานที่</label>
                                    <label for="import-file" class="import-file">
                                        {{-- <input type="file" class="form-control rounded-pill" id="location_img"
                                            name="location_img"> --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-upload"
                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="#707070" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                                            <path d="M7 9l5 -5l5 5" />
                                            <path d="M12 4l0 12" />
                                        </svg>
                                        <div>
                                            <p class="text-center">อัพโหลดรูปภาพ</p>
                                            <p class="text-center">ไฟล์ JPG, PNG</p>
                                        </div>
                                    </label>
                                    <input type="file" style="display: none;" id="upload_img" />
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
                            <button class="btn btn-hr-confirm form-control rounded-pill save-security">บันทึก</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/qrcode"></script>
    <script>
        $(() => {
            $(document).ready(function() {
                function getSecurityList() {
                    let data = {};

                    $.ajax({
                        url: "{{ route('api.v1.security.list') }}",
                        data: data,
                        type: "post",
                        dataType: "json",
                        success: function(response) {
                            $(".security_list").empty();
                            $.each(response.data, function(index, securityInfo) {
                                var id = securityInfo.id;
                                var img_path =
                                    '{{ asset('uploads/images/setting/security') }}';
                                var location_img = img_path + '/' + securityInfo
                                    .security_img;
                                var item = `
                                    <div class="card border border-2 p-0 rounded-4 detail" data-id="${id}">
                                        <div class="row">
                                            <div class="col-3">
                                                <div style="width: 100%; ">
                                                    <img src="${location_img}" class="border border-0 rounded-start-4" alt="..." style="position: absolute; width: 90%; height: 100%; object-fit: cover; ">
                                                </div>
                                            </div>
                                            <div class="col-5 ">
                                            <b><h6 class="ml-2 hr-text-green">${securityInfo.name}</h6></b>
                                                <p class="ml-2 text-black-50">${securityInfo.location}</p>
                                                <p class="ml-2 text-black-50">การตรวจตราทุก ${securityInfo.security_patrol} ชั่วโมง เริ่ม ${securityInfo.security_time} น.</p>
                                            </div>
                                            <div class="col-4">
                                                <div class="mt-2 mb-2 mr-2 text-end">
                                                    {!! QrCode::size(90)->generate('${id}') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `;
                                $(".security_list").append(item);
                            });

                        }
                    });
                }
                getSecurityList();
            });
            $(document).on('click', '.btn-add', function() {
                $('#securityModal').modal('show');
            });


            ////
        });
    </script>
@stop
