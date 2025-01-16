<?php

namespace App\Livewire\Service;

use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AddServiceModal extends Component
{
    public $service_id;
    public $name;
    public $text;
    public $icon;

    public $edit_mode;

    protected $rules = [
        'name' => 'required|string',
        'text' => 'required|string',
        'icon' => 'required|string',
    ];

    protected $listeners = [
        'delete_service' => 'deleteService',
        'update_service' => 'updateService',
    ];

    public function render()
    {
        return view('livewire.service.add-service-modal');
    }

    public function submit()
    {
        $this->validate();
        DB::transaction(function () {
            $data = [
                'name' => $this->name,
                'text' => $this->text,
                'icon' => $this->icon,
            ];

            $service = Service::find($this->service_id) ?? Service::create($data);

            if ($this->edit_mode) {
                foreach ($data as $k => $v) {
                    $service->$k = $v;
                }
                $service->save();
            }
            if ($this->edit_mode) {
                // Emit a success event with a message
                $this->dispatch('success', __('Services updated'));
            } else {
                $this->dispatch('success', __('New Services created'));
            }
        });

        $this->reset();
    }

    public function updateService($id)
    {
        $this->edit_mode = true;

        $service = Service::find($id);
        $this->service_id = $service->id;
        $this->name = $service->name;
        $this->text = $service->text;
        $this->icon = $service->icon;
    }

    public function deleteService($id)
    {
        // Delete the Services record with the specified ID
        Service::destroy($id);

        // Emit a success event with a message
        $this->dispatch('success', 'Services successfully deleted');
    }
}
