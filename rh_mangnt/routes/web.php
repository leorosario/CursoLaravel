<?php

use App\Http\Controllers\ColaboratorsController;
use App\Http\Controllers\ConfirmAccountController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RhUserController;
use Illuminate\Support\Facades\Route;

Route::middleware("guest")->group(function(){
    // email confirmation and password
    Route::get("/confirm-account/{token}", [ConfirmAccountController::class, "confirmAccount"])->name("confirm-account");
    Route::post("/confirm-account", [ConfirmAccountController::class, "confirmAccountSubmit"])->name("confirm-account-submit");
});

Route::middleware("auth")->group(function(){
    Route::redirect("/", "home");
    Route::view("/home", "home")->name("home");

    // user profile page
    Route::get("/user/profile", [ProfileController::class, "index"])->name("user.profile");
    Route::post("/user/profile/update-password", [ProfileController::class, "updatePassword"])->name("user.profile.update-password");
    Route::post("/user/profile/update-user-data", [ProfileController::class, "updateUserData"])->name("user.profile.update-user-data");

    // department route
    Route::get("/departments", [DepartmentController::class, "index"])->name("departments");
    Route::get("/departments/new-department", [DepartmentController::class, "newDepartment"])->name("departments.new-department");
    Route::post("/departments/create-department", [DepartmentController::class, "createDepartment"])->name("departments.create-department");

    Route::get("/departments/edit-department/{id}", [DepartmentController::class, "editDepartment"])->name("departments.edit-department");
    Route::post("/departments/update-department", [DepartmentController::class, "updateDepartment"])->name("departments.update-department");

    Route::get("/departments/delete-department/{id}", [DepartmentController::class, "deleteDepartment"])->name("departments.delete-department");
    Route::get("/departments/delete-department-confirm/{id}", [DepartmentController::class, "deleteDepartmentConfirm"])->name("departments.delete-department-confirm");

    // rh colaborators routes
    Route::get("/rh-users", [RhUserController::class, "index"])->name("colaborators.rh-users");
    Route::get("/rh-users/new-colaborator", [RhUserController::class, "newColaborator"])->name("colaborators.rh.new-colaborator");
    Route::post("/rh-users/create-colaborator", [RhUserController::class, "createRhColaborator"])->name("colaborators.rh.create-colaborator");
    Route::get("/rh-users/edit-colaborator/{id}", [RhUserController::class, "editRhColaborator"])->name("colaborators.rh.edit-colaborator");
    Route::post("/rh-users/update-colaborator", [RhUserController::class, "updateRhColaborator"])->name("colaborators.rh.update-colaborator");
    Route::get("/rh-users/delete/{id}", [RhUserController::class, "deleteRhColaborator"])->name("colaborators.rh.delete-colaborator");
    Route::get("/rh-users/delete-confirm/{id}", [RhUserController::class, "deleteRhColaboratorConfirm"])->name("colaborators.rh.delete-confirm");

    // admin colaborators list
    Route::get("/colaborators", [ColaboratorsController::class, "index"])->name("colaborators.all-colaborators");
});
