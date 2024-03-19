@extends('profile_menu')
@section('side-card-profile')

    <style>
        .herder-icons .btn-list,
        .btn-edit {
            height: 40px;
            width: 40px;
        }

        .img {
            display: grid;
            place-items: center;
        }
    </style>

    <div class="herder-icons d-flex align-items-center justify-content-end">
        <div class="list">
            <button class="btn btn-sm rounded-pill btn-list"
                style="color: #ffff; background-color: #FA9583; border-color: #FA9583;"><em class="fas fa-car"
                    style="font-size: 20px;"></em></button>
        </div>
        <div class="edit ml-2">
            <button class="btn btn-sm rounded-pill btn-edit"
                style="color: #b9b9b9; background-color: #ebebeb; border-color: #ebebeb;"><em class="fa-solid fa-car-burst"
                    style="font-size: 20px;"></em></button>
        </div>
    </div>
    <div class="card rounded-4 bg-hr-card mt-3">
        <div class="card-header border-0 px-4 pt-4">
            <h6 class="text-bold"><i class="fas fa-car"></i> ข้อมูลรถส่วนตัว</h6>
        </div>
        <div class="card-body pt-0">
            <div class="row mt-1 list_privatecar" id="list_privatecar">
                {{-- <div class="col-12 col-sm-4 pb-2 img">
                    <img class="rounded-4" src="https://img5.pic.in.th/file/secure-sv1/image1dde418f2fcd5978.png"
                        alt="" style="width: 200px; height: 200px;">
                </div>
                <div class="col-12 col-sm-8 pl-4">
                    <div class="content">
                        <p class="py-2 text-md"><i class="fas fa-th-large" style="color: #f99482;"></i>&nbsp; ประเภท :
                            รถยนต์
                        </p>
                        <p class="py-2 text-md"><i class="fa-solid fa-address-card" style="color: #f99482;"></i>&nbsp;
                            ทะเบียน :
                            9กย 1234</p>
                        <p class="py-2 text-md"><i class="fa-solid fa-car-side" style="color: #f99482;"></i>&nbsp; ยี่ห้อ :
                            Toyota Yaris ATIV</p>
                        <p class="py-2 text-md"><i class="fa-solid fa-palette" style="color: #f99482;"></i>&nbsp; สี : แดง
                        </p>
                    </div>
                </div> --}}

            </div>
        </div>
    </div>

@stop
@section('js')
    <script>
        $(() => {

            getPrivateCar();

            function getPrivateCar() {
                const listPrivatecar = document.getElementById('list_privatecar');
                listPrivatecar.innerHTML = '';
                $.ajax({
                    type: 'post',
                    url: "{{ route('api.v1.privatecar.list') }}",
                    dataType: "json",
                    success: function(response) {
                        var car_category = ''
                        if (response.car_category_id = 1) {
                            car_category = 'รถยนต์'
                        }
                        else {
                            car_category = 'รถจักรยานยนต์'
                        }
                        var privatecarContainer = $(".list_privatecar");
                        response.forEach(function(privatecarInfo) {
                            var car_category_id = car_category;
                            var car_registration = privatecarInfo.car_registration;
                            var car_brand = privatecarInfo.car_brand;
                            var car_color = privatecarInfo.car_color;
                            var car_image = privatecarInfo.car_image;
                            var Item = `
                            <div class="col-12 col-sm-4 pb-2 img">
                                <img class="rounded-4" src="${car_image}"
                                    alt="" style="width: 200px; height: 200px;">
                            </div>
                            <div class="col-12 col-sm-8 pl-4">
                                <div class="content">
                                    <p class="py-2 text-md"><i class="fas fa-th-large" style="color: #f99482;"></i>&nbsp; ประเภท :
                                        ${car_category_id}
                                    </p>
                                    <p class="py-2 text-md"><i class="fa-solid fa-address-card" style="color: #f99482;"></i>&nbsp;
                                        ทะเบียน :
                                        ${car_registration}</p>
                                    <p class="py-2 text-md"><i class="fa-solid fa-car-side" style="color: #f99482;"></i>&nbsp; ยี่ห้อ :
                                        ${car_brand}</p>
                                    <p class="py-2 text-md"><i class="fa-solid fa-palette" style="color: #f99482;"></i>&nbsp; สี : ${car_color}
                                    </p>
                                </div>
                            </div>
                            `;
                            privatecarContainer.append(Item);
                        });
                    },
                });
            }
        });
    </script>
@stop
