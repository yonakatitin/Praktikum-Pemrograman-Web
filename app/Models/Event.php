<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_event',
        'lokasi',
        'tgl',
        'gambar',
    ];

    public function getImageUrlAttribute()
    {
        return asset('storage/uploads/' . $this->gambar);
    }

}
