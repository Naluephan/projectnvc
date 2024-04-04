@extends('profile_menu')
@section('side-card-profile')
    <style>
        .text-color {
            color: #048482 !important;
        }

        .btn-reset {
            color: #f99482 !important;
        }

        .toggle-radio {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        .content-edit {
            display: none;
        }

        .toggle-radio {
            width: 38px;
            height: 38px;
            cursor: pointer;
        }

        .herder-icons .btn-list {
            color: #ffff;
            background-color: #FA9583;
            border-color: #FA9583;
            width: 38px;
            height: 38px;
        }

        .herder-icons .btn-edit {
            color: #b9b9b9;
            background-color: #ebebeb;
            border-color: #ebebeb;
            width: 38px;
            height: 38px;
        }
    </style>

    <div class="herder-icons d-flex align-items-center justify-content-end">
        <div class="list">
            <input type="radio" id="list-toggle" name="toggle-option" checked data-toggle="toggle" data-width="100"
                class="toggle-radio">
            <label for="list-toggle" class="btn btn-sm rounded-pill btn-list active"><i
                    class="fas fa-box-open text-md pt-2"></i></label>
        </div>
        <div class="edit ml-2">
            <input type="radio" id="edit-toggle" name="toggle-option" data-toggle="toggle" data-width="100"
                class="toggle-radio">
            <label for="edit-toggle" class="btn btn-sm rounded-pill btn-edit"><i
                    class="fas fa-hand-holding-usd text-md pt-1"></i></label>
        </div>
    </div>

    <div class="card rounded-4 mt-2 bg-hr-card content-show">
        <div class="card-header border-0">
            <h6><i class="fas fa-box-open"></i> การเบิกอุปกรณ์</h6>
        </div>
        <div class="card-body">
            <h5>1</h5>
        </div>
        <div class="button-footer pt-4">
            <div class="row">
                <div class="col-6">
                    <button type="button" class="btn card-text text-bold btn-reset">ล้าง</button>
                </div>
                <div class="col-6">
                    <button class="btn btn-hr-confirm form-control rounded-pill save-privatecar">บันทึก</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card rounded-4 mt-2 bg-hr-card content-edit">
        <div class="card-header border-0">
            <h6><i class="fas fa-hand-holding-usd"></i> อุปกรณ์ที่อยู่ในความดูแล</h6>
        </div>
        <div class="card-body">
            <h5>2</h5>
        </div>
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
    </script>


@stop
