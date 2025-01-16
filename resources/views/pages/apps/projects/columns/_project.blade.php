<div class="d-flex align-items-center text-center justify-content-center">
    <div class="symbol symbol-circle symbol-50px text-center overflow-hidden me-3">
        <a href="{{ route('projects.show', $project) }}">
            @if ($project->image)
                <div class="symbol-label">
                    <img src="{{ $project->getConvertedImage() }}" class="w-100" />
                </div>
            @else
                <div
                    class="symbol-label fs-3 {{ app(\App\Actions\GetThemeType::class)->handle('bg-light-? text-?', $project->name) }}">
                    {{ substr($project->name, 0, 1) }}
                </div>
            @endif
        </a>
    </div>
    <!--end::Avatar-->

    <!--begin::project details-->
    <div class="d-flex flex-column">
        <a href="{{ route('projects.show', $project) }}" class="text-gray-800 text-hover-primary mb-1">
            {{ $project->name }}
        </a>
    </div>
    <!--begin::project details-->
</div>
