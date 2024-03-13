@extends('adminlte::page')
@section('css')
    <style>
        :root {
            --color1: #77c6c5;
            --color2: #fa9583;
            --color3: #449e9d;
            --color4: #edf5f5;
            --color2-hover: #e48170;
            --color3-hover: #398786;
            --color5-head-modal: #048482;
        }

        .modal-dialog {
            margin: 0;
            position: absolute;
            top: 30%;
            left: 42%;
            transform: translate(-50%, -50%);
            width: 450px;
        }

        .modal-radius {
            border-radius: 1.5rem;
            border-color: none;
        }

        .modal-header-radius {
            border-radius: 1.5rem 1.5rem 0rem 0rem;
        }

        .background2 {
            background-color: var(--color5-head-modal);
            color: white
        }

        .button-footer {
            padding-left: 35px;
            padding-right: 35px;
            padding-top: 10px;
            padding-bottom: 35px;
        }

        .button-footer .btn {
            width: 100%;
            height: 45px;
        }

        .input-modal {
            height: 45px;
            border: 1px solid #dddddd;
            font-size: 13px;
            color: var(--color3);
            font-weight: 500;
        }

        .position {
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            z-index: 1;
            color: #a5d8d8;
        }

        .position-main {
            position: absolute;
            top: 50%;
            left: 20px;
            transform: translateY(-50%);
            z-index: 1;
            color: var(--color3);
        }

        .text-end .btn-edit {
            height: 50px;
            width: 50px;
            background-color: #77c6c5;
            border-color: #77c6c5;
        }

        .text-end .btn-delete {
            height: 50px;
            width: 50px;
            background-color: #fa9583;
            border-color: #fa9583;
        }

        .subject,
        .card-text,
        label {
            color: var(--color3);
        }

        .background {
            background-color: #fafafa;
            border-right: 2px solid #e8e8e8;
            min-height: 100vh;

        }

        .modalshow {
            background-color: var(--color4);
            border-right: 2px solid #e8e8e8;
            border-left: 2px solid #e8e8e8;
            border-bottom: 4px solid #dcdbdb;
            border-top: 1px solid #e8e8e8;
            border-radius: 4%;
            min-height: 100%;
            display: grid;
            grid-template-rows: auto 1fr auto;
        }

        .card,
        .col-5,
        .col-7 {
            height: 90px;
        }

        .card {
            margin-top: 0.5rem;
        }

        h6,
        .card-text,
        .btn-add {
            font-weight: 1000;
        }

        h6 {
            display: flex;
            align-items: center;
        }

        i {
            font-size: 24px;
            margin-right: 5px;
        }

        .img {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .btn-save,
        .save-asset {
            width: 100%;
            height: 50px;
            background-color: var(--color2);
            border-color: var(--color2);
        }

        .btn-add {
            width: 100%;
            height: 50px;
            background-color: var(--color4);
            border-color: var(--color3);
            color: var(--color3);
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .btn-save,
        .save-asset:hover {
            background-color: var(--color2-hover);
            border-color: var(--color2-hover);
        }

        .btn-add:hover {
            background-color: var(--color3-hover);
            border-color: var(--color3-hover);
        }

        .modal-body .fa-newspaper,
        .fa-th-list {
            color: #fa9583;
        }

        .use-url {
            background-color: #a1dcdb;
            border: 10px solid #048482;
            border-width: 2px;
        }
    </style>
@stop
@section('content')
    <div class="row">
        <div class="col-8 background">
            <div class="category ml-3 pr-3">
                <div class="subject mt-5">
                    <h6><i class="fas fa-warehouse"></i>&nbsp;คลังเก็บอุปกรณ์ และทรัพย์สินบริษัท</h6>
                </div>
                <div class="row mt-3">

                    <div class="col-4">
                        <a href="{{ route('supply.list') }}">
                            <div class="card border border-1 rounded-4 use-url">
                                <div class="row">
                                    <div class="col-4">
                                        <div>
                                            <img src="https://img2.pic.in.th/pic/image6770fa0315b4f236.png"
                                                class="img border border-0 rounded-start-4" alt="...">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="card-body">
                                            <p class="card-text asset text-md">
                                                หมวดหมู่<br />ทรัพย์สิน</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-4 ">
                        <a href="">
                            <div class="card border border-2 p-0 rounded-4">
                                <div class="row">
                                    <div class="col-4">
                                        <div>
                                            <img src="https://img5.pic.in.th/file/secure-sv1/image7b5f4378e096ae19.png"
                                                class="img border border-0 rounded-start-4 " alt="...">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="card-body">
                                            <p class="card-text text-md">หมวดหมู่<br />อุปกรณ์</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="subject mt-3">
                    <h6><i class="fas fa-users"></i>&nbsp;บุคลากร</h6>
                </div>
                <div class="row mt-3">

                    <div class="col-4">
                        <a href="#">
                            <div class="card border border-2 p-0 rounded-4">
                                <div class="row">
                                    <div class="col-5">
                                        <div>
                                            <img src="https://img5.pic.in.th/file/secure-sv1/image5f0854f04d753aa9.png"
                                                class="img border border-0 rounded-start-4 " alt="...">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="card-body">
                                            <p class="card-text asset text-md">แผนก<br />และตำแหน่ง</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="subject mt-3">
                    <h6><i class="fas fa-chalkboard-teacher"></i>&nbsp;งานอำนวยการ</h6>
                </div>
                <div class="row mt-3">

                    <div class="col-4">
                        <a href="#">
                            <div class="card border border-2 p-0 rounded-4">
                                <div class="row">
                                    <div class="col-5">
                                        <div>
                                            <img src="https://img2.pic.in.th/pic/imageb4cb7bea4858d6f2.png"
                                                class="img border border-0 rounded-start-4 " alt="...">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="card-body">
                                            <p class="card-text asset text-md">อาคาร<br />สถานที่</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-4">
                        <a href="#">
                            <div class="card border border-2 p-0 rounded-4">
                                <div class="row">
                                    <div class="col-5">
                                        <div>
                                            <img src="https://img2.pic.in.th/pic/image53c53a821f149850.png"
                                                class="img border border-0 rounded-start-4 " alt="...">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="card-body">
                                            <p class="card-text asset text-md">รักษาความ<br />ปลอดภัย</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-4">
                        <a href="#">
                            <div class="card border border-2 p-0 rounded-4">
                                <div class="row">
                                    <div class="col-5">
                                        <div>
                                            <img src="https://img5.pic.in.th/file/secure-sv1/imagec9935e47feb7b813.png"
                                                class="img border border-0 rounded-start-4 " alt="...">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="card-body">
                                            <p class="card-text asset text-md">รักษา<br />ความสะอาด</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-4">
                        <a href="#">
                            <div class="card border border-2 p-0 rounded-4">
                                <div class="row">
                                    <div class="col-5">
                                        <div>
                                            <img src="https://img5.pic.in.th/file/secure-sv1/image5661b92d7a8b5f0c.png"
                                                class="img border border-0 rounded-start-4 " alt="...">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="card-body mt-2">
                                            <p class="card-text asset text-md">ซ่อมบำรุง</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-4">
                        <a href="#">
                            <div class="card border border-2 p-0 rounded-4">
                                <div class="row">
                                    <div class="col-5">
                                        <div>
                                            <img src="https://img5.pic.in.th/file/secure-sv1/image45363540426699d0.png"
                                                class="img border border-0 rounded-start-4 " alt="...">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="card-body mt-2">
                                            <p class="card-text asset text-md">เบิกอุปกรณ์</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="subject mt-3">
                    <h6><i class="fas fa-calendar-alt"></i>&nbsp;วันและเวลาทำงาน</h6>
                </div>
                <div class="row mt-3">

                    <div class="col-4">
                        <a href="#">
                            <div class="card border border-2 p-0 rounded-4">
                                <div class="row">
                                    <div class="col-5">
                                        <div>
                                            <img src="https://img2.pic.in.th/pic/imagec5a1265e197a94a7.png"
                                                class="img border border-0 rounded-start-4 " alt="...">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="card-body">
                                            <p class="card-text asset text-md">เวลาเข้า-ออก<br />การทำงาน</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-4 ">
                        <a href="#">
                            <div class="card border border-2 p-0 rounded-4">
                                <div class="row">
                                    <div class="col-5">
                                        <div>
                                            <img src="https://img5.pic.in.th/file/secure-sv1/image91511f872f7efdb4.png"
                                                class="img border border-0 rounded-start-4 " alt="...">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="card-body">
                                            <p class="card-text asset text-md">วันหยุด<br />ประจำปี</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-4 pr-4 pl-4 pb-5 pt-3">
            <div class="modalshow p-4">
                <div class="subject">
                    <h6><i class="fas fa-th-large"></i>&nbsp;หมวดหมู่ทรัพย์สิน</h6>
                </div>
                <div class="property-category my-2">
                    <div class="row mt-1 list_supply" id="list_supply"></div>
                    <button type="button" class="btn btn-secondary rounded-pill mt-3 btn-add"><i
                            class="fa-solid fa-plus"></i>
                        เพิ่มหมวดหมู่</button>
                </div>
                <div class="button">
                    <button type="button" class="btn btn-secondary rounded-pill btn-save">บันทึก</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true"
        data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content modal-radius">
                <div class="modal-header background2 modal-header-radius">
                    <h6 class="modal-title" id="categoryModalLabel"><i class="fa-solid fa-file-circle-plus"></i></h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="assetForm">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3 pr-3 pl-3">
                            <label for="category_name" class="col-form-label"><i
                                    class="fas fa-th-list text-sm"></i>ชื่อหมวดหมู่</label>
                            <input type="text" class="form-control input-modal rounded-pill" id="category_name"
                                name="category_name" required>
                        </div>
                        <div class="pr-3 pl-3">
                            <label for="category_code" class="col-form-label"><i
                                    class="fas fa-newspaper text-sm"></i>รหัสหมวดหมู่ (กำหนดตัวอักษรภาษาอังกฤษ 3
                                อักษร)</label>
                            <input type="text" class="form-control input-modal rounded-pill" id="category_code"
                                name="category_code" required>
                        </div>
                    </form>
                </div>
                <div class="button-footer">
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn card-text" data-bs-dismiss="modal">ยกเลิก</button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-secondary rounded-pill save-category">ยืนยัน</button>
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
                            var Item = `
                            <div class="test">
                                    <div class="row">
                                        <div class="col-9">
                                            <div class="input-group pt-2">
                                                <input type="text" class="form-control rounded-pill bg-white text-sm"
                                                    style="border-color: #c0e7e7; height: 45px;" disabled>
                                                <label class="position-main pt-2">${categoryName}</label>
                                                <label class="position pt-2">#${categoryCode}</label>
                                            </div>
                                        </div>
                                        <div class="col-3 text-end pl-0 pr-0 p-1">
                                            <button class="btn btn-sm rounded-pill btn-success btn-edit" data-id="${categoryId}"
                                                data-ac="edit" data-bs-toggle="modal" data-bs-target="#assetModal"><em
                                                    class="fas fa-edit" style="font-size: 20px;"></em></button>
                                            <button class="btn btn-sm rounded-pill btn-danger btn-delete" data-id="${categoryId}"><em
                                                    class="fas fa-trash-alt" style="font-size: 20px;"></em></button>
                                        </div>
                                    </div>
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
