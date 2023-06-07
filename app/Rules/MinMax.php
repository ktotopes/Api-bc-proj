<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;

class MinMax implements ValidationRule, DataAwareRule
{
    public array $data;

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($this->data['filter']['min_price'] > $this->data['filter']['max_price']) {
            $fail('The :attribute must be great then max value.');
        }
    }

    public function setData(array $data)
    {
        $this->data = $data;
        return $this;
    }
}
