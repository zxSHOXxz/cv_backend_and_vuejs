<x-default-layout>
    @section('title')
        Projects
    @endsection


    @section('breadcrumbs')
        {{ Breadcrumbs::render('project-management.projects.index') }}
    @endsection

    <div class="card d-flex flex-column">
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    {!! getIcon('magnifier', 'fs-3 position-absolute ms-5') !!}
                    <input type="text" data-kt-project-table-filter="search"
                        class="form-control form-control-solid w-250px ps-13" placeholder="Search project"
                        id="mySearchInput" />
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->

            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-project-table-toolbar="base">
                    <!--begin::Add project-->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_add_project">
                        {!! getIcon('plus', 'fs-2', '', 'i') !!}
                        Add Project
                    </button>
                    <!--end::Add project-->
                </div>
                <!--end::Toolbar-->

                <!--begin::Modal-->
                <livewire:project.add-project-modal></livewire:project.add-project-modal>
                <!--end::Modal-->
            </div>
            <!--end::Card toolbar-->

        </div>
        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body py-4 w-100">
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
                window.LaravelDataTables['projects-table'].search(this.value).draw();
            });
            document.addEventListener('livewire:init', function() {
                Livewire.on('success', function() {
                    $('#kt_modal_add_project').modal('hide');
                    window.LaravelDataTables['projects-table'].ajax.reload();
                });
            });
            $('#kt_modal_add_project').on('hidden.bs.modal', function() {
                Livewire.dispatch('new_project');
            });
        </script>
    @endpush

</x-default-layout>
