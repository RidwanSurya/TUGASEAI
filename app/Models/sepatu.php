<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sepatu extends Model
{
    use HasFactory;
    // protected $guarded = [];
    protected $table ='sepatu';
    protected $fillable = [
        'nama',
        'harga'
    ];

    // protected $hidden = [];
}
