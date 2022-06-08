<div class="project-description">
    <h2 class="block-title h2">Описание</h2>
    <div class="project-field__static">
        <span class="project-discipline-label">Дисциплина</span>
        <span class="project-discipline-span">{{$project->discipline->name}}</span>
    </div>
    <div class="project-field__static">
        <span class="project-theme-label">Тема</span>
        <span class="project-theme-span">{{$project->theme}}</span>
    </div>
    <div class="project-field__static">
        <span class="project-author-label">Автор</span>
        <span class="project-author-span">{{$project->user->name}}</span>
    </div>
    <div class="project-field__static">
        <span class="project-publish-label">Дата публикации</span>
        <span class="project-publish-span">{{$project->publish_date}}</span>
    </div>
    <div class="project-field__static">
        <span class="project-preview-label">Путь до превью</span>
        <span class="project-preview-span">{{$project->getPreviewPath()}}</span>
    </div>
</div>
