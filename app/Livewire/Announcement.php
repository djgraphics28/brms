<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\SchemaOrg\Schema;

class Announcement extends Component
{
    use WithPagination;

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        seo()
            ->title($title = config('app.name'))
            ->description($description = 'Lorem ipsum...')
            ->canonical($url = route('home'))
            ->addSchema(
                Schema::webPage()
                    ->name($title)
                    ->description($description)
                    ->url($url)
                    ->author(Schema::organization()->name($title))
            );

        // Sort by published_at in descending order to ensure latest posts are first
        $posts = Post::published()
            ->orderBy('published_at', 'desc')  // Ensure latest posts come first
            ->paginate(6);

        return view('livewire.announcement', compact('posts'));
    }
}
