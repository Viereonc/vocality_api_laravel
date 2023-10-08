<?php

namespace App\Http\Controllers;

trait FunctionController
{
    public function encode($file)
    {
        return base64_encode(file_get_contents($file));
    }
}
