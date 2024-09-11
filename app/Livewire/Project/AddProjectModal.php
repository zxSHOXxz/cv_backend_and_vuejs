<?php

namespace App\Livewire\Project;

use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddProjectModal extends Component
{
    use WithFileUploads;

    public $project_id;
    public $name;
    public $description;
    public $status;
    public $photo;
    public $completion_date;

    public $edit_mode;

    protected $rules = [
        'name' => 'required|string',
        'description' => 'required|string',
        'status' => 'required|boolean',
        'photo' => 'required',
        'completion_date' => 'required|date'
    ];

    protected $listeners = [
        'delete_project' => 'deleteProject',
        'update_project' => 'updateProject',
    ];

    public function render()
    {
        return view('livewire.project.add-project-modal');
    }

    public function submit()
    {
        $this->validate();
        DB::transaction(function () {
            $data = [
                'name' => $this->name,
                'description' => $this->description,
                'status' => $this->status,
                'completion_date' => $this->completion_date,
            ];

            if ($this->photo) {
                $data['image'] = $this->photo->store('projects', 'public');
            } else {
                $data['image'] = $this->saved_photo;
            }

            $project = Project::find($this->project_id) ?? Project::create($data);

            if ($this->edit_mode) {
                foreach ($data as $k => $v) {
                    $project->$k = $v;
                }
                $project->save();
            }
            if ($this->edit_mode) {
                // Emit a success event with a message
                $this->dispatch('success', __('Project updated'));
            } else {
                $this->dispatch('success', __('New Project created'));
            }
        });

        $this->reset();
    }


    public function updateProject($id)
    {
        $this->edit_mode = true;

        $project = Project::find($id);
        $this->project_id = $project->id;
        $this->photo = $project->photo;
        $this->name = $project->name;
        $this->description = $project->description;
        $this->status = $project->status;
        $this->completion_date = $project->completion_date;
    }


    public function deleteProject($id)
    {
        // Delete the project record with the specified ID
        Project::destroy($id);

        // Emit a success event with a message
        $this->dispatch('success', 'Project successfully deleted');
    }
}
