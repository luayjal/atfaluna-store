<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class QuantityValidate implements Rule
{
    public $variant;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($variant)
    {
        $this->variant = $variant;
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
       $variant = $this->variant;

            if ($value <= $variant->quantity_variant) {
                return true;
            }
       

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'عفواً الكمية غير متوفرة';
    }
}
