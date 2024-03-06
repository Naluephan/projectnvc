@extends("adminlte::page")

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
        right: 20px;
        /* ปรับตำแหน่งตามที่ต้องการ */
        transform: translateY(-50%);
        z-index: 1;
        /* ให้ข้อความอยู่ด้านบนของ input */
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
                                <img src="https://media.discordapp.net/attachments/1068009652882772048/1213840762593345617/IMG_2033.jpg?ex=65f6f04d&is=65e47b4d&hm=3c9f20a33d307983ff42ac8da496ff3b4fbd997f08807cec20aed5bd1111af0e&=&format=webp&width=496&height=662" class="border border-0 rounded-start-4 " alt="..." style="position: absolute; width: 100%; height: 100%; object-fit: cover; ">
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
                                <img src="https://media.discordapp.net/attachments/1068009652882772048/1214529412264103936/IMG_1986.jpg?ex=65f971a8&is=65e6fca8&hm=e0ea36feaf9aeeff5707233e3e5b7e6a3d61046097461e9d777cb08641e133f2&=&format=webp&width=328&height=437" class="border border-0 rounded-start-4 " alt="..." style="position: absolute; width: 100%; height: 100%; object-fit: cover; ">
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
                                <img src="https://media.discordapp.net/attachments/1068009652882772048/1214529412264103936/IMG_1986.jpg?ex=65f971a8&is=65e6fca8&hm=e0ea36feaf9aeeff5707233e3e5b7e6a3d61046097461e9d777cb08641e133f2&=&format=webp&width=328&height=437" class="border border-0 rounded-start-4 " alt="..." style="position: absolute; width: 100%; height: 100%; object-fit: cover; ">
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
                                <img src="https://media.discordapp.net/attachments/1068009652882772048/1214529412264103936/IMG_1986.jpg?ex=65f971a8&is=65e6fca8&hm=e0ea36feaf9aeeff5707233e3e5b7e6a3d61046097461e9d777cb08641e133f2&=&format=webp&width=328&height=437" class="border border-0 rounded-start-4 " alt="..." style="position: absolute; width: 100%; height: 100%; object-fit: cover; ">
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
            <div class="row list_asset" id="list_asset">
                <!-- <div class="col-10">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control rounded-pill" disabled>
                        <label class="position">#</label>
                    </div>
                </div>
                <div class="col-1">
                    <button class="btn btn-sm rounded-pill  btn-success"><em class="fas fa-edit"></em></button>
                </div>
                <div class="col-1">
                    <button class="btn btn-sm rounded-pill  btn-danger"><em class="fas fa-trash-alt"></em></button>
                </div> -->
            </div>
        </div>

        <button type="button" class="btn btn-outline-success rounded-pill btn-add" style="width: 100%; "><i class="fa-solid fa-plus"></i> เพิ่มหมวดหมู่</button>
    </div>
</div>


<div class="modal fade" id="assetModal" tabindex="-1" aria-labelledby="assetModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="assetModalLabel">หมวดหมู่ทรัพย์สิน</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="assetForm">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="cetegory_name" class="col-form-label">ชื่อหมวดหมู่ :</label>
                        <input type="text" class="form-control rounded-pill" id="cetegory_name" name="cetegory_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="cetegory_code" class="col-form-label">รหัสหมวดหมู่ : (กำหนดตัวอักษรภาษาอังกฤษ 3 อักษร)</label>
                        <input type="text" class="form-control rounded-pill" id="cetegory_code" name="cetegory_code" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                <button type="button" class="btn btn-success save-asset">บันทึก</button>
            </div>
        </div>
    </div>
</div>

@stop


@section('js')
<script>
    $(() => {
        getAssetCategory();
        function getAssetCategory() {
            let id = "{{ Auth::user()->id }}";
            const listAsset = document.getElementById('list_asset');
            listAsset.innerHTML = '';
            $.ajax({
                type: 'post',
                url: "{{ route('api.v1.asset.category.list') }}",
                data: {
                    'id': id,
                },
                dataType: "json",
                success: function(response) {
                    //console.log(response);
                    var assetContainer = $(".list_asset");
                    response.forEach(function(assetInfo) {
                        var cetegoryId = assetInfo.id;
                        var cetegoryName = assetInfo.cetegory_name;
                        var cetegoryCode = assetInfo.cetegory_code;
                        var Item = `
                        <div class="col-10">
                            <div class="input-group mb-3">
                            <input type="text" class="form-control rounded-pill text-center" value="${cetegoryName}" disabled >
                            <label class="position">#${cetegoryCode}</label>
                            </div>
                        </div>
                        <div class="col-1">
                            <button class="btn btn-sm rounded-pill  btn-success btn-edit" data-id="${cetegoryId}" data-ac="edit" data-bs-toggle="modal" data-bs-target="#assetModal"><em class="fas fa-edit"></em></button>
                        </div>
                        <div class="col-1">
                            <button class="btn btn-sm rounded-pill btn-danger btn-delete" data-id="${cetegoryId}"><em class="fas fa-trash-alt"></em></button>
                        </div>
                            `;
                        assetContainer.append(Item);
                    });
                },
            });
        }

        var asset_modal = $("#assetModal");
            $(document).on('click', '.btn-add', function() {
                asset_modal.modal('show')
            })


            $(document).on('click', '.save-asset', function() {
                let id = $("#id").val();
                let assetForm = $("#assetForm");
                if (assetForm.valid()) {
                    const formData = new FormData($("#assetForm")[0]);
                    const data = Object.fromEntries(formData.entries());
                    if (id.length == 0) {

                        $.ajax({
                            type: 'post',
                            url: "{{ route('api.v1.asset.category.create') }}",
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
                                    asset_modal.modal('hide');
                                    getAssetCategory();
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
                            url: "{{ route('api.v1.asset.category.update') }}",
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
                                    asset_modal.modal('hide');
                                    getAssetCategory();
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
                    url: "{{ route('api.v1.asset.category.by.id') }}",
                    data: {
                        'id': id
                    },
                    dataType: "json",
                    success: function(response) {
                        setAssetFormData(response);
                        $("#id").val(response.id);
                        asset_modal.modal('show')
                    }
                });
            })
            function setAssetFormData(data) {
                $("#cetegory_name").val(data.cetegory_name);
                $("#cetegory_code").val(data.cetegory_code);
            }

            asset_modal.on('show.bs.modal', function(event) {
                let btn = $(event.relatedTarget);
                let title = btn.data('ac') === 'edit' ? '<em class="fas fa-edit"></em> แก้ไขรายการ' : '<i class="fas fa-file-circle-plus"></i> สร้างรายการใหม่';
                //console.log(btn.data('ac'));
                let obj = $(this);
                obj.find('.modal-title').html(title);
            });

            asset_modal.on('hide.bs.modal', function() {
            let obj = $(this);
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
                            url: "{{ route('api.v1.asset.category.delete') }}",
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
                                    getAssetCategory();
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