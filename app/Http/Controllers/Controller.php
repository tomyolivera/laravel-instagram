<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function dump(...$element)
    {
        echo "<pre>";
        var_dump($element);
        echo "</pre>";
        die();
    }

    protected function searchInArray($toSearch, $arr)
    {
        $i = 0; 
        $found = false;

        while ($i < count($arr) && !$found){
            if($toSearch == $arr[$i]) $found = true;
        }

        return $found;
    }
}
