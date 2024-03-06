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
        .dataTables_length {
            position: absolute;
        }

        .position {
            position: absolute;
            top: 50%;
            right: 100px;
            /* ปรับตำแหน่งตามที่ต้องการ */
            transform: translateY(-50%);
            z-index: 1;
            /* ให้ข้อความอยู่ด้านบนของ input */
        }
        .btn-success{
            background-color: #77c6c5;
            border: #77c6c5;
        }
        .btn-danger{
            background-color: #fa9583;
            border: #fa9583;
        }
        .btn-outline-success{
            border-color:#77c6c5;
            color: #77c6c5;
        }
        .position{
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-20)
        }
        .btn-primary{
            background-color: #fa9583;
            border: #fa9583;
            border-radius: 20px
        }
        .btn-secondary{
            background-color: white;
            color: #77c6c5;
            border: white;

        }
        .modal-header{
            background-color: #048482;
            color: white
        }

    </style>
@stop
{{-- end header --}}
@section('content')
    <div class="row">
        <div class="col-7 border border-3">
            <h6>คลังเก็บอุปกรณ์ และทรัพย์สินบริษัท</h6>
            <div class="row">
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
                                    <p class="card-text">หมวดหมู่อุปกรณ์</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-5">
            <div class="modalshow">
                <h6>หมวดหมู่อุปกรณ์</h6>
                <div class="row list_supply" id="list_supply">

                </div>
            </div>
            
            <button type="button" class="btn btn-add btn-outline-success rounded-pill" style="width: 100%; "><i
                    class="fa-solid fa-plus fa-xs"></i> เพิ่มหมวดหมู่</button>
        </div>
    </div>
    <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryModalLabel">หมวดหมู่</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="categoryForm">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3">
                            <label for="category_name" class="col-form-label">ชื่อหมวดหมู่ :</label>
                            <input type="text" class="form-control" id="category_name" name="category_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="category_code" class="col-form-label">รหัสหมวดหมู่(กำหนดตัวอักษรภาษาอังกฤษ 3 ตัวอักษร) :</label>
                            <input class="form-control" id="category_code" name="category_code" required></input>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                    <button type="button" class="btn btn-primary save-category">ยืนยัน</button>
                </div>
            </div>
        </div>
    </div>


@stop


@section('js')
    <script>
        $(() => {
            getSupplyCategory();
            function getSupplyCategory() {
            let id = "{{ Auth::user()->id }}";
            const listSupply = document.getElementById('list_supply');
            listSupply.innerHTML = '';
            $.ajax({
                type: 'post',
                url: "{{ route('api.v1.category.list') }}",
                data: {
                    'id': id,
                },
                dataType: "json",
                success: function(response) {
                    var supplyContainer = $(".list_supply");
                    response.forEach(function(supplyInfo) {
                        var categoryId = supplyInfo.id;
                        var categoryName = supplyInfo.category_name;
                        var categoryCode = supplyInfo.category_code;
                        // var supplyContainer
                        var Item =`
                        <div class="col-10">
                            <div class="input-group mb-3">
                            <input type="text" class="form-control rounded-pill text-center" value="${categoryName}" disabled >
                            <label class="position">#${categoryCode}</label>
                            </div>
                        </div>
                        <div class="col-1">
                            <button class="btn btn-sm rounded-pill  btn-success btn-edit" data-id="${categoryId}" data-ac="edit" data-bs-toggle="modal" data-bs-target="#assetModal"><em class="fas fa-edit"></em></button>
                        </div>
                        <div class="col-1">
                            <button class="btn btn-sm rounded-pill btn-danger btn-delete" data-id="${categoryId}"><em class="fas fa-trash-alt"></em></button>
                        </div>
                        `;
                       supplyContainer.append(Item);
                    });
                },
            });
        }
        

            var category_modal = $("#categoryModal");
            $(document).on('click', '.btn-add', function() {
                category_modal.modal('show')
            })

            $(document).on('click', '.save-category', function() {
                let id = $("#id").val();
                let categoryForm = $("#categoryForm");
                if (categoryForm.valid()) {
                    const formData = new FormData($("#categoryForm")[0]);
                    const data = Object.fromEntries(formData.entries());
                    if (id.length == 0) {

                        $.ajax({
                            type: 'post',
                            url: "{{ route('api.v1.category.create') }}",
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
                                    category_modal.modal('hide');
                                    getSupplyCategory();
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
                            url: "{{ route('api.v1.category.update') }}",
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
                                    category_modal.modal('hide');
                                    getSupplyCategory();

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
                    url: "{{ route('api.v1.category.by.id') }}",
                    data: {
                        'id': id
                    },
                    dataType: "json",
                    success: function(response) {
                        setcategoryFormData(response);
                        $("#id").val(response.id);
                        category_modal.modal('show')
                    }
                });
            })

            function setcategoryFormData(data) {
                $("#category_name").val(data.category_name);
                $("#category_code").val(data.category_code);
            }
            category_modal.on('show.bs.modal', function(event) {
                let btn = $(event.relatedTarget);
                let title = btn.data('ac') === 'edit' ? "แก้ไขหมวดหมู่" : "เพิ่มหมวดหมู่ใหม่";
                console.log(btn.data('ac'))
                let obj = $(this);
                obj.find('.modal-title').text(title)
            })
            category_modal.on('hide.bs.modal', function() {
            let obj = $(this);
            obj.find('#category_name').val("");
            obj.find('#category_code').val("");
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
                            url: "{{ route('api.v1.category.delete') }}",
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
                                    getSupplyCategory();

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
