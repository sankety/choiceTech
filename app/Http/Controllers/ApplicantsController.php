<?php

namespace App\Http\Controllers;

use App\Applicant;
use GuzzleHttp\Client;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
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
            Applicant::where('email',$request->email)->firstOrFail();
            return back()->withErrors(['Email'=>"Email id is already in system"]);
        }catch(\Exception $e){
          $record = Applicant::create($request->except(['g-recaptcha-response','attachment']));
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
        $data['lists'] = Applicant::all();
        $data['page_title'] = 'Application List';
        return view('display_data',$data);
    }
    public function view($id){
        $data['data'] = Applicant::where('id',$id)->first();
        $data['page_title'] = 'Application details';
        if(count($data['data'])==0){
            return redirect()->route('home');
        }
        return view('view-data',$data);
    }
}
