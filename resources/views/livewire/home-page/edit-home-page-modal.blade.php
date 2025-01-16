<div class="modal fade" id="kt_modal_edit_home_page" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="fw-bold">Edit Home Page</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body px-5 my-7">
                <form wire:submit.prevent="submit" enctype="multipart/form-data">
                    <!-- Name -->
                    <div class="mb-7">
                        <label class="form-label required">Name</label>
                        <input type="text" wire:model="name" name="name" class="form-control"
                            placeholder="Enter name" />

                        <input class="form-control" hidden id="tagify_edited" name="tagify_edited"
                            wire:model="tagify_edited" type="text" />

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
                        <input type="file" wire:model="editedImages" multiple class="form-control" />
                        @error('editedImages')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <!-- عرض الصور التي تم رفعها مؤقتًا -->
                        @if ($uploadedImages && $editedImages == null)
                            <div class="mt-2">
                                @foreach (json_decode($uploadedImages) as $image)
                                    <img src="{{ $image }}" alt="Preview" class="img-thumbnail"
                                        width="100" />
                                @endforeach
                            </div>
                        @endif
                        @if ($editedImages)
                            <div class="mt-2">
                                @foreach ($editedImages as $image)
                                    <img src="{{ $image->temporaryUrl() }}" alt="Preview" class="img-thumbnail"
                                        width="100" />
                                @endforeach
                            </div>
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
                        <input type="file" wire:model="editedMainImage" class="form-control" />
                        @error('editedMainImage')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        @if ($main_image && $editedMainImage == null)
                            <div class="mt-2">
                                <img src="{{ $home_page->getConvertedImage() }}" alt="Preview" class="img-thumbnail"
                                    width="200" />
                            </div>
                        @endif


                        @if ($editedMainImage)
                            <div class="mt-2">
                                <img src="{{ $editedMainImage->temporaryUrl() }}" alt="Preview"
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
            var initialTags = @json($home_page->tags);
            var tagsArr = JSON.parse(initialTags);


            // تهيئة Tagify بالوسوم الابتدائية
            var tagify = new Tagify(input);

            // إضافة الوسوم الابتدائية
            tagify.addTags(tagsArr);

            // عند إضافة أو تعديل الوسوم، قم بإرسال القيم الجديدة إلى Livewire
            tagify.on('change', function() {
                var tags = tagify.value.map(tag => tag.value); // استخراج القيم من Tagify
                var tagify_edited = document.getElementById('tagify_edited');
                tagify_edited.value = tags;

                @this.set('tagify_edited', tags);

            });
        });
    </script>
@endpush
