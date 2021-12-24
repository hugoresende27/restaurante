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

    {{$data->name}}

  </div>
  
    @include("admin.adminscript")
    
  </body>
  
</html>