# restaurante
- https://www.youtube.com/playlist?list=PLm8sgxwSZofcOCoxwggBQ8FwPSoQUI_So

1. ////////////////////////////////////////////////////////
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
- ////////////////////////////////////////////////////////
6. CRIAR SISTEMA DE LOGIN E REGISTO (cmd)
    1. composer require laravel/jetstream
    2. php artisan jetstream:install livewire (Jetstream para implementação de login)
    3. npm install
    4. npm run dev
        1. database/migrations/**create_users_table.php adicionar $table->string('usertype')->default(0);
    5. php artisan migrate (depois de criada a db no phpmyadmin, este comando vai criar todas as tabelas e campos da DB)
    6. app/Providers/RouteServiceProvider.php public const HOME = '/';
    7. Em routes/web.php Route::get("/", [HomeController::class, "index" ]) e remover Route com return 'welcome';

- /////////////////////////////////////
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
- /////////////////////////////////////////////
18. Em admin, navbar.blade.php href="{{url('/foodmenu')}
19. Criar rota /foodmenu e função e AdminController  public function foodmenu(){return view("admin.foodmenu")};
20. Criar em resources/views/admin foodmenu.blade.php e criar o form de input de menu