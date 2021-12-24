<x-app-layout>

</x-app-layout>
<!DOCTYPE html>
<html lang="pt">
<head>
    <base href="/public">
  @include("admin.admincss")
</head>
  <body>
    
  <div class="container-scroller">

    @include("admin.navbar")
    <div >
        <!-- action="{{url('/update',$data->id)}}" method="post" enctype="multipart/form-data" class="p-5" -->
        <form action="{{url('/updatefoodchef',$data->id)}}" method="post" enctype="multipart/form-data" class="p-5">

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
                <label>Nome do Chefe</label>
                <input type="text" name="name" value="{{$data->name}} "required>
            </div>
            <div class="p-3">
                <label>Especialidade</label>
                <input type="text" name="speciality" value="{{$data->speciality}}" required>
            </div>
            
            <div class="p-3" style=" height: 150px; width: 150px;">
                <label>Imagem</label>
                <img src="/chefimage/{{$data->image}}" alt="Falhou">
                <input type="file" name="image" id="file" >
                <div>
                  <input type="submit" value="Save" class="btn btn-primary">
                </div>
            </div>
            
        </form>

        <div>

    
  </div>
  
    @include("admin.adminscript")
    
  </body>
  
</html>