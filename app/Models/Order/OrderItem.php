<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
  
  // public function batch()
  // {
  //     return $this->belongsTo('App\Models\Batch');
  // }
  public function order()
  {
      return $this->belongsTo('App\Models\Order\Order');
  }
}
