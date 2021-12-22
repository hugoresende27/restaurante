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

        <div style="position: relative; top: 60px; right:-150px">
            <table class="table table-striped" style="background-color:white;">

                <tr class="text-center">
                    
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                    
                </tr>
                @foreach($dados as $dados)
                <tr align="center">
                    <td>{{$dados->name}}</td>
                    <td>{{$dados->email}}</td>
                    @if($dados->usertype == "0")
                   
                    <td>
                        <a class="btn btn-danger" onclick="return confirm('Delete! Confirm?')" href="{{url('/deleteuser', $dados->id)}}">Delete</a>
                    </td>
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