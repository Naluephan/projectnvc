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
        background-color: #fff !important;
        color: #136E68 !important;
        border-color: #c0e7e7 !important;
        height: 45px !important;
    }

    .addHoliday {
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
</style>

@section('side-card')
    <div class="card rounded-4 bg-hr-card">
        {{-- <div class="col-12">
            <div class="container p-4 m-2 rounded-3 shadow-sm bg-hr-card"> --}}
        <div class="card-header border-0">
            <h6><i class="fa-solid fa-layer-group"></i> ประเภทวันหยุด</h6>
        </div>
        <div class="card-body pt-0">
            <div class="row list_holiday" id="list_holiday"></div>
            <div class="button p-2 mt-2">
                <button type="button" class="form-control btn btn-outline-success rounded-pill addHoliday" id="addHoliday"
                    data-bs-toggle="modal" data-bs-target="#holidayModal" style="width: 100%; "><i
                        class="fa-solid fa-plus"></i>
                    เพิ่มประเภทวันหยุด</button>
            </div>
        </div>
        {{-- </div>
        </div> --}}
    </div>

    {{-- modal --}}
    <div class="modal fade" id="holidayModal" tabindex="-1" aria-labelledby="holidayModalLabel" aria-hidden="true"
        data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content modal-radius">
                <div class="modal-header bg-hr-green-app modal-header-radius">
                    <h5 class="modal-title text-white" id="exampleModalLabel"><i class="fa-solid fa-file-circle-plus"></i>
                        เพิ่มข่าวสาร</h5>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                <div class="modal-body">
                    <form id ="holiday_FromModal">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label"><i class="fa-regular fa-newspaper"></i>
                                หัวข้อข่าวสาร</label>
                            <input type="text" class="form-control rounded-pill" id="holiday_name" name="holiday_name"
                                required>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label"><i class="fa-regular fa-newspaper"></i>
                                    วันที่เริ่ม</label>
                                <input type="datetime-local" class="form-control rounded-pill" id="holiday_start"
                                    name="holiday_start" required>
                            </div>
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label"><i class="fa-regular fa-newspaper"></i>
                                    วันที่สิ้นสุด</label>
                                <input type="datetime-local" class="form-control rounded-pill" id="holiday_end"
                                    name="holiday_end" required>
                            </div>
                            
                        </div>
                    </form>
                </div>
                <div class="row p-4 ">
                    <div class="row">
                        <button type="button" class="btn btn-outline-successful rounded-pill col-5 mx-auto p-2"
                            data-bs-dismiss="modal">ยกเลิก</button>
                        <button type="button" class="btn btn-danger rounded-pill saveHoliday col-5 mx-auto p-2"
                            id="saveHoliday">ยืนยัน</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@section('js')
    <script>
        $(() => {
            getCategoriesHoliday();

            function getCategoriesHoliday() {
                let id = "{{ Auth::user()->id }}";
                const listHoliday = document.getElementById('list_holiday');
                listHoliday.innerHTML = '';
                $.ajax({
                    type: "POST",
                    url: "{{ route('api.v1.holiday.category.list') }}",
                    data: {
                        'id': id,
                    },
                    datatype: "JSON",
                    success: function(response) {
                        var holidayContainer = $('.list_holiday');
                        response.forEach(function(categoriesHoliday) {
                            var id = categoriesHoliday.id;
                            var holidayName = categoriesHoliday.holiday_name;
                            var Item = `
                            <div class="test pt-2 mt-1">
                                <div class="row">
                                    <div class="col-12 d-flex">
                                        <div class="input-group">
                                            <input type="text" class="form-control rounded-pill text-sm" disabled>
                                            <label class="position-main pt-2">${holidayName}</label>
                                        </div>

                                        <button class="btn btn-sm btn-success rounded-pill btn-edit mx-1" 
                                             data-id="${id}"
                                            data-ac="edit" data-bs-toggle="modal" data-bs-target="#holidayModal">
                                            <em class="fas fa-edit fs-5"></em>
                                        </button>

                                        <button class="btn btn-danger btn-sm rounded-pill btn-delete" 
                                             data-id="${id}">
                                            <em class="fas fa-trash-alt fs-5"></em>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        `;
                            holidayContainer.append(Item);
                        });
                    },
                });
            }

            var holiday_modal = $('#holidayModal');
            $(document).on('click', '.addHoliday', function() {
                holiday_modal.modal('show')
            })

            ////// save news //////
            $(document).on('click', '.saveHoliday', function() {
                let id = $('#id').val();
                let holiday_FromModal = $('#holiday_FromModal');

                if (holiday_FromModal.valid()) {
                    const formData = new FormData($('#holiday_FromModal')[0]);
                    const data = Object.fromEntries(formData.entries());
                    if (id.length == 0) {
                        $.ajax({
                            type: 'post',
                            url: "{{ route('api.v1.holiday.category.create') }}",
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
                                    holiday_modal.modal('hide');
                                    getCategoriesHoliday();
                                } else if ((response.data.statusCode == '200')) {
                                    Swal.fire({
                                        title: 'ประเภทวันหยุดนี้มีอยู่แล้ว',
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
                            url: "{{ route('api.v1.holiday.category.update') }}",
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
                                    holiday_modal.modal('hide');
                                    getCategoriesHoliday();

                                } else if ((response.data.statusCode == '200')) {
                                    Swal.fire({
                                        title: 'ประเภทวันหยุดนี้มีอยู่แล้ว',
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


            ////// edit news //////
            $(document).on('click', '.btn-edit', function() {
                let id = $(this).data('id');
                $.ajax({
                    type: 'post',
                    url: "{{ route('api.v1.holiday.category.by.id') }}",
                    data: {
                        'id': id
                    },
                    dataType: "json",
                    success: function(response) {
                        setcategoriesHolidayFormData(response);
                        $("#id").val(response.id);
                        holiday_modal.modal('show')
                    }
                });
            })

            function setcategoriesHolidayFormData(data) {
                $("#holiday_name").val(data.holiday_name);
                // $("#news_details").val(data.news_details);
            }
            holiday_modal.on('show.bs.modal', function(event) {
                let btn = $(event.relatedTarget);
                let title = btn.data('ac') === 'edit' ? 'แก้ไขหัวข้อข่าว' : 'เพิ่มหัวข้อข่าว';
                let obj = $(this);
                obj.find('.modal-title').text(title)
            })
            holiday_modal.on('hide.bs.modal', function() {
                let obj = $(this);
                obj.find('#holiday_name').val("");
                // obj.find('#news_details').val("");
            })

            ////// delete news //////
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
                            url: "{{ route('api.v1.holiday.category.delete') }}",
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
                                    getCategoriesHoliday();
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
