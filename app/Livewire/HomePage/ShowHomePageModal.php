<?php

namespace App\Livewire\HomePage;

use App\Models\HomePage;
use Livewire\Component;

class ShowHomePageModal extends Component
{
    public function render()
    {
        $home_page = HomePage::first();
        return view('livewire.home-page.show-home-page-modal', compact('home_page'));
    }
}
