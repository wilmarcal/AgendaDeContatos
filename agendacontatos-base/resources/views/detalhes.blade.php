<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalhes de usuário</title>

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    
    <div class=container-fluid id="containerDiv">
        <div class="row">
            <div class="col-sm-12"><br>
                <a href="/"><button type="button" class="btn btn-success">Voltar</button></a><center>Detalhes de contatos</center><br>

                Informações
                <table class="table table-dark table-striped">
                    <tr>
                        <td>Nome</td><td>{{$user->name." ".$user->surname}}</td>
                    </tr>
                    <tr>
                        <td>Email</td><td>{{$user->email}}</td>
                    </tr>
                <table><br><br>
                
                    Telefone(s)
                <table class="table table-dark table-striped">
                    @foreach($telefone as $tel)
                    <tr>
                            <td>{{"($tel->ddd) $tel->telefone"}}</td>
                    </tr>
                    @endforeach
                </table><br><br>

                Endereco(s)
                <table class="table table-dark table-striped">
                    @foreach($endereco as $end)
                    <tr>
                        <td>{{"$end->endereco, $end->numero, $end->bairro, $end->cidade/$end->estado"}}</td>
                    </tr>
                    @endforeach
                </table>

                    <a href=" {{url('/contatos/teledit/'.$user->id)}}"><button type="button" class="btn btn-success">Adicionar telefone</button></a><br><br>
                    <a href=" {{url('/contatos/endedit/'.$user->id)}}"><button type="button" class="btn btn-success">Adicionar endereço</button></a><br><br>
                    <button type="button" class="btn btn-danger">Voltar</button>
                
            </div>
        </div>


    </div>


    <script>
    //Filtrar tabela

function filter() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("contato");
  filter = input.value.toUpperCase();
  table = document.getElementById("contatos");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}






    //Pesquisar CEP
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