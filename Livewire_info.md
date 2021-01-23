# Livewire

- https://laravel-livewire.com/docs/2.x/quickstart

- Single page application with out writing java script code.
- Laravel Livewire is a library that makes it simple to build modern, reactive, dynamic interfaces using Laravel Blade as your templating language. This is a great stack to choose if you want to build an application that is dynamic and reactive but don't feel comfortable jumping into a full JavaScript framework like Vue.js.

- Installation :
  1.  Create new project :- laravel new [project_name]
  2.  Install livewire :- composer require livewire/livewire
- publish (optional)
  - php artisan livewire:publish

# Component

- It is a peice of code that can be reuse , independed and use component many time.
- eg :- header,sidebar,footer etc.
- Create component :- php artisan make:livewire counter
- Generate two file
  1. controller / class
  2. view

# Inline Component

- Used when the functionality is very limited or tiny.
  - php artisan make:livewire search --inline
  - Generates only a component/class file

# Same category component inside a folder

- It creates both view and controller inside a folder.
- php artisan make:livewire user.signin
- php artisan make:livewire user\\login
- php artisan make:livewire user/profile
  - user is a folder
  - singin,login.,profile are a controller/class

# Life cycle hook

- mount :- used when component loads to memory
- hydrate :- after component loads, and when sent a request (click,bind) and called hydrate before render.
- dehydrate :- after render it is called
- updating :-(global) while a property is update and then it is excuted
- updated :- (global)when property is updated, it is excuted
- update{property} :-
  - updating{num1}
  - updated{num2}
- updatingStudentName :- property inside property student and name
- updatedStudentName :-
