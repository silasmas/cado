<?php

namespace App\Http\Controllers;

use App\Models\session;
use App\Rules\PhoneNumber;
use App\Models\sessionUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdatesessionUserRequest;

class SessionUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function notify(Request $request)
    {
        $url = 'https://api-checkout.cinetpay.com/v2/payment/check';
        $retour=sessionUser::where([["token",$request->token],["reference",$request->transaction_id]])->first();
        if($retour){
            $cinetpay_verify=  [
                "apikey" => env("CINETPAY_APIKEY"),
                "site_id" => env("CINETPAY_SERVICD_ID"),
                "transaction_id" => $request->reference,
            ];
            $response = Http::asJson()->post($url, $cinetpay_verify);

            $response_body = json_decode($response->body(), JSON_THROW_ON_ERROR | true, 512, JSON_THROW_ON_ERROR);
            
            if ((int)$response_body["code"] === 201) {
                $retour->etat=$response_body['data']['status'];
                $retour->operateur=$response_body['data']['payment_method'];
                $retour->message=$response_body['message'];
                $retour->save();
                $data=$response_body;
                return view('notify',compact('data'));
            }else{
                $retour->etat=$response_body['data']['status'];
                $retour->operateur=$response_body['data']['payment_method'];
                $retour->message=$response_body['message'];
                $retour->save();
                $data=$response_body;
                return view('client.pages.notify',compact('data'));
            }
        }
        
    }
    public function retour(Request $request)
    {
        // dd($request);
        $url = 'https://api-checkout.cinetpay.com/v2/payment/check';
        $retour=sessionUser::where([["token",$request->token],["reference",$request->transaction_id]])->first();
        if($retour){
            $cinetpay_verify=  [
                "apikey" => env("CINETPAY_APIKEY"),
                "site_id" => env("CINETPAY_SERVICD_ID"),
                "transaction_id" => $request->reference,
            ];
            $response = Http::asJson()->post($url, $cinetpay_verify);

            $response_body = json_decode($response->body(), JSON_THROW_ON_ERROR | true, 512, JSON_THROW_ON_ERROR);
            
            if ((int)$response_body["code"] === 201) {
                $retour->etat=$response_body['data']['status'];
                $retour->operateur=$response_body['data']['payment_method'];
                $retour->message=$response_body['message'];
                $retour->save();
                $data=$response_body;
                return view('notify',compact('data'));
            }else{
                $retour->etat=$response_body['data']['status'];
                $retour->operateur=$response_body['data']['payment_method'];
                $retour->message=$response_body['message'];
                $retour->save();
                $data=$response_body;
                return view('client.pages.notify',compact('data'));
            }
        }
    }
    public function genererChaineAleatoire($longueur = 10)
    {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $longueurMax = strlen($caracteres);
        $chaineAleatoire = '';
        for ($i = 0; $i < $longueur; $i++) {
            $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
        }
        return $chaineAleatoire;
    }
    public function initInfo($request){

        // $fidels=explode(',',$request->formation_id);
        // for($i=0;$i<count($fidels);$i++){
        //   $rep=fidelMetamorpho::updateOrCreate([
        //       'metamorpho_id'=>$active->id,
        //       'fidel_id'=>$fidels[$i],
        //       'user_id'=>Auth::user()->id,
        //     ]);
        //     $rap =cultiveFidel::where('fidel_id',$fidels[$i])->first();
        //       $rap->update([
        //           'etat' => '1'
        //       ]);
        $transaction_id = $this->genererChaineAleatoire();
        // $session= session::find($request->formation_id)->first();


        if ($request->channels=="MOBILE_MONEY") {
           $cinetpay_data =  [
            "amount" => $request->prix,
            "currency" => $request->monaie,
            "apikey" => env("CINETPAY_APIKEY"),
            "site_id" => env("CINETPAY_SERVICD_ID"),
            "transaction_id" => $transaction_id,
            "description" => "Achat formation",
            "return_url" => env("RETURN_URL"),
            "notify_url" => env("NOTIFY_URL"),
            'channels' => $request["channels"],
           ];
           return $cinetpay_data;
        } else {
            $cinetpay_data =  [
                "amount" => $session->prix,
                "currency" => $session->monaie,
                "apikey" => env("CINETPAY_APIKEY"),
                "site_id" => env("CINETPAY_SERVICD_ID"),
                "transaction_id" => $transaction_id,
                "description" => "Achat formation",
                "return_url" => env("RETURN_URL"),
                "notify_url" => env("NOTIFY_URL"),
                'channels' => $request["channels"],                
                'customer_name' => Auth::user()->nom,
                'customer_city' => $request["customer_city"],
                'customer_email' => Auth::user()->email,
                'customer_surname' => Auth::user()->prenom,
                'customer_address' => $request["customer_address"],
                'customer_country' => $request["customer_country"],
                'customer_zip_code' => $request["customer_zip_code"],
                'customer_phone_number' => Auth::user()->phone,
                'customer_state' => $request["customer_state"],
            ];
            return $cinetpay_data;
        }
    }
    public function initPaie($cinetpay_data,$request){   
      //  dd($cinetpay_data);   
        $transaction_id = $this->genererChaineAleatoire();

            $url = 'https://api-checkout.cinetpay.com/v2/payment';
            $response = Http::asJson()->post($url, $cinetpay_data);

            $response_body = json_decode($response->body(), JSON_THROW_ON_ERROR | true, 512, JSON_THROW_ON_ERROR);
            if ($response->status() === 200) {
                $p=explode(',',$request["formation_id"]);
                // dd($p);
                for($i=0;$i<count($p);$i++){
            $register = sessionUser::updateOrCreate([
                "session_id" => $p[$i],
                "user_id" => Auth::user()->id,              
            ],[
                "reference" => $transaction_id,
                "description" => "Achat formation",
                "token" => $response_body["data"]["payment_token"],               
                'customer_address' => $request["customer_address"],
                'customer_city' => $request["customer_city"],
                'operateur' => $request["channels"],
                'customer_country' => $request["customer_country"],
                'customer_state' => $request["customer_state"],
                'customer_zip_code' => $request["customer_zip_code"],
                'etat' => "En attente",
            ]);
        }
            if ($register) {
                
               // dd($response_body);
                    if ((int)$response_body["code"] === 201) {
                        $payment_link = $response_body["data"]["payment_url"];
                       // dd($payment_link);
                       // return  redirect($payment_link);
                         return  Redirect::to($payment_link);
                    }else{
                       // dd($response_body);
                        return response()->json(['reponse' => false,'bank'=>true,'msg' => $response_body['description']]);
                    }
                
            }else{
                // dd("Erreur d'enregistrement!");
                return response()->json(['reponse' => false,'bank'=>true,'msg' => "Erreur d'enregistrement!"]);

            }
        } else {
           // dd($response_body);
            return response()->json(['reponse' => false,'bank'=>true,'msg' => $response_body['description']]);

        }
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoresessionUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->toArray());
        // $ok=Validator::make(Auth::user(),[
        //     Auth::user()->prenom => ['required'],
        //     Auth::user()->nom => ['required'],
        //     Auth::user()->phone => ['required'],
        //     Auth::user()->email => ['required'],
        // ]);
        // $ok=Auth::user()->every(function($value,$key){
        //     return $value!='';
        // });
        // return dd($ok);
        // if($ok->fails()){
        //     return response()->json(['reponse' => false,'msg' => "Veuillez completer votre profil afin de continuer votre paiement"]);
        // }else{
        if (isset($request->formation_id)) {
            if ($request->channels=="MOBILE_MONEY") {
            $ok=Validator::make($request->all(),[
                'channels' => ['required', 'string', 'max:255'],
            ]);
    
            if (!$ok->fails()) {
           $init= self::initInfo($request);
           return $ret= self::initPaie($init,$request->toArray());
            } else {
                return back()->with('message',$ok->getMessageBag());;
               // return response()->json(['reponse' => false,'msg' => $ok->getMessageBag()]);
            }
        } else {
            $ok= Validator::make($request->all(),[
                'channels' => ['required', 'string', 'max:255'],
                'customer_country' => ['required', 'string', 'max:255'],
                'customer_zip_code' => ['required', 'string', 'max:255'],
                'customer_state' => ['required', 'string', 'max:255'],
                'customer_address' => ['required', 'string', 'max:255'],
                'customer_city' => ['required', 'string', 'max:255'],
            ]);
    
            if (!$ok->fails()) {
                $init= self::initInfo($request);
               return $ret= self::initPaie($init,$request->toArray());
            } else {
           
              return response()->json(['reponse' => false,'form'=>true,'msg' => $ok->getMessageBag()]);
            }
        }
        } else {
            // return back();
         return response()->json(['reponse' => false,'msg' => "Formation non trouvée merci d'actualiser la page!"]);
        }
    // }
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sessionUser  $sessionUser
     * @return \Illuminate\Http\Response
     */
    public function show(sessionUser $sessionUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sessionUser  $sessionUser
     * @return \Illuminate\Http\Response
     */
    public function edit(sessionUser $sessionUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesessionUserRequest  $request
     * @param  \App\Models\sessionUser  $sessionUser
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesessionUserRequest $request, sessionUser $sessionUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sessionUser  $sessionUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(sessionUser $sessionUser)
    {
        //
    }
}
