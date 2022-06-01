<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\mailAchat;
use App\Models\session;
use App\Rules\PhoneNumber;
use App\Models\sessionUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdatesessionUserRequest;

class SessionUserController extends Controller
{
    public function status()
    {

        $desc = session::find($retour->formation_id);
                $d = $desc->live == true && $desc->isform == false ? "Réservation du live": "Achat de la Formation";
                $m = $desc->live == true && $desc->isform == false ? "Réservation du live ".$desc->titre." Verfifier votre compte pour plus de details"
                : "L'achat de la Formation ".$desc->titre." Verfifier votre compte pour plus de details";
        
                $data = ['objet' => $d." retour", "message" => $m];
                $user = User::find(Auth::user()->id);
                Mail::to()->send(new mailAchat($user, $data));
        $st = self::verifyStatus('6.2Qy4KxwwJQ');
        dd($st);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function verifyStatus($request)
    {
        $url = 'https://api-checkout.cinetpay.com/v2/payment/check';
        $cinetpay_verify =  [
            "apikey" => env("CINETPAY_APIKEY"),
            "site_id" => env("CINETPAY_SERVICD_ID"),
            "transaction_id" => $request,
        ];
        $response = Http::asJson()->post($url, $cinetpay_verify);
        $response_body = json_decode($response->body(), JSON_THROW_ON_ERROR | true, 512, JSON_THROW_ON_ERROR);

        return $response_body;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function verifyLogin($id)
    {
        $verify = explode('.', $id);
        $id = $verify[0];
        $u = User::where("id", $id)->first();

        if ($u) {
            event(new Registered($u));

            Auth::login($u);
            return true;
        } else {
            return false;
        }
    }
    public function notify(Request $request)
    {
        $retour = sessionUser::where("reference", $request->cpm_trans_id)->first();
       
        if ($retour) {
            $response_body = self::verifyStatus($request->cpm_trans_id);
            /**
             * composition de la variable reponse, c'est une concatenation de montant+monaie+
             * signature+telephone+prefix du pay+la langue+la version+la configuration+l'action+status+code
             * * */
            $reponse = $request->cpm_amount . "/" . $request->cpm_currency . "/" . $request->signature . "/" . $request->cel_phone_num . "/" .
                $request->cpm_phone_prefixe . "/" . $request->cpm_language . "/" . $request->cpm_version . "/" . $request->cpm_payment_config . "/" .
                $request->cpm_page_action . "/" . $response_body['data']['status'] . "/" . $response_body['code'];

            if ((int)$response_body["code"] === 00 && $response_body["message"] == "SUCCES") {

                $retour->etat = 'Payer';
                $retour->reponse = $reponse;
                $retour->message = $response_body['message'];
                $retour->niveau = 'commencer';
                $retour->updated_at = $request->cpm_trans_date;
                $retour->save();

                $desc = session::find($retour->session_id);
                $d = $desc->live == true && $desc->isform == false ? "Réservation du live": "Achat de la Formation";
                $m = $desc->live == true && $desc->isform == false ? "Réservation du live ".$desc->titre." Verfifier votre compte pour plus de details"
                : "L'achat de la Formation ".$desc->titre." Verfifier votre compte pour plus de details";
        
                $data = ['objet' => $d, "message" => $m];
                $user = User::find(Auth::user()->id);
                Mail::to()->send(new mailAchat($user, $data));
                return dd($response_body['data']['status']);
            } else {
                $retour->reponse = $reponse;
                $retour->message = $response_body['message'];
                $retour->save();

                return dd($response_body['data']['status']);
            }
        } else {
            return dd($retour);
        }
    }
    public function retour(Request $request)
    {
        $retour = sessionUser::where([["token", $request->token], ["reference", $request->transaction_id]])->first();
        $login = self::verifyLogin($request->transaction_id);
        if ($retour) {
            $response_body = self::verifyStatus($request->transaction_id);
            if ((int)$response_body["code"] === 00 && $response_body["message"] == "SUCCES") {

                $message = ["message" => "Paiement fait avec succès", "mail" => "Vous recevrez un mail de notification", "status" => "Réussi"];
                $operateur = $retour->operateur;
                $data = $response_body;

                $desc = session::find($retour->session_id);
                $d = $desc->live == true && $desc->isform == false ? "Réservation du live": "Achat de la Formation";
                $m = $desc->live == true && $desc->isform == false ? "Réservation du live ".$desc->titre." Verfifier votre compte pour plus de details"
                : "L'achat de la Formation ".$desc->titre." Verfifier votre compte pour plus de details";
        
                $dat = ['objet' => $d." retour", "message" => $m];
                $user = User::find(Auth::user()->id);
                Mail::to()->send(new mailAchat($user, $dat));
                return view('client.pages.notify', compact('data', 'message', 'operateur'));
            } else {
                $data = $response_body;
                $message = self::message($response_body);
                return view('client.pages.notify', compact('data', "message"));
            }
        } else {
            $response_body = self::verifyStatus($request->transaction_id);
            $data = $response_body;
            $etat = "Erreur d'enregistrement";
            $message = self::message($response_body);
            return view('client.pages.notify', compact('data', "message"));
        }
    }
    public function message($body)
    {
        $code = $body["code"];
        $reponse = array();
        switch ($code) {
            case '201':
                return $reponse = ["message" => "Paiement crée", "status" => "Créé"];
                break;
            case '600':
                return $reponse = ["message" => "Paiement échoué!", "status" => "échec"];
                break;
            case '602':
                return $reponse = ["message" => "Solde insuffisant", "status" => "échec"];
                break;
            case '603':
                return $reponse = ["message" => "Service indisponible", "status" => "échec"];
                break;
            case '604':
                return $reponse = ["message" => "Erreur du code OTP", "status" => "échec"];
                break;
            case '608':
                return $reponse = ["message" => "Les champs minimum requis n'est pas envoyer", "status" => "échec"];
                break;
            case '606':
                return $reponse = ["message" => "Erreur des configurations", "status" => "échec"];
                break;
            case '609':
                return $reponse = ["message" => "Erreur d'authenfication", "status" => "échec"];
                break;
            case '610':
                return $reponse = ["message" => "Erreur de méthode de paiement", "status" => "échec"];
                break;
            case '611':
                return $reponse = ["message" => "Erreur des type de montant", "status" => "échec"];
                break;
            case '612':
                return $reponse = ["message" => "Monaie non valide", "status" => "échec"];
                break;
            case '613':
                return $reponse = ["message" => "Identifiant du site non valide", "status" => "échec"];
                break;
            case '614':
                return $reponse = ["message" => "Format de date de transaction non valide", "status" => "échec"];
                break;
            case '615':
                return $reponse = ["message" => "Langue non valide", "status" => "échec"];
                break;
            case '616':
                return $reponse = ["message" => "Page d'action non valide", "status" => "échec"];
                break;
            case '617':
                return $reponse = ["message" => "Configuration de paiement non valide", "status" => "échec"];
                break;
            case '618':
                return $reponse = ["message" => "Version de API non valide", "status" => "échec"];
                break;
            case '619':
                return $reponse = ["message" => "La signature érronée", "status" => "échec"];
                break;
            case '620':
                return $reponse = ["message" => "Paiement crée", "status" => "échec"];
                break;
            case '621':
                return $reponse = ["message" => "Paiement crée", "status" => "échec"];
                break;
            case '622':
                return $reponse = ["message" => "Paiement crée", "status" => "échec"];
                break;
            case '623':
                return $reponse = ["message" => "Paiement crée", "status" => "échec"];
                break;
            case '624':
                return $reponse = ["message" => "Paiement crée", "status" => "échec"];
                break;
            case '625':
                return $reponse = ["message" => "Paiement crée", "status" => "échec"];
                break;
            case '626':
                return $reponse = ["message" => "Paiement crée", "status" => "échec"];
                break;
            case '627':
                return $reponse = ["message" => "Paiement crée", "status" => "échec"];
                break;
            case '628':
                return $reponse = ["message" => "Paiement crée", "status" => "échec"];
                break;
            case '635':
                return $reponse = ["message" => "Paiement crée", "status" => "échec"];
                break;
            case '636':
                return $reponse = ["message" => "Paiement crée", "status" => "échec"];
                break;
            case '637':
                return $reponse = ["message" => "Paiement crée", "status" => "échec"];
                break;
            case '641':
                return $reponse = ["message" => "Paiement crée", "status" => "échec"];
                break;
            case '642':
                return $reponse = ["message" => "Paiement crée", "status" => "échec"];
                break;
            case '662':
                return $reponse = ["message" => "Paiement crée", "status" => "échec"];
                break;
            case '663':
                return $reponse = ["message" => "Paiement crée", "status" => "échec"];
                break;
            case '664':
                return $reponse = ["message" => "Paiement crée", "status" => "échec"];
                break;
            case '804':
                return $reponse = ["message" => "Paiement crée", "status" => "échec"];
                break;
            case '807':
                return $reponse = ["message" => "Paiement crée", "status" => "échec"];
                break;
            case '808':
                return $reponse = ["message" => "Paiement crée", "status" => "échec"];
                break;
            case '809':
                return $reponse = ["message" => "Paiement crée", "status" => "échec"];
                break;
            case '810':
                return $reponse = ["message" => "Paiement crée", "status" => "échec"];
                break;
            case '811':
                return $reponse = ["message" => "Paiement crée", "status" => "échec"];
                break;
            case '812':
                return $reponse = ["message" => "Paiement crée", "status" => "échec"];
                break;
            case '623':
                return $reponse = ["message" => "Paiement crée", "status" => "échec"];
                break;

            default:
                return $reponse = ["message" => "Paiement crée", "status" => "échec"];
                break;
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
        $idHash = Auth::user()->id . "." . $chaineAleatoire;
        return $idHash;
    }
    public function initInfo($request, $transaction_id)
    {
        // $desc = session::find($request->formation_id);
        // $d = $desc->live == true && $desc->isform == false ? "Réservation du live": "Achat de la Formation";
        // $m = $desc->live == true && $desc->isform == false ? "Réservation du live ".$desc->titre.". Verfifier votre compte pour plus de details"
        // : "L'achat de la Formation ".$desc->titre." Verfifier votre compte pour plus de details";
        // $message = ["message" => "Paiement fait avec succès", "mail" => "Vous recevrez un mail de notification", "status" => "Réussi"];

        $desc = session::find($request->formation_id);
        $d = $desc->live == true && $desc->isform == false ? "Réservation du live " . $desc->titre : "Achat de la Formation";
         //dd($message['mail']);
        if ($request->channels == "MOBILE_MONEY") {
            $cinetpay_data =  [
                "amount" => $request->prix,
                "currency" => $request->monaie,
                "apikey" => env("CINETPAY_APIKEY"),
                "site_id" => env("CINETPAY_SERVICD_ID"),
                "transaction_id" => $transaction_id,
                "description" => $d,
                "return_url" => env("RETURN_URL"),
                "notify_url" => env("NOTIFY_URL"),
                'channels' => $request["channels"],
            ];
            return $cinetpay_data;
        } else {
            $state = "";
            switch ($request["customer_country"]) {
                case 'CA':
                    $state = $request["customer_state"];
                    break;
                case 'US':
                    $state = $request["customer_state2"];
                    break;
            }

            $cinetpay_data =  [
                "amount" => $request->prix,
                "currency" => $request->monaie,
                "apikey" => env("CINETPAY_APIKEY"),
                "site_id" => env("CINETPAY_SERVICD_ID"),
                "transaction_id" => $transaction_id,
                "description" => $d,
                "return_url" => env("RETURN_URL"),
                "notify_url" => env("NOTIFY_URL"),
                'channels' => $request["channels"],
                'customer_name' => Auth::user()->name,
                'customer_city' => $request["customer_city"],
                'customer_email' => Auth::user()->email,
                'customer_surname' => Auth::user()->prenom,
                'customer_address' => $request["customer_address"],
                'customer_country' => $request["customer_country"],
                'customer_zip_code' => $request["customer_zip_code"],
                'customer_phone_number' => Auth::user()->phone,
                'customer_state' => $state,
            ];
            return $cinetpay_data;
        }
    }
    public function initPaie($cinetpay_data, $request, $transaction_id)
    {

        $url = 'https://api-checkout.cinetpay.com/v2/payment';
        $response = Http::asJson()->post($url, $cinetpay_data);

        $response_body = json_decode($response->body(), JSON_THROW_ON_ERROR | true, 512, JSON_THROW_ON_ERROR);
        if ($response->status() === 200) {
            $p = explode(',', $request["formation_id"]);
            // dd($p);
            for ($i = 0; $i < count($p); $i++) {
                $register = sessionUser::updateOrCreate([
                    "session_id" => $p[$i],
                    "user_id" => Auth::user()->id,
                ], [
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

                if ((int)$response_body["code"] === 201) {
                    $payment_link = $response_body["data"]["payment_url"];
                    return  Redirect::to($payment_link);
                } else {
                    return back()->with('message', $response_body['description']);
                    // return response()->json(['reponse' => false, 'bank' => true, 'msg' => $response_body['description']]);
                }
            } else {
                return back()->with('message', "Erreur d'enregistrement!");
                //return response()->json(['reponse' => false, 'bank' => true, 'msg' => "Erreur d'enregistrement!"]);
            }
        } else {
            return back()->with('message', $response_body['description']);
            // return response()->json(['reponse' => false, 'bank' => true, 'msg' => $response_body['description']]);
        }
    }

    public function siProfilcomplet()
    {
        $u = User::selectRaw("name,prenom,phone,email")->where('id', Auth::user()->id)->get();

        foreach ($u as $us) {
            switch ($us) {
                case empty($us->name):
                    return false;
                    break;
                case empty($us->prenom):
                    return false;
                    break;
                case empty($us->phone):
                    return false;
                    break;
                case empty($us->email):
                    return false;
                    break;
                default:
                    return true;
                    break;
            }
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
        $transaction_id = $this->genererChaineAleatoire();
        if (isset($request->formation_id)) {
            if ($request->channels == "MOBILE_MONEY") {
                $ok = $request->validate([
                    'channels' => ['required', 'string', 'max:255'],
                ]);

                $init = self::initInfo($request, $transaction_id);

                return $ret = self::initPaie($init, $request->toArray(), $transaction_id);
            } else {
                $profil = self::siProfilcomplet();
                if ($profil === false) {
                    return back()->with("message", "Veuillez completer votre profil afin de continuer votre paiement par carte bancaire ");
                    // return response()->json(['reponse' => false,'msg' => "Veuillez completer votre profil afin de continuer votre paiement"]);
                } else {
                    //  dd($request->customer_state2);
                    if ($request->customer_country == "US") {
                        $request->validate([
                            'channels' => ['required', 'string', 'max:255'],
                            'customer_country' => ['required', 'string', 'max:255'],
                            'customer_zip_code' => ['required', 'string', 'max:255'],
                            'customer_state2' => ['required', 'string', 'max:255'],
                            'customer_address' => ['required', 'string', 'max:255'],
                            'customer_city' => ['required', 'string', 'max:255'],
                        ]);
                    }
                    if ($request->customer_country == "CA") {

                        $request->validate([
                            'channels' => ['required', 'string', 'max:255'],
                            'customer_country' => ['required', 'string', 'max:255'],
                            'customer_zip_code' => ['required', 'string', 'max:255'],
                            'customer_state' => ['required', 'string', 'max:255'],
                            'customer_address' => ['required', 'string', 'max:255'],
                            'customer_city' => ['required', 'string', 'max:255'],
                        ]);
                    } else {
                        $request->validate([
                            'channels' => ['required', 'string', 'max:255'],
                            'customer_country' => ['required', 'string', 'max:255'],
                            'customer_address' => ['required', 'string', 'max:255'],
                            'customer_city' => ['required', 'string', 'max:255'],
                        ]);
                    }


                    $init = self::initInfo($request, $transaction_id);
                    return $ret = self::initPaie($init, $request->toArray(), $transaction_id);
                }
            }
        } else {
            return back()->with("message", "Formation non trouvée merci d'actualiser la page!");

            // return response()->json(['reponse' => false, 'msg' => "Formation non trouvée merci d'actualiser la page!"]);
        }
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
