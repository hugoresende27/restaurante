<x-app-layout>

</x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
  @include("admin.admincss")
</head>
  <body>
  <div class="container-scroller">
    
        @include("admin.navbar")

        <div style="position: relative; top: 60px; right:-150px">
            <table bgcolor="grey" border = "3px">

                <tr>
                    
                    <th style="padding:30px">Name</th>
                    <th style="padding:30px">Email</th>
                    <th style="padding:30px">Action</th>
                    
                </tr>
                @foreach($dados as $dados)
                <tr align="center">
                    <td>{{$dados->name}}</td>
                    <td>{{$dados->email}}</td>
                    @if($dados->usertype == "0")
                    <td><a href="{{url('/deleteuser', $dados->id)}}">Delete</a></td>
                    @else
                    <td><a>----</a></td>

                    @endif
                </tr>

                @endforeach
            </table>


        </div>

  </div>
    @include("admin.adminscript")
    
  </body>
  
</html>