<?php
namespace App\Helpers;
class AppHelper
{


	public static function getRequestBetweenPages() {

		$link = [];

		if(isset(request()->input)){
    	    $link['input'] = request()->input;
    	}

    	return $link;

		}
	}