<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="antialiased">
    <div class="container">
        <h3 class="mt-5 text-center">HELLO, THIS IS THE IMPORT PAGE!!!</h3>

        <form method="post" id="form_import" enctype="multipart/form-data" class="mt-5">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card border-success">
                        <div class="card-body">
                            <label for="validatedInputGroupCustomFile" class="form-label text-success">นำเข้าไฟล์ Excel ข้อมูลพนักงาน<small class="text-danger">( *** ตรวจสอบ หัวคอลัมน์ว่ามีดังนี้หรือไม่ [ชื่อ / สกุล , ชื่อเล่น , รหัสพนักงาน , เบอร์โทรศัพท์ , วัน/เดือน/ปีเกิด , ที่อยู่ปัจจุบัน , เลขที่บัตรประชาชน , วันที่เริ่มจ้าง , วันสิ้นสุดการจ้าง] )</small></label>
                            <div class="input-group mb-3">
                                <input type="file" name="excel" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" class="form-control" id="validatedInputGroupCustomFile" aria-describedby="inputGroupFileAddon">
                                {{-- <label class="input-group-text" for="validatedInputGroupCustomFile">เลือกไฟล์ ...</label> --}}
                                <button class="btn btn-success import-leads" type="button">บันทึก</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $(document).on('click', '.import-leads', function() { 
                const formData = new FormData($("#form_import")[0]);
                const data = Object.fromEntries(formData.entries());
                if (data.excel.size > 0) {
                    Swal.fire({
                        title: 'กรุณารอสักครู่',
                        text: 'เมื่อนำเข้าข้อมูลเสร็จจะขึ้นข้อความ "บันทึกสำเร็จ"',
                        icon: 'warning',
                        showCancelButton: false,
                        showConfirmButton: false
                    })
                    $.ajax({
                        method: "POST",
                        url: "{{ route('excel_import') }}",
                        data: formData,
                        cache: false,
                        processData: false,
                        contentType: false,
                    }).done(function (response) {
                        console.log(response.status);
                        if (response.status == "success") {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'บันทึกข้อมูลเรียบร้อย',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            setTimeout(function(){ window.location.reload(); }, 1000);
                        } else {
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'เกิดข้อผิดพลาด',
                                text: 'กรุณาตรวจสอบไฟล์ให้ถูกต้อง',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    });
                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'เกิดข้อผิดพลาด',
                        text: 'กรุณาเลือกไฟล์',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            })

            $('.dropify').dropify({
                tpl: {
                    message: '<div class="dropify-message"><span class="file-icon"/><p><h5>กรุณาเลือกไฟล์ Excel</h5></p></div>',
                    preview: '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message"></p></div></div></div>',
                }
            });

            bsCustomFileInput.init()

         

        })
    </script>
</body>
</html>

