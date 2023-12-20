@extends("adminlte::page")

@section('content_header_title')
    การอบรมและสัมมนา
@stop
@section('content_header')
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">หน้าแรก</a></li>
    <li class="breadcrumb-item active"> การอบรมและสัมมนา </li>
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
    <div class="card">
        <!-- <div class="card-header">
            <h6 class="">ตัวเลือกการค้นหา</h6>
            <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
                <div class="col-md-3 user_plan">
                    <select id="company_id" class="form-select text-capitalize select2 list-filter">
                        <option value="-1"> -- บริษัท -- </option>
{{--                        @foreach ($companies as $company)--}}
{{--                            <option value="{{ $company->id }}">{{ $company->name_th }}</option>--}}
{{--                        @endforeach--}}
                        <option value="0">ทดลองงาน</option>
                    </select>
                </div>
                <div class="col-md-3 user_role">
                    <select id="department_id" class="form-select text-capitalize select2">
                        <option value=""> -- แผนก --</option>
                        <option value="Admin">Admin</option>
                        <option value="Author">Author</option>
                        <option value="Editor">Editor</option>
                        <option value="Maintainer">Maintainer</option>
                        <option value="Subscriber">Subscriber</option>
                    </select>
                </div>
                <div class="col-md-3 user_role">
                    <select id="position_id" class="form-select text-capitalize select2">
                        <option value=""> -- ดำแหน่ง --</option>
                        <option value="Admin">Admin</option>
                        <option value="Author">Author</option>
                        <option value="Editor">Editor</option>
                        <option value="Maintainer">Maintainer</option>
                        <option value="Subscriber">Subscriber</option>
                    </select>
                </div>
                <div class="col-md-3 user_status">
                    <select id="FilterTransaction" class="form-select text-capitalize select2">
                        <option value=""> -- สถานะ -- </option>
                        <option value="Pending" class="text-capitalize">Pending</option>
                        <option value="Active" class="text-capitalize">Active</option>
                        <option value="Inactive" class="text-capitalize">Inactive</option>
                    </select>
                </div>
            </div>
        </div> -->
        <div class="card-body ">
        <button class="btn btn-sm rounded-pill btn-add btn-danger" data-ac="add"><em class="fas fa-plus"></em></button>
            <table class="table dt-responsive w-100 nowrap" id="data_tables" aria-describedby="data_tables">
                <thead class="border-top table-light">
                <tr>
                    {{--                    <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1" style="width: 1px; display: none;" aria-label=""></th> --}}
                    {{-- <th class="dt-checkboxes-cell dt-checkboxes-select-all" data-col="1" aria-label=""><input type="checkbox" class="form-check-input"></th> --}}
                    <th>#</th>
                    <th>หัวข้อ</th>
                    <th>รายละเอียด</th>
                    <th>สถานะ</th>
                    <th>ใบรับรอง</th>
                    <th>วันเริ่มต้น</th>
                    <th>วันสิ้นสุด</th>
                    <th>จัดการ</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

        <div class="modal fade" id="tasModal" tabindex="-1" aria-labelledby="tasModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tasModalLabel">หน่วยงาน</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="tasForm">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                            <label for="title" class="col-form-label">หัวข้อ :</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                            <label for="detail" class="col-form-label">รายละเอียด :</label>
                            <textarea type="text" class="form-control" id="detail" name="detail" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="detail" class="col-form-label">ใบรับรอง :</label>
                        <div class="row">
                            <div class="col-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="cert" id="cert1" value="1">
                                <label class="form-check-label" for="cert1">
                                    มี
                                </label>
                            </div>
                            </div>
                            <div class="col-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="cert" id="cert" value="2">
                                <label class="form-check-label" for="cert">
                                    ไม่มี
                                </label>
                            </div>
                            </div>
                        
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="col-form-label">วัน/เดือน/ปี ที่เริ่ม :</label>
                        <div class="row">
                            <div class="col-4">
                            <select class="form-select" name="day_start" id="day_start">
                            <option value="">วันที่</option>
                            @for($i = 1; $i<=31; $i++) @if ($i==date('j')) <option value="{{$i}}">{{$i}}</option>
                                @else
                                <option value="{{$i}}">{{$i}}</option>
                                @endif
                                @endfor
                        </select>
                            </div>
                            <div class="col-4">
                            <select class="form-select" name="month_start" id="month_start">
                            <option value="">เดือน</option>
                            @for($i = 1; $i <= 12; $i++) @php $monthNames=[ 1=> 'มกราคม',
                                2 => 'กุมภาพันธ์',
                                3 => 'มีนาคม',
                                4 => 'เมษายน',
                                5 => 'พฤษภาคม',
                                6 => 'มิถุนายน',
                                7 => 'กรกฎาคม',
                                8 => 'สิงหาคม',
                                9 => 'กันยายน',
                                10 => 'ตุลาคม',
                                11 => 'พฤศจิกายน',
                                12 => 'ธันวาคม',
                                ];
                                $monthName = $monthNames[$i];
                                @endphp
                                @if ($i == date('n'))
                                <option value="{{$i}}">{{$monthName}}</option>
                                @else
                                <option value="{{$i}}">{{$monthName}}</option>
                                @endif
                                @endfor
                        </select>
                            </div>
                            <div class="col-4">
                            <select class="form-select" name="year_start" id="year_start">
                                <option selected>ปี</option>
                                <option value="2566">2566</option>
                                <option value="2567">2567</option>
                                <option value="2568">2568</option>
                            </select> 
                            </div>
                        </div>  
                    </div>
                    <div class="mb-3">
                        <label for="title" class="col-form-label">วัน/เดือน/ปี ที่สิ้นสุด :</label>
                        <div class="row">
                            <div class="col-4">
                            <select class="form-select" name="day_end" id="day_end">
                            <option value="">วันที่</option>
                            @for($i = 1; $i<=31; $i++) @if ($i==date('j')) <option value="{{$i}}">{{$i}}</option>
                                @else
                                <option value="{{$i}}">{{$i}}</option>
                                @endif
                                @endfor
                        </select>
                            </div>
                            <div class="col-4">
                            <select class="form-select" name="month_end" id="month_end">
                            <option value="">เดือน</option>
                            @for($i = 1; $i <= 12; $i++) @php $monthNames=[ 1=> 'มกราคม',
                                2 => 'กุมภาพันธ์',
                                3 => 'มีนาคม',
                                4 => 'เมษายน',
                                5 => 'พฤษภาคม',
                                6 => 'มิถุนายน',
                                7 => 'กรกฎาคม',
                                8 => 'สิงหาคม',
                                9 => 'กันยายน',
                                10 => 'ตุลาคม',
                                11 => 'พฤศจิกายน',
                                12 => 'ธันวาคม',
                                ];
                                $monthName = $monthNames[$i];
                                @endphp
                                @if ($i == date('n'))
                                <option value="{{$i}}">{{$monthName}}</option>
                                @else
                                <option value="{{$i}}">{{$monthName}}</option>
                                @endif
                                @endfor
                        </select>
                            </div>
                            <div class="col-4">
                            <select class="form-select" name="year_end" id="year_end">
                                <option selected>ปี</option>
                                <option value="2566">2566</option>
                                <option value="2567">2567</option>
                                <option value="2568">2568</option>
                            </select> 
                            </div>
                        </div>  
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                <button type="button" class="btn btn-primary save-tas">บันทึก</button>
            </div>
        </div>
    </div>
</div>
@stop


@section('js')
    <script>
    $(() => {
        var list_table = $("#data_tables").DataTable({
                pageLength: 25,
                responsive: true,
                processing: true,
                serverSide: true,
                serverMethod: 'post',
                ajax: {
                    url: '{{ route('api.v1.tas.list') }}',
                    type: 'POST'
                },
                columns: [
                    {
                        data: "id"
                    },
                    {
                        data: "id"
                    },
                    {
                        data: "id"
                    },
                    {
                        data: "id"
                    },
                    {
                        data: "id"
                    },
                    {
                        data: "id"
                    },
                    {
                        data: "id"
                    },
                    {
                        data: "id",
                        render: function(data, type, row, meta) {
                            info_button =
                                `<a data-id="${row.id}" data-ac="edit" data-bs-toggle="modal" data-bs-target="#tasModal" class="btn btn-xs rounded-pill text-es-pink btn-edit"><i class="fas fa-edit"></i></a>`;
                            info_button +=
                                `<a data-id="${row.id}" class="btn btn-xs rounded-pill text-es-red btn-delete"><i class="fas fa-trash-alt"></i></a>`;
                            return info_button;
                        }
                    },
                ],
                "dom": '<"top my-1 mr-1"lf>rt<"bottom d-flex position-absolute w-100 justify-content-between px-1 mt-3" ip  ><"clear">'
            });

            var tas_modal = $("#tasModal");
            $(document).on('click', '.btn-add', function() {
                tas_modal.modal('show')
            })

            $(document).on('click', '.save-tas', function() {
                let id = $("#id").val();
                let tasForm = $("#tasForm");
                if (tasForm.valid()) {
                    const formData = new FormData($("#tasForm")[0]);
                    const data = Object.fromEntries(formData.entries());
                    if (id.length == 0) {

                        $.ajax({
                            type: 'post',
                            url: "{{ route('api.v1.tas.create') }}",
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
                                    tas_modal.modal('hide');
                                    list_table.ajax.reload(null, false);
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
                    } else {
                        $.ajax({
                            type: 'post',
                            url: "{{ route('api.v1.tas.update') }}",
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
                                    tas_modal.modal('hide');
                                    list_table.ajax.reload(null, false);
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
                } else {
                    Swal.fire({
                        title: 'กรุณาตรวจสอบข้อมูล',
                        icon: 'warning',
                        showConfirmButton: false,
                        timer: 2000,
                        toast: true
                    });
                }
            })

            $(document).on('click', '.btn-edit', function() {
                let id = $(this).data('id');
                $.ajax({
                    type: 'post',
                    url: "{{ route('api.v1.tas.by.id') }}",
                    data: {
                        'id': id
                    },
                    dataType: "json",
                    success: function(response) {
                        setTasFormData(response);
                        $("#id").val(response.id);
                        tas_modal.modal('show')
                    }
                });
            })
            function setTasFormData(data) {
                $("#title").val(data.title);
                $("#detail").val(data.detail);
                $("#cert").val(data.cert);
                $("#day_start").val(data.day_start);
                $("#day_end").val(data.day_end);
                $("#month_start").val(data.month_start);
                $("#month_end").val(data.month_end);
                $("#year_start").val(data.year_start);
                $("#year_end").val(data.year_end);
            }

            tas_modal.on('show.bs.modal', function(event) {
                let btn = $(event.relatedTarget);
                let title = btn.data('ac') === 'edit' ? "แก้ไขรายการ" : "สร้างรายการใหม่";
                console.log(btn.data('ac'))
                let obj = $(this);
                obj.find('.modal-title').text(title)
            })
            tas_modal.on('hide.bs.modal', function() {
            let obj = $(this);
            obj.find('#title').val("");
            obj.find('#detail').val("");
            obj.find('#cert').val("");
            obj.find('#day_start').val("");
            obj.find('#day_end').val("");
            obj.find('#month_start').val("");
            obj.find('#month_end').val("");
            obj.find('#year_start').val("ปี");
            obj.find('#year_end').val("ปี");
            })

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
                            url: "{{ route('api.v1.tas.delete') }}",
                            data: {
                                'id': id
                            },
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
                                    list_table.ajax.reload(null, false);
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
