<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productos extends Model
{
    use HasFactory;
    protected $table='productos';
    protected $primarykey='id';
    protected $fillable=["nombre_producto" ,"referencia" ,"precio" ,"peso" ,"categoria" ,"stock"];
    protected $guarded=[];
    public $timestamps = false;
}
