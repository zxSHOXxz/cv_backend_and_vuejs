<div>
    <style>
        .main-image {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 150px;
            position: absolute;
            bottom: -30px;
            left: 60px;
            z-index: 4;

        }

        .main-image img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #fff;
            z-index: 4;

        }

        .banner {
            position: relative;
            width: 100%;

        }

        .show-name {
            color: #fff;
            position: absolute;
            bottom: 7%;
            left: 230px;
            font-size: 20px;
            z-index: 4;

            font-weight: 900;
        }

        .tags {
            color: #fff;
            position: absolute;
            right: 0px;
            bottom: 50%;
            display: flex;
            flex-direction: column;
            transform: translateX(10%);
            z-index: 4;

        }

        .socials {
            color: #fff;
            position: absolute;
            left: 0px;
            bottom: 75%;
            display: flex;
            transform: translateX(25%);
            z-index: 4;

        }


        .button-edit {
            color: #fff;
            position: absolute;
            right: 25px;
            bottom: 25px;
            display: flex;
            z-index: 4;

        }


        .button-edit a {
            display: block;
            text-align: center;
            padding: 10px 35px !important;
            font-weight: bold;
            color: #fff;
            z-index: 4;

        }


        .tags span {
            font-size: 14px;
            font-weight: bold;
            padding: 5px;
            z-index: 4;
        }

        .carousel-item img {
            height: 100% !important;
            width: 100%;
            object-fit: cover;
            z-index: 2;
        }

        .carousel-item {
            height: 350px;
        }

        .carousel-item .overlay {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            width: 100%;
            height: 350px;
            background-color: rgba(75, 72, 72, 0.432);
            z-index: 3;
        }
    </style>

    <div class="container-fluied">
        <div id="kt_carousel_1_carousel" class="banner carousel carousel-custom slide" data-bs-ride="carousel"
            data-bs-interval="3000">
            <div class="carousel-inner pt-8">
                @foreach (json_decode($home_page->images) as $image)
                    <div class="carousel-item {{ $loop->first == true ? 'active' : '' }} ">
                        <img src="{{ $image }}" alt="">
                        <div class="overlay"></div>
                    </div>
                @endforeach
            </div>
            <div class="main-image img-container">
                <img src="{{ $home_page->main_image }}" alt="">
            </div>
            <div class="show-name">
                {{ $home_page->name }}
            </div>
            <div class="tags">
                @foreach (json_decode($home_page->tags) as $tag)
                    <span class="badge fs-7 m-1 {{ app(\App\Actions\GetThemeType::class)->handle('badge-?', $tag) }}">
                        {{ $tag }}
                    </span>
                @endforeach
            </div>
            <div class="socials">
                <div class="d-flex align-items-center">
                    @php
                        $php = json_decode($home_page->socials);
                    @endphp
                    @isset($php->facebook)
                        <a href="{{ $php->facebook ?? null }}" class="btn btn-icon btn-facebook me-5 "><i
                                class="fab fa-facebook-f fs-4"></i></a>
                    @endisset
                    @isset($php->instagram)
                        <a href="{{ $php->instagram ?? null }}" class="btn btn-icon btn-instagram me-5 "><i
                                class="fab fa-instagram fs-4"></i></a>
                    @endisset
                    @isset($php->whatsapp)
                        <a href="{{ $php->whatsapp ?? null }}" class="btn btn-icon btn-success me-5 "><i
                                class="fab fa-whatsapp fs-4"></i></a>
                    @endisset
                    @isset($php->linkedin)
                        <a href="{{ $php->linkedin ?? null }}" class="btn btn-icon btn-linkedin me-5 "><i
                                class="fab fa-linkedin fs-4"></i></a>
                    @endisset
                    @isset($php->youtube)
                        <a href="{{ $php->youtube ?? null }}" class="btn btn-icon btn-youtube me-5 "><i
                                class="fab fa-youtube fs-4"></i></a>
                    @endisset
                </div>
            </div>
            <div class="button-edit">
                <a href="#" class="btn bg-danger" data-kt-home_page-id="{{ $home_page->id }}"
                    data-bs-toggle="modal" data-bs-target="#kt_modal_edit_home_page" data-kt-action="update_row">
                    Edit
                </a>

            </div>
        </div>
    </div>

</div>
