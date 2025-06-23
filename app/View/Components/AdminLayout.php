<?php

namespace App\View\Components;

use App\Models\Management;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $management = Management::all();
        return view('layouts.admin', ['management' => $management]);
    }
}
