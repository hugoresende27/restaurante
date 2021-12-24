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
        <!-- style="position: relative; top:60px; right: -150px;"> -->
        <form action="{{url('/update',$data->id)}}" method="post" enctype="multipart/form-data" class="p-5">

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
                <input type="text" name="title" value="{{$data->title}} "required>
            </div>
            <div class="p-3">
                <label>Price</label>
                <input type="num" name="price" value="{{$data->price}}" required>
            </div>
            <div class="p-3"> 
                <label>Description</label>
                <input type="text" name="description" value="{{$data->description}}" required>
            </div>
            <div class="p-3" style=" height: 150px; width: 150px;">
                <label>Old Image</label>
                <img src="/foodimage/{{$data->image}}" alt="Falhou">
                <input type="file" name="image" id="file" >
            
                <input type="submit" value="Save" class="btn btn-primary">
            </div>
        </form>

        <div>

  </div>
  
    @include("admin.adminscript")
    
  </body>
  
</html>