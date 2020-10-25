<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribution extends Model
{
    use HasFactory;
    public function ordinateur(){
        return $this->belongsTo('App\Model\Ordinateur');
    }
    public function client(){
        return $this->belongsTo('App\Model\Client');
    }
    public function setUpdatedAt($value)
    {
      return NULL;
    }
    public function setCreatedAt($value)
    {
      return NULL;
    }
}
