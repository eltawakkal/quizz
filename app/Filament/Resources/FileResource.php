<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FileResource\Pages;
use App\Filament\Resources\FileResource\RelationManagers;
use App\Models\Data\File;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class FileResource extends Resource
{
    protected static ?string $model = File::class;

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationGroup = 'Data';
    protected static ?string $navigationLabel = 'Data PDF';
    protected static ?string $navigationIcon = 'heroicon-o-document';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('file_path')
                    ->label('Pilih File')
                    ->directory('file/pdf')
                    ->acceptedFileTypes([
                        'application/pdf',

                        'application/vnd.ms-powerpoint', // .ppt
                        'application/vnd.openxmlformats-officedocument.presentationml.presentation', // .pptx

                        // Word
                        'application/msword', // .doc
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document', // .docx

                        'application/vnd.ms-excel', // .xls
                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', // .xlsx
                    ])->columnSpanFull(),
                TextInput::make('file_name')
                    ->label('Deskripsi File')
                    ->required(),
                TextInput::make('file_url')
                    ->label('Url Situs'),
                TextInput::make('category')
                    ->label('tahun')
                    ->required()
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('file_name'),
                TextColumn::make('category')->badge(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('download / Lihat Tautan')
                    ->url(fn ($record) => $record->file_url ?? Storage::url($record->file_path))
                    ->openUrlInNewTab()
                    ->color('warning')
                    ->icon('heroicon-s-newspaper'),
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ManageFiles::route('/'),
        ];
    }
}
