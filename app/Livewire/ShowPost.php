<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;

class ShowPost extends Component
{
    #[Url(as: 'q', history: true)]
    public string $search = '';

    public function render(): View
    {
        return view('livewire.show-posts', [
            'posts' => Post::query()->where('title', 'LIKE', '%' . $this->search. '%')->get(),
        ]);
    }
}