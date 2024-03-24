@extends('setting_menu')
@section('side-card')
    {{-- <style>
        .modal {
            overflow: auto !important;
        }

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
            /* width: 450px; */
        }
    </style> --}}
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

    <div class="card p-3 rounded-4 bg-hr-card">
        <div class="card-header border-0 pb-0">
            <h6 class="text-bold"><i class="fas fa-cubes"></i> การเบิกอุปกรณ์</h6>
            <p class="text-bold">กำหนดสิทธิ์สำหรับการเบิกอุปกรณ์ในแต่ละแผนกก</p>
        </div>
        <div class="card-body pt-0">
            <div class="row mt-1 pickuptools_list p-2" id="pickuptools_list"></div>
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

    {{-- <div class="modal fade" id="pickuptoolsModal" tabindex="-1" aria-labelledby="pickuptoolsModalLabel" aria-hidden="true"
        data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content modal-radius">
                <div class="modal-header background2 modal-header-radius">
                    <h6 class="modal-title" id="pickuptoolsModalLabel"><i class="fa-solid fa-file-circle-plus"></i>
                        <span class="add-data">เพิ่มข้อมูล</span>
                    </h6>
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
                                    <div class="position_list input-group mb-3">
                                        <input type="number"
                                            class="form-control input-modal rounded-start-pill text-color number_requested"
                                            style="height: 45px;" required min="1">
                                        <button class="btn rounded-end-pill border" type="button"><em
                                                class="fas fa-times-circle text-hr-orange btn-removeList"></em></button>
                                    </div>
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
    </div> --}}

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
                    <form id="departmentForm">
                        <input type="hidden" name="id" id="id">
                        {{-- <div class="mb-3 pr-3 pl-3">
                            <label for="" class="col-form-label text-color"><i
                                    class="fas fa-building text-hr-orange"></i> บริษัท</label>
                            <select class="js-example-basic-single form-select input-modal rounded-pill bg-white text-color"
                                name="" id="company_id" name="company_id" required>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name_th }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="mb-3 pr-3 pl-3">
                            <label for="department_name" class="col-form-label text-color"><i
                                    class="fas fa-sitemap text-hr-orange"></i> แผนก</label>
                            <input type="text" class="form-control input-modal rounded-pill text-color"
                                id="department_name" name="department_name" required>
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
                            <div class="position_list row">
                                <div class="col-6">
                                    <div class=" input-group mb-3">
                                        <input type="text" class="form-control input-modal  rounded-pill text-color"
                                            id="device_types_id" name="device_types_id" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class=" input-group mb-3">
                                        <input type="text"
                                            class="form-control input-modal  rounded-start-pill text-color"
                                            id="number_requested" name="number_requested" required>
                                        <button class="btn rounded-end-pill border btn-remove-position" type="button"><em
                                                class="fas fa-times-circle text-hr-orange"></em></button>
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
                        ข้อมูลแผนกและตำแหน่ง
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
                                <span class="btn-delete" id="department_id"><i
                                        class="fas fa-trash-alt cursor-pointer hr-icon mr-2 mt-1"></i></span>
                            </p>
                        </div>
                    </div>
                    <p class="text-black-50 mt-1">ตำแหน่งงาน <span id="detail-position_count">0</span> ตำแหน่ง</p>
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

    {{-- <div class="modal fade" id="pickuptoolsDetailModal" tabindex="-1" aria-labelledby="pickuptoolsDetailModalLabel"
        aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content modal-radius">
                <div class="modal-header background2 modal-header-radius">
                    <h6 class="modal-title">ข้อมูลสิทธิ์การเบิกอุปกรณ์</h6>
                    <button type="button" class="btn-close btn-reset" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="header px-3">
                        <div class="row pl-2 detail-department" id="detail-department">
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
    </div> --}}

    {{-- <div class="modal fade" id="pickuptoolsEditModal" tabindex="-1" aria-labelledby="pickuptoolsEditModalLabel"
        aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content modal-radius">
                <div class="modal-header background2 modal-header-radius">
                    <h6 class="modal-title" id="pickuptoolsEditModalLabel"><i class="fa-solid fa-file-circle-plus"></i>
                        แก้ไขข้อมูล</h6>
                </div>
                <div class="modal-body">
                    <form id="pickuptoolsEditForm">
                        <input type="hidden" name="id" id="id">
                        <div class="added-pickuptools">
                            <div class="row mt-3 list-editpickuptools list_pickuptoolsByid" id="list_pickuptoolsByid">
                            </div>
                        </div>
                    </form>
                    <div class="button-addEditList pl-2 pr-2">
                        <button type="button"
                            class="form-control btn btn-outline-success rounded-pill mt-3 btn-addEditList"><i
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
                            <button class="btn btn-hr-confirm form-control rounded-pill save-update">บันทึก</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

@stop
@section('js')
    <script>
        $(() => {

            $('.select2').select2();
            $(document).on('click', '.btn-add', function() {
                $('#modal').modal('show');
                $('#company_id').val('1');
                $('#department_name').val('');
                $('#department_name_en').val('');
                $('#position_name').val('');
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
                            var id = info.position_id;
                            var img_path =
                                '{{ asset('uploads/images/setting/department') }}';
                            var image_departments = img_path + '/' + info
                                .image_departments;
                            var item = `
                                    <div class="card border border-2 p-0 rounded-4 btn-detail cursor-pointer" data-id="${id}">
                                        <div class="row">
                                            <div class="col-3">
                                                <div style="width: 100%; ">
                                                    <img src="${image_departments}" class="border border-0 rounded-start-4" alt="..." style="position: absolute; width: 90%; height: 100%; object-fit: cover; ">
                                                </div>
                                            </div>
                                            <div class="col-9 ">
                                            <b><h6 class="ml-2 hr-text-green mt-2">${info.position_name}</h6></b>
                                                <p class="ml-2 text-black-50">สิทธิ์การเบิก ${info.count} รายการ</p>
                                            </div>
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
                $('#detailModal').modal('show');
                $.ajax({
                    type: "post",
                    url: "{{ route('api.v1.pickup.tools.show.detail.by.id') }}",
                    data: {
                        'id': id
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        img_url = "{{ asset('uploads/images/setting/department') }}/" + response
                            .data.department.image_departments;

                        $('#detail-department-name').text(response.data.name_th);
                        $('#detail-department-img').attr('src', img_url);
                        $('#detail-position_count').text(response.data.pickupTools_count);
                        $('#department_id').val(response.data.department.id);
                        $("#position_detail").empty();
                        $.each(response.data.position, function(index, item) {
                            var item = `
                                <div class="card card-content border-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-2">
                                                <i class="fas fa-user text-color" style="font-size: 40px;"></i>
                                            </div>
                                            <div class="col-10">
                                                <h6 class="text-color p-2">${item.department.name_th}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                `;
                            $("#position_detail").append(item);
                        });

                        $('#department_edit').val(response.data.id);
                        $('#department_edit').data('name', response.data.name_th);
                        $('#department_edit').data('name_en', response.data.name_en);
                        $('#department_edit').data('company_id', response.data.company_id);
                        $('#department_edit').data('security_img_url', img_url);
                        $('#department_edit').data('image_departments', response.data
                            .image_departments);
                        $('#department_edit').data('position', response.data.position);
                    }
                });
            });

            $(document).on('click', '.btn-edit', function() {
                const id = $('#department_edit').val();
                var name = $(this).data('name');
                var company_id = $(this).data('company_id');
                var name_en = $(this).data('name_en');
                var security_img_url = $(this).data('security_img_url');
                var image_departments = $(this).data('image_departments');
                var position = $(this).data('position');
                $('#detailModal').modal('hide');
                $('#modal').modal('show');
                $('#id').val(id);
                $('#department_name').val(name);
                $('#company_id').val(company_id);
                $('#department_name_en').val(name_en);
                $("#image_file").attr("data-default-file", security_img_url); //dropify
                // $('#image_file').prop('required',false);
                $('.dropify-render').html('<img src="" />');
                $('.dropify-render img').attr('src', security_img_url);
                $('.dropify-preview').css('display', 'block');
                $('.dropify-filename-inner').text(image_departments);
                $('.positions').empty();
                $('.add-data').text('แก้ไขข้อมูล');
                $.each(position, function(index, item) {
                    addPosition(item)
                });
            });

            $(document).on('click', '.save-department', function() {
                var id = $('#id').val();
                if ($('#departmentForm').valid()) {
                    var formData = new FormData();
                    formData.append('_token', $('#_token').val());
                    formData.append('id', $('#id').val());
                    formData.append('company_id', $('#company_id').val());
                    formData.append('name_th', $('#department_name').val());
                    formData.append('name_en', $('#department_name_en').val());
                    if (document.getElementById("image_file").files.length != 0) {
                        formData.append('image_departments', $('#image_file').prop('files')[0]);
                    }
                    var arr_order = [];
                    $('.position_list').each(function() {
                        var positionFormData = new FormData();
                        positionFormData.append('name_th', $(this).find('#position_name').val());
                        positionFormData.append('position_id', $(this).find('#position_name').data(
                            'position-id'));
                        positionFormData.append('name_en', '-');
                        arr_order.push(positionFormData);
                    });
                    arr_order.forEach(function(positionFormData, index) {
                        for (var pair of positionFormData.entries()) {
                            formData.append(`positions[${index}][${pair[0]}]`, pair[1]);
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
                                    url: "{{ route('api.v1.department.and.position.create') }}",
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
                                            $('#department_name').val('');
                                            $('#department_name_en').val('');
                                            $('#image_file').val('');
                                            $('.positions .position_list').not(':first')
                                                .remove();
                                            $('#position_name').val('');
                                            $('#company_id').val($(
                                                    "#company_id option:first")
                                                .val());
                                            $(".dropify-clear").trigger("click");
                                            $('#modal').modal('hide');
                                            getDepartmentList();
                                        } else if (response.duplicate == 'duplicate') {
                                            Swal.fire({
                                                position: 'center-center',
                                                icon: 'error',
                                                title: 'เพิ่มรายการไม่สำเร็จ',
                                                text: 'รายการแผนกซ้ำ',
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
                                    url: "{{ route('api.v1.department.and.position.update') }}",
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
                                            $('#department_name').val('');
                                            $('#department_name_en').val('');
                                            $('#image_file').val('');
                                            $('.positions .position_list').not(':first')
                                                .remove();
                                            $('#position_name').val('');
                                            $('#company_id').val($(
                                                    "#company_id option:first")
                                                .val());
                                            $(".dropify-clear").trigger("click");
                                            $('#modal').modal('hide');
                                            getDepartmentList();
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

            $(document).on('click', '.btn-add-position', function() {
                addPosition();
            });

            $(document).on('click', '.btn-remove-position', function() {
                removePosition($(this));
            });

            $(document).on('click', '.btn-delete', function() {
                const id = $('#department_id').val();
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
                            url: "{{ route('api.v1.department.update') }}",
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
                                    getDepartmentList();
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

            // getPickuptoolsCategory();

            // function getPickuptoolsCategory() {
            //     const listPickuptools = document.getElementById('list_pickuptools');
            //     listPickuptools.innerHTML = '';
            //     $.ajax({
            //         type: 'post',
            //         url: "{{ route('api.v1.pickup.tools.all.list') }}",
            //         dataType: "json",
            //         success: function(response) {
            //             // console.log(response);
            //             var pickuptoolsContainer = $(".list_pickuptools");
            //             response.forEach(function(pickuptoolsInfo) {
            //                 var department_id = pickuptoolsInfo.department_id;
            //                 var departmentName = pickuptoolsInfo.department_name;
            //                 var imageDepartments = pickuptoolsInfo.image_departments;
            //                 var departmentCount = pickuptoolsInfo.department_count;
            //                 var Item = `
        //                     <div class="content p-2">
        //                         <div class="button-details p-0 w-100 mb-3 cursor-pointer" style="height: 120px;" data-department_id="${department_id}">
        //                             <span class="button-image w-40" style="background-image: url(${imageDepartments});"></span>
        //                             <span class="button-text w-100 pt-3">
        //                             <h6 class="text-bold mb-0 mr-2">${departmentName}</h6>
        //                             <p class="text-bold mb-0" style="color: #d4d4d4;">สิทธิ์การเบิก ${departmentCount} รายการ</p>
        //                         </span>
        //                     </div>
        //                 </div>
        //                 `;
            //                 pickuptoolsContainer.append(Item);
            //             });
            //         },
            //     });
            // }

            // $(document).on('click', '.btn-add', function() {
            //     pickuptools_modal.modal('show')
            // })

            // var pickuptools_modal = $("#pickuptoolsModal");
            // var pickuptoolsDetail_modal = $("#pickuptoolsDetailModal");
            // var pickuptoolsEdit_modal = $("#pickuptoolsEditModal");

            // $(document).on('click', '.btn-reset', function() {
            //     $('#pickuptoolsForm')[0].reset();
            //     addedContainers.forEach(container => {
            //         container.parentNode.removeChild(container);
            //     });
            //     addedContainers = [];
            // });

            // var departmentId = $('#department_id');
            // $.ajax({
            //     url: '{{ route('api.v1.department.list') }}',
            //     type: 'post',
            //     dataType: 'json',
            //     success: function(data) {
            //         // console.log(data);
            //         data.forEach(function(item) {
            //             departmentId.append(
            //                 `<option value="${item.id}">${item.name_th}</option>`);
            //         });
            //     }
            // });

            // var deviceTypesId = $('.device_types_id');
            // var deviceTypesLength = 0;
            // var listType = [];

            // $.ajax({
            //     url: '{{ route('api.v1.device.types.list') }}',
            //     type: 'post',
            //     dataType: 'json',
            //     success: function(data) {
            //         var datalength = data.length;
            //         deviceTypesLength = datalength;

            //         data.forEach(function(item) {
            //             deviceTypesId.append(
            //                 `<option value="${item.id}">${item.device_types_name}</option>`
            //             );

            //             // Add device type data to listType
            //             listType.push({
            //                 id: item.id,
            //                 device_types_name: item.device_types_name
            //             });
            //         });
            //     }
            // });


            // let addedContainers = [];
            // $(document).on('click', '.btn-addList', function() {
            //     // console.log(deviceTypesLength);
            //     const pickuptoolsContainer = document.querySelectorAll('.list-pickuptools');
            //     if (pickuptoolsContainer.length < deviceTypesLength) {
            //         const newPickuptoolsContainer = pickuptoolsContainer[0].cloneNode(true);

            //         const inputs = newPickuptoolsContainer.querySelectorAll('input');
            //         inputs.forEach(input => {
            //             input.value = '';
            //         });
            //         const inputFields = newPickuptoolsContainer.querySelectorAll('input[type="text"]');
            //         inputFields.forEach(function(input) {
            //             input.value = '';
            //         });
            //         pickuptoolsContainer[0].parentNode.appendChild(newPickuptoolsContainer);

            //         // เพิ่มอ้างอิงของส่วนที่ถูกเพิ่มลงใน addedContainers
            //         addedContainers.push(newPickuptoolsContainer);
            //     } else {
            //         Swal.fire({
            //             position: 'center-center',
            //             title: 'ไม่สามารถเพิ่มได้',
            //             text: "คุณได้เพิ่มถึงสูงสุดแล้ว",
            //             icon: 'warning',
            //             showCancelButton: false,
            //             confirmButtonColor: '#FA9583',
            //             cancelButtonColor: 'transparent',
            //             customClass: {
            //                 confirmButton: 'rounded-pill',
            //                 cancelButton: 'text-hr-green rounded-pill',
            //                 popup: 'modal-radius'
            //             }
            //         });
            //     }
            // });

            // $(document).on('click', '.btn-addEditList', function() {
            //     const pickuptoolsContainer = document.querySelectorAll('.list-editpickuptools');
            //     if (pickuptoolsContainer.length < deviceTypesLength) {
            //         const newPickuptoolsContainer = pickuptoolsContainer[0].cloneNode(true);

            //         const inputs = newPickuptoolsContainer.querySelectorAll('input');
            //         inputs.forEach(input => {
            //             input.value = '';
            //         });
            //         const inputFields = newPickuptoolsContainer.querySelectorAll('input[type="text"]');
            //         inputFields.forEach(function(input) {
            //             input.value = '';
            //         });
            //         pickuptoolsContainer[0].parentNode.appendChild(newPickuptoolsContainer);

            //         // เพิ่มอ้างอิงของส่วนที่ถูกเพิ่มลงใน addedContainers
            //         addedContainers.push(newPickuptoolsContainer);
            //     } else {
            //         Swal.fire({
            //             position: 'center-center',
            //             title: 'ไม่สามารถเพิ่มได้',
            //             text: "คุณได้เพิ่มถึงสูงสุดแล้ว",
            //             icon: 'warning',
            //             showCancelButton: false,
            //             confirmButtonColor: '#FA9583',
            //             cancelButtonColor: 'transparent',
            //             customClass: {
            //                 confirmButton: 'rounded-pill',
            //                 cancelButton: 'text-hr-green rounded-pill',
            //                 popup: 'modal-radius'
            //             }
            //         });
            //     }
            // });

            // $(document).on('click', '.btn-removeList', function() {
            //     if (addedContainers.length > 0) {
            //         const removedContainer = addedContainers.pop();
            //         removedContainer.parentNode.removeChild(removedContainer);
            //     } else {
            //         Swal.fire({
            //             position: 'center-center',
            //             title: 'ไม่สามารถลบได้ !!',
            //             icon: 'warning',
            //             showCancelButton: false,
            //             confirmButtonColor: '#FA9583',
            //             cancelButtonColor: 'transparent',
            //             customClass: {
            //                 confirmButton: 'rounded-pill',
            //                 cancelButton: 'text-hr-green rounded-pill',
            //                 popup: 'modal-radius'
            //             }
            //         });
            //     }
            // });

            // Display Details
            // var detailDepartment = $('#detail-department');
            // var showDetail = $('#list_pickuptoolsDetail');
            // $(document).on('click', '.button-details', function() {
            //     pickuptoolsDetail_modal.modal('show')

            //     var department_id = $(this).data('department_id');
            //     detailDepartment.empty();
            //     showDetail.empty();

            //     var ajax1 = $.ajax({
            //         url: '{{ route('api.v1.detail.department.by.id') }}',
            //         type: 'post',
            //         data: {
            //             'department_id': department_id
            //         },
            //         dataType: 'json'
            //     });

            //     var ajax2 = $.ajax({
            //         url: '{{ route('api.v1.pickup.tools.show.detail.by.id') }}',
            //         type: 'post',
            //         data: {
            //             'department_id': department_id
            //         },
            //         dataType: 'json'
            //     });

            //     $.when(ajax1, ajax2).done(function(data1, data2) {
            //         var departmentData = data1[0][0];
            //         var toolsData = data2[0];

            //         detailDepartment.html(`
        //             <div class="col-12 icons d-flex justify-content-end">
        //                 <i class="fas fa-edit mr-2 text-color btn-edit cursor-pointer" data-department_id="${departmentData.department_id}"></i>
        //                 <i class="fas fa-trash-alt btn-delete cursor-pointer" style="color: #FA9583;" data-department_id="${departmentData.department_id}"></i>
        //             </div>
        //             <div class="col-12 pl-0 d-flex align-items-center">
        //                 <img src="${departmentData.image_departments}" alt="Generic placeholder image" class="img-fluid rounded-circle" style="width: 40px; height: 40px;">
        //                 <p class="ml-2 mb-0 text-bold text-color">${departmentData.department_name}</p>
        //             </div>
        //             <div class="text-header pt-2 pl-0">
        //                 <p class="mb-0" style="color: #c7c8c8;">สิทธิ์การเบิกอุปกรณ์ ${departmentData.department_count} รายการ (ต่อปี)</p>
        //             </div>
        //         `);

            //         toolsData.forEach(function(item) {

            //             showDetail.append(`
        //                 <div class="card card-content border-0 mt-3">
        //                     <div class="card-body">
        //                         <div class="row">
        //                             <div class="col-2">
        //                                 <i class="fas fa-cubes text-color" style="font-size: 40px;"></i>
        //                             </div>
        //                             <div class="col-7">
        //                                 <p class="text-color p-2">${item.device_types_name}</p>
        //                             </div>
        //                             <div class="col-3 d-flex align-items-center justify-content-end">
        //                                 <p class="text-color py-2">${item.number_requested} ${item.unit}</p>
        //                             </div>
        //                         </div>
        //                     </div>
        //                 </div>
        //             `);
            //         });
            //     });
            // });

            // $(document).on('click', '.save-pickuptools', function() {
            //     let pickuptoolsForm = $("#pickuptoolsForm");
            //     let department_id = $('#department_id').val();
            //     let device_types_id = $('#device_types_id').val();
            //     // var id = $('#id').val();
            //     var arr_order = [];
            //     $('.list-pickuptools').each(function() {
            //         var device_types_id = $(this).find('.device_types_id').val();
            //         var number_requested = $(this).find('.number_requested').val();

            //         arr_order.push({
            //             device_types_id: device_types_id,
            //             number_requested: number_requested
            //         });
            //     });
            //     if (department_id !== "เลือกแผนก" && device_types_id !== "เลือกอุปกรณ์" && pickuptoolsForm
            //         .valid()) {

            //         // if (!id) {
            //         Swal.fire({
            //             title: 'เพิ่มข้อมูล ?',
            //             text: "ต้องการดำเนินการใช่หรือไม่!",
            //             icon: 'warning',
            //             showCancelButton: true,
            //             confirmButtonColor: '#136E68',
            //             cancelButtonColor: 'transparent',
            //             confirmButtonText: 'ยืนยัน',
            //             cancelButtonText: 'ปิด',
            //             customClass: {
            //                 confirmButton: 'rounded-pill',
            //                 cancelButton: 'text-hr-green rounded-pill',
            //                 popup: 'modal-radius'
            //             }
            //         }).then((result) => {
            //             if (result.isConfirmed) {
            //                 $.ajax({
            //                     type: "post",
            //                     url: '{{ route('api.v1.pickup.tools.create') }}',
            //                     data: {
            //                         department_id: $('#department_id').val(),
            //                         arr_order: arr_order
            //                     },
            //                     dataType: "json",
            //                     success: function(response) {
            //                         if (response.status == 'success') {
            //                             Swal.fire({
            //                                 position: 'center-center',
            //                                 icon: 'success',
            //                                 title: 'เพิ่มข้อมูลสำเร็จ',
            //                                 showConfirmButton: false,
            //                                 timer: 1500
            //                             })
            //                             pickuptools_modal.modal('hide');
            //                             getPickuptoolsCategory();
            //                             $('#pickuptoolsForm')[0].reset();
            //                             addedContainers.forEach(container => {
            //                                 container.parentNode
            //                                     .removeChild(
            //                                         container);
            //                             });
            //                             addedContainers = [];
            //                         }
            //                     }
            //                 });
            //             }
            //         });
            //         // } else {
            //         //     Swal.fire({
            //         //         title: 'ยืนยันการแก้ไขรายการ?',
            //         //         text: "ต้องการดำเนินการใช่หรือไม่!",
            //         //         icon: 'warning',
            //         //         showCancelButton: true,
            //         //         confirmButtonColor: '#136E68',
            //         //         cancelButtonColor: 'transparent',
            //         //         confirmButtonText: 'ยืนยัน',
            //         //         cancelButtonText: 'ปิด',
            //         //         customClass: {
            //         //             confirmButton: 'rounded-pill',
            //         //             cancelButton: 'text-hr-green rounded-pill',
            //         //             popup: 'modal-radius'
            //         //         }
            //         //     }).then((result) => {
            //         //         if (result.isConfirmed) {
            //         //             $.ajax({
            //         //                 type: "post",
            //         //                 url: "{{ route('api.v1.reward.update') }}",
            //         //                 data: formData,
            //         //                 contentType: false,
            //         //                 processData: false,
            //         //                 cache: false,
            //         //                 success: function(response) {
            //         //                     if (response.status == 'success') {
            //         //                         Swal.fire({
            //         //                             position: 'center-center',
            //         //                             icon: 'success',
            //         //                             title: 'แก้ไขรายการสำเร็จ',
            //         //                             showConfirmButton: false,
            //         //                             timer: 1500
            //         //                         })
            //         //                         pickuptools_modal.modal('hide');
            //         //                         getPickuptoolsCategory();
            //         //                         $('#pickuptoolsForm')[0].reset();
            //         //                         addedContainers.forEach(container => {
            //         //                             container.parentNode
            //         //                                 .removeChild(
            //         //                                     container);
            //         //                         });
            //         //                         addedContainers = [];
            //         //                     }
            //         //                 }
            //         //             });
            //         //         }
            //         //     });
            //         // }
            //     } else {
            //         Swal.fire({
            //             title: 'กรอกข้อมูลให้ครบ!!',
            //             icon: 'error',
            //             showCancelButton: false,
            //             confirmButtonColor: '#136E68',
            //             confirmButtonText: 'ยืนยัน',
            //             customClass: {
            //                 confirmButton: 'rounded-pill',
            //                 popup: 'modal-radius'
            //             }
            //         });

            //     }
            // })

            // $(document).on('click', '.btn-delete', function() {
            //     let obj = $(this);
            //     let department_id = obj.data('department_id');
            //     console.log(department_id);
            //     Swal.fire({
            //         title: 'ยืนยัน!! ลบข้อมูล',
            //         text: "ต้องการดำเนินการใช่หรือไม่!",
            //         icon: 'warning',
            //         showCancelButton: true,
            //         confirmButtonColor: '#FA9583',
            //         cancelButtonColor: 'transparent',
            //         confirmButtonText: 'ยืนยัน',
            //         cancelButtonText: 'ปิด',
            //         customClass: {
            //             confirmButton: 'rounded-pill',
            //             cancelButton: 'text-hr-green rounded-pill',
            //             popup: 'modal-radius'
            //         }
            //     }).then((result) => {
            //         if (result.isConfirmed) {
            //             $.ajax({
            //                 type: 'post',
            //                 url: "{{ route('api.v1.pickup.tools.deleteCondition') }}",
            //                 data: {
            //                     'department_id': department_id
            //                 },
            //                 dataType: "json",
            //                 success: function(response) {
            //                     if (response) {
            //                         Swal.fire({
            //                             position: 'center-center',
            //                             icon: 'success',
            //                             title: 'ลบรายการสำเร็จ',
            //                             showConfirmButton: false,
            //                             timer: 1500
            //                         })
            //                         pickuptoolsDetail_modal.modal('hide');
            //                         getPickuptoolsCategory();
            //                     } else {
            //                         Swal.fire({
            //                             position: 'center-center',
            //                             icon: 'error',
            //                             iconColor: '#FA9583',
            //                             title: 'ลบรายการไม่สำเร็จ',
            //                             showConfirmButton: false,
            //                             timer: 1500
            //                         })
            //                     }
            //                 }
            //             });

            //         }
            //     })
            // })

            // $(document).on('click', '.btn-edit', function() {
            //     pickuptoolsDetail_modal.modal('hide');
            //     pickuptoolsEdit_modal.modal('show');
            //     $('.add-data').text('แก้ไขข้อมูล');
            //     var department_id = $(this).data('department_id');
            //     $('.save-update').data('department_id', department_id);
            //     var list_pickuptoolsByid = $('#list_pickuptoolsByid');

            //     addedContainers = [];
            //     $.ajax({
            //         url: "{{ route('api.v1.pickup.tools.show.detail.by.id') }}",
            //         type: 'post',
            //         data: {
            //             'department_id': department_id
            //         },
            //         success: function(data) {
            //             // console.log(data);
            //             data.forEach(function(item) {
            //                 // console.log(item.id);
            //                 var device_types_id = item.device_types_id
            //                 var device_types_name = item.device_types_name
            //                 var number_requested = item.number_requested
            //                 // console.log(device_types_id);
            //                 list_pickuptoolsByid.append(`

        //                     <div class="col-6 pl-3">
        //                         <label for="device_types_id" class="col-form-label text-color"><i
        //                                 class="fas fa-newspaper text-sm"></i> อุปกรณ์ที่เบิกได้</label>
        //                         <select class="form-select input-modal rounded-pill bg-white text-color device_types_id"
        //                             name="device_types_id" id="device_types_id" required>
        //                             <option value="${item.device_types_id}">${item.device_types_name}</option>
        //                         </select>
        //                     </div>
        //                     <div class="col-6 pr-3">
        //                         <label for="number_requested" class="col-form-label text-color"><i
        //                                 class="fas fa-newspaper text-sm"></i> จำนวน (หน่วย) / ปี</label>
        //                         <div class="position_list input-group mb-3">
        //                             <input type="number"
        //                                 class="form-control input-modal rounded-start-pill text-color number_requested"
        //                                 style="height: 45px;" value="${item.number_requested}" required min="1">
        //                             <button class="btn rounded-end-pill border btn-deleteList" type="button"><em
        //                                     class="fas fa-times-circle text-hr-orange" data-id="${item.id}" data-device_types_id="${item.device_types_id}"></em></button>
        //                         </div>
        //                     </div>
        //                 `);
            //             });
            //         }
            //     });
            // });

            // $(document).on('click', '.save-update', function() {
            //     let pickuptoolsEditForm = $("#pickuptoolsEditForm");

            //     var department_id = $(this).data('department_id');
            //     let device_types_id = $('#device_types_id').val();
            //     var id = $('#id').val();
            //     var arr_order = [];
            //     $('.list-editpickuptools').each(function() {
            //         var device_types_id = $(this).find('.device_types_id').val();
            //         var number_requested = $(this).find('.number_requested').val();

            //         arr_order.push({
            //             device_types_id: device_types_id,
            //             number_requested: number_requested
            //         });
            //     });
            //     // console.log(department_id);
            //     Swal.fire({
            //         title: 'ยืนยันการแก้ไขรายการ?',
            //         text: "ต้องการดำเนินการใช่หรือไม่!",
            //         icon: 'warning',
            //         showCancelButton: true,
            //         confirmButtonColor: '#136E68',
            //         cancelButtonColor: 'transparent',
            //         confirmButtonText: 'ยืนยัน',
            //         cancelButtonText: 'ปิด',
            //         customClass: {
            //             confirmButton: 'rounded-pill',
            //             cancelButton: 'text-hr-green rounded-pill',
            //             popup: 'modal-radius'
            //         }
            //     }).then((result) => {
            //         if (result.isConfirmed) {
            //             $.ajax({
            //                 type: "post",
            //                 url: "{{ route('api.v1.reward.update') }}",
            //                 data: {
            //                     department_id: department_id,
            //                     arr_order: arr_order
            //                 },
            //                 contentType: false,
            //                 processData: false,
            //                 cache: false,
            //                 success: function(response) {
            //                     // console.log(response);
            //                     if (response.status == 'success') {
            //                         Swal.fire({
            //                             position: 'center-center',
            //                             icon: 'success',
            //                             title: 'แก้ไขรายการสำเร็จ',
            //                             showConfirmButton: false,
            //                             timer: 1500
            //                         })
            //                         pickuptools_modal.modal('hide');
            //                         getPickuptoolsCategory();
            //                         $('#pickuptoolsEditForm')[0].reset();
            //                         addedContainers.forEach(container => {
            //                             container.parentNode
            //                                 .removeChild(
            //                                     container);
            //                         });
            //                         addedContainers = [];
            //                     }
            //                 }
            //             });
            //         }
            //     });
            // })



        });
    </script>
@stop
