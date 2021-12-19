# restaurante
- https://www.youtube.com/playlist?list=PLm8sgxwSZofcOCoxwggBQ8FwPSoQUI_So

1. ////////////////////////////////////////////////////////
- composer create-project laravel/laravel example-app
- cd example-app
- php artisan serve
- ////////////////////////////////////////////////////////
2. Mudar .env DB_DATABASE=restaurante
- ////////////////////////////////////////////////////////
3. Criar em resources/views home.blade.php e colar o conteudo de index.html
- ////////////////////////////////////////////////////////
3. cmd php artisan make:controller HomeController
- ////////////////////////////////////////////////////////
4. Em routes/web.php Route::get("/home", [HomeController::class, "index" ]);
- ////////////////////////////////////////////////////////
5. Em app/Http/Controllers/HomeController.php public 
    function index(){
            return view ("home");
        }
- ////////////////////////////////////////////////////////
6. CRIAR SISTEMA DE LOGIN E REGISTO (cmd)
    1. composer require laravel/jetstream
    2. php artisan jetstream:install livewire (Jetstream para implementação de login)
    3. npm install
    4. npm run dev
        1. database/migrations/**create_users_table.php adicionar $table->string('usertype')->default(0);
    5. php artisan migrate (depois de criada a db no phpmyadmin, este comando vai criar todas as tabelas e campos da DB)
    6. app/Providers/RouteServiceProvider.php public const HOME = '/home';