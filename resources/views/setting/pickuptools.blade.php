@extends('setting_menu')
@section('side-card')
    <style>
        .modal {
            overflow: auto !important;
        }

        .cursor-pointer {
            cursor: pointer;
        }

        .modal-dialog {
            top: 10% !important;
            width: 450px;
        }
    </style>

    <div class="card rounded-4 bg-hr-card">
        <div class="card-header border-0">
            <h6 class="text-bold"><i class="fas fa-cubes"></i> การเบิกอุปกรณ์</h6>
            <p class="text-bold">กำหนดสิทธิ์สำหรับการเบิกอุปกรณ์ในแต่ละแผนกก</p>
        </div>
        <div class="card-body">
            <div class="row mt-n4 px-2 pickuptools_list" id="pickuptools_list">

            </div>
            <button type="button" class="form-control btn btn-outline-success rounded-pill mt-3 btn-add"><i
                    class="fa-solid fa-plus"></i>
                เพิ่มข้อมูล</button>
        </div>
    </div>

    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true"
        data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content modal-radius">
                <div class="modal-header background2 modal-header-radius">
                    <h6 class="modal-title" id="modalLabel"><i class="fa-solid fa-file-circle-plus"></i> <span
                            class="add-data">เพิ่มข้อมูล</span></h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="pickuptoolsForm">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3 pr-3 pl-3">
                            <label for="" class="col-form-label text-color"><i
                                    class="fas fa-building text-hr-orange"></i> แผนก</label>
                            <select class="js-example-basic-single form-select input-modal rounded-pill bg-white text-color"
                                name="" id="department_id" name="department_id" required>
                                @foreach ($department as $departments)
                                    <option value="{{ $departments->id }}">{{ $departments->name_th }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="positions pr-3 pl-3">
                            <div class="row">
                                <div class="col-6">
                                    <label for="" class="col-form-label text-color"><i
                                            class="fas fa-user text-hr-orange"></i> อุปกรณ์ที่เบิกได้</label>
                                </div>
                                <div class="col-6">
                                    <label for="number_requested" class="col-form-label text-color"><i
                                            class="fas fa-user text-hr-orange"></i> จำนวน (หน่วย) / ปี</label>
                                </div>
                            </div>
                            <div class="position_list pr-2 row">
                                <div class="col-6">
                                    <div class=" input-group mb-3">
                                        <select
                                            class="js-example-basic-single form-select input-modal rounded-pill bg-white text-color"
                                            id="device_types_id" name="device_types_name" required>
                                            @foreach ($pickupToolsType as $pickupToolsTypes)
                                                <option value="{{ $pickupToolsTypes->id }}">
                                                    {{ $pickupToolsTypes->device_types_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3 pr-3">
                                        <input type="number" class="form-control input-modal rounded-pill text-color"
                                            id="number_requested" name="number_requested" required value="1"
                                            min="1" style="height: 45px;">
                                        <button class="btn rounded-pill btn-remove-position" type="button" style="position: absolute;right: -15px;top: 5px;"><em
                                                class="fas fa-times-circle text-hr-orange text-lg"></em></button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="pr-3 pl-3">
                            <button type="button"
                                class="form-control btn btn-outline-success rounded-pill mt-3 btn-add-position"> <i
                                    class="fas fa-plus"> เพิ่มรายการ</i></button>
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
                            <button class="btn btn-hr-confirm form-control rounded-pill save-department">บันทึก</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- detail --}}
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true"
        data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content modal-radius">
                <div class="modal-header background2 modal-header-radius">
                    <h6 class="modal-title" id="detailModalLabel">
                        ข้อมูลสิทธิ์การเบิกอุปกรณ์
                    </h6>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                <div class="modal-body department_detail" id="department_detail">
                    <input type="hidden" id="detail-department-company_id">
                    <div class="row">
                        <div class="col-10 col-sm-10">
                            <div class="col-8 pl-0 d-flex align-items-center">
                                {{-- <img src="" alt="Generic placeholder image" id="detail-department-img" class="img-fluid rounded-circle" style="width: 40px; height: 40px;"> --}}
                                <img src="" class="img-fluid rounded-circle" alt=""
                                    style="width: 40px; height: 40px;" id="detail-department-img">

                                <p class="ml-2 mb-0 text-bold text-color " id="detail-department-name"></p>
                            </div>
                        </div>
                        <div class="col-2 col-sm-2">
                            <p class="text-end">
                                <span class="btn-edit" id="department_edit"><i
                                        class="fas fa-edit cursor-pointer hr-text-green mr-2"></i></span>
                                <span class="btn-delete" id="department_delete"><i
                                        class="fas fa-trash-alt cursor-pointer hr-icon mr-2 mt-1"></i></span>
                            </p>
                        </div>
                    </div>
                    <p class="text-black-50 mt-1">สิทธิ์การเบิกอุปกรณ์ <span id="detail-position_count">0</span> รายการ
                        (ต่อปี)</p>
                    <div class="row pl-2 pr-2" id="position_detail">

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
    <script>
        $(() => {

            $('.select2').select2();
            $(document).on('click', '.btn-add', function() {
                $('#modal').modal('show');
                $('#department_id').val('1').prop('disabled', false);
                $('#device_types_id').val('1');
                $('#number_requested').val('');
                $('.positions .position_list').not(':first').remove();
                $('#modal').modal('hide');
                $('#id').val('');
                $('.add-data').text('เพิ่มข้อมูล');
            });

            getPickuptoolsList();

            function getPickuptoolsList() {

                $.ajax({
                    url: "{{ route('api.v1.pickup.tools.all.list') }}",
                    type: "post",
                    dataType: "json",
                    success: function(response) {


                        $(".pickuptools_list").empty();
                        response.forEach(function(info) {
                            let id = info.department_id;
                            let img_path =
                                '{{ asset('uploads/images/setting/department') }}';
                            let image_departments = img_path + '/' + info
                                .image_departments;
                            let item = `
                                <div class="content btn-detail p-2" data-id="${id}">
                                    <div class="button-details p-0 w-100 mb-3 cursor-pointer" style="height: 120px;">
                                        <span class="button-image w-40" style="background-image: url(${image_departments});"></span>
                                        <span class="button-text w-100 pt-3">
                                        <h6 class="text-bold mb-0 mr-2">${info.departments_name}</h6>
                                        <p class="text-bold mb-0" style="color: #d4d4d4;">สิทธิ์การเบิก ${info.count} รายการ</p>
                                        </span>
                                    </div>
                                </div>
                                `;
                            $(".pickuptools_list").append(item);
                        });
                    }
                });
            }

            $(document).on('click', '.btn-detail', function() {
                let id = $(this).data('id');
                // console.log(id);
                $('#detailModal').modal('show');
                $.ajax({
                    type: "post",
                    url: "{{ route('api.v1.pickup.tools.show.detail.by.id') }}",
                    data: {
                        'id': id
                    },
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
                        img_url = "{{ asset('uploads/images/setting/department') }}/" + response
                            .data.image_departments;
                        $('#detail-department-name').text(response.data.name_th);
                        $('#detail-department-img').attr('src', img_url);
                        $('#detail-position_count').text(response.data.pickup_tools_count);
                        $('#department_id').val(response.data.department_id);
                        $("#position_detail").empty();
                        $.each(response.data.pickup_tools, function(index, item) {
                            var item = `
                                <div class="card card-content border-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-2">
                                                <i class="fas fa-cubes text-color" style="font-size: 40px;"></i>
                                            </div>
                                            <div class="col-7">
                                                <p class="text-color p-2">${item.pickup_tools_device_type.device_types_name}</p>
                                            </div>
                                            <div class="col-3 d-flex align-items-center justify-content-end">
                                                <p class="text-color py-2">${item.number_requested} ${item.pickup_tools_device_type.unit}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                `;
                            $("#position_detail").append(item);
                        });

                        $('#department_edit').val(response.data.id);
                        $('#department_edit').data('department_id', response.data.id);
                        $('#department_edit').data('device_types_id', response.data
                            .pickup_tools.device_types_id);
                        $('#department_edit').data('number_requested', response.data
                            .pickup_tools.number_requested);
                        $('#department_edit').data('pickup_tools', response.data.pickup_tools);

                        let id = response.data.id
                        $('.btn-delete').data('id', id);
                    }
                });
            });

            $(document).on('click', '.btn-edit', function() {
                const id = $('#department_edit').val();
                let department_id = $(this).data('department_id');
                let device_types_id = $(this).data('device_types_id');
                let number_requested = $(this).data('number_requested');
                let pickup_tools = $(this).data('pickup_tools');
                $('#detailModal').modal('hide');
                $('#modal').modal('show');
                $('#id').val(id);
                $('#department_id').val(department_id).prop('disabled', true);
                $('#device_types_id').val(device_types_id);
                $('#number_requested').val(number_requested);
                $('.pickup_tools').empty();
                $('.add-data').text('แก้ไขข้อมูล');
                $('.positions .position_list').empty(':first').remove();
                $.each(pickup_tools, function(index, item) {
                    addPosition(item)
                });
            });

            $(document).on('click', '.save-department', function() {
                var id = $('#id').val();
                if ($('#pickuptoolsForm').valid()) {
                    var formData = new FormData();
                    formData.append('_token', $('#_token').val());
                    formData.append('id', $('#id').val());
                    formData.append('department_id', $('#department_id').val());

                    var arr_order = [];
                    $('.position_list').each(function() {
                        var pickuptoolsFormData = new FormData();
                        pickuptoolsFormData.append('pickupTools_id', $(this).find(
                            '#pickupTools_id').val());
                        pickuptoolsFormData.append('device_types_id', $(this).find(
                            '#device_types_id option:selected').val());
                        pickuptoolsFormData.append('number_requested', $(this).find(
                            '#number_requested').val());
                        arr_order.push(pickuptoolsFormData);
                    });
                    arr_order.forEach(function(pickuptoolsFormData, index) {
                        for (var pair of pickuptoolsFormData.entries()) {
                            formData.append(`pickuptool[${index}][${pair[0]}]`, pair[1]);
                            // console.log(pair[0] + ', ' + pair[1]);
                        }
                    });
                    // console.log(arr_order);
                    if (!id) {
                        Swal.fire({
                            title: 'ยืนยันการเพิ่มรายการ?',
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
                                    url: "{{ route('api.v1.pickup.tools.create') }}",
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
                                            $('#department_id').val('1');
                                            $('#device_types_id').val('1');
                                            $('#number_requested').val('');
                                            $('.positions .position_list').not(':first')
                                                .remove();
                                            $('#modal').modal('hide');
                                            getPickuptoolsList();
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
                                            $('#department_id').val('1');
                                            $('#device_types_id').val('1');
                                            $('#number_requested').val('');
                                            $('.positions .position_list').not(
                                                ':first').remove();
                                            $('#modal').modal('hide');
                                            getPickuptoolsList();
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
                }
            });

            $(document).on('click', '.btn-add-position', function() {
                addPosition();
            });

            $(document).on('click', '.btn-remove-position', function() {
                removePosition($(this));
            });

            $(document).on('click', '.btn-delete', function() {
                let department_id = $(this).data('id');
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
                            url: "{{ route('api.v1.pickup.tools.delete') }}",
                            data: {
                                'department_id': department_id,
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
                                    getPickuptoolsList();
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

            function removePosition(button) {
                let device_types_id = button.siblings('.form-control').attr('data-device-types-id');
                button.closest('.position_list').remove();
            }

            function addPosition(data = null) {
                console.log(data);
                let id = '';
                let number_requested = '';
                let pickupTools_id = '';

                if (data) {
                    pickupTools_id = data.id
                    id = data.device_types_id;
                    number_requested = data.number_requested;
                }
                // console.log(id);
                $(".positions").append(`
                <div class="position_list pr-2 row">
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <input type="hidden" value="${pickupTools_id}" name="pickupTools_id" id="pickupTools_id">
                            <select class="js-example-basic-single form-select input-modal rounded-pill bg-white text-color"
                                id="device_types_id" name="device_types_name" required>

                                @foreach ($pickupToolsType as $pickupToolsTypes)
                                    @if ($pickupToolsTypes->id != null)
                                    <option value="{{ $pickupToolsTypes->id }}" ${id == '{{ $pickupToolsTypes->id }}' ? 'selected' : ''}>
                                        {{ $pickupToolsTypes->device_types_name }}
                                    </option>
                                    @endif
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3 pr-3">
                            <input type="number" class="form-control input-modal rounded-pill text-color"
                                id="number_requested" name="number_requested" data-id="${id}" value="${number_requested}" required value="1" min="1" style="height: 45px;">
                            <button class="btn rounded-pill btn-remove-position" data-id="${id}" type="button" style="position: absolute;right: -15px;top: 5px;"><em class="fas fa-times-circle text-hr-orange text-lg"></em></button>
                        </div>
                    </div>
                </div>
                `);
            }
        });
    </script>
@stop
