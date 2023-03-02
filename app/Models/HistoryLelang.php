<?php

namespace App\Models;
use App\Models\User;
use App\Models\Lelang;
use App\Models\Barang;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryLelang extends Model
{
    use HasFactory;
    protected $table = 'history_lelangs';
    protected $fillable = [
        'lelang_id',
        'users_id',
        'harga',
        'tanggal',
    ];
    
    public function user(){
        return $this->hasOne('App\Models\User', 'id', 'users_id');
    }

    public function lelang(){
        return $this->hasOne('App\Models\Lelang', 'id', 'lelang_id');
    }

    public function barang(){
        return $this->hasOne('App\Models\Barang', 'id', 'barangs_id');
    }

}
