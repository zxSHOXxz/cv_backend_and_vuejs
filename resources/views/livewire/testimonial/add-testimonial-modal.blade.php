<div class="modal fade" id="kt_modal_add_testimonial" tabindex="-1" aria-hidden="true" wire:ignore>
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_testimonial_header">
                <h2 class="fw-bold">Add testimonial</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
                    {!! getIcon('cross', 'fs-1') !!}
                </div>
            </div>
            <div class="modal-body px-5 my-7">
                <form id="kt_modal_add_testimonial_form" class="form" wire:submit="submit"
                    enctype="multipart/form-data">
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_testimonial_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_add_testimonial_header"
                        data-kt-scroll-wrappers="#kt_modal_add_testimonial_scroll" data-kt-scroll-offset="300px">
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">photo</label>
                            <input type="file" wire:model="photo" name="photo"
                                class="form-control form-control-solid mb-3 mb-lg-0" />


                            @if ($photo && $edit_mode == false)
                                <div class="mt-2">
                                    <img src="{{ $photo->temporaryUrl() }}" alt="Main Image Preview"
                                        class="img-thumbnail" width="200" />
                                </div>
                            @endif

                            <div class="uploading" wire:loading wire:target="image">
                                <span class="text-muted"> Uploading...
                                </span>
                            </div>
                            
                            @error('photo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="hidden" wire:model="testimonial_id" name="testimonial_id"
                                value="{{ $testimonial_id }}" />
                            <input type="text" wire:model="name" name="name"
                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="testimonial Name" />
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
                            <label class="required fw-semibold fs-6 mb-2">text</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" wire:model="text" name="text"
                                class="form-control form-control-solid mb-3 mb-lg-0"
                                placeholder="Lorem ipsum dolor sit amet." />
                            <!--end::Input-->
                            @error('text')
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
                        <button type="submit" class="btn btn-primary" data-kt-testimonials-modal-action="submit">
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
