@extends('setting_menu')
@section('side-card')
    <style>
        .modal-footer {
            justify-content: center;
        }
    </style>
    <div class="card rounded-4 bg-hr-card">
        <div class="card-header border-0">
            <h6 class="text-bold"> <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-stats">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M11.795 21h-6.795a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v4" />
                    <path d="M18 14v4h4" />
                    <path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                    <path d="M15 3v4" />
                    <path d="M7 3v4" />
                    <path d="M3 11h16" />
                </svg> วันหยุดประจำปี
            </h6>
        </div>
        <div class="card-body">
            <div class="row list_holiday" id="list_holiday">
            </div>

            <button type="button" class="form-control btn btn-outline-success rounded-pill mt-3 btn-add"><i
                    class="fa-solid fa-plus"></i>
                เพิ่มหมวดหมู่</button>
        </div>
    </div>

    <div class="modal fade" id="holidayModal" tabindex="-1" aria-labelledby="holidayModalLabel" aria-hidden="true"
        data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content modal-radius">
                <div class="modal-header background2 modal-header-radius">
                    <h5 class="modal-title" id="holidayModalLabel"><i class="fa-solid fa-file-circle-plus"></i>
                        เพิ่มข่าวสาร</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="holidayForm">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3">
                            <label for="holiday_name" class="col-form-label text-color"><i
                                    class="fa-solid fa-calendar-days text-hr-orange"
                                    style="margin-right: 10px"></i>วันหยุด</label>
                            <input type="text" class="form-control rounded-pill" id="holiday_name" name="holiday_name"
                                required>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <label for="holiday" class="col-form-label text-color"><i
                                        class="fa-solid fa-calendar-days text-hr-orange"
                                        style="margin-right: 10px"></i>เลือกวันที่เริ่มต้น / วันที่สิ้นสุด</label>
                                <div class="col-6">
                                    <input type="date" class="form-control rounded-pill text-color" id="holiday_start"
                                        name="holiday_start" required>

                                </div>
                                <div class="col-6">
                                    <input type="date" class="form-control rounded-pill text-color" id="holiday_end"
                                        name="holiday_end" required>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn text-color" data-bs-dismiss="modal">ยกเลิก</button>
                    <button type="button" class="btn btn-hr-confirm rounded-pill save-holiday">ยืนยัน</button>
                </div>
            </div>
        </div>
    </div>

@stop
@section('js')
    <script>
        $(() => {
            getHolidayCategory();

            function getHolidayCategory() {
                let id = "{{ Auth::user()->id }}";
                const listHoliday = document.getElementById('list_holiday');
                listHoliday.innerHTML = '';
                $.ajax({
                    type: 'post',
                    url: "{{ route('api.v1.holiday.category.list') }}",
                    data: {
                        'id': id,
                    },
                    dataType: "json",
                    success: function(response) {
                        //console.log(response);
                        var holidayContainer = $(".list_holiday");
                        response.forEach(function(holidayInfo) {
                            var holidayId = holidayInfo.id;
                            var holidayName = holidayInfo.holiday_name;
                            // var holidayStart = moment(holidayInfo.holiday_start).locale('th').format('D');
                            // var holidayEnd = moment(holidayInfo.holiday_end).locale('th').format('LL');
                            var holidayStart = moment(holidayInfo.holiday_start).locale('th');
                            var holidayEnd = moment(holidayInfo.holiday_end).locale('th');

                            // เช็คว่าวันเริ่มและสิ้นสุดเป็นวันเดียวกันหรือไม่
                            if (holidayStart.isSame(holidayEnd, 'day')) {
                                var holidayDate = holidayStart.format('D MMMM YYYY'); // แสดงผลวันที่เป็นตัวเลข  เดือน  ปี
                            } else {
                                var holidayDate = holidayStart.format('D') + ' - ' + holidayEnd.format('D MMMM YYYY'); // แสดงผลเฉพาะวันที่เมื่อเริ่มและสิ้นสุดไม่เหมือนกัน
                            }

                            var Item = `
                            <div class="test pt-2">
                                    <div class="row">
                                        <div class="col-12 d-flex hhh">
                                            <div class="input-group">
                                                <input type="text" class="form-control rounded-pill bg-white text-sm"
                                                    style="border-color: #c0e7e7; height: 45px;" disabled>
                                                <label class="position-main pt-2">${holidayName}</label>
                                                <label class="position-main2 pt-2">${holidayDate}</label>
                                            </div>&nbsp;&nbsp;
                                            <button class="btn btn-sm rounded-pill btn-edit" style="color: #ffff;" data-id="${holidayId}"
                                                data-ac="edit" data-bs-toggle="modal" data-bs-target="#holidayModal"><em
                                                    class="fas fa-edit" style="font-size: 20px;"></em></button>&nbsp;&nbsp;
                                            <button class="btn btn-sm rounded-pill btn-delete" style="color: #ffff;" data-id="${holidayId}"><em
                                                    class="fas fa-trash-alt" style="font-size: 20px;"></em></button>
                                        </div>
                                    </div>
                                </div>
                `;
                            holidayContainer.append(Item);
                        });
                    },
                });
            }

            var holiday_modal = $("#holidayModal");
            $(document).on('click', '.btn-add', function() {
                holiday_modal.modal('show')
            })

            $(document).on('click', '.save-holiday', function() {
                let id = $("#id").val();
                let holidayForm = $("#holidayForm");
                if (holidayForm.valid()) {
                    const formData = new FormData($("#holidayForm")[0]);
                    const data = Object.fromEntries(formData.entries());
                    if (id.length == 0) {

                        $.ajax({
                            type: 'post',
                            url: "{{ route('api.v1.holiday.category.create') }}",
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
                                    holiday_modal.modal('hide');
                                    getHolidayCategory();
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
                            url: "{{ route('api.v1.holiday.category.update') }}",
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
                                    holiday_modal.modal('hide');
                                    getHolidayCategory();
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
                        setHolidayFormData(response);
                        $("#id").val(response.id);
                        holiday_modal.modal('show')
                    }
                });
            })


            function setHolidayFormData(data) {
                $("#holiday_name").val(data.holiday_name);
                $("#holiday_start").val(data.holiday_start);
                $("#holiday_end").val(data.holiday_end);
            }

            holiday_modal.on('show.bs.modal', function(event) {
                let btn = $(event.relatedTarget);
                let title = btn.data('ac') === 'edit' ? '<em class="fas fa-edit"></em> แก้ไขรายการ' :
                    '<i class="fas fa-file-circle-plus"></i> สร้างรายการใหม่';
                //console.log(btn.data('ac'));
                let obj = $(this);
                obj.find('.modal-title').html(title);
            });

            holiday_modal.on('hide.bs.modal', function() {
                let obj = $(this);
                obj.find('#id').val("");
                obj.find('#holiday_name').val("");
                obj.find('#holiday_start').val("");
                obj.find('#holiday_end').val("");
            })

            $(document).on('click', '.btn-delete', function() {
                let obj = $(this);
                let id = obj.data('id');
                Swal.fire({
                    title: 'ยืนยัน!! ลบข้อมูล',
                    text: "ต้องการดำเนินการใช่หรือไม่!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#e83e3e',
                    cancelButtonColor: '#bb93ab',
                    confirmButtonText: 'ยืนยัน',
                    cancelButtonText: 'ปิด'
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
                                if (response.status == 'Success') {
                                    Swal.fire({
                                        title: 'ดำเนินการเรียบร้อยแล้ว',
                                        icon: 'success',
                                        showConfirmButton: false,
                                        timer: 2000,
                                        toast: true
                                    });
                                    getHolidayCategory();
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
