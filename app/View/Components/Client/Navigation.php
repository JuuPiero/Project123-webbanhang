<?php

namespace App\View\Components\Client;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navigation extends Component
{
    public $categories;
    public function __construct()
    {
        $this->categories = Category::where('is_active', 1)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.client.navigation');
    }
}
