<?php

namespace App\Services\Html;

use Illuminate\Support\Facades\Facade;

class PanelFacade extends Facade
{

    protected static function getFacadeAccessor() { return 'panel'; }

}
