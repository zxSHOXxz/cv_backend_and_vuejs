<?php

namespace App\Livewire\Skill;

use App\Models\Skill;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AddSkillModal extends Component
{

    public $skill_id;
    public $name;
    public $title;
    public $level;

    public $edit_mode;

    protected $rules = [
        'name' => 'required|string',
        'title' => 'required|string',
        'level' => 'required|numeric|between:0,100',
    ];

    protected $listeners = [
        'delete_skill' => 'deleteSkill',
        'update_skill' => 'updateSkill',
    ];

    public function render()
    {
        return view('livewire.skill.add-skill-modal');
    }

    public function submit()
    {
        $this->validate();
        DB::transaction(function () {
            $data = [
                'name' => $this->name,
                'title' => $this->title,
                'level' => $this->level,
            ];

            $skill = Skill::find($this->skill_id) ?? Skill::create($data);

            if ($this->edit_mode) {
                foreach ($data as $k => $v) {
                    $skill->$k = $v;
                }
                $skill->save();
            }
            if ($this->edit_mode) {
                // Emit a success event with a message
                $this->dispatch('success', __('Skills updated'));
            } else {
                $this->dispatch('success', __('New Skills created'));
            }
        });

        $this->reset();
    }

    public function updateSkill($id)
    {
        $this->edit_mode = true;

        $skill = Skill::find($id);
        $this->skill_id = $skill->id;
        $this->name = $skill->name;
        $this->title = $skill->title;
        $this->level = $skill->level;
    }

    public function deleteSkill($id)
    {
        // Delete the Skills record with the specified ID
        Skill::destroy($id);

        // Emit a success event with a message
        $this->dispatch('success', 'Skills successfully deleted');
    }
}
