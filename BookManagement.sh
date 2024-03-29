composer require laravel/ui;
php artisan ui bootstrap --auth;
npm install && npm run dev;
php artisan migrate;
php artisan make:migration customize_users_table;
php arisan migrate;
php artisan make:seeder AdministratorSeeder;
php artisan db:seed --class=AdministratorSeeder
php artisan make:controller UserController --resource
php artisan storage:link
php artisan make:migration create_categories_table;
php artisan migrate
php artisan make:model Category;
php artisan make:controller CategoryController --resource;
php artisan make:migration create_books_table;
php artisan migrate;
php artisan make:migration create_book_category_table;
php artisan migrate;
php artisan make:model Book;
php artisan make:controller BookController --resource;
php artisan make:migration create_orders_table;
php artisan migrate;
php artisan make:migration create_book_order_table;
php artisan migrate;
php artisan make:model Order;
php artisan make:controller OrderController --resource;