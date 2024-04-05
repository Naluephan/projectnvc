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

    /* color */
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
    .btn-color-delete {
        background-color: var(--color2);
        border-color: var(--color2);
        color: white;
    }
    .btn-border {
        border-color: var(--color1);
        color: var(--color1);
    }
    .background{
        background-color: var(--color4);
    }
    .background2{
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

    .position {
    position: absolute;
    top: 50%;
    right: 100px; /* ปรับตำแหน่งตามที่ต้องการ */
    transform: translateY(-50%);
    z-index: 1; /* ให้ข้อความอยู่ด้านบนของ input */
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
            <div class="col-4">
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
        <div class="container p-4 m-2 rounded-3 background shadow-sm">
            <div class="row">
                <h6><i class="fa-solid fa-layer-group"></i> หมวดหมู่ข่าวสาร</h6>
                <div class="col-10">
                    <div class="input-group mb-3">
                        <input type="text" data-id="${news_name}" class="form-control rounded-pill btn-border bg-white" disabled>
                        <label class="position text-teal list_news" id="list_news" ></label>
                    </div>
                </div>
                <div class="col-1 list_news">
                    <button class="btn btn-md rounded-pill btn-add btn-edit" data-id="${news_id}"><em class="fas fa-edit"></em></button>
                </div>
                <div class="col-1 list_news">
                    <button class="btn btn-md rounded-pill btn-delete btn-color-delete" data-id="${news_id}"><em class="fas fa-trash-alt"></em></button>
                </div>
            </div>
            <button type="button" class="btn btn-border rounded-pill addNews" id="addNews" data-bs-toggle="modal" data-bs-target="#newsModal" style="width: 100%; "><i class="fa-solid fa-plus"></i> เพิ่มหมวดหมู่</button>
        </div>
    </div>
</div>
{{-- modal --}}

<div class="modal fade" id="newsModal" tabindex="-1" aria-labelledby="newsModalLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content modal-radius">
      <div class="modal-header background2 modal-header-radius">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-file-circle-plus"></i> เพิ่มข่าวสาร</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id ="news_FromModal">
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label"><i class="fa-regular fa-newspaper"></i>รหัสข่าว</label>
                <input type="text" class="form-control rounded-pill" id="news_id" name="news_id" required>
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label"><i class="fa-regular fa-newspaper"></i> หัวข้อข่าวสาร</label>
                <input type="text" class="form-control rounded-pill" id="news_name" name="news_name" required>
            </div>
            <div class="mb-3">
                <label for="message-text" class="col-form-label"><i class="fa-regular fa-newspaper"></i> รายละเอียด</label>
                <textarea class="form-control rounded-pill" id="news_details" name="news_details"></textarea>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn text-color" data-bs-dismiss="modal">ยกเลิก</button>
        <button type="button" class="btn btn-color-delete rounded-pill save-new" id="save-new">ยืนยัน</button>
      </div>
    </div>
  </div>
</div>


@stop


@section('js')
<script>
    $(() => {
        getNewsCategory();
        function getNewsCategory() {
            let id = "{{ Auth::user()->id }}";
            const listNews = document.getElementById('list_news');
            listNews.innerHTML = '';
            $.ajax({
                type: "POST",
                url: "{{ route('api.v1.category.list') }}",
                data: {'id': id},
                datatype: "JSON",
                success: function (response) {
                    var newsContainer = $('.list_news');
                    response.forEach(function(newsCategory) {
                        var news_id = newsCategory.news_id;
                        var news_name = newsCategory.news_name;
                        var news_details = newsCategory.news_details;

                        // var Item =`
                        // <div class="col-10">
                        //     <div class="input-group mb-3">
                        //     <input type="text" class="form-control rounded-pill text-center" value="${news_name}" disabled >
                        //     <label class="position">#${news_name}</label>
                        //     </div>
                        // </div>
                        // <div class="col-1">
                        //     <button class="btn btn-sm rounded-pill  btn-success btn-edit" data-id="${news_id}" data-ac="edit" data-bs-toggle="modal" data-bs-target="#assetModal"><em class="fas fa-edit"></em></button>
                        // </div>
                        // <div class="col-1">
                        //     <button class="btn btn-sm rounded-pill btn-danger btn-delete" data-id="${news_id}"><em class="fas fa-trash-alt"></em></button>
                        // </div>
                        // `;
                        // newsContainer.append(Item);
                    });
                },
            });
        }

        var news_model = $('#newsModal');
        $(document).on('click', '.addNews', function() {
            news_model.modal('show')
        })

         ////// save news //////
        $(document).on('click', '#save-new', function() {
            let news_FromModal = $('#news_FromModal');
        if (news_FromModal.valid()) {
            let news_id = $('#news_id').val();
            let news_name = $('#news_name').val();
            let news_details = $('#news_details').val();
            
            let data = {
                news_id: news_id,
                news_name: news_name,
                news_details: news_details
            };
console.log(news_id);
console.log(news_name);
console.log(news_id);
            $.ajax({
                type: 'POST',
                url: "{{ route('api.v1.news.category.update') }}",
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.status == 'Save Successfully') {
                        Swal.fire({
                            title: 'ดำเนินการเรียบร้อยแล้ว',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2000,
                            toast: true
                        });
                        $('#newsModal').modal('hide');
                        getNewsCategory();
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
        }
        });


        ////// update news //////

        ////// edit news //////
        $(document).on('click', '.btn-edit', function() {
                let id = $(this).data('id');
                $.ajax({
                    type: 'post',
                    url: "{{ route('api.v1.news.category.by.id') }}",
                    data: {
                        'id': id
                    },
                    dataType: "json",
                    success: function(response) {
                        setcategoryFormData(response);
                        $("#id").val(response.id);
                        news_model.modal('show')
                    }
                });
            })
            function setcategoryFormData(data) {
                $("#news_name").val(data.news_name);
                $("#details_news").val(data.news_details);
            }
            news_model.on('show.bs.modal', function(event) {
                let btn = $(event.relatedTarget);
                let title = btn.data('ac') === 'edit' ? "แก้ไขหัวข้อข่าว" : "เพิ่มหัวข้อข่าว";
                console.log(btn.data('ac'))
                let obj = $(this);
                obj.find('.modal-title').text(title)
            })
            news_model.on('hide.bs.modal', function() {
            let obj = $(this);
            obj.find('#news_name').val("");
            obj.find('#details_news').val("");
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
                    confirmButtonColor: '#e83e3e',
                    cancelButtonColor: '#bb93ab',
                    confirmButtonText: 'ยืนยัน',
                    cancelButtonText: 'ปิด'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'post',
                            url: "{{ route('api.v1.news.category.delete') }}",
                            data: {
                                'id': id
                            },
                            dataType: "json",
                            success: function(response) {
                                if (response.status == 'Delete Successfully') {
                                    Swal.fire({
                                        title: 'ดำเนินการเรียบร้อยแล้ว',
                                        icon: 'success',
                                        showConfirmButton: false,
                                        timer: 2000,
                                        toast: true
                                    });
                                    getNewsCategory();

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