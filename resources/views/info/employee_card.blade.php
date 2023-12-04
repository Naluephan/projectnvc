<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Employee Time Log</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script
        src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script>
        $(()=> {
            // Enable pusher logging - don't include this in production
            // Pusher.logToConsole = true;

            var pusher = new Pusher('2e2b4bbe684dd9ddbbe2', {
                cluster: 'ap1'
            });

            var channel = pusher.subscribe('organics-hr');
            channel.bind('employee-paste-card', function (data) {
                console.log(JSON.stringify(data));
                let emp_info = data;
                $(".emp_id").text(JSON.stringify(data));
            });
        });
    </script>
</head>
<body>
{{--<h1>Employee Time Log</h1>--}}
{{--<p>--}}
{{--    Message event when employee paste card : <span class="emp_id"> Greeting Here!! </span>--}}
{{--</p>--}}

<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-4">
            <div class="row">
                <div class="col-12">
                    <img class="img-responsive" src="https://thumbs.dreamstime.com/z/no-user-profile-picture-hand-drawn-illustration-53840792.jpg"></img>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-8">
            INFO
        </div>
    </div>
</div>
</body>
</html>
