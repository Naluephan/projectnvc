@extends('adminlte::page')

@section('content_header_title')
    การตั้งค่า
@stop
@section('content_header')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">หน้าแรก</a></li>
    <li class="breadcrumb-item active"> การตั้งค่า </li>
@stop
@section('css')
    <style>
        :root {
            --color1: #77c6c5;
            --color2: #fa9583;
            --color3: #1b8f8d;
            --color4: #edf5f5;
        }

        div {
            color: var(--color3);
        }

        .btn-edit {
            background-color: var(--color1);
            border-color: var(--color1);
            color: white;
        }

        .btn-delete {
            background-color: var(--color2);
            border-color: var(--color2);
            color: white;
        }

        .btn-border {
            border-color: var(--color1);
            color: var(--color1);
        }

        .background {
            background-color: var(--color4);
        }

        .background2 {
            background-color: var(--color3);
            color: white
        }

        .text-color {
            color: var(--color3);
        }

        .modal-radius {
            border-radius: 1.5rem;
            border-color: none;
        }

        .modal-header-radius {
            border-radius: 1.5rem 1.5rem 0rem 0rem;
        }

        .dataTables_length {
            position: absolute;
        }

        .date {
            position: absolute;
            top: 50%;
            right: 20px;
            /* ปรับตำแหน่งตามที่ต้องการ */
            transform: translateY(-50%);
            z-index: 1;
            /* ให้ข้อความอยู่ด้านบนของ input */
        }
        .modal-footer {
            display: flex;
            justify-content: center;
        }
        .btn-success {
            background-color:var(--color2);
            border: var(--color2);
        }
        label .fa-calendar-days{
            color: var(--color2);
            margin-right: 5px
        }
    </style>
@stop
{{-- end header --}}
@section('content')
    <div class="row">
        <div class="col-7 border border-3">
            <h6>วันและเวลาทำงาน</h6>
            <div class="row">
                <div class="col-4 ">
                    <div class="card border border-2 p-0 rounded-4">
                        <div class="row">
                            <div class="col-5">
                                <div style="width: 100%; ">
                                    <img src="https://media.discordapp.net/attachments/1068009652882772048/1213840762593345617/IMG_2033.jpg?ex=65f6f04d&is=65e47b4d&hm=3c9f20a33d307983ff42ac8da496ff3b4fbd997f08807cec20aed5bd1111af0e&=&format=webp&width=496&height=662"
                                        class="border border-0 rounded-start-4 " alt="..."
                                        style="position: absolute; width: 100%; height: 100%; object-fit: cover; ">
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="card-body">
                                    <p class="card-text asset">หมวดหมู่ทรัพย์สิน</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4 ">
                    <div class="card border border-2 p-0 rounded-4">
                        <div class="row">
                            <div class="col-5">
                                <div style="width: 100%; ">
                                    <img src="https://media.discordapp.net/attachments/1068009652882772048/1214529412264103936/IMG_1986.jpg?ex=65f971a8&is=65e6fca8&hm=e0ea36feaf9aeeff5707233e3e5b7e6a3d61046097461e9d777cb08641e133f2&=&format=webp&width=328&height=437"
                                        class="border border-0 rounded-start-4 " alt="..."
                                        style="position: absolute; width: 100%; height: 100%; object-fit: cover; ">
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="card-body">
                                    <p class="card-text">หมวดหมู่อุปกรณ์</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4 ">
                    <div class="card border border-2 p-0 rounded-4">
                        <div class="row">
                            <div class="col-5">
                                <div style="width: 100%; ">
                                    <img src="https://media.discordapp.net/attachments/1068009652882772048/1214529412264103936/IMG_1986.jpg?ex=65f971a8&is=65e6fca8&hm=e0ea36feaf9aeeff5707233e3e5b7e6a3d61046097461e9d777cb08641e133f2&=&format=webp&width=328&height=437"
                                        class="border border-0 rounded-start-4 " alt="..."
                                        style="position: absolute; width: 100%; height: 100%; object-fit: cover; ">
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="card-body">
                                    <p class="card-text">หมวดหมู่อุปกรณ์</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4 ">
                    <div class="card border border-2 p-0 rounded-4">
                        <div class="row">
                            <div class="col-5">
                                <div style="width: 100%; ">
                                    <img src="https://media.discordapp.net/attachments/1068009652882772048/1214529412264103936/IMG_1986.jpg?ex=65f971a8&is=65e6fca8&hm=e0ea36feaf9aeeff5707233e3e5b7e6a3d61046097461e9d777cb08641e133f2&=&format=webp&width=328&height=437"
                                        class="border border-0 rounded-start-4 " alt="..."
                                        style="position: absolute; width: 100%; height: 100%; object-fit: cover; ">
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="card-body">
                                    <p class="card-text">หมวดหมู่ข่าวสาร</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-5">
            <div class="modalshow">
                <h6><i class="fa-solid fa-bars"></i> หมวดหมู่ทรัพย์สิน</h6>
                <div class="row list_holiday" id="list_holiday">
                </div>
            </div>

            <button type="button" class="btn btn-outline-success rounded-pill btn-add" style="width: 100%; "><i
                    class="fa-solid fa-plus"></i> เพิ่มหมวดหมู่</button>
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
                            <label for="holiday_name" class="col-form-label"><i class="fa-solid fa-calendar-days"></i>วันหยุด :</label>
                            <input type="text" class="form-control rounded-pill" id="holiday_name"
                                name="holiday_name" required>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <label for="holiday" class="col-form-label"><i class="fa-solid fa-calendar-days"></i>เลือกวันที่เริ่มต้น / วันที่สิ้นสุด</label>
                                <div class="col-6">
                                    <input type="date" class="form-control rounded-pill" id="holiday_start"
                                        name="holiday_start" required>
                                        
                                </div>
                                <div class="col-6">
                                    <input type="date" class="form-control rounded-pill" id="holiday_end"
                                        name="holiday_end" required>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn text-color" data-bs-dismiss="modal">ยกเลิก</button>
                    <button type="button" class="btn btn-success rounded-pill save-holiday">ยืนยัน</button>
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
                const listAsset = document.getElementById('list_holiday');
                listAsset.innerHTML = '';
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
                            var holidayStart = holidayInfo.holiday_start;
                            var holidayEnd = holidayInfo.holiday_end;
                            var Item = `
                        <div class="col-10">
                            <div class="input-group mb-3">
                            <input type="text" class="form-control rounded-pill text-center" value="${holidayName}" disabled >
                            <label class="date">${holidayStart}"-"${holidayEnd}</label>
                            </div>
                        </div>
                        <div class="col-1">
                            <button class="btn btn-sm rounded-pill  btn-success btn-edit" data-id="${holidayId}" data-ac="edit" data-bs-toggle="modal" data-bs-target="#assetModal"><em class="fas fa-edit"></em></button>
                        </div>
                        <div class="col-1">
                            <button class="btn btn-sm rounded-pill btn-danger btn-delete" data-id="${holidayId}"><em class="fas fa-trash-alt"></em></button>
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
                $("#cetegory_name").val(data.cetegory_name);
                $("#cetegory_code").val(data.cetegory_code);
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
                obj.find('#cetegory_name').val("");
                obj.find('#cetegory_code').val("");
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
