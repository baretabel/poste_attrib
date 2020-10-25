<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordinateur extends Model
{
    use HasFactory;
    public function attribution(){
        return $this->hasOne('App\Models\Attribution');
    }
    protected $fillable = [
        'id',
        'nom',
    ];
    public function setUpdatedAt($value)
    {
      return NULL;
    }


    public function setCreatedAt($value)
    {
      return NULL;
    }
}
