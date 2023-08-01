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
        return bcrypt($this->password_ua);
    }

    function getUserKategoriWhere($where, $eq, $value){
        return Useradmin::join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
        ->where($where, $eq, $value)
        ->first();
    }

    function getUserAdminOrderbyWhere($select, $where, $eq, $value, $order, $by) {
        return UserAdmin::select($select)
        ->where($where,$eq,$value)
        ->orderBy($order,$by)
        ->get();
    }

    function getUserJoinCountWhere($where)  {
        return UserAdmin::join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
        ->select(UserAdmin::raw('COUNT(user_admin.id_user_admin) as userCount'))
        ->where(
           $where
        )
        ->first();
    }
    // function getUserJoinWithCompanyCount(){
    //     return UserAdmin::join('ktgr_admin', 'user_admin.id_kategori', '=', 'ktgr_admin.id_kategori')
    //     ->select(UserAdmin::raw('COUNT(user_admin.id_user_admin) as userCount'))
    //     ->where([
    //        $where
    //     ])
    //     ->first();
    // }

}
