<?php

namespace App\Filament\Resources\CertificateDetailResource\Pages;

use App\Filament\Resources\CertificateDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageCertificateDetails extends ManageRecords
{
    protected static string $resource = CertificateDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->closeModalByClickingAway(false)->slideOver()->stickyModalFooter()->stickyModalHeader(),
        ];
    }
}
