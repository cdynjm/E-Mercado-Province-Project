<?php

namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AESCipher;
use Illuminate\Support\Facades\File;
use App\Http\Requests;
use Image;

use App\Models\SellerImage;
  
class ImageController extends Controller
{
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $aes;

    public function __construct(){
        $this->aes = new AESCipher();
    }

    public function resizeImage()
    {
        return view('resizeImage');
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'hidID' => 'required|string'
        ]);
  
        $id = (isset($request->hidID)?$this->aes->decrypt($request->hidID):"");
        if (empty($id)){
            return back()
                ->with('error','Invalid ID');
        }

        $image = $request->file('image');
        $newFilename = time().'.'.$image->extension();
    
        $destinationPath = public_path('storage/post/'.Auth::user()->account_id.'/thumbnail');

        if(!File::isDirectory($destinationPath)){
            File::makeDirectory($destinationPath, 0777, true, true);
        }   

        $img = Image::make($image->path());
        $img->resize(300, 300, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$newFilename);
   
        $destinationPath = public_path('storage/post/'.Auth::user()->account_id.'/size500');

        if(!File::isDirectory($destinationPath)){
            File::makeDirectory($destinationPath, 0777, true, true);
        }   

        $img = Image::make($image->path());
        $img->resize(500, 500, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$newFilename);


        $original = $request->file('image')->storeAs('public/post/'.Auth::user()->account_id."/original", $newFilename);

        $SellerImage = SellerImage::insert([
            'SellerID' => Auth::user()->account_id,
            'PostID' => $id,
            'FileName' => $newFilename
        ]);

        return back()
            ->with('success','Image Uploaded successful')
            ->with('imageName',$newFilename);
    }

}

?>