<?php

namespace App\Livewire;

use App\Livewire\Forms\PostForm;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreatePost extends Component
{
    public PostForm $form;

    public bool $success = false;

    #[Title('Create Post')]
    public function render(): View
    {
        return view('livewire.create-post');
    }

    public function updatedFormTitle(): void
    {
        $this->form->title = Str::headline($this->form->title);
    }

    public function save(): void
    {
        $this->validate();

        $this->form->save();

        $this->success = true;
    }

    public function validateBody(): void
    {
        $this->validateOnly('form.body');
    }
}
