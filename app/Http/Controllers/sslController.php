<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use App\Models\Payment;
use App\Models\Enrollment;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Checkout;
use Illuminate\Support\Facades\Session;

class sslController extends Controller
{
    public function store(Request $request)
    {
        $user = Customers::findOrFail(encryptor('decrypt', request()->session()->get('CustomersId')));
        $txnid = "SSLCZ_TXN_" . uniqid();
        $item_amount = session('cart_details')['total_amount'];

        //$settings = Generalsetting::findOrFail(1);
        $cart_details = array('cart' => session('cart'), 'cart_details' => session('cart_details'));
        // $cart_details=base64_encode(json_encode($cart_details));
        // $ll=json_decode(base64_decode($cart_details));
        // print_r($ll);
        // die();
        $check = new Checkout;
        $check->cart_data = base64_encode(json_encode($cart_details));
        $check->customer_id = $user->id;
        $check->txnid = $txnid;
        $check->order_note = $request->order_note;
        $check->status = 0;
        $check->save();

        $deposit = new Payment;
        $deposit->customer_id = $user->id;
        $deposit->currency = "BDT";
        $deposit->currency_code = "BDT";
        $deposit->amount = session('cart_details')['total_amount'];
        $deposit->currency_value = 1;
        $deposit->method = 'SSLCommerz';
        $deposit->txnid = $txnid;
        $deposit->save();


        $post_data = array();
        $post_data['store_id'] = 'geniu5e1b00621f81e'; //$settings->ssl_store_id;
        $post_data['store_passwd'] = 'geniu5e1b00621f81e@ssl'; //$settings->ssl_store_password;
        $post_data['total_amount'] = $item_amount;
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = $txnid;
        $post_data['success_url'] = action([sslController::class, 'notify']); //action ('User\DsslController@notify');
        $post_data['fail_url'] =  action([sslController::class, 'cancel']); //action('User\DsslController@cancle');
        $post_data['cancel_url'] =  action([sslController::class, 'cancel']); //action('User\DsslController@cancle');
        # $post_data['multi_card_name'] = "mastercard,visacard,amexcard";  # DISABLE TO DISPLAY ALL AVAILABLE


        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $user->name_en;
        $post_data['cus_email'] = $user->email;
        $post_data['cus_add1'] = $user->shipping_address;
        $post_data['cus_city'] = "Chattogram";
        $post_data['cus_state'] = "Chattogram";
        $post_data['cus_postcode'] = "4100";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = $user->contact_en;
        $post_data['cus_fax'] = $user->contact_en;


        # REQUEST SEND TO SSLCOMMERZ
        //if($settings->ssl_sandbox_check == 1){
        $direct_api_url = "https://sandbox.sslcommerz.com/gwprocess/v3/api.php";
        //}
        //else{
        //$direct_api_url = "https://securepay.sslcommerz.com/gwprocess/v3/api.php";
        // }


        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $direct_api_url);
        curl_setopt($handle, CURLOPT_TIMEOUT, 30);
        curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($handle, CURLOPT_POST, 1);
        curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC


        $content = curl_exec($handle);
        $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

        if ($code == 200 && !(curl_errno($handle))) {
            curl_close($handle);
            $sslcommerzResponse = $content;
        } else {
            curl_close($handle);
            return redirect()->back()->with('unsuccess', "FAILED TO CONNECT WITH SSLCOMMERZ API");
            exit;
        }

        # PARSE THE JSON RESPONSE
        $sslcz = json_decode($sslcommerzResponse, true);

        if (isset($sslcz['GatewayPageURL']) && $sslcz['GatewayPageURL'] != "") {

            # THERE ARE MANY WAYS TO REDIRECT - Javascript, Meta Tag or Php Header Redirect or Other
            # echo "<script>window.location.href = '". $sslcz['GatewayPageURL'] ."';</script>";
            echo "<meta http-equiv='refresh' content='0;url=" . $sslcz['GatewayPageURL'] . "'>";
            # header("Location: ". $sslcz['GatewayPageURL']);
            exit;
        } else {
            return redirect()->back()->with('unsuccess', "JSON Data parsing error!");
        }
    }


    public function cancel(Request $request)
    {
        $input = $request->all();
        $deposit = Payment::where('txnid', '=', $input['tran_id'])->orderBy('created_at', 'desc')->first();
        $customer = Customer::findOrFail($deposit->customer_id);
        $this->setSession($customer);
        return redirect()->route('home')->with('danger', 'Payment Cancelled.');
    }


    public function notify(Request $request)
    {
        $cancel_url = action([sslController::class, 'cancel']);
        $input = $request->all();
        if ($input['status'] == 'VALID') {
            $deposit = Payment::where('txnid', '=', $input['tran_id'])->orderBy('created_at', 'desc')->first();

            $check = Checkout::where('txnid', '=', $input['tran_id'])->orderBy('created_at', 'desc')->first();
            $check->status = 1;
            $check->save();

            $customer = Customers::findOrFail($deposit->customer_id);
            $this->setSession($customer);

            $deposit->status = 1;
            $deposit->save();

            // store in transaction table
            if ($deposit->status == 1) {
                $cart_details=json_decode(base64_decode($check->cart_data))->cart_details;
                $order = new Order;
                $order->customer_id = $check->customer_id;
                $order->sub_amount = $cart_details->cart_total;
                $order->discount = $cart_details->discount_amount;
                $order->total_amount = $cart_details->total_amount;
                $order->payment_status = "1";
                $order->delivery_status = "0";
                $order->order_date = date('Y-m-d');
                $order->save();
                foreach (json_decode(base64_decode($check->cart_data))->cart as $key => $c) {
                    $data = new OrderDetails;
                    $data->order_id = $order->id;
                    $data->product_id = $key;
                    $data->quantity = $c->quantity;
                    $data->price = $c->price;
                    $data->save();
                }
            }
            return redirect()->route('home')->with('success', 'Payment done!');
        } else {
            return redirect()->route('home')->with('danger', 'Please try Again!');
        }
    }

    public function setSession($customers)
    {
        return request()->session()->put([
            'CustomersId'=>encryptor('encrypt',$customers->id),
            'CustomersName'=>encryptor('encrypt',$customers->name_en),
            'CustomersEmail'=>encryptor('encrypt',$customers->email),
            'customerLogin' => 1,
            'image'=>$customers->image ?? 'no-image.png'
        ]
    );
    }
}