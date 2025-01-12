@extends('setting_menu')
<style>
    .btn-danger {
        color: #fff !important;
        border-color: #FA9583 !important;
        background-color: #FA9583 !important;
        padding: 0.75rem !important;
    }

    .btn-danger:hover {
        color: #FA9583 !important;
        background-color: #fff !important;
        border-color: #FA9583 !important;
    }

    .btn-success {
        color: #fff !important;
        border-color: #77c6c5 !important;
        background-color: #77c6c5 !important;
        padding: 0.75rem !important;
    }

    .btn-success:hover {
        color: #77c6c5 !important;
        background-color: #fff !important;
        border-color: #77c6c5 !important;
    }

    div {
        color: #136E68;
    }

    .modal-body i {
        color: #FA9583;
        font-size: 1.2rem;
        margin: 0.5rem;
    }

    .form-control {
        /* background-color: #fff !important; */
        color: #136E68 !important;
        border-color: #c0e7e7 !important;
        /* height: 45px !important; */
    }

    .addNews {
        background-color: #EDF5F4 !important;
    }

    .btn-outline-successful {
        border-color: none !important;
        color: #136E68 !important;
    }

    .btn-outline-successful:hover {
        border-color: #136E68 !important;
        color: #fff !important;
        background-color: #136E68 !important;
    }

    input {
        background-color: #fff !important;
    }
</style>

@section('side-card')
    <div class="card rounded-4 bg-hr-card">
        <div class="card-header border-0">
            <h6><i class="fa-solid fa-file-circle-plus"></i> เพิ่มบริษัท</h6>
        </div>
        <div class="card-body pt-0">
            <div class="row list_company" id="list_company"></div>
            <div class="button p-2 mt-2">
                <button type="button" class="form-control btn btn-outline-success rounded-pill add-company" id="add-company"
                    data-bs-toggle="modal" data-bs-target="#companyModal" style="width: 100%; "><i
                        class="fa-solid fa-plus"></i> สร้างรายการใหม่</button>
            </div>
        </div>
    </div>

    {{-- modal --}}
    <div class="modal fade" id="companyModal" tabindex="-1" aria-labelledby="companyModalLabel" aria-hidden="true"
        data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content modal-radius">
                <div class="modal-header bg-hr-green-app modal-header-radius">
                    <h5 class="modal-title text-white" id="exampleModalLabel"><i class="fa-solid fa-file-circle-plus"></i>
                        เพิ่มบริษัท</h5>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                <div class="modal-body">
                    <form id ="company_FromModal">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3">
                            <label for="name_th" class="col-form-label"><i class="fa-solid fa-file-signature"></i>
                                ชื่อบริษัท (TH)</label>
                            <input type="text" class="form-control rounded-pill" id="name_th" name="name_th" required>
                        </div>
                        <div class="mb-3">
                            <label for="name_en" class="col-form-label"><i class="fa-solid fa-file-signature"></i>
                                ชื่อบริษัท(EN)</label>
                            <input type="text" class="form-control rounded-pill" id="name_en" name="name_en" required>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <label for="short_name" class="col-form-label"><i class="fa-solid fa-signature"></i>
                                        ชื่อย่อบริษัท</label>
                                    <input class="form-control rounded-pill" id="short_name" name="short_name"
                                        required></input>
                                </div>
                                <div class="col-6">
                                    <label for="order_prefix" class="col-form-label"><i class="fa-solid fa-signature"></i>
                                        อักษรย่อบริษัท</label>
                                    <input class="form-control rounded-pill" id="order_prefix" name="order_prefix"
                                        required></input>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="address_th" class="col-form-label"><i class="fa-solid fa-location-dot"></i>
                                ที่อยู่
                                (TH)</label>
                            <textarea class="form-control rounded-3" id="address_th" name="address_th" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="address_en" class="col-form-label"><i class="fa-solid fa-location-dot"></i>
                                ที่อยู่
                                (EN)</label>
                            <textarea class="form-control rounded-3" id="address_en" name="address_en" required></textarea>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <label for="contact_number" class="col-form-label"><i class="fa-solid fa-phone"></i>
                                        เบอร์ติดต่อ</label>
                                    <input class="form-control rounded-pill" id="contact_number" name="contact_number"
                                        required></input>
                                </div>
                                <div class="col-6">
                                    <label for="email" class="col-form-label"><i class="fa-solid fa-at"></i>
                                        อีเมล</label>
                                    <input class="form-control rounded-pill" id="email" name="email" type="email"
                                        required></input>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="website" class="col-form-label"><i class="fa-solid fa-globe"></i>
                                เว็ปไซต์</label>
                            <input class="form-control rounded-pill" id="website" name="website" required></input>
                        </div>
                        <div class="mb-3 pr-3 pl-3">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <label for="company_logo" class="col-form-label text-color"><i
                                            class="fas fa-image hr-icon"></i> โลโก้บริษัท</label>
                                    <input type="file" class="dropify" id="company_logo" name="company_logo"
                                        placeholder="">
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="row p-4 ">
                    <div class="row">
                        <button type="button" class="btn btn-outline-successful rounded-pill col-5 mx-auto p-2"
                            data-bs-dismiss="modal">ยกเลิก</button>
                        <button type="button" class="btn btn-danger rounded-pill save-company col-5 mx-auto p-2"
                            id="save-company">ยืนยัน</button>
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
            getCompany();

            function getCompany() {
                let id = "{{ Auth::user()->id }}";
                const listCompany = document.getElementById('list_company');
                listCompany.innerHTML = '';
                $.ajax({
                    type: "POST",
                    url: "{{ route('api.v1.companies.getList') }}",
                    data: {
                        'id': id,
                    },
                    datatype: "JSON",
                    success: function(response) {
                        // console.log(response);
                        var companyContainer = $('.list_company');
                        response.forEach(function(company) {
                            var company_id = company.id;
                            var name_th = company.name_th;
                            // var name_en = company.name_en;
                            // var short_name = company.short_name;
                            // var address_th = company.address_th;
                            // var address_en = company.address_en;
                            // var contact_number = company.contact_number;
                            // var website = company.website;
                            // var email = company.email;
                            // var order_prefix = company.order_prefix;
                            // var logo = company.administ_name;
                            // console.log(response);
                            var Item = `
                            <div class="test pt-2 mb-1">
                                <div class="row">
                                    <div class="col-12 d-flex">
                                        <div class="input-group">
                                            <input type="text" class="form-control rounded-pill text-sm" disabled>
                                            <label class="position-main pt-2">${name_th}</label>
                                        </div>

                                        <button class="btn btn-sm btn-success rounded-pill btn-edit mx-1" 
                                             data-id="${company_id}"
                                            data-ac="edit" data-bs-toggle="modal" data-bs-target="#companyModal">
                                            <em class="fas fa-edit fs-5"></em>
                                        </button>

                                        <button class="btn btn-danger btn-sm rounded-pill btn-delete" 
                                             data-id="${company_id}">
                                            <em class="fas fa-trash-alt fs-5"></em>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        `;
                            companyContainer.append(Item);
                        });
                    },
                });
            }

            var company_model = $('#companyModal');
            $(document).on('click', '.add-company', function() {
                company_model.modal('show')
                $('#id').val('');
                $('#logo').val("");
                $('#company_logo').val("");
                $(".dropify-clear").trigger("click");
            })

            ////// save company //////
            $(document).on('click', '.save-company', function() {
                var id = $('#id').val();
                if ($('#company_FromModal').valid()) {
                    var formData = new FormData();
                    formData.append('_token', $('#_token').val());
                    formData.append('id', $('#id').val());
                    formData.append('name_th', $('#name_th').val());
                    formData.append('name_en', $('#name_en').val());
                    formData.append('short_name', $('#short_name').val());
                    formData.append('order_prefix', $('#order_prefix').val());
                    formData.append('address_th', $('#address_th').val());
                    formData.append('address_en', $('#address_en').val());
                    formData.append('contact_number', $('#contact_number').val());
                    formData.append('email', $('#email').val());
                    formData.append('website', $('#website').val());
                    if (document.getElementById("company_logo").files.length != 0) {
                        formData.append('logo', $('#company_logo').prop('files')[0]);
                    }
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
                                    url: "{{ route('api.v1.companies.create') }}",
                                    data: formData,
                                    contentType: false,
                                    processData: false,
                                    cache: false,
                                    success: function(response) {
                                        if (response.data.status == 'Success') {
                                            Swal.fire({
                                                position: 'center-center',
                                                icon: 'success',
                                                title: 'เพิ่มรายการสำเร็จ',
                                                showConfirmButton: false,
                                                timer: 1500
                                            })
                                            let obj = $(this);
                                            obj.find('#name_th').val("");
                                            obj.find('#name_en').val("");
                                            obj.find('#short_name').val("");
                                            obj.find('#order_prefix').val("");
                                            obj.find('#address_th').val("");
                                            obj.find('#address_en').val("");
                                            obj.find('#contact_number').val("");
                                            obj.find('#website').val("");
                                            obj.find('#email').val("");
                                            obj.find('#logo').val("");
                                            obj.find('#company_logo').val("");
                                            $(".dropify-clear").trigger("click");
                                            company_model.modal('hide');
                                            getCompany();
                                        } else if ((response.data.statusCode ==
                                                '200')) {
                                            Swal.fire({
                                                title: 'ชื่อบริษัทนี้มีอยู่แล้ว',
                                                icon: 'warning',
                                                showConfirmButton: false,
                                                timer: 2000,
                                                toast: true
                                            });
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
                        }); //url: "{{ route('api.v1.companies.update') }}",
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
                                    url: "{{ route('api.v1.companies.update') }}",
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
                                            let obj = $(this);
                                            obj.find('#name_th').val("");
                                            obj.find('#name_en').val("");
                                            obj.find('#short_name').val("");
                                            obj.find('#order_prefix').val("");
                                            obj.find('#address_th').val("");
                                            obj.find('#address_en').val("");
                                            obj.find('#contact_number').val("");
                                            obj.find('#website').val("");
                                            obj.find('#email').val("");
                                            obj.find('#logo').val("");
                                            obj.find('#company_logo').val("");
                                            $(".dropify-clear").trigger("click");
                                            company_model.modal('hide');
                                            getmaintenanceList();
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


            ////// edit company //////
            $(document).on('click', '.btn-edit', function() {
                let id = $(this).data('id');
                $.ajax({
                    type: 'post',
                    url: "{{ route('api.v1.companies.by.id') }}",
                    data: {
                        'id': id
                    },
                    dataType: "json",
                    success: function(response) {
                        setNewsCategoryFormData(response);
                        $("#id").val(response.id);
                        company_model.modal('show')
                        // console.log(response);
                    }
                });
            })

            function setNewsCategoryFormData(data) {
                var img_url = ''
                if (data.logo != null) {
                    img_url = "{{ asset('uploads/images/setting/company/companyLogo') }}/" + data.logo;
                }
                $("#name_th").val(data.name_th);
                $("#name_en").val(data.name_en);
                $("#short_name").val(data.short_name);
                $("#order_prefix").val(data.order_prefix);
                $("#address_th").val(data.address_th);
                $("#address_en").val(data.address_en);
                $("#contact_number").val(data.contact_number);
                $("#website").val(data.website);
                $("#email").val(data.email);
                $("#logo").val(data.logo);
                $('.dropify-render').html('<img src="" />');
                $('.dropify-render img').attr('src', img_url);
                $('.dropify-preview').css('display', 'block');
                $('.dropify-filename-inner').text(data.logo);
            }
            company_model.on('show.bs.modal', function(event) {
                let btn = $(event.relatedTarget);
                let title = btn.data('ac') === 'edit' ? 'แก้ไขบริษัท' : 'เพิ่มบริษัท';
                let obj = $(this);
                obj.find('.modal-title').text(title)
            })
            company_model.on('hide.bs.modal', function() {
                let obj = $(this);
                obj.find('#name_th').val("");
                obj.find('#name_en').val("");
                obj.find('#short_name').val("");
                obj.find('#order_prefix').val("");
                obj.find('#address_th').val("");
                obj.find('#address_en').val("");
                obj.find('#contact_number').val("");
                obj.find('#website').val("");
                obj.find('#email').val("");
                obj.find('#logo').val("");
            })

            ////// delete company //////
            $(document).on('click', '.btn-delete', function() {
                let obj = $(this);
                let id = obj.data('id');
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
                            url: "{{ route('api.v1.companies.delete') }}",
                            data: {
                                'id': id
                            },
                            dataType: "json",
                            success: function(response) {
                                if (response.data.status == 'Success') {
                                    Swal.fire({
                                        title: 'ดำเนินการเรียบร้อยแล้ว',
                                        icon: 'success',
                                        showConfirmButton: false,
                                        timer: 2000,
                                        toast: true
                                    });
                                    getCompany();
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
