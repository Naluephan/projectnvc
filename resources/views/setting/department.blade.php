@extends('setting_menu')
@section('side-card')

    <div class="card rounded-4 bg-hr-card">
        <div class="card-header border-0">
            <h6><i class="fas fa-th-large"></i> แผนกและตำแหน่ง</h6>
        </div>
        <div class="card-body">

        <button type="button" class="form-control btn btn-outline-success rounded-pill mt-3 btn-add" data-bs-toggle="modal" data-bs-target="#modal"><i class="fa-solid fa-plus"></i> เพิ่มข้อมูล</button>
        </div>
        <div class="card-footer bg-transparent">
            <button class="btn btn-hr-confirm form-control rounded-pill">บันทึก</button>
        </div>
    </div>

    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true"
         data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content modal-radius">
                <div class="modal-header background2 modal-header-radius">
                    <h6 class="modal-title" id="modalLabel"><i class="fa-solid fa-file-circle-plus"></i> เพิ่มข้อมูล</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="departmentForm">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3 pr-3 pl-3">
                            <label for="department_name" class="col-form-label text-color"><i class="fas fa-sitemap text-hr-orange"></i> แผนก</label>
                            <input type="text" class="form-control input-modal rounded-pill text-color" id="department_name" name="department_name" required>
                        </div>
                        <div class="mb-3 pr-3 pl-3">
                            <label for="department_img" class="col-form-label text-color"><i class="fas fa-image text-hr-orange"></i> รูปภาพสัญลักษณ์แผนก</label>
                            <div class="col-12 col-sm-12">
                                <div class="text-center">
                                    <input type="file" class="dropify" id="image_file" name="image_file" placeholder="">
                                </div>
                            </div>
                        </div>

                        <div class="pr-3 pl-3">
                            <label for="" class="col-form-label text-color"><i class="fas fa-user text-hr-orange"></i> ตำแหน่ง</label>
                            <div class="positions">
                                <div class="position_list input-group mb-3">
                                    <input type="text" class="form-control input-modal  rounded-start-pill text-color" id="position_name" name="position_name" required>
                                    <button class="btn rounded-end-pill border" type="button"><em class="fas fa-times-circle text-hr-orange"></em></button>
                                </div>

                            </div>
                        </div>
                        <div class="pr-3 pl-3">
                            <button type="button" class="form-control btn btn-outline-success rounded-pill mt-3 btn-add-position"> <i class="fas fa-plus"> เพิ่มรายการ</i></button>
                        </div>
                    </form>
                </div>
                <div class="button-footer">
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn card-text text-bold text-color" data-bs-dismiss="modal">ยกเลิก</button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-hr-confirm form-control rounded-pill save-department">บันทึก</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@stop
@section('js')
    <script>
        $(()=>{
            $('.dropify').dropify({
                tpl: {
                    message: '<div class="dropify-message"><span class="file-icon"/><p><h5>กรุณาเลือกไฟล์ภาพ</h5></p></div>',
                    preview: '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message"></p></div></div></div>',
                },
            });
            $(document).on('click','.btn-add-position',function(){
                addPosition();
            });
        });

        function addPosition(data=null){
            let position_id = ''
            let position_name = ''
            if(data){
                position_id = data.id;
                position_name = data.name;
            }
            $(".positions").append(` <div class="position_list input-group mb-3">
                                    <input type="text" class="form-control input-modal  rounded-start-pill text-color" id="position_name" name="position_name" data-position-id="${position_id}" value="${position_name}" required>
                                    <button class="btn rounded-end-pill border" type="button"><em class="fas fa-times-circle text-hr-orange"></em></button>
                                </div>`)
        }
    </script>
@stop
