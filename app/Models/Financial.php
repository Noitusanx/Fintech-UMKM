<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financial extends Model
{
    use HasFactory;

    protected $fillable = ['tanggal', 'pemasukan', 'pengeluaran', 'deskripsi'];

    protected $casts = [
        'tanggal' => 'date',
    ];
}
