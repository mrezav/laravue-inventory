<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CostumerController extends Controller
{
    public function index()
    {
        $data = Costumer::get();

        return response()->json(['status' => 'success', 'data' => $data], Response::HTTP_OK);
    }

}
