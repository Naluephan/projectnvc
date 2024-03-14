@extends('setting_menu')
<style>
    .btn-danger  {
        color: #fff !important;
        border-color: #e6896a !important;
        background-color: #e6896a !important;
    }
    .btn-danger:hover {
        color: #e6896a !important;
        background-color: #fff !important;
        border-color: #e6896a !important;
    }
    .btn-success  {
        color: #fff !important;
        border-color: #77c6c5 !important;
        background-color: #77c6c5 !important;
    }
    .btn-success:hover {
        color: #77c6c5 !important;
        background-color: #fff !important;
        border-color: #77c6c5 !important;
    }
    div {
        color: #136E68;
    }
    .modal-body i {
        color: #FA9583;
        font-size: 1.2rem;
        margin: 0.5rem;
    }
    .form-control {
        background-color: #fff !important;
        color: #77c6c5 !important;
        border-color: #77c6c5 !important;
    }

</style>

@section('side-card')
    <div class="row">
        <div class="col-12">
            <div class="container p-4 m-2 rounded-3 shadow-sm bg-hr-card">
                <div class="row">
                    <h6><i class="fa-solid fa-layer-group"></i> หมวดหมู่ข่าวสาร</h6>
                    <div class="row list_news" id="list_news">
                    </div> 
                </div>
                <button type="button" class="form-control btn btn-outline-success rounded-pill addNews" id="addNews" data-bs-toggle="modal" data-bs-target="#newsModal" style="width: 100%; "><i class="fa-solid fa-plus"></i> เพิ่มหมวดหมู่</button> 
            </div>
        </div>
    </div>

    {{-- modal --}}
    <div class="modal fade" id="newsModal" tabindex="-1" aria-labelledby="newsModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content modal-radius">
        <div class="modal-header bg-hr-green-app modal-header-radius">
            <h5 class="modal-title text-white" id="exampleModalLabel"><i class="fa-solid fa-file-circle-plus"></i> เพิ่มข่าวสาร</h5>
            {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
        </div>
        <div class="modal-body">
            <form id ="news_FromModal">
                {{-- <div class="mb-3">
                    <label for="recipient-name" class="col-form-label"><i class="fa-regular fa-newspaper"></i> รหัสข่าว</label>
                    <input type="text" class="form-control rounded-pill" id="id" name="id" required>
                </div> --}}
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
        <div class="row p-4 ">
            <div class="row">
                <button type="button" class="btn btn-outline-success rounded-pill col-5 mx-auto p-3" data-bs-dismiss="modal">ยกเลิก</button>
                <button type="button" class="btn btn-danger rounded-pill save-new col-5 mx-auto p-3" id="save-new">ยืนยัน</button>
            </div>
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
                url: "{{ route('api.v1.news.category.list') }}",
                data: {'id': id,},
                datatype: "JSON",
                success: function (response) {
                    var newsContainer = $('.list_news');
                    response.forEach(function(newsCategory) {
                        var id = newsCategory.id;
                        // var newsId = newsCategory.id;
                        var newsName = newsCategory.news_name;
                        var newsDetails = newsCategory.news_details;
                        var Item =`
                                <div class="col-10">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control rounded-pill" value="${newsName}" disabled readonly>
                                        <label class="left rounded-pill "></label>
                                    </div>
                                </div>
                                <div class="col-1">
                                    <button class="btn btn-success btn-md rounded-pill btn-edit" data-id="${id}" data-ac="edit" data-bs-toggle="modal" data-bs-target="#newsModal"><em class="fas fa-edit"></em></button>
                                </div>
                                <div class="col-1">
                                    <button class="btn btn-danger btn-md rounded-pill btn-delete btn-color-delete" data-id="${id}"><em class="fas fa-trash-alt"></em></button>
                                </div>
                        `;
                        newsContainer.append(Item);
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
                    // let id = $('#id').val();
                    let news_name = $('#news_name').val();
                    let news_details = $('#news_details').val();
                    
                    let data = {
                        // id: id,
                        news_name: news_name,
                        news_details: news_details
                    };
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('api.v1.news.category.create') }}",
                        data: data,
                        dataType: "json",
                        success: function(response) {
                            if (response.data.status == 'Success') {
                                Swal.fire({
                                    title: 'ดำเนินการเรียบร้อยแล้ว',
                                    icon: 'success',
                                    showConfirmButton: false,
                                    timer: 2000,
                                    toast: true
                                });
                                news_model.modal('hide');
                                getNewsCategory();
                            } else {
                                    $.ajax({
                                    type: 'post',
                                    url: "{{ route('api.v1.news.category.update') }}",
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
                        }
                    });
                }else {
                    Swal.fire({
                        title: 'กรุณาตรวจสอบข้อมูล',
                        icon: 'warning',
                        showConfirmButton: false,
                        timer: 2000,
                        toast: true
                    });
                }
            });



        ////// update news //////
        // $(document).on('click', '.btn-edit', function() {
        //     let id = $(this).data('id');
            
        //     $.ajax({
        //         type: 'POST',
        //         url: "{{ route('api.v1.news.category.by.id') }}",
        //         data: { id: id },
        //         dataType: 'json',
        //         success: function(response) {
        //             $('#id').val(response.data.id);
        //             $('#news_name').val(response.data.news_name);
        //             $('#news_details').val(response.data.news_details);

        //             news_model.modal('show');
        //         },
        //         error: function(xhr, status, error) {
        //             console.error(xhr.responseText);
        //         }
        //     });
        // });

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
                        // setNewsCategoryFormData(response);
                        // $("#id").val(response.id);
                        // $("#id").val(response.id);
                        $("#news_name").val(response.news_name);
                        $("#news_details").val(response.news_details);
                        news_model.modal('show')
                        console.log(response);
                    }
                    // console.log(response);
                });
            })
            function setNewsCategoryFormData(data) {
                // $("#id").val(data.id);
                $("#news_name").val(data.news_name);
                $("#news_details").val(data.news_details);
            }
            news_model.on('show.bs.modal', function(event) {
                let btn = $(event.relatedTarget);
                let title = btn.data('ac') === 'edit' ? 'แก้ไขหัวข้อข่าว' : 'เพิ่มหัวข้อข่าว';
                // console.log(btn.data('ac'))
                let obj = $(this);
                obj.find('.modal-title').text(title)
            })
            news_model.on('hide.bs.modal', function() {
            let obj = $(this);
            // obj.find('#id').val("");
            obj.find('#news_name').val("");
            obj.find('#news_details').val("");
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
                                if (response.data.status == 'Success') {
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