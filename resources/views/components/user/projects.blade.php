@push('styles')
    <link rel="stylesheet" href="{{ asset('css/components/user/projects.css') }}">
@endpush

<div class="user-projects">
    <div class="user-projects-wrap">
        @if($create)
            <x-projects.new />
        @endif
        @foreach($projects as $project)
            <x-projects.preview :project="$project" />
        @endforeach
    </div>
</div>
