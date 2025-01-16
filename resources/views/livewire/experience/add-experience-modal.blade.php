<div class="modal fade" id="kt_modal_add_experience" tabindex="-1" aria-hidden="true" wire:ignore>
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_experience_header">
                <h2 class="fw-bold">Add experience</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
                    {!! getIcon('cross', 'fs-1') !!}
                </div>
            </div>
            <div class="modal-body px-5 my-7">
                <form id="kt_modal_add_experience_form" class="form" wire:submit="submit"
                    enctype="multipart/form-data">
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_experience_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_add_experience_header"
                        data-kt-scroll-wrappers="#kt_modal_add_experience_scroll" data-kt-scroll-offset="300px">

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="hidden" wire:model="experience_id" name="experience_id"
                                value="{{ $experience_id }}" />
                            <input type="text" wire:model="name" name="name"
                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Experience Name" />
                            <!--end::Input-->
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Place</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" wire:model="place" name="place"
                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Experience place" />
                            <!--end::Input-->
                            @error('place')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Text</label>
                            <!--end::Label-->
                            <input type="text" wire:model="text" name="text"
                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Experience Name" />
                            <!--end::Input-->
                            @error('text')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->




                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">From</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="date" wire:model="from" name="from"
                                class="form-control form-control-solid mb-3 mb-lg-0" />
                            <!--end::Input-->
                            @error('from')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">To</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="date" wire:model="to" name="to"
                                class="form-control form-control-solid mb-3 mb-lg-0" />
                            <!--end::Input-->
                            @error('to')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->


                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2"> Until now ? </label>
                            <!--end::Label-->

                            <!--begin::Input-->

                            <div class="form-check form-switch form-check-custom form-check-success form-check-solid">
                                <input class="form-check-input" type="checkbox" wire:model="until_now"
                                    id="kt_flexSwitchCustomDefault_1_1" />
                                <label class="form-check-label" for="kt_flexSwitchCustomDefault_1_1">
                                    Until now
                                </label>
                            </div>

                            <!--end::Input-->
                            @error('until_now')
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
                        <button type="submit" class="btn btn-primary" data-kt-experiences-modal-action="submit">
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
