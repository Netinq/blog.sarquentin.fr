<?php

namespace App\Filament\Gestion\Resources\ArticleContentResource\Pages;

use App\Filament\Gestion\Resources\ArticleContentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditArticleContent extends EditRecord
{
    protected static string $resource = ArticleContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
