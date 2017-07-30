<?php

namespace App\Http\Controllers;

use App\Applicant;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ApplicantsController extends Controller
{
    public function index(){
        return view('applicants.applicant_form');
    }

    public function store(Request $request){
        $this->validate($request,[
           'name'=>'required',
           'email'=>'required|email',
           'web_address'=>'required|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
           'cover_letter'=>'required',
           'attachments'=>'required',
           'work_opinion'=>'required',
           'g-recaptcha-response'=>'required',
        ]);
//dump($request->all());
        $res = $this->verifyGResponse($request);
        $jres=json_decode($res,true);
        //dd($jres);
        if(!empty($jres) && $jres['success']==false){
            return back()->withErrors(['google_error'=>"Captcha Error"]);
        }



        try{
            Applicant::where('email',$request->email)->firstOrFail();
            return back()->withErrors(['Email'=>"Email id is already in system"]);
        }catch(\Exception $e){
          $record = Applicant::create($request->except(['g-recaptcha-response']));
            return $record;
        }


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
}
