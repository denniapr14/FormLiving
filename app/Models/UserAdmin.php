<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserAdmin extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use \Illuminate\Auth\Authenticatable;
    protected $primaryKey = "id_user_admin";
    protected $guard = 'admin';
    protected $table = 'user_admin';

    public function getAuthPassword()
    {
        return $this->password_ua;
    }
}