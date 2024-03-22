<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $primaryKey = 'id';
    public $timestamps = true;
    // protected $dateFormat = 'h:p:s';
    protected $fillable = ['id', 'name', 'identify_id', 'gender', 'date_of_birth', 'phone', 'address',  'status', 'img', 'created_at', 'updated_at'];
}
