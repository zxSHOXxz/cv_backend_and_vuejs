<div class="d-flex align-items-center row row-cols-2" style="width: 320px">
    @foreach (json_decode($home_page->tags) as $tag)
        <div class="col">
            <span class="badge fs-7 m-1 {{ app(\App\Actions\GetThemeType::class)->handle('badge-light-?', $tag) }}">
                {{ $tag }}
            </span>
        </div>
    @endforeach
</div>
