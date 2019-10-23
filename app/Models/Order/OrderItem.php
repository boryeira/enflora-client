<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
  
  public function product()
  {
      return $this->belongsTo('App\Models\Product\Product');
  }
  
  public function order()
  {
      return $this->belongsTo('App\Models\Order\Order');
  }
}
