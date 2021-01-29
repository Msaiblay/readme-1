<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;
use App\Models\Language;
use App\Models\Shipping;
use App\Models\Order;

use Carbon\Carbon;
use Auth;

class FrontendController extends Controller
{
    public function index(){
    	$topbooks = Book::take(10)->get();
    	$genres = Genre::all();

    	$newbooks = Book::latest()->limit(6)->get();

    	$randombooks = Book::inRandomOrder()->take(4)->get();

    	$freebooks = Book::where('type', 0)->take(4)->get();

    	$authors = Author::take(10)->get();

    	return view('frontend.index',compact('topbooks', 'newbooks', 'freebooks', 'randombooks', 'genres','authors'));

    }

    public function book($id){
    	$book = Book::find($id);

    	$relatedbooks = Book::where('author_id', $book->author_id)
    					->where('id', '!=', $book->id)
    					->inRandomOrder()
    					->take(3)->get();

    	return view('frontend.book', compact('book', 'relatedbooks'));
    }

    public function cart(){

    	$shippings = Shipping::all();

    	return view('frontend.cart',compact('shippings'));
    }


    public function storeorder(Request $request){
    	$carts = json_decode($request->carts);
    	$deliveryAddress = $request->deliveryAddress;
    	$shippingId = $request->shippingId;
    	$totalBook = $request->totalBook;
    	$totalAmount = $request->totalAmount;
    	$voucherno = uniqid();
    	$orderdate = Carbon::now();

    	$status = 0;

    	$auth = Auth::user();
    	$userid = $auth->id;


    	$order = new Order;
    	$order->voucherno = $voucherno;
    	$order->totalamount = $totalAmount;
    	$order->totalbook = $totalBook;
    	$order->orderdate = $orderdate;
    	$order->deliveryaddress = $deliveryAddress;
    	$order->status = $status;
    	$order->shipping_id = $shippingId;
    	$order->user_id = $userid;
    	$order->save();

    	foreach ($carts as $value) {
            $order->books()->attach($value->id,['qty'=>$value->qty]);
        }

    	return response()->json([
            'status' => 'Order Successfully created!'
        ]);

    }


























}
