<?php

namespace App\Adapters;

class ProviderEgeAdapter implements TaskProviderAdapterInterface
{
    private array $tasks;

    public function getTasks(): array
    {
        return $this->tasks;
    }

    public function processTasks(array $tasks): TaskProviderAdapterInterface
    {

        foreach ($tasks as $taskKeys) {
            foreach ($taskKeys as $key => $taskKey) {
                $this->tasks[] = [
                    'name' => $key,
                    'duration' => $taskKey['estimated_duration'],
                    'level' => $taskKey['level']
                ];
            }
        }

        return $this;
    }
}
