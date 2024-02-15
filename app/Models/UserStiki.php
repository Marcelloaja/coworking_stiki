<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\RegistrationNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

// class UserStiki extends Model
// {
//     use HasFactory;

//     protected $fillable = [
//         'nrp', 
//         'nama', 
//         'email', 
//         'skill', 
//         // 'password', 
//         'qr_code', 
//         'user_id'
//     ];

//     public function sendRegistrationNotification($qrCode, $userId)
//     {
//         $this->notify(new RegistrationNotification($qrCode, $userId));
//     }
// }

class UserStiki extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nama', 
        'nrp', 
        'email', 
        'skill', 
        'qr_code', 
        'user_id'
    ];

    public function sendRegistrationNotification($qrCode, $userId)
    {
        $this->notify(new RegistrationNotification($qrCode, $userId));
    }
}
