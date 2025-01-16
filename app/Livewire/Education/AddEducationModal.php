<?php

namespace App\Models\Education;

use Illuminate\Support\Facades\DB;

namespace App\Livewire\Education;

use App\Models\Eductaion;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AddEducationModal extends Component
{
    public $education_id;

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
        'delete_education' => 'deleteEducation',
        'update_education' => 'updateEducation',
    ];

    public function render()
    {
        return view('livewire.education.add-education-modal');
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

            $education = Eductaion::find($this->education_id) ?? Eductaion::create($data);

            if ($this->edit_mode) {
                foreach ($data as $k => $v) {
                    $education->$k = $v;
                }
                $education->save();
            }
            if ($this->edit_mode) {
                // Emit a success event with a message
                $this->dispatch('success', __('Educations updated'));
            } else {
                $this->dispatch('success', __('New Educations created'));
            }
        });

        $this->reset();
    }

    public function updateEducation($id)
    {
        $this->edit_mode = true;

        $education = Eductaion::find($id);
        $this->education_id = $education->id;
        $this->name = $education->name;
        $this->place = $education->place;
        $this->text = $education->text;
        $this->from = $education->from;
        $this->to = $education->to;
        $this->until_now = $education->until_now;
    }

    public function deleteEducation($id)
    {
        // Delete the Educations record with the specified ID
        Eductaion::destroy($id);

        // Emit a success event with a message
        $this->dispatch('success', 'Educations successfully deleted');
    }
}
