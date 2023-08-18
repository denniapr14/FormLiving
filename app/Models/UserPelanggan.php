<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserPelanggan extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use \Illuminate\Auth\Authenticatable;
    protected $primaryKey = 'id_pelanggan';
    protected $guard = 'guest';
    protected $table = 'user_pelanggan';

    public function getAuthPassword()
    {
        return bcrypt($this->password_plgn);
    }

    public function getAllUserPelanggan10()
    {
        return UserPelanggan::select('*')->limit(10);
    }

    public function getAllUserPelangganFirst()
    {
        return UserPelanggan::select('*')->first();
    }

    public function getUserPelangganOrderBy($select, $order, $by)
    {
        return UserPelanggan::select($select)
        ->orderBy($order, $by)
        ->get();
    }
}
