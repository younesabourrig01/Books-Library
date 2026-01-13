<?php 
namespace App\Console\Commands; 
use Illuminate\Console\Command; 
use App\Models\User; 
 
class ListUsers extends Command 
{ 
    protected $signature = 'users:list'; 
    protected $description = 'Affiche la liste de tous les utilisateurs'; 
 
    public function handle() 
    { 
        $users = User::all(); 
 
        if ($users->isEmpty()) { 
            $this->warn('Aucun utilisateur trouvé.'); 
            return; 
        } 
 
        $this->info('Liste des utilisateurs :'); 
        foreach ($users as $user) { 
            $this->line("ID: {$user->id} | Nom: {$user->name} | Email: {$user->email}"); 
        } 
    } 
} 