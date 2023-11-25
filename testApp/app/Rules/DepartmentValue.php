<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use  App\Models\Department;

class DepartmentValue implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $departments = Department::all();
        $check = 0;

        foreach ($departments as $department)
        {
            if ($department->id == $value)
            {
                $check = 1;
                break;
            }
        }

        if($check == 0) {
            $fail('Kolom program studi tidak boleh kosong');
        }
    }
}
