<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;
//use App\Transformers\OrderTransformer;

class Order extends Model
{
  //public $transformer = OrderTransformer::class;
  protected $dates = [
      'delivery_date','pay_date'
  ];
  public function getStatusAttribute($value)
  {
    $rawStatus = [
      '1'=> ['error','danger','1'],
      '2'=> ['Pendiente','secondary','2'],
      '3'=> ['Pagado','success','3'],
      '4'=> ['Entregado','primary','4']
    ];
    return $rawStatus[$value];
  }


  // public function items()
  // {
  //   return $this->hasMany('App\Models\OrderItem');
  // }

  public function user()
  {
      return $this->belongsTo('App\Models\User\User');
  }


}
