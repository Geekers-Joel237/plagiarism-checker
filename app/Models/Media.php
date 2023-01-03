<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $fillable= [
        'id',
        'filePath',
        'extension',
        'fileName',
    ];
    protected $dates = ['created_at','update_at'];
}
