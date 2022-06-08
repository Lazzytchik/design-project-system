<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

/**
 * @mixin Builder
 */
class Project extends Model
{
    use HasFactory;

    public const FILES_DIRECTORY = '/projects';
    public const PREVIEW_DIRECTORY = 'img/projects';

    protected $table = 'projects';

    /**
     * Connects projects to the user
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Connects projects to a discipline.
     *
     * @return BelongsTo
     */
    public function discipline(): BelongsTo
    {
        return $this->belongsTo(Discipline::class);
    }

    /**
     * Relation of preview to the project.
     *
     * @return BelongsTo
     */
    public function preview(): BelongsTo
    {
        return $this->belongsTo(File::class, 'preview_id', 'id');
    }

    /**
     * Relation of project to files
     *
     * @return HasMany
     */
    public function files(): HasMany
    {
        return $this->hasMany(File::class);
    }

    /**
     * Returns true if user is author of the project.
     *
     * @param User $user
     *
     * @return bool
     */
    public function isAuthor(User $user): bool
    {
        return $this->user->id === $user->id;
    }


    /**
     * @param $files
     * @return void
     */
    public function storeFiles($files){
        // TODO a lot
        foreach ($files as $file){
            Storage::disk('local')->put($file,'Projects');
        }
    }

    /**
     * Stores preview in public folder.
     *
     * @param UploadedFile $preview
     *
     * @return false|string
     */
    public function storePreview(UploadedFile $preview): false|string
    {
        return $preview->storeAs($this->getPreviewDirectory(), $this->preview->original_name, ['disk' => 'public']);
    }

    public function getPreview(): string
    {
        return Storage::get($this->getPreviewPath());
    }

    /**
     * Returns the preview storing directory for the project.
     *
     * @return string
     */
    public function getPreviewDirectory(): string
    {
        return self::PREVIEW_DIRECTORY.'/'.$this->external_id.'/preview';
    }

    /**
     * Returns path of the preview file.
     *
     * @return string
     */
    public function getPreviewPath(): string
    {
        return $this->getPreviewDirectory().'/'.$this->preview->original_name;
    }

}
