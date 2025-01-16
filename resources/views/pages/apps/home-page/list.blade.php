<x-default-layout>
    @section('title')
        Home Page
    @endsection


    @section('breadcrumbs')
        {{ Breadcrumbs::render('home-page-management.home-page.index') }}
    @endsection

    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    {!! getIcon('magnifier', 'fs-3 position-absolute ms-5') !!}
                    <input type="text" data-kt-home_page-table-filter="search"
                        class="form-control form-control-solid w-250px ps-13" placeholder="Search home_page"
                        id="mySearchInput" />
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->

            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-home_page-table-toolbar="base">
                    <!--begin::Add home_page-->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_add_home_page">
                        {!! getIcon('plus', 'fs-2', '', 'i') !!}
                        Add Home Page
                    </button>
                    <!--end::Add home_page-->
                </div>
                <!--end::Toolbar-->

                <!--begin::Modal-->
                <livewire:home_page.add-home-page-modal></livewire:home_page.add-home-page-modal>
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
                window.LaravelDataTables['home_pages-table'].search(this.value).draw();
            });
            document.addEventListener('livewire:init', function() {
                Livewire.on('success', function() {
                    $('#kt_modal_add_home_page').modal('hide');
                    window.LaravelDataTables['home_pages-table'].ajax.reload();
                });
            });
            $('#kt_modal_add_home_page').on('hidden.bs.modal', function() {
                Livewire.dispatch('new_home_page');
            });
        </script>
    @endpush

</x-default-layout>
