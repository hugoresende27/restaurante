<x-app-layout>

</x-app-layout>
<!DOCTYPE html>
<html lang="pt">
<head>
  @include("admin.admincss")
</head>
  <body>
  <div class="container-scroller" style="padding-bottom:50px;" >
    
        @include("admin.navbar")

        <div style="position: relative; top: 20px; right:-150px">
        <h3>Encomendas</h3>
            <table class="table table-striped" style="background-color:white;">

                <tr class="text-center">
                    
                    
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Morada</th>
                    <th>Prato</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Preço total</th>
                    
                </tr>
                @foreach($data as $dados)
                <tr align="center" >
                    
                    <td>{{$dados->name}}</td>
                    <td>{{$dados->phone}}</td>
                    <td>{{$dados->address}}</td>
                    <td>{{$dados->foodname}}</td>
                    <td>{{$dados->price}}€</td>
                    <td>{{$dados->qtd}}</td>
                    <td>{{$dados->price *$dados->qtd}}€</td>
                    <!-- <td>{{$dados->email}}</td>
                    @if($dados->usertype == "0")
                   
                    <td>
                        <a class="btn btn-danger" onclick="return confirm('Delete! Confirm?')" href="{{url('/deleteuser', $dados->id)}}">Delete</a>
                    </td>
                    @else
                    <td><a>----</a></td>

                    @endif -->
                </tr>

                @endforeach
            </table>


        </div>

  </div>
    @include("admin.adminscript")
    
  </body>
  
</html>