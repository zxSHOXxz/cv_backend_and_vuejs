<x-default-layout>
    @section('title')
        Experiences
    @endsection


    @section('breadcrumbs')
        {{ Breadcrumbs::render('experience-management.experiences.index') }}
    @endsection

    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    {!! getIcon('magnifier', 'fs-3 position-absolute ms-5') !!}
                    <input type="text" data-kt-experience-table-filter="search"
                        class="form-control form-control-solid w-250px ps-13" placeholder="Search experience"
                        id="mySearchInput" />
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->

            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-experience-table-toolbar="base">
                    <!--begin::Add experience-->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_add_experience">
                        {!! getIcon('plus', 'fs-2', '', 'i') !!}
                        Add Experience
                    </button>
                    <!--end::Add experience-->
                </div>
                <!--end::Toolbar-->

                <!--begin::Modal-->
                <livewire:experience.add-experience-modal></livewire:experience.add-experience-modal>
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
                window.LaravelDataTables['experiences-table'].search(this.value).draw();
            });
            document.addEventListener('livewire:init', function() {
                Livewire.on('success', function() {
                    $('#kt_modal_add_experience').modal('hide');
                    window.LaravelDataTables['experiences-table'].ajax.reload();
                });
            });
            $('#kt_modal_add_experience').on('hidden.bs.modal', function() {
                Livewire.dispatch('new_experience');
            });
        </script>
    @endpush

</x-default-layout>
