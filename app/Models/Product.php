<?php

// app/Models/Product.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['nama_produk', 'harga', 'kategori', 'deskripsi', 'gambar'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rates(){
        return $this->hasMany(Review::class);
    }

    public function getAverageRatingAttribute()
    {
        return $this->rates->avg('rate');
    }
}
