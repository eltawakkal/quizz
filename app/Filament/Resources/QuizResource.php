<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuizResource\Pages;
use App\Filament\Resources\QuizResource\RelationManagers;
use App\Models\Data\Quiz;
use Doctrine\DBAL\Schema\View;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Split;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class QuizResource extends Resource
{
    protected static ?string $model = Quiz::class;

    protected static ?int $navigationSort = 20;
    protected static ?string $navigationGroup = 'Psokotes';
    protected static ?string $navigationLabel = 'List Psikotes';
    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Split::make([
                    Grid::make(2)->schema([
                       Section::make()->schema([
                            Forms\Components\TextInput::make('title')
                                ->label('Judul Sikotes')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\RichEditor::make('description')
                                ->label('Deskripsi')
                                ->required()
                                ->nullable(),
                            Forms\Components\RichEditor::make('what_you_get')
                                ->label('Apa yang didapat')
                                ->nullable(),
                        ]),
                        Section::make()->schema([
                            Forms\Components\Repeater::make('faq')
                                ->label('FAQ')
                                ->schema([
                                    Forms\Components\TextInput::make('question')
                                        ->label('Pertanyaan')
                                        ->required(),
                                    Forms\Components\TextInput::make('answare')
                                        ->label('Jawaban')
                                        ->required(),
                                ])
                                ->columns(2)
                        ]),
                    ]),
                    Section::make([
                        Forms\Components\FileUpload::make('image')
                            ->label('Pilih Gambar Sampul')
                            ->nullable()
                            ->image()
                            ->directory('quizzes/images')
                            ->maxSize(1024 * 1)
                            ->acceptedFileTypes(['image/*']),
                        Forms\Components\TextInput::make('price')
                            ->label('Harga')
                            ->required()
                            ->numeric()
                            ->default('0'),
                        Forms\Components\TextInput::make('promo_price')
                            ->label('Harga Promo')
                            ->nullable()
                            ->numeric(),
                        Forms\Components\Select::make('category')
                            ->label('Pilih Kategori Sikotes')
                            ->relationship('category', 'name')
                            ->options(
                                \App\Models\Item\QuizCategory::pluck('name', 'id')
                            )
                            ->preload()
                            ->searchable()
                            ->nullable(),
                    ])->grow(false)
                ])->from('md')
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar')
                    ->size(50),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->weight(FontWeight::Bold)
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->label('Deskripsi')
                    ->html()
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Kategori')
                    ->badge()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            RelationManagers\ItemRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQuizzes::route('/'),
            'create' => Pages\CreateQuiz::route('/create'),
            'edit' => Pages\EditQuiz::route('/{record}/edit'),
        ];
    }
}
