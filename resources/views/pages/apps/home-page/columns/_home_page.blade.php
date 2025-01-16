<div class="d-flex align-items-center">
    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
        <a href="{{ route('home-page.show', $home_page) }}">
            @if ($home_page->main_image)
                <div class="symbol-label">
                    <img src="{{ $home_page->getConvertedImage() }}" class="w-100" />
                </div>
            @else
                <div
                    class="symbol-label fs-3 {{ app(\App\Actions\GetThemeType::class)->handle('bg-light-? text-?', $home_page->name) }}">
                    {{ substr($home_page->name, 0, 1) }}
                </div>
            @endif
        </a>
    </div>
    <!--end::Avatar-->

    <!--begin::project details-->
    <div class="d-flex flex-column">
        <a href="{{ route('home-page.show', $home_page) }}" class="text-gray-800 text-hover-primary mb-1">
            {{ $home_page->name }}
        </a>
    </div>
    <!--begin::project details-->
</div>
