<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function index(){
        $data['products'] = Product::all();
        $data['page_title'] = '';
        return view('listing',$data);
    }

    public function purchase($id){
        $product = Product::find($id);
        Order::create(['product_id'=>$id,'user_id'=>Auth::user()->id,'vendor_id'=>$product->vendor_id]);
        return $id;
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            'web_address'=>'required|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'cover_letter'=>'required',
            'attachment'=>'required',
            'work_opinion'=>'required',
            'g-recaptcha-response'=>'required',
        ]);

        $res = $this->verifyGResponse($request);
        $jres=json_decode($res,true);
        if(!empty($jres) && $jres['success']==false){
            return back()->withErrors(['google_error'=>"Captcha Error"]);
        }
        $attach = $this->uploadAttachments($request->file('attachment'));
        $request->merge(['attachments'=>$attach]);

        try{
            Product::where('email',$request->email)->firstOrFail();
            return back()->withErrors(['Email'=>"Email id is already in system"]);
        }catch(\Exception $e){
            $record = Product::create($request->except(['g-recaptcha-response','attachment']));
            $request->session()->flash('status', 'Application submitted successfully!');
            return redirect()->route('main');
        }


    }
    public function uploadAttachments(UploadedFile $file)
    {
        $destinationPath = public_path() . '/uploads/';
        $extension = $file->getClientOriginalExtension() ?: 'txt';
        $fileName = str_random(10) . '.' . $extension;
        $file->move($destinationPath, $fileName);
        return $fileName;
    }
    /**
     * @param Request $request
     * @return \Psr\Http\Message\StreamInterface
     */
    public function verifyGResponse(Request $request)
    {
        $client = new \GuzzleHttp\Client(['verify'=> false]);
        $g_data = [
            "secret" => g_captcha,
            "response" => $request->get('g-recaptcha-response')
        ];
        $guzzleResponse = $client->post('https://www.google.com/recaptcha/api/siteverify',
            ['form_params'=>$g_data]);

        //$client->setDefaultOption();
        return $guzzleResponse->getBody();
    }

    public function data(){
        $data['lists'] = Product::where('vendor_id',Auth::user()->id)->get();
        $data['page_title'] = 'Product List';
        return view('display_data',$data);
    }

    public function orderData(){
        $data['lists'] = Order::with(['products','user'])
            ->where('vendor_id',Auth::user()->id)->get();
        $data['page_title'] = 'Order List';
        return view('display_order_data',$data);
    }
    public function view($id){
        $data['data'] = Product::where('id',$id)->first();
        $data['page_title'] = 'Product details';
        if(count($data['data'])==0){
            return redirect()->route('home');
        }
        return view('view-data',$data);
    }
}
