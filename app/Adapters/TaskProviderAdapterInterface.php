<?php

namespace App\Adapters;

interface TaskProviderAdapterInterface
{
    public function getTasks(): array;

    public function processTasks(array $resourceData): TaskProviderAdapterInterface;
}
