<div class="d-flex align-items-center">
    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
        <a href="{{ route('services.show', $service) }}">
            @if ($service->icon)
                <div class="symbol-label">
                    <i class="{{ $service->icon }}"></i>
                </div>
            @else
                <div
                    class="symbol-label fs-3 {{ app(\App\Actions\GetThemeType::class)->handle('bg-light-? text-?', $service->name) }}">
                    {{ substr($service->name, 0, 1) }}
                </div>
            @endif
        </a>
    </div>
    <!--end::Avatar-->

    <!--begin::service details-->
    <div class="d-flex flex-column">
        <a href="{{ route('services.show', $service) }}" class="text-gray-800 text-hover-primary mb-1">
            {{ $service->name }}
        </a>
    </div>
    <!--begin::service details-->
</div>
