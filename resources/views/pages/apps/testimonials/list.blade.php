<x-default-layout>
    @section('title')
        Testimonials
    @endsection


    @section('breadcrumbs')
        {{ Breadcrumbs::render('testimonial-management.testimonials.index') }}
    @endsection

    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    {!! getIcon('magnifier', 'fs-3 position-absolute ms-5') !!}
                    <input type="text" data-kt-testimonial-table-filter="search"
                        class="form-control form-control-solid w-250px ps-13" placeholder="Search testimonial"
                        id="mySearchInput" />
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->

            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-testimonial-table-toolbar="base">
                    <!--begin::Add testimonial-->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_add_testimonial">
                        {!! getIcon('plus', 'fs-2', '', 'i') !!}
                        Add testimonial
                    </button>
                    <!--end::Add testimonial-->
                </div>
                <!--end::Toolbar-->

                <!--begin::Modal-->
                <livewire:testimonial.add-testimonial-modal></livewire:testimonial.add-testimonial-modal>
                <!--end::Modal-->
            </div>
            <!--end::Card toolbar-->

        </div>
        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body py-4">
            <!--begin::Table-->
            <div class="table-responsive">
                {{ $dataTable->table() }}
            </div>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>




    @push('scripts')
        {{ $dataTable->scripts() }}

        <script>
            document.getElementById('mySearchInput').addEventListener('keyup', function() {
                window.LaravelDataTables['testimonials-table'].search(this.value).draw();
            });
            document.addEventListener('livewire:init', function() {
                Livewire.on('success', function() {
                    $('#kt_modal_add_testimonial').modal('hide');
                    window.LaravelDataTables['testimonials-table'].ajax.reload();
                });
            });
            $('#kt_modal_add_testimonial').on('hidden.bs.modal', function() {
                Livewire.dispatch('new_testimonial');
            });
        </script>
    @endpush

</x-default-layout>
