<?php

if (!function_exists('sendOTP')) {
    function sendOTP($params)
    {
        $curl = curl_init();
        $accesstoken = "YmFsYW5jZXRoYWlsYW5kOlRoYWlsYW5kMTk=";
        $headr = array();
        $headr[] = 'Content-type: application/xml';
        $headr[] = 'Accept: application/xml';
        $headr[] = 'Authorization: Basic ' . $accesstoken;
        $sender = "itOK";
        $otp_number = $params['msisdn'];

        $tmp_otp = mt_rand(100000, 999999);
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $ref_num = '';
        $n = 5;
        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $ref_num .= $characters[$index];
        }
        // $xml = @simplexml_load_string($stmt);

        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => "http://api.promotech.co.th/restapi/sms/1/text/single",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTPHEADER => $headr,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => "<request>
                                        <from>$sender</from>
                                        <to>
                                            <to>$otp_number</to>
                                        </to>
                                        <text>Your Validate Code is $tmp_otp, Ref #$ref_num Expired in 5 minutes.</text>
                                        </request>"
            )
        );

        $response['curl'] = curl_exec($curl);
        $response['otp'] = $tmp_otp;
        $response['ref'] = $ref_num;
        // dd($response);
        return $response;

        // =======================================================================================
        // $curl = curl_init();
        // $params['sender'] = "Privacy";
        // $code = mt_rand(100000, 999999);
        // $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        // $ref = '';
        // $n = 5;
        // for ($i = 0; $i < $n; $i++) {
        //     $index = rand(0, strlen($characters) - 1);
        //     $ref .= $characters[$index];
        // }
        // $params['message'] = "รหัส OTP ของคุณคือ " . $code . " / REF:" . $ref;
        // $xml = @simplexml_load_string($stmt);

        // curl_setopt_array($curl, array(
        //     CURLOPT_URL => 'https://thsms.com/api/send-sms',
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => '',
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 0,
        //     CURLOPT_FOLLOWLOCATION => true,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => 'POST',
        //     CURLOPT_POSTFIELDS => '{
        //         "sender": "' . $params['sender'] . '",
        //         "msisdn": ["' . $params['msisdn'] . '"],
        //         "message": "' . $params['message'] . '"
        //     }',
        //     CURLOPT_HTTPHEADER => array(
        //         'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC90aHNtcy5jb21cL21hbmFnZVwvYXBpLWtleSIsImlhdCI6MTY2Nzg4MDEyNCwibmJmIjoxNjY3ODgwMTI0LCJqdGkiOiJsWWx2djZhUzdzRTF2S0hMIiwic3ViIjoxMDgwOTAsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.7N8ZofvD-NX5RGHfauTqPs12uwLT-P782jTq3Ym3IdI',
        //         'Content-Type: application/json'
        //     ),
        // ));

        // // dd(curl_setopt_array());
        // $response = curl_exec($curl);
        // curl_close($curl);

        // return $response;
    }
}
