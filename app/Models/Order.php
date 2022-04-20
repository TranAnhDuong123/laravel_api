<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'details','client','is_fulfilled'
    ];
    protected $primaryKey = 'id';
    protected $table = 'orders';
}
