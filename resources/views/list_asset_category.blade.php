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
    <div class="col-5">col-7</div>
</div>


@stop


@section('js')
<script>
    $(() => {

    });
</script>
@stop