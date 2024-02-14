@extends("adminlte::page")

@section('content_header_title')
รายละเอียดแม่แบบเงินเดือน
@stop
@section('content_header')
<li class="breadcrumb-item"><a href="{{ url('/home') }}">หน้าแรก</a></li>
<li class="breadcrumb-item"><a href="{{ url('/saraly/template/list') }}">แม่แบบเงินเดือน</a></li>
<li class="breadcrumb-item active"> รายละเอียดแม่แบบเงินเดือน </li>
@stop
@section('css')
<style>
    .button {
        text-align: right;
    }

    .custom-border {
        border: 1px solid #ececec;
    }

    .divider {
        border-right: 1px solid #ececec;
    }
</style>
@stop
{{-- end header --}}
@section('content')

<div class="container custom-border card">
    <div class="row">
        <div class="col-6 divider left" id="left-layout">


        </div>
        <div class="col-6 right" id="right-layout">

        </div>
    </div>
    <div class="row">
        <div class="col-6 divider">
            <div class="button mb-3">
                <button type="button" class="rounded-pill btn btn-primary btn-add-left"><i class="fas fa-plus"></i></button>
            </div>
        </div>
        <div class="col-6">
            <div class="button mb-3">
                <button type="button" class="rounded-pill btn btn-primary btn-add-right"><i class="fas fa-plus"></i></button>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-6">
            <div class="button mb-3">
                
            </div>
        </div>
        <div class="col-6">
            <div class="button mb-3">
                <button type="button" class="btn btn-primary btn-save-template">บันทึกแม่แบบ</button>
            </div>
        </div>
    </div>
</div>



@stop


@section('js')
<script>
    $(() => {

        var arrayItem = [
            // {
            //     "id": 1,
            //     "template_id": "1",
            //     "detail": "555",
            //     "position": 1,
            //     "type": "left"
            // },
            // {
            //     "id": 2,
            //     "template_id": "1",
            //     "detail": "555",
            //     "position": 1,
            //     "type": "right"
            // }
        ];
        var id = "{{ $param }}";
        $.ajax({
                type: 'post',
                url: "{{ route('api.v1.salary.template.detail.get.by.id.template') }}",
                data: {
                    'id': id,
                },
                success: function(response) {
                    arrayItem = response;
                    itemList();
                    //console.log(arrayItem);
                }
            });

        function itemFormath(id, detail, position, type) {
            return {
                id,
                detail,
                position,
                type
            };
        }
        

        itemList();

        function itemList() {
            $('#left-layout').html('');
            $('#right-layout').html('');
            // console.log("refresh");
            arrayItem.forEach(function(item) {
                //console.log(item);
                switch (item.type) {
                    case 'left':
                        // สร้าง element div สำหรับแสดงข้อมูลของ type left
                        var leftDiv = document.getElementById('left-layout');
                        var row = document.createElement('div');
                        row.classList.add('row');

                        // สร้างข้อมูลที่จะแสดงใน div ด้วย innerHTML
                        row.innerHTML = `
                                <div class="col-9">
                                    <div class="input-group mb-1">
                                        <input type="text" class="form-control detail-value" data-id="${item.id}" value="${item.detail}">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <input type="text" class="form-control" value="${item.position}">
                                </div>
                                <div class="col-1 mt-1">
                                    <button type="button" class="rounded-pill btn-delete-template" data-id="${item.id}"><i class="fas fa-minus"></i></button>
                                </div>
                            `;
                        leftDiv.appendChild(row);

                        break;
                    case 'right':
                        // สร้าง element div สำหรับแสดงข้อมูลของ type right
                        var rightDiv = document.getElementById('right-layout');
                        var row = document.createElement('div');
                        row.classList.add('row');

                        // สร้างข้อมูลที่จะแสดงใน div ด้วย innerHTML
                        row.innerHTML = `
                        <div class="col-9">
                                    <div class="input-group mb-1">
                                        <input type="text" class="form-control detail-value" data-id="${item.id}" value="${item.detail}">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <input type="text" class="form-control" value="${item.position}">
                                </div>
                                <div class="col-1 mt-1">
                                    <button type="button" class="rounded-pill btn-delete-template" data-id="${item.id}"><i class="fas fa-minus"></i></button>
                                </div>
                            `;
                        rightDiv.appendChild(row);

                        break;
                }

            });
        }


        $(document).on('change', '.detail-value', function() {
            var detailValue = $(this).val();
            var id = $(this).data('id');
            // ค้นหาและอัพเดทข้อมูลใน arrayItem
            arrayItem.forEach(function(item) {
                if (item.id === id) {
                    item.detail = detailValue;
                }
            });

            //
            //console.log(arrayItem); // ตรวจสอบ arrayItem หลังจากอัพเดท detail
            itemList();

        });


        $('.btn-add-left').on('click', function() {
            var latestLeftItem = {
                id: 0,
                position: 0
            };
            for (var i = arrayItem.length - 1; i >= 0; i--) {
                if (arrayItem[i].type === 'left') {
                    latestLeftItem = arrayItem[i];
                    break;
                }
            }
            arrayItem.push(itemFormath(arrayItem.length + 1, '', parseInt(latestLeftItem.position) + 1, 'left'));
            //console.log(arrayItem);
            var index_left = 1;
                for (var i = 0; i < arrayItem.length; i++) {
                    var data = arrayItem[i];
                    if (arrayItem[i].type === 'left') {
                        arrayItem[i].position = index_left++;
                     }
                }
            itemList();
        });

        $('.btn-add-right').on('click', function() {
            var latestLeftItem = {
                id: 0,
                position: 0
            };
            for (var i = arrayItem.length - 1; i >= 0; i--) {
                if (arrayItem[i].type === 'right') {
                    latestLeftItem = arrayItem[i];
                    break;
                }
            }
            arrayItem.push(itemFormath(arrayItem.length + 1, '', parseInt(latestLeftItem.position) + 1, 'right'));
            //console.log(arrayItem);
            var index_right = 1;
                for (var i = 0; i < arrayItem.length; i++) {
                    var data = arrayItem[i];
                    if (arrayItem[i].type === 'right') {
                        arrayItem[i].position = index_right++;
                     }
                }
            itemList();    
        });

        $(document).on('click', '.btn-delete-template', function() {

            var id = $(this).data('id');
            //console.log(arrayItem);
            var filteredArray = $.grep(arrayItem, function(item) {
                return item.id != id; // เงื่อนไข: filter ทุก item ที่ไม่เท่ากับ id
            });
            arrayItem = filteredArray;

            itemList();
            
        })
        
        $(document).on('click', '.btn-save-template', function() {
            
            var templateData = arrayItem;
            $.ajax({
                type: 'post',
                url: "{{ route('api.v1.salary.template.detail.create') }}",
                data: {
                    'data':templateData,
                    'templateId':id
                },
                success: function(response) {
                    //console.log(response.status);
                    if (response.status == 'Success') {
                                    Swal.fire({
                                        title: 'ดำเนินการเรียบร้อยแล้ว',
                                        icon: 'success',
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

        })
    });
</script>
@stop