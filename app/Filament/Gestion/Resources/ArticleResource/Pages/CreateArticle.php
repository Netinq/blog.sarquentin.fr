<?php

namespace App\Filament\Gestion\Resources\ArticleResource\Pages;

use App\Filament\Gestion\Resources\ArticleResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateArticle extends CreateRecord
{
    protected static string $resource = ArticleResource::class;
}
