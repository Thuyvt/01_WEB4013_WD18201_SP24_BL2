<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $primaryKey = 'id';

    public $timestamps = true;
    protected $fillable = ['id', 'name', 'created_at', 'updated_at'];

    // 1 Role has many customer
    public function customers() {
        return $this->hasMany(Customer::class);
    }
}
