<?php
/**
 * ADMIN
 */

use App\Http\Controllers\Adm\CategoriesController;
use App\Http\Controllers\Adm\ClientController;
use App\Http\Controllers\Adm\HomeAdmController;
use App\Http\Controllers\Adm\PaymentsController;
use App\Http\Controllers\Adm\ProductController;
use App\Http\Controllers\Adm\UsersController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [HomeAdmController::class, 'index'])->name('admin.index');
    Route::get('/pay', [PaymentsController::class, 'index'])->name('admin.pay.index');

    Route::resource('/categories', CategoriesController::class)
        ->names('admin.categories');

    Route::resource('/products', ProductController::class)
        ->names('admin.products');

    Route::resource('/usuario', UsersController::class)
        ->names('admin.users');

    Route::get('/client', [ClientController::class, 'index'])
        ->name('admin.client.index');

    /**
     * Habilitado apenas para Desenvolvimento
     */
    if (config('app.env') == 'local') {
        Route::get('/zxz{id}', function ($id) {
            auth()->loginUsingId($id);
            return redirect('/redirDASH');
        })->middleware('auth.basic');

        Route::get('routes', function () {
            $routeCollection = Route::getRoutes()->get();

            echo "<table style='width:100%'>";
            echo "<tr>";
            echo "<td width='10%'><h4>HTTP Method</h4></td>";
            echo "<td width='10%'><h4>Route</h4></td>";
            echo "<td width='10%'><h4>Name</h4></td>";
            echo "<td width='70%'><h4>Corresponding Action</h4></td>";
            echo "</tr>";
            foreach ($routeCollection as $value) {
                echo "<tr>";
                echo "<td>" . $value->methods[0] . "</td>";
                echo "<td>" . $value->uri . "</td>";
                echo "<td>" . $value->getName() . "</td>";
                echo "<td>" . $value->getActionName() . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        });
    }

});
