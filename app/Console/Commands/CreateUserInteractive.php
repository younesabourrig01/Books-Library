<?php 
 
namespace App\Console\Commands; 
 
use Illuminate\Console\Command; 
use App\Models\User; 
use Illuminate\Support\Facades\Hash; 
 
class CreateUserInteractive extends Command 
{ 
    protected $signature = 'users:create'; 
    protected $description = 'Crée un nouvel utilisateur de façon interactive'; 
 
    public function handle() 
    { 
        $name = $this->ask('Nom de l\'utilisateur ?'); 
        $email = $this->ask('Email ?'); 
        $password = $this->secret('Mot de passe ?'); 
 
        $confirm = $this->confirm('Créer cet utilisateur ?', true); 
 
        if ($confirm) { 
            User::create([ 
                'name' => $name, 
                'email' => $email, 
                'password' => Hash::make($password), 
            ]); 
            $this->info('Utilisateur créé avec succès !'); 
        } else { 
            $this->warn('Création annulée.'); 
        } 
    } 
} 