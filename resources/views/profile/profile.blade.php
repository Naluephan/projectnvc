@extends('profile_menu')
@section('side-card-profile')
<style>
    .card {
        color: #1b8f8d !important;
    }
</style>
    <div class="card rounded-4 bg-hr-card">
        <div class="card-header border-0">
        </div>
        <div class="container mx-2">
            <div class="row">
                <h6 class="my-3 fw-bold"><i class="fa-solid fa-user pr-1 fs-4"></i> ตำแหน่งและเงินเดือน</h6>
                <div class="row">
                    <p class="col"><i class="fa-solid fa-building-user px-1"></i> แผนก :</p>
                    <p class="col">Human Resources</p>
                </div>
                <div class="row">
                    <p class="col"><i class="fa-solid fa-user pr-1"></i> ตำแหน่ง :</p>
                    <p class="col">Human Resources</p>
                </div>
                <div class="row">
                    <p class="col"><i class="fa-solid fa-coins pr-1"></i> เงินเดือน :</p>
                    <p class="col">18000 บาท/เดือน</p>
                </div>
            </div>
            <div class="row">
                <h6 class="my-3 fw-bold"><i class="fa-solid fa-coins pr-1 fs-4"></i> ข้อมูลเงินเดือน</h6>
                <p class="my-3">
                    <i class="fa-solid fa-calendar-days pr-1"></i> ตั้งแต่วันที่ 1 มกราคม 2566 - 1 มกราคม 2567
                    <i class="fa-solid fa-sliders fs-4 position-absolute end-0 pr-3"></i>
                </p>
                <div class="row">
                    <div class="row col-12 m-auto bg-danger rounded-1 ">
                        <div class="col">
                            <p class="fs-6 text-center">เดือน</p>
                        </div>
                        <div class="col">
                            <p class="fs-6 text-center">ยอดเงิน</p>
                        </div>
                        <div class="col">
                            <p class="fs-6 text-center">วัน-เวลา</p>
                        </div>
                        <div class="col">
                            <p class="fs-6 text-center">ช่องทาง</p>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="card mt-3">
                        <div class="row">
                            <div class="col">
                                <p class="fs-6 text-center">มกราคม 2566</p>
                            </div>
                            <div class="col">
                                <p class="fs-6 text-center text-success">+ 18000.00</p>
                            </div>
                            <div class="col">
                                <p class="fs-6 text-center text-wrap">01-01-2566 04:30:10</p>
                            </div>
                            <div class="col">
                                <p class="fs-6 text-center">โอนผ่านบัญชีธนาคาร</p>
                            </div>
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

        });
    </script>
@stop
