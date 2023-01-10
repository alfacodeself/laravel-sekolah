<?php

namespace App\View\Components\Table;

use Illuminate\View\Component;

class Table extends Component
{
    public array $headers;

    public function __construct(array $headers)
    {
        $this->headers = $headers;
    }

    public function render()
    {
        return view('components.table.table');
    }
}
