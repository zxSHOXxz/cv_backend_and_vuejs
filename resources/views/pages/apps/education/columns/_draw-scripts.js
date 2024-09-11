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
                    Livewire.dispatch("delete_education", [
                        this.getAttribute("data-kt-education-id"),
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
            Livewire.dispatch("update_education", [
                this.getAttribute("data-kt-education-id"),
            ]);
        });
    });

// Listen for 'success' event emitted by Livewire
Livewire.on("success", (message) => {
    // Reload the educations-table datatable
    LaravelDataTables["educations-table"].ajax.reload();
});
