<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flower extends Model
{
    use HasFactory;public $timestamps = false;
    protected $primaryKey = 'id';

    public function flower()
    {
        return $this->belongsTo(Flower::class, 'id', 'id');
    }
    protected $fillable = ['id', 'name', 'description', 'image', 'origin', 'created_at', 'updated_at'];
}
