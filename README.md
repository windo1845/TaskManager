1. Pertama instal project laravel, masuk ke cmd dan jalankan perintah berikut
composer create-project --prefer-dist laravel/laravel TaskManager

2. Setelah itu masuk ke dalam folder C:\Users\windo\TaskManager dan edit file .env, lalu ubah bagian DB_CONNECTION=mysql atau tambahkan bila tidak ada. Ubah sesuai dengan seperti contoh dibawah ini / bisa disamakan

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_10_crud
DB_USERNAME=root
DB_PASSWORD=

3. Setelah itu buat file Migrasi (untuk isi database di mysql), jalankan perintah berikut di dalam cmd
php artisan make:controller TaskController --resource


4. Lalu setelah file migrasi dibuat, kita harus menambahkan script untuk membuat databasenya, kita bisa pergi ke 
C:\Users\User\TaskManager\database\migrations\0001_01_01_000000_create_users_table

lalu kita tambahkan script dibawah ini diposisi sebagai berikut

public function up(): void
    {
.....

Schema::create('tasks', function (Blueprint $table) { 
		$table->bigIncrements('id');
		$table->string('title')->nullable();
		$table->longText('description')->nullable();
		$table->longText('status')->nullable();
		$table->timestamps();
		});


.....
}

5. Setelah itu jalankan perintah dibawah ini di cmd, untuk membuat database beserta tablenya
php artisan migrate

6. Langkah selanjutnya kita menambahkan route agar saat menjalankan project, aplikasi akan langsung masuk dan membuka ke file yang dituju. Salin semua script

<?php

///use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::resource('layouts', TaskController::class);

///Route::get('/', function () {
///    return view('app');
///})

;

7. Langkah selanjutnya, kita bisa menambahkan file Blade yang dibutuhkan untuk masuk kedalam project. Namun jika tidak ada, kita bisa mengabaikannya
file project bisa kita cari di C:\Users\windo\TaskManager\resources\views\

8. Setelah semua sudah selesai, kita bisa menjalankan project dengan menjalankan perintah berikut di cmd, dengan cara masuk ke folder laravel yang sudah dibuat dengan cara mengetikkan perintah berikut

cd <nama file>

9. Setelah itu jalankan perintah berikut untuk menjalankan project

php artisan serve