<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

trait ResponseController
{
    public function showResponse($data)
    {
        $responseHeader = [
            'Content-Type' => 'application/json'
        ];

        $responseBody = [
            'status' => 'success',
            'massage' => 'New artist has been posted',
            'data' => $data,
        ];

        return response()->json($responseBody, 200, $responseHeader);
    }

    public function postResponse($data)
    {
        
        $responseHeader = [
            'Content-Type' => 'application/json'
        ];

        $responseBody = [
            'status' => 'success',
            'massage' => 'New artist has been posted',
            'data' => $data,
        ];

        return response()->json($responseBody, 201);
    }

    public function putResponse()
    {

    }

    public function deleteResponse()
    {

    }

    public function errorResponse()
    {

    }
}
