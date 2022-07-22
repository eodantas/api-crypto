<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function show(Request $r)
    {
        $user = User::find(1);
        $plaintext = json_encode($user);
        return ['user' => $user, 'enc' => $this->encripta($plaintext)];
    }

    private function encripta($str)
    {
        $key = '82PmZi8zf5E5btT8UCM6Y2s6uhfBFGAe'; // gerada com: Str::random(32);
        $cipher = 'aes-256-cbc';
        $iv = base64_decode('hEDITs4OF9MQ29JgW8nAVQ=='); // gerado no front
        return base64_encode(openssl_encrypt($str, $cipher, $key, OPENSSL_RAW_DATA, $iv));
    }
}
