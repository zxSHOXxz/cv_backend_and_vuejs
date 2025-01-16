<div class="d-flex align-items-center">
    @php
        $php = json_decode($home_page->socials);
    @endphp
    @isset($php->facebook)
        <a href="{{ $php->facebook ?? null }}" class="btn btn-icon btn-light-facebook me-5 "><i
                class="fab fa-facebook-f fs-4"></i></a>
    @endisset
    @isset($php->instagram)
        <a href="{{ $php->instagram ?? null }}" class="btn btn-icon btn-light-instagram me-5 "><i
                class="fab fa-instagram fs-4"></i></a>
    @endisset
    @isset($php->whatsapp)
        <a href="{{ $php->whatsapp ?? null }}" class="btn btn-icon btn-light-success me-5 "><i
                class="fab fa-whatsapp fs-4"></i></a>
    @endisset
    @isset($php->linkedin)
        <a href="{{ $php->linkedin ?? null }}" class="btn btn-icon btn-light-linkedin me-5 "><i
                class="fab fa-linkedin fs-4"></i></a>
    @endisset
    @isset($php->youtube)
        <a href="{{ $php->youtube ?? null }}" class="btn btn-icon btn-light-youtube me-5 "><i
                class="fab fa-youtube fs-4"></i></a>
    @endisset
</div>
