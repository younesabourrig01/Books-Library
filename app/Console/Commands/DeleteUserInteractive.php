<?php 
 
namespace App\Console\Commands; 
 
use Illuminate\Console\Command; 
use App\Models\User; 
 
class DeleteUserInteractive extends Command 
{ 
    protected $signature = 'users:delete'; 
    protected $description = 'Supprime un utilisateur de façon interactive'; 
 
    public function handle() 
    { 
        $users = User::pluck('name', 'id')->toArray(); 
        if (empty($users)) { 
            $this->warn('Aucun utilisateur à supprimer.'); 
            return; 
        } 
 
        $userId = $this->choice('Quel utilisateur souhaitez-vous supprimer ?', 
array_values($users), 0); 
 
        $selectedId = array_search($userId, $users); 
 
        if ($this->confirm("Supprimer {$userId} (ID: {$selectedId}) ?")) { 
            User::destroy($selectedId); 
            $this->info('Utilisateur supprimé !'); 
        } else { 
            $this->warn('Suppression annulée.'); 
        } 
    } 
} 