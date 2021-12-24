<x-app-layout>

</x-app-layout>
<!DOCTYPE html>
<html lang="pt">
<style> 
        img#imgCust{
            width: 150px;
            height: 150px;
        }
    </style>
<head>
  @include("admin.admincss")
</head>
<style>
            input#file{
                color:white;
            }
            input{
                color:black;
            }
        </style>
  <body>
    
  <div class="container-scroller overflow-auto" style="padding-bottom:50px;" >
    @include("admin.navbar")

    <div >

    <form action="{{url('/uploadchef')}}" method="POST" enctype="multipart/form-data" class="p-5">

        @csrf

        <div class="p-3">
            <label>CHEFE</label>
            <input type="text" name="name" placeholder="Nome do chef" required>
        </div>

        <div class="p-3"> 
            <label>CURSO</label>
            <input type="text" name="speciality" placeholder="Especialidade" required>
        </div>

        <div class="p-3">
            <label>Foto</label>
            <input type="file" name="image" id="file" required>
        </div>

        <div class="p-3"> 
            
            <input type="submit" value="Guardar" class="btn btn-primary">
        </div>

    </form>

    <table class="table" style="background-color:white;">
            <tr class="text-center">
                <th>Nome do Chefe</th>
                <th>Especialidade</th>
                <th>Image</th>
                <th>Action</th>
                <th>DELETE</th>
            </tr>

        @foreach($data as $data)

            <tr class="text-center">
                <td>{{$data->name}}</td>
                <td>{{$data->speciality}}</td>
                <td><img id="imgCust" src="/chefimage/{{$data->image}}" alt=""></td>
                <td><a class="btn btn-primary" href="{{url('/updatechef',$data->id)}}">Update</a></td>
                <td>
                <a class="btn btn-danger" onclick="return confirm('Delete! Confirm?')" href="{{url('/deletechef',$data->id)}}">Delete</a>
                </td>
            </tr>
        
        @endforeach
          

        </table>









    </div>
  

  </div>
  
    @include("admin.adminscript")
   
  </body>
  
</html>