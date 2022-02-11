<?php

namespace App\Adapters;

class ProviderMarmaraAdapter implements TaskProviderAdapterInterface
{
    private array $tasks;

    public function getTasks(): array
    {
        return $this->tasks;
    }

    public function processTasks(array $tasks): TaskProviderAdapterInterface
    {

        foreach ($tasks as $task) {
            $this->tasks[] = [
                'name' => $task['id'],
                'duration' => $task['sure'],
                'level' => $task['zorluk']
            ];
        }

        return $this;
    }
}
