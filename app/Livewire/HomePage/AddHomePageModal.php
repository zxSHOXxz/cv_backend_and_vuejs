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
    public $uploadedImages = []; // لتخزين ملفات الصور المرفوعة مؤقتًا
    public $socials = [
        'facebook' => '',
        'github' => '',
        'instagram' => '',
        'linkedin' => '',
        'youtube' => ''
    ];
    public $main_image;

    protected $rules = [
        'name' => 'required|string|max:255',
        'tags' => 'required|array|min:1', // تأكد من أن هناك على الأقل tag واحد
        'uploadedImages.*' => 'image|max:1024', // كل صورة لا تتجاوز 1 ميغابايت
        'socials.facebook' => 'nullable|url',
        'socials.github' => 'nullable|url',
        'socials.instagram' => 'nullable|url',
        'socials.linkedin' => 'nullable|url',
        'socials.youtube' => 'nullable|url',
        'main_image' => 'required|image|max:1024', // حجم الصورة الأقصى 1 ميغابايت
    ];

    public function submit()
    {
        $this->validate();

        // رفع الصورة الرئيسية
        $mainImagePath = $this->main_image->store('main_images', 'public');

        // رفع الصور المتعددة
        $imagePaths = [];
        foreach ($this->uploadedImages as $image) {
            $imagePaths[] = $image->store('gallery_images', 'public');
        }

        // حفظ البيانات في قاعدة البيانات
        HomePage::create([
            'name' => $this->name,
            'tags' => json_encode($this->tags), // تخزين tags كـ JSON
            'images' => json_encode($imagePaths), // تخزين مسارات الصور كـ JSON
            'socials' => json_encode($this->socials), // تخزين روابط السوشيال كـ JSON
            'main_image' => $mainImagePath,
        ]);

        // إعادة ضبط الحقول بعد الحفظ
        $this->reset(['name', 'tags', 'uploadedImages', 'socials', 'main_image']);

        session()->flash('success', 'Data added successfully');
    }

    public function removeTag($index)
    {
        unset($this->tags[$index]);
        $this->tags = array_values($this->tags); // لإعادة ترتيب المصفوفة بعد الحذف
    }

    public function render()
    {
        return view('livewire.home-page.add-home-page-modal');
    }
}
