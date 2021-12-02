<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CountryCode implements Rule
{

    public function passes($attribute, $value)
    {

        // TODO use countries code lib


        if(preg_match("/[a-zA-Z]{2}/", $value)) {
            return true;
        } else {
            return false;
        }
    }

    public function message()
    {
        return 'The :attribute must be the ISO 3166-1 country code';
    }
}
