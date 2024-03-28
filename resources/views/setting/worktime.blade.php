@extends('setting_menu')
@section('side-card')
    <style>
        .modal-footer {
            justify-content: center;
        }

        .form-check-input[type="checkbox"] {
            display: none;
        }

        .wt {
            align-content: center;
        }

        .form-check-label {
            display: inline-block;
            width: 35px;
            height: 35px;
            text-align: center;
            line-height: 30px;
            border-radius: 50%;
            background-color: #f7f7f7;
            cursor: pointer;
        }

        .form-check-input[type="checkbox"]:checked+.form-check-label {
            background-color: #ddebea;
            color: #fff;
            border-color: #1b8f8d;
        }
        .form-check-input:checked + .form-check-label {
    border: 1px solid #1b8f8d;
}


    </style>
    <div class="card rounded-4 bg-hr-card">
        <div class="card-header border-0">
            <h6 class="text-bold"> <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24"
                    fill="none" stroke="#048482" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-stats">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M11.795 21h-6.795a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v4" />
                    <path d="M18 14v4h4" />
                    <path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                    <path d="M15 3v4" />
                    <path d="M7 3v4" />
                    <path d="M3 11h16" />
                </svg> วันและเวลาทำงาน
            </h6>
        </div>
        <div class="card-body">
            <div class="row list_worktime" id="list_worktime">
            </div>

            <button type="button" class="form-control btn btn-outline-success rounded-pill mt-3 btn-add"><i
                    class="fa-solid fa-plus"></i>
                เพิ่มหมวดหมู่</button>
        </div>
        {{-- <div class="card-footer bg-transparent">
            <button class="btn btn-hr-confirm form-control rounded-pill btn-save">บันทึก</button>
        </div> --}}
    </div>

    <div class="modal fade" id="worktimeModal" tabindex="-1" aria-labelledby="worktimeModalLabel" aria-hidden="true"
        data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content modal-radius">
                <div class="modal-header background2 modal-header-radius">
                    <h5 class="modal-title" id="worktimeModalLabel"><i class="fa-solid fa-file-circle-plus text-sm"></i>
                        เพิ่มข่าวสาร</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="worktimeForm">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em"
                                fill="#FA9583" viewBox="0 0 1024 1024">
                                <path
                                    d="M864 708.5V576a64 64 0 0 0-64-64h-256v-128h64a64.1 64.1 0 0 0 64-64V128a64.1 64.1 0 0 0-64-64h-192a64.1 64.1 0 0 0-64 64v192a64.1 64.1 0 0 0 64 64h64v128H224a64 64 0 0 0-64 64v132.5a128 128 0 1 0 64 0V576h256v132.5a128 128 0 1 0 64 0V576h256v132.5a128 128 0 1 0 64 0ZM416 128h192l0 192H416ZM256 832a64 64 0 1 1-64-64 64.1 64.1 0 0 1 64 64Zm320 0a64 64 0 1 1-64-64 64.1 64.1 0 0 1 64 64Zm256 64a64 64 0 1 1 64-64 64.1 64.1 0 0 1-64 64Z">
                                </path>
                            </svg>
                            <label for="department_id" class="col-form-label text-color">แผนก</label>
                            <select class="form-select input-modal rounded-pill bg-white text-color" name="department_id" id="department_id" value="" required>
                                <option>เลือกแผนก</option>
                                @foreach ($departments as $departmnet)
                                    <option value="{{ $departmnet->id }}">{{ $departmnet->name_th }}</option>
                                @endforeach
                            </select>
                        </div>

                        <label for="worktime_day" class="col-form-label text-color"><i
                                class="fa-solid fa-calendar-days text-hr-orange" style="margin-right: 10px"></i>วันทำงาน</label>
                                <div class="mb-3" style="margin-left: 65px;margin-right: 0px;">
                            {{-- <input type="checkbox" name="worktime_day1" value="อาทิตย์"> อา<br>
                            <input type="checkbox" name="worktime_day2" value="จันทร์"> จ<br>
                            <input type="checkbox" name="worktime_day3" value="อังคาร"> อ<br>
                            <input type="checkbox" name="worktime_day4" value="พุธ"> พ<br>
                            <input type="checkbox" name="worktime_day5" value="พฤหัสบดี"> พฤ<br>
                            <input type="checkbox" name="worktime_day6" value="ศุกร์"> ศ<br>
                            <input type="checkbox" name="worktime_day7" value="เสาร์"> ส<br> --}}
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="worktime_day1" name="worktime_day1" value="อาทิตย์">
                                <label class="form-check-label text-hr-orange" for="worktime_day1">อา</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="worktime_day2" name="worktime_day2" value="จันทร์">
                                <label class="form-check-label text-color" for="worktime_day2">จ</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="worktime_day3" name="worktime_day3" value="อังคาร">
                                <label class="form-check-label text-color" for="worktime_day3">อ</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="worktime_day4" name="worktime_day4" value="พุธ">
                                <label class="form-check-label text-color" for="worktime_day4">พ</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="worktime_day5" name="worktime_day5" value="พฤหัสบดี">
                                <label class="form-check-label text-color" for="worktime_day5">พฤ</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="worktime_day6" name="worktime_day6" value="ศุกร์">
                                <label class="form-check-label text-color" for="worktime_day6">ศ</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="worktime_day7" name="worktime_day7" value="เสาร์">
                                <label class="form-check-label text-color" for="worktime_day7">ส</label>
                            </div>
                    </div>
                        <div class="mb-3">
                            <div class="row">
                                <label for="worktime" class="col-form-label text-color"><i class="fa-solid fa-clock text-hr-orange"
                                        style="margin-right: 10px"></i>เวลาทำงาน</label>
                                <div class="col-6">
                                    <input type="time" class="form-control rounded-pill text-color" id="worktime_start"
                                        name="worktime_start" required>
                                </div>
                                <div class="col-6">
                                    <input type="time" class="form-control rounded-pill text-color" id="worktime_end"
                                        name="worktime_end" required>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn text-color" data-bs-dismiss="modal">ยกเลิก</button>
                    <button type="button" class="btn btn-hr-confirm rounded-pill save-worktime">ยืนยัน</button>
                </div>
            </div>
        </div>
    </div>

@stop
@section('js')
    <script>
        $(() => {
            // var selectedDays = [];
            // document.querySelectorAll('input[name="work_days[]"]').forEach(function(day) {
            //     day.addEventListener('change', function() {
            //         if (this.checked) {
            //             selectedDays.push(this.value);
            //         } else {
            //             var index = selectedDays.indexOf(this.value);
            //             if (index !== -1) {
            //                 selectedDays.splice(index, 1);
            //             }
            //         }
            //         document.getElementById('worktime_day').value = selectedDays.join(',');
            //     });
            // });
            document.querySelectorAll('.form-check-input').forEach(item => {
                item.addEventListener('change', event => {
                    if (event.target.checked) {
                        event.target.nextElementSibling.style.color = '#1b8f8d';
                        event.target.nextElementSibling.style.fontWeight = 'bold';
                    } else {
                        event.target.nextElementSibling.style.color = '';
                        event.target.nextElementSibling.style.fontWeight = '';

                    }
                });
            });


            getWorktime();

            function getWorktime() {
                let id = "{{ Auth::user()->id }}";
                const listworktime = document.getElementById('list_worktime');
                listworktime.innerHTML = '';
                $.ajax({
                    type: 'post',
                    url: "{{ route('api.v1.worktime.list') }}",
                    data: {
                        'id': id,
                    },
                    dataType: "json",
                    success: function(response) {
                        //console.log(response);
                        var worktimeContainer = $(".list_worktime");
                        response.forEach(function(worktimeInfo) {
                            var worktimeId = worktimeInfo.id;
                            var worktimeName = worktimeInfo.departments.name_th;
                            var locationImg = worktimeInfo.departments.image_departments;
                            var startWorkday, endWorkday;
                            for (var i = 1; i <= 7; i++) {
                                var workday = worktimeInfo['worktime_day' + i];
                                if (workday !== null && workday !== undefined) {
                                    if (!startWorkday) {
                                        startWorkday = workday;
                                    }
                                    endWorkday = workday;
                                }
                            }

                            var worktimeStart = worktimeInfo.worktime_start.substring(0, 5);
                            var worktimeEnd = worktimeInfo.worktime_end.substring(0, 5);
                            var Item = `
                                    <div class="card border border-2 p-0 rounded-4 detail" data-id="${worktimeId}">
                                        <div class="row">
                                            <div class="col-4 align-items-center">
                                                <div style="width: 100%; ">
                                                    <img src="${locationImg}" class="border border-0 rounded-start-4" alt="..." style="position: absolute; width: 90%; height: 100%; object-fit: cover; ">
                                                </div>
                                            </div>
                                            <div class="col-4 align-items-center">
                                                <h6 class="mt-2" style="color:#048482">${worktimeName}</h6>
                                                <p class="mt-2" style="color: #d4d4d4;">วัน${startWorkday} - วัน${endWorkday}</p>
                                        
                                                <p class="mt-2" style="color: #d4d4d4;">เวลา ${worktimeStart} น. - ${worktimeEnd} น.</p>
                                                
                                            </div>
                                            <div class="col-4 d-flex hhh align-items-center justify-content-md-end">
                                                <button class="btn btn-sm me-md-2 rounded-pill btn-edit" style="color: #ffff;" data-id="${worktimeId}"
                                                data-ac="edit" data-bs-toggle="modal" data-bs-target="#worktimeModal"><em
                                                    class="fas fa-edit" style="font-size: 20px;"></em></button>&nbsp;&nbsp;
                                            <button class="btn btn-sm me-md-2 rounded-pill btn-delete" style="color: #ffff;" data-id="${worktimeId}"><em
                                                    class="fas fa-trash-alt" style="font-size: 20px;"></em></button>
                                                </div>
                                        </div>
                                    </div>
                                    `;

                            worktimeContainer.append(Item);
                        });
                    },
                });
            }

            var worktime_modal = $("#worktimeModal");
            $(document).on('click', '.btn-add', function() {
                worktime_modal.modal('show')
            })

            $(document).on('click', '.save-worktime', function() {
                let id = $("#id").val();
                let worktimeForm = $("#worktimeForm");
                if (worktimeForm.valid()) {
                    const formData = new FormData($("#worktimeForm")[0]);
                    const data = Object.fromEntries(formData.entries());
                    if (id.length == 0) {

                        $.ajax({
                            type: 'post',
                            url: "{{ route('api.v1.worktime.create') }}",
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
                                    worktime_modal.modal('hide');
                                    getWorktime.reload();
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
                            url: "{{ route('api.v1.worktime.update') }}",
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
                                    worktime_modal.modal('hide');
                                    getWorktime();
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
                    url: "{{ route('api.v1.worktime.by.id') }}",
                    data: {
                        'id': id
                    },
                    dataType: "json",
                    success: function(response) {
                        setworktimeFormData(response);
                        $("#id").val(response.id);
                        worktime_modal.modal('show')
                    }
                });
            })


            function setworktimeFormData(data) {
                $("#department_id").val(data.department_id);
                $("#worktime_day1").val(data.worktime_day1);
                $("#worktime_day2").val(data.worktime_day2);
                $("#worktime_day3").val(data.worktime_day3);
                $("#worktime_day4").val(data.worktime_day4);
                $("#worktime_day5").val(data.worktime_day5);
                $("#worktime_day6").val(data.worktime_day6);
                $("#worktime_day7").val(data.worktime_day7);
                $("#worktime_start").val(data.worktime_start);
                $("#worktime_end").val(data.worktime_end);
            }

            worktime_modal.on('show.bs.modal', function(event) {
                let btn = $(event.relatedTarget);
                let title = btn.data('ac') === 'edit' ? '<em class="fas fa-edit"></em> แก้ไขรายการ' :
                    '<i class="fas fa-file-circle-plus"></i> สร้างรายการใหม่';
                //console.log(btn.data('ac'));
                let obj = $(this);
                obj.find('.modal-title').html(title);
            });

            worktime_modal.on('hide.bs.modal', function() {
                let obj = $(this);
                obj.find('#id').val("");
                obj.find('#department_id').val("");
                obj.find('#worktime_day1').val("");
                obj.find('#worktime_day2').val("");
                obj.find('#worktime_day3').val("");
                obj.find('#worktime_day4').val("");
                obj.find('#worktime_day5').val("");
                obj.find('#worktime_day6').val("");
                obj.find('#worktime_day7').val("");
                obj.find('#worktime_start').val("");
                obj.find('#worktime_end').val("");
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
                            url: "{{ route('api.v1.worktime.delete') }}",
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
                                    getWorktime();
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
