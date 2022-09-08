<?php

namespace App\Observers;

use App\Models\MainCatagory;

class MaincatagoryObserver
{
    /**
     * Handle the MainCatagory "created" event.
     *
     * @param  \App\Models\MainCatagory  $mainCatagory
     * @return void
     */
    public function created(MainCatagory $mainCatagory)
    {
       
    }

    /**
     * Handle the MainCatagory "updated" event.
     *
     * @param  \App\Models\MainCatagory  $mainCatagory
     * @return void
     */
    public function updated(MainCatagory $mainCatagory)
    {
   
      $mainCatagory->vendors()->update(['active'=>$mainCatagory->active]);
        
        
    }

    /**
     * Handle the MainCatagory "deleted" event.
     *
     * @param  \App\Models\MainCatagory  $mainCatagory
     * @return void
     */
    public function deleted(MainCatagory $mainCatagory)
    {
        $mainCatagory->translation()->delete();
        $mainCatagory->vendors()->delete();
    }

    /**
     * Handle the MainCatagory "restored" event.
     *
     * @param  \App\Models\MainCatagory  $mainCatagory
     * @return void
     */
    public function restored(MainCatagory $mainCatagory)
    {
        //
    }

    /**
     * Handle the MainCatagory "force deleted" event.
     *
     * @param  \App\Models\MainCatagory  $mainCatagory
     * @return void
     */
    public function forceDeleted(MainCatagory $mainCatagory)
    {
        //
    }
}
