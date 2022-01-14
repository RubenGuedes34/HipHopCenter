<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Stripe;
use App\Models\Musica;
use App\Models\Album;
use App\Models\Artist;
use DB;
 
class StripeController extends Controller
{
    public function stripe()
    {
        return view('stripe');
    }
    public function payStripe(Request $request)
    {
        $this->validate($request, [
            'card_no' => 'required',
            'expiry_month' => 'required',
            'expiry_year' => 'required',
            'cvv' => 'required',
        ]);
 
        $stripe = Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        try {
            $response = \Stripe\Token::create(array(
                "card" => array(
                    "number"    => $request->input('card_no'),
                    "exp_month" => $request->input('expiry_month'),
                    "exp_year"  => $request->input('expiry_year'),
                    "cvc"       => $request->input('cvv')
                )));
            if (!isset($response['id'])) {
                return redirect()->route('addmoney.paymentstripe');
            }
            $charge = \Stripe\Charge::create([
                'card' => $response['id'],
                'currency' => 'USD',
                'amount' =>  6.99 * 100,
                'description' => '1 year Subscription',
            ]);
 
            if($charge['status'] == 'succeeded' && auth()->user()->type==0) {
                $id_user= auth()->user()->id;
                DB::table('users')
                 ->where('id', $id_user)
                 ->update(
                 ['type' => 1]
                );
                return view("pagamentos")->with('success', 'Payment Success!');
 
            } else if(auth()->user()->type==1 || auth()->user()->type==2) {
                return redirect('stripe')->with('error', 'You already have premium status.');
            }else{
                return redirect('stripe')->with('error', 'something went to wrong.');
            }
 
        }
        catch (Exception $e) {
            return $e->getMessage();
        }
 
    }
}
?>