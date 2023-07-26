<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
    Route::get('/books/pdf/{book}',[BookController::class,'pdf']);
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/books/pdf/{book}',[BookController::class,'pdf']);
    Route::get('/books/email/{book}', [BookController::class, 'email']);

    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/admin/email', [AdminController::class, 'sendEmailToAllBooks'])->name('admin.bulk-mail');
    // Book Endpoint
    Route::group(
        [
            "prefix" => "books",
            "as" => "books.",
        ],
        function () {
            Route::get('/books/pdf/{book}',[BookController::class,'pdf']);
            Route::get("/", [BookController::class, "index"])->name("index");
            Route::get("trashed", [BookController::class, "trashed"])->name(
                "trashed"
            );
            Route::get("create", [BookController::class, "create"])->name(
                "create"
            );
            Route::post("store", [BookController::class, "store"])->name(
                "store"
            );
            Route::get("{id}/edit", [BookController::class, "edit"])->name(
                "edit"
            );
            Route::put("{id}/update", [BookController::class, "update"])->name(
                "update"
            );
            Route::get("{id}/destroy", [BookController::class, "destroy"])->name("destroy"
            );
            Route::get("{id}/destroy-permanent", [
                BookController::class,
                "destroy_permanent",
            ])->name("destroy_permanent");
            Route::get("{id}/restore", [
                BookController::class,
                "restore",
            ])->name("restore");
            Route::get('/books/pdf/{book}',[BookController::class,'pdf']);

        }
    );


            // Libraries Endpoint
            Route::group(
                [
                    "prefix" => "libraries",
                    "as" => "libraries.",
                ],
                function () {
                    Route::get('/books/pdf/{book}',[BookController::class,'pdf']);
                    Route::get("/", [
                        LibraryController::class,
                        "index",
                    ])->name("index");
                    Route::get("trashed", [
                        LibraryController::class,
                        "trashed",
                    ])->name("trashed");
                    Route::get("create", [
                        LibraryController::class,
                        "create",
                    ])->name("create");
                    Route::post("store", [
                        LibraryController::class,
                        "store",
                    ])->name("store");
                    Route::get("{id}/edit", [
                        LibraryController::class,
                        "edit",
                    ])->name("edit");
                    Route::put("{id}/update", [
                        LibraryController::class,
                        "update",
                    ])->name("update");
                    Route::get("{id}/destroy", [
                        LibraryController::class,
                        "destroy",
                    ])->name("destroy");
                    Route::get("{id}/destroy-permanent", [
                        LibraryController::class,
                        "destroy_permanent",
                    ])->name("destroy_permanent");
                    Route::get("{id}/restore", [
                        LibraryController::class,
                        "restore",
                    ])->name("restore");
                    Route::get('/books/{book}/pdf', [BookController::class, 'pdf'])->name('books.pdf');
                }
            );

            // Publishers Endpoint
            Route::group(
                [
                    "prefix" => "publishers",
                    "as" => "publishers.",
                ],
                function () {
                    Route::get('/books/pdf/{book}',[BookController::class,'pdf']);
                    Route::get("/", [
                        PublisherController::class,
                        "index",
                    ])->name("index");
                    Route::get("trashed", [
                        PublisherController::class,
                        "trashed",
                    ])->name("trashed");
                    Route::get("create", [
                        PublisherController::class,
                        "create",
                    ])->name("create");
                    Route::post("store", [
                        PublisherController::class,
                        "store",
                    ])->name("store");
                    Route::get("{id}/edit", [
                        PublisherController::class,
                        "edit",
                    ])->name("edit");
                    Route::put("{id}/update", [
                        PublisherController::class,
                        "update",
                    ])->name("update");
                    Route::get("{id}/destroy", [
                        PublisherController::class,
                        "destroy",
                    ])->name("destroy");
                    Route::get("{id}/destroy-permanent", [
                        PublisherController::class,
                        "destroy_permanent",
                    ])->name("destroy_permanent");
                    Route::get("{id}/restore", [
                        PublisherController::class,
                        "restore",
                    ])->name("restore");
                    Route::get('/books/pdf/{book}',[BookController::class,'pdf']);
                }
            );

            // Categories Endpoint
            Route::group(
                [
                    "prefix" => "categories",
                    "as" => "categories.",
                ],
                function () {
                    Route::get("/", [
                        CategoryController::class,
                        "index",
                    ])->name("index");
                    Route::get("trashed", [
                        CategoryController::class,
                        "trashed",
                    ])->name("trashed");
                    Route::get("create", [
                        CategoryController::class,
                        "create",
                    ])->name("create");
                    Route::post("store", [
                        CategoryController::class,
                        "store",
                    ])->name("store");
                    Route::get("{id}/edit", [
                        CategoryController::class,
                        "edit",
                    ])->name("edit");
                    Route::put("{id}/update", [
                        CategoryController::class,
                        "update",
                    ])->name("update");
                    Route::get("{id}/destroy", [
                        CategoryController::class,
                        "destroy",
                    ])->name("destroy");
                    Route::get("{id}/destroy-permanent", [
                        CategoryController::class,
                        "destroy_permanent",
                    ])->name("destroy_permanent");
                    Route::get("{id}/restore", [
                        CategoryController::class,
                        "restore",
                    ])->name("restore");

                    Route::get('/books/pdf/{book}',[BookController::class,'pdf']);
                }

            );

});
