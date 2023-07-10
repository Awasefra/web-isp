<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_paket',
        'harga'
    ];
    public function customer(){
        return $this->hasMany(Customer::class, 'id');
    }
}
