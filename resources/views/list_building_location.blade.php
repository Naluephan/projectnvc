@extends('adminlte::page')

@section('content_header_title')
    การตั้งค่า
@stop
@section('content_header')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">หน้าแรก</a></li>
    <li class="breadcrumb-item active"> การตั้งค่า </li>
@stop
@section('css')
    <style>
        .dataTables_length {
            position: absolute;
        }

        :root {
            --color1: #77c6c5;
            --color2: #fa9583;
            --color3: #1b8f8d;
            --color4: #edf5f5;
        }

        div {
            color: var(--color3);
        }

        .position {
            position: absolute;
            top: 50%;
            right: 100px;
            /* ปรับตำแหน่งตามที่ต้องการ */
            transform: translateY(-50%);
            z-index: 1;
            /* ให้ข้อความอยู่ด้านบนของ input */
        }

        .btn-success {
            background-color: #77c6c5;
            border: #77c6c5;
        }

        .btn-danger {
            background-color: #fa9583;
            border: #fa9583;
        }

        .btn-outline-success {
            border-color: var(--color3);
            color: var(--color3);
        }

        .position {
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-20)
        }

        .btn-primary {
            background-color: #fa9583;
            border: #fa9583;
            border-radius: 20px
        }

        .btn-secondary {
            background-color: white;
            color: #1b8f8d;
            border: white;

        }

        .modal-header {
            background-color: #048482;
            color: white
        }

        #category_name {
            color: #108987
        }

        #category_code {
            color: #108987
        }

        .btn-edit {
            width: 150%;
            /* กำหนดความกว้าง */
            height: 75%;
            /* กำหนดความสูง */
        }

        .btn-delete {
            width: 150%;
            /* กำหนดความกว้าง */
            height: 75%;
            /* กำหนดความสูง */
        }

        .list_building_location {
            display: initial;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            width: 100vw;

        }

        #content {
            margin-left: 25px;
            margin-right: 25px;
        }

        #border {
            display: 100%;
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

        #icon {
            color: var(--color2);
            margin-right: 5px
        }
        .text-color {
        color: var(--color3);
    }
        svg {
            color: var(--color2);
        }

        .modal-radius {
            border-radius: 1.5rem;
            border-color: none;
        }

        .modal-header-radius {
            border-radius: 1.5rem 1.5rem 0rem 0rem;
        }

        .modal-footer {
            display: flex;
            justify-content: center;
        }

        .import-file {
            height: 150px;
            width: 150px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border: 1px dashed #616161;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .import-file:hover {
            background-color: #f3f4f6;
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
        .import-file svg {
            width: 50px;
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
@stop
{{-- end header --}}
@section('content')
    <div class="row">
        <div class="col-7 border border-3" id="border">
            <h6>คลังเก็บอุปกรณ์ และทรัพย์สินบริษัท</h6>
            <div class="row">
                <div class="col-4 ">
                    <div class="card border border-2 p-0 rounded-4">
                        <div class="row">
                            <div class="col-5">
                                <div style="width: 100%; ">
                                    <img src="https://media.discordapp.net/attachments/1068009652882772048/1214529412264103936/IMG_1986.jpg?ex=65f971a8&is=65e6fca8&hm=e0ea36feaf9aeeff5707233e3e5b7e6a3d61046097461e9d777cb08641e133f2&=&format=webp&width=328&height=437"
                                        class="border border-0 rounded-start-4 " alt="..."
                                        style="position: absolute; width: 100%; height: 100%; object-fit: cover; ">
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
                                    <img src="https://media.discordapp.net/attachments/1068009652882772048/1214529412264103936/IMG_1986.jpg?ex=65f971a8&is=65e6fca8&hm=e0ea36feaf9aeeff5707233e3e5b7e6a3d61046097461e9d777cb08641e133f2&=&format=webp&width=328&height=437"
                                        class="border border-0 rounded-start-4 " alt="..."
                                        style="position: absolute; width: 100%; height: 100%; object-fit: cover; ">
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
                                    <img src="https://media.discordapp.net/attachments/1068009652882772048/1214529412264103936/IMG_1986.jpg?ex=65f971a8&is=65e6fca8&hm=e0ea36feaf9aeeff5707233e3e5b7e6a3d61046097461e9d777cb08641e133f2&=&format=webp&width=328&height=437"
                                        class="border border-0 rounded-start-4 " alt="..."
                                        style="position: absolute; width: 100%; height: 100%; object-fit: cover; ">
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
            </div>

        </div>

        <div class="col-5">
            <div class="row" id="content">
                <div class="card border shadow-sm" style="border-radius: 15px; background-color: var(--color4)">
                    <div class="card-body">
                        <div class="modalshow">
                            <h5><i class="fa-solid fa-building"></i> อาคารและสถานที่</h5>
                            <h6>กำหนดอาคารและสถานที่</h6>
                            <div class="row list_building_location" id="list_building_location">

                            </div>
                        </div>

                        <button type="button" class="btn btn-add btn-outline-success rounded-pill" style="width: 100%; "><i
                                class="fa-solid fa-plus fa-xs"></i> เพิ่มข้อมูล</button>
                        <button type="button" class="btn btn-primary save-buildinglocation rounded-pill"
                            style="margin-top: 200px; width:100%">บันทึก</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="modal fade" id="buildinglocationModal" tabindex="-1" aria-labelledby="buildinglocationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content modal-radius">
                <div class="modal-header modal-header-radius">
                    <h5 class="modal-title" id="buildinglocationModalLabel">อาคารหรือสถานที่</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="buildinglocationForm">
                        <input type="hidden" name="id" id="id">
                        <div class="container">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="location_name" class="col-form-label"><i class="fa-solid fa-hotel"
                                                id="icon"></i>ชื่ออาคาร หรือสถานที่</label>
                                        <input type="text" class="form-control" id="location_name" name="location_name"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="location_img" class="col-form-label"><i class="fa-solid fa-image"
                                               ></i>รูปภาพหรือสัญลีกษณ์อาคาร/สถานที่</label>
                                        <div>
                                            <label for="import-file" class="import-file">
                                                <input type="file" class="form-control rounded-pill" id="location_img" name="location_img">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-upload" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="#707070" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                                                    <path d="M7 9l5 -5l5 5" />
                                                    <path d="M12 4l0 12" />
                                                </svg>
                                                <div>
                                                    <p>อัพโหลดรูปภาพ</p>
                                                    <p>ไฟล์ JPG, PNG, PDF</p>
                                                </div>
                                            </label>
                                            <input type="file" style="display: none;" id="import-file" />
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="total_floors" class="col-form-label"><i
                                                        class="fa-sharp fa-solid fa-stairs"
                                                        id="icon"></i>จำนวนชั้นทั้งหมด</label>
                                                <input type="text" class="form-control" id="total_floors"
                                                    name="total_floors" required>
                                            </div>
                                            <div class="col-6">
                                                <label for="total_rooms" class="col-form-label"><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-armchair" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="#fa9583" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M5 11a2 2 0 0 1 2 2v2h10v-2a2 2 0 1 1 4 0v4a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-4a2 2 0 0 1 2 -2z" />
                                                        <path d="M5 11v-5a3 3 0 0 1 3 -3h8a3 3 0 0 1 3 3v5" />
                                                        <path d="M6 19v2" />
                                                        <path d="M18 19v2" />
                                                    </svg>จำนวนห้องทั้งหมด</label>
                                                <input type="number" class="form-control" id="total_rooms"
                                                    name="total_rooms" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="place_name" class="col-form-label"><i class="fa-solid fa-hotel"
                                                id="icon"></i>กำหนดสถานที่</label>
                                        <input type="text" class="form-control" id="place_name" name="place_name"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="floor" class="col-form-label"><i
                                                        class="fa-sharp fa-solid fa-stairs"
                                                        id="icon"></i>ชั้น</label>
                                                <input type="text" class="form-control" id="floor" name="floor"
                                                    required>
                                            </div>
                                            <div class="col-6">
                                                <label for="room" class="col-form-label"><i class="fa-solid fa-hotel"
                                                        id="icon"></i>ชื่อห้อง/สถานที่</label>
                                                <input type="text" class="form-control" id="room" name="room"
                                                    required>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-addform btn-outline-success rounded-pill mt-3"
                                            style="width: 100%; "><i
                                                class="fa-solid fa-plus fa-xs"></i>เพิ่มรายการ</button>
                                    </div>
                                </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                <button type="button" class="btn btn-primary save-buildinglocation">ยืนยัน</button>
            </div>
        </div>
    </div>
</div>
    <div class="modal fade" id="buildinglocationDetailModal" tabindex="-1" aria-labelledby="buildinglocationDetailModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content modal-radius">
                <div class="modal-header background2 modal-header-radius">
                    <h5 class="modal-title" id="buildinglocationDetailModalLabel"><i class="fa-solid fa-file-circle-plus"></i> ข้อมูลอาคารและสถานที่</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body detail_building_location" id="detail_building_location">
                       
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn text-color" data-bs-dismiss="modal">ยกเลิก</button>
                    <button type="button" class="btn btn-success rounded-pill save-buildinglocation">ยืนยัน</button>
                </div>
            </div>
        </div>
    </div>


@stop


@section('js')
    <script>
        $(() => {
            getBuildingLocation();

            function getBuildingLocation() {
                let id = "{{ Auth::user()->id }}";
                const listbuildlocation = document.getElementById('list_building_location');
                listbuildlocation.innerHTML = '';
                $.ajax({
                    type: 'post',
                    url: "{{ route('api.v1.building.location.list') }}",
                    data: {
                        'id': id,
                    },
                    dataType: "json",
                    success: function(response) {
                        var supplyContainer = $(".list_building_location");
                        response.forEach(function(locationInfo) {
                            var LocationId = locationInfo.id;
                            var LocationName = locationInfo.location_name;
                            var LocationImg = locationInfo.location_img;
                            var LocationFloors = locationInfo.total_floors;
                            var LocationRooms = locationInfo.total_rooms;
                            var Item = `
                            <div class="card border border-2 p-0 rounded-4 detail" data-id="${LocationId}">
                                <div class="row">
                                    <div class="col-2">
                                        <div style="width: 100%; ">
                                            <img src="https://media.discordapp.net/attachments/1068009652882772048/1213840762593345617/IMG_2033.jpg?ex=65f6f04d&is=65e47b4d&hm=3c9f20a33d307983ff42ac8da496ff3b4fbd997f08807cec20aed5bd1111af0e&=&format=webp&width=496&height=662" class="border border-0 rounded-start-4" alt="..." style="position: absolute; width: 100%; height: 100%; object-fit: cover; ">
                                        </div>
                                    </div>
                                    <div class="col-8 ">
                                        <h5 class="ml-2 ">${LocationName}</h5>
                                        <p class="ml-2">${LocationFloors} ชั้น</p>
                                        <p class="ml-2">${LocationRooms} ห้อง</p>
                                    </div>
                                </div>
                            </div>
                            `;
                            supplyContainer.append(Item);
                        });
                    },
                });
            }


            var buildinglocation_modal = $("#buildinglocationModal");
            $(document).on('click', '.btn-add', function() {
                buildinglocation_modal.modal('show')
            })

            $(document).on('click', '.save-buildinglocation', function() {
                let id = $("#id").val();
                let buildinglocationForm = $("#buildinglocationForm");
                if (buildinglocationForm.valid()) {
                    const formData = new FormData($("#buildinglocationForm")[0]);
                    formData.append('location_img_name', $('#location_img')[0].files[0]);
                    formData.append('location_img_value', $('#location_img').val());
                    if (id.length == 0) {

                        $.ajax({
                            type: 'post',
                            url: "{{ route('api.v1.building.location.create') }}",
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
                                    buildinglocation_modal.modal('hide');
                                    getBuildingLocation();
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
                            url: "{{ route('api.v1.building.location.update') }}",
                            data: data,
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
                                    buildinglocation_modal.modal('hide');
                                    getBuildingLocation();

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
            var buildinglocation_detail_modal = $("#buildinglocationDetailModal");
            $(document).on('click', '.detail', function() {
                const list = document.getElementById('detail_building_location');
                list.innerHTML = '';
                buildinglocation_detail_modal.modal('show')
                let id = $(this).data('id');
                $.ajax({
                    type: 'post',
                    url: "{{ route('api.v1.building.location.by.id') }}",
                    data: {
                        'id': id
                    },
                    dataType: "json",
                    success: function(response) {
                       
                        var buildingLocationContainer = $(".detail_building_location");
                        var id  = response.id;
                        var title = response.location_name;
                        var floor = response.total_floors;
                        var room = response.total_rooms;
                        var Item = `
                            <div class="row">
                                <div class="col-6">
                                <h6 class="title">${title}</h6>
                                </div>
                                <div class="col-6 text-right">
                                    <button class="btn btn-sm" data-id="${id}" data-ac="edit" data-bs-toggle="modal" data-bs-target="#buildinglocationModal"><em class="fas fa-edit"></em></button>
                                    <button class="btn btn-sm" data-id="${id}"><em class="fas fa-trash-alt"></em></button>
                                </div>
                            </div>
                                
                                <div class="row">
                                    <div class="col-4">
                                        <p class="location">${floor}</p>
                                <p class="time">การตรวจตราทุก ${room}</p>
                                    </div>
                                </div>
                        `;
                        buildingLocationContainer.append(Item);
                    }
                });
            })
//             $(document).ready(function() {
//     $(".btn-addform").click(function() {
//         var newForm = $("#form").clone();
//         newForm.find('input').val(''); // Clear input values
//         $("#form").append(newForm);
//         $(".btn-close").click(function() {
//         $("#form").empty(); // Remove all dynamic forms
//     });
//     });
// });

            $(document).on('click', '.btn-edit', function() {
                let id = $(this).data('id');
                $.ajax({
                    type: 'post',
                    url: "{{ route('api.v1.building.location.by.id') }}",
                    data: {
                        'id': id
                    },
                    dataType: "json",
                    success: function(response) {
                        setbuildinglocationFormData(response);
                        $("#id").val(response.id);
                        buildinglocation_modal.modal('show')
                    }
                });
            })

            function setbuildinglocationFormData(data) {
                $("#buildinglocation_name").val(data.buildinglocation_name);
                $("#buildinglocation_code").val(data.buildinglocation_code);
            }
            buildinglocation_modal.on('show.bs.modal', function(event) {
                let btn = $(event.relatedTarget);
                // let title = btn.data('ac') === 'edit' ? "แก้ไขข้อมูล" : "เพิ่มข้อมูล";
                // console.log(btn.data('ac'))
                // let obj = $(this);
                // obj.find('.modal-title').text(title)
            })
            buildinglocation_modal.on('hide.bs.modal', function() {
                let obj = $(this);
                obj.find('#buildinglocation_name').val("");
                obj.find('#buildinglocation_code').val("");
            })


            $(document).on('click', '.btn-delete', function() {
                let obj = $(this);
                let id = obj.data('id');
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
                            url: "{{ route('api.v1.building.location.delete') }}",
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
                                    getBuildingLocation();

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
