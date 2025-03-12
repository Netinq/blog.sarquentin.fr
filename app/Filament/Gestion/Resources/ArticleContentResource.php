<?php

namespace App\Filament\Gestion\Resources;

use App\Filament\Gestion\Resources\ArticleContentResource\Pages;
use App\Filament\Gestion\Resources\ArticleContentResource\RelationManagers;
use App\Forms\Components\HtmlPreview;
use App\Models\Article;
use App\Models\ArticleContent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArticleContentResource extends Resource
{
    protected static ?string $model = ArticleContent::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('article_id')
                    ->label('Article')
                    ->options(Article::all()->pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                Forms\Components\MarkdownEditor::make('markdown')
                    ->required()
                    ->columnSpanFull(),
                HtmlPreview::make('html')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('article.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListArticleContents::route('/'),
            'create' => Pages\CreateArticleContent::route('/create'),
            'edit' => Pages\EditArticleContent::route('/{record}/edit'),
        ];
    }
}
