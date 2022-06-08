<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 * @mixin Builder
 * @property mixed|string $name
 * @property mixed|string $code
 */
class Group extends Model
{
    use HasFactory;

    /**
     * Constant for teachers group
     */
    public const TEACHER = 1;

    /**
     * Constant for students group
     */
    public const STUDENT = 2;

    /**
     * Get users belong to this group
     *
     * @return HasMany
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

}
