<?php

namespace App\Http\Controllers;

use App\Data;
use App\Order;
use App\OrderDevice;
use App\Phone;
use App\Comment;
use Auth;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Ixudra\Curl\Facades\Curl;

class StoreController extends Controller
{

    public function __construct()
    {
        $this->middleware('isAvailable', ['only' => ['show']]);
    }

    public function all($model=null)
    {
        $model = str_replace('-', ' ', $model);
        $orders= Order::take(5)->orderBy('created_at', 'desc')->get();
        return view('phone.store', compact('model','orders'));
    }

    public function getPrice()
    {
        $input = Input::get('orderby');


        if ($input == "price")
            $phones = Phone::select('phones.id', 'company', 'storage', 'model', 'price')->leftJoin('data', 'phones.data_id', '=', 'data.id')->orderBy('price', 'asc')->paginate(15);

        else if ($input == "price-desc")
            $phones = Phone::select('phones.id', 'company', 'storage', 'model', 'price')->leftJoin('data', 'phones.data_id', '=', 'data.id')->orderBy('price', 'desc')->paginate(15);

        response()->json($phones);

        return view('phone.sortedstore', compact('phones'));
    }

    public function show($id, $slug = ''){
        $phone=Phone::findOrFail($id);
        if($phone->sold != 0) return redirect('https://phonefriend.in');

        $specs =  Curl::to('https://fonoapi.freshpixl.com/v1/getdevice')
            ->withData( array( 'token' => 'b3ac443c248c8bcee87332d2e4f9f4a8ffa1989ce6be076c', 'device' => $phone->data->modelno, 'brand' => $phone->data->company) )
            ->asJson()
            ->get();

        if ($slug !== $phone->data->slug) {
            return redirect()->to($phone->url);
        }
        $conditions= DB::table('condition_phone')
            ->where('phone_id', $phone->id)
            ->get();

        $accessories = DB::table('accessory_phone')
            ->where('phone_id', $phone->id)
            ->get();
		$phone2	 = DB::table('phones')
            ->where('id', $phone->id)
            ->get();
        $comments = \App\Comment::select('users.name','comments.*')->Join('users','comments.user_id','users.id')->where('comments.phone_id',$id)->where('comments.status',1)->get();
        //dd($comments);
        return view('phone.show',compact('phone','conditions','accessories','specs','phone2','comments'));
    }

    public function showAdvertisement($id, $slug = ''){
        dd("hello");
        $phone=Phone::findOrFail($id);
        if($phone->sold != 0) return redirect()->back();

        $specs =  Curl::to('https://fonoapi.freshpixl.com/v1/getdevice')
            ->withData( array( 'token' => 'b3ac443c248c8bcee87332d2e4f9f4a8ffa1989ce6be076c', 'device' => $phone->data->modelno, 'brand' => $phone->data->company) )
            ->asJson()
            ->get();

        if ($slug !== $phone->data->slug) {
            return redirect()->to($phone->url);
        }
        $conditions= DB::table('condition_phone')
            ->where('phone_id', $phone->id)
            ->get();

        $accessories = DB::table('accessory_phone')
            ->where('phone_id', $phone->id)
            ->get();
        $phone2	 = DB::table('phones')
            ->where('id', $phone->id)
            ->get();
        $comments = \App\Comment::select('users.name','comments.*')->Join('users','comments.user_id','users.id')->where('comments.phone_id',$id)->where('comments.status',1)->get();
        //dd($comments);
        return view('phone.show',compact('phone','conditions','accessories','specs','phone2','comments'));
    }

    public function sort(Request $request){
        if ( empty ( $request->companies ) && empty ( $request->storages )) {
            $phones = Phone::select('phones.id', 'company', 'storage', 'model', 'price')->leftJoin('data', 'phones.data_id', '=', 'data.id')->paginate(15);
        }
        else if ( !empty ( $request->companies ) && !empty ( $request->storages )){
            $phones=Phone::select('phones.id', 'company', 'storage', 'model', 'price')->leftJoin('data', 'phones.data_id', '=', 'data.id')->company(explode(',', $request->companies))->storage(explode(',', $request->storages))->paginate(15);
        }
        else if ( !empty ( $request->companies ) && empty ( $request->storages )){
            $phones = Phone::select('phones.id', 'company', 'storage', 'model', 'price')->leftJoin('data', 'phones.data_id', '=', 'data.id')->company(explode(',', $request->companies))->paginate(15);
        }
        else if ( empty ( $request->companies ) && !empty ( $request->storages )){
            $phones = Phone::select('phones.id', 'company', 'storage', 'model', 'price')->leftJoin('data', 'phones.data_id', '=', 'data.id')->storage(explode(',', $request->storages))->paginate(15);
        }

        response()->json($phones);

        return view('phone.sortedstore', compact('phones'));

    }

    public function saveComment(Request $request){
        //$id = $_GET['id'];

        $comment = new Comment();
        $comment->phone_id = $request->phoneIdHide;
        $comment->user_id = Auth::user()->id;
        $comment->content = $request->reviewComment;
        $comment->status = 0;
        $saved = $comment->save();

        if($saved){
            //print_r($_POST); die;
            return redirect()->back();
        }else{
            //print_r('else'); die;
            return redirect()->back();
        }
        



    }


}
