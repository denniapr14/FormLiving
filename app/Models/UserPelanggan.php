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
    public function firstUserPelangganWhereArr($select,$where)
    {
        return UserPelanggan::select($select)
        ->where($where)
        ->first();
    }


    public function getUserPelangganOrderBy($select, $order, $by)
    {
        return UserPelanggan::select($select)
        ->orderBy($order, $by)
        ->get();
    }
    public function getUserPelangganOrderByJoinUserAdmin($select, $order, $by)
    {
        return UserPelanggan::select($select)
        ->join('user_admin','user_pelanggan.id_user_admin','user_admin.id_user_admin')
        ->orderBy($order, $by)
        ->get();
    }
    function firstUserPelangganWhere($where, $eq, $value){
        return UserAdmin::where($where, $eq, $value)
        ->first();
    }
    function insertGetIDUserPelanggan($data) {
        return UserPelanggan::insertGetId($data);

    }
}