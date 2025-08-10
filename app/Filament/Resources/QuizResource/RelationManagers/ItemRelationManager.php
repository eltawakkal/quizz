<?php

namespace App\Filament\Resources\QuizResource\RelationManagers;

use App\Models\Data\QuizItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ItemRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('question')
                    ->maxLength(255)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('session')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('type')
                    ->required(),
                Forms\Components\Textarea::make('a_answer')
                    ->nullable(),
                Forms\Components\Textarea::make('b_answer')
                    ->nullable(),
                Forms\Components\Textarea::make('c_answer')
                    ->nullable(),
                Forms\Components\Textarea::make('d_answer')
                    ->nullable(),
                Forms\Components\Textarea::make('e_answer')
                    ->nullable(),
            ])->columns(2);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('question')
            ->columns([
                Tables\Columns\TextColumn::make('index')
                    ->label('No.')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('question')
                    ->default('Tidak ada pertanyaan')
                    ->label('Pertanyaan'),
                Tables\Columns\TextColumn::make('session')
                    ->label('Sesi')
                    ->badge()
                    ->color('warning'),
                Tables\Columns\TextColumn::make('type')
                    ->label('Tipe')
                    ->badge(),
            ])
            ->filters([
                SelectFilter::make('session')
                    ->options(function (Builder $query) {
                        return QuizItem::distinct()->pluck('session', 'session');
                    })
                    ->default(QuizItem::distinct()->pluck('session', 'session')->first())
                    ->native(false)
                    ->label('Sesi'),
                SelectFilter::make('type')
                    ->options(function (Builder $query) {
                        return QuizItem::distinct()->pluck('type', 'type');
                    })
                    ->native(false)
                    ->label('Tipe'),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()->closeModalByClickingAway(false),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
