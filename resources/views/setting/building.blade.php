@extends('setting_menu')
@section('side-card')
    <style>
        .modal-footer {
            justify-content: center;
        }
        h6{
            color: #048482
        }
    </style>
    <div class="card rounded-4 bg-hr-card">
        <div class="card-header border-0">
            <h6 class="text-bold"><i class="fa-solid fa-hotel"></i> อาคารและสถานที่</h6>
        </div>
        <div class="card-body">
            <p class="mt-1 text-color">กำหนดอาคารและสถานที่</p>
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
                                        <label for="location_name" class="col-form-label text-color"><i
                                                class="fa-solid fa-hotel"
                                                style="color:#e6896a; margin-right:10px"></i>ชื่ออาคาร หรือสถานที่</label>
                                        <input type="text" class="form-control rounded-pill text-color" id="location_name" name="location_name"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="location_img" class="col-form-label text-color"><i
                                                class="fas fa-image hr-icon"></i>รูปภาพหรือสัญลักษณ์อาคาร/สถานที่</label>
                                        <div class="mb-3 pr-3 pl-3">
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <input type="file" class="dropify" id="location_img"
                                                        name="location_img" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="total_floors" class="col-form-label rounded-pill text-color"><i
                                                        class="fa-sharp fa-solid fa-stairs"
                                                        style="color:#e6896a; margin-right:10px"></i>จำนวนชั้นทั้งหมด</label>
                                                <input type="text" class="form-control rounded-pill text-color" id="total_floors"
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
                                                <input type="number" class="form-control rounded-pill text-color" id="total_rooms" 
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
                                    <div class="locations">
                                        <div class="mb-3 list-building">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="floor" class="col-form-label text-color"><i
                                                            class="fa-sharp fa-solid fa-stairs"
                                                            style="color:#e6896a; margin-right:10px"></i>ชั้น</label>
                                                    <input type="text" class="form-control" id="floor" name="floor"
                                                        required>
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
                <div class="button-footer">
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn card-text text-bold text-color btn-reset"
                                data-bs-dismiss="modal">ยกเลิก</button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-hr-confirm form-control rounded-pill save-buildinglocation">ยืนยัน</button>
                        </div>
                    </div>
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
                    <div class="row">
                        <div class="col-10 col-sm-10">
                            <div class="col-8 pl-0 d-flex align-items-center">

                                <img src="" class="img-fluid rounded-circle" alt=""
                                    style="width: 40px; height: 40px;" id="detail-location-img">

                                <p class="ml-2 mb-0 text-bold text-color " id="detail-location-name"></p>
                            </div>
                        </div>
                        <div class="col-2 col-sm-2">
                            <p class="text-end">
                                <span class="btn-edit" id="location_edit"><i
                                        class="fas fa-edit cursor-pointer hr-text-green mr-2"></i></span>
                                <span class="btn-delete" id="building_location_id"><i
                                        class="fas fa-trash-alt cursor-pointer hr-icon mr-2 mt-1"></i></span>
                            </p>
                        </div>
                    </div>
                    <p class="text-black-50 mt-1"> <span id="detail-total_rooms">0</span> ห้อง</p>
                    <div class="row pl-2 pr-2" id="location_detail">

                    </div>

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
                                    <div class="col-8">
                                        <h6 class="ml-2">${locationInfo.location_name}</h6>
                                        <p class="text-black-50 ml-2">${locationInfo.total_floors} ชั้น</p>
                                        <p class="text-black-50 ml-2">${locationInfo.total_rooms} ห้อง</p>
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
                $('.locations').empty();
                
                $('#location_name').val('');
                $('#total_floors').val('');
                $('#total_rooms').val('0');
                $('#floor').val('');
                $('#place_name').val('');
                $('#location_img').val('');
                $('#buildinglocationModal').modal('hide');
           
                $('#id').val('');
                buildinglocation_modal.modal('show')
            })
            let addedContainers = [];
            $(document).on('click', '.btn-addform', function() {
                let buildingContainer = $('.list-building');
                let roomCount = buildingContainer.length;
                let total_rooms = $('#total_rooms').val();
                console.log(roomCount+" "+total_rooms)
                if (roomCount < total_rooms){
                    addLocation();
                    
                
                // if (buildingContainer.length > 0) {
                //     const newBuildingContainer = buildingContainer[0].cloneNode(true);

                //     const inputs = newBuildingContainer.querySelectorAll('input');
                //     inputs.forEach(input => {
                //         input.value = '';
                //     });
                //     const inputFields = newBuildingContainer.querySelectorAll('input[type="text"]');
                //     inputFields.forEach(function(input) {
                //         input.value = '';
                //     });
                //     buildingContainer[0].parentNode.appendChild(newBuildingContainer);

                //     // เพิ่มอ้างอิงของส่วนที่ถูกเพิ่มลงใน addedContainers
                //     addedContainers.push(newBuildingContainer);
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
            $(document).on('click', '.btn-remove-location', function() {
                removeLocation($(this));
            });

           
            $(document).on('click', '.save-buildinglocation', function() {
                var id = $("#id").val();
                if ($("#buildinglocationForm").valid()) {
                    var formData = new FormData();
                    formData.append('_token', $('#_token').val());
                    formData.append('id', $('#id').val());
                    formData.append('location_name', $('#location_name').val());
                    formData.append('total_floors', $('#total_floors').val());
                    formData.append('total_rooms', $('#total_rooms').val());
                    if (document.getElementById("location_img").files.length != 0) {
                        formData.append('location_img', $('#location_img').prop('files')[0]);
                    }
                    var arr_order = [];
                    $('.list-building').each(function() {
                        var locationFormData = new FormData();
                        // var floorValue = $(this).find('#floor').val();
                        // var placeNameValue = $(this).find('#place_name').val();
                        locationFormData.append('floor', $(this).find('#floor').val());
                        locationFormData.append('place_name', $(this).find('#place_name').val());
                        locationFormData.append('location_id', $(this).find('#locationid').val());
                        arr_order.push(locationFormData);
                        console.log('test'+arr_order)
                    });
                    arr_order.forEach(function(locationFormData, index) {
                        for (var pair of locationFormData.entries()) {
                            formData.append(`locations[${index}][${pair[0]}]`, pair[1]);
                            console.log(pair[0] + ', ' + pair[1]);
                        }
                    });

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
                                            $('#location_img').val('');
                                            $('#total_floors').val('');
                                            $('#total_rooms').val('');
                                            $('.locations').empty();
                                            $('#floor').val('');
                                            $('#place_name').val('');
                                            $(".dropify-clear").trigger("click");
                                            $('#buildinglocationModal').modal('hide');
                                            $('#id').val('');
                                            getBuildingLocation();
                                        } else if (response.duplicate == 'duplicate') {
                                            Swal.fire({
                                                position: 'center-center',
                                                icon: 'error',
                                                title: 'เพิ่มรายการไม่สำเร็จ',
                                                text: 'สถานที่ซ้ำ',
                                                showConfirmButton: false,
                                                timer: 1500
                                            })
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
                                        
                                            $('#location_img').val('');
                                            $('#total_floors').val('');
                                            $('#total_rooms').val('');
                                            $('.locations').empty();
                                            $('#floor').val('');
                                            $('#place_name').val('');
                                            $(".dropify-clear").trigger("click");
                                            $('#buildinglocationModal').modal('hide');
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


            $(document).on('click', '.detail', function() {
                let id = $(this).data('id');
                $("#buildinglocationDetailModal").modal('show')
                $.ajax({
                    type: 'post',
                    url: "{{ route('api.v1.building.location.detail.by.id') }}",
                    data: {
                        'id': id,
                    },
                    dataType: "json",
                    success: function(response) {
                        img_url = "{{ asset('uploads/images/setting/building') }}/" + response
                            .data.location_img;

                        $('#detail-location-name').text(response.data.location_name);
                        $('#detail-location-img').attr('src', img_url);
                        $('#detail-total_rooms').text(response.data.total_rooms);
                        $('#building_location_id').val(response.data.id);
                        $("#location_detail").empty();
                        $.each(response.data.location, function(index, item) {
                            var item = `
                            <div class="card card-content border-0">
                                    <div class="card-body">
                                        <div class="row">
                                        
                                            <div class="col-2 mt-2"> <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" fill="#1b8f8d" viewBox="0 0 896 1024"> 
                                                <path d="M384 512v-128h96c35.4 0 64 28.6 64 64s-28.6 64-64 64h-96zM768 64c70.6 0 128 57.3 128 128v640c0 70.6-57.4 128-128 128H128c-70.7 0-128-57.4-128-128V192c0-70.7 57.3-128 128-128h640z m-96 384c0-107.8-86-192-192-192h-144c-44.2 0-80 35.8-80 80v368c0 35.4 28.6 64 64 64s64-28.6 64-64v-64h96c106 0 192-86 192-192z"> 
                                                </path> 
                                                </svg>
                                            </div>
                                            <div class="col-8 mt-3">
                                                <p class="room text-color"> ${item.place_name}</p>
                                            </div>
                                            <div class="col-2 mt-3">
                                                <p class="floor text-color">ชั้นที่  ${item.floor}</p> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                            $("#location_detail").append(item);
                        })
                        $('#location_edit').val(response.data.id);
                        $('#location_edit').data('location_name', response.data.location_name);
                        $('#location_edit').data('total_floors', response.data.total_floor);
                        $('#location_edit').data('total_rooms', response.data.total_rooms);
                        $('#location_edit').data('building_img_url', img_url);
                        $('#location_edit').data('location_img', response.data
                            .location_img);
                        $('#location_edit').data('floor', response.data.floor);
                        $('#location_edit').data('place_name', response.data.place_name);
                    }
                });
            })
            $(document).on('click', '.btn-edit', function() {
                const id = $('#location_edit').val();
                var location_name = $(this).data('location_name');
                var total_floors = $(this).data('total_floors');
                var total_rooms = $(this).data('total_rooms');
                var building_img_url = $(this).data('building_img_url');
                var location_img = $(this).data('location_img');
                var floor = $(this).data('floor');
                var place_name = $(this).data('place_name');
                $('#buildinglocationDetailModal').modal('hide');
                $('#buildinglocationModal').modal('show');
                $('#id').val(id);
                $('#location_name').val(location_name);
                $('#total_floors').val(total_floors);
                $('#total_rooms').val(total_rooms);
                $("#location_img").attr("data-default-file", building_img_url); //dropify
                $('.dropify-render').html('<img src="" />');
                $('.dropify-render img').attr('src', building_img_url);
                $('.dropify-preview').css('display', 'block');
                $('.dropify-filename-inner').text(location_img);
                $('.locations').empty();
               


                $.ajax({
                    type: 'post',
                    url: "{{ route('api.v1.building.location.detail.by.id') }}",
                    data: {
                        'id': id
                    },
                    dataType: "json",
                    success: function(response) {
                        setbuildinglocationFormData(response);
                        $('#buildinglocationModal').modal('show')
                        $("#building_location_id").val(response.id);
                        $("#location_name").val(response.data.location_name);
                        $("#total_floors").val(response.data.total_floors);
                        $("#total_rooms").val(response.data.total_rooms);
                        var floors = response.data.location;
                        // console.log(floors)
                        // floors.forEach(element => {
                        //     $("#floor").val(element.floor);
                        //     $("#place_name").val(element.place_name);
                        //     console.log(response.data.location)
                        //     var locationFormData = new FormData();
                        //     locationFormData.append('floor', element.floor);
                        //     locationFormData.append('place_name', element.place_name);
                        // });
                        $(".locations").empty();
                        $.each(floors, function(index, item) {
                            addLocation(item)
                        });
                        

                        console.log(response)
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

            // $(document).on('click', '.btn-addform', function() {
            //     addLocation();
            // });


            $(document).on('click', '.btn-delete', function() {
                const id = $('#building_location_id').val();

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
                                    $('#buildinglocationDetailModal').modal('hide');
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
        function removeLocation(button) {
            let location_id = button.siblings('.form-control').attr('data-location-id');
            button.closest('.list-building').remove();
        }

        function addLocation(data = null) {
            let location_id = ''
            let place_name = ''
            let floor = ''
            if (data) {
                location_id = data.id;
                floor = data.floor;
                place_name = data.place_name;
            }
            $(".locations").append(`  <div class="row list-building">
    <div class="col-6">
        <div class="input-group mb-3">
            <input type="hidden" value="${location_id}" id="locationid">
            <input type="number" class="form-control input-modal rounded-pill text-color"
            id="floor"
            name="floor" data-location-id="${location_id}" value="${floor}" style="height: 45px;">
        </div>
    </div>
    <div class="col-6">
        <div class="input-group mb-3">
            <input type="text" class="form-control input-modal rounded-start-pill text-color"
            id="place_name"
            name="place_name" data-location-id="${location_id}" value="${place_name}" style="height: 45px;">
            <button class="btn rounded-end-pill border btn-remove-location delete-location" data-location-id="${location_id}" type="button"><em class="fas fa-times-circle text-hr-orange"></em></button>
        </div>
    </div>
</div>`)
        }
    </script>
@stop
