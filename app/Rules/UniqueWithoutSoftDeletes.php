<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class UniqueWithoutSoftDeletes implements ValidationRule
{
    protected string $table;
    protected string $column;
    protected ?int $exceptId;

    /**
     * Create a new rule instance.
     *
     * @param string $table
     * @param string $column
     * @param int|null $exceptId
     */
    public function __construct(string $table, string $column, ?int $exceptId = null)
    {
        $this->table = $table;
        $this->column = $column;
        $this->exceptId = $exceptId;
    }

    /**
     * Run the validation rule.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $query = DB::table($this->table)
            ->where($this->column, $value)
            ->whereNull('deleted_at');

        if ($this->exceptId) {
            $query->where('id', '!=', $this->exceptId);
        }

        if ($query->exists()) {
            $fail(__('validation.unique', ['attribute' => $attribute]));
        }
    }
}
