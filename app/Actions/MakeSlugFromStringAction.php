<?php

namespace App\Actions;

use App\Traits\AsAction;
use Illuminate\Support\Str;

class MakeSlugFromStringAction
{
    use AsAction;

    /**
     * @param string $string
     * @return string
     */
    public function handle(string $string): string
    {
        return Str::slug(strtolower(trim($string)), '-');
    }
}
