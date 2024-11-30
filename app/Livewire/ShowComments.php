<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;

class ShowComments extends Component
{
    public Collection $comments;

    public function mount(Post $post): void
    {
        $this->comments = $post->comments()->get();
    }

    public function render(): View
    {
        return view('livewire.show-comments');
    }

    public function placeholder(): string
    {
        return <<<'HTML'
            <div>
                Loading...
            </div>
        HTML;
    }
}