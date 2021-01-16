# For What:-

- For developing web app and api.

# Why :-

- Strong command line support
- large community
- Regular updates
- Fast simple

# Composer

- A dependency manager for PHP
- check cmd "composer"

# Create new project

- composer create-project --prefer-dist laravel/laravel [project_name]

# Run project

- php artisan serve

# create new controller

- php artisan make:controller User

# create new component

- php artisan make:component Header

# create new middleware

- php artisan make:middleware ageCheck

# create new model

- php artisan make:model User

# Flash Session

- Delete after refresh. Used in sending mail and get confrimation.

# Localization

- Localization feature of Laravel supports different language to be used in application. You need to store all the strings of different language in a file and these files are stored at resources/views directory.

# Migration

- Migrations are like version control for your database, allowing your team to define and share the application's database schema definition.

- Create schema :- php artisan make:migration create_test_table
- Migrate :- php artisan migrate
- Undo :- php artisan migrate:rollback
- Undo selected migrate :- php artisan migrate:rollback --step 3
- Reset :- php artisan migrate:reset
- Refresh :- php artisan migrate:refresh
- Migrate a file: - php artisan migrate --path=/database/migrate/filename

# Seeding

- Adding some dummy data to database throught laravel command line.
- create :- php artisan make:seeder MembersSeeder
- seed :- php artisan db:seed --class=MembersSeeder

# Accessor

- used in data before displaying the data.

# Mutator

- update data before saving in database.
