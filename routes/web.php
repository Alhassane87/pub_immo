<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Page d'accueil
Route::get('/', function () {
    return view('welcome');
});

// Tableau de bord principal accessible après connexion
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Routes de profil pour tous les utilisateurs connectés
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes pour l'admin avec middleware 'auth' et 'isAdmin'
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    
    // Gestion des utilisateurs par l'admin
    Route::get('/admin/users', [AdminController::class, 'manageUsers'])->name('admin.users.index');
    Route::get('/admin/users/create', [AdminController::class, 'createUser'])->name('admin.users.create');
    Route::post('/admin/users', [AdminController::class, 'storeUser'])->name('admin.users.store');
    Route::get('/admin/users/{user}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');
    
    // Gestion des annonces par l'admin
    Route::get('/admin/annonces', [AdminController::class, 'manageAnnonces'])->name('admin.annonces.index');
    Route::get('/admin/annonces/create', [AdminController::class, 'createAnnonce'])->name('admin.annonces.create');
    Route::post('/admin/annonces', [AdminController::class, 'storeAnnonce'])->name('admin.annonces.store');
    Route::get('/admin/annonces/{annonce}/edit', [AdminController::class, 'editAnnonce'])->name('admin.annonces.edit');
    Route::put('/admin/annonces/{annonce}', [AdminController::class, 'updateAnnonce'])->name('admin.annonces.update');
    Route::delete('/admin/annonces/{annonce}', [AdminController::class, 'destroyAnnonce'])->name('admin.annonces.destroy');
});

// Routes pour les agents avec middleware 'auth' et 'isAgent'
Route::middleware(['auth', 'isAgent'])->group(function () {
    Route::get('/agent', [AgentController::class, 'index'])->name('agent.dashboard');

    // Gestion des annonces par l'agent
    Route::get('/agent/annonces', [AgentController::class, 'manageAnnonces'])->name('agent.annonces.index');
    Route::get('/agent/annonces/create', [AgentController::class, 'createAnnonce'])->name('agent.annonces.create');
    Route::post('/agent/annonces', [AgentController::class, 'storeAnnonce'])->name('agent.annonces.store');
    Route::get('/agent/annonces/{annonce}/edit', [AgentController::class, 'editAnnonce'])->name('agent.annonces.edit');
    Route::put('/agent/annonces/{annonce}', [AgentController::class, 'updateAnnonce'])->name('agent.annonces.update');
    Route::delete('/agent/annonces/{annonce}', [AgentController::class, 'destroyAnnonce'])->name('agent.annonces.destroy');
});

// Routes pour les clients avec middleware 'auth' et 'isClient'
Route::middleware(['auth', 'isClient'])->group(function () {
    Route::get('/client', [ClientController::class, 'index'])->name('client.dashboard');

    // Visualisation des annonces par le client
    Route::get('/client/annonces', [ClientController::class, 'showAnnonces'])->name('client.annonces.index');
    Route::post('/client/annonces/{annonce}/demander', [ClientController::class, 'demanderAnnonce'])->name('client.annonces.demander');
});

// Authentification et autres routes par défaut
require __DIR__.'/auth.php';
