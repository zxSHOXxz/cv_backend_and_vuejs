<div class="d-flex align-items-center">
    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
        <a href="{{ route('testimonials.show', $testimonial) }}">
            @if ($testimonial->image)
                <div class="symbol-label">
                    <img src="{{ $testimonial->getConvertedImage() }}" class="w-100" />
                </div>
            @else
                <div
                    class="symbol-label fs-3 {{ app(\App\Actions\GetThemeType::class)->handle('bg-light-? text-?', $testimonial->name) }}">
                    {{ substr($testimonial->name, 0, 1) }}
                </div>
            @endif
        </a>
    </div>
    <!--end::Avatar-->

    <!--begin::testimonial details-->
    <div class="d-flex flex-column">
        <a href="{{ route('testimonials.show', $testimonial) }}" class="text-gray-800 text-hover-primary mb-1">
            {{ $testimonial->name }}
        </a>
    </div>
    <!--begin::testimonial details-->
</div>
