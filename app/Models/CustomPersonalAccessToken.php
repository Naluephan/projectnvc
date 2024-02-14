<?php

namespace App\Models;

use Illuminate\Support\Facades\Crypt;
use Laravel\Sanctum\PersonalAccessToken;

class CustomPersonalAccessToken extends PersonalAccessToken
{
    public function saveEncryptedToken($tokenPlain)
    {
        $this->token = Crypt::encrypt($tokenPlain);
        $this->save();
    }
}
