<div class="d-flex align-items-center">
    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
        <a href="{{ route('personal-informations.show', $personal_information) }}">
            @if ($personal_information->image)
                <div class="symbol-label">
                    <img src="{{ asset('storage/' . $personal_information->image) }}" class="w-100" />
                </div>
            @else
                <div
                    class="symbol-label fs-3 {{ app(\App\Actions\GetThemeType::class)->handle('bg-light-? text-?', $personal_information->name) }}">
                    {{ substr($personal_information->name, 0, 1) }}
                </div>
            @endif
        </a>
    </div>
    <!--end::Avatar-->

    <!--begin::personal-information details-->
    <div class="d-flex flex-column">
        <a href="{{ route('personal-informations.show', $personal_information) }}"
            class="text-gray-800 text-hover-primary mb-1">
            {{ $personal_information->name }}
        </a>
    </div>
    <!--begin::personal-information details-->
</div>
