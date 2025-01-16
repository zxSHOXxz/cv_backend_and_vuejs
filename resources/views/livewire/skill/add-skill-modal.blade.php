<div class="modal fade" id="kt_modal_add_skill" tabindex="-1" aria-hidden="true" wire:ignore>
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_skill_header">
                <h2 class="fw-bold">Add skill</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
                    {!! getIcon('cross', 'fs-1') !!}
                </div>
            </div>
            <div class="modal-body px-5 my-7">
                <form id="kt_modal_add_skill_form" class="form" wire:submit="submit" enctype="multipart/form-data">
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_skill_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_add_skill_header"
                        data-kt-scroll-wrappers="#kt_modal_add_skill_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="hidden" wire:model="skill_id" name="skill_id" value="{{ $skill_id }}" />
                            <input type="text" wire:model="name" name="name"
                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="skill Name" />
                            <!--end::Input-->
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">title</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" wire:model="title" name="title"
                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Front-end" />
                            <!--end::Input-->
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Level</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="number" max="100" maxlength="100" wire:model="level" name="level"
                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Front-end" />
                            <!--end::Input-->
                            @error('level')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->

                    </div>
                    <!--end::Scroll-->

                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close"
                            wire:loading.attr="disabled">Discard</button>
                        <button type="submit" class="btn btn-primary" data-kt-skills-modal-action="submit">
                            <span class="indicator-label" wire:loading.remove>Submit</span>
                            <span class="indicator-progress" wire:loading wire:target="submit">
                                Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
