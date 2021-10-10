<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Items;
use App\Models\Costumer;

class Sales extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['code_transaksi','tanggal_transaksi','costumer','item','qty','total_diskon','total_harga','total_bayar'];
    
    public function item()
    {
        return $this->belongsTo(Items::class, 'item', 'id');
    }

    public function costumer()
    {
        return $this->belongsTo(Costumer::class, 'costumer', 'id');
    }
}
