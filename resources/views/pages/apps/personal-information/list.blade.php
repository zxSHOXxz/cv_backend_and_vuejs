<x-default-layout>
    @section('title')
        Personal Informations
    @endsection


    @section('breadcrumbs')
        {{ Breadcrumbs::render('personal-information-management.personal-information.index') }}
    @endsection


    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    {!! getIcon('magnifier', 'fs-3 position-absolute ms-5') !!}
                    <input type="text" data-kt-personal-information-table-filter="search"
                        class="form-control form-control-solid w-250px ps-13" placeholder="Search personal-information"
                        id="mySearchInput" />
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->

            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-personal-information-table-toolbar="base">
                    <!--begin::Add personal-information-->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_add_personal-information">
                        {!! getIcon('plus', 'fs-2', '', 'i') !!}
                        Add Personal Information
                    </button>
                    <!--end::Add personal-information-->
                </div>
                <!--end::Toolbar-->

                <!--begin::Modal-->
                <livewire:personal-information.add-personal-information-modal></livewire:personal-information.add-personal-information-modal>


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
                window.LaravelDataTables['personal-informations-table'].search(this.value).draw();
            });
            document.addEventListener('livewire:init', function() {
                Livewire.on('success', function() {
                    $('#kt_modal_add_personal-information').modal('hide');
                    window.LaravelDataTables['personal-informations-table'].ajax.reload();
                });
            });
            $('#kt_modal_add_personal-information').on('hidden.bs.modal', function() {
                Livewire.dispatch('new_personal-information');
            });
        </script>
    @endpush

</x-default-layout>
