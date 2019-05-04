<?php

namespace App\Http\Controllers;

use App\Accessory;
use App\Condition;
use App\Http\Requests\UploadPhoneRequest;
use App\Phone;
use App\Repair;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class PhoneController extends Controller
{

	public function __construct()
	{
		$this->middleware(['isBanned']);
		$this->middleware('auth', ['only' => ['store','storeedit','create']]);
		$this->middleware('UcanAccess',['only' => ['storeedit','remove']]);
		$this->middleware('isSold',['only' => ['remove']]);
		$this->middleware('isMerchant');
	}

	public function create(){
		$conditions=Condition::pluck('condition','id');
		$accessories=Accessory::pluck('accessory','id');
		return view('phone.add',compact('conditions','accessories'));
	}

	public function store(UploadPhoneRequest $request){
		// dd($request->all());
		$data=$request->except(['company']);
		$data['data_id']=$data['model'];
		if($data['units'] > 1){
			$data['imei1']=null;
			$data['units_rem'] = $data['units'];
		}else{
			$data['units']=1;
			$data['units_rem'] = 1;
		}
		if($request->color){
			$data['color'] = implode(',', $request->color);
		}else{
			
			$data['color'] = "Other Color";
		}
		if($request->specifications){
			$data['testingAdd'] = $request->specifications;
		}

		unset($data['model']);
		$phone=Auth::user()->phones()->create($data);

		$phone->conditions()->attach($request->input('conditions'));

		$phone->accessories()->attach($request->input('accessories'));

		$dp = $request->dp;
		$dpfile=$dp->store('public/photos');
		$image = Image::make(Storage::get($dpfile));
		$image->fit(900, 760);
		$image->fit(900, 760, function ($constraint) {
			$constraint->upsize();
		})->encode();
		Storage::put($dpfile, $image);

		Photo::create([
			'phone_id' => $phone->id,
			'filename' => $dpfile
		]);
		
		foreach ($request->photos as $photo) {
			$filename = $photo->store('public/photos');
			$image = Image::make(Storage::get($filename));
			$image->fit(900, 760);
			$image->fit(900, 760, function ($constraint) {
				$constraint->upsize();
			})->encode();
			Storage::put($filename, $image);

			Photo::create([
				'phone_id' => $phone->id,
				'filename' => $filename
			]);
		}
		$phone->update(['dp'=>$filename]);
		\request()->session()->flash('status', 'Successfully Added Listing!');
		return redirect()->route('phones.show');
	}

	public function storeedit(Request $request,Phone $phone){
		//echo "<pre>"; print_r($_POST); die;
		if($_POST['units'] <= 1){

			$this->validate($request,[
				'model'=>'required',
				'imei1'=>'nullable|numeric|digits:15',
				'age'=>'required',
				'price'=>'required|numeric|digits_between:4,7',
				'conditions'=>'required',
				'accessories'=>'required',
				'condition'=>['required',Rule::in(['good','average','belowavg']),],
			]);
		}else{

			$this->validate($request,[
				'model'=>'required',
				'age'=>'required',
				'price'=>'required|numeric|digits_between:4,7',
				'conditions'=>'required',
				'accessories'=>'required',
				'condition'=>['required',Rule::in(['good','average','belowavg']),],
			]);
		}
		$data=$request->except(['company','_method','_token','conditions','accessories','submit']);
		$data['data_id']=$data['model'];
		unset($data['model']);
		if($phone->units > 1){
			$phone->imei1=null;
		}
		if($request->color){
			$data['color'] = implode(',', $request->color);
		}else{
			
			$data['color'] = "Other Color";
		}

		if($request->specifications){
			$data['specifications'] = $request->specifications;
		}
		$phone->update($data);
		$phone->conditions()->sync($request->input('conditions'));
		$phone->accessories()->sync($request->input('accessories'));

		if(!is_null($request->update_dp)){
			$phone_dp = Photo::where('phone_id',$phone->id)->first();
			if($phone_dp->delete()){
				$dp = $request->update_dp;
				$dpfile=$dp->store('public/photos');
				$image = Image::make(Storage::get($dpfile));
				$image->fit(900, 760);
				$image->fit(900, 760, function ($constraint) {
					$constraint->upsize();
				})->encode();
				Storage::put($dpfile, $image);
				Photo::create([
					'phone_id' => $phone->id,
					'filename' => $dpfile
				]);
			}

			$phone->update(['dp'=>$dpfile]);

		}else{
			$phone->update(['dp'=>$request->dp]);
		}
		if(count($request->photos) > 0){
			$deleted = \DB::delete('delete from photos where phone_id='.$phone->id);
			foreach ($request->photos as $photo) {
				$filename = $photo->store('public/photos');
				$image = Image::make(Storage::get($filename));
				$image->fit(900, 760);
				$image->fit(900, 760, function ($constraint) {
					$constraint->upsize();
				})->encode();
				Storage::put($filename, $image);
				Photo::create([
					'phone_id' => $phone->id,
					'filename' => $filename
				]);
			}
		}


		\request()->session()->flash('status', 'Successfully Edited Listing!');
		return redirect()->route('phones.show');
	}

	public function remove(Phone $phone){
		$phone->update(['sold'=>2]);
		\request()->session()->flash('status', 'Successfully Removed from Sale!');
		return redirect()->route('phones.show');
	}


}
