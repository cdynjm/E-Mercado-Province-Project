<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\AESCipher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

use App\Models\FarmType;
use App\Models\FarmTypeSub;
use App\Models\PostProduct;

class SearchController extends Controller
{

    protected $aes;

    public function __construct(){
        $this->aes = new AESCipher();
    }

    public function category(Request $request){
        $string = $request->searchstring;

        if (empty($string)){
            return redirect('/');
        }

        $cart = new CartController();
        $ctr = $cart->badge();

        $category = FarmType::where("description", $string)->first();

        $categories = FarmType::orderBy("description", 'ASC')->get();

        $posteds = PostProduct::where("draft", 1)
            ->where('ProductType', $category->id)
            ->orderBy('created_at', 'DESC')->paginate(15);
        
        return view('guest', compact('categories','posteds'),[
            'Badge' => $ctr,
            'str' => $string,
            'results' => count($posteds)
        ]);
    }

    public function subcategory(Request $request){
        $string = $request->searchstring;

        if (empty($string)){
            return redirect('/');
        }

        $cart = new CartController();
        $ctr = $cart->badge();

        $categories = FarmType::orderBy("description", 'ASC')->get();

        $category = FarmTypeSub::where("description", $string)->first();

        $posteds = PostProduct::where("draft", 1)
            ->where('ProductKind', $category->id)
            ->orderBy('created_at', 'DESC')->paginate(15);
        
        return view('guest', compact('categories','posteds'),[
            'Badge' => $ctr,
            'str' => $string,
            'results' => count($posteds)
        ]);
    }

    public function seller(Request $request){
        $string = (isset($request->searchstring)?$this->aes->decrypt($request->searchstring):"");
        $store = (isset($request->store)?$this->aes->decrypt($request->store):"");

        if (empty($string) or empty($store)){
            return redirect('/');
        }

        $cart = new CartController();
        $ctr = $cart->badge();

        $categories = FarmType::orderBy("description", 'ASC')->get();

        $posteds = PostProduct::where("draft", 1)
            ->where('SellerID', $string)
            ->orderBy('created_at', 'DESC')->paginate(15);
        
        return view('guest', compact('categories','posteds'),[
            'Badge' => $ctr,
            'str' => $store,
            'results' => count($posteds)
        ]);
    }

    public function barangay(Request $request){
        
        $string = (isset($request->searchstring)?$this->aes->decrypt($request->searchstring):"");
        $area = (isset($request->area)?$this->aes->decrypt($request->area):"");

        if (empty($string) or empty($area)){
            return redirect('/');
        }

        $cart = new CartController();
        $ctr = $cart->badge();

        $categories = FarmType::orderBy("description", 'ASC')->get();

        $posteds = PostProduct::where("draft", 1)
            ->whereHas('seller', function ($q) use ($string) {
                $q->where('barangay', $string);
            })
            ->orderBy('created_at', 'DESC')->paginate(15);
        
        return view('guest', compact('categories','posteds'),[
            'Badge' => $ctr,
            'str' => $area,
            'results' => count($posteds)
        ]);
    }

    public function municipality(Request $request){
        
        $string = (isset($request->searchstring)?$this->aes->decrypt($request->searchstring):"");
        $area = (isset($request->area)?$this->aes->decrypt($request->area):"");

        if (empty($string) or empty($area)){
            return redirect('/');
        }

        $cart = new CartController();
        $ctr = $cart->badge();

        $categories = FarmType::orderBy("description", 'ASC')->get();

        $posteds = PostProduct::where("draft", 1)
            ->whereHas('seller', function ($q) use ($string) {
                $q->where('municipality', $string);
            })
            ->orderBy('created_at', 'DESC')->paginate(15);
        
        return view('guest', compact('categories','posteds'),[
            'Badge' => $ctr,
            'str' => $area,
            'results' => count($posteds)
        ]);
    }

    public function province(Request $request){

        $string = (isset($request->searchstring)?$this->aes->decrypt($request->searchstring):"");
        $area = (isset($request->area)?$this->aes->decrypt($request->area):"");

        if (empty($string) or empty($area)){
            return redirect('/');
        }

        $cart = new CartController();
        $ctr = $cart->badge();

        $categories = FarmType::orderBy("description", 'ASC')->get();

        $posteds = PostProduct::where("draft", 1)
            ->whereHas('seller', function ($q) use ($string) {
                $q->where('province', $string);
            })
            ->orderBy('created_at', 'DESC')->paginate(15);
        
        return view('guest', compact('categories','posteds'),[
            'Badge' => $ctr,
            'str' => $area,
            'results' => count($posteds)
        ]);
    }

}
