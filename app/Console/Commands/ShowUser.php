<?php 
 
namespace App\Console\Commands; 
 
use Illuminate\Console\Command; 
use App\Models\User; 
 
class ShowUser extends Command 
{ 
    protected $signature = 'users:show {id} {--field=name : Champ à afficher 
(name ou email)}'; 
    protected $description = 'Affiche une information sur un utilisateur'; 
 
    public function handle() 
    { 
        $id = $this->argument('id'); 
        $field = $this->option('field'); 
 
        $user = User::find($id); 
 
        if (!$user) { 
            $this->error('Utilisateur non trouvé !'); 
            return; 
        } 
 
        $value = $user->{$field} ?? $user->name; 
        $this->info("{$field} de l'utilisateur ID {$id} : {$value}"); 
    } 
} 