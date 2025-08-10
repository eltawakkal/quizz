<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestResultResource\Pages;
use App\Filament\Resources\TestResultResource\RelationManagers;
use App\Models\Data\TestResult;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Crypt;

class TestResultResource extends Resource
{
    protected static ?string $model = TestResult::class;

    protected static ?int $navigationSort = 4;
    protected static ?string $navigationGroup = 'Data';
    protected static ?string $navigationLabel = 'Hasil Tes';
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('no')
                    ->label('No.'),
                TextInput::make('user.name')
                    ->label('Nama'),
                TextInput::make('type')
                    ->label('Tipe'),
                TextInput::make('teaching_type')
                    ->label('Gaya Mengajar'),
                RichEditor::make('teaching_type_desc')
                    ->label('Gaya Mengajar'),
                RichEditor::make('teaching_type_dimension')
                    ->label('Gaya Belajar Gaya Kerja dan Gaya Mengajar'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('no'),
                TextColumn::make('user.name'),
                TextColumn::make('type')->badge(),
                TextColumn::make('teaching_type'),
                TextColumn::make('teaching_type_desc')->html()->limit(50),
                TextColumn::make('teaching_type_dimension')->html()->limit(50),
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('sertifikat')
                    ->url(fn ($record) => route('course.result', Crypt::encryptString($record->id)))
                    ->icon('heroicon-s-newspaper'),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageTestResults::route('/'),
        ];
    }
}
