<x-default-layout>

    @section('title')
        Projects - {{ $project->name }}
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('project-management.projects.show', $project) }}
    @endsection

    <!--begin::Layout-->
    <div class="d-flex row pt-5">
        <style>
            .project-image {
                padding: 35px;
                background-color: #ffffff;
                box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1), 0 3px 10px 0 rgba(0, 0, 0, 0.09);
                border-radius: 20px 0 20px 0;
                height: 70vh;

            }

            .project-image img {
                height: 100%;
                width: 100%;
                object-fit: cover;
                border-radius: 20px 0 20px 0;
                object-position: center -100px;
            }

            .treeview {
                padding: 20px;
                background-color: #ffffff;
                box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 3px 10px 0 rgba(0, 0, 0, 0.1);
                border-radius: 20px 0 20px 0;
                margin-top: 10px;
                font-size: 18px;
                font-weight: bold;
                width: 100%;
                text-transform: uppercase;
                color: #fff !important;
                transform: translateX(-50%);
            }

            .text {
                display: flex;
                flex-direction: column;
            }
        </style>
        <div class="project-image col-10">
            <img src="{{ $project->getConvertedImage() }}" alt="">
        </div>
        <div class="text col-2 pt-5 mt-4">
            <div class="treeview description me-4 bg-info bg-opacity-75">
                {{ $project->description }}
            </div>
            <div class="treeview status me-4  bg-success bg-opacity-75">
                {{ $project->status == '1' ? 'Active' : 'Inactive' }}
            </div>
            <div class="treeview name me-4  bg-warning bg-opacity-75">
                {{ $project->name }}
            </div>
            <div class="treeview completion_date  bg-danger bg-opacity-75">
                {{ $project->completion_date }}
            </div>
        </div>
    </div>
    <!--end::Layout-->
</x-default-layout>
