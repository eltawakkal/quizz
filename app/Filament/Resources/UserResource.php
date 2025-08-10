<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?int $navigationSort = 1;
    protected static ?string $navigationGroup = 'Data';
    protected static ?string $navigationLabel = 'Data pengguna';
    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),
                TextInput::make('email'),
                TextInput::make('password')
                    ->dehydrated(fn($state) => filled($state)) // Only save if filled
                    ->dehydrateStateUsing(fn($state) => Hash::make($state)) // Hash the password
                    ->password(),
                Select::make('gender_id')
                    ->native(false)
                    ->options([
                        '1' => 'Laki-laki',
                        '2' => 'Perempuan',
                    ]),
                TextInput::make('position')->label('Jabatan'),
                TextInput::make('instantion')->label('Instansi'),
                Select::make('role')
                    ->native(false)
                    ->options([
                        'Admin' => 'Admin',
                        'User' => 'User',
                    ]),
                TextInput::make('phone_number')->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('gender_id')
                    ->label('Jender')
                    ->badge()
                    ->formatStateUsing(fn ($state) => $state == 1 ? 'Laki-laki' : 'Perempuan'),
                TextColumn::make('email'),
                TextColumn::make('position')->badge()->label('Jabatan'),
                TextColumn::make('instantion')->label('Instansi'),
                TextColumn::make('phone_number'),
                TextColumn::make('role')->badge()->color('warning')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->visible(fn($record) => $record->role == "admin" ? false : true),
                Tables\Actions\DeleteAction::make()->visible(fn($record) => $record->role == "admin" ? false : true),
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
            'index' => Pages\ManageUsers::route('/'),
        ];
    }
}
