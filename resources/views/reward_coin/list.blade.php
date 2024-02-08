@extends("adminlte::page")

@section('content_header_title')
                Reward
@stop
@section('content_header')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">หน้าแรก</a></li>
    <li class="breadcrumb-item active"> Reward  </li>
@stop
@section('css')
    <style>
        .dataTables_length {
            position: absolute;
        }
    </style>
@stop
{{-- end header --}}
@section('content')
    <div class="card">
        <!-- <div class="card-header">
            <h6 class="">ตัวเลือกการค้นหา</h6>
            <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
                <div class="col-md-3 user_plan">
                    <select id="company_id" class="form-select text-capitalize select2 list-filter">
                        <option value="-1"> -- บริษัท -- </option>
{{--                        @foreach ($companies as $company)--}}
{{--                            <option value="{{ $company->id }}">{{ $company->name_th }}</option>--}}
{{--                        @endforeach--}}
                        <option value="0">ทดลองงาน</option>
                    </select>
                </div>
                <div class="col-md-3 user_role">
                    <select id="department_id" class="form-select text-capitalize select2">
                        <option value=""> -- แผนก --</option>
                        <option value="Admin">Admin</option>
                        <option value="Author">Author</option>
                        <option value="Editor">Editor</option>
                        <option value="Maintainer">Maintainer</option>
                        <option value="Subscriber">Subscriber</option>
                    </select>
                </div>
                <div class="col-md-3 user_role">
                    <select id="position_id" class="form-select text-capitalize select2">
                        <option value=""> -- ดำแหน่ง --</option>
                        <option value="Admin">Admin</option>
                        <option value="Author">Author</option>
                        <option value="Editor">Editor</option>
                        <option value="Maintainer">Maintainer</option>
                        <option value="Subscriber">Subscriber</option>
                    </select>
                </div>
                <div class="col-md-3 user_status">
                    <select id="FilterTransaction" class="form-select text-capitalize select2">
                        <option value=""> -- สถานะ -- </option>
                        <option value="Pending" class="text-capitalize">Pending</option>
                        <option value="Active" class="text-capitalize">Active</option>
                        <option value="Inactive" class="text-capitalize">Inactive</option>
                    </select>
                </div>
            </div>
        </div> -->
        <div class="card-body ">
        <button class="btn btn-sm rounded-pill btn-add btn-danger" data-ac="add"><em class="fas fa-plus"></em></button>
            <table class="table dt-responsive w-100 nowrap" id="data_tables" aria-describedby="data_tables">
                <thead class="border-top table-light">
                <tr>
                    {{--                    <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1" style="width: 1px; display: none;" aria-label=""></th> --}}
                    {{-- <th class="dt-checkboxes-cell dt-checkboxes-select-all" data-col="1" aria-label=""><input type="checkbox" class="form-check-input"></th> --}}
                    <th>#</th>
                    <th>ชื่อสินค้า</th>
                    <th>ภาพสินค้า</th>
                    <th>คำอธิบายสินค้า</th>
                    <th>จำนวนเหรียญ</th>
                    <th>จัดการ</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

        <div class="modal fade" id="rewardModal" tabindex="-1" aria-labelledby="rewardModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rewardModalLabel">ของรางวัล</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="rewardForm">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3">
                            <label for="reward_name" class="col-form-label">ชื่อของรางวัล :</label>
                            <input type="text" class="form-control" id="reward_name" name="reward_name" required>
                        </div>
                        <div class="mb-3">
                            <div class="picture text-center" id="picture">

                            </div>
                        <div class="container image_img" id="image_img"> </div>
                            <label for="reward_image" >ภาพของรางวัล :</label>
                            <input type="file" class="form-control" id="reward_image" name="reward_image"></input>
                        </div>
                        <div class="mb-3">
                            <label for="reward_description" class="col-form-label">คำอธิบายของรางวัล :</label>
                            <textarea type="text" class="form-control" id="reward_description" name="reward_description" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="reward_coins_change" class="col-form-label">จำนวนเหรียญ :</label>
                            <input type="text" class="form-control" id="reward_coins_change" name="reward_coins_change" required>
                        </div>  
                        

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="button" class="btn btn-primary save-reward">บันทึก</button>
                </div>
            </div>
        </div>
    </div>
@stop


@section('js')
    <script>
$(() => {
var list_table = $("#data_tables").DataTable({
                pageLength: 25,
                responsive: true,
                processing: true,
                serverSide: true,
                serverMethod: 'post',
                ajax: {
                    url: '{{ route('api.v1.reward.list') }}',
                    type: 'POST'
                },
                columns: [
                    {
                        data: "id"
                    },
                    {
                        data: "reward_name"
                    },
                    {
                        data: 'id',
                            render: function(data, type, row, meta) {
                                return `<img src="https://newhr.organicscosme.com/uploads/images/rewardcoin/${row.reward_image}" alt="..." style="width: 300px; height: 200px;">`
                            }
                    },
                    {
                        data: "reward_description"
                    },
                    {
                        data: "reward_coins_change"
                    },
                    {
                        data: 'id',
                            render: function(data, type, row, meta) {
                                return `<div class="d-inline-block text-nowrap">
                                <button class="btn btn-sm btn-text-secondary rounded-pill" data-bs-toggle="dropdown"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                                <div class="dropdown-menu dropdown-menu-end m-0">
                                    <a data-id="${row.id}" data-ac="edit" data-bs-toggle="modal" data-bs-target="#rewardModal" class="dropdown-item btn-edit"><i class="fas fa-pencil text-warning mr-1"></i><span>แก้ไข</span></a>
                                    <a data-id="${row.id}" class="dropdown-item btn-delete"><i class="fas fa-trash-alt text-red mr-1 "></i><span>ลบ</span></a>
                                </div>
                            </div>`
                            }
                    },
                ],
                "dom": '<"top my-1 mr-1"lf>rt<"bottom d-flex  w-100 justify-content-between px-1 mt-3" ip  ><"clear">'
            });

        var reward_modal = $("#rewardModal");
        $(document).on('click', '.btn-add', function() {
            const containerImage = document.getElementById('picture');
                containerImage.textContent = '';
            reward_modal.modal('show')
        })

        $(document).on('click', '.save-reward', function() {
                let id = $("#id").val();
                let rewardForm = $("#rewardForm");
                if (rewardForm.valid()) {
                    const formData = new FormData($("#rewardForm")[0]);
                    formData.append('reward_image_name', $('#reward_image')[0].files[0]);
                    formData.append('reward_image_value', $('#reward_image').val());
                    if (id.length == 0) {
                        $.ajax({
                            type: 'post',
                            url: "{{ route('api.v1.reward.create') }}",
                            data: formData,
                            dataType: "json",
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                if (response.status == 'Success') {
                                    Swal.fire({
                                        title: 'ดำเนินการเรียบร้อยแล้ว',
                                        icon: 'success',
                                        showConfirmButton: false,
                                        timer: 2000,
                                        toast: true
                                    });
                                    reward_modal.modal('hide');
                                    list_table.ajax.reload(null, false);
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
                            url: "{{route('api.v1.reward.update')}}",
                            data: formData,
                            dataType: "json",
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                if (response.status == 'Success') {
                                    Swal.fire({
                                        title: 'ดำเนินการเรียบร้อยแล้ว',
                                        icon: 'success',
                                        showConfirmButton: false,
                                        timer: 2000,
                                        toast: true
                                    });
                                    reward_modal.modal('hide');
                                    list_table.ajax.reload(null, false);
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
                const containerImage = document.getElementById('picture');
                containerImage.textContent = '';
                $.ajax({
                    type: 'post',
                    url: "{{ route('api.v1.reward.get.by.id') }}",
                    data: {
                        'id': id
                    },
                    dataType: "json",
                    success: function(response) {
                        
                        setFormData(response);
                        $("#id").val(response.id);
                        reward_modal.modal('show')
                    }
                });
            })

            function setFormData(data) {
                
                $("#reward_name").val(data.reward_name);
                $("#reward_description").val(data.reward_description);
                $("#reward_coins_change").val(data.reward_coins_change);
                var image_img = $(".picture");
                    var image = `
                        <img src="https://newhr.organicscosme.com/uploads/images/rewardcoin/${data.reward_image}" alt="..." style="width: 300px; height: 200px;">

                    `;
                    image_img.append(image);
            }

            reward_modal.on('show.bs.modal', function(event) {
                let btn = $(event.relatedTarget);
                let title = btn.data('ac') === 'edit' ? "แก้ไขรายการ" : "สร้างรายการใหม่";
                console.log(btn.data('ac'))
                let obj = $(this);
                obj.find('.modal-title').text(title)
            })
            reward_modal.on('hide.bs.modal', function() {
            let obj = $(this);
            obj.find('#reward_name').val("");
            obj.find('#reward_description').val("");
            obj.find('#reward_coins_change').val("");
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
                            url: "{{ route('api.v1.reward.delete') }}",
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
                                    list_table.ajax.reload(null, false);
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
