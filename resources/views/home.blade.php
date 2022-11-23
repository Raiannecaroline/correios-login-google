@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('RELOU MAI FRIENDE') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Digite um CEP, por favor...') }}




    <html>
    <head>
    <title>ViaCEP Webservice</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    
    <script>
    
    function limpa_formulário_cep() {
            
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
            document.getElementById('ibge').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
            document.getElementById('ibge').value=(conteudo.ibge);
        } 
        else {
           
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

       
        var cep = valor.replace(/\D/g, '');

        
        if (cep != "") {

           
            var validacep = /^[0-9]{8}$/;

            if(validacep.test(cep)) {

               
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
                document.getElementById('ibge').value="...";

                
                var script = document.createElement('script');

                
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                
                document.body.appendChild(script);

            } 
            else {
                
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } 
        else {
            
            limpa_formulário_cep();
        }
    };

    </script>
    </head>

    <body>
   

   <form  method="get" action=".">
   <br> 
        <label>Cep:
        <input name="cep" type="text" class="form-control" id="cep" value="" size="10" maxlength="9"
               onblur="pesquisacep(this.value);" /></label><br />
        <label>Rua:
        <input name="rua" type="text" class="form-control" id="rua" size="60" /></label><br />
        <label>Bairro:
        <input name="bairro" type="text" class="form-control" id="bairro" size="40" /></label><br />
        <label>Cidade:
        <input name="cidade" type="text" class="form-control" id="cidade" size="40" /></label><br />
        <label>Estado:
        <input name="uf" type="text" class="form-control" id="uf" size="2" /></label><br />
        <label>IBGE:
        <input name="ibge" type="text" class="form-control" id="ibge" size="8" /></label><br />
         <hr>
      </form>
      

       <form  method="get" action="/rastreio">
    <label>Digite o código de rastreio:
        <input name="codigo" type="text" class="form-control" id="rastreio" size="60" /></label><br />      
        <button class="btn btn-secondary" type="submit">Buscar</button>
    </form>

    </body>

    </html>

                </div>






























            </div>
        </div>
    </div>
</div>
@endsection
