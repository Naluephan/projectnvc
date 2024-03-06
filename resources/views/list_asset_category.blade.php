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
        </div>

    </div>
    <div class="col-5">
        <h6>หมวดหมู่ทรัพย์สิน</h6>
        <div class="row">
            <div class="col-10">
                <div class="input-group mb-3">
                    <input type="text" class="form-control rounded-pill" disabled>
                    <label class="position">#</label>
                </div>
            </div>
            <div class="col-1">
                <button class="btn btn-sm rounded-pill btn-add btn-success"><em class="fas fa-edit"></em></button>
            </div>
            <div class="col-1">
                <button class="btn btn-sm rounded-pill btn-add btn-danger"><em class="fas fa-trash-alt"></em></button>
            </div>
        </div>
        <button type="button" class="btn btn-outline-success rounded-pill" style="width: 100%; "><i class="fa-solid fa-plus"></i> เพิ่มหมวดหมู่</button>
    </div>
</div>


@stop


@section('js')
<script>
    $(() => {

    });
</script>
@stop