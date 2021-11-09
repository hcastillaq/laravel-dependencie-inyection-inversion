# Laravel   Injection And Inversion Of Dependencies

## Description
A small example of how to inject and invert dependencies in laravel creating an application to save and delete notes. 

### ¿How install?
- git clone https://github.com/hcastillaq/laravel-dependency-inyeccion-inversion
- cd laravel-dependency-inyeccion-inversion
- composer update
- php artisan serve

### ¿How change repository implementation?
In file app/Providers/AppServiceProvider.php change and import NoteRepositoryInMemory::class by NoteRepositoryEloquent::class and import.