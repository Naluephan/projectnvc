@extends('profile_menu')
@section('side-card-profile')
<style>
     .herder-icons
        .btn-edit ,.btn-special{
            color: #b9b9b9;
            background-color: #ebebeb;
            border-color: #ebebeb;
            width: 38px;
            height: 38px;
        
        }
        .toggle-radio {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }
        .herder-icons .btn-list {
            color: #ffff;
            background-color: #FA9583;
            border-color: #FA9583;
            width: 38px;
            height: 38px;
        }


        .content-edit {
            display: none;
        }

        .toggle-radio {
            width: 38px;
            height: 38px;
            cursor: pointer;
        }
</style>
<div class="herder-icons d-flex align-items-center justify-content-end">
    <div class="list">
        <input type="radio" id="list-toggle" name="toggle-option" checked data-toggle="toggle" data-width="100"
        class="toggle-radio"> 
        <label for="list-toggle" class="btn btn-sm rounded-pill btn-list active"><i class="fa-solid fa-award"
                style="font-size: 20px;"></i></label>
    </div>
    <div class="special ml-2">
        <input type="radio"  id="special-toggle" name="toggle-option" checked data-toggle="toggle" data-width="100"
        class="toggle-radio"> 
        <label for="special-toggle" class="btn btn-sm rounded-pill btn-special"><i class="fa-solid fa-crown text-md pt-1"
                ></i></label>
    </div>
    <div class="edit ml-2">
        <input type="radio" id="edit-toggle"  name="toggle-option" checked data-toggle="toggle" data-width="100"
        class="toggle-radio">  
           <label for="edit-toggle" class="btn btn-sm rounded-pill btn-edit"><i class="fa-solid fa-file-pen text-md pt-1"
            ></i></label>
    </div>
</div>
    <div class="card rounded-4 mt-2 bg-hr-card">
        <div class="card-header border-0">
            <h6><b><i class="fa-sharp fa-solid fa-award text-color" style="font-size: 25px; margin-right:10px"></i>
                    เกียรติประวัติ (ตามมาตรฐาน)</h6></b>
        </div>
        <div class="card-body">
            <svg width="15" height="15" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"
                fill="#e6896a" style="margin-right: 10px">
                <path
                    d="M24 17.99l-7.731-.001 2.731 4h-1.311l-2.736-4h-1.953l-2.736 4h-1.264l2.732-4h-2.95v-1h8.218v-1h3v1h3v-14h-17v.447h-1v-1.447h19v16zm-17.241-9c.649 0 1.293-.213 1.692-.436.755-.42 2.695-1.643 3.485-2.124.215-.13.496-.082.654.114l.009.01c.164.205.145.5-.043.68l-3.371 3.214c-.521.498-.822 1.183-.853 1.902-.095 2.207-.261 6.912-.332 8.834-.016.45-.386.806-.836.806h-.001c-.444 0-.786-.348-.836-.788-.111-.982-.329-3.279-.427-4.212-.04-.384-.279-.613-.584-.614-.304-.002-.523.226-.548.608-.062.921-.266 3.249-.342 4.221-.034.441-.397.785-.84.785h-.001c-.452 0-.823-.356-.842-.809-.097-2.34-.369-8.963-.369-8.963l-1.287 2.331c-.14.254-.445.364-.715.26l-.001-.001c-.228-.088-.371-.305-.371-.54l.022-.157 1.244-4.393c.122-.43.515-.727.963-.727h4.53zm7.241 2h5v-1h-5v1zm0-2h7v-1h-7v1zm-8.626-5c1.241 0 2.25 1.008 2.25 2.25s-1.009 2.25-2.25 2.25c-1.242 0-2.25-1.008-2.25-2.25s1.008-2.25 2.25-2.25zm8.626 3h7v-1h-7v1z" />
            </svg>
            <label class="mt-3 mb-0 text-color">การอบรมมาตราฐานการให้บริการ</label>
            {{-- <button type="button" class="form-control btn btn-outline-success rounded-pill mt-3 btn-add"><i
                    class="fa-solid fa-plus"></i>
                เพิ่มหมวดหมู่</button> --}}
        </div>
        {{-- <div class="card-footer bg-transparent">
            <button class="btn btn-hr-confirm form-control rounded-pill">บันทึก</button>
        </div> --}}
    </div>

@stop
@section('js')
    <script>
         $(document).ready(function() {
            $('.toggle-radio').change(function() {
                if ($(this).is(':checked')) {
                    // เปลี่ยนสีของ label เมื่อ radio button ถูกเลือก
                    $(this).siblings('label').addClass('active').css({
                        'color': '#ffff',
                        'background-color': '#FA9583',
                        'border-color': '#FA9583'
                    });
                } else {
                    // เปลี่ยนสีของ label เมื่อ radio button ไม่ถูกเลือก
                    $(this).siblings('label').removeClass('active').css({
                        'color': '#b9b9b9',
                        'background-color': '#ebebeb',
                        'border-color': '#ebebeb'
                    });
                }

                // ตรวจสอบว่า radio button ที่เป็นอันอื่นถูกเลือกหรือไม่
                $('.toggle-radio').not(this).prop('checked', false);

                // เปลี่ยนสีของ label ของ radio button ที่ไม่ถูกเลือก
                $('.toggle-radio').not(this).siblings('label').removeClass('active').css({
                    'color': '#b9b9b9',
                    'background-color': '#ebebeb',
                    'border-color': '#ebebeb'
                });
            });

            $('input[name="toggle-option"]').change(function() {
                if ($(this).is(':checked')) {
                    if ($(this).attr('id') === 'list-toggle') {
                        $('.content-show').show();
                        $('.content-edit').hide();
                    } else if ($(this).attr('id') === 'edit-toggle') {
                        $('.content-show').hide();
                        $('.content-edit').show();
                    }
                }
            });
        });

        $(() => {

        });
    </script>
@stop
