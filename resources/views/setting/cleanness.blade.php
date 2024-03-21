@extends('setting_menu')
@section('side-card')
    <style>
        .modal {
            overflow: auto !important;
        }

        .cursor-pointer {
            cursor: pointer;
        }

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

        .rounded-all {
            border-radius: 50px;
        }
    </style>
    <div class="card rounded-4 bg-hr-card">
        <div class="card-header border-0">
            <h6 class="text-bold"><svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentcolor"
                    viewBox="0 0 1024 1024">
                    <path
                        d="M170.7 469.3h256a42.7 42.7 0 0 0 42.6-42.6V170.7a42.7 42.7 0 0 0-42.6-42.7H170.7a42.7 42.7 0 0 0-42.7 42.7v256a42.7 42.7 0 0 0 42.7 42.6z m426.6 0h256a42.7 42.7 0 0 0 42.7-42.6V170.7a42.7 42.7 0 0 0-42.7-42.7h-256a42.7 42.7 0 0 0-42.6 42.7v256a42.7 42.7 0 0 0 42.6 42.6zM170.7 896h256a42.7 42.7 0 0 0 42.6-42.7v-256a42.7 42.7 0 0 0-42.6-42.6H170.7a42.7 42.7 0 0 0-42.7 42.6v256a42.7 42.7 0 0 0 42.7 42.7z m554.6 0c94.1 0 170.7-76.5 170.7-170.7s-76.5-170.7-170.7-170.6-170.7 76.5-170.6 170.6 76.5 170.7 170.6 170.7z">
                    </path>
                </svg> รักษาความสะอาด</h6>
            <p>กำหนดจุดแสกนเพื่อรักษาความสะอาด</p>
        </div>
        <div class="card-body pt-0">
            <div class="mt-1 pb-2 list_position" id="list_position">
            </div>
            <div class="button px-0">
                <button type="button" class="form-control btn btn-outline-success rounded-pill mt-3 btn-add"><i
                        class="fa-solid fa-plus"></i>
                    เพิ่มข้อมูล</button>
            </div>
        </div>
    </div>


    <div class="modal fade" id="cleanlineModal" tabindex="-1" aria-labelledby="cleanlineModalLabel" aria-hidden="true"
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
                    <form id="cleanlineForm">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3 pr-3 pl-3">
                            <label for="title" class="col-form-label text-color"><i class="fas fa-th-list text-sm "></i>
                                หัวข้อ</label>
                            <input type="text" class="form-control input-modal rounded-pill text-color" id="title"
                                name="title" placeholder="กรุณากรอกข้อมูล" required>
                        </div>
                        <div class="mb-3 pr-3 pl-3">
                            <label for="location" class="col-form-label text-color"><i
                                    class="fas fa-building text-sm hr-icon"></i> สถานที่</label>
                            <input type="text" class="form-control input-modal rounded-pill text-color" id="location"
                                name="location" placeholder="กรุณากรอกข้อมูล" required>
                        </div>
                        <div class="mb-3 pr-3 pl-3">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label for="time" class="col-form-label text-color"><i
                                            class="fas fa-user-shield hr-icon"></i> การตรวจตราทุกๆ(ชม.)</label>
                                    <input type="number" class="form-control input-modal rounded-pill text-color"
                                        id="time" name="time" placeholder="กรุณากรอกข้อมูล" required min="1"
                                        max="8">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="time_start" class="col-form-label text-color"><i
                                            class="fas fa-clock hr-icon"></i> เวลาเริ่มต้น</label>
                                    <input type="time" class="form-control input-modal rounded-pill text-color"
                                        id="time_start" name="time_start" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 pr-3 pl-3">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label for="image_location" class="col-form-label text-color"><i
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
                            <button class="btn btn-hr-confirm form-control rounded-pill save-position">บันทึก</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cleanlineDetailModal" tabindex="-1" aria-labelledby="cleanlineDetailModalLabel"
        aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content modal-radius">
                <div class="modal-header background2 modal-header-radius">
                    <h6 class="modal-title" id="detailModalLabel">
                        ข้อมูลรักษาความสะอาด
                    </h6>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                <div class="modal-body cleanness_detail" id="cleanness_detail">
                    <div class="row">
                        <div class="col-10 col-sm-10">
                            <h6 class="hr-text-green" id="detail-title"></h6>
                            <p class="text-black-50" id="detail-location"></p>
                            <p class="text-black-50 mt-n3">การตรวจตราทุก <span id="detail-time">0</span>
                                ชั่วโมง เริ่ม <span id="detail-time">0</span> น.</p>
                        </div>
                        <div class="col-2 col-sm-2">
                            <p class="text-end">
                                <span class="btn-edit" id="cleanness_edit"><i
                                        class="fas fa-edit cursor-pointer hr-text-green mr-2"></i></span>
                                <span class="btn-delete" id="cleanness_id"><i
                                        class="fas fa-trash-alt cursor-pointer hr-icon mr-2 mt-1"></i></span>
                            </p>
                        </div>
                    </div>
                    <p for="image_location" class="col-form-label text-color"><i class="fas fa-image hr-icon"></i>
                        รูปภาพสถานที่</p>
                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <div class="text-center rounded-4">
                                <img src="" class="border border-0 rounded-4 rounded-all" alt=""
                                    style="max-width: 180px; max-height: 180px;" id="detail-image_location">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p for="" class="col-form-label text-color"><i class="fas fa-qrcode hr-icon"></i>
                                QR Code</p>
                        </div>
                        <div class="col-6">
                            <p class="hr-icon cursor-pointer print-qr mt-1 text-end"><i class="fas fa-download"></i>
                                ดาวน์โหลด</p>
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

            getPositionCleanLine();

            function getPositionCleanLine() {
                let id = "{{ Auth::user()->id }}";
                const listPosition = document.getElementById('list_position');
                listPosition.innerHTML = '';
                $.ajax({
                    type: 'post',
                    url: "{{ route('api.v1.position.clean.line.list') }}",
                    data: {
                        'id': id,
                    },
                    dataType: "json",
                    success: function(response) {
                        //console.log(response);
                        var assetContainer = $(".list_position");
                        response.forEach(function(positionInfo) {
                            var id = positionInfo.id;
                            var title = positionInfo.title;
                            var location = positionInfo.location;
                            var time = positionInfo.time;
                            var time_start = positionInfo.time_start;
                            var img_path =
                                '{{ asset('uploads/images/content/cleanness') }}';
                            var image_location = img_path + '/' + positionInfo
                                .image_location;
                            var qr_code = positionInfo.qr_code;
                            var Item = `
                            <div class="pb-2">
                                <div class="button-details btn-detail cursor-pointer p-0 w-100" data-id="${id}">
                                    <span class="button-text w-100">
                                        <div class="row">
                                            <div class="col-3 px-0 d-flex align-items-center justify-content-center">
                                                <img src="${image_location}"
                                                    alt="" style="max-width: 111.94px; max-height: 111.94px;">
                                            </div>
                                            <div class="col-5">
                                                <h6 class="hr-text-green pt-2">${title}</h6>
                                                <p class="text-black-50">${location}</p>
                                                <p class="text-black-50">ทำความสะอาดทุก ${time} ชั่วโมง เริ่ม ${time_start} น.</p>
                                            </div>

                                            <div class="col-4">
                                                <div class="pt-2 pb-2 pr-2 text-end">
                                                    {!! QrCode::size(90)->generate('${id}') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </span>
                                </div>
                            </div>
                            `;
                            assetContainer.append(Item);
                        });
                    },
                });
            }

            var cleanline_modal = $("#cleanlineModal");
            $(document).on('click', '.btn-add', function() {
                cleanline_modal.modal('show')
                $('#title').val('');
                $('#location').val('');
                $('#time').val('');
                $('#time_start').val('');
                $('#import-file').val('');
                $('#id').val('');
                $(".dropify-clear").trigger("click");
            })

            $(document).on('click', '.save-position', function() {
                var id = $('#id').val();
                if ($('#cleanlineForm').valid()) {
                    var formData = new FormData();
                    formData.append('_token', $('#_token').val());
                    formData.append('id', $('#id').val());
                    formData.append('title', $('#title').val());
                    formData.append('location', $('#location').val());
                    formData.append('time', $('#time').val());
                    formData.append('time_start', $('#time_start').val());
                    if (document.getElementById("image_file").files.length != 0) {
                        formData.append('image_location', $('#image_file').prop('files')[0]);
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
                                    url: "{{ route('api.v1.position.clean.line.create') }}",
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
                                            $('#title').val('');
                                            $('#location').val('');
                                            $('#time').val('');
                                            $('#time_start').val('');
                                            $('#import-file').val('');
                                            $('#id').val('');
                                            $(".dropify-clear").trigger("click");
                                            cleanline_modal.modal('hide')
                                            getPositionCleanLine();
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
                                    url: "{{ route('api.v1.position.clean.line.update') }}",
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
                                            $('#title').val('');
                                            $('#location').val('');
                                            $('#time').val('');
                                            $('#time_start').val('');
                                            $('#import-file').val('');
                                            $('#id').val('');
                                            $(".dropify-clear").trigger("click");
                                            cleanline_modal.modal('hide')
                                            getPositionCleanLine();
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

            var cleanline_detail_modal = $("#cleanlineDetailModal");
            $(document).on('click', '.btn-detail', function() {
                let id = $(this).data('id');
                cleanline_detail_modal.modal('show')

                $.ajax({
                    type: "post",
                    url: "{{ route('api.v1.position.clean.line.by.id') }}",
                    data: {
                        'id': id
                    },
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
                        var img_url = ''
                        if (response.image_location != null) {
                            img_url = "{{ asset('uploads/images/content/cleanness') }}/" +
                                response.image_location;
                        }
                        $('#detail-title').text(response.title);
                        $('#detail-location').text(response.location);
                        $('#detail-time').text(response.time);
                        $('#detail-time_start').text(response.time_start);
                        $('#detail-image_location').attr('src', img_url);
                        $('#cleanness_id').val(response.id);
                        $('#cleanness_edit').val(response.id);
                        $('#cleanness_edit').data('title', response.title);
                        $('#cleanness_edit').data('location', response.location);
                        $('#cleanness_edit').data('time', response.time);
                        $('#cleanness_edit').data('time_start', response.time_start);
                        $('#cleanness_edit').data('image_location', img_url);
                        $('#cleanness_edit').data('image_location_name', response
                            .image_location);
                    }
                });
            });

            $(document).on('click', '.btn-edit', function() {
                const id = $('#cleanness_edit').val();
                var title = $(this).data('title');
                var location = $(this).data('location');
                var time = $(this).data('time');
                var time_start = $(this).data('time_start');
                var img_url = $(this).data('image_location');
                var image = $(this).data('image_location_name');
                cleanline_detail_modal.modal('hide')
                cleanline_modal.modal('show')
                $('#title').val(title);
                $('#location').val(location);
                $('#time').val(time);
                $('#time_start').val(time_start);
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
                const id = $('#cleanness_id').val();
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
                            url: "{{ route('api.v1.position.clean.line.delete') }}",
                            data: {
                                'id': id,
                                // 'record_status': 0
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
                                    cleanline_detail_modal.modal('hide')
                                    getPositionCleanLine();
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
        });
    </script>
@stop
