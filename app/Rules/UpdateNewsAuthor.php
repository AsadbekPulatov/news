<?php

namespace App\Rules;

use App\Models\News;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UpdateNewsAuthor implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $news = News::find($value);
        if ($news->author != auth()->id())
            $fail("The operation is not possible.");
    }
}
