<?php

namespace App\Livewire\Project;

use App\Models\Project;
use App\Models\Tag;
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
    public $image;
    public $saved_image;
    public $completion_date;
    public $tag_ids;


    public $edit_mode;

    protected function rules()
    {
        return [
            'name' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|boolean',
            'image' => $this->edit_mode ? 'nullable' : 'required', // الصورة غير مطلوبة في وضع التعديل
            'completion_date' => 'required|date',
            'tag_ids' => 'required|array',
        ];
    }

    protected $listeners = [
        'delete_project' => 'deleteProject',
        'update_project' => 'updateProject',
    ];

    public function render()
    {
        $tags = Tag::all();
        return view('livewire.project.add-project-modal', [
            'tags' => $tags,
        ]);
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
                'image' => 'nulllllll',
            ];

            $project = Project::find($this->project_id) ?? Project::create($data);


            if ($this->image) {
                $imaage = $project->addMedia($this->image)->toMediaCollection('image');
                $project->update(['image' => $imaage->id . '/' . $imaage->file_name]);
                $data['image'] = ($imaage->id . '/' . $imaage->file_name);
            } else {
                $data['image'] = $this->saved_image;
            }


            if ($this->edit_mode) {
                foreach ($data as $k => $v) {
                    $project->$k = $v;
                }
                $project->save();
            }

            $project->tags()->sync($this->tag_ids);

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
        $this->image = $project->image;
        $this->saved_image = $project->image;
        $this->name = $project->name;
        $this->description = $project->description;
        $this->status = (bool) $project->status;
        $this->completion_date = $project->completion_date;
        $this->tag_ids = $project->tags->pluck('id')->toArray();

        $this->dispatch('tagsUpdated', ['tags' => $this->tag_ids]);
    }


    public function deleteProject($id)
    {
        Project::destroy($id);
        $this->dispatch('success', 'Project successfully deleted');
    }
}
