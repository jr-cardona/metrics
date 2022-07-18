<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use Livewire\WithPagination;

class IndexComponent extends Component
{
    use WithPagination;

    public ?string $search = '';

    public ?int $paginate = 10;

    public ?string $sortField = 'created_at';

    public bool $sortDesc = false;

    public function mount()
    {
        $this->paginate = session()->get(get_class($this) . '.paginate') ?? $this->paginate;
        $this->search = session()->get(get_class($this) . '.search') ?? $this->search;
        $this->sortField = session()->get(get_class($this) . '.sortField') ?? $this->sortField;
        $this->sortDesc = session()->get(get_class($this) . '.sortDesc') ?? $this->sortDesc;
    }

    public function sortBy(string $field)
    {
        if ($this->sortField === $field) {
            $this->sortDesc = !$this->sortDesc;
            return;
        }

        $this->reset('sortDesc');
        $this->sortField = $field;
    }

    public function updating($name, $value)
    {
        session([get_class($this) . '.' . $name => $value]);
    }
}
