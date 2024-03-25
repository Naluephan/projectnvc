@extends('setting_menu')
@section('side-card')
    <style>
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
        {{-- <div class="card-footer bg-transparent">
            <button class="btn btn-hr-confirm form-control rounded-pill btn-save">บันทึก</button>
        </div> --}}
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
                                        <label for="location_name" class="col-form-label text-color"><i class="fa-solid fa-hotel"
                                                style="color:#e6896a; margin-right:10px"></i>ชื่ออาคาร หรือสถานที่</label>
                                        <input type="text" class="form-control" id="location_name" name="location_name"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="location_img" class="col-form-label text-color"><i class="fas fa-image hr-icon"
                                                ></i>รูปภาพหรือสัญลักษณ์อาคาร/สถานที่</label>
                                                <div class="mb-3 pr-3 pl-3">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-6">
                                                            <input type="file" class="dropify" id="location_img" name="location_img" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="total_floors" class="col-form-label text-color"><i
                                                        class="fa-sharp fa-solid fa-stairs"
                                                        style="color:#e6896a; margin-right:10px"></i>จำนวนชั้นทั้งหมด</label>
                                                <input type="text" class="form-control" id="total_floors"
                                                    name="total_floors" required>
                                            </div>
                                            <div class="col-6">
                                                <label for="total_rooms" class="col-form-label text-color"><svg
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
                                        <label for="place_name" class="col-form-label text-color"><i
                                                class="fa-solid fa-hotel"
                                                style="color:#e6896a; margin-right:10px"></i>กำหนดสถานที่</label>
                                    </div>
                                    <div class="add-building">
                                        <div class="mb-3 list-building">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="floor" class="col-form-label text-color"><i
                                                            class="fa-sharp fa-solid fa-stairs"
                                                            style="color:#e6896a; margin-right:10px"></i>ชั้น</label>
                                                    <input type="text" class="form-control" id="floor"
                                                        name="floor" required>
                                                </div>
                                                <div class="col-6">
                                                    <label for="room" class="col-form-label text-color"><i
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
            $('.dropify').dropify({
                tpl: {
                    message: '<div class="dropify-message"><span class="file-icon"/><p><h5>กรุณาเลือกไฟล์ภาพ</h5></p></div>',
                    preview: '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message"></p></div></div></div>',
                },
            });
            getBuildingLocation();

            function getBuildingLocation() {
                let data = {};
                $.ajax({
                    type: 'post',
                    url: "{{ route('api.v1.building.location.list') }}",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        $(".list_building_location").empty();
                        $.each(response.data, function(index, locationInfo) {
                            var id = locationInfo.id;
                            var img_path =
                                '{{ asset('uploads/images/setting/building') }}';
                            var locationImg = img_path + '/' + locationInfo
                                .location_img;
                            var Item = `
                            <div class="card border border-2 p-0 rounded-4 detail" data-id="${id}">
                                <div class="row">
                                    <div class="col-4">
                                        <div style="width: 100%; ">
                                            <img src="${locationImg}" class="border border-0 rounded-start-4" alt="..." style="position: absolute; width: 90%; height: 100%; object-fit: cover; ">
                                        </div>
                                    </div>
                                    <div class="col-8 ">
                                        <h5 class="ml-2 ">${locationInfo.location_name}</h5>
                                        <p class="ml-2">${locationInfo.total_floors} ชั้น</p>
                                        <p class="ml-2">${locationInfo.total_rooms} ห้อง</p>
                                    </div>
                                </div>
                            </div>
                            `;
                            $(".list_building_location").append(Item);
                        });
                    },
                });
            }
            getBuildingLocation();

            var buildinglocation_modal = $("#buildinglocationModal");
            $(document).on('click', '.btn-add', function() {
                $('#buildinglocationModal').modal('show');
                $('#location_name').val('');
                $('#total_floors').val('');
                $('#total_rooms').val('');
                $('#floor').val('');
                $('#place_name').val('');
                $('#import-file').val('');
                $('#buildinglocationModal').modal('hide');
                $('#id').val('');
                buildinglocation_modal.modal('show')
            })
            let addedContainers = [];
            $(document).on('click', '.btn-addform', function() {
                const buildingContainer = document.querySelectorAll('.list-building');
                if (buildingContainer.length > 0) {
                    const newBuildingContainer = buildingContainer[0].cloneNode(true);

                    const inputs = newBuildingContainer.querySelectorAll('input');
                    inputs.forEach(input => {
                        input.value = '';
                    });
                    const inputFields = newBuildingContainer.querySelectorAll('input[type="text"]');
                    inputFields.forEach(function(input) {
                        input.value = '';
                    });
                    buildingContainer[0].parentNode.appendChild(newBuildingContainer);

                    // เพิ่มอ้างอิงของส่วนที่ถูกเพิ่มลงใน addedContainers
                    addedContainers.push(newBuildingContainer);
                } else {
                    Swal.fire({
                        position: 'center-center',
                        icon: 'warning',
                        title: 'คุณเพิ่มได้สูงสุดแล้ว',
                        showConfirmButton: false,
                        timer: 1000
                    });
                }
            });
          // เรียกฟังก์ชันเมื่อมีการเปลี่ยนแปลงใน input ของ id="total_floors"
    document.getElementById("total_rooms").addEventListener("input", function() {
        // เลือก div container ที่มีคลาส "list-building" เพื่อนับจำนวน input fields ที่มี id="floor"
        var listBuilding = document.querySelector(".list-building");
        var floorInputs = listBuilding.querySelectorAll("#place_name");
        var totalFloors = parseInt(this.value); // รับค่าจำนวนชั้นที่กรอกเข้ามา

        // เช็คจำนวน input fields ที่มีอยู่แล้ว
        var currentFloorCount = floorInputs.length;

        // เริ่มต้นการเพิ่มหรือลบ input fields เพื่อให้ตรงกับจำนวนที่ใส่เข้ามา
        if (totalFloors > currentFloorCount) {
            // ต้องการเพิ่ม input fields
            var floorsToAdd = totalFloors - currentFloorCount;
            for (var i = 0; i < floorsToAdd; i++) {
                // สร้าง div element ใหม่เพื่อเก็บ label และ input field
                var newDiv = document.createElement("div");
                newDiv.classList.add("row");
                newDiv.innerHTML = `
                    <div class="col-6">
                        <label for="floor" class="col-form-label text-color"><i class="fa-sharp fa-solid fa-stairs" style="color:#e6896a; margin-right:10px"></i>ชั้น</label>
                        <input type="text" class="form-control" id="floor" name="floor" required>
                    </div>
                    <div class="col-6">
                        <label for="place_name" class="col-form-label text-color"><i class="fa-solid fa-hotel" style="color:#e6896a; margin-right:10px"></i>ชื่อห้อง/สถานที่</label>
                        <input type="text" class="form-control" id="place_name" name="place_name" required>
                    </div>
                `;
                listBuilding.appendChild(newDiv);
            }
        } else if (totalFloors < currentFloorCount) {
            // ต้องการลบ input fields เนื่องจากป้อนจำนวนน้อยลง
            var floorsToRemove = currentFloorCount - totalFloors;
            for (var i = 0; i < floorsToRemove; i++) {
                // ลบ div element ล่าสุดที่มีคลาส "row"
                listBuilding.removeChild(listBuilding.lastElementChild);
            }
        }
    });
            $(document).on('click', '.save-buildinglocation', function() {
                let id = $("#id").val();
                let buildinglocationForm = $("#buildinglocationForm");
                if (buildinglocationForm.valid()) {
                    var formData = new FormData();
                    var locations
                    // formData.append('_token', $('#_token').val());
                    formData.append('id', $('#id').val());
                    formData.append('location_name', $('#location_name').val());
                    formData.append('total_floors', $('#total_floors').val());
                    formData.append('total_rooms', $('#total_rooms').val());
                    formData.append('floor', $('#floor').val());
                    formData.append('place_name', $('#place_name').val());
                    if (document.getElementById("import-file").files.length != 0) {
                        formData.append('location_img', $('#import-file').prop('files')[0]);
                    }
                  
                    if (!id) {
                        Swal.fire({
                            title: 'ยืนยันการเพิ่มรายการ?',
                            text: "ต้องการดำเนินการใช่หรือไม่!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#FA9583',
                            cancelButtonColor: '#646464',
                            confirmButtonText: 'ยืนยัน',
                            cancelButtonText: 'ปิด'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    type: "post",
                                    url: "{{ route('api.v1.building.location.create') }}",
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
                                            $('#location_name').val('');
                                            $('#total_floors').val('');
                                            $('#total_rooms').val('');
                                            $('#floor').val('');
                                            $('#place_name').val('');
                                            $('#import-file').val('');
                                            $('#buildinglocationModal').modal('hide');
                                            $('#id').val('');
                                            getBuildingLocation();
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
                            confirmButtonColor: '#FA9583',
                            cancelButtonColor: '#646464',
                            confirmButtonText: 'ยืนยัน',
                            cancelButtonText: 'ปิด'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    type: "post",
                                    url: "{{ route('api.v1.building.location.update') }}",
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
                                            $('#location_name').val('');
                                            $('#total_floors').val('');
                                            $('#total_rooms').val('');
                                            $('#floor').val('');
                                            $('#place_name').val('');
                                            $('#import-file').val('');
                                            $('#buildinglocationModal').modal('hide');
                                            $('#id').val('');
                                            getBuildingLocation();
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

            var buildinglocation_detail_modal = $("#buildinglocationDetailModal");
            $(document).on('click', '.detail', function() {
                const list = document.getElementById('detail_building_location');
                list.innerHTML = '';
                buildinglocation_detail_modal.modal('show')
                let id = $(this).data('id');
                $.ajax({
                    type: 'post',
                    url: "{{ route('api.v1.building.location.detail.by.id') }}",
                    data: {
                        'id': id,
                    },
                    dataType: "json",
                    success: function(response) {
                           console.log(response)
                        var DetailContainer = $(".detail_building_location");
                        
                        response.forEach(function(buildingInfo) {
                        
                        var floor = buildingInfo.floor;
                        var room = buildingInfo.place_name;
                        var Item = `
                            <div class="row">
                                <div class="col-6">
                                   
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
                            })
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
                $("#floor").val(data.floor);
                $("#place_name").val(data.place_name);
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
                obj.find('#floor').val("");
                obj.find('#place_name').val("");
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
