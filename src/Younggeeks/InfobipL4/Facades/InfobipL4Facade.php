<?php
/**
 * Created by PhpStorm.
 * User: samjunior
 * Date: 12/18/14
 * Time: 10:59 AM
 */

namespace Younggeeks\InfobipL4\Facades;


use Illuminate\Support\Facades\Facade;

class InfobipL4Facade extends Facade {

    public static function getFacadeAccessor()
    {
        return 'Infobip';
    }
}