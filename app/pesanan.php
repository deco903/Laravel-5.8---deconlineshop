<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pesanan extends Model
{
    protected $table ='pesanan';
    protected $fillable = ['user_id','tanggal','jumlah_harga','status'];

    public function user()
    {
        return $this->belongTo('App\User','user_id','id');
    }

    public function pesanan_detail()
    {
        return $this->belongTo('App\pesanandetail','pesanan_id','id');
    }   

}
