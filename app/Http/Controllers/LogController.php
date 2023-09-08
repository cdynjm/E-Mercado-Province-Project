<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\Log;

class LogController extends Controller
{

    public function __construct(){
    }
    
    public function index()
    {
        
        
    }

    public function save($data = []){
        $g = Log::insert([
            'description' => $data['description'],
            'headertitle' => $data['headertitle'],
            'userid' => $data['to'],
            'orderid' => $data['orderid'],
            'addedby' => Auth::user()->account_id,
            'created_at' => Carbon::now()
        ]);
    }

    public function show($line = 0, $paginate = false){

        if (!empty($line)){
            $show = Log::where("userid", Auth::user()->account_id)
                ->latest()->limit($line)
                ->get();

            // dd($show);
            return $show;
        }
            
            
    }

}
