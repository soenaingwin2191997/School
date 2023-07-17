<?php

namespace App\Http\Controllers;

use App\Models\Township;
use Illuminate\Http\Request;

class TownshipController extends Controller
{
    
    function addTownship(Request $request){
        Township::create([
            'township'=>$request->township,
        ]);
        return redirect()->back();
    }

    function searchTownship(Request $request){
        $data=$request->data;
        $township=Township::where('township','Like',"%{$data}%")->get();
        return response($township);
    }
}
