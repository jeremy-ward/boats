<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BoatDetails;

class BoatDetailsController extends Controller
{
    //
    public function saveCount($boatId, $boatCount){
    		$boatDetails = new BoatDetails;
    		$boatDetails->boatId = $boatId;
    		$boatDetails->boatCount = $boatCount;
    		$boatDetails->save();
    		return $boatDetails->id;
	}
}
