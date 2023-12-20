<?php

namespace App\Http\Controllers\APIs;

class ApiStatus
{
    public const SUCCESS_RESPONSE = [
        'status' => ApiStatus::SUCCESS,
        'errCode' => null,
        'errDesc' => null
    ];
    public const status = "SUCCESS_RESPONSE";
    public const statusCode = "00";

    //    Error Code and Description invalid user
    public const user_error = "User Error";
    public const user_status = "10";
    public const errDesc = "Error login";
    public const message = "invalid user";

    //  catch Error Code and Description 
    public const user_login_error = "User Login Error";
    public const user_login_error_status  = "500";
    public const user_login_errDesc  = "Error login";

}
