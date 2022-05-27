@pushonce('styles')
    <link rel="stylesheet" href="{{ asset('css/components/projects/preview.css') }}">
@endpushonce


<div class="project-preview">
    <a class="project-preview-link" href="gallery/{{ $project->id }}">
        <div class="project-actions">
            <a class="project-preview-edit-link action-icon" title="Редактировать" href="/gallery/{{$project->id}}/edit"><img src="{{ asset('svg/Edit-project-white.svg') }}" alt="Редактировать"></a>
            <a class="project-preview-delete-link action-icon" title="Удалить" href="/gallery/{{$project->id}}/delete"><img src="{{ asset('svg/Delete-project-white.svg') }}" alt="Удалить"></a>
        </div>
        <div class="project-preview-bottom">
            <span class="project-title"> {{ $project->name }}</span>
        </div>
    </a>
</div>

