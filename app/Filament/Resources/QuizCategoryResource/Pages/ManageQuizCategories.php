<?php

namespace App\Filament\Resources\QuizCategoryResource\Pages;

use App\Filament\Resources\QuizCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageQuizCategories extends ManageRecords
{
    protected static string $resource = QuizCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
