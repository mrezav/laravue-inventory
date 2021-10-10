<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sales::with(['item','costumer'])->get();

        return response()->json(['status' => 'success', 'data' => $sales]);
    }
}
