<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    public function getStatusAttribute($value)
    {
      $rawType = [
        '1'=> ['id'=>'1','name'=>'Revision','css'=>'info'],
        '2'=> ['id'=>'2','name'=>'Activa','css'=>'success'],
        '3'=> ['id'=>'3','name'=>'Vencida','css'=>'danger'],
      ];
      return $rawType[$value];
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User\User');
    }
}
