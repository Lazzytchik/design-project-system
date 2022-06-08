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
use JetBrains\PhpStorm\Pure;

/**
 * @mixin Builder
 * @property mixed $publish_date
 * @property mixed $user
 */
class Project extends Model
{
    use HasFactory;

    public const FILES_DIRECTORY = '/projects';
    public const PREVIEW_DIRECTORY = 'img/projects';

    protected $table = 'projects';

    protected $guarded = [
        'external_id',
    ];

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
     * Returns true if project is public.
     *
     * @return bool
     */
    public function isPublic(): bool
    {
        return $this->publish_date !== null;
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
        return $preview->storeAs($this->getPreviewDirectory(), $preview->getClientOriginalName(), ['disk' => 'public']);
    }

    /**
     * Deletes preview file and model.
     *
     * @return bool
     */
    protected function deletePreview(): bool
    {
        Storage::disk('public')->delete($this->getPreviewPath());
        $this->preview->delete();

        return true;
    }

    /**
     * Switches preview File.
     *
     * @param File $file
     * @param UploadedFile $uploadedFile
     * @return bool
     */
    public function switchPreview(File $file, UploadedFile $uploadedFile): bool
    {
        $preview = $this->preview;

        $this->preview_id = $file->id;
        $this->save();

        if ($preview !== null){
            $this->deletePreview();
        }

        $this->storePreview($uploadedFile);

        return true;
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
        return self::PREVIEW_DIRECTORY.'/'.$this->external_id;
    }

    /**
     * Returns path of the preview file.
     *
     * @return string
     */
    #[Pure] public function getPreviewPath(): string
    {
        return $this->getPreviewDirectory().'/'.$this->preview->original_name;
    }

    /**
     * Publishes project only
     *
     * @return void
     */
    public function publish(): void
    {
        $this->publish_date = now();
        $this->save();
    }

    /**
     * Delete project
     *
     * @return bool|null
     */
    public function delete(): ?bool
    {
        $result = parent::delete();

        $this->deletePreview();
        Storage::disk('public')->deleteDirectory($this->getPreviewDirectory());

        return $result;
    }
}
