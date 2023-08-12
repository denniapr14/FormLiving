<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserPelanggan extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use \Illuminate\Auth\Authenticatable;
    protected $primaryKey = "id_pelanggan";
    protected $guard = 'guest';
    protected $table = 'user_pelanggan';

    public function getAuthPassword()
    {
        return bcrypt($this->password_plgn);
    }

    public function getAllUserPelanggan(){
        return UserPelanggan::select('*')->limit(10);
    }
}