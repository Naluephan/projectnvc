@extends('setting_menu')
@section('side-card')
    <style>
        .header img {
            width: 100px;
        }

        .cursor-pointer {
            cursor: pointer;
        }

        .card-content {
            border-bottom-left-radius: 18px;
            border-bottom-right-radius: 18px;
            height: 85px;
            margin-top: 1rem;
        }

        .modal-dialog {
            top: 10% !important;
            width: 450px;
        }
    </style>

    <div class="card p-3 rounded-4 bg-hr-card">
        <div class="card-header border-0 pb-0">
            <h6 class="text-bold"><i class="fas fa-cubes"></i> การเบิกอุปกรณ์</h6>
            <p class="text-bold">กำหนดสิทธิ์สำหรับการเบิกอุปกรณ์ในแต่ละแผนกก</p>
        </div>
        <div class="card-body pt-0">
            <div class="row mt-1 list_pickuptools p-2" id="list_pickuptools"></div>
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

    <div class="modal fade" id="pickuptoolsModal" tabindex="-1" aria-labelledby="pickuptoolsModalLabel" aria-hidden="true"
        data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content modal-radius">
                <div class="modal-header background2 modal-header-radius">
                    <h6 class="modal-title" id="pickuptoolsModalLabel"><i class="fa-solid fa-file-circle-plus"></i>
                        เพิ่มข้อมูล</h6>
                    {{-- <button type="button" class="btn-close btn-reset" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                <div class="modal-body">
                    <form id="pickuptoolsForm">
                        <input type="hidden" name="id" id="id">
                        <div class="department">
                            <div class="row">
                                <div class="pr-3 pl-3">
                                    <select
                                        class="js-example-basic-single form-select input-modal rounded-pill bg-white text-color"
                                        name="state" id="department_id" name="department_id" required>
                                        <option selected>เลือกแผนก</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="added-pickuptools">
                            <div class="row mt-3 list-pickuptools">
                                <div class="col-6 pl-3">
                                    <label for="device_types_id" class="col-form-label text-color"><i
                                            class="fas fa-newspaper text-sm"></i> อุปกรณ์ที่เบิกได้</label>
                                    <select class="form-select input-modal rounded-pill bg-white text-color device_types_id"
                                        name="device_types_id" id="device_types_id" required>
                                        <option selected>เลือกอุปกรณ์</option>
                                    </select>
                                </div>
                                <div class="col-6 pr-3">
                                    <label for="number_requested" class="col-form-label text-color"><i
                                            class="fas fa-newspaper text-sm"></i> จำนวน (หน่วย) / ปี</label>
                                    <input type="number"
                                        class="form-control input-modal rounded-pill text-color number_requested"
                                        style="height: 45px;" required min="1">
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="button-addList pl-2 pr-2">
                        <button type="button" class="form-control btn btn-outline-success rounded-pill mt-3 btn-addList"><i
                                class="fa-solid fa-plus"></i>
                            เพิ่มรายการ</button>
                    </div>
                </div>
                <div class="button-footer">
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn card-text text-bold text-color btn-reset"
                                data-bs-dismiss="modal">ยกเลิก</button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-hr-confirm form-control rounded-pill save-pickuptools">บันทึก</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="pickuptoolsDetailModal" tabindex="-1" aria-labelledby="pickuptoolsDetailModalLabel"
        aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content modal-radius">
                <div class="modal-header background2 modal-header-radius">
                    <h6 class="modal-title">ข้อมูลสิทธิ์การเบิกอุปกรณ์</h6>
                    <button type="button" class="btn-close btn-reset" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="header px-3">
                        <div class="row">
                            <div class="col-8 detail-department" id="detail-department"></div>
                            <div class="col-4 py-2 d-flex justify-content-end">
                                <div class="icons">
                                    <i class="fas fa-edit mr-2 text-color btn-edit cursor-pointer"></i>
                                    <i class="fas fa-trash-alt btn-delete cursor-pointer" style="color: #FA9583;"></i>
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <div class="list_pickuptoolsDetail" id="list_pickuptoolsDetail"></div>
                        </div>
                    </div>
                </div>
                <div class="button-footer">
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-hr-confirm form-control rounded-pill btn-reset" data-bs-dismiss="modal"
                                aria-label="Close">ตกลง</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="pickuptoolsEditModal" tabindex="-1" aria-labelledby="pickuptoolsEditModalLabel"
        aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content modal-radius">
                <div class="modal-header background2 modal-header-radius">
                    <h6 class="modal-title" id="pickuptoolsEditModalLabel"><i class="fa-solid fa-file-circle-plus"></i>
                        แก้ไขข้อมูล</h6>
                    {{-- <button type="button" class="btn-close btn-reset" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                <div class="modal-body">
                    <form id="pickuptoolsEditForm">
                        <input type="hidden" name="id" id="id">
                        <div class="added-pickuptools list_pickuptoolsByid px-3" id="list_pickuptoolsByid">

                        </div>
                    </form>
                </div>
                <div class="button-footer">
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn card-text text-bold text-color btn-resetpickuptools"
                                data-bs-dismiss="modal">ยกเลิก</button>
                        </div>
                        <div class="col-6">
                            <button
                                class="btn btn-hr-confirm form-control rounded-pill save-pickuptoolsByid">บันทึก</button>
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

            var pickuptools_modal = $("#pickuptoolsModal");
            var pickuptoolsDetail_modal = $("#pickuptoolsDetailModal");
            var pickuptoolsEdit_modal = $("#pickuptoolsEditModal");

            $(document).on('click', '.btn-reset', function() {
                $('#pickuptoolsForm')[0].reset();
                addedContainers.forEach(container => {
                    container.parentNode.removeChild(container);
                });
                addedContainers = [];
            });

            $(document).on('click', '.btn-resetpickuptools', function() {
                location.reload();
            });

            var departmentId = $('#department_id');
            $.ajax({
                url: '{{ route('api.v1.department.list') }}',
                type: 'post',
                dataType: 'json',
                success: function(data) {
                    // console.log(data);
                    data.forEach(function(item) {
                        departmentId.append(
                            `<option value="${item.id}">${item.name_th}</option>`);
                    });
                }
            });

            var deviceTypesId = $('.device_types_id');
            var deviceTypesLength = 0;
            $.ajax({
                url: '{{ route('api.v1.device.types.list') }}',
                type: 'post',
                dataType: 'json',
                success: function(data) {
                    // console.log(data);
                    var datalength = data.length;
                    deviceTypesLength = datalength;
                    data.forEach(function(item) {
                        deviceTypesId.append(
                            `<option value="${item.id}">${item.device_types_name}</option>`);
                    });
                }
            });


            let addedContainers = [];
            $(document).on('click', '.btn-addList', function() {
                // console.log(deviceTypesLength);
                const pickuptoolsContainer = document.querySelectorAll('.list-pickuptools');
                if (pickuptoolsContainer.length < deviceTypesLength) {
                    const newPickuptoolsContainer = pickuptoolsContainer[0].cloneNode(true);

                    const inputs = newPickuptoolsContainer.querySelectorAll('input');
                    inputs.forEach(input => {
                        input.value = '';
                    });
                    const inputFields = newPickuptoolsContainer.querySelectorAll('input[type="text"]');
                    inputFields.forEach(function(input) {
                        input.value = '';
                    });
                    pickuptoolsContainer[0].parentNode.appendChild(newPickuptoolsContainer);

                    // เพิ่มอ้างอิงของส่วนที่ถูกเพิ่มลงใน addedContainers
                    addedContainers.push(newPickuptoolsContainer);
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


            getPickuptoolsCategory();

            function getPickuptoolsCategory() {
                const listPickuptools = document.getElementById('list_pickuptools');
                listPickuptools.innerHTML = '';
                $.ajax({
                    type: 'post',
                    url: "{{ route('api.v1.pickup.tools.all.list') }}",
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
                        var pickuptoolsContainer = $(".list_pickuptools");
                        response.forEach(function(pickuptoolsInfo) {
                            var department_id = pickuptoolsInfo.department_id;
                            var departmentName = pickuptoolsInfo.department_name;
                            var imageDepartments = pickuptoolsInfo.image_departments;
                            var departmentCount = pickuptoolsInfo.department_count;
                            var Item = `
                                <div class="content p-2">
                                    <div class="button-details p-0 w-100 mb-3 cursor-pointer" style="height: 120px;" data-department_id="${department_id}">
                                        <span class="button-image w-40" style="background-image: url(${imageDepartments});"></span>
                                        <span class="button-text w-100 pt-3">
                                        <h6 class="text-bold mb-0 mr-2">${departmentName}</h6>
                                        <p class="text-bold mb-0" style="color: #d4d4d4;">สิทธิ์การเบิก ${departmentCount} รายการ</p>
                                    </span>
                                </div>
                            </div>
                            `;
                            pickuptoolsContainer.append(Item);
                        });
                    },
                });
            }

            var detailDepartment = $('#detail-department');
            var showDetail = $('#list_pickuptoolsDetail');
            $(document).on('click', '.button-details', function() {
                pickuptoolsDetail_modal.modal('show')
                var department_id = $(this).data('department_id');
                $('.btn-delete').data('department_id', department_id)
                $('.btn-edit').data('department_id', department_id)

                // เคลียร์ข้อมูลที่มีอยู่ก่อนแสดงข้อมูลใหม่
                detailDepartment.empty();
                showDetail.empty();

                $.ajax({
                    url: '{{ route('api.v1.detail.department.by.id') }}',
                    type: 'post',
                    data: {
                        'department_id': department_id
                    },
                    dataType: 'json',
                    success: function(data) {
                        // console.log(data);
                        var item = data[0]; // เลือกรายการแรกจากข้อมูล
                        detailDepartment.html(`
                            <div class="col-8 pl-0 d-flex align-items-center">
                                <img src="${item.image_departments}" alt="Generic placeholder image"
                                    class="img-fluid rounded-circle" style="width: 40px; height: 40px;">
                                <p class="ml-2 mb-0 text-bold text-color">${item.department_name}</p>
                            </div>
                            <div class="text-header pt-2 pl-0">
                                <p class="mb-0" style="color: #c7c8c8;">สิทธิ์การเบิกอุปกรณ์ ${item.department_count} รายการ (ต่อปี)</p>
                            </div>
                        `);
                    }
                });

                $.ajax({
                    url: '{{ route('api.v1.pickup.tools.show.detail.by.id') }}',
                    type: 'post',
                    data: {
                        'department_id': department_id
                    },
                    dataType: 'json',
                    success: function(data) {
                        // console.log(data);
                        data.forEach(function(item) {
                            showDetail.append(`
                                <div class="card card-content border-0 mt-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-2">
                                                <i class="fas fa-cubes text-color" style="font-size: 40px;"></i>
                                            </div>
                                            <div class="col-7">
                                                <p class="text-color p-2">${item.device_types_name}</p>
                                            </div>
                                            <div class="col-3 d-flex align-items-center justify-content-end">
                                                <p class="text-color py-2">${item.number_requested} ${item.unit}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `);
                        });
                    }
                });
            })

            $(document).on('click', '.btn-add', function() {
                pickuptools_modal.modal('show')
            })

            $(document).on('click', '.save-pickuptools', function() {
                let pickuptoolsForm = $("#pickuptoolsForm");
                let department_id = $('#department_id').val();
                let device_types_id = $('#device_types_id').val();
                var arr_order = [];
                $('.list-pickuptools').each(function() {
                    var device_types_id = $(this).find('.device_types_id').val();
                    var number_requested = $(this).find('.number_requested').val();

                    arr_order.push({
                        device_types_id: device_types_id,
                        number_requested: number_requested
                    });
                });
                // console.log(arr_order);
                if (department_id !== "เลือกแผนก" && device_types_id !== "เลือกอุปกรณ์" &&
                    pickuptoolsForm
                    .valid()) {
                    Swal.fire({
                        title: 'เพิ่มข้อมูล ?',
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
                                url: '{{ route('api.v1.pickup.tools.create') }}',
                                data: {
                                    department_id: $('#department_id').val(),
                                    arr_order: arr_order
                                },
                                dataType: "json",
                                success: function(response) {
                                    if (response.status == 'success') {
                                        Swal.fire({
                                            position: 'center-center',
                                            icon: 'success',
                                            title: 'เพิ่มข้อมูลสำเร็จ',
                                            showConfirmButton: false,
                                            timer: 1500
                                        })
                                        pickuptools_modal.modal('hide');
                                        getPickuptoolsCategory();
                                        $('#pickuptoolsForm')[0].reset();
                                        addedContainers.forEach(container => {
                                            container.parentNode.removeChild(
                                                container);
                                        });
                                        addedContainers = [];
                                    }
                                }
                            });
                        }
                    });
                } else {
                    Swal.fire({
                        title: 'กรอกข้อมูลให้ครบ!!',
                        icon: 'error',
                        showCancelButton: false,
                        confirmButtonColor: '#136E68',
                        confirmButtonText: 'ยืนยัน',
                        customClass: {
                            confirmButton: 'rounded-pill',
                            popup: 'modal-radius'
                        }
                    });

                }
            })

            $(document).on('click', '.btn-delete', function() {
                let obj = $(this);
                let department_id = obj.data('department_id');
                // console.log(department_id);
                Swal.fire({
                    title: 'ยืนยัน!! ลบข้อมูล',
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
                            type: 'post',
                            url: "{{ route('api.v1.pickup.tools.deleteCondition') }}",
                            data: {
                                'department_id': department_id
                            },
                            dataType: "json",
                            success: function(response) {
                                pickuptoolsDetail_modal.modal('hide');
                                getPickuptoolsCategory();
                            }
                        });

                    }
                })
            })

            $(document).on('click', '.btn-deleteList', function() {
                let obj = $(this);
                var id = $(this).data('id');
                var device_types_id = $(this).data('device_types_id');
                $('.save-pickuptoolsByid').data('id', id)
                $('.save-pickuptoolsByid').data('device_types_id', device_types_id)

                // console.log(device_types_id);

                // console.log(id);
                Swal.fire({
                    title: 'ยืนยัน!! ลบรายการ',
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
                            type: 'post',
                            url: "{{ route('api.v1.pickup.tools.delete.list') }}",
                            data: {
                                'id': id
                            },
                            dataType: "json",
                            success: function(response) {
                                pickuptoolsEdit_modal.modal('hide');
                                getPickuptoolsCategory();
                                location.reload();
                            }
                        });

                    }
                })
            })

            $(document).on('click', '.btn-edit', function() {
                pickuptoolsDetail_modal.modal('hide');
                pickuptoolsEdit_modal.modal('show');

                addedContainers = [];
                var department_id = $(this).data('department_id');

                var list_pickuptoolsByid = $('#list_pickuptoolsByid');
                $.ajax({
                    url: "{{ route('api.v1.pickup.tools.show.detail.by.id') }}",
                    type: 'post',
                    data: {
                        'department_id': department_id
                    },
                    success: function(data) {
                        // console.log(data);
                        data.forEach(function(item) {
                            list_pickuptoolsByid.append(`
                                <div class="content">
                                    <div class="row mt-3">
                                        <div class="col-6 ">
                                            <label for="device_types_id" class="col-form-label text-color"><i
                                                    class="fas fa-newspaper text-sm"></i> อุปกรณ์ที่เบิกได้</label>
                                            <select
                                                class="form-select input-modal rounded-pill bg-white text-color device_types_id"
                                                name="device_types_id" id="device_types_id" disabled>
                                                <option value="${item.device_types_id}">${item.device_types_name}</option>
                                            </select>
                                        </div>
                                        <div class="col-5 pr-2">
                                            <label for="number_requested" class="col-form-label text-color"><i
                                                    class="fas fa-newspaper text-sm"></i> จำนวน (หน่วย) / ปี</label>
                                            <input type="number"
                                                class="form-control input-modal rounded-pill text-color number_requested"
                                                style="height: 45px;" value="${item.number_requested}" min="1">
                                        </div>
                                        <div class="col-1">
                                            <svg class="btn-deleteList cursor-pointer pt-5" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512" style="width: 20px;" data-id="${item.id}" data-device_types_id="${item.device_types_id}">
                                                <path
                                                    d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1 -32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1 -32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1 -32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.7 23.7 0 0 0 -21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0 -16-16z"
                                                    style="fill:#FA9583" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            `);
                        });
                    }
                });
            });


            $(document).on('click', '.save-pickuptoolsByid', function() {
                let pickuptoolsForm = $("#pickuptoolsForm");

                var arr_order = [];
                var id = $(this).data('id');
                var device_types_id = $(this).data('device_types_id');
                // console.log(device_types_id);
                // var device_types_id = $(this).find('.device_types_id').val();
                var number_requested = $(this).find('.number_requested').val();


                arr_order.push({
                    device_types_id: device_types_id,
                    number_requested: number_requested
                });

                console.log(arr_order);
                Swal.fire({
                    title: 'อัพเดทข้อมูล ?',
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
                            url: "{{ route('api.v1.pickup.tools.update') }}",
                            data: {
                                id: id,
                                arr_order: arr_order
                            },
                            dataType: "json",
                            success: function(response) {
                                if (response.status == 'success') {
                                    Swal.fire({
                                        position: 'center-center',
                                        icon: 'success',
                                        title: 'อัพเดทข้อมูลสำเร็จ',
                                        showConfirmButton: false,
                                        timer: 1500
                                    })
                                    pickuptoolsEdit_modal.modal('hide');
                                    getPickuptoolsCategory();
                                    $('#pickuptoolsForm')[0].reset();
                                }
                            }
                        });
                    }
                });
            })




        });
    </script>
@stop
