<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Boat;
use App\BoatDetails;

class PageController extends Controller
{
    //
    public function boatList(){
    	
    	$brands = Boat::all();

    	return view('boatList')->withBrands($brands);
    }

    public function viewBoat($boatId){
    	$boat = Boat::where('id', $boatId)->get();

    	$latestBoatDetails = BoatDetails::where('boatId', $boatId)->latest('created_at')->first();

    	$boatDetails = BoatDetails::where('boatId', $boatId)->get();

    	 return view('boat', ['boat'=>$boat[0], 'latestBoatDetails' => $latestBoatDetails, 'boatDetails' => $boatDetails]);
    }
}
