<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CertificateDetailResource\Pages;
use App\Filament\Resources\CertificateDetailResource\RelationManagers;
use App\Models\CertificateDetail;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CertificateDetailResource extends Resource
{
    protected static ?string $model = CertificateDetail::class;

    protected static ?int $navigationSort = 41;
    protected static ?string $navigationGroup = 'Pengaturan';
    protected static ?string $navigationLabel = 'Detail Sertifikat';
    protected static ?string $navigationIcon = 'heroicon-o-adjustments-horizontal';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('type')
                    ->label('Tipe')
                    ->required()
                    ->placeholder('SN-NF'),
                TextInput::make('energi')
                    ->label('Energi')
                    ->required(),
                TextInput::make('tempramen')
                    ->label('Tempramen')
                    ->required(),
                TextInput::make('pola_pikir')
                    ->label('Pola Pikir')
                    ->required(),
                RichEditor::make('description')->columnSpanFull(),
                Section::make('Karakteristik UMUM')->schema([
                    TextInput::make('gaya_komunikasi')->required(),
                    TextInput::make('gaya_pendekatan_mengajar')->required(),
                    TextInput::make('intruksi_sosial')->label('Interaksi sosial')->required(),
                    TextInput::make('pengambilan_keputusan')->required(),
                    TextInput::make('manajemen_konflik')->required(),
                    TextInput::make('kelebihan')->required(),
                    TextInput::make('potensi_tantangn')->required(),
                ])->columns(2),
                Section::make('Potensi kekuatan & area perlu pengembangan')->schema([
                    Repeater::make('potensi')->schema([
                        TextInput::make('potensi_kekuatan')->required(),
                        TextInput::make('perlu_diwaspadai')->required(),
                    ])->columns(2)
                ]),
                Section::make('Gaya Kerja & Gaya Mengajar')->schema([
                    TextInput::make('membuka_kelas')->required(),
                    TextInput::make('penyampaian_materi')->required(),
                    TextInput::make('pengelolaan_kelas')->required(),
                    TextInput::make('kerja_tim')->required(),
                    TextInput::make('penghadapi_siswa')->required(),
                ])->columns(2)
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('type')->badge()->searchable(),
                TextColumn::make('energi'),
                TextColumn::make('tempramen'),
                TextColumn::make('pola_pikir'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->closeModalByClickingAway(false)->slideOver()->stickyModalFooter()->stickyModalHeader(),
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
            'index' => Pages\ManageCertificateDetails::route('/'),
        ];
    }
}
