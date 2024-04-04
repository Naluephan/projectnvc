@extends('profile_menu')
@section('side-card-profile')

    <style>
        .img {
            display: grid;
            place-items: center;
        }

        .text-color {
            color: #048482 !important;
        }

        .btn-reset {
            color: #f99482 !important;
        }

        .icon-color {
            color: #f99482;
        }

        .toggle-radio {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        .content-edit {
            display: none;
        }

        .toggle-radio {
            width: 38px;
            height: 38px;
            cursor: pointer;
        }

        .herder-icons .btn-list {
            color: #ffff;
            background-color: #FA9583;
            border-color: #FA9583;
            width: 38px;
            height: 38px;
        }

        .herder-icons .btn-edit {
            color: #b9b9b9;
            background-color: #ebebeb;
            border-color: #ebebeb;
            width: 38px;
            height: 38px;
        }
    </style>

    <div class="herder-icons d-flex align-items-center justify-content-end">
        <div class="list">
            <input type="radio" id="list-toggle" name="toggle-option" checked data-toggle="toggle" data-width="100"
                class="toggle-radio">
            <label for="list-toggle" class="btn btn-sm rounded-pill btn-list active"><i
                    class="fas fa-car text-md pt-1"></i></label>
        </div>
        <div class="edit ml-2">
            <input type="radio" id="edit-toggle" name="toggle-option" data-toggle="toggle" data-width="100"
                class="toggle-radio">
            <label for="edit-toggle" class="btn btn-sm rounded-pill btn-edit"><i
                    class="fa-solid fa-car-burst text-md pt-1"></i></label>
        </div>
    </div>

    <div class="card rounded-4 mt-2 bg-hr-card content-show">
        <div class="card-header border-0">
            <h6 class="text-bold"><i class="fas fa-car"></i> ข้อมูลรถส่วนตัว</h6>
        </div>
        <div class="card-body">
            <div class="row mt-n4 list_privatecar" id="list_privatecar">

            </div>
        </div>
    </div>

    <div class="card rounded-4 bg-hr-card mt-2 card-list content-edit">
        <div class="card-header border-0 ">
            <h6 class="text-bold"><i class="fa-solid fa-car-burst"></i> แก้ไข - เพิ่มข้อมูลรถส่วนตัว</h6>
        </div>
        <div class="card-body pt-0 pl-4">
            <form id="privatecarForm">
                <input type="hidden" name="id" id="id">
                <div class="row edit_privatecar" id="edit_privatecar">
                    <div class="col-12 pb-4">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <label for="car_category_id" class="col-form-label text-color py-3"><i
                                        class="fas fa-th-large text-sm icon-color"></i>
                                    ประเภทรถ</label>
                                <select class="form-select input-modal rounded-pill bg-white text-color car_category_id"
                                    name="car_category_id" id="car_category_id">
                                    <option value="1" selected>รถยนต์</option>
                                    <option value="2">รถมอเตอร์ไซด์</option>
                                </select>
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="car_registration" class="col-form-label text-color py-3"><i
                                        class="fa-solid fa-address-card text-sm icon-color"></i>
                                    เลขทะเบียนรถยนต์</label>
                                <input type="text"
                                    class="form-control input-modal rounded-pill text-color car_registration"
                                    id="car_registration" style="height: 45px;" placeholder="กรุณากรอกเลขทะเบียน">
                            </div>
                        </div>

                    </div>

                    <div class="col-12 pb-4">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <label for="car_brand" class="col-form-label text-color py-3"><i
                                        class="fa-solid fa-car-side text-sm icon-color"></i>
                                    ยี่ห้อรถ</label>
                                <input type="text" class="form-control input-modal rounded-pill text-color car_brand"
                                    id="car_brand" style="height: 45px;" placeholder="กรุณากรอกข้อมูล">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="car_color" class="col-form-label text-color py-3"><i
                                        class="fa-solid fa-palette text-sm icon-color"></i>
                                    สี</label>
                                <input type="text" class="form-control input-modal rounded-pill text-color car_color"
                                    id="car_color" style="height: 45px;" placeholder="กรุณากรอกข้อมูล">
                            </div>
                        </div>

                    </div>

                    <div class="col-12 col-lg-6 pb-5">
                        <label for="car_image" class="col-form-label text-color py-3"><i class="fas fa-image hr-icon"></i>
                            รูปถ่าาย</label>
                        <input type="file" class="dropify" id="image_file" name="image_file" placeholder="">
                    </div>
                </div>
            </form>
            <div class="button-footer pt-4">
                <div class="row">
                    <div class="col-6">
                        <button type="button" class="btn card-text text-bold btn-reset">ล้างข้อมูล</button>
                    </div>
                    <div class="col-6">
                        <button
                            class="btn btn-hr-confirm form-control rounded-pill save-privatecar">แจ้งบันทึกข้อมูล</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@section('js')
    <script>
        $(document).ready(function() {
            $('.toggle-radio').change(function() {
                if ($(this).is(':checked')) {
                    // เปลี่ยนสีของ label เมื่อ radio button ถูกเลือก
                    $(this).siblings('label').addClass('active').css({
                        'color': '#ffff',
                        'background-color': '#FA9583',
                        'border-color': '#FA9583'
                    });
                } else {
                    // เปลี่ยนสีของ label เมื่อ radio button ไม่ถูกเลือก
                    $(this).siblings('label').removeClass('active').css({
                        'color': '#b9b9b9',
                        'background-color': '#ebebeb',
                        'border-color': '#ebebeb'
                    });
                }

                // ตรวจสอบว่า radio button ที่เป็นอันอื่นถูกเลือกหรือไม่
                $('.toggle-radio').not(this).prop('checked', false);

                // เปลี่ยนสีของ label ของ radio button ที่ไม่ถูกเลือก
                $('.toggle-radio').not(this).siblings('label').removeClass('active').css({
                    'color': '#b9b9b9',
                    'background-color': '#ebebeb',
                    'border-color': '#ebebeb'
                });
            });

            $('input[name="toggle-option"]').change(function() {
                if ($(this).is(':checked')) {
                    if ($(this).attr('id') === 'list-toggle') {
                        $('.content-show').show();
                        $('.content-edit').hide();
                    } else if ($(this).attr('id') === 'edit-toggle') {
                        $('.content-show').hide();
                        $('.content-edit').show();
                    }
                }
            });
        });

        $(() => {

            $('.dropify').dropify({
                tpl: {
                    message: '<div class="dropify-message"><span class="file-icon"/><p><h6>อัพโหลดรูปภาพ<br/>ไฟล์ JPG, PNG, PDF</h6></p></div>',
                    preview: '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message"></p></div></div></div>',
                },
            });

            getPrivateCar();

            function getPrivateCar() {
                const listPrivatecar = document.getElementById('list_privatecar');
                var emp_id = {{ Auth::user()->id }}
                listPrivatecar.innerHTML = '';
                $.ajax({
                    type: 'post',
                    url: "{{ route('api.v1.privatecar.list') }}",
                    data: {
                        emp_id: emp_id
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        var privatecarContainer = $(".list_privatecar");
                        if (response.errCode == 200) {
                            var img_path =
                                '{{ asset('uploads/images/content/privateCar/notPrivateCar.png') }}';
                            var Item = `
                                <div class="img-notPrivateCar my-5" style="text-align: center;">
                                    <img src="${img_path}" alt=""
                                        style="display: inline-block; height: 100px;">
                                    <p class="text-md text-bold pt-4" style="color: #b4b4b4;">ไม่มีข้อมูลเกี่ยวกับรถส่วนตัว <br>ของพนักงาน
                                    </p>
                                </div>
                                `;
                            privatecarContainer.append(Item);
                        } else {
                            response.listPrivateCar.forEach(function(privatecarInfo) {
                                var car_category = ''
                                if (privatecarInfo.car_category_id == 1) {
                                    car_category = 'รถยนต์'
                                }
                                if (privatecarInfo.car_category_id == 2) {
                                    car_category = 'รถจักรยานยนต์'
                                }
                                var car_category_id = car_category;
                                var car_registration = privatecarInfo.car_registration;
                                var car_brand = privatecarInfo.car_brand;
                                var car_color = privatecarInfo.car_color;
                                var img_path =
                                    '{{ asset('uploads/images/content/privateCar') }}';
                                var car_image = img_path + '/' + privatecarInfo.car_image;
                                var Item = `
                                <div class="row ">
                                    <div class="col-12 col-lg-5 pb-2 img">
                                        <img class="rounded-4" src="${car_image}"
                                            alt="" style="max-width: 100%; max-height: 250px;">
                                    </div>
                                    <div class="col-12 col-lg-7 pt-2 pl-4">
                                        <div class="content">
                                            <p class="py-2 text-md"><i class="fas fa-th-large" style="color: #f99482;"></i>&nbsp; ประเภท :
                                                ${car_category_id}
                                            </p>
                                            <p class="py-2 text-md"><i class="fa-solid fa-address-card" style="color: #f99482;"></i>&nbsp;
                                                ทะเบียน :
                                                ${car_registration}</p>
                                            <p class="py-2 text-md"><i class="fa-solid fa-car-side" style="color: #f99482;"></i>&nbsp; ยี่ห้อ :
                                                ${car_brand}</p>
                                            <p class="py-2 text-md"><i class="fa-solid fa-palette" style="color: #f99482;"></i>&nbsp; สี : ${car_color}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                `;
                                privatecarContainer.append(Item);
                            });
                        }

                    },
                });
            }

            // $(document).on('click', '.btn-reset', function() {
            //     $('#id').val('');
            //     $('#car_registration').val('')
            //     $('#car_brand').val('')
            //     $('#car_color').val('')
            //     $('#image_file').val('');
            //     $(".dropify-clear").trigger("click");
            //     getPrivateCar();
            // });

            $(document).on('click', '.save-privatecar', function() {
                var id = $('#id').val();
                var emp_id = {{ Auth::user()->id }} //ตัวเทส
                // var emp_id = {{ Auth::user()->emp_id }} //ใช้งานจริง
                if ($('#privatecarForm').valid()) {
                    if ($('#car_registration').val() && $('#car_brand').val() && $('#car_color').val()) {
                        var formData = new FormData();
                        formData.append('_token', $('#_token').val());
                        formData.append('id', $('#id').val());
                        formData.append('emp_id', emp_id);
                        formData.append('car_category_id', $('#car_category_id').val());
                        formData.append('car_registration', $('#car_registration').val());
                        formData.append('car_brand', $('#car_brand').val());
                        formData.append('car_color', $('#car_color').val());
                        formData.append('car_image', $('#image_file').prop('files')[0]);
                        Swal.fire({
                            title: 'ยืนยันการบันทึก?',
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
                                    url: "{{ route('api.v1.privatecar.create') }}",
                                    data: formData,
                                    contentType: false,
                                    processData: false,
                                    cache: false,
                                    success: function(response) {
                                        console.log(response);
                                        if (response.status == 'success') {
                                            Swal.fire({
                                                position: 'center-center',
                                                icon: 'success',
                                                title: 'บันทึกสำเร็จ รออนุมัติ',
                                                showConfirmButton: false,
                                                timer: 1500
                                            })
                                            $('#id').val('');
                                            $('#car_registration').val('')
                                            $('#car_brand').val('')
                                            $('#car_color').val('')
                                            $('#image_file').val('');
                                            $(".dropify-clear").trigger("click");
                                            getPrivateCar();
                                            location.reload();
                                        } else {
                                            Swal.fire({
                                                position: 'center-center',
                                                icon: 'error',
                                                title: 'บันทึกไม่สำเร็จ',
                                                showConfirmButton: false,
                                                timer: 1500
                                            })
                                        }
                                    }
                                });
                            }
                        });
                    }
                }
            });

            $.ajax({
                type: 'post',
                url: "{{ route('api.v1.privatecar.list') }}",
                data: {
                    emp_id: {{ Auth::user()->id }}
                },
                dataType: "json",
                success: function(response) {
                    response.listPrivateCar.forEach(function(coinsInfo) {
                        $(".car_category_id").val(coinsInfo.car_category_id);
                        $(".car_registration").val(coinsInfo.car_registration);
                        $(".car_brand").val(coinsInfo.car_brand);
                        $(".car_color").val(coinsInfo.car_color);

                        $('.dropify-filename-inner').text(coinsInfo.car_image);
                        var img_url = '';
                        if (coinsInfo.car_image != null) {
                            img_url =
                                "{{ asset('uploads/images/content/privateCar') }}/" +
                                coinsInfo.car_image;
                        }
                        $("#image_file").attr("data-default-file", img_url);
                        $('.dropify-render').html('<img src="" />');
                        $('.dropify-render img').attr('src', img_url);
                        $('.dropify-preview').css('display', 'block');
                        $('#image_file').attr('src', img_url);
                    });
                },
            });

            $(document).on('click', '.btn-reset', function() {
                var emp_id = {{ Auth::user()->id }}
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
                            url: "{{ route('api.v1.privatecar.delete') }}",
                            data: {
                                'id': emp_id,
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
                                    location.reload();
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
            });

        });
    </script>
@stop
