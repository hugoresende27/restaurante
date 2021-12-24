<x-app-layout>

</x-app-layout>
<!DOCTYPE html>
<html lang="pt">
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
                <th>Food Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Image</th>
                <th>Action</th>
                <th>Action2</th>
            </tr>

          

        </table>









    </div>
  

  </div>
  
    @include("admin.adminscript")
   
  </body>
  
</html>