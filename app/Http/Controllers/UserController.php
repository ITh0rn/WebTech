<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nexmo\Response;
use DB;
use Session;
use Validator;

class UserController extends Controller
{
    public function ordini(Request $request){
        if($request->ajax()){
            $ordini = DB::table('orders')
                ->join('addresses', 'orders.IDaddresses', '=', 'addresses.id')
                ->where('orders.IDusers', '=', Auth::user()->id)
                ->get();
            return Response()->json(view('Contents/tableordini')->with('ordini', $ordini)->render());
        }
    }

    public function indirizzi(Request $request){
        if($request->ajax()){
            $indirizzi = DB::table('addresses')->where('addresses.IDusers', '=', Auth::user()->id)->get();
            return Response()->json(view('Contents/indirizziUser')->with('indirizzi', $indirizzi)->render());
        }
    }

    public function  userinfo(Request $request){
        if($request->ajax()){
            $user = DB::table('users')->where('name', Auth::user()->name)->get();
            return Response()->json(view('Contents/userinfo')->with('user', $user)->render());
        }
    }

    public function opzionidipagamento(Request $request){
        if($request->ajax()){
            $pagamento = DB::table('payments')->where('payments.IDusers', '=', Auth::user()->id)->get();
            return Response()->json(view('Contents/opzionidipagamento')->with('pagamento', $pagamento)->render());
        }
    }

<<<<<<< HEAD
    public function addressAdd(Request $request){

        $messsages = array(
            'city.required' => 'Città: vuoto, inserisci una città',
            'city.string' => 'Città: non può contenere valori alfa-numerici',
            'province.required' => 'Provincia: vuoto, inserisci una città',
            'province.string' => 'Provincia: non può contenere valori alfa-numerici',
            'province.max' => 'Provincia: massimo 2 caratteri',
            'cap.required' => 'CAP: vuoto, inserisci un CAP',
            'cap.numeric' => 'CAP: deve contenere solo numeri',
            'cap.digits' => 'CAP: deve contenere 5 caratteri',
            'address.required' => 'Via: vuoto, inserisci un indirizzo valido',
            'civic.required' => 'Civico: vuoto, inserisci un civico',
            'civic.numeric' => 'Civico: deve contenere solo numeri',
            'civic.digits_between' => 'Civico: Massimo 3 cifre'
=======

    public function aggiungicarta(Request $request){
         DB::table('aggiugicarta')->insert(
             ['nome' => $request->get('nome'),'cognome' => $request->get('cognome'),'numero' => $request->get('numero'),
                 'scadenza' => $request->get('scadenza'),'cvv' => $request->get('cvv')]
         );
    }
}

    public function addAddress(Request $request){
        DB::table('addresses')->insert(
            [   'citta' => $request->get('city'),
                'provincia' => $request->get('province'),
                'cap' => $request->get('cap'),
                'via' => $request->get('address'),
                'civico' => $request->get('civic'),
                $request->get('voto'), 'IDusers' => Auth::user()->id]
>>>>>>> 7103e5caba75c41887a4e45d5d25fd7dfb3b6fb2
        );

        $rules = array(
            'city' => 'required|string',
            'province' => 'required|string|max: 2',
            'cap' => 'required|numeric|digits:5',
            'address' => 'required|string',
            'civic' => 'required|numeric|digits_between:2,3'
        );

        $validator = Validator::make($request->all(), $rules, $messsages);

        if ($validator->fails()) {
            return Response()->json(['error' => $validator->errors()->all()]);
        }

            DB::table('addresses')->insert(
                ['citta' => $request->get('city'),
                    'provincia' => $request->get('province'),
                    'cap' => $request->get('cap'),
                    'via' => $request->get('address'),
                    'civico' => $request->get('civic'),
                    'IDusers' => Auth::user()->id]
            );
        }

        public function removeadd(Request $request){
            DB::table('addresses')->where('ID', $request->get('id'))->delete();
        }
}

