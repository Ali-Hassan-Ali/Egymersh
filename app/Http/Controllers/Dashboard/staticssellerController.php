<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\SellerProduct;
use App\Models\wallet;
use App\Models\OrderStatus;
use App\Models\OrderItem;
use App\Models\order_seller;
use App\Models\product_order;
use App\Models\Order;
use DB;
class staticssellerController extends Controller
{

    public function index()
    {

        $seller_id=Auth::guard('seller')->user()->id;
     
        //end
        //order manual
        $orders=order_seller::where('seller_id' ,$seller_id)->orderBy('id', 'DESC')->get();
        $sumProfit =order_seller::where('seller_id' ,$seller_id)->where('status' ,'Delivered')->select(DB::raw('sum(profit) as "profit"')
        ,DB::raw('MONTH(created_at) month'))->groupby('month')->get();


        $order    =Order::where('order_status_id','4')->pluck('id')->toarray();
        $product = OrderItem::wherein('order_id', $order)->get();
        $details=0;
        foreach($product as $i){
            if($i->product->seller_id==$seller_id)
            $details =($i->product->selling_price*  $i->quantity) +$details;
        }


        $order_seller    =order_seller::where('status','Delivered')->sum('profit');
        $price=wallet::where('status_en','confirmed')->sum('price');
        $profit=$details + $order_seller;

        $manual_order=$orders->count('id');
        
        $all_product=SellerProduct::where('seller_id' ,$seller_id)->count('id');


        $order_Delivered    =Order::where('order_status_id',  4)->pluck('id')->toarray();
        $sales_Delivered = OrderItem::wherein('order_id', $order_Delivered)->get();
        $sales= 0;
        foreach($sales_Delivered as $e){
            if($e->product->seller_id==$seller_id) {
            $sales =  $e->count('id');
        }}

        return view('store.sellerstatics' ,compact(
            'profit','manual_order','orders','sumProfit','all_product','sales'
        ));




    }
    public function delete_order($id)
    {

        $doctor = order_seller::findOrFail($id)->delete();
        return back()->with('success'  , 'Order Deleted successfully' );

    }
    public function show($id)
    {
        $orders=order_seller::find($id);
        return view('store.showorder', compact('orders'));



    }
}
