<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_sales',
        'nama_customer',
        'id_paket',
        'alamat',
        'foto_ktp'
    ];
    public function sales(){
        return $this->belongsTo(User::class, 'id_sales');
    }
    public function paket(){
        return $this->belongsTo(Paket::class, 'id_paket');
    }
}
