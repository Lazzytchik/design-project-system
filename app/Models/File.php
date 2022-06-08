<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'original_name',
        'mime_type',
        'size',
        'extension'
    ];

    /**
     * Relation for project preview
     *
     * @return HasOne
     */
    public function previewProject(): HasOne
    {
        return $this->hasOne(Project::class, 'preview_id', 'id');
    }

}
