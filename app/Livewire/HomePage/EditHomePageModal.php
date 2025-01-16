<?php

namespace App\Livewire\HomePage;

use App\Models\HomePage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditHomePageModal extends Component
{

    use WithFileUploads;

    public $name;
    public $tags = [];
    public $images = [];

    public $uploadedImages = [];

    public $editedImages = [];

    public $socials = [
        'facebook' => '',
        'github' => '',
        'instagram' => '',
        'linkedin' => '',
        'whatsapp' => ''
    ];

    public $main_image;
    public $tagify_edited;
    public $editedMainImage;

    public $home_page_id;
    public $edit_mode;

    protected $listeners = ['updateTagifyEdited'];

    public function updateTagifyEdited($tags)
    {
        $this->tagify_edited = json_encode($tags);
    }

    protected $rules = [
        'name' => 'required|string|max:255',
        // 'tags' => 'required',
        // 'uploadedImages.*' => 'image',
        // 'socials.facebook' => 'nullable|url',
        // 'socials.github' => 'nullable|url',
        // 'socials.instagram' => 'nullable|url',
        // 'socials.linkedin' => 'nullable|url',
        // 'socials.whatsapp' => 'nullable|url',
        // 'main_image' => 'required|image',
    ];

    public function submit()
    {
        if ($this->editedMainImage != null) {
            $this->main_image = $this->editedMainImage;
        }

        if ($this->editedImages != null) {
            $this->uploadedImages = $this->editedImages;
        }

        $this->validate();

        $home_page = HomePage::findOrFail($this->home_page_id);

        if ($this->editedMainImage != null) {
            $main_imagee =  $home_page->addMedia($this->editedMainImage)
                ->toMediaCollection('main_image');
            $mainImagePath = $main_imagee->getUrl('webp');
        } else {
            $mainImagePath = $this->main_image;
        }

        if ($this->editedImages != null) {
            $imagePaths = [];
            foreach ($this->editedImages as $image) {

                $media = $home_page->addMedia($image)
                    ->toMediaCollection('gallery_images');

                $imagePaths[] = $media->getUrl('webp');
            }

            $encoded_images = json_encode($imagePaths);
        } else {
            $imagePaths = $this->uploadedImages;
            $encoded_images = $imagePaths;
        }


        $home_page->update([
            'name' => $this->name,
            'tags' => json_encode($this->tagify_edited),
            'images' => $encoded_images,
            'socials' => json_encode($this->socials),
            'main_image' => $mainImagePath,
        ]);

        $this->reset(['name', 'tags', 'uploadedImages', 'socials', 'main_image', 'editedMainImage', 'editedImages']);

        $this->dispatch('success', __('HomePage updated'));
    }

    public function render()
    {

        $home_page = HomePage::all()->first();

        $this->home_page_id = $home_page->id;
        $this->name = $home_page->name;
        $this->uploadedImages = $home_page->images;
        $this->main_image = $home_page->main_image;
        $this->socials = json_decode($home_page->socials, true);
        $this->tags = json_decode($home_page->tags, true);

        $this->edit_mode = true;


        return view('livewire.home-page.edit-home-page-modal', compact('home_page'));
    }
}
