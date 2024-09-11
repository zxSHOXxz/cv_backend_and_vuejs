<?php

namespace App\Livewire\Testimonial;

use App\Models\Testimonial;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddTestimonialModal extends Component
{
    use WithFileUploads;

    public $testimonial_id;
    public $name;
    public $title;
    public $text;
    public $photo;

    public $edit_mode;

    protected $rules = [
        'name' => 'required|string',
        'title' => 'required|string',
        'text' => 'required|string',
        'photo' => 'required|image',
    ];

    protected $listeners = [
        'delete_testimonial' => 'deleteTestimonial',
        'update_testimonial' => 'updateTestimonial',
    ];

    public function render()
    {
        return view('livewire.testimonial.add-testimonial-modal');
    }

    public function submit()
    {
        $this->validate();
        DB::transaction(function () {
            $data = [
                'name' => $this->name,
                'title' => $this->title,
                'text' => $this->text,
            ];

            if ($this->photo) {
                $data['image'] = $this->photo->store('testimonials', 'public');
            } else {
                $data['image'] = $this->saved_photo;
            }

            $testimonial = Testimonial::find($this->testimonial_id) ?? Testimonial::create($data);

            if ($this->edit_mode) {
                foreach ($data as $k => $v) {
                    $testimonial->$k = $v;
                }
                $testimonial->save();
            }
            if ($this->edit_mode) {
                // Emit a success event with a message
                $this->dispatch('success', __('Testimonials updated'));
            } else {
                $this->dispatch('success', __('New Testimonials created'));
            }
        });

        $this->reset();
    }

    public function updateTestimonial($id)
    {
        $this->edit_mode = true;

        $testimonial = Testimonial::find($id);
        $this->testimonial_id = $testimonial->id;
        $this->photo = $testimonial->photo;
        $this->name = $testimonial->name;
        $this->title = $testimonial->title;
        $this->text = $testimonial->text;
    }

    public function deleteTestimonial($id)
    {
        // Delete the Testimonials record with the specified ID
        Testimonial::destroy($id);

        // Emit a success event with a message
        $this->dispatch('success', 'Testimonials successfully deleted');
    }
}
