<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de usuário</title>

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    
    <div class=container-fluid id="containerDiv">
        <div class="row">
            <div class="col-sm-12">

                <br>
                <center>Adicionar telefone</center>
                <form action="{{'/contatos/addTel/'.$user}}" method="GET">

                    <center>
                    

                        <input type="text" placeholder="Ddd" id="ddd" name="ddd"required>
                        <input type="text" placeholder="Telefone" id="telefone" name="telefone"required>
                        <button type="submit" class="btn btn-success">Cadastrar</button></a>
                        <a href="/"><button type="button" class="btn btn-danger">Voltar</button></a><br>
                
                    
                       

                    </center>
                </form>
                
            </div>
        </div>
    </div>


    <script>
    
    function getCep(){

        var cep = document.getElementById("cep").value;

        // Create an XMLHttpRequest object
        const xhttp = new XMLHttpRequest();

        // Define a callback function
        xhttp.onload = function() {
        // Here you can use the Data

        var obj = JSON.parse(this.response);
        document.getElementById("cidade").value = obj.localidade;
        document.getElementById("estado").value = obj.uf;
        document.getElementById("bairro").value = obj.bairro;
        document.getElementById("logradouro").value = obj.logradouro;

        console.log(this.response);
        }

        // Send a request
        xhttp.open("GET", "http://viacep.com.br/ws/"+cep+"/json/");
        xhttp.send();

    



    }

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>