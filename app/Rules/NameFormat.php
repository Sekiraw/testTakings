<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NameFormat implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
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
    // if after exploding the size is 3 -> format is fine, go on
    // if the format of it's elements are xx-xxx-xxxx return true
    public function passes($attribute, $value)
    {
        $split = explode('-', $value);
        if (sizeof($split) == 3) {
            if (strlen($split[0]) == 2 and strlen($split[1]) == 3 and strlen($split[2]) == 4) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Not a valid Test taker name.';
    }
}
