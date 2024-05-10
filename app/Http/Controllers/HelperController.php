<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

class HelperController extends Controller
{
    //

    public function cacheClear()
    {
        try {
            //code...
            Artisan::call('cache:clear');
            Artisan::call('optimize');
            Artisan::call('route:cache');
            Artisan::call('route:clear');
            Artisan::call('view:clear');
            Artisan::call('config:cache');
            return 'Server Cache Cleared Done!'; //Return anything
        } catch (\Exception $e) {

            return $e->getMessage();
        }
    }
}
