<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $table = 'foods';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $dateFormat = 'h:i:s';
    protected $fillable = ['name', 'desc', 'count', 'price', 'created_at', 'updated_at'];
}
