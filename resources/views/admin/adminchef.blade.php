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
    
  <div class="container-scroller">

    @include("admin.navbar")

    <form action="{{url('/uploadchef')}}" method="POST" enctype="multipart/form-data">

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

  </div>
  
    @include("admin.adminscript")
    
  </body>
  
</html>