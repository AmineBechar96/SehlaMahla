<?php

namespace App\Http\Livewire\Provider;

use App\Models\Provider\Invoice;
use App\Models\Provider\InvoiceParameters;
use App\Models\Provider\InvoiceOrder;
use App\Models\Provider\InvoiceProduct;
use App\Models\Provider\ProviderCoupon;

use Livewire\Component;
use App\Models\Provider\Product;
use App\Models\Provider\Client;

use App\Models\services\Service;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;
use DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;
class ProviderEditCart extends Component
{
    protected $paginationTheme = 'bootstrap';
    public $search ;
    use WithPagination;
    public $tax;
    public $shipping;
    public $coup;
    public $discount;
    public $client_id;
    public $invoice_id;

    public $hasShipping=false;
   
    public $discountRate;
    public $tvaRate;
    public $shippingRate;
    public $state=[];
    public $servicess;
     

    /**
     * mount function 
     */
    public function mount($id)
    {
        $this->servicess=Service::where('user_id',auth()->user()->id)->get();
        $this->invoice_id=$id;
    }
   /**
     * go back the first page 
     * and search from there
     */
public function searchagency()
{
    $this->gotoPage(1);
    
}


/**
*  show modal update parameters and
*/

public function editParam()
{

$invoice_parameters=InvoiceParameters::where('provider_id',auth()->user()->id)->first();

//show modal
$this->dispatchBrowserEvent('showParametersModal');

//set the proprieties
$this->state=$invoice_parameters->toArray();
$this->discountRate=$invoice_parameters->discount_rate;
$this->tvaRate=$invoice_parameters->tva_rate;
$this->shippingRate=$invoice_parameters->shipping_rate;

}

/**
* update parametrs
*/
public function updateParam()
{

$this->validate([  
    'tvaRate'=>'required|string|in:0%,1%,2%,3%,4%,5%,6%,7%,8%,9%,10%',
    'discountRate'=>'required|string',
    'shippingRate'=>'required|string|in:0%,1%,2%,3%,4%,5%,6%,7%,8%,9%,10%',
]);

 //store data in servie table
 $updatedData=array(
    'tva_rate'=>$this->tvaRate,
    'discount_rate'=>$this->discountRate,
    'shipping_rate'=>$this->shippingRate,                     
);

     //get the parameters to updated
     $invoice_parameters=InvoiceParameters::where('provider_id',auth()->user()->id)->first();
     //update the parameters
     $invoice_parameters->update($updatedData);
     //close the modal
     $this->dispatchBrowserEvent('closeModal');

}
    public function render()
    {
        //get the parameters to be applies on the cart
        $invoice_parameters=InvoiceParameters::where('provider_id',auth()->user()->id)->first();

        if($invoice_parameters){
            //set the tax and the shipping and the discout rates
            $this->tax=$invoice_parameters->tva_rate;
            $this->shipping=(int) substr($invoice_parameters->shipping_rate, 0, -1);
            $this->discount=(int) substr($invoice_parameters->discount_rate, 0, -1);

        }
        else{
            $this->tax="0%";
            $this->shipping=0;
            $this->discount=0;
        }
        //get the invoice to be updated
        $invoice=Invoice::where('id',$this->invoice_id)->where('parmeter_id',$invoice_parameters->id)->first();
        if($invoice){
        // get the client to generate the invoice for him 
        $client_service=Client::where('id',$invoice->client_id)->first();

        //get the service of the client
        $service=Service::findOrFail($client_service->service_id);

        //check if the client have used a coupon
        if($invoice->discount_value > 0)
        {
         $coupon=ProviderCoupon::select(\DB::raw('provider_coupons.*'))->join('discounts','discounts.id','=','provider_coupons.discount_id')
         ->where('discounts.service_id',$service->id)
         ->where('client_id',$client_service->id)
         ->where('provider_coupons.status','used')
         ->where('provider_coupons.status','used')
         ->whereDate('provider_coupons.updated_at' , $invoice->created_at)
         ->first();
       $this->coup=$coupon;
        }
        else{
            $coupon=null;
            $this->coup=null;
        }

       
        //get the products related to the service
        $products=Product::where(function($sub_query) {
            $sub_query->where('name','like', '%'.trim($this->search).'%');
        })->where('service_id',$service->id)->latest()->paginate(6);

        
       
           
        
         // add the tva conditon 
        $condition = new \Darryldecode\Cart\CartCondition(array(
                'name' => 'tva',
                'type' => 'tax',
                'target' => 'total', // this condition will be applied to cart's subtotal when getSubTotal() is called.
                'value' => $this->tax,
                'order' =>1
            ));

        //apply the condition to the cart
        \Cart::session($this->invoice_id)->condition($condition);
       
        //get all the items in the carts sorted by the adding datetime
        $items=\Cart::session($this->invoice_id)->getContent()->sortBy(function($cart){
          return $cart->attributes->get('added_at');
        });

        
      //if the cart is empty set cart to empty array
       if(\Cart::isEmpty()){
        $cartData=[];

         
    }
     // else set stock the cart items in cart array variable
      else{
        
        foreach($items as $item){
            $cart[]=[
                'rowId'=>$item->id,
                'name'=>$item->name,
                'qty'=>$item->quantity,
                'pricesingle'=>$item->price,
                'price'=>$item->getPriceSum(),

            ];
        }
        // put the items cart in a variable to be returned to the view
        $cartData=collect($cart);
    }

        $sub_total=\Cart::session($this->invoice_id)->getSubTotal();
        $total=\Cart::session($this->invoice_id)->getTotal();


        $newCondition=\Cart::session($this->invoice_id)->getCondition('tva');
      

        $tva=$newCondition->getCalculatedValue($sub_total);
            
        //get all data and put it in side an array to be returned to the view
                $summary=[
                    'sub_total'=>$sub_total,
                    'tva'=>$tva,
                    'shipping'=>$this->shipping ,
                    'discount'=>$this->discount ,

                    'total'=>$total,
             ];  
            
             return view('livewire.provider.provider-edit-cart',[
                 'invoice'=>$invoice,
                'products'=>$products,
                'carts'=>$cartData,
                'summary'=>$summary,
                'total'=>Product::where(function($sub_query) {
                    $sub_query->where('name','like', '%'.trim($this->search).'%');
                })->where('service_id',$service->id)->latest()->get(),
                'param'=>$invoice_parameters,  
                'coupon'=>$coupon
       ]);
            }
            else{
                $coupon=null;
                return view('livewire.provider.provider-edit-cart',['invoice'=>$invoice,'coupon'=>$coupon]);
            }
        }
     /**
     * add items to the cart
     */
    public function addItem($id)
    {
      $rowId="Cart".$id;

      $cart=\Cart::session($this->invoice_id)->getContent();
      $checkItemId=$cart->whereIn('id',$rowId);
      if($checkItemId->isNotEmpty()){
        \Cart::session($this->invoice_id)->update($rowId,[
            'quantity'=>[
                   'relative'=>true,
                   'value'=>1,
            ],
        ]);
      }else{
         $product= Product::where('id',$id)->whereIn('service_id',$this->servicess->pluck('id')->toArray())->first();
         if($product){
         if ($product->status=="unavailable") {
             return session()->flash('error','ce produit nest pas disponible en stock');
         }else{
            \Cart::session($this->invoice_id)->add([
                'id'=>"Cart".$product->id,
                'name'=>$product->name,
                'price'=>$product->unit_price,
                'quantity'=>1,
                'attributes'=>[
                    'added_at'=>Carbon::now(),
                ]
             ]);
         }}
         else
         {
        //something wrong
        $this->dispatchBrowserEvent('transactionFailed');
         }
       
      }
      
    }
    /**
     * enable TVA
     */
    public function enableTVA()
    {
        $this->tax="+10%";
    }
    /**
     * disable TVA
     */
    public function disableTVA()
    {
        $this->tax="0%";
    }


    /**
     * increase QTY
     */
    public function increaseQty($id)
    {
     /*
    in case of checking the product quantity 
    you can get the product and then compare the quantity
    if it's bigger then the stock throw error message

    $product_id=substr($id,4,5);
    $product=Product::findOrFail($product_id);

    $cart=\Cart::session($this->invoice_id)->getContent();
    $flag=$cart->whereIn('id',$id);
    if($flag['quantity']==$product->qty){
        throw error
    }
    else{
        increase the quantity
    }
     */   
    $cart=\Cart::session($this->invoice_id)->getContent();
    $flag=$cart->whereIn('id',$id);
    if($flag){
        \Cart::session($this->invoice_id)->update($id,[
            'quantity'=>[
                   'relative'=>true,
                   'value'=>1,
            ],
        ]);
    }else{
        $this->dispatchBrowserEvent('transactionFailed');
    }
   
    }

    /**
     * decrease QTY
     */
    public function decreaseQty($id)
    {
    
    $cart=\Cart::session($this->invoice_id)->getContent();
    $flag=$cart->whereIn('id',$id);

    if($flag){
        if($flag[$id]->quantity== 1){
         $this->removeItem($id);
        }
        else{
        \Cart::session($this->invoice_id)->update($id,[
            'quantity'=>[
                   'relative'=>true,
                   'value'=>-1,
            ],
        ]);}
    }
    else{
        $this->dispatchBrowserEvent('transactionFailed');
    }
   
    }

    /**
     * remove item from cart
     */
    public function removeItem($id)
    {
        $cart=\Cart::session($this->invoice_id)->getContent();
        $flag=$cart->whereIn('id',$id);
        if($flag){
            \Cart::session($this->invoice_id)->remove($id);
        }
        else{
            $this->dispatchBrowserEvent('transactionFailed');
        }

    }

  

    /**
     * commit the transaction 
     * and save the invoice
     */
    public function saveTransaction()
    {
        /*
         in case you want to add payement checking and quantity in stock:
        1-get the total
         $cartTotal= \Cart::session($this->invoice_id)->getTotal();
        2- get the payed ammount
        $payed=$this->payement
        3-subs
        $payedAmmount=  (int) $payed - (int) $cartTotal


        if($payedAmmount >=0 )
        DB::beginTransaction();
        try{
         $fullCart=\Cart::session($this->invoice_id)->getContent();
         $filterCart=$fullCart->map(function ($item){
           return [
               'id'=substr($item->id,4,5)
               'quantity'=>$item->quantity
           ]
        foreach ($filterCart as $cart) {
       $product=Product::findOrFail($cart['id']);
       if($product->quantity===0){
           return session()->flash('error','there is no product in stock');
       }
       else{
           $product->decrement('quantity',$cart['quantity']);
       }
          }
         });

         DB::commit();
        }catch(\Throwable $th){
        DB::rollback();
        return session()->flash('error','there is no product in stock');
        }

         */
      
        DB::beginTransaction();
        try{
           
            
            $fullCart=\Cart::session($this->invoice_id)->getContent();
            
            if ($fullCart->isEmpty()) {
               $this->dispatchBrowserEvent('cartempty', [
                'position'=> 'top-end',
                'type'=> 'error',
                'title'=> 'le Panier est Vide Veuilliez Selectionner des Produits',
                'showConfirmButton'=> false,
                'timer'=> 3000,
                'confirmButtonClass'=> 'btn btn-primary',
                'buttonsStyling'=> false,
            ]);
            } else {
                
            
            
            
            $filterCart=$fullCart->map(function ($item){
              return [
                  'id'=>substr($item->id,4,5),
                  'quantity'=>$item->quantity,
                 
              ];
            });
            
                  //get the parameter          
                  $parameters=InvoiceParameters::where('provider_id',auth()->user()->id)->first();
             
                  $sub_total=\Cart::session($this->invoice_id)->getSubTotal();
                  
                  $total=\Cart::session($this->invoice_id)->getTotal();
                  
                  $SaveCondition=\Cart::session($this->invoice_id)->getCondition('tva');
                  $tva=$SaveCondition->getCalculatedValue($sub_total);
                  $invoice=Invoice::findOrFail($this->invoice_id);
                 
                  $shipping=($this->shipping * $sub_total)/100;
                  $discount=($this->discount * $sub_total)/100;

                  $total=$total+$shipping-$discount;

                  if($this->coup->discount->taux===$this->discount and $this->discount != 0){
                     //set back the parameters to previous the default
                     $parameters->update([
                     'discount_rate'=>"0%"
                     ]);
                     }
                  $invoiceUpdateData=array(
                      'discount_value'=>$discount,
                      'shipping_value'=>$shipping,
                      'tva_value'=>$tva,
                      'total'=> $total,
                  );

                  //save the invoice 
                 $invoice->update($invoiceUpdateData);
                 $orders=InvoiceProduct::where('invoice_id',$this->invoice_id)->get();
                //delete all previous orders
                 $orders->each->delete();
                
                  //add products order to the invoiceorder table
                  foreach ($filterCart as $cart) {
                      InvoiceProduct::create([
                        'invoice_id'=>$this->invoice_id,
                        'product_id'=>$cart['id'],
                        'quantity'=>$cart['quantity']
                    ]);
                  }
                  \Cart::session($this->invoice_id)->clear();

           DB::commit();
           return redirect('provider/invoices');
        }
    }
       
        catch(\Throwable $th){
            DB::rollback();
            //in case of something wrong
            $this->dispatchBrowserEvent('transactionFailed');
            //dd($th);
            }
    }
   
}
