<?php

namespace App\Http\Livewire\Provider;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use App\Models\services\Service;
use App\Models\Provider\Product;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
class Products extends Component
{

use WithFileUploads;
use WithPagination;
protected $paginationTheme = 'bootstrap';
public $state=[];
public $search ;
public $OldImage;
public $editMode=false;
public $product_service;
public $pay_type;
public $product_name;
public $product_price;
public $product_description;
public $product_image;
public $deleted_product_id;
public $deleted_product_name;

public function mount()
    {
     
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
public function render()
    {
        $products=Product::where(function($sub_query) {
            $sub_query->where('name','like', '%'.trim($this->search).'%');})
            ->whereIn('service_id',$this->services->pluck('id')->toArray())->latest();
        $productss=Product::
           whereIn('service_id',$this->services->pluck('id')->toArray())->get();    
        return view('livewire.provider.products',[
            'products'=>$products->paginate(4),
            'total'=>$products->count(),
            'prod'=>$productss
        ]);
    }

    /**
     * show the product to be updated in the modal
     */
public function editProduct($id)
{
$product=Product::where('id',$id)->whereIn('service_id',$this->services->pluck('id')->toArray())->first();
if($product){
//show modal
$this->dispatchBrowserEvent('showModal');
//edit mode
$this->editMode=true;
$this->state=$product->toArray();
$this->product_service=$product->service_id;
$this->pay_type=$product->pay_type;
$this->product_name=$product->name;
$this->product_price=$product->unit_price;
$this->product_description=$product->description;
$this->product_image=$product->product_image;
$this->OldImage=$product->product_image;
}
else{
    $this->dispatchBrowserEvent('somethingwrong');
}
}
/**
 * show modal and set the edit mode to false 
 */
public function addNew()
{
$this->resetErrorBag();
$this->reset(['product_service','pay_type','product_name','product_price','product_description','product_image']);
//show modal
$this->dispatchBrowserEvent('showModal');
//edit mode
$this->editMode=false;
}

/**
 * add new product
 */
public function addProduct()
{
    //validate the data
    $this->validate([
       'product_service'=>'required|exists:services,id',
       'product_image'=>'image|nullable|mimes:jpeg,png,jpg|max:2048',
       'product_name'=>'required|string',
       'pay_type'=>'required|string|in:hour,day,week,month,piece,task,meter,kilograme,check-up,project,event,shipping',
       'product_price'=>'required|numeric',
       'product_description'=>'string|required|min:20|max:70',
              ]);

   if(in_array($this->product_service,$this->services->pluck('id')->toArray())){          
    //store the data in the public storage  and save the path
    if($this->product_image){
            $image=$this->product_image->store('/','services/service-products');
    }
        else{
            $image=null;
        }
        
    //store data in servie table
    $storedServiceData=array(
            'service_id'=>$this->product_service,
            'product_image'=>$image,
            'name'=>$this->product_name,
            'unit_price'=>$this->product_price,
            'pay_type'=>$this->pay_type,
            'description'=>$this->product_description,                     
              
        );
     //store the data   
    Product::create($storedServiceData);
    $this->render();

    //send success alert
    $this->dispatchBrowserEvent('swal:success');

    //close the modal
    $this->dispatchBrowserEvent('closeModal');
    }
    else{
        $this->dispatchBrowserEvent('somethingwrong');
    }
    }



    /**
     * update product
     */
public function updateProduct()
    {
        //revalidate the data
        $this->validate([
            'product_service'=>'required|exists:services,id',
            'product_name'=>'required|string',
            'pay_type'=>'required|string|in:hour,day,week,month,piece,task,meter,kilograme,check-up,project,event,shipping',
            'product_price'=>'required|numeric',
            'product_description'=>'string|required|min:20|max:70',
        ]);
     
        //check if the image is the same
        if($this->product_image){
            if($this->product_image == $this->OldImage){
            $img = $this->product_image;
        }
        else{
            //validate the new image
            $this->validate([
                'product_image'=>'image|nullable|mimes:jpeg,png,jpg|max:2048',
                ]);
            // store the image and get the path
            $img=$this->product_image->store('/','services/service-products');
            //remove the old image
            Storage::disk('services/service-products')->delete($this->OldImage);  
            }
        }
        else{
            $img=null;
        }
        
        //store data in servie table
        $updatedData=array(
            'product_image'=>$img,
            'name'=>$this->product_name,
            'unit_price'=>$this->product_price,
            'pay_type'=>$this->pay_type,
            'description'=>$this->product_description,                     
              
        );
        
         //get the product to be updated
        $editedProduct=Product::findOrFail($this->state['id']);

         //update the product
         $editedProduct->update($updatedData);

        //send success alert
        $this->dispatchBrowserEvent('swal:update');
  
         //close the modal
         $this->dispatchBrowserEvent('closeModal');
        
        
    }

    /**
     * confirm delete
     * and get the id of the product to be deleted
     */
   
public function confirmDelete($id)
    {

        //store the id of the product
        $this->deleted_product_id=$id;
        //get the product
       $product=Product::where('id',$id)->whereIn('service_id',$this->services->pluck('id')->toArray())->first();
       if($product){
        //store the name
        $this->deleted_product_name=$product->name;
        //show the confirm delete modal
        $this->dispatchBrowserEvent('showConfirmModal');   
     }else{
        $this->dispatchBrowserEvent('somethingwrong');
     }
    }

         /**
          * delete the product
         */
public function deleteProduct()
        {
         //find the product
        $product=Product::findOrFail($this->deleted_product_id);
         // check if the product have an image
         \DB::beginTransaction();
         try{

         
        //delete the product 
        $product->delete();
        if ($product->product_image) {
            //delete the image from the storage
            Storage::disk('services/service-products')->delete($product->product_image);  
         }
        //close confrim modal
        $this->dispatchBrowserEvent('CloseConfirmModal');  
        \DB::commit();
}catch(\Throwable $th){
    \DB::rollback();
    $this->dispatchBrowserEvent('CloseConfirmModal');
    $this->dispatchBrowserEvent('somethingwrong');

}

         

     }

        /**
         * change status
         */
public function changeStatus($id)
        {
        //find the product
        $product=Product::where('id',$id)->whereIn('service_id',$this->services->pluck('id')->toArray())->first();
        if($product){
        //product unavailanle
        if($product->status=="available"){
                $product->pushStatus('unavailable');
            }
        //product available
        else{
        $product->pushStatus('available');
            }
        }
        else{
            $this->dispatchBrowserEvent('somethingwrong');
 
        }
    }
}
