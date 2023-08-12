<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\userPelanggan;

class Userpreorder extends Component
{
    public $dataUserList;
    
    public function render()
    {
       
        return view('livewire.userpreorder', [
            'userList' =>userPelanggan::select('*')->limit(10)->get()
    ]);
    }
}