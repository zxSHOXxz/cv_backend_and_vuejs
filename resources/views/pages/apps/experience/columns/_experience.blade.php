<div class="d-flex align-items-center">
    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
        <a href="{{ route('experiences.show', $experience) }}">
            @if ($experience->image)
                <div class="symbol-label">
                    <img src="{{ asset('storage/' . $experience->image) }}" class="w-100" />
                </div>
            @else
                <div
                    class="symbol-label fs-3 {{ app(\App\Actions\GetThemeType::class)->handle('bg-light-? text-?', $experience->name) }}">
                    {{ substr($experience->name, 0, 1) }}
                </div>
            @endif
        </a>
    </div>
    <!--end::Avatar-->

    <!--begin::experience details-->
    <div class="d-flex flex-column">
        <a href="{{ route('experiences.show', $experience) }}" class="text-gray-800 text-hover-primary mb-1">
            {{ $experience->name }}
        </a>
    </div>
    <!--begin::experience details-->
</div>
