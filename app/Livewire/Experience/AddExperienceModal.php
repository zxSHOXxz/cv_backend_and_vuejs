<?php

namespace App\Livewire\Experience;

use App\Models\Experience;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AddExperienceModal extends Component
{
    public $experience_id;

    public $name;
    public $place;
    public $text;
    public $from;
    public $to;
    public $until_now;


    public $edit_mode;

    protected $rules = [
        'name' => 'required|string',
        'place' => 'required|string',
        'text' => 'required|string',
        'from' => 'required',
        'to' => 'nullable',
        'until_now' => 'required|boolean',
    ];

    protected $listeners = [
        'delete_experience' => 'deleteExperience',
        'update_experience' => 'updateExperience',
    ];

    public function render()
    {
        return view('livewire.experience.add-experience-modal');
    }

    public function submit()
    {
        $this->validate();
        DB::transaction(function () {
            $data = [
                'name' => $this->name,
                'place' => $this->place,
                'text' => $this->text,
                'from' => $this->from,
                'to' => $this->to,
                'until_now' => $this->until_now,
            ];

            $experience = Experience::find($this->experience_id) ?? Experience::create($data);

            if ($this->edit_mode) {
                foreach ($data as $k => $v) {
                    $experience->$k = $v;
                }
                $experience->save();
            }
            if ($this->edit_mode) {
                // Emit a success event with a message
                $this->dispatch('success', __('Experiences updated'));
            } else {
                $this->dispatch('success', __('New Experiences created'));
            }
        });

        $this->reset();
    }

    public function updateExperience($id)
    {
        $this->edit_mode = true;

        $experience = Experience::find($id);
        $this->experience_id = $experience->id;
        $this->name = $experience->name;
        $this->place = $experience->place;
        $this->text = $experience->text;
        $this->from = $experience->from;
        $this->to = $experience->to;
        $this->until_now = $experience->until_now;
    }

    public function deleteExperience($id)
    {
        // Delete the Experiences record with the specified ID
        Experience::destroy($id);

        // Emit a success event with a message
        $this->dispatch('success', 'Experiences successfully deleted');
    }
}
