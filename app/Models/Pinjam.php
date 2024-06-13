<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pinjam';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_buku',
        'id_user',
        'tanggal_peminjaman',
        'tanggal_pengembalian',
        'status_peminjaman',
    ];  
    

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user','id');
    }
}