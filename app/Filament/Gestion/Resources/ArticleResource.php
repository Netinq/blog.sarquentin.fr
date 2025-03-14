<?php

namespace App\Filament\Gestion\Resources;

use App\Filament\Gestion\Resources\ArticleResource\Pages;
use App\Filament\Gestion\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('editor')
                    ->options(User::all()->pluck('name', 'id'))
                    ->required(),
                Forms\Components\DateTimePicker::make('published_at'),
                Forms\Components\TextInput::make('read_time')
                    ->numeric()
                    ->disabled()
                    ->default(null),
                Forms\Components\Toggle::make('pin')
                    ->required(),
                Forms\Components\Toggle::make('link_only')
                    ->required(),
                Forms\Components\TextInput::make('link')
                    ->disabled()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('image')
                    ->required()
                    ->directory('articles'),
                Forms\Components\FileUpload::make('banner_image')
                    ->required()
                    ->directory('articles'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('read_time')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('pin')
                    ->boolean(),
                Tables\Columns\IconColumn::make('link_only')
                    ->boolean(),
                Tables\Columns\TextColumn::make('link')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
