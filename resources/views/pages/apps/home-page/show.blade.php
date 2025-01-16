<x-default-layout>

    @section('title')
        Home Page
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('home-page-management.home-pages.show', $home_page) }}
    @endsection

    <livewire:home_page.show-home-page-modal></livewire:home_page.show-home-page-modal>


    <livewire:home_page.edit-home-page-modal></livewire:home_page.edit-home-page-modal>


    @push('scripts')
        <script>
            document
                .querySelectorAll('[data-kt-action="update_row"]')
                .forEach(function(element) {
                    element.addEventListener("click", function() {
                        Livewire.dispatch("update_home_page", [
                            this.getAttribute("data-kt-home_page-id"),
                        ]);
                    });
                });
        </script>
    @endpush

    <!--end::Layout-->
</x-default-layout>
