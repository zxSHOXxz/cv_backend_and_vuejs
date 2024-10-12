<?php

namespace App\Livewire\PersonalInformation;

use App\Models\PersonalInformation;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddPersonalInformationModal extends Component
{
    use WithFileUploads; // Required for file uploads

    public $personal_information_id;

    // New fields from the database migration
    public $name;
    public $age;
    public $residence;
    public $address;
    public $email;
    public $phone;
    public $resume; // Now a file
    public $job_title;
    public $about_me;
    public $signture;
    public $freelance;

    public $edit_mode;

    protected $rules = [
        'name' => 'required|string',
        'age' => 'required|integer',
        'residence' => 'required|string',
        'address' => 'required|string',
        'email' => 'required|email',
        'phone' => 'required|string',
        'resume' => 'nullable|file|mimes:pdf,doc,docx|max:2048', // Updated rule for resume file
        'job_title' => 'required|string',
        'about_me' => 'nullable|string',
        'signture' => 'nullable|string',
        'freelance' => 'required|boolean',
    ];

    protected $listeners = [
        'delete_personal-information' => 'deletePersonalInformation',
        'update_personal-information' => 'updatePersonalInformation',
    ];

    public function render()
    {
        return view('livewire.personal-information.add-personal-information-modal');
    }

    public function submit()
    {
        // $this->validate();

        DB::transaction(function () {
            $data = [
                'name' => $this->name,
                'age' => $this->age,
                'residence' => $this->residence,
                'address' => $this->address,
                'email' => $this->email,
                'phone' => $this->phone,
                'job_title' => $this->job_title,
                'about_me' => $this->about_me,
                'signture' => $this->signture,
                'freelance' => $this->freelance,
            ];

            if ($this->resume) {
                $resumePath = $this->resume->store('resumes', 'public');
                $data['resume'] = $resumePath;
            }

            $personal_information = PersonalInformation::find($this->personal_information_id) ?? PersonalInformation::create($data);

            if ($this->edit_mode) {
                foreach ($data as $k => $v) {
                    $personal_information->$k = $v;
                }
                $personal_information->save();
            }

            $message = $this->edit_mode ? __('Personal information updated') : __('New personal information created');
            $this->dispatch('success', $message);
        });

        $this->reset();
    }

    public function updatePersonalInformation($id)
    {
        $this->edit_mode = true;

        $personal_information = PersonalInformation::find($id);
        $this->personal_information_id = $personal_information->id;
        $this->name = $personal_information->name;
        $this->age = $personal_information->age;
        $this->residence = $personal_information->residence;
        $this->address = $personal_information->address;
        $this->email = $personal_information->email;
        $this->phone = $personal_information->phone;
        $this->job_title = $personal_information->job_title;
        $this->about_me = $personal_information->about_me;
        $this->signture = $personal_information->signture;
        $this->freelance = (bool) $personal_information->freelance;
        $this->resume = $personal_information->resume; // Resume path if it's already uploaded
    }

    public function deletePersonalInformation($id)
    {
        // Delete the PersonalInformation record with the specified ID
        PersonalInformation::destroy($id);

        // Emit a success event with a message
        $this->dispatch('success', 'Personal information successfully deleted');
    }
}
