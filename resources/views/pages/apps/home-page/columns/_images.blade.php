<div class="d-flex align-items-center">
    @php
        $php = json_decode($home_page->images);
    @endphp
    @foreach ($php as $image)
        <div style="width: 120px;" class="mx-2">
            <img src="{{ $image }}" class="w-100" />
        </div>
    @endforeach
</div>
