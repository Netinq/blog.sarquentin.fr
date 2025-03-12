<?php

namespace App\Filament\Gestion\Resources\ArticleContentResource\Pages;

use App\Filament\Gestion\Resources\ArticleContentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListArticleContents extends ListRecords
{
    protected static string $resource = ArticleContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
