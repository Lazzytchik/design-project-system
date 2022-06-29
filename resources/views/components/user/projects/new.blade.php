@pushonce('styles')
    <link rel="stylesheet" href="{{asset('css/lib/forms.css')}}">
@endpushonce

@push('styles')
    <link rel="stylesheet" href="{{asset('css/components/user/projects/new.css')}}">
@endpush

<div class="project-detail-new">
    <form class="project-new-form" enctype="multipart/form-data" method="POST"  action="">
        @csrf
        <div class="form-field name-field">
            <label class="name-field-label p" for="name">Название проекта</label>
            <input id="name" type="text" class="name-field-input text-input p" name="name" value="{{@old('name')}}">
            @error('name')
            <p>{{$message}}</p>
            @enderror
        </div>
        <div class="form-field code-field">
            <label class="code-field-label p" for="code">Ссылка на проект</label>
            <input id="code" type="text" class="code-field-input text-input p" name="code" value="{{@old('code')}}">
            @error('code')
            <p>{{$message}}</p>
            @enderror
        </div>
        <div class="form-field discipline-field">
            <label class="discipline-field-label p" for="discipline">Дисциплина</label>
            <select class="select-input p" name="discipline_id" id="discipline">
                @foreach($disciplines as $discipline)
                    <option
                        value="{{$discipline->id}}"
                        @if(old('$discipline_id') === $discipline->id)
                            selected
                        @endif
                    >
                        {{$discipline->name}}
                    </option>
                @endforeach
            </select>
            @error('discipline_id')
            <p>{{$message}}</p>
            @enderror
        </div>
        <div class="form-field theme-field">
            <label class="theme-field-label p" for="theme">Тема</label>
            <input id="theme" type="text" class="theme-field-input text-input p" name="theme" value="{{@old('theme')}}">
            @error('theme')
            <p>{{$message}}</p>
            @enderror
        </div>
        <div class="form-field files-field">
            <label class="files-field-label p" for="preview">Файл превью</label>
            <input id="preview" type="file" class="files-field-input p" name="preview" multiple value="{{@old('preview')}}">
            @error('preview')
            <p>{{$message}}</p>S
            @enderror
        </div>
        <div class="form-field files-field">
            <label class="files-field-label p" for="files">Файлы проекта</label>
            <input id="files" type="file" class="files-field-input p" name="files[]" multiple value="{{@old('files')}}">
            @error('files')
            <p>{{$message}}</p>
            @enderror
        </div>
        <input type="submit" class="project-new-submit" name="project_new_submit">
    </form>
</div>
