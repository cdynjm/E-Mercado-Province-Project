<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AESCipher;

use App\Models\FarmTypeSub;

class GlobalList extends Controller
{

    protected $aes;

    public function __construct(){
        
        $this->aes = new AESCipher();

    
    }
	
	public function farmtypesub(Request $request){
		$id = (isset($request->id)?$this->aes->decrypt($request->id):"");

		$out = [];

		if (!empty($id )){
			$out = FarmTypeSub::where("farmtypeid", $id)->orderby("description", "ASC")->get();
		}
		
		if ($request->ajax()){
			$tmp = [];
			foreach($out as $o){
				array_push($tmp, ["ID" => $this->aes->encrypt($o->id), "Description" => $o->description, "Slug" => \Str::Slug($o->description)]);
			}

			return response()->json($tmp);
		}

		return $out;
	}

	public function Religion(){
		$res = Religion::orderBy("Religion", "ASC")->get();
		return $res;
	}

	public function Provinces(){
		$res = DB::table("refprovince")
            ->orderBy("provDesc", "ASC")
            ->get();
		return $res;
	}

	public function Municipalities($code = 0){

		if (empty($code)){
			$Municipalties = DB::table("refcitymun")
			->orderBy("citymunDesc", "ASC")
			->get();
		}else{
			$Municipalties = DB::table("refcitymun")
			->where("provCode",$code)
			->orderBy("citymunDesc", "ASC")
			->get();
		}
		
		return $Municipalties;
	}

	public function Barangays($code = 0){

		$Barangays = DB::table("refbrgy")
		->where("citymunCode", $code)
		->orderBy("brgyDesc", "ASC")
		->get();
		
		return $Barangays;
	}

	public function Municipality(Request $request){

		$ProvinceID = (isset($request->id)?$this->aes->decrypt($request->id):"");
		$out = "";
		
		$select = "";
		if (empty($ProvinceID)){
			$select .= '<select name="Municipality" class="form-control basicinfo" id = "Municipality">';
			$select .= '<option value = "'.$this->aes->encrypt(0).'">No data found!</option>';
			$select .= '</select>';
		}else{
			
			$res = $this->Municipalities($ProvinceID);
			
			if (empty($res)){
				$select .= '<select name="Municipality" class="form-control basicinfo" id = "Municipality">';
				$select .= '<option  value = "'.$this->aes->encrypt(0).'">No municipality found!</option>';
				$select .= '</select>';
			}else{
				$select .= '<select name="Municipality" class="form-control basicinfo" id = "Municipality">';
				$select .= '<option value = ""></option>';
				foreach ($res as $mun) {
					$select .= '<option zip = "'.$mun->ZipCode.'" value = "'.$this->aes->encrypt($mun->citymunCode).'">'.ucwords(strtolower($mun->citymunDesc)).'</option>';
				}
				$select .= '</select>';
			}
	
		}
		echo $select;
	}

	public function Barangay(Request $request){

		$Municipality = (isset($request->id)?$this->aes->decrypt($request->id):"");
		$out = "";
		
		$select = "";
		if (empty($Municipality)){
			$select .= '<select name="Barangay" class="form-control basicinfo" id = "Barangay">';
			$select .= '<option value = "'.$this->aes->encrypt(0).'">No data found!</option>';
			$select .= '</select>';
		}else{
			
			$res = DB::table("refbrgy")
				->where("citymunCode", $Municipality)
				->orderBy("brgyDesc", "ASC")
				->get();
			
			if (empty($res)){
				$select .= '<select name="Barangay" class="form-control basicinfo" id = "Barangay">';
				$select .= '<option value = "'.$this->aes->encrypt(0).'">No brgy found!</option>';
				$select .= '</select>';
			}else{
				$select .= '<select name="Barangay" class="form-control basicinfo" id = "Barangay">';
				$select .= '<option value = ""></option>';
				foreach ($res as $mun) {
					$select .= '<option value = "'.$this->aes->encrypt($mun->brgyCode).'">'.ucwords(strtolower($mun->brgyDesc)).'</option>';
				}
				$select .= '</select>';
			}
	
		}
		echo $select;
	}

	
	
}

?>