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

    <div style="position: relative; top:60px; right: -150px;">
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

    </div>
  </div>

    @include("admin.adminscript")
    
  </body>
  
</html>