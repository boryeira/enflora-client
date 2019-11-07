<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $appends = array('available');

    public function getAvailableAttribute()
    {
      $available = $this->quantity - $this->consumed;
      return $available;
    }

    public function getTypeAttribute($value)
    {
      $rawType = [
        '1'=> ['Flor','success','1'],
        '2'=> ['Extracto','warning','2'],
        '3'=> ['Comestible','danger','3'],
        '4'=> ['Accesorio','primary','4']
      ];
      return $rawType[$value];
    }
}
