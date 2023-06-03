<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\TicketListing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function orderDetails($id){
        $d_id = decrypt($id);

        $data['ticket_details'] = DB::table('ticket_listings')
        ->join('child_sub_categories','ticket_listings.child_sub_cat_id', 'child_sub_categories.id')
        ->join('sections','ticket_listings.section_id', 'sections.id')
        ->leftJoin('blocks','ticket_listings.block_id', 'blocks.id')
        ->join('events','ticket_listings.event_id', 'events.id')
        ->join('venues','ticket_listings.venue_id', 'venues.id')
        ->select('child_sub_categories.*','blocks.*','sections.*','venues.*','events.*','ticket_listings.*')
        ->where('ticket_listings.id',$d_id)
        ->first();
        return view('front.orderDetails',$data);
    }

    public function orderReview(Request $request, $id){

        $d_id = decrypt($id);
        if ($request->has('quantity')) {
            $data['quantity'] = decrypt($request->quantity);
            }
        $data['ticket_details'] = DB::table('ticket_listings')
        ->join('child_sub_categories','ticket_listings.child_sub_cat_id', 'child_sub_categories.id')
        ->join('sections','ticket_listings.section_id', 'sections.id')
        ->leftJoin('blocks','ticket_listings.block_id', 'blocks.id')
        ->join('events','ticket_listings.event_id', 'events.id')
        ->join('venues','ticket_listings.venue_id', 'venues.id')
        ->select('child_sub_categories.*','blocks.*','sections.*','venues.*','events.*','ticket_listings.*')
        ->where('ticket_listings.id',$d_id)
        ->first();
        return view('front.orderReview',$data);
    }

    public function checkout(Request $request){

        //        $request->validate([
        //            'billing_name' => 'required',
        //            'billing_email' => 'required',
        //            'billing_mobile' => 'required',
        //            'billing_address' => 'required',
        //            'billing_city' => 'required',
        //            'billing_state' => 'required',
        //            'billing_zip' => 'required',
        //
        //            'shipping_name' => 'required',
        //            'shipping_mobile' => 'required',
        //            'shipping_address' => 'required',
        //            'shipping_city' => 'required',
        //            'shipping_state' => 'required',
        //            'shipping_zip' => 'required',
        //        ]);

                    $data = $request->all();
                    if ($request->has('quantity')) {
                        $data['quantity'] = $request->quantity;
                        }
                    $data['ticket_details'] = DB::table('ticket_listings')
                    ->join('child_sub_categories','ticket_listings.child_sub_cat_id', 'child_sub_categories.id')
                    ->join('sections','ticket_listings.section_id', 'sections.id')
                    ->leftJoin('blocks','ticket_listings.block_id', 'blocks.id')
                    ->join('events','ticket_listings.event_id', 'events.id')
                    ->join('venues','ticket_listings.venue_id', 'venues.id')
                    ->select('child_sub_categories.*','blocks.*','sections.*','venues.*','events.*','ticket_listings.*')
                    ->where('ticket_listings.id',$request->ticket_id)
                    ->first();
                    // echo "<pre>";print_r($data);die;

                    //ticket image reduce when order done
                    $all_ticket_image = json_decode($data['ticket_details']->image);
                    $data = array_slice($all_ticket_image, 0, $request->quantity);
                    $existingImage = DB::table('ticket_listings')->where('id', $request->ticket_id)->value('image');
                    $existingArray = json_decode($existingImage, true);

                    $newArray = array_diff($existingArray, $data);

                    $newImage = json_encode(array_values($newArray));

                    DB::table('ticket_listings')->where('id', $request->ticket_id)->update(['image' => $newImage]);

                    //ticket reduce when order done
                    DB::table('ticket_listings')->where('id', $request->ticket_id)->update(['ticket_count' => DB::raw('ticket_count -' . $request->quantity)]);

                    return "True";


                    $billingAddress = new BillingAddress();

                    $billingAddress->customer_id = Auth::user()->id;
                    $billingAddress->first_name = $request->first_name;
                    $billingAddress->last_name = $request->last_name;
                    $billingAddress->email = $request->email;
                    $billingAddress->address = $request->address;
                    $billingAddress->city = $request->city;
                    $billingAddress->country = $request->country;
                    $billingAddress->state = $request->state;
                    $billingAddress->post_code = $request->post_code;
                    $billingAddress->phone = $request->phone;
                    $billingAddress->save();

                    $order = new Order();
                    $order->order_id = 'O-' . time();
                    $order->user_id = $user_id;
                    $order->brand_id = $data['brand_id'];
                    $order->vendor_id = $vendor_id->user_id;
                    $order->category_id = $data['category_id'];
                    $order->invoice_id = time();
                    $order->user_email = $user_email;
                    $order->full_name = $shippingDetails->shipping_name;
                    $order->address = $shippingDetails->shipping_address;
                    $order->city = $shippingDetails->shipping_city;
                    $order->state = $shippingDetails->shipping_state;
                    $order->zip = $shippingDetails->shipping_zip;
                    $order->country = $shippingDetails->shipping_country;
                    $order->phone = $shippingDetails->shipping_mobile;
                    $order->notes = $shippingDetails->shipping_notes;
                    $order->coupon_code = $coupon_code;
                    $order->coupon_amount = $coupon_amount;
                    $order->product_price = $data['product_price'];
                    $order->payment_method = $data['payment_method'];
                    $order->grand_total = $main_total;
                    $order->delivery_charge = $data['ajax_delivery_charge'];
                    $order->order_date = date('d/m/Y');
                    $order->order_month = date('F');
                    $order->order_year = date('Y');
                    if ($request->payment_method != 'card') {
                        $order->status = Order::STATUS_PROCESSING;
                    }
                $order->Save();

                $session_id = Session::get('session_id');

                $catProducts = Cart::with('product')->where(['session_id' =>$session_id])->get();

                foreach($catProducts as $pro){
                    $cartPro = new OrderDetails();
                    $cartPro->order_id = $order->id;
                    $cartPro->user_id = $user_id;
                    $cartPro->brand_id = $pro->product->brand_id;
                    $cartPro->category_id = $pro->product->category_id;
                    $cartPro->product_id = $pro->pro_id;
                    $cartPro->product_code = $pro->pro_code;
                    $cartPro->product_name = $pro->pro_name;
                    $cartPro->product_color = $pro->pro_colour;
                    $cartPro->product_size = $pro->pro_size;
                    $cartPro->product_price = $pro->pro_price;
                    $cartPro->product_qty = $pro->pro_quantity;
                    $cartPro->save();

                    if (isset($pro->pro_size)){
                        DB::table('attributes')->where('product_id',$pro->pro_id)
                            ->where('attributes_size',$pro->pro_size)
                            ->update(['attributes_stock' => DB::raw('attributes_stock -' . $pro->pro_quantity)]);
                    }else{
                        DB::table('products')->where('id',$pro->pro_id)
                            ->update(['product_quantity' => DB::raw('product_quantity -' . $pro->pro_quantity)]);
                    }

                }


                if($data['payment_method']=="cod"){
                    Session::put('order_id',$order->order_id);
                    Session::put('status',$order->status);
                    Session::put('date',date('d/m/Y'));
                    Session::put('grand_total',$data['grand_total']);
                    Session::put('payment_method',$data['payment_method']);

                    return redirect()->route('success');
                }else{
                    return redirect()->route('online_payment');
                }

            }
}
