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

    <form action="">

        <div class="p-3">
            <label>CHEFE</label>
            <input type="text" name="name" placeholder="Nome do chef" required>
        </div>

        <div class="p-3"> 
            <label>CURSO</label>
            <input type="text" name="speciality" placeholder="Especialidade" required>
        </div>

        <div class="p-3" style=" height: 350px; width: 350px;">
            <label>Imagem</label>
            <img src="" alt="Falhou">
            <input type="file" name="image" id="file" required>
        </div>

    </form>

  </div>
  
    @include("admin.adminscript")
    
  </body>
  
</html>