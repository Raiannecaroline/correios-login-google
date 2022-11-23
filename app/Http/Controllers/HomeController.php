<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function rastreio(Request $request){
        
            $post = array('Objetos' =>  $request['codigo']);

// iniciar CURL
            $ch = curl_init();
// informar URL e outras funções ao CURL
            curl_setopt($ch, CURLOPT_URL, "https://www2.correios.com.br/sistemas/rastreamento/resultado_semcontent.cfm");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch,CURLOPT_POSTFIELDS, http_build_query($post));
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
// Acessar a URL e retornar a saída
            $output = curl_exec($ch);

// liberar
            curl_close($ch);

// Imprimir a saída
            echo '<!DOCTYPE html>
<html>
<head>
    
    <meta charset="utf-8">
    <title></title>
</head>
<body>
'.$output.'
</body>
</html>';


    }
}
