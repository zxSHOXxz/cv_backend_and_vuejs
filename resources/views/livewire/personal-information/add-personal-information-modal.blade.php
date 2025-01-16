<div class="modal fade" id="kt_modal_add_personal-information" tabindex="-1" aria-hidden="true" wire:ignore>
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_personal-information_header">
                <h2 class="fw-bold">Add Personal Information</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
                    {!! getIcon('cross', 'fs-1') !!}
                </div>
            </div>
            <div class="modal-body px-5 my-7">
                <form id="kt_modal_add_personal-information_form" class="form" wire:submit.prevent="submit"
                    enctype="multipart/form-data">
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_personal-information_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_add_personal-information_header"
                        data-kt-scroll-wrappers="#kt_modal_add_personal-information_scroll"
                        data-kt-scroll-offset="300px">

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Name</label>
                            <input type="text" wire:model="name" name="name"
                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter your name" />
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group: Age -->
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Age</label>
                            <input type="number" wire:model="age" name="age"
                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter your age" />
                            @error('age')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group: Residence -->
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Residence</label>
                            <input type="text" wire:model="residence" name="residence"
                                class="form-control form-control-solid mb-3 mb-lg-0"
                                placeholder="Enter your residence" />
                            @error('residence')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group: Address -->
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Address</label>
                            <input type="text" wire:model="address" name="address"
                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter your address" />
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group: Email -->
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Email</label>
                            <input type="email" wire:model="email" name="email"
                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter your email" />
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group: Phone -->
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Phone</label>
                            <input type="text" wire:model="phone" name="phone"
                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter your phone" />
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group: Job Title -->
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Job Title</label>
                            <input type="text" wire:model="job_title" name="job_title"
                                class="form-control form-control-solid mb-3 mb-lg-0"
                                placeholder="Enter your job title" />
                            @error('job_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group: About Me -->
                        <div class="fv-row mb-7">
                            <label class="fw-semibold fs-6 mb-2">About Me</label>
                            <textarea wire:model="about_me" name="about_me" class="form-control form-control-solid mb-3 mb-lg-0"
                                placeholder="Tell us about yourself"></textarea>
                            @error('about_me')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group: Signature -->
                        <div class="fv-row mb-7">
                            <label class="fw-semibold fs-6 mb-2">Signature</label>
                            <input type="text" wire:model="signture" name="signture"
                                class="form-control form-control-solid mb-3 mb-lg-0"
                                placeholder="Enter your signture" />
                            @error('signture')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group: Freelance -->
                        <div class="fv-row mb-7">
                            <label class="fw-semibold fs-6 mb-2">Freelance</label>
                            <div class="form-check form-switch form-check-custom form-check-success form-check-solid">
                                <input class="form-check-input" type="checkbox" wire:model="freelance"
                                    id="freelance_checkbox" />
                                <label class="form-check-label" for="freelance_checkbox">
                                    Available for Freelance?
                                </label>
                            </div>
                            @error('freelance')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group: Resume (File Upload) -->
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Resume</label>
                            <input type="file" wire:model="resume" name="resume"
                                class="form-control form-control-solid mb-3 mb-lg-0" />
                            @error('resume')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            @if ($resume)
                                <!-- Show uploaded file preview if exists -->
                                <div class="mt-2">
                                    <span>Uploaded File: {{ $resume }}</span>
                                </div>
                            @endif
                        </div>
                        <!--end::Input group-->

                    </div>
                    <!--end::Scroll-->

                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close"
                            wire:loading.attr="disabled">Discard</button>
                        <button type="submit" class="btn btn-primary"
                            data-kt-personal-informations-modal-action="submit">
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
