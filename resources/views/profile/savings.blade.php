@extends('profile_menu')
@section('side-card-profile')

    <div class="card rounded-4 bg-hr-card">
        <div class="card-header border-0">
            <h6><i class="fas fa-th-large"></i> เงินออม</h6>
        </div>
        <div class="card-body">

        <button type="button" class="form-control btn btn-outline-success rounded-pill mt-3 btn-add"><i class="fa-solid fa-plus"></i>
                เพิ่มหมวดหมู่</button>
        </div>
        <div class="card-footer bg-transparent">
            <button class="btn btn-hr-confirm form-control rounded-pill">บันทึก</button>
        </div>
    </div>

@stop
@section('js')
    <script>
        $(()=>{

        });
    </script>
@stop
