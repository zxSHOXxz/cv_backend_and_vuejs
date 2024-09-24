<?php

namespace App\Livewire\Project;

use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AddTagModal extends Component
{
    public $tag_id;
    public $title;

    public $edit_mode;

    protected $listeners = [
        'delete_tag' => 'deleteTag',
        'update_tag' => 'updateTag',
    ];


    protected $rules = [
        'title' => 'required',
    ];
    public function submit()
    {
        $this->validate();
        DB::transaction(function () {
            $data = [
                'title' => $this->title,
            ];

            $project = Tag::find($this->tag_id) ?? Tag::create($data);

            if ($this->edit_mode) {
                foreach ($data as $k => $v) {
                    $project->$k = $v;
                }
                $project->save();
            }
            if ($this->edit_mode) {
                // Emit a success event with a message
                $this->dispatch('success', __('Tag updated'));
            } else {
                $this->dispatch('success', __('New Tag created'));
            }
        });

        $this->reset();
    }


    public function updateTag($id)
    {
        $this->edit_mode = true;

        $tag = Tag::find($id);
        $this->tag_id = $tag->id;
        $this->title = $tag->title;
    }

    public function deleteTag($id)
    {
        // Delete the project record with the specified ID
        Tag::destroy($id);

        // Emit a success event with a message
        $this->dispatch('success', 'Tag successfully deleted');
    }

    public function render()
    {
        return view('livewire.project.add-tag-modal');
    }
}
