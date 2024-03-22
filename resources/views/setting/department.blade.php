@extends('setting_menu')
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
@section('side-card')

    <div class="card rounded-4 bg-hr-card">
        <div class="card-header border-0">
            <div class="row">
                <div class="col-6">
                    <h6><i class="fas fa-th-large"></i> แผนกและตำแหน่ง</h6>
                </div>
                <div class="col-6">
                    <select name="company_filter" id="company_filter"
                        class="js-example-basic-single form-select input-modal rounded-pill bg-white text-color company_filter"
                        style="width: 100%;">
                        <option value="-1">--บริษัท--</option>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name_th }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row mt-n4 department_list" id="department_list">

            </div>
            <button type="button" class="form-control btn btn-outline-success rounded-pill mt-3 btn-add"
                data-bs-toggle="modal" data-bs-target="#modal"><i class="fa-solid fa-plus"></i> เพิ่มข้อมูล</button>
        </div>
        <div class="card-footer bg-transparent">
            <button class="btn btn-hr-confirm form-control rounded-pill">บันทึก</button>
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
                    <form id="departmentForm">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3 pr-3 pl-3">
                            <label for="" class="col-form-label text-color"><i
                                    class="fas fa-building text-hr-orange"></i> บริษัท</label>
                            <select class="js-example-basic-single form-select input-modal rounded-pill bg-white text-color"
                                name="" id="company_id" name="company_id" required>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name_th }}</option>
                                @endforeach
                            </select>


                        </div>
                        <div class="mb-3 pr-3 pl-3">
                            <label for="department_name" class="col-form-label text-color"><i
                                    class="fas fa-sitemap text-hr-orange"></i> แผนก</label>
                            <input type="text" class="form-control input-modal rounded-pill text-color"
                                id="department_name" name="department_name" required>
                        </div>
                        <div class="mb-3 pr-3 pl-3">
                            <label for="department_name_en" class="col-form-label text-color"><i
                                    class="fas fa-sitemap text-hr-orange"></i> แผนก ภาษาอังกฤษ</label>
                            <input type="text" class="form-control input-modal rounded-pill text-color"
                                id="department_name_en" name="department_name_en" required>
                        </div>
                        <div class="mb-3 pr-3 pl-3">
                            <label for="department_img" class="col-form-label text-color"><i
                                    class="fas fa-image text-hr-orange"></i> รูปภาพสัญลักษณ์แผนก</label>
                            <div class="col-12 col-sm-12">
                                <div class="text-center">
                                    <input type="file" class="dropify" id="image_file" name="image_file" placeholder="">
                                </div>
                            </div>
                        </div>

                        <div class="pr-3 pl-3">
                            <label for="" class="col-form-label text-color"><i
                                    class="fas fa-user text-hr-orange"></i> ตำแหน่ง</label>
                            <div class="positions">
                                <div class="position_list input-group mb-3">
                                    <input type="text" class="form-control input-modal  rounded-start-pill text-color"
                                        id="position_name" name="position_name" required>
                                    <button class="btn rounded-end-pill border btn-remove-position" type="button"><em
                                            class="fas fa-times-circle text-hr-orange"></em></button>
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
            $('.select2').select2();
            $(document).on('click', '.btn-add', function() {
                $('#modal').modal('show');
                $('#company_id').val('1');
                $('#department_name').val('');
                $('#department_name_en').val('');
                $('#position_name').val('');
                $('#import-file').val('');
                $('.positions .position_list').not(':first').remove();
                $('#modal').modal('hide');
                $('#id').val('');
                $('.add-data').text('เพิ่มข้อมูล');
                $(".dropify-clear").trigger("click");
            });

            function getDepartmentList() {
                let data = {
                    "company_id": $("#company_filter").val(),
                };

                $.ajax({
                    url: "{{ route('api.v1.department.list.setting') }}",
                    data: data,
                    type: "post",
                    dataType: "json",
                    success: function(response) {
                        $(".department_list").empty();
                        $.each(response.data, function(index, departmentInfo) {

                            var id = departmentInfo.id;
                            var img_path =
                                '{{ asset('uploads/images/setting/department') }}';
                            var department_img = img_path + '/' + departmentInfo
                                .image_departments;
                            var item = `
                                    <div class="card border border-2 p-0 rounded-4 btn-detail cursor-pointer" data-id="${id}">
                                        <div class="row">
                                            <div class="col-3">
                                                <div style="width: 100%; ">
                                                    <img src="${department_img}" class="border border-0 rounded-start-4" alt="..." style="position: absolute; width: 90%; height: 100%; object-fit: cover; ">
                                                </div>
                                            </div>
                                            <div class="col-9 ">
                                            <b><h6 class="ml-2 hr-text-green mt-2">${departmentInfo.name_th}</h6></b>
                                                <p class="ml-2 text-black-50">ตำแหน่งงาน ${departmentInfo.position_count} ตำแหน่ง</p>
                                            </div>
                                        </div>
                                    </div>
                                `;
                            $(".department_list").append(item);
                        });

                    }
                });
            }

            $(document).on('click', '.btn-detail', function() {
                let id = $(this).data('id');
                $('#detailModal').modal('show');
                $.ajax({
                    type: "post",
                    url: "{{ route('api.v1.department.find.id') }}",
                    data: {
                        'id': id
                    },
                    dataType: "json",
                    success: function(response) {

                        img_url = "{{ asset('uploads/images/setting/department') }}/" + response
                            .data.image_departments;

                        $('#detail-department-name').text(response.data.name_th);
                        $('#detail-department-img').attr('src', img_url);
                        $('#detail-position_count').text(response.data.position_count);
                        $('#department_id').val(response.data.id);
                        $('#detail-department-company_id').val(response.data.company_id);
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
                                                <h6 class="text-color p-2">${item.name_th}</h6>
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

            getDepartmentList();
            $(document).on('change', '#company_filter', function() {
                getDepartmentList();
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

            // $(document).on('click', '.delete-position', function() {
            //     const id = $('.delete-position').data('position-id');
            //     if (id != null) {
            //         Swal.fire({
            //             title: 'ยืนยันการลบรายการ?',
            //             text: "ต้องการดำเนินการใช่หรือไม่!",
            //             icon: 'warning',
            //             showCancelButton: true,
            //             confirmButtonColor: '#FA9583',
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
            //                     url: "{{ route('api.v1.position.delete') }}",
            //                     data: {
            //                         'id': id,
            //                     },
            //                     dataType: "json",
            //                     success: function(response) {
            //                         if (response) {
            //                             Swal.fire({
            //                                 position: 'center-center',
            //                                 icon: 'success',
            //                                 title: 'ลบรายการสำเร็จ',
            //                                 showConfirmButton: false,
            //                                 timer: 1500
            //                             })
            //                             addPosition();
            //                         } else {
            //                             Swal.fire({
            //                                 position: 'center-center',
            //                                 icon: 'error',
            //                                 iconColor: '#FA9583',
            //                                 title: 'ลบรายการไม่สำเร็จ',
            //                                 showConfirmButton: false,
            //                                 timer: 1500
            //                             })
            //                         }
            //                     }
            //                 });
            //             }
            //         });
            //     }

            // });



        });



        function removePosition(button) {
            let position_id = button.siblings('.form-control').attr('data-position-id');
            button.closest('.position_list').remove();
        }

        function addPosition(data = null) {
            let position_id = ''
            let position_name = ''
            if (data) {
                position_id = data.id;
                position_name = data.name_th;
            }
            $(".positions").append(` <div class="position_list input-group mb-3">
                                    <input type="text" class="form-control input-modal  rounded-start-pill text-color" id="position_name" name="position_name" data-position-id="${position_id}" value="${position_name}" required>
                                    <button class="btn rounded-end-pill border btn-remove-position delete-position" data-position-id="${position_id}" type="button"><em class="fas fa-times-circle text-hr-orange"></em></button>
                                </div>`)
        }
    </script>
@stop
