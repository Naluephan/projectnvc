@extends('setting_menu')
<style>
    .btn-danger {
        color: #fff !important;
        border-color: #FA9583 !important;
        background-color: #FA9583 !important;
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
        background-color: #fff !important;
        color: #136E68 !important;
        border-color: #77c6c5 !important;
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
</style>

@section('side-card')
    <div class="row">
        <div class="col-12">
            <div class="container p-4 m-2 rounded-3 shadow-sm bg-hr-card">
                <div class="row">
                    <h6><i class="fa-solid fa-file-circle-plus"></i> เพิ่มบริษัท</h6>
                    <div class="row list_company" id="list_company">
                    </div>
                </div>
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
                            <label for="address_th" class="col-form-label"><i class="fa-solid fa-location-dot"></i> ที่อยู่
                                (TH)</label>
                            <textarea class="form-control rounded-pill" id="address_th" name="address_th" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="address_en" class="col-form-label"><i class="fa-solid fa-location-dot"></i> ที่อยู่
                                (EN)</label>
                            <textarea class="form-control rounded-pill" id="address_en" name="address_en" required></textarea>
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
                                    <input class="form-control rounded-pill" id="email" name="email" required></input>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="website" class="col-form-label"><i class="fa-solid fa-globe"></i> เว็ปไซต์</label>
                            <input class="form-control rounded-pill" id="website" name="website" required></input>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="col-form-label"><i class="fa-solid fa-images"></i> โลโก้</label>
                            <input class="form-control rounded-pill" id="logo" name="logo" required></input>
                        </div>
                        {{-- <div class="mb-3">
                            <label for="formFile" class="form-label"><i class="fa-solid fa-images"></i> โลโก้</label>
                            <input class="form-control rounded-pill" type="file" id="formFile" name="formFile">
                        </div> --}}
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
                        console.log(response);
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
                            <div class="test pt-2 mb-3">
                                <div class="row">
                                    <div class="col-12 d-flex">
                                        <div class="input-group">
                                            <input type="text" class="form-control rounded-pill text-sm" disabled>
                                            <label class="position-main pt-2">${name_th}</label>
                                        </div>

                                        <button class="btn btn-sm btn-success rounded-pill btn-edit mx-2" 
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
            })

            ////// save company //////
            $(document).on('click', '.save-company', function() {
                let id = $('#id').val();
                let company_FromModal = $('#company_FromModal');

                if (company_FromModal.valid()) {
                    const formData = new FormData($('#company_FromModal')[0]);
                    const data = Object.fromEntries(formData.entries());
                    if (id.length == 0) {
                        $.ajax({
                            type: 'post',
                            url: "{{ route('api.v1.companies.create') }}",
                            data: data,
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
                                    company_model.modal('hide');
                                    getCompany();
                                } else if ((response.data.statusCode == '200')) {
                                    Swal.fire({
                                        title: 'บริษัทนี้นี้มีอยู่แล้ว',
                                        icon: 'warning',
                                        showConfirmButton: false,
                                        timer: 2000,
                                        toast: true
                                    });
                                } else {
                                    Swal.fire({
                                        title: 'เกิดข้อผิดพลาด',
                                        icon: 'warning',
                                        showConfirmButton: false,
                                        timer: 2000,
                                        toast: true
                                    });
                                }
                            }
                        });
                    } else {
                        $.ajax({
                            type: 'post',
                            url: "{{ route('api.v1.companies.update') }}",
                            data: data,
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
                                    company_model.modal('hide');
                                    getCompany();

                                } else if ((response.data.statusCode == '200')) {
                                    Swal.fire({
                                        title: 'บริษัทนี้นี้มีอยู่แล้ว',
                                        icon: 'warning',
                                        showConfirmButton: false,
                                        timer: 2000,
                                        toast: true
                                    });
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
