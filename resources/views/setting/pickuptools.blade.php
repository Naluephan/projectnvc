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
    </style>

    <div class="card rounded-4 bg-hr-card">
        <div class="card-header border-0 pb-0">
            <h6 class="text-bold"><i class="fas fa-cubes"></i> การเบิกอุปกรณ์</h6>
            <p class="text-bold">กำหนดสิทธิ์สำหรับการเบิกอุปกรณ์ในแต่ละแผนกก</p>
        </div>
        <div class="card-body pt-0">
            <div class="row mt-1 list_pickuptools" id="list_pickuptools"></div>
            <button type="button" class="form-control btn btn-outline-success rounded-pill mt-3 btn-add"><i
                    class="fa-solid fa-plus"></i>
                เพิ่มข้อมูล</button>
        </div>
        <div class="card-footer bg-transparent">
            <button class="btn btn-hr-confirm form-control rounded-pill">บันทึก</button>
        </div>
    </div>

    <div class="modal fade" id="pickuptoolsModal" tabindex="-1" aria-labelledby="pickuptoolsModalLabel" aria-hidden="true"
        data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content modal-radius">
                <div class="modal-header background2 modal-header-radius">
                    <h6 class="modal-title" id="pickuptoolsModalLabel"><i class="fa-solid fa-file-circle-plus"></i></h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="pickuptoolsForm">
                        <input type="hidden" name="id" id="id">
                        <div class="department">
                            <div class="row">
                                <div class="pr-3 pl-3">
                                    <label for="department_id" class="col-form-label text-color"><i
                                            class="fas fa-th-list text-sm"></i> แผนก</label>
                                    <select class="form-select input-modal rounded-pill bg-white text-color"
                                        id="department_id" name="department_id" required>
                                        <option value="">โปรดเลือกแผนก</option>
                                        <option value="1">บัญชี</option>
                                        <option value="6">ไอที</option>
                                        <option value="9">ผลิต</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="added-pickuptools">
                            <div class="row mt-3 list-pickuptools">
                                <div class="col-6 pl-3">
                                    <label for="device_types_id" class="col-form-label text-color"><i
                                            class="fas fa-newspaper text-sm"></i>
                                        อุปกรณ์ที่เบิกได้</label>
                                    <select class="form-select input-modal rounded-pill bg-white text-color"
                                        id="device_types_id" name="device_types_id" required>
                                        <option value="">โปรดเลือกอุปกรณ์</option>
                                        <option value="1">กระดาษ A4</option>
                                        <option value="2">ปากกาไวท์บอร์ด</option>
                                        <option value="3">หมึกสำหรับตรายาง</option>
                                    </select>
                                </div>
                                <div class="col-6 pr-3">
                                    <label for="number_requested" class="col-form-label text-color"><i
                                            class="fas fa-newspaper text-sm"></i> จำนวน (หน่อย) / ปี</label>
                                    <input type="text" class="form-control input-modal rounded-pill text-color"
                                        id="number_requested" name="number_requested" style="height: 45px;" required>
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
                            <button type="button" class="btn card-text text-bold text-color"
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="header px-3">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-2.webp"
                                    alt="Generic placeholder image" class="img-fluid rounded-circle"
                                    style="width: 40px;">
                                <p class="ml-3 mb-0 text-bold text-color">แผนกบัญชี</p>
                            </div>
                            <div class="col-6 d-flex align-items-center justify-content-end">
                                <div class="icons">
                                    <i class="fas fa-edit mr-2 text-color cursor-pointer"></i>
                                    <i class="fas fa-trash-alt cursor-pointer" style="color: #FA9583;"></i>
                                </div>
                            </div>
                        </div>
                        <div class="text-header pt-2">
                            <p class="mb-0" style="color: #c7c8c8;">สิทธิ์การเบิกอุปกรณ์ 3 รายการ (ต่อปี)</p>
                        </div>
                        <div class="content">
                            <div id="list_pickuptoolsDetail"></div>
                            {{-- <div class="card card-content border-0 mt-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="fas fa-cubes text-color" style="font-size: 40px;"></i>
                                        </div>
                                        <div class="col-7">
                                            <p class="text-color p-2">กระดาษ A4</p>
                                        </div>
                                        <div class="col-3 d-flex align-items-center justify-content-end">
                                            <p class="text-color py-2">5 รีม</p>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="button-footer">
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-hr-confirm form-control rounded-pill" data-bs-dismiss="modal"
                                aria-label="Close">ตกลง</button>
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
                                <div class="button-details p-0 w-100 mb-3 cursor-pointer" style="height: 120px;" data-department_id="${department_id}">
                                    <span class="button-image w-40"
                                        style="background-image: url(${imageDepartments});"></span>
                                    <span class="button-text w-100 pt-3">
                                        <h6 class="text-bold mb-0 mr-2">${departmentName}</h6>
                                        <p class="text-bold mb-0" style="color: #d4d4d4;">สิทธิ์การเบิก ${departmentCount} รายการ</p>
                                    </span>
                                </div>
                            `;
                            pickuptoolsContainer.append(Item);
                        });
                    },
                });
            }

            var pickuptoolsDetail_modal = $("#pickuptoolsDetailModal");
            $(document).on('click', '.button-details', function() {
                pickuptoolsDetail_modal.modal('show')

                pickuptoolsDetailCategory();
                let department_id = $(this).data('department_id');
                    console.log(department_id);
                function pickuptoolsDetailCategory() {

                    const listPickuptools = document.getElementById('list_pickuptoolsDetail');
                    listPickuptools.innerHTML = '';
                    $.ajax({
                        type: 'post',
                        url: "{{ route('api.v1.pickup.tools.show.detail.by.id') }}",
                        data: {
                            'department_id': department_id,
                        },
                        dataType: "json",
                        success: function(response) {
                            // console.log(response);
                            var pickuptoolsDetailContainer = $(".list_pickuptoolsDetail");
                            response.forEach(function(lInfo) {
                                var device_types_name = lInfo.device_types_name;
                                var number_requested = lInfo.number_requested;
                                var unit = lInfo.unit;
                                var Item = `
                                <div class="card card-content border-0 mt-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-2">
                                                <i class="fas fa-cubes text-color" style="font-size: 40px;"></i>
                                            </div>
                                            <div class="col-7">
                                                <p class="text-color p-2">${device_types_name}</p>
                                            </div>
                                            <div class="col-3 d-flex align-items-center justify-content-end">
                                                <p class="text-color py-2">${number_requested} ${unit}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                `;
                                pickuptoolsDetailContainer.append(Item);
                            });
                        },
                    });
                }
            })

            var pickuptools_modal = $("#pickuptoolsModal");
            $(document).on('click', '.btn-add', function() {
                pickuptools_modal.modal('show')
            })

            pickuptools_modal.on('show.bs.modal', function(event) {
                let btn = $(event.relatedTarget);
                let title = btn.data('ac') === 'edit' ? '<em class="fas fa-edit"></em>&nbsp;แก้ไขข้อมูล' :
                    '<i class="fas fa-file-circle-plus"></i>&nbsp;เพิ่มข้อมูล';
                //console.log(btn.data('ac'));
                let obj = $(this);
                obj.find('.modal-title').html(title);
            });

            pickuptools_modal.on('hide.bs.modal', function() {
                let obj = $(this);
                obj.find('#department_name').val("");
                obj.find('#image_departments').val("");
                obj.find('#department_count').val("");
            })

            $(document).on('click', '.btn-addList', function() {
                const pickuptoolsContainer = document.querySelector('.list-pickuptools');
                const newPickuptoolsContainer = pickuptoolsContainer.cloneNode(true);

                newPickuptoolsContainer.classList.remove('list-pickuptools');
                newPickuptoolsContainer.classList.add('added-pickuptools');

                pickuptoolsContainer.parentNode.insertBefore(newPickuptoolsContainer, pickuptoolsContainer);
            });

            $(document).on('click', '.save-pickuptools', function() {
                let id = $("#id").val();
                let pickuptoolsForm = $("#pickuptoolsForm");
                if (pickuptoolsForm.valid()) {
                    const formData = new FormData($("#pickuptoolsForm")[0]);
                    const data = Object.fromEntries(formData.entries());
                    if (id.length == 0) {

                        $.ajax({
                            type: 'post',
                            url: "{{ route('api.v1.pickup.tools.create') }}",
                            data: data,
                            dataType: "json",
                            success: function(response) {
                                pickuptools_modal.modal('hide');
                                getPickuptoolsCategory();
                            }
                        });
                    } else {
                        $.ajax({
                            type: 'post',
                            url: "",
                            data: data,
                            dataType: "json",
                            success: function(response) {
                                pickuptools_modal.modal('hide');
                                getPickuptoolsCategory();
                            }
                        });
                    }
                }
            })



        });
    </script>
@stop
