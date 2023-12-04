<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>ORGANICS LEGENDARY GROUP</title>
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
        <script>
            var openModalTimeout;
            $(() => {
                // Enable pusher logging - don't include this in production
                // Pusher.logToConsole = true;
                var pusher_app_key = "{{env('PUSHER_APP_KEY')}}";
                var pusher_app_cluster = "{{env('PUSHER_APP_CLUSTER')}}";
                var pusher = new Pusher(pusher_app_key, {
                    cluster: pusher_app_cluster
                });

                var channel = pusher.subscribe('organics-hr');
                channel.bind('employee-paste-card', function(data) {
                    clearTimeout(openModalTimeout);
                    closeFullscreen()
                    let emp_info = data;
                    // $emp_id = emp_info.id;
                    $(".emp_name").text(': ' + emp_info.pre_name + emp_info.f_name + " " + emp_info.l_name);
                    $(".n_name").text(': ' + emp_info.n_name);
                    $(".emp_cod").text(': ' + emp_info.employee_code);
                    $(".position").text(': ' + emp_info.position.name_th);
                    $(".ocoin").text(emp_info.ocoin);

                    $(".paste-date").text(moment(emp_info.paste_date).format("HH:mm"));



                    $(".com").text(': '+emp_info.company.name_th);

                    let com_path = (emp_info.company.order_prefix).toLowerCase();

                    let tmp_img = "/uploads/images/employee/profile.png";
                    if (emp_info.gender_id =="2"){
                        tmp_img = "/uploads/images/employee/profilef.png";
                    }

                    // var imagePath = emp_info.image ? "/uploads/images/employee/" + com_path + "/it/" + emp_info
                    var imagePath = emp_info.image ? "/uploads/images/employee/" + com_path +"/"+ emp_info.image : tmp_img;

                    $.ajax({
                        type: "HEAD", // Use a HEAD request to check the URL without downloading the content
                        url: imagePath,
                        success: function() {
                            $(".img-profile").attr("src", imagePath);
                        },
                        error: function(xhr) {
                            $(".img-profile").attr("src", tmp_img);
                        }
                    });



                    $(".image_logo").attr("src", "/uploads/images/background/" + emp_info.company.logo);

                    // if (emp_info) {
                    //     // Get the current date
                    //     let currentDate = new Date();
                    //     let year = currentDate.getFullYear();
                    //     let month = currentDate.getMonth() + 1; // Month is zero-indexed, so add 1
                    //     let day = currentDate.getDate();
                    //     let pasteDate = year + "-" + month + "-" + day;

                    //     // Send AJAX request to create data in the employee_paste_card_logs table
                    //     $.ajax({
                    //         url: '{{ route('api.v1.create.paste.card.log') }}',
                    //         method: 'POST',
                    //         data: {
                    //             emp_id: $emp_id,
                    //             paste_date: pasteDate,
                    //             year: year,
                    //             month: month,
                    //             day: day
                    //         },
                    //         success: function(response) {
                    //             console.log('Data created successfully!');
                    //         },
                    //         error: function(xhr, status, error) {
                    //             console.error(error);
                    //         }
                    //     });
                    // }
                    openModalTimeout = setTimeout(function(){
                        openFullscreen()
                    }, 1 * 60 * 1000);
                });
                openModalTimeout = setTimeout(function(){
                    openFullscreen()
                },1 * 60 * 1000);

            });
            function openFullscreen() {
                document.getElementById('fullscreenModal').style.display = 'flex';
            }
            function closeFullscreen() {
                document.getElementById('fullscreenModal').style.display = 'none';
            }
        </script>
</head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="{{ url('assets/css/employee.css') }}" />

<style>
    /* Style for the fullscreen modal overlay */
    .fullscreen-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.9);
        z-index: 1000;
        justify-content: center;
        align-items: center;
    }

    .close-button {
        cursor: pointer;
        position: absolute;
        top: 20px;
        right: 20px;
        color: #fff;
        font-size: 24px;
    }

    .video-container {
        width: 100%;
        height: 100%;
        /*max-width: 1200px;*/
        /*max-height: 800px;*/
    }

    .fullscreen-video {
        width: 100%;
        height: 100%;
    }
</style>

<body>
    <div class="w3-display-container container">
        <div id="MyClockDisplay" class="clock" onload="showTime()"></div>
        {{-- <h2 class="w3-center" style="color: #7db442">ORGANICS LEGENDARY GROUP</h2> --}}
        <div class="w3-row  card">
            <div class="w3-third w3-center">
                <div class="content_pro">
                    {{-- <img src="{{ url('/storage/profile/DSCF5043.jpg') }}"> --}}
                    <img src="/uploads/images/employee/profile.png" class="box img-profile">
                </div>
                <div class="w3-row">
                    <div class="w3-half half">
                        <div class="calendar">
                            <div class="calendar-body">
                                <span class="month-name"></span>
                                <span class="day-name"></span>
                                <span class="date-number"></span>
                                <span class="year"></span>
                            </div>
                        </div>
                    </div>
                    <div class="w3-half half">
                        <p>บันทึกเวลา</p>
                        <h1 style="font-weight: bold; font-size: 50px; margin-top:-10px" class="paste-date">0:00</h1>
                        <span style="font-size: 20px; position: relative; right: -30px; top: -5px">นาที</span>
                    </div>
                </div>
            </div>
            <div class="w3-twothird">
                <div class="content_d">
                    <div class="w3-row">
                        <div class="w3-col s3 detail">
                            <p>ชื่อ</p>
                            <p>ชื่อเล่น</p>
                            <p>รหัสพนักงาน</p>
                            <p>ตำแหน่ง</p>
                            <p>บริษัท</p>
                        </div>
                        <div class="w3-col s6 detail">
                            <p class="emp_name">: - </p>
                            <p class="n_name">: - </p>
                            <p class="emp_cod">: - </p>
                            <p class="position">: -</p>
                            <p class="com">: - </p>
                        </div>
                        <div class="w3-col s3">
                            <div class="w3-row">
                                <img src="{{ url('/uploads/images/background/logo_legen.png') }}"
                                    class="image_logo">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="coin">
                    <div class="w3-row">
                        <div class="w3-twothird">
                            <p>
                                <span style="font-size: 2rem; color:#000; font-weight:bold;">ORGANICS COIN</span>
                                <img src="{{ url('/uploads/images/background/ogn_coin.png') }}"
                                    style="max-width: 25%; margin-left:3rem;">
                                <span style="font-size: 2rem; color:#000; font-weight:bold; margin-left:1rem" class="ocoin">999</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        const dayNumber = new Date().getDate();
        const year = new Date().getFullYear();

        const dayName = new Date().toLocaleString("th-TH", {
            weekday: "long"
        });

        const monthName = new Date().toLocaleString("th-TH", {
            month: "long"
        });

        document.querySelector(".month-name").innerHTML = monthName;
        document.querySelector(".day-name").innerHTML = dayName;
        document.querySelector(".date-number").innerHTML = dayNumber;
        document.querySelector(".year").innerHTML = year;
    </script>
    <!-- script clock -->
    <script>
        function showTime() {
            var date = new Date();
            var h = date.getHours(); // 0 - 23
            var m = date.getMinutes(); // 0 - 59
            var s = date.getSeconds(); // 0 - 59

            h = (h < 10) ? "0" + h : h;
            m = (m < 10) ? "0" + m : m;
            s = (s < 10) ? "0" + s : s;

            var time = h + ":" + m + ":" + s;
            document.getElementById("MyClockDisplay").innerText = time;
            document.getElementById("MyClockDisplay").textContent = time;

            setTimeout(showTime, 1000);

        }

        showTime();
    </script>



    <!-- Fullscreen modal overlay -->
    <div class="fullscreen-modal" id="fullscreenModal">
{{--        <span class="close-button" onclick="closeFullscreen()">×</span>--}}
        <div class="video-container">
            <video class="fullscreen-video" src="{{asset('uploads/video/video.mp4')}}" autoplay muted loop></video>
        </div>
    </div>
{{--    <button id="openFullscreenButton" style="display: none">Open Fullscreen</button>--}}
</body>

</html>
