<?php

namespace App\Livewire\Authors;

use App\Models\Author;
use Livewire\Component;

class Create extends Component
{
    public $first_name = '';
    public $second_name = '';
    public $surname = null;

    public function storeAuthor() {
        $validated = $this->validate([
            'first_name' => 'required|min:3',
            'second_name' => 'required',
            'surname' => 'nullable'
        ]);

        Author::create($validated);

        return redirect()->to('/authors');
    }

    public function render()
    {
        return view('livewire.authors.create');
    }


}
