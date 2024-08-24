<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class PreviewImages extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $images)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.preview-images');
    }
}
