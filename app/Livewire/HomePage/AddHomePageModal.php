<?php

namespace App\Livewire\HomePage;

use Livewire\Component;
use App\Models\HomePage;
use Livewire\WithFileUploads;

class AddHomePageModal extends Component
{
    use WithFileUploads;

    public $name;
    public $tags = [];
    public $images = [];
    public $uploadedImages = [];
    public $socials = [
        'facebook' => '',
        'github' => '',
        'instagram' => '',
        'linkedin' => '',
        'whatsapp' => ''
    ];
    public $main_image;


    public $home_page_id;

    public $edit_mode;



    protected $rules = [
        'name' => 'required|string|max:255',
        'tags' => 'required',
        'uploadedImages.*' => 'image',
        'socials.facebook' => 'nullable|url',
        'socials.github' => 'nullable|url',
        'socials.instagram' => 'nullable|url',
        'socials.linkedin' => 'nullable|url',
        'socials.whatsapp' => 'nullable|url',
        'main_image' => 'required|image',
    ];

    protected $listeners = [
        'delete_home_page' => 'deleteHomePage',
    ];

    public function submit()
    {
        $this->validate();

        $mainImagePath = $this->main_image->store('main_images', 'public');

        $imagePaths = [];
        foreach ($this->uploadedImages as $image) {
            $imagePaths[] = $image->store('gallery_images', 'public');
        }

        HomePage::create([
            'name' => $this->name,
            'tags' => json_encode($this->tags), // تخزين tags كـ JSON
            'images' => json_encode($imagePaths), // تخزين مسارات الصور كـ JSON
            'socials' => json_encode($this->socials), // تخزين روابط السوشيال كـ JSON
            'main_image' => $mainImagePath,
        ]);

        $this->reset(['name', 'tags', 'uploadedImages', 'socials', 'main_image']);

        $this->dispatch('success', __('New HomePage created'));
    }

    public function deleteHomePage($id)
    {
        // Delete the HomePage record with the specified ID
        HomePage::destroy($id);

        // Emit a success event with a message
        $this->dispatch('success', 'Home Page successfully deleted');
    }


    public function render()
    {
        $tags = $this->tags;
        return view('livewire.home-page.add-home-page-modal', compact('tags'));
    }
}
