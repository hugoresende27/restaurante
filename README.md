# restaurante
- https://www.youtube.com/playlist?list=PLm8sgxwSZofcOCoxwggBQ8FwPSoQUI_So

- //////////////////////////////////////////////////////////////
- php artisan route:cache
- css problems base href="/public"
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
- criar novo reservation.blade.php e colar Reservation Us Area
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
- /////////////////////////////////////////////////////////////////////////
27. Upload e gestão de Chefes do restaurante
- em home.blade.php cortar Chefs Area
- criar novo chefs.blade.php e colar Chefs Area
- em home.blade.php : @include("chefs")
- criar na pasta admin adminchef.blade.php
- mudar href em navbar de admin para {{url('/viewchef')}}
- adicionar rota na web Route::get("/viewchef", [AdminController::class, "viewchef" ]);
- adicionar função viewchef(){ return view("admin.adminchef")} em AdminController
- PARA ADICIONAR A TABELA NO adminchef
- cmd php artisan make:model Foodchef -m (-m para migration da DB)
- em database/migrations/create_foodchefs adicionar na função up os campos da tabela $table->string("speciality")->nullable();
- cmd php artisan migrate para criar a tabela foodchefs na DB
- criar um form em adminchef.blade action="{{url('/uploadchef')}}" method="POST" enctype="multipart/form-data" @csrf
- adicionar rota na web Route::post("/uploadchef", [AdminController::class, "uploadchef" ]);
- em AdminController function uploadchef()
- na pasta public criar uma pasta chefimage
- em HomeController adicionar $data2 na função index()
- em chefs.blade.php adicionar o @foreach($data2 as $data2) e {{$data2->name}} para aceder ao chefs da DB
- /////////////////////////////////////////////////////////////////////////
28. Adicionar tabela de chefs no painel admin, chefs.blade.php
- colar a tabela em chefs.blade.php
- na função viewchef() em AdminController adicionar : $data = Foodchef::all(); e compact("data")
- botão update na tabela em adminchef href="{{url('/updatechef',$data->id)}}
- adicionar rota na web Route::get("/updatechef/{id}", [AdminController::class, "updatechef" ]);
- adicionar function updatechef em AdminController
- criar na pasta admin o ficheiro updatechef.blade.php
- na blade updatechef criar o form action="{{url('/updatefoodchef',$data->id)}}"
- na web criar a rota Route::post("/updatefoodchef/{id}", [AdminController::class, "updatefoodchef" ]);
- criar botão DELETE em adminchef href="{{url('/deletechef',$data->id)}}
- criar rota na web para deletechef Route::get("/deletechef/{id}", [AdminController::class, "deletechef" ]);
- criar função no AdminController public function deletechef($id)
- //////////////////////////////////////////////////////////////////////////
29. Adicionar produtos ao carrinho
- na food.blade adicionar inputs de number e submit com value adicionar ao cesto
- colocar div dos items dentro de um form action="{{url('/addcard')}}"
- adicionar rota na web Route::post("/addcard", [HomeController::class, "addcard" ]);
- criar a função addcard() no HomeController
- para verificar se user está logado no momento do submit addcard if(Auth::id())
- cmd criar model php artisan make:model Card -m
- na pasta database, alterar o create_cards_table adicionar campos da tabela cards
- cmd php artisan migrate
- adicionar no form /{id} e tbm na rota web /{id}
- adicionar na função addcard o user_id, food_id e qtd
- adicionar o carrinho[0] na home.blade
- na função redirects adicionar $count=card::where('user_id',$user_id)->count(); para contar items e atualizar Carrinho[{{$count}}]
- colocar condição if para o caso de não haver login   @authCarrinho[{{$count}}]@endauth@guestCarrinho[0]@endguest
- //////////////////////////////////////////////////////////////////////////
30. Mostrar dados do carrinho na home.blade
- criar tag do link  href="{{url('/showcard',Auth::user()->id}}"
- criar rota na web Route::get("/showcard/{id}", [HomeController::class, "showcard" ]);
- criar function showcard() em HomeController com return view showcard
- criar a blade showcard.blade.php nas views
- adicionar o count na função showcard
- criar tabela com lista do carrinho em showcard.blade.php
- na função showcard em HomeController adicionar $data = card::where('user_id',$id)->join('food', 'cards.food_id', '=', 'food.id')->get();
- //////////////////////////////////////////////////////////////////////////
31. Remover items do carrinho
- Como existe um join das tabelas food e cards, preciso de adicionar um data2 na função do HomeController
    - $data2=card::select('*')->where('user_id','=', $id)->get();
- adicionar na tabela href="{{url('/remove',$data2->id)}}
- adicionar rota na web Route::get("/remove/{id}", [HomeController::class, "remove" ]);
- adicionar function remove() em HomeController
- //////////////////////////////////////////////////////////////////////////
32. Adicionar dados num form na blade showcard com a tabela do carrinho
- adicionar botão encomendar agora no showcard blade
- https://www.w3schools.com/jquery/jquery_get_started.asp para adicionar o jQuery
- adicionar id="order" no botão e id="apear" e criar botão id="close"
- adicionar as funções jQuery num script no fundo de showcard.blade
- //////////////////////////////////////////////////////////////////////////
33. Adicionar encomendas do carrinho a uma tabela nova Order
- cmd php artisan make:model Order -m
- em database/migrations em create_orders_table adicionar campos da tabela
- cmd php artisan migrate para criar a tabela na db
- adicionar form no showcard.blade action="{{url('orderconfirm')}}" method="POST" @csrf
- adicionar rota na web Route::post("/orderconfirm", [HomeController::class, "orderconfirm" ]);
- no HomeController criar a função orderconfirm(Request $request)
- em Models/Order.php adicionar protected $fillable igual ao que está em User mas atualizar os campos da BD
- //////////////////////////////////////////////////////////////////////////
34. Mostrar dados da tabela orders no painel Admin
- no painel navbar.blade na pasta admin criar o li Encomendas com o href {{url('/orders')}}
- criar rota na web Route::get("/orders", [AdminController::class, "orders" ]);
- criar função public function orders() em AdminController
- na pasta admin criar a blade orders.blade.php
- adicionar no AdminController use App\Models\Order; para usar o  $data
- //////////////////////////////////////////////////////////////////////////
35. Search na database
- criar um form em orders.balde.php form action="{{url('/search)}}" method="GET" @csrf
- criar rota na web Route::get("/search", [AdminController::class, "search" ]);
- em AdminController criar public function search(Request $request)
