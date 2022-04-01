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
class ProviderCart extends Component
{
    protected $paginationTheme = 'bootstrap';
    public $search ;
    use WithPagination;
    public $tax;
    public $shipping;
    public $discount;
    public $client_id;
    public $hasShipping=false;
    public $editMode=false;
    public $discountRate;
    public $tvaRate;
    public $shippingRate;
    public $state=[];
    public $coup;
    public $services;
    public $client;




    /**
     * mount function 
     */
     public function mount($id)
     {
         $this->client_id=$id;
         $this->services=Service::where('user_id',auth()->user()->id)->get();
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
 * show parameter modal
 */

public function addNew()
{
    $this->resetErrorBag();
    $this->reset(['discountRate','tvaRate','shippingRate']);
    //show modal
    $this->dispatchBrowserEvent('showParametersModal');
    //edit mode
    $this->editMode=false;
}

/**
 *  show modal update parameters and
 */

public function editParam()
{

$invoice_parameters=InvoiceParameters::where('provider_id',auth()->user()->id)->first();
  
//show modal
$this->dispatchBrowserEvent('showParametersModal');
//edit mode
$this->editMode=true;
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




        //check if the client belong to the service of the authentificated provider
       $this->client=Client::where('id',$this->client_id)->whereIn('service_id', $this->services->pluck('id')->toArray())->first();
         if($this->client){
         
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
        // get the client to generate the invoice for him
        $client_service=Client::where('id',$this->client_id)->first();

        //get the service of the client
        $service=Service::findOrFail($client_service->service_id);


        //check if the client have a coupon
        $coupons=ProviderCoupon::select(\DB::raw('provider_coupons.*'))->join('discounts','discounts.id','=','provider_coupons.discount_id')
                                 ->where('discounts.service_id',$service->id)
                                 ->where('client_id',$client_service->id)
                                 ->where('provider_coupons.status','unused')
                                 ->first();
                                 
        $this->coup=$coupons;
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
        \Cart::session(auth()->user()->id)->condition($condition);
      
        
        //get all the items in the carts sorted by the adding datetime
        $items=\Cart::session(auth()->user()->id)->getContent()->sortBy(function($cart){
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

         //get the subtotal
         $sub_total=\Cart::session(auth()->user()->id)->getSubTotal();
          // get the total
          $total=\Cart::session(auth()->user()->id)->getTotal();

          //get the tva condition
          $newCondition=\Cart::session(auth()->user()->id)->getCondition('tva');
       
          //get the value of the tva condition
          $tva=$newCondition->getCalculatedValue($sub_total);
           
         //get all data and put it in side an array to be returned to the view
          $summary=[
                    'sub_total'=>$sub_total,
                    'tva'=>$tva,
                    'shipping'=>$this->shipping ,
                    'discount'=>$this->discount ,
                    'total'=>$total,
                   ];  
            
         return view('livewire.provider.provider-cart',[
                    'products'=>$products,
                    'carts'=>$cartData,
                    'summary'=>$summary,
                    'total'=>Product::where(function($sub_query) {
                        $sub_query->where('name','like', '%'.trim($this->search).'%');
                    })->where('service_id',$service->id)->latest()->get(),
                    'param'=>$invoice_parameters,
                    'coupons'=>$coupons,
                      ]);
        
                }
                else{
                    return view('livewire.provider.provider-cart');
                }
    }
    /**
     * add items to the cart
     */
public function addItem($id)
    {
      //add cart to the product id  
      $rowId="Cart".$id;
      //get the cart
      $cart=\Cart::session(auth()->user()->id)->getContent();
      //check if the product already in the cart
      $checkItemId=$cart->whereIn('id',$rowId);
      //if yes increase the quantity by 1
      if($checkItemId->isNotEmpty()){
        \Cart::session(auth()->user()->id)->update($rowId,[
            'quantity'=>[
                   'relative'=>true,
                   'value'=>1,
            ],
        ]);

      }
      //add the new product to the cart
      else{
        // get the product
        $product= Product::where('id',$id)->whereIn('service_id',$this->services->pluck('id')->toArray())->first();
        if($product){

         //check the product if it's unavailable
         if ($product->status=="unavailable") {
        // alert product inavailable
         $this->dispatchBrowserEvent('unavailable');

         }
         // add the product details to the cart item
         else{
            \Cart::session(auth()->user()->id)->add([
                'id'=>"Cart".$product->id,
                'name'=>$product->name,
                'price'=>$product->unit_price,
                'quantity'=>1,
                'attributes'=>[
                    'added_at'=>Carbon::now(),
                ]
             ]);
         }
        }
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

    $cart=\Cart::session(auth()->user()->id)->getContent();
    $flag=$cart->whereIn('id',$id);
    if($flag['quantity']==$product->qty){
        throw error
    }
    else{
        increase the quantity
    }
     */ 
    //get the cart   
    $cart=\Cart::session(auth()->user()->id)->getContent();
    //check if the item in the cart
    $flag=$cart->whereIn('id',$id);
    //increase the quantity by one
    if($flag){
        \Cart::session(auth()->user()->id)->update($id,[
            'quantity'=>[
                   'relative'=>true,
                   'value'=>1,
            ],
        ]);
    }else{
        //something wrong
       $this->dispatchBrowserEvent('transactionFailed');
    }

    }

    /**
     * decrease QTY
     */
    public function decreaseQty($id)
    {
    // get the cart
    $cart=\Cart::session(auth()->user()->id)->getContent();
    //check in the presence of the item
    $flag=$cart->whereIn('id',$id);
     
    if($flag){
        //remove the item if the QTY is equal to 1
        if($flag[$id]->quantity== 1){
         $this->removeItem($id);
        }
        else{
         //reduce the QTY by 1   
        \Cart::session(auth()->user()->id)->update($id,[
            'quantity'=>[
                   'relative'=>true,
                   'value'=>-1,
            ],
        ]);}
    }else{
        //something wrong
       $this->dispatchBrowserEvent('transactionFailed');
    }
    
    }

    /**
     * remove item from cart
     */
public function removeItem($id)
    {
        //get the cart
        $cart=\Cart::session(auth()->user()->id)->getContent();
        //check the item in the cart
        $flag=$cart->whereIn('id',$id);
        if($flag){
            //remove the item
            \Cart::session(auth()->user()->id)->remove($id);
        }
        else
        {
       //something wrong
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
         $cartTotal= \Cart::session(auth()->user()->id)->getTotal();
        2- get the payed ammount
        $payed=$this->payement
        3-subs
        $payedAmmount=  (int) $payed - (int) $cartTotal


        if($payedAmmount >=0 )
        DB::beginTransaction();
        try{
         $fullCart=\Cart::session(auth()->user()->id)->getContent();
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
      //using the transaction to avoid executing part of the query 
        DB::beginTransaction();
        try{
            //get the cart
         $fullCart=\Cart::session(auth()->user()->id)->getContent();
            //check the cart if its empty
            

            //alert cart is empty
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
            }
            
        //cart not empty
        else {
         //map all items in the cart and get id and QTY
         $filterCart=$fullCart->map(function ($item){
              return [
                  'id'=>substr($item->id,4,5),
                  'quantity'=>$item->quantity,
                 
              ];
            });
            
         //generate invoice number usinf idGenerator   
        $id = IdGenerator::generate(['table' => 'invoices', 'length' => 10, 'prefix' => 'INV-' , 'field' => 'invoice_number']);
                
         //get the parameter          
        $parameters=InvoiceParameters::where('provider_id',auth()->user()->id)->first();
                 
         //get the sub total      
        $sub_total=\Cart::session(auth()->user()->id)->getSubTotal();
        //get the total       
        $total=\Cart::session(auth()->user()->id)->getTotal();
         //get the tva condition         
        $SaveCondition=\Cart::session(auth()->user()->id)->getCondition('tva');
        //get the value of the tva conditon
        $tva=$SaveCondition->getCalculatedValue($sub_total);
        //calculate the shipping and the discount values         
        $shipping=($this->shipping * $sub_total)/100;
        $discount=($this->discount * $sub_total)/100;
        //calculate the final value of the total
        $total=$total+$shipping-$discount;

        if($this->coup and $this->coup->discount->taux===$this->discount and $this->discount != 0){
       //mark the coupon as used
        $this->coup->update([
        "status"=>"used",
        "using_date"=>Carbon::now(),
        ]);
        //set back the parameters to previous the default
        $parameters->update([
        'discount_rate'=>"0%"
        ]);
        }


        //save the invoice 
        $invoiceData=array(
            'parmeter_id'=>$parameters->id,
            'client_id'=>$this->client_id,
            'invoice_number'=>$id,
            'invoice_date'=>Carbon::now(),
            'discount_value'=>$discount,
            'shipping_value'=>$shipping,
            'tva_value'=>$tva,
            'total'=> $total,
                  );

                  
        Invoice::create($invoiceData);
        //get the id of the last invoice
        $invoice_id=Invoice::latest()->first()->id;
        //add products ordered to the product-invoice table
        foreach ($filterCart as $cart) {
            InvoiceProduct::create([
             'invoice_id'=>$invoice_id,
             'product_id'=>$cart['id'],
             'quantity'=>$cart['quantity']
                    ]);
                  }
        //clear the seession          
        \Cart::session(auth()->user()->id)->clear();

        DB::commit();

        //success alert and redirect
        $this->dispatchBrowserEvent('transactionSaved');
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
    /**
     * save invoice parameters
     */
public function saveInvoiceParameters()
    {
        //validate the data
        $this->validate([ 
        'tvaRate'=>'required|string|in:0%,1%,2%,3%,4%,5%,6%,7%,8%,9%,10%',
       // 'discountRate'=>'required|string',
        'shippingRate'=>'required|string|in:0%,1%,2%,3%,4%,5%,6%,7%,8%,9%,10%',
        ]);

         //store data in servie table
         $storedServiceData=array(
            'provider_id'=>auth()->user()->id,
            'tva_rate'=>$this->tvaRate,
            'discount_rate'=>"0%",
            //'discount_rate'=>$this->discountRate,
            'shipping_rate'=>$this->shippingRate,                     
        );
        InvoiceParameters::create($storedServiceData);
        $this->render();
        //send success alert
        $this->dispatchBrowserEvent('swal:success', [
        'position'=> 'top-end',
        'type'=> 'success',
        'title'=> 'Parameters enregesitrer avec success',
        'showConfirmButton'=> false,
        'timer'=> 3000,
        'confirmButtonClass'=> 'btn btn-primary',
        'buttonsStyling'=> false,
    ]);
    }
}
 