<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'title','description'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    protected $primaryKey = 'id';
    protected $table = 'posts';
}
