<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    protected $table ='barang';
    protected $fillable = ['nama_barang','harga','stok','keterangan'];

    public function pesanan_detail()
    {
        return $this->hasMany('App\psanandetail','barang_id','id');
    }
    
}
