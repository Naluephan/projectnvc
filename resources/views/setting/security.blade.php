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

    .modal-dialog {
        top: 10% !important;
        width: 450px;
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
                เพิ่มข้อมูล</button>
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
                    <h6 class="modal-title " id="securityModalLabel"><i class="fa-solid fa-file-circle-plus"></i> <span
                            class="add-data">เพิ่มข้อมูล</span>
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
                            <button class="btn btn-hr-confirm form-control rounded-pill save-security">บันทึก</button>
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
                        ข้อมูลรักษาความปลอดภัย
                    </h6>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                <div class="modal-body security_detail" id="security_detail">
                    <div class="row">
                        <div class="col-10 col-sm-10">
                            <h6 class="hr-text-green" id="detail-name"></h6>
                            <p class="text-black-50" id="detail-location"></p>
                            <p class="text-black-50 mt-n3">การตรวจตราทุก <span id="detail-security_patrol">0</span>
                                ชั่วโมง เริ่ม <span id="detail-security_time">0</span> น.</p>
                        </div>
                        <div class="col-2 col-sm-2">
                            <p class="text-end">
                                <span class="btn-edit" id="security_edit"><i
                                        class="fas fa-edit hr-text-green mr-2"></i></span>
                                <span class="btn-delete" id="security_id"><i
                                        class="fas fa-trash-alt hr-icon mr-2 mt-1"></i></span>
                            </p>
                        </div>
                    </div>
                    <p for="security_image" class="col-form-label text-color"><i class="fas fa-image hr-icon"></i>
                        รูปสถานที่</p>
                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <div class="text-center">
                                <img src="" class="border border-0 rounded-start-4 rounded-end-4 " alt=""
                                    style=" width: 180px; height: 180px;" id="detail-security_img">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p for="" class="col-form-label text-color"><i class="fas fa-qrcode hr-icon"></i>
                                QR Code</p>
                        </div>
                        <div class="col-6">
                            <p class="hr-icon print-qr mt-1 text-end"><i class="fas fa-download"></i> ดาวน์โหลด</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <div class="text-center qr-code" id="qrCodeDiv">
                                {!! QrCode::size(180)->generate('5') !!}
                            </div>
                        </div>
                    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/qrcode"></script>
    <script>
        $(() => {
            $('.dropify').dropify({
                tpl: {
                    message: '<div class="dropify-message"><span class="file-icon"/><p><h5>กรุณาเลือกไฟล์ภาพ</h5></p></div>',
                    preview: '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message"></p></div></div></div>',
                },
            });

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
                                    <div class="card border border-2 p-0 rounded-4 btn-detail" data-id="${id}">
                                        <div class="row">
                                            <div class="col-3">
                                                <div style="width: 100%; ">
                                                    <img src="${location_img}" class="border border-0 rounded-start-4" alt="..." style="position: absolute; width: 90%; height: 100%; object-fit: cover; ">
                                                </div>
                                            </div>
                                            <div class="col-5 ">
                                            <b><h6 class="ml-2 hr-text-green mt-2">${securityInfo.name}</h6></b>
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

            $(document).on('click', '.btn-add', function() {
                $('#securityModal').modal('show');
                $('#security_name').val('');
                $('#security_location').val('');
                $('#security_patrol').val('');
                $('#security_time').val('');
                $('#import-file').val('');
                $('#securityModal').modal('hide');
                $('#id').val('');
                $('.add-data').text('เพิ่มข้อมูล');
                $(".dropify-clear").trigger("click");
            });

            $(document).on('click', '.save-security', function() {
                var id = $('#id').val();
                if ($('#securityForm').valid()) {
                    var formData = new FormData();
                    formData.append('_token', $('#_token').val());
                    formData.append('id', $('#id').val());
                    formData.append('name', $('#security_name').val());
                    formData.append('location', $('#security_location').val());
                    formData.append('security_patrol', $('#security_patrol').val());
                    formData.append('security_time', $('#security_time').val());
                    if (document.getElementById("image_file").files.length != 0) {
                        formData.append('security_img', $('#image_file').prop('files')[0]);
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
                                    url: "{{ route('api.v1.security.create') }}",
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
                                            $('#security_name').val('');
                                            $('#security_location').val('');
                                            $('#security_patrol').val('');
                                            $('#security_time').val('');
                                            $('#import-file').val('');
                                            $('#securityModal').modal('hide');
                                            $('#id').val('');
                                            $(".dropify-clear").trigger("click");
                                            getSecurityList();
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
                                    url: "{{ route('api.v1.security.update') }}",
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
                                            $('#security_name').val('');
                                            $('#security_location').val('');
                                            $('#security_patrol').val('');
                                            $('#security_time').val('');
                                            $('#import-file').val('');
                                            $('#securityModal').modal('hide');
                                            $('#id').val('');
                                            $(".dropify-clear").trigger("click");
                                            getSecurityList();
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
                $('#detailModal').modal('show');
                $.ajax({
                    type: "post",
                    url: "{{ route('api.v1.security.by.id') }}",
                    data: {
                        'id': id
                    },
                    dataType: "json",
                    success: function(response) {
                        var img_url = ''
                        if (response.data.security_img != null) {
                            img_url = "{{ asset('uploads/images/setting/security') }}/" +
                                response.data.security_img;
                        }
                        $('#detail-name').text(response.data.name);
                        $('#detail-location').text(response.data.location);
                        $('#detail-security_patrol').text(response.data.security_patrol);
                        $('#detail-security_time').text(response.data.security_time);
                        $('#detail-security_img').attr('src', img_url);
                        $('#security_id').val(response.data.id);
                        $('#security_edit').val(response.data.id);
                        $('#security_edit').data('name', response.data.name);
                        $('#security_edit').data('location', response.data.location);
                        $('#security_edit').data('security_patrol', response.data
                            .security_patrol);
                        $('#security_edit').data('security_time', response.data.security_time);
                        $('#security_edit').data('security_img', img_url);
                        $('#security_edit').data('security_img_name', response.data.security_img);
                    }
                });
            });

            $(document).on('click', '.btn-edit', function() {
                const id = $('#security_edit').val();
                var name = $(this).data('name');
                var location = $(this).data('location');
                var security_patrol = $(this).data('security_patrol');
                var security_time = $(this).data('security_time');
                var img_url = $(this).data('security_img');
                var image = $(this).data('security_img_name');
                $('#detailModal').modal('hide');
                $('#securityModal').modal('show');
                $('#security_name').val(name);
                $('#security_location').val(location);
                $('#security_patrol').val(security_patrol);
                $('#security_time').val(security_time);
                $('#id').val(id);
                $("#image_file").attr("data-default-file", img_url); //dropify
                // $('#image_file').prop('required',false);
                $('.dropify-render').html('<img src="" />');
                $('.dropify-render img').attr('src', img_url);
                $('.dropify-preview').css('display', 'block');
                $('.dropify-filename-inner').text(image);
                $('.add-data').text('แก้ไขข้อมูล');
            });

            $(document).on('click', '.btn-delete', function() {
                const id = $('#security_id').val();
                console.log(id);
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
                            url: "{{ route('api.v1.security.update') }}",
                            data: {
                                'id': id,
                                'record_status': 0
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
                                    getSecurityList();
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
            $('.print-qr').click(function() {
                printQRCode();
            });

            function printQRCode() {
                var printContents = $('#qrCodeDiv').html();
                var newWindow = window.open('', '_blank');

                newWindow.document.write('<html><head><title>Print</title></head><body>');
                newWindow.document.write(printContents);
                newWindow.document.write('</body></html>');

                newWindow.document.close();
                newWindow.print();
            }
            ////
        });
    </script>
@stop
