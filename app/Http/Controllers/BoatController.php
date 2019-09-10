<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Boat;

class BoatController extends Controller
{
    //
	public function create($brand,  $type){
		$boat = new Boat;
		$boat->brand = $brand;
		$boat->type = $type;
		$boat->save();
		return $boat->id;
	}

    public function getBoatList($type){
    	$patternBoat = '/(?:\<a href\=\"\/boats\/Sail\/\w.*\>)(\w+)(?: \()(\d+)(?:\)\<\/a\>)/';
    	$patternPage = '/(?:class\=\"navLast\".+\"\/boats\/.+pg-)(\d+)(?:\"\>)/';
    	$website = 'https://www.yachtworld.com/boats/Sail/'.$type;
    	$html = file_get_contents($website); 
    	$matches =[];

        preg_match($patternPage, $html, $matches);
        $pages = $matches[1];
        
        $brands = [];
    	for ($page=1; $page <= $pages ; $page++) { 
    		$website = 'https://www.yachtworld.com/boats/Sail/'.$type.'/pg-'.$page;
    		$html = file_get_contents($website); 
        	preg_match_all($patternBoat, $html, $matches);
        	for($match=0; $match < count($matches[1]); $match++){
        		$result =[];
        		array_push($result, $matches[1][$match],$matches[2][$match] );
        		array_push($brands, $result);
        	}
    	}
    	$boats = \DB::table('boats')->where('type', $type)->get();
    	foreach ($brands as $brand) {
    		echo $brand[0]," - ";
    		$boatId = $this->checkIfExists($boats,$brand[0]);
    		if(!$boatId){
    			$newBoatId = $this->create($brand[0],$type);
    			$countId = app('App\Http\Controllers\BoatDetailsController')->saveCount($newBoatId, $brand[1]);
    			echo "New Boat Id: ",$newBoatId, " - Saved count: ", $brand[1], "<br>";
    		}
    		else{
    			$countId = app('App\Http\Controllers\BoatDetailsController')->saveCount($boatId, $brand[1]);
    			echo 'Already in DB boat Id:', $boatId, ' - Saved count: ', $brand[1], '<br>';
    		}

    	}
      
    }

    public function checkIfExists($boats, $brand){
    	foreach ($boats as $boat) {
    		if($boat->brand == $brand){
    			return $boat->id;
    		}
    	}
    	return false;
    }
}
