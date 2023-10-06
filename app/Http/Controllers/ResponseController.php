<?php

namespace App\Http\Controllers;

trait ResponseController
{
    
    public function showResponse($data)
    {
        $responseHeader = [
            'Content-Type' => 'application/json'
        ];

        $responseBody = [
            'status' => 'get success (200)',
            'massage' => 'Data has been get',
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
            'status' => 'post success (201)',
            'massage' => 'Data has been posted',
            'data' => $data,
        ];

        return response()->json($responseBody, 201, $responseHeader);
    }

    public function putResponse($data)
    {
        $responseHeader = [
            'Content-Type' => 'application/json'
        ];

        $responseBody = [
            'status' => 'post success (200)',
            'massage' => 'Data has been updated',
            'data' => $data,
        ];

        return response()->json($responseBody, 200, $responseHeader);
    }

    public function deleteResponse()
    {
        $responseHeader = [
            'Content-Type' => 'application/json'
        ];

        $responseBody = [
            'status' => 'delete success (200)',
            'massage' => 'Data has been deleted',
        ];

        return response()->json($responseBody, 200, $responseHeader);
    }

    public function notFoundResponse()
    {
        $responseHeader = [
            'Content-Type' => 'application/json'
        ];

        $responseBody = [
            'status' => 'not found (404)',
            'massage' => 'Data not found',
        ];

        return response()->json($responseBody, 404, $responseHeader);
    }

    public function errorResponse()
    {
        $responseHeader = [
            'Content-Type' => 'application/json'
        ];

        $responseBody = [
            'status' => 'server error (500)',
            'massage' => 'Something wrong',
        ];

        return response()->json($responseBody, 500, $responseHeader);
    }
}
