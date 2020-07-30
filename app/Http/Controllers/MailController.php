<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Mail;
use auth;
use App\User;
use Log;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class MailController extends Controller
{
    public function addFeedback(Request $request)
    {
        $input = $request->all();
        
        Mail::send('mail.sendform', array('name'=>$input["name"],'email'=>$input["email"], 'content'=>$input['comment']), function($message){
	        // $message->to('hilton@asia.cybridge.jp', 'Visitor')->subject('Visitor Feedback!');
	        $message->to('hieuleminh0x0x@gmail.com', 'Visitor')->subject('Visitor Feedback!');
	    });
        Session::flash('flash_message', 'Send message successfully!');

        return view('mail.form');
    }
    public function testme(Request $request)
    {
        $input = $request->all();
        //session ne :v
        Session::put('testme', $input['name']);
        $testme = Session::get('testme');

        //htttp client ne :v
        $response = Http::withToken($input['_token'])->get('http://10.11.13.51/test/me/after', [
    		'request' => $request,
    		'testme'=>$testme,
		]);

		//return $this->testafter($request,$testme);
		return $response;



    }

    public function serializeelo(Request $request)
    {
    	$data = $request->validate([
    		'tes' =>'string|required|max:3',
    	]);
    	$user = User::findOrFail($data['tes']);
        dd("the hien du lieu theo kieu json",$user->toJson(JSON_PRETTY_PRINT),"the hien du lieu theo kieu string",(string) $user,"the hien du lieu theo kieu array",$user->toArray(),"lam 1 so du lieu mong muon co the xem duoc boi nguoi dung",$user->makeVisible('attribute')->toArray(),"lam 1 so du lieu mong muon khong duoc boi nguoi dung", $user->makeHidden('attribute')->toArray());
    }
    public function collectelo(Request $request)
    {

    	$data = $request->validate([
    		'tes' =>'string|required|max:3',
    	]);
    	$users = User::all();

    	$users->contains($data['tes']) ? $results = "co ton tai thang nay :v" : $results ="gi ? ai biet dau ?";
    	$users = $users->fresh('posts');
    	$collectelo = collect([$results]);
    	return response($collectelo, 200)
                  ->header('Content-Type', 'text/plain');
    // 	return response()->json([
    //     'count' => count($users),
    //     'data' => $users // or whatever
    // ]);
    }
    public function querytest()
    {

        //lay user = 7 bằng model
        $user7m = User::findOrFail(7);
        //lay user = 7 bằng query DB
        $user7db = DB::table('users')->where('id',7)->get();
        


        
        $dataquery = collect([$user7m,$user7db]);
        return $dataquery;


    }    

    public function testafter(Request $request)
    {

    	$data = $request->validate([
        'testme' =>'string|required|max:255',
      	]);
    	//$data = $request->query();
    	$testme = $data['testme'];


    	//encryp cho nay ne :v
		$encrypted = Crypt::encryptString($testme);

		$decrypted = Crypt::decryptString($encrypted);
		//$collection = Collection::make([$testme, 2, 3]);
		$collection = collect([$testme, 2, 3]);
		//hash cho nay ne :v
		$hash = Hash::make($testme, [
		    'memory' => 1024,
		    'time' => 2,
		    'threads' => 2,
		]);

		$true = "dung roi";
		$false = "sai qua sai :v";
		
		$checkhash = Hash::check($testme, $hash)? $true : $false;

		//collect cho nay ne
		$collection0 = $collection['0'];

		$collectdb = $this->querytest();

		$user7m = $collectdb['1']['0']->name;
		$user7db = $collectdb['1']['0']->name;





        return view('will.after',compact('encrypted','decrypted','collection','collection0','hash','checkhash','user7m','user7db',));

    }   
    public function httpg(Request $request)
    {
        
        return Http::get('https://www.google.com/');
    }    
    public function testcheckre(Request $request)
    {
        
       dd($request->all());
    }    
    public function returnrigh()
    {
        
       return redirect('/');
    }

    public function testloerror(Request $request)
    {
        
       $data = $request->all();
       $data['tes'] == 1 ?  abort(403, 'Unauthorized action.') 
       					 : $successfu = "right";
       return response($successfu, 200)
                  ->header('Content-Type', 'text/plain');					 
    }    
    public function logging(Request $request)
    {
        
       $data = $request->all();
       $id = auth::user()->id;
       Log::info('Showing user profile for user: '.$id);

         return view('profile.profile', ['user' => User::findOrFail($id)]);				 
    }    

    
}
