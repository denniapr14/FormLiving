<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelangganNotif extends Model
{
    use HasFactory;

    protected $table = 'pelanggan_notif';
    protected $fillable = [
        'title_pelanggan_notif',
        'msg_notif',
        'tgl_notif',
        'status_notif', // Add this field
        'icon_pelanggan_notif'
    ];
}
