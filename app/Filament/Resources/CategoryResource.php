<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Models\Category;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Illuminate\Support\Str; 

use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput; 
use Illuminate\Database\Eloquent\Relations\HasMany; 

use Filament\Tables\Columns\TextColumn; 
use Filament\Tables\Actions;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
// use Filament\Tables\Columns\ImageColumn; 
use Filament\Tables\Columns\ImageColumn;




class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([ 
                    TextInput::make('name')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true) 
                        ->afterStateUpdated(fn ($set, $state) => $set('slug', Str::slug($state))),
                    
                    TextInput::make('slug')
                        ->required()
                        ->maxLength(255)
                        ->unique(ignoreRecord: true), 

                    TextInput::make('description')
                        ->maxLength(65535)
                        ->columnSpanFull(), 
                    Section::make('image_url')
                    ->schema([
                        FileUpload::make('image_url')
                            ->label('Category Image')
                            ->image()
                            ->directory('category-images')
                            ->maxSize(2048) 
                            ->columnSpanFull()
                    ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('name')->searchable(),
            TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),

            TextColumn::make('description'),
            ImageColumn::make('image_url')
        ])

        ->filters([
            //
        ])
        ->actions([
            Actions\EditAction::make(),
        ])
        ->bulkActions([
            Actions\BulkActionGroup::make([
                Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}