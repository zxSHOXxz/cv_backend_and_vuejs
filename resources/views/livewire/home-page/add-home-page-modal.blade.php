<div class="modal fade" id="kt_modal_add_home_page" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="fw-bold">Add Home Page</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body px-5 my-7">
                <form wire:submit.prevent="submit" enctype="multipart/form-data">
                    <!-- Name -->
                    <div class="mb-7">
                        <label class="form-label required">Name</label>
                        <input type="text" wire:model="name" name="name" class="form-control"
                            placeholder="Enter name" />
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Tags Input -->
                    <div class="mb-7" wire:ignore>
                        <label class="form-label required">Tags</label>
                        <div>
                            <input class="form-control" placeholder="Enter tags" id="tagify" type="text"
                                name="tags" />
                            <small class="form-text text-muted">Press Enter to add tag</small>
                        </div>

                        @error('tags')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Images Upload (Multiple) -->
                    <div class="mb-7">
                        <label class="form-label required">Images</label>
                        <input type="file" wire:model="uploadedImages" multiple class="form-control" />
                        @error('uploadedImages')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <!-- عرض الصور التي تم رفعها مؤقتًا -->
                        @if ($uploadedImages)
                            @if ($edit_mode == false)
                                <div class="mt-2">
                                    @foreach ($uploadedImages as $image)
                                        <img src="{{ $image->temporaryUrl() }}" alt="Preview" class="img-thumbnail"
                                            width="100" />
                                    @endforeach
                                </div>
                            @endif
                        @endif
                    </div>

                    <!-- Socials Input (Multiple Platforms) -->
                    <div class="mb-7">
                        <label class="form-label required">Social Links</label>

                        <!-- Facebook -->
                        <div class="mb-3">
                            <label class="form-label">Facebook</label>
                            <input type="url" wire:model="socials.facebook" class="form-control"
                                placeholder="Enter Facebook URL" />
                            @error('socials.facebook')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- GitHub -->
                        <div class="mb-3">
                            <label class="form-label">GitHub</label>
                            <input type="url" wire:model="socials.github" class="form-control"
                                placeholder="Enter GitHub URL" />
                            @error('socials.github')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Instagram -->
                        <div class="mb-3">
                            <label class="form-label">Instagram</label>
                            <input type="url" wire:model="socials.instagram" class="form-control"
                                placeholder="Enter Instagram URL" />
                            @error('socials.instagram')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- LinkedIn -->
                        <div class="mb-3">
                            <label class="form-label">LinkedIn</label>
                            <input type="url" wire:model="socials.linkedin" class="form-control"
                                placeholder="Enter LinkedIn URL" />
                            @error('socials.linkedin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- WhatsApp -->
                        <div class="mb-3">
                            <label class="form-label">WhatsApp</label>
                            <input type="url" wire:model="socials.WhatsApp" class="form-control"
                                placeholder="Enter WhatsApp URL" />
                            @error('socials.whatsapp')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Main Image (File Upload) -->
                    <div class="mb-7">
                        <label class="form-label required">Main Image</label>
                        <input type="file" wire:model="main_image" class="form-control" />
                        @error('main_image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        @if ($main_image && $edit_mode == false)
                            <div class="mt-2">
                                <img src="{{ $main_image->temporaryUrl() }}" alt="Main Image Preview"
                                    class="img-thumbnail" width="200" />
                            </div>
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label" wire:loading.remove>Submit</span>
                            <span class="indicator-progress" wire:loading wire:target="submit" id="submit-button-id">
                                Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('livewire:init', function() {
            var input = document.getElementById('tagify');
            var tagify = new Tagify(input);

            tagify.on('change', function() {
                var tags = tagify.value.map(tag => tag.value);
                @this.set('tags', tags);

            });
        });
    </script>
@endpush
