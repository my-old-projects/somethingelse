<?php

namespace App\Adapters;

use App\Exceptions;
use App\Exceptions\TaskProviderException;

class BaseTaskAdapter
{
    private TaskProviderAdapterInterface $provider;

    public function setProvider(string $providerName)
    {
        switch ($providerName) {
            case 'Marmara':
                $this->provider = new ProviderMarmaraAdapter();
                break;
            case 'Ege':
                $this->provider = new ProviderEgeAdapter();
                break;
            default:
                throw new TaskProviderException("Task provider not found");
                break;
        }

        return $this;
    }

    public function getTasks(array $resourceData): array
    {
        $data = $this->provider->processTasks($resourceData)->getTasks();

        return $data;
    }
}
