<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Illuminate\Support\Collection;
use Livewire\Component;

class ShowComments extends Component
{
    public Post $post;

    public function mount(Post $post): void
    {
        $this->post = $post;
    }

    #[Computed]
    public function comments(): Collection
    {
        return $this->post->comments()->get();
    }

    public function render(): View
    {
        return view('livewire.show-comments');
    }
}