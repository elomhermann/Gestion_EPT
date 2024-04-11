<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProprieteController;
use App\Http\Controllers\LocataireController;
use App\Http\Controllers\LoyerController;
use App\Http\Controllers\ContratController;
use App\Http\Controllers\ParoisseController;
use App\Http\Controllers\TerrainController;
use App\Http\Controllers\TempleController;
use App\Http\Controllers\MaisonController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\SalaireController;
use App\Http\Controllers\EtatController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/commande', [HomeController::class, 'commande']);

Route::get('/contacts', [HomeController::class, 'contacts']);

Route::get('/produits', [HomeController::class, 'produits']);

Route::get('/propos', [HomeController::class, 'propos']);

Route::get('/welcome', [HomeController::class, 'welcome']);


Route::get('/propriete', [HomeController::class, 'propriete']);

Route::get('/locataire', [HomeController::class, 'locataire']);

Route::get('/loyer', [HomeController::class, 'loyer']);

Route::get('/contrat', [HomeController::class, 'contrat']);

Route::get('/paroisse', [HomeController::class, 'paroisse']);

Route::get('/terrain', [HomeController::class, 'terrain']);

Route::get('/temple', [HomeController::class, 'temple']);

Route::get('/maison', [HomeController::class, 'maison']);

Route::get('/budget', [HomeController::class, 'budget']);

Route::get('/salaire', [HomeController::class, 'salaire']);

Route::get('/etat', [HomeController::class, 'etat']);


Route::get('/searchbudget', [BudgetController::class, 'searchbudget']);

Route::get('/searchcontrat', [ContratController::class, 'searchcontrat']);

Route::get('/searchlocataire', [LocataireController::class, 'searchlocataire']);

Route::get('/searchloyer', [LoyerController::class, 'searchloyer']);

Route::get('/searchmaison', [MaisonController::class, 'searchmaison']);

Route::get('/searchparoisse', [ParoisseController::class, 'searchparoisse']);

Route::get('/searchpropriete', [ProprieteController::class, 'searchpropriete']);

Route::get('/searchsalaire', [SalaireController::class, 'searchsalaire']);

Route::get('/searchtemple', [TempleController::class, 'searchtemple']);

Route::get('/searchterrain', [TerrainController::class, 'searchterrain']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::resource('propriete', ProprieteController::class);

Route::resource('locataire', LocataireController::class);

Route::resource('loyer', LoyerController::class);

Route::resource('contrat', ContratController::class);

Route::resource('paroisse', ParoisseController::class);

Route::resource('terrain', TerrainController::class);

Route::resource('temple', TempleController::class);

Route::resource('maison', MaisonController::class);

Route::resource('budget', BudgetController::class);

Route::resource('salaire', SalaireController::class);

Route::resource('etat', EtatController::class);


Route::get('/export-budget', [BudgetController::class,'exportBudget'])->name('export-budget');

Route::get('/export-contrat', [ContratController::class,'exportContrat'])->name('export-contrat');

Route::get('/export-locataire', [LocataireController::class,'exportLocataire'])->name('export-locataire');

Route::get('/export-loyer', [LoyerController::class,'exportLoyer'])->name('export-loyer');

Route::get('/export-maison', [MaisonController::class,'exportMaison'])->name('export-maison');

Route::get('/export-paroisse', [ParoisseController::class,'exportParoisse'])->name('export-paroisse');

Route::get('/export-propriete', [ProprieteController::class,'exportPropriete'])->name('export-propriete');

Route::get('/export-salaire', [SalaireController::class,'exportSalaire'])->name('export-salaire');

Route::get('/export-temple', [TempleController::class,'exportTemple'])->name('export-temple');

Route::get('/export-terrain', [TerrainController::class,'exportTerrain'])->name('export-terrain');




Route::post('/upload-pdf', [ContratController::class, 'uploadPdf'])->name('upload.pdf');
