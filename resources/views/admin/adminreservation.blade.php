<x-app-layout>

</x-app-layout>
<!DOCTYPE html>
<html lang="pt">
<head>
  @include("admin.admincss")
</head>
  <body>
    
  <div class="container-scroller">

    @include("admin.navbar")

    <div>
        <table class="table" style="background-color:white; margin-top:50px;">
            <tr class="text-center">
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Pessoas</th>
                <th>Data</th>
                <th>Horas</th>
                <th>Mensagem</th>
            </tr>

            @foreach($data as $data)
            <tr class="text-center">
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->phone}}</td>
                <td>{{$data->guest}}</td>
                <td>{{$data->date}}</td>
                <td>{{$data->time}}</td>
                <td>{{$data->message}}</td>
            </tr>
            @endforeach
        </table>
    </div>


  </div>
  
    @include("admin.adminscript")
    
  </body>
  
</html>