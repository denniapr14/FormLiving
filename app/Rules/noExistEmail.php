<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\UserAdmin;

class noExistEmail implements Rule
{
    
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return UserAdmin::where('email_ua',$value)->count() == 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Email Tidak Ada Dalam Database. Bilamana belum terdaftar silahkan registrasi ulang.';
    }
}