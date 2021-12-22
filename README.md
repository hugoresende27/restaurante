# restaurante
- https://www.youtube.com/playlist?list=PLm8sgxwSZofcOCoxwggBQ8FwPSoQUI_So

- /////////////////////////////////////////////////////////////////////////
- composer create-project laravel/laravel example-app
- cd example-app
- php artisan serve

2. Mudar .env DB_DATABASE=restaurante

3. Criar em resources/views home.blade.php e colar o conteudo de index.html

3. cmd php artisan make:controller HomeController

4. Em routes/web.php Route::get("/home", [HomeController::class, "index" ]);

5. Em app/Http/Controllers/HomeController.php public 
    function index(){
            return view ("home");
        }
- /////////////////////////////////////////////////////////////////////////
6. CRIAR SISTEMA DE LOGIN E REGISTO (cmd)
    1. composer require laravel/jetstream
    2. php artisan jetstream:install livewire (Jetstream para implementação de login)
    3. npm install
    4. npm run dev
        1. database/migrations/**create_users_table.php adicionar $table->string('usertype')->default(0);
    5. php artisan migrate (depois de criada a db no phpmyadmin, este comando vai criar todas as tabelas e campos da DB)
    6. app/Providers/RouteServiceProvider.php public const HOME = '/';
    7. Em routes/web.php Route::get("/", [HomeController::class, "index" ]) e remover Route com return 'welcome';

- /////////////////////////////////////////////////////////////////////////
7. adicionar admin com usertype = 1
8. Em routeServicePorvider.php : public const HOME = 'redirects'; 
9. Em routes/web.php : Route::get("/redirects", [HomeController::class, "redirects" ]);
10. Adicionar função e biblioteca em HomeController.php
11. Criar pasta admin em views, ficheiro adminhome.blade.php,adminscss e adminscripts com bootstrap dashboard template, @include("admin.***");
12. cmd php artisan make:controller AdminController (vai criar app/Http/Controllers/AdminController.php)
13. criar tabela em html que vai mostrar os dados dos users em users.blade.php
14. Criar href para delete, adicionar rota em routes/web.php e criar funcao deleteuser em AdminController.php
15. Criar food.blade.php com o menu e depois em home.blade.php  @include("food")
16. php artisan make:model Food -m (-m de migrate para Created Migration: 2021_12_20_185742_create_food_table )
17. php artisan migrate para actualizar BD em phpmyadmin com tabela food
- /////////////////////////////////////////////////////////////////////////
18. Em admin, navbar.blade.php href="{{url('/foodmenu')}
19. Criar rota /foodmenu e função e AdminController  public function foodmenu(){return view("admin.foodmenu")};
20. Criar em resources/views/admin foodmenu.blade.php e criar o form de input de menu 
- form action="{{url('\uploadfood'}}" method="post" enctype="multipart/form-data"
21. Criar rota /uploadfood (atenção Route::post("/uploadfood" em vez do usual Route::get)
21. Criar em AdminController function uploadfood() // use App\Models\Food;
- /////////////////////////////////////////////////////////////////////////
22. Alterar Menu
- mudar function index em HomeController.php para {$data = food::all();return view ("home", compact("data"));}
- em foodblade @foreach ($data as $data) // {{$data->price}} etc
- /////////////////////////////////////////////////////////////////////////
23. Criar tabela de foods em foodmenu no accesso de admin
24. Não esquecendo que foodmenu tem o controlador em AdminController
- adicionar o controlador foodmenu em AdminController  $dados = food::all(); //food para tabela food na BD e compact("dados"));
- foreach na tabela de foods com os $dados as $data->title
- adicionar mais uma coluna action na tabela com um botão delete href="{{url('/deletemenu',$data->id}}
- adicionar rota em routes/web.php Route::get("/deletemenu/{id}", [AdminController::class, "deletemenu" ]);
- em AdminController adicionar public function deletemenu($id)
- /////////////////////////////////////////////////////////////////////////
25. Ainda na tabela de foodmenu em admin, adicionar coluna com botão href="{{url('/updateview'
- criar rota em web.php
- criar a funcao updateview em AdminController, que vai ter return para updateview.blade.php
- criar pagina updateview.blade.php (base href="/public" para importar css) 
- pagina updateview leva o mesmo form de foodmenu com algumas diferenças, mudar os placeholder's por values={{$data->title}}
- mudar form action="{{url('/update',$data->id)}}"
- criar rota em web.php Route::post("/update/{id}", [AdminController::class, "update" ]);
- criar função em AdminController public function update($id,Request $request){
- /////////////////////////////////////////////////////////////////////////
26. Reservar uma mesa
- em home.blade.php cortar Reservation Us Area
- criar novo reservation.blade.php
- em home.blade.php : @include("reservation")
- no form de reservation.blade @csrf para ligar a DB
- cmd php artisan make:model Reservation -m (-m para migration da DB)
- adicionar na função up() em database/migrations/create_reservation_table.php os campos da tabela: $table->string('name')->nullable();
- cmd php artisan migrate
- em form action="{{url('reservation')}}"
- adicionar route na web : Route::post("/reservation", [AdminController::class, "reservation" ]);
- adicionar função reservation no AdminController (não esquecer use App\Models\Reservation;)
- criar a blade adminreservation.blade.php na pasta admin
- na navbar.blade.php colocar o link href="{{url('/viewreservation')}}
- criar rota na web : Route::get("/viewreservation", [AdminController::class, "viewreservation" ]);
- no Models\AdminController.php criar a função viewreservation(){
- em adminreservation inserir em html a tabela com os dados das reservas
