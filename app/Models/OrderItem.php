<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $guarded = [];
     public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('id', 'like', '%'.$search.'%');
                
    }

    public function product()
    {
        return $this->belongsTo(SellerProduct::class , 'seller_products_id');

    }//end of belongsTo product
    public function order()
    {
        return $this->belongsTo(Order::class , 'order_id');

    }
    public function order_iteam_size()
    {
        return $this->belongsTo(OrderItemSize::class,'order_item_id');

    }//end of belongsTo OrderItem

    public function order_iteam_color()
    {
        return $this->hasMany(OrderItemColor::class,'order_item_id');

    }//end of belongsTo OrderItem

}//end of model
