<?php

use Illuminate\Support\Facades\Artisan; 
use App\Models\User; 
 
Artisan::command('users:count', function () { 
    $count = User::count(); 
    $this->info("Nombre total d'utilisateurs : {$count}"); 
})->purpose('Affiche le nombre total d\'utilisateurs'); 