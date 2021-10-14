<?php

namespace Saberycategory\Cms;

use Illuminate\Support\Facades\Facade;

class CategoryServiceFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'paymentService';
    }
}
