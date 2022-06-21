<!DOCTYPE html>
<html lang="en">
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
            <div class="col-sm-12"><br>
                <a href="/cadastro"><button type="button" class="btn btn-success">Adicionar contato</button></a><center>Agenda de contatos</center>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12"><br>

                <input type="search" class="form-control" id="contato" placeholder="Pesquisar..." onkeyup="filter()"><br>
                <table class="table table-dark table-striped" id="contatos">
                    

                    @foreach($user as $usr)
                    <tr>
                        <td>{{$usr->name." ".$usr->surname}}</td>
                        <td>
                            <a href="{{ url('/contatos/detalhes/'.$usr->id) }}"><button type="button" class="btn btn-info">Detalhes</button></a>
                            <a href="{{ url('/contatos/remover/'.$usr->id) }}"><button type="button" class="btn btn-danger">Remover</button></a>
                        </td>
                    </tr>
                    @endforeach

                </table>
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