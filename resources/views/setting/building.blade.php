@extends('setting_menu')
@section('side-card')
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

        .modal-footer {
            justify-content: center;
        }
    </style>
    <div class="card rounded-4 bg-hr-card">
        <div class="card-header border-0">
            <h6 class="text-bold"><i class="fa-solid fa-hotel"></i> อาคารและสถานที่</h6>
        </div>
        <div class="card-body">
            <div class="row list_building_location" id="list_building_location"></div>

            <button type="button" class="form-control btn btn-outline-success rounded-pill mt-3 btn-add"><i
                    class="fa-solid fa-plus"></i>
                เพิ่มข้อมูล</button>
        </div>
        <div class="card-footer bg-transparent">
            <button class="btn btn-hr-confirm form-control rounded-pill btn-save">บันทึก</button>
        </div>
    </div>

    <div class="modal fade" id="buildinglocationModal" tabindex="-1" aria-labelledby="buildinglocationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content modal-radius">
                <div class="modal-header background2 modal-header-radius">
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
                                                style="color:#e6896a; margin-right:10px"></i>ชื่ออาคาร หรือสถานที่</label>
                                        <input type="text" class="form-control" id="location_name" name="location_name"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="location_img" class="col-form-label"><i class="fa-solid fa-image"
                                                style="color:#e6896a; margin-right:10px"></i>รูปภาพหรือสัญลักษณ์อาคาร/สถานที่</label>
                                        <div>
                                            <label for="import-file" class="import-file">
                                                <input type="file" class="form-control rounded-pill" id="location_img"
                                                    name="location_img">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-upload" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#707070"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                                                        style="color:#e6896a; margin-right:10px"></i>จำนวนชั้นทั้งหมด</label>
                                                <input type="text" class="form-control" id="total_floors"
                                                    name="total_floors" required>
                                            </div>
                                            <div class="col-6">
                                                <label for="total_rooms" class="col-form-label"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em"
                                                        fill="#e6896a" viewBox="0 0 1024 1024">
                                                        <path
                                                            d="M298.7 469.3v85.4h426.6v-85.4c0-79.4 54.6-145.5 128-164.7V256c0-70.4-57.6-128-128-128H298.7C228.3 128 170.7 185.6 170.7 256v48.6c73.4 19.2 128 85.3 128 164.7z">
                                                        </path>
                                                        <path
                                                            d="M896 384c-46.9 0-85.3 38.4-85.3 85.3v170.7H213.3v-170.7c0-46.9-38.4-85.3-85.3-85.3s-85.3 38.4-85.3 85.3v213.4c0 70.4 57.6 128 128 128v42.6c0 23.5 19.2 42.7 42.6 42.7s42.7-19.2 42.7-42.7v-42.6h512v42.6c0 23.5 19.2 42.7 42.7 42.7s42.7-19.2 42.6-42.7v-42.6c70.4 0 128-57.6 128-128v-213.4c0-46.9-38.4-85.3-85.3-85.3z">
                                                        </path>
                                                    </svg> จำนวนห้องทั้งหมด</label>
                                                <input type="number" class="form-control" id="total_rooms"
                                                    name="total_rooms" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="place_name" class="col-form-label"><i
                                                class="fa-solid fa-hotel"
                                                style="color:#e6896a; margin-right:10px"></i>กำหนดสถานที่</label>
                                    </div>
                                    <div class="add-building">
                                        <div class="mb-3 list-building">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="floor" class="col-form-label"><i
                                                            class="fa-sharp fa-solid fa-stairs"
                                                            style="color:#e6896a; margin-right:10px"></i>ชั้น</label>
                                                    <input type="text" class="form-control" id="floor"
                                                        name="floor" required>
                                                </div>
                                                <div class="col-6">
                                                    <label for="room" class="col-form-label"><i
                                                            class="fa-solid fa-hotel"
                                                            style="color:#e6896a; margin-right:10px"></i>ชื่อห้อง/สถานที่</label>
                                                    <input type="text" class="form-control" id="place_name"
                                                        name="place_name" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-addform btn-outline-success rounded-pill mt-3"
                                        style="width: 100%; "><i class="fa-solid fa-plus fa-xs"></i>เพิ่มรายการ</button>
                                </div>
                            </div>
                            </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn card-text text-bold text-color"
                    data-bs-dismiss="modal">ยกเลิก</button>
                    <button type="button" class="btn btn-hr-confirm rounded-pill save-buildinglocation">ยืนยัน</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="buildinglocationDetailModal" tabindex="-1"
        aria-labelledby="buildinglocationDetailModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content modal-radius">
                <div class="modal-header background2 modal-header-radius">
                    <h5 class="modal-title" id="buildinglocationDetailModalLabel"><i
                            class="fa-solid fa-file-circle-plus"></i> ข้อมูลอาคารและสถานที่</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body detail_building_location" id="detail_building_location">

                </div>
                <div class="button-footer">
                    <button type="button" class="btn btn-hr-confirm rounded-pill"data-bs-dismiss="modal">ตกลง</button>
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
            $(document).on('click', '.btn-addform', function() {
                const buildingsContainer = document.querySelector('.list-building');
                const newBuildingContainer = buildingsContainer.cloneNode(true);

                newBuildingContainer.classList.remove('list-building');
                newBuildingContainer.classList.add('add-building');

                buildingsContainer.parentNode.insertBefore(newBuildingContainer, buildingsContainer);
            });

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
                        //    console.log(response)
                        var DetailContainer = $(".detail_building_location");
                        var id = response.id;
                        var title = response.location_name;
                        var floor = response.total_floors;
                        var room = response.total_rooms;
                        var Item = `
                            <div class="row">
                                <div class="col-6">
                                    <h6 class="title">${title}</h6>
                                </div>
                                <div class="col-6 text-right">
                                    <button class="btn btn-sm rounded-pill btn-edit" data-id="${id}" data-ac="edit" data-bs-toggle="modal" data-bs-target="#buildinglocationModal"><em class="fas fa-edit"></em></button>
                                    <button class="btn btn-sm rounded-pill btn-delete" data-id="${id}"><em class="fas fa-trash-alt"></em></button>
                                </div>
                            </div>
                        <div class="row bg-light border-right p-3 border border-radius border-2">
                                    <div class="col-2 mt-2"> <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" fill="#1b8f8d" viewBox="0 0 896 1024"> 
                                        <path d="M384 512v-128h96c35.4 0 64 28.6 64 64s-28.6 64-64 64h-96zM768 64c70.6 0 128 57.3 128 128v640c0 70.6-57.4 128-128 128H128c-70.7 0-128-57.4-128-128V192c0-70.7 57.3-128 128-128h640z m-96 384c0-107.8-86-192-192-192h-144c-44.2 0-80 35.8-80 80v368c0 35.4 28.6 64 64 64s64-28.6 64-64v-64h96c106 0 192-86 192-192z"> 
                                        </path> 
                                        </svg>
                                    </div>
                                    <div class="col-8 mt-3">
                                        <p class="room"> ${room}</p>
                                    </div>
                                    <div class="col-2 mt-3">
                                        <p class="floor">ชั้นที่  ${floor}</p> 
                                    </div>
                                    </div>
                                </div>
                        `;
                        DetailContainer.append(Item);
                    }
                });
            })
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
                $("#location_name").val(data.location_name);
                $("#total_floors").val(data.total_floors);
                $("#total_rooms").val(data.total_rooms);
            }
            buildinglocation_modal.on('show.bs.modal', function(event) {
                let btn = $(event.relatedTarget);
                let title = btn.data('ac') === 'edit' ? "แก้ไขข้อมูล" : "เพิ่มข้อมูล";
                console.log(btn.data('ac'))
                let obj = $(this);
                obj.find('.modal-title').text(title)
            })
            buildinglocation_modal.on('hide.bs.modal', function() {
                let obj = $(this);
                obj.find('#location_name').val("");
                obj.find('#total_floors').val("");
                obj.find('#total_rooms').val("");
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
                                    buildinglocation_detail_modal.modal('hide');
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
