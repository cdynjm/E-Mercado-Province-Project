<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\AESCipher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

use App\Models\PostProduct;

class ShareController extends Controller
{

    protected $aes;

    public function __construct(){

        $this->aes = new AESCipher();
    }

    public function product($id){


        $posted = PostProduct::where('slug_name', $id)->first();
        if (empty($posted)){
            return redirect()->route('errors.error404');
        }

        $pages = $posted->ratings()
            ->latest()
            ->paginate(15);
        return view('share.product', compact('posted','pages'));
    }
}
