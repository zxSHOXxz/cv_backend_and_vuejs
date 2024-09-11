// Initialize KTMenu
KTMenu.init();

// Add click event listener to delete buttons
document
    .querySelectorAll('[data-kt-action="delete_row"]')
    .forEach(function (element) {
        element.addEventListener("click", function () {
            Swal.fire({
                text: "Are you sure you want to remove?",
                icon: "warning",
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                customClass: {
                    confirmButton: "btn btn-danger",
                    cancelButton: "btn btn-secondary",
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch("delete_service", [
                        this.getAttribute("data-kt-service-id"),
                    ]);
                }
            });
        });
    });

// Add click event listener to update buttons
document
    .querySelectorAll('[data-kt-action="update_row"]')
    .forEach(function (element) {
        element.addEventListener("click", function () {
            Livewire.dispatch("update_service", [
                this.getAttribute("data-kt-service-id"),
            ]);
        });
    });

// Listen for 'success' event emitted by Livewire
Livewire.on("success", (message) => {
    // Reload the services-table datatable
    LaravelDataTables["services-table"].ajax.reload();
});
