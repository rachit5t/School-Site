<?php

namespace App\View\Components;

use App\Models\notice;
use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class noticeReader extends Component
{
    public $renderAll;
    public $table;
    /**
     * Create a new component instance.
     */
    public function __construct($renderAll)
    {
        //
        $this->renderAll = $renderAll;
        $table = notice::orderBy('id', 'desc')->get();
       $this->table = $table;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.notice-reader');
    }
}
