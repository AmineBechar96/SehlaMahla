<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Provider\Discount;
use App\Models\Provider\ProviderCoupon;

use Carbon\Carbon;
class DailyCouponCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coupon:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        $discounts= Discount::where('status','valid')->whereDate('valid_until',Carbon::now()->format('Y-m-d'))
        ->orWhereDate('valid_until','<',Carbon::now()->format('Y-m-d'))
        ->get();

        if($discounts->count()>0){
            foreach($discounts as $discount){
            $discount->update(['status'=>'invalid']);
            $coupons=ProviderCoupon::where('status','unused')
                ->where('discount_id',$discount->id)->get();
            if($coupons->count()>0){
            foreach($coupons as $coupon){
                $coupon->update(['status'=>'expired']);
            }
        }
          }
}
        
        /*foreach ($discounts as $discount) {
            if($discount->valid_until===Carbon::now()->format('Y-m-d')){
                //set discounts to unvalid
               // $discount->update(['status'=>'invalid']);
               dd($discount->id);
               $coupons= ProviderCoupon::where('status','unused')
                ->where('discount_id',$discount->id)->get();
                $coupons->update(['status'=>'used']);

               
               
               }
        }*/
    
        return 0;
    }
}
