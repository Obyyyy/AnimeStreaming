<?php

namespace App\View\Components;

use Closure;
use App\Models\Genre;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class layout extends Component
{
    /**
     * Create a new component instance.
     */
    public $genres;

    public function __construct()
    {
        $this->genres = Genre::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout', ['genres' => $this->genres]);
    }
}