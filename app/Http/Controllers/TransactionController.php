<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use App\Models\Items;
use App\Models\Sales;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $items = Items::get();
        $costumers = Costumer::get();
        $data = [
            'costumers' => $costumers,
            'items' => $items,
        ];

        return response()->json(['status' => 'success', 'data' => $data]);
    }

    
    public function submit(Request $request)
    {
        $code = 'TR'.strtotime(now());

        $sales = new Sales;
        foreach($request->items as $item){
            $item = Items::findOrFail($item['id']);
            $item->stok = $item->stok - 1;
            $item->save();

            $sales['code_transaksi'] = $code;
            $sales['tanggal_transaksi'] = now();
            $sales['costumer'] = $request->costumer['id'];
            $sales['item'] = $item['id'];
            $sales['qty'] = 1;
            $sales['total_diskon'] = $request->diskon;
            $sales['total_harga'] = $request->subTotal;
            $sales['total_bayar'] = $request->total;

            $sales->save();
        }
        return response()->json(['status' => 'success']);
    }
}
