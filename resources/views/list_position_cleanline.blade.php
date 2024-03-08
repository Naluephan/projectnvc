@extends("adminlte::page")

@section('content_header_title')
การตั้งค่า
@stop
@section('content_header')
<li class="breadcrumb-item"><a href="{{ url('/home') }}">หน้าแรก</a></li>
<li class="breadcrumb-item active"> การตั้งค่า </li>
@stop
@section('css')
<style>
    :root {
        --color1: #77c6c5;
        --color2: #fa9583;
        --color3: #1b8f8d;
        --color4: #edf5f5;
    }

    div {
        color: var(--color3);
    }

    .btn-edit {
        background-color: var(--color1);
        border-color: var(--color1);
        color: white;
    }

    .btn-delete {
        background-color: var(--color2);
        border-color: var(--color2);
        color: white;
    }

    .btn-border {
        border-color: var(--color1);
        color: var(--color1);
    }

    .background {
        background-color: var(--color4);
    }

    .background2 {
        background-color: var(--color3);
        color: white
    }

    .text-color {
        color: var(--color3);
    }

    .modal-radius {
        border-radius: 1.5rem;
        border-color: none;
    }

    .modal-header-radius {
        border-radius: 1.5rem 1.5rem 0rem 0rem;
    }

    .dataTables_length {
        position: absolute;
    }

    .position {
        position: absolute;
        top: 50%;
        right: 20px;
        /* ปรับตำแหน่งตามที่ต้องการ */
        transform: translateY(-50%);
        z-index: 1;
        /* ให้ข้อความอยู่ด้านบนของ input */
    }
</style>
@stop
{{-- end header --}}
@section('content')
<div class="row">
    <div class="col-7 border border-3">
        <h6>คลังเก็บอุปกรณ์ และทรัพย์สินบริษัท</h6>
        <div class="row">
            <div class="col-4 ">
                <div class="card border border-2 p-0 rounded-4">
                    <div class="row">
                        <div class="col-5">
                            <div style="width: 100%; ">
                                <img src="https://media.discordapp.net/attachments/1068009652882772048/1213840762593345617/IMG_2033.jpg?ex=65f6f04d&is=65e47b4d&hm=3c9f20a33d307983ff42ac8da496ff3b4fbd997f08807cec20aed5bd1111af0e&=&format=webp&width=496&height=662" class="border border-0 rounded-start-4 " alt="..." style="position: absolute; width: 100%; height: 100%; object-fit: cover; ">
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="card-body">
                                <p class="card-text asset">หมวดหมู่ทรัพย์สิน</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 ">
                <div class="card border border-2 p-0 rounded-4">
                    <div class="row">
                        <div class="col-5">
                            <div style="width: 100%; ">
                                <img src="https://media.discordapp.net/attachments/1068009652882772048/1214529412264103936/IMG_1986.jpg?ex=65f971a8&is=65e6fca8&hm=e0ea36feaf9aeeff5707233e3e5b7e6a3d61046097461e9d777cb08641e133f2&=&format=webp&width=328&height=437" class="border border-0 rounded-start-4 " alt="..." style="position: absolute; width: 100%; height: 100%; object-fit: cover; ">
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="card-body">
                                <p class="card-text">หมวดหมู่อุปกรณ์</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 ">
                <div class="card border border-2 p-0 rounded-4">
                    <div class="row">
                        <div class="col-5">
                            <div style="width: 100%; ">
                                <img src="https://media.discordapp.net/attachments/1068009652882772048/1214529412264103936/IMG_1986.jpg?ex=65f971a8&is=65e6fca8&hm=e0ea36feaf9aeeff5707233e3e5b7e6a3d61046097461e9d777cb08641e133f2&=&format=webp&width=328&height=437" class="border border-0 rounded-start-4 " alt="..." style="position: absolute; width: 100%; height: 100%; object-fit: cover; ">
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="card-body">
                                <p class="card-text">หมวดหมู่อุปกรณ์</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 ">
                <div class="card border border-2 p-0 rounded-4">
                    <div class="row">
                        <div class="col-5">
                            <div style="width: 100%; ">
                                <img src="https://media.discordapp.net/attachments/1068009652882772048/1214529412264103936/IMG_1986.jpg?ex=65f971a8&is=65e6fca8&hm=e0ea36feaf9aeeff5707233e3e5b7e6a3d61046097461e9d777cb08641e133f2&=&format=webp&width=328&height=437" class="border border-0 rounded-start-4 " alt="..." style="position: absolute; width: 100%; height: 100%; object-fit: cover; ">
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="card-body">
                                <p class="card-text">หมวดหมู่ข่าวสาร</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="col-5">
        <div class="modalshow">
            <h4><i class="fa-solid fa-bars"></i> รักษาความสะอาด</h4>
            <h6>กำหนดจุดแสกนเพื่อรักษาความสะอาด</h6>

            <div class="row list_position" id="list_position">
                <div class="card border border-2 p-0 rounded-4">
                    <div class="row">
                        <div class="col-2">
                            <div style="width: 100%; ">
                                <img src="https://media.discordapp.net/attachments/1068009652882772048/1213840762593345617/IMG_2033.jpg?ex=65f6f04d&is=65e47b4d&hm=3c9f20a33d307983ff42ac8da496ff3b4fbd997f08807cec20aed5bd1111af0e&=&format=webp&width=496&height=662" class="border border-0 " alt="..." style="position: absolute; width: 100%; height: 100%; object-fit: cover; ">
                            </div>
                        </div>
                        <div class="col-8 ">
                            <h6 class="ml-2">รักษาความสะอาดจุดที่ 1</h6>
                            <p class="ml-2">ห้องน้ำชั้นที่ 1</p>
                            <p class="ml-2">ทำความสะอาดทุก 3 ชั่วโมง เริ่ม 08.00 น.</p>
                        </div>
                        <div class="col-2">
                            <div style="width: 100%; ">
                                <img src="https://media.discordapp.net/attachments/1068009652882772048/1213840762593345617/IMG_2033.jpg?ex=65f6f04d&is=65e47b4d&hm=3c9f20a33d307983ff42ac8da496ff3b4fbd997f08807cec20aed5bd1111af0e&=&format=webp&width=496&height=662" class="border border-0 " alt="..." style="position: absolute; width: 100%; height: 100%; object-fit: cover; ">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border border-2 p-0 rounded-4">
                    <div class="row">
                        <div class="col-2">
                            <div style="width: 100%; ">
                                <img src="https://media.discordapp.net/attachments/1068009652882772048/1213840762593345617/IMG_2033.jpg?ex=65f6f04d&is=65e47b4d&hm=3c9f20a33d307983ff42ac8da496ff3b4fbd997f08807cec20aed5bd1111af0e&=&format=webp&width=496&height=662" class="border border-0 " alt="..." style="position: absolute; width: 100%; height: 100%; object-fit: cover; ">
                            </div>
                        </div>
                        <div class="col-8 ">
                            <h6 class="ml-2">รักษาความสะอาดจุดที่ 1</h6>
                            <p class="ml-2">ห้องน้ำชั้นที่ 1</p>
                            <p class="ml-2">ทำความสะอาดทุก 3 ชั่วโมง เริ่ม 08.00 น.</p>
                        </div>
                        <div class="col-2">
                            <div style="width: 100%; ">
                                <img src="https://media.discordapp.net/attachments/1068009652882772048/1213840762593345617/IMG_2033.jpg?ex=65f6f04d&is=65e47b4d&hm=3c9f20a33d307983ff42ac8da496ff3b4fbd997f08807cec20aed5bd1111af0e&=&format=webp&width=496&height=662" class="border border-0 " alt="..." style="position: absolute; width: 100%; height: 100%; object-fit: cover; ">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <button type="button" class="btn btn-outline-success rounded-pill btn-add" style="width: 100%; "><i class="fa-solid fa-plus"></i> เพิ่มข้อมูล</button>
    </div>
</div>

<div class="modal fade" id="cleanlineModal" tabindex="-1" aria-labelledby="cleanlineModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content modal-radius">
            <div class="modal-header background2 modal-header-radius">
                <h5 class="modal-title" id="cleanlineModalLabel"><i class="fa-solid fa-file-circle-plus"></i> เพิ่มข่าวสาร</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="cleanlineForm">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="title" class="col-form-label">หัวข้อ :</label>
                        <input type="text" class="form-control rounded-pill" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="location" class="col-form-label">สถานที่</label>
                        <input type="text" class="form-control rounded-pill" id="location" name="location" required>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-6">
                                <label for="time" class="col-form-label">การตรวจตราทุกๆ (ชม.)</label>
                                <input type="text" class="form-control rounded-pill" id="time" name="time" required>
                            </div>
                            <div class="col-6">
                                <label for="time_start" class="col-form-label">เวลาเริ่มต้น</label>
                                <input type="text" class="form-control rounded-pill" id="time_start" name="time_start" required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="image_location" class="col-form-label">รูปภาพสถานที่</label>
                        <input type="file" class="form-control rounded-pill" id="image_location" name="image_location">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn text-color" data-bs-dismiss="modal">ยกเลิก</button>
                <button type="button" class="btn btn-success rounded-pill save-position">ยืนยัน</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="cleanlineDetailModal" tabindex="-1" aria-labelledby="cleanlineDetailModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content modal-radius">
            <div class="modal-header background2 modal-header-radius">
                <h5 class="modal-title" id="cleanlineDetailModalLabel"><i class="fa-solid fa-file-circle-plus"></i> ข้อมูลรักษาความสะอาด</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body detail_cleanline" id="detail_cleanline">
                <!-- <div class="row">
                    <div class="col-6">
                    <h6 class="title">รักษาความปลอดภัยจุดที่ 2</h6>
                    </div>
                    <div class="col-6 text-right">
                        <button class="btn btn-sm rounded-pill  btn-success btn-edit" data-id="" data-ac="edit" data-bs-toggle="modal" data-bs-target="#cleanlineModal"><em class="fas fa-edit"></em></button>
                        <button class="btn btn-sm rounded-pill btn-danger btn-delete" data-id=""><em class="fas fa-trash-alt"></em></button>
                    </div>
                </div>
                <p class="location">ประตูทางเข้าบริหารโรงอาหาร</p>
                <p class="time">การตรวจตราทุก 3 ชั่วโมง เริ่ม 08.00 น.</p>

                <p><i class="fa-solid fa-image"></i> รูปภาพสถานที่</p>   
                <div class="row">
                    <div class="col-4">
                        
                    </div>
                    <div class="col-4 ">
                        <div class="div rounded-3" style="width: 150px; height: 150px; display: flex; justify-content: center; align-items: center; overflow: hidden; ">
                            <img src="https://media.discordapp.net/attachments/1068009652882772048/1213840762593345617/IMG_2033.jpg?ex=65f6f04d&is=65e47b4d&hm=3c9f20a33d307983ff42ac8da496ff3b4fbd997f08807cec20aed5bd1111af0e&=&format=webp&width=496&height=662" class="border border-0" alt="..." style="object-fit: cover; width: 100%; height: 100%;">
                        </div>
                    </div>
                    <div class="col-4">
                        
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-6">
                    <p class="mt-2"><i class="fa-solid fa-qrcode"></i> QR Code</p>      
                    </div>
                    <div class="col-6">
                    <p class="mt-2 text-right"><i class="fa-solid fa-download"></i> ดาวน์โหลด</p>      
                     
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        
                    </div>
                    <div class="col-4">
                        <div class="div" style="width: 150px; height: 150px; display: flex; justify-content: center; align-items: center; overflow: hidden;">
                            <img src="https://media.discordapp.net/attachments/1068009652882772048/1213840762593345617/IMG_2033.jpg?ex=65f6f04d&is=65e47b4d&hm=3c9f20a33d307983ff42ac8da496ff3b4fbd997f08807cec20aed5bd1111af0e&=&format=webp&width=496&height=662" class="border border-0" alt="..." style="object-fit: cover; width: 100%; height: 100%;">
                        </div>
                    </div>
                    <div class="col-4">
                        
                    </div>
                </div> -->
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn text-color" data-bs-dismiss="modal">ยกเลิก</button>
                <button type="button" class="btn btn-success rounded-pill save-position">ยืนยัน</button>
            </div>
        </div>
    </div>
</div>

@stop


@section('js')
<script>
    $(() => {
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
                        var id  = positionInfo.id;
                        var title = positionInfo.title;
                        var location = positionInfo.location;
                        var time = positionInfo.time;
                        var time_start = positionInfo.time_start;
                        var image_location = positionInfo.image_location;
                        var qr_code = positionInfo.qr_code;
                        var Item = `
                        <div class="card border border-2 p-0 rounded-4 detail" data-id="${id}">
                                <div class="row">
                                    <div class="col-2">
                                        <div style="width: 100%; ">
                                            <img src="https://media.discordapp.net/attachments/1068009652882772048/1213840762593345617/IMG_2033.jpg?ex=65f6f04d&is=65e47b4d&hm=3c9f20a33d307983ff42ac8da496ff3b4fbd997f08807cec20aed5bd1111af0e&=&format=webp&width=496&height=662" class="border border-0 rounded-start-4" alt="..." style="position: absolute; width: 100%; height: 100%; object-fit: cover; ">
                                        </div>
                                    </div>
                                    <div class="col-8 ">
                                        <h6 class="ml-2 ">${title}</h6>
                                        <p class="ml-2">${location}</p>
                                        <p class="ml-2">ทำความสะอาดทุก ${time} ชั่วโมง เริ่ม ${time_start} น.</p>
                                    </div>
                                    <div class="col-2">
                                        
                                        <div class="div" style="position: absolute; width: 100%; height: 100%; object-fit: cover; ">
                                            {!! QrCode::size(100)->generate('5555') !!}
                                        </div>
                                        
                                    </div>
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
            })

            $(document).on('click', '.save-position', function() {
                let id = $("#id").val();
                let cleanlineForm = $("#cleanlineForm");
                if (cleanlineForm.valid()) {
                    const formData = new FormData($("#cleanlineForm")[0]);
                    formData.append('image_location_name', $('#image_location')[0].files[0]);
                    formData.append('image_location_value', $('#image_location').val());
                    if (id.length == 0) {
                        $.ajax({
                            type: 'post',
                            url: "{{ route('api.v1.position.clean.line.create') }}",
                            data: formData,
                            dataType: "json",
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                if (response.status == 'Success') {
                                    Swal.fire({
                                        title: 'ดำเนินการเรียบร้อยแล้ว',
                                        icon: 'success',
                                        showConfirmButton: false,
                                        timer: 2000,
                                        toast: true
                                    });
                                    cleanline_modal.modal('hide');
                                    getPositionCleanLine();
                                } else {
                                    Swal.fire({
                                        title: 'เกิดข้อผิดพลาด',
                                        icon: 'warning',
                                        showConfirmButton: false,
                                        timer: 2000,
                                        toast: true
                                    })
                                }
                            }
                        });
                    } else {
                        $.ajax({
                            type: 'post',
                            url: "{{ route('api.v1.position.clean.line.update') }}",
                            data: formData,
                            dataType: "json",
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                if (response.status == 'Success') {
                                    Swal.fire({
                                        title: 'ดำเนินการเรียบร้อยแล้ว',
                                        icon: 'success',
                                        showConfirmButton: false,
                                        timer: 2000,
                                        toast: true
                                    });
                                    cleanline_modal.modal('hide');
                                    getPositionCleanLine();
                                } else {
                                    Swal.fire({
                                        title: 'เกิดข้อผิดพลาด',
                                        icon: 'warning',
                                        showConfirmButton: false,
                                        timer: 2000,
                                        toast: true
                                    })
                                }
                            }
                        });
                    }
                } else {
                    Swal.fire({
                        title: 'กรุณาตรวจสอบข้อมูล',
                        icon: 'warning',
                        showConfirmButton: false,
                        timer: 2000,
                        toast: true
                    });
                }
            })

            var cleanline_detail_modal = $("#cleanlineDetailModal");
            $(document).on('click', '.detail', function() {
                const list = document.getElementById('detail_cleanline');
                list.innerHTML = '';
                cleanline_detail_modal.modal('show')
                let id = $(this).data('id');
                $.ajax({
                    type: 'post',
                    url: "{{ route('api.v1.position.clean.line.by.id') }}",
                    data: {
                        'id': id
                    },
                    dataType: "json",
                    success: function(response) {
                       
                        var detailContainer = $(".detail_cleanline");
                        var id  = response.id;
                        var title = response.title;
                        var location = response.location;
                        var time = response.time;
                        var time_start = response.time_start;
                        var image_location = response.image_location;
                        var qr_code = response.qr_code;
                        var Item = `
                            <div class="row">
                                <div class="col-6">
                                <h6 class="title">${title}</h6>
                                </div>
                                <div class="col-6 text-right">
                                    <button class="btn btn-sm rounded-pill  btn-success btn-edit" data-id="${id}" data-ac="edit" data-bs-toggle="modal" data-bs-target="#cleanlineModal"><em class="fas fa-edit"></em></button>
                                    <button class="btn btn-sm rounded-pill btn-danger btn-delete" data-id="${id}"><em class="fas fa-trash-alt"></em></button>
                                </div>
                            </div>
                                <p class="location">${location}</p>
                                <p class="time">การตรวจตราทุก ${time} ชั่วโมง เริ่ม ${time_start} น.</p>

                                <p><i class="fa-solid fa-image"></i> รูปภาพสถานที่</p>   
                                <div class="row">
                                    <div class="col-4">
                                        
                                    </div>
                                    <div class="col-4 ">
                                        <div class="div rounded-3" style="width: 150px; height: 150px; display: flex; justify-content: center; align-items: center; overflow: hidden; ">
                                            <img src="https://media.discordapp.net/attachments/1068009652882772048/1213840762593345617/IMG_2033.jpg?ex=65f6f04d&is=65e47b4d&hm=3c9f20a33d307983ff42ac8da496ff3b4fbd997f08807cec20aed5bd1111af0e&=&format=webp&width=496&height=662" class="border border-0" alt="..." style="object-fit: cover; width: 100%; height: 100%;">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-6">
                                    <p class="mt-2"><i class="fa-solid fa-qrcode"></i> QR Code</p>      
                                    </div>
                                    <div class="col-6">
                                    <p class="mt-2 text-right"><i class="fa-solid fa-download"></i> ดาวน์โหลด</p>      
                                    
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        
                                    </div>
                                    <div class="col-4">
                                        <div class="div" style="width: 150px; height: 150px; display: flex; justify-content: center; align-items: center; overflow: hidden;">
                                            {!! QrCode::size(150)->generate('5555') !!}
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        
                                    </div>
                                </div>
                        `;
                        detailContainer.append(Item);
                    }
                });
            })

            $(document).on('click', '.btn-edit', function() {
                let id = $(this).data('id');
                // console.log(id);
                $.ajax({
                    type: 'post',
                    url: "{{ route('api.v1.position.clean.line.by.id') }}",
                    data: {
                        'id': id
                    },
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
                        cleanline_modal.modal('show')
                        setCleanLineFormData(response);
                        $("#id").val(response.id);
                    }
                });
            })

            function setCleanLineFormData(data) {
                $("#title").val(data.title);
                $("#location").val(data.location);
                $("#time").val(data.time);
                $("#time_start").val(data.time_start);
                $("#image_location").val(data.image_location);
            }

            cleanline_modal.on('show.bs.modal', function(event) {
                let btn = $(event.relatedTarget);
                let title = btn.data('ac') === 'edit' ? '<em class="fas fa-edit"></em> แก้ไขรายการ' : '<i class="fas fa-file-circle-plus"></i> สร้างรายการใหม่';
                let obj = $(this);
                obj.find('.modal-title').html(title);
            });

            cleanline_modal.on('hide.bs.modal', function() {
            let obj = $(this);
            obj.find('#id').val("");
            obj.find('#title').val("");
            obj.find('#location').val("");
            obj.find('#time').val("");
            obj.find('#time_start').val("");
            })

            $(document).on('click', '.btn-delete', function() {
                let id = $(this).data('id');
                Swal.fire({
                    title: 'ยืนยัน!! ลบข้อมูล',
                    text: "ต้องการดำเนินการใช่หรือไม่!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#e83e3e',
                    cancelButtonColor: '#bb93ab',
                    confirmButtonText: 'ยืนยัน',
                    cancelButtonText: 'ปิด'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'post',
                            url: "{{ route('api.v1.position.clean.line.delete') }}",
                            data: {
                                'id': id
                            },
                            dataType: "json",
                            success: function(response) {
                                if (response.status == 'Success') {
                                    Swal.fire({
                                        title: 'ดำเนินการเรียบร้อยแล้ว',
                                        icon: 'success',
                                        showConfirmButton: false,
                                        timer: 2000,
                                        toast: true
                                    });
                                    cleanline_detail_modal.modal('hide');
                                    getPositionCleanLine();
                                } else {
                                    Swal.fire({
                                        title: 'เกิดข้อผิดพลาด',
                                        icon: 'warning',
                                        showConfirmButton: false,
                                        timer: 2000,
                                        toast: true
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