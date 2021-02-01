<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone',
        'email',
        'address',
        'socials'
    ];

    protected $casts = [
        'socials' => 'array'
    ];

    public function getSocialsTelegram()
    {
        return $this->socials['telegram'];
    }

    public function getSocialsFacebook()
    {
        return $this->socials['facebook'];
    }

    public function getSocialsInstagram()
    {
        return $this->socials['instagram'];
    }
}
