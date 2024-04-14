-git init (pag mag create ng git)
-git status (to check if my changes)
-git add <name of file>
-git rm --cached <name of file>
-git commit
-git push -u origin master

##Create project##
-composer create-project --prefer-dist laravel/laravel your-project-name

##Create Controller##
-php artisan make:controller - Make Controller file

##Create model##
-php artisan make:model - Make a Model File

##Create Table##
-php artisan make:migration create_table_name
-php artisan make:migration products_table --table=lazada (create a table inside the Name of the database)
-php artisan make:migration add_payment_method_to_customers --table=customers (Add column on table)

##Migrate data##
-php artisan migrate - To Migrate File
-php artisan migrate:rollback(This will rollback the last database migration.)
-php artisan make:middleware MyMiddleware
-php artisan make:seeder MySeeder
-php artisan make:controller MyController --resource
-composer require --dev laravel/dusk
-php artisan dusk:install
-php artisan dusk

##Create API Crud##
php artisan make:controller NameController --resource --model=Name

##Create dummy user command##
php artisan migrate:refresh --seed

##Create factory user command##
php artisan make:factory ProductFactory
