composer require laravel/ui;
php artisan ui bootstrap --auth;
npm install && npm run dev;
php artisan migrate;
php artisan make:migration customize_users_table;
php arisan migrate;
php artisan make:seeder AdministratorSeeder;
php artisan db:seed --class=AdministratorSeeder
php artisan make:controller UserController --resource
