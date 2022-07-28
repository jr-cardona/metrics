<?php

namespace App\ViewModels;

abstract class IndexViewModel extends ViewModel
{
    protected array $collection;

    public function toArray(): array
    {
        return $this->collection + [
            'createRoute' => $this->createRoute(),
            'createLabel' => $this->createLabel(),
            'paginationOptions' => $this->paginationOptions(),
        ];
    }

    public function collection(array $collection): self
    {
        $this->collection = $collection;
        return $this;
    }

    public function paginationOptions(): array
    {
        return range(start: 10, end: 100, step: 10);
    }

    abstract protected function createRoute(): string;

    abstract protected function createLabel(): string;
}
