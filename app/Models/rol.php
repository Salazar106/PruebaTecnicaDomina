<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rol extends Model
{
    use HasFactory;

    protected $primarykey='id';
    protected $fillable=['descripcion'];
    protected $guarded=[];
    public $timestamps = false;
}
