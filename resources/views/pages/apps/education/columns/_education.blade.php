<div class="d-flex align-items-center">
    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
        <a href="{{ route('educations.show', $education) }}">
            @if ($education->image)
                <div class="symbol-label">
                    <img src="{{ asset('storage/' . $education->image) }}" class="w-100" />
                </div>
            @else
                <div
                    class="symbol-label fs-3 {{ app(\App\Actions\GetThemeType::class)->handle('bg-light-? text-?', $education->name) }}">
                    {{ substr($education->name, 0, 1) }}
                </div>
            @endif
        </a>
    </div>
    <!--end::Avatar-->

    <!--begin::education details-->
    <div class="d-flex flex-column">
        <a href="{{ route('educations.show', $education) }}" class="text-gray-800 text-hover-primary mb-1">
            {{ $education->name }}
        </a>
    </div>
    <!--begin::education details-->
</div>
