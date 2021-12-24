<x-app-layout>

</x-app-layout>
<!DOCTYPE html>
<html lang="pt">
<head>
  @include("admin.admincss")
</head>
    <style> 
        img#imgAdminTab{
            width: 100px;
            height: 100px;
        }
    </style>
  <body>
    
  <div class="container-scroller overflow-auto" style="padding-bottom:50px;" >
    @include("admin.navbar")

    <div >
        <!-- style="position: relative; top:60px; right: -150px;"> -->
        <form action="{{url('/uploadfood')}}" method="post" enctype="multipart/form-data" class="p-5">

        @csrf 
        <!-- para inserir enctype na DB (imagens) -->
        <style>
            input#file{
                color:white;
            }
            input{
                color:black;
            }
        </style>

            <div class="p-3">
                <label>Title</label>
                <input type="text" name="title" placeholder="Escreva um titulo" required>
            </div>
            <div class="p-3">
                <label>Price</label>
                <input type="num" name="price" placeholder="Preço" required>
            </div>
            <div class="p-3">
                <label>Image</label>
                <input type="file" name="image" id="file" required>
            </div>
            <div class="p-3"> 
                <label>Description</label>
                <input type="text" name="description" placeholder="Descrição" required>
            </div>
            <div class="p-3">
                <input type="submit" value="Save" class="btn btn-primary">
            </div>
        </form>

        <div>

        <table class="table" style="background-color:white;">
            <tr class="text-center">
                <th>Food Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Image</th>
                <th>Action</th>
                <th>Action2</th>
            </tr>

            @foreach($dados as $data)
            <tr class="text-center">
                <td>{{$data->title}}</td>
                <td>{{$data->price}} €</td>
                <td>{{$data->description}}</td>
                <td><img  id="imgAdminTab" src="/foodimage/{{$data->image}}" alt="falhou"></td>
                <!-- <td> <a href="{{url('/deletemenu',$data->id)}}"> Delete </a></td> -->
                <td>
                <a class="btn btn-danger" onclick="return confirm('Delete! Confirm?')" href="{{url('/deletemenu',$data->id)}}">Delete</a>
                </td>
                <td>
                <a class="btn btn-primary" href="{{url('/updateview',$data->id)}}">Update</a>
                </td>
            </tr>
            @endforeach

        </table>



        </div>

    </div>
  </div>

    @include("admin.adminscript")
    
  </body>
  
</html>