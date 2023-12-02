<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputText extends Component
{
    public bool $isInvalid = false;

    public function __construct(
        public string $label,
        public string $name,
        public string $id,
        public string|null $value = '',
        public array $errors = [],
        public string $type = 'text',
        public bool $multiple = false,
    )
    {
        $this->isInvalid = !empty($this->errors);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-text');
    }
}
