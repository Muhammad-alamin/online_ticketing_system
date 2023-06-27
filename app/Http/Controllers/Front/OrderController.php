<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Commission;
use App\Models\Order;
use App\Models\TicketListing;
use App\Models\VendorProfit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Stripe\Stripe;

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

        if(Auth::check()){
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

            $data['commission'] = Commission::first();
            return view('front.orderReview',$data);
        }
        else{
            return redirect()->route('login');
        }

    }

    public function checkout(Request $request){

               $request->validate([
                   'first_name' => 'required',
                   'last_name' => 'required',
                   'email' => 'required',
                   'address' => 'required',
                   'city' => 'required',
                   'phone' => 'required',
               ]);

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
                    if(!empty($data['ticket_details']->image)){
                        $all_ticket_image = json_decode($data['ticket_details']->image);
                        $reduce_image = array_slice($all_ticket_image, 0, $request->quantity);
                        $existingImage = DB::table('ticket_listings')->where('id', $request->ticket_id)->value('image');
                        $existingArray = json_decode($existingImage, true);
                        $newArray = array_diff($existingArray, $reduce_image);

                        if (empty($newArray)) {
                            $newImage = null;
                        } else {
                            $newImage = json_encode(array_values($newArray));
                        }
                    }


                    $order = new Order();
                    $order->order_id = 'O-' . time();
                    $order->invoice_id = time();
                    $order->customer_id = auth()->user()->id;
                    $order->seller_id = $request->seller_id;
                    $order->ticket_id = $request->ticket_id;
                    $order->category_id = $request->category_id;
                    $order->sub_cat_id = $request->sub_cat_id;
                    $order->child_sub_cat_id = $request->child_sub_cat_id;
                    $order->venue_id = $request->venue_id;
                    $order->event_id = $request->event_id;
                    $order->section_id = $request->section_id;
                    $order->block_id = $request->block_id;
                    $order->order_ticket_id = $request->order_ticket_id;
                    $order->ticket_quantity = $request->quantity;
                    if(!empty($data['ticket_details']->image)){
                        $order->ticket_image = json_encode($reduce_image);
                    }
                    $order->fee = $request->fee;
                    $order->total_price = $request->total_price;
                    $order->ticket_price = $request->ticket_price;
                    $order->total_ticket_price = $request->total_ticket_price;
                    $order->first_name = $request->first_name;
                    $order->last_name = $request->last_name;
                    $order->email = $request->email;
                    $order->address = $request->address;
                    $order->city = $request->city;
                    $order->country = $request->country;
                    $order->state = $request->state;
                    $order->post_code = $request->post_code;
                    $order->phone = $request->phone;
                    $order->order_date = date('d/m/Y');
                    $order->order_month = date('F');
                    $order->order_year = date('Y');
                    $order->status = 'Processing';
                    $order->Save();

                // Set your Stripe API key
                Stripe::setApiKey(config('services.stripe.secret'));

                $encryptedOrderId = encrypt($order->id); // Encrypt the order ID

                $session = \Stripe\Checkout\Session::create([

                    'line_items'  => [
                        [
                            'price_data' => [
                                'currency'     => 'gbp',
                                'product_data' => [
                                    'name' => $data['ticket_details']->match_name,
                                ],
                                'unit_amount'  => $request->ticket_price * 100,
                            ],
                            'quantity'   => $request->quantity,
                        ],
                        [
                            'price_data' => [
                                'currency' => 'gbp',
                                'unit_amount' => $request->fee * 100,
                                'product_data' => [
                                    'name' => 'Commission',
                                ],
                            ],
                            'quantity' => 1,
                        ],
                    ],

                    'metadata' => [
                        'order_id' =>  $order->order_id,
                        'ticket_id' =>  $order->order_ticket_id,

                      ],

                      'payment_intent_data' => [
                        'metadata' => [
                            'order_id' =>  $order->order_id,
                            'ticket_id' =>  $order->order_ticket_id,
                        ]
                      ],

                    'mode'        => 'payment',
                    'success_url' => route('success', ['order' => $encryptedOrderId]),
                    'cancel_url'  => route('checkout'),
                ]);

                return redirect()->away($session->url);
            }

            public function success(Request $request, $encryptedOrderId){
                $d_id = decrypt($encryptedOrderId);

                $order_details = Order::where('id',$d_id)->first();

                $data['ticket_details'] = DB::table('ticket_listings')
                    ->join('child_sub_categories','ticket_listings.child_sub_cat_id', 'child_sub_categories.id')
                    ->join('sections','ticket_listings.section_id', 'sections.id')
                    ->leftJoin('blocks','ticket_listings.block_id', 'blocks.id')
                    ->join('events','ticket_listings.event_id', 'events.id')
                    ->join('venues','ticket_listings.venue_id', 'venues.id')
                    ->select('child_sub_categories.*','blocks.*','sections.*','venues.*','events.*','ticket_listings.*')
                    ->where('ticket_listings.id',$order_details->ticket_id)
                    ->first();
                    // echo "<pre>";print_r($data);die;

                    if ($order_details->status !== 'Paid') {
                        //ticket image reduce when order done
                        if(!empty($data['ticket_details']->image)){
                            $all_ticket_image = json_decode($data['ticket_details']->image);
                            $reduce_image = array_slice($all_ticket_image, 0, $order_details->ticket_quantity);
                            $existingImage = DB::table('ticket_listings')->where('id', $order_details->ticket_id)->value('image');
                            $existingArray = json_decode($existingImage, true);
                            $newArray = array_diff($existingArray, $reduce_image);

                            if (empty($newArray)) {
                                $newImage = null;
                            } else {
                                $newImage = json_encode(array_values($newArray));
                            }

                            DB::table('ticket_listings')->where('id', $order_details->ticket_id)->update(['image' => $newImage]);

                            Session::put('ticket_image',$order_details->id);
                        }

                        $order_status = Order::where('id',$d_id)->update(['status'=> 'Paid']);

                        //ticket reduce when order done
                        DB::table('ticket_listings')->where('id', $order_details->ticket_id)->update(['ticket_count' => DB::raw('ticket_count -' . $order_details->ticket_quantity)]);

                        Session::put('order_id',$order_details->order_id);
                        Session::put('ticket_id',$order_details->order_ticket_id);
                        Session::put('status',$order_status);
                        Session::put('purchasing_date',$order_details->order_date);
                        Session::put('grand_total',$order_details->total_price);

                        $vendor_profit = new VendorProfit();
                        $vendor_profit->seller_id = $order_details->seller_id;
                        $vendor_profit->order_id = $order_details->id;
                        $vendor_profit->profit_amount = $order_details->total_ticket_price;
                        $vendor_profit->save();
                    }

                return view('front.success');
            }

            public function cancel(){
                return view('front.cancel');
            }
}
