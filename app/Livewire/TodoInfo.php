<?php

namespace App\Livewire;

use Livewire\Attributes\Reactive;
use Livewire\Component;
use App\Models\Todo;
use Illuminate\Contracts\View\View;

class TodoInfo extends Component
{
    #[Reactive]
    public Todo $todo;

    public function render(): View
    {
        return view('livewire.todo-info');
    }
}