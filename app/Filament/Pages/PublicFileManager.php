<?php

namespace App\Filament\Pages;

use BostjanOb\FilamentFileManager\Pages\FileManager;

class PublicFileManager extends FileManager
{
    protected static ?string $navigationLabel = 'Explorateur de fichiers';

    protected string $disk = 'public';

    protected $queryString = ['path'];

    public string $path = '';
}
