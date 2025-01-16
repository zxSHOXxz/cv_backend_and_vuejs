<x-default-layout>

    @section('title')
        Tistimonial - {{ $testimonial->name }}
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('testimonial-management.testimonials.show', $testimonial) }}
    @endsection

    <!--begin::Layout-->
    <div class="d-flex row pt-5">
        <style>
            .testimonial-image img {
                width: 350px;
            }
        </style>
        <div class="testimonial-image col-3">
            <img src="{{ $testimonial->getConvertedImage() }}" alt="">
        </div>
        <div class="text col-2 pt-5 mt-4">
            <h3 class="badge badge-info">
                {{ $testimonial->name }}
            </h3>
            <h3 class="badge badge-info">
                {{ $testimonial->title }}
            </h3>
            <h3 style="font-size: 15px !important" class="badge badge-primary">
                {{ $testimonial->text }}
            </h3>
        </div>
    </div>
    <!--end::Layout-->
</x-default-layout>
