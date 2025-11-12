<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CameraResource\Pages;
use App\Filament\Resources\CameraResource\RelationManagers;
use App\Models\Camera;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Support\Str;
use Iluminate\Support\Facades\Storage;
use Iluminate\Database\Eloquent\Relations\BelongsTo;

class CameraResource extends Resource
{
    protected static ?string $model = Camera::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
           ->schema([
        
            Forms\Components\Group::make()->schema([
                TextInput::make('name')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($set, $state) => $set('slug', Str::slug($state))),
                
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true),

                TextInput::make('specifications')
                    ->label('Spesifikasi Kamera')
                    ->required()
                    ->columnSpanFull(),
        
                Select::make('category_id')
                    ->relationship('category', 'name') 
                    ->required(),
                
                TextInput::make('price_per_day')
                    ->required()
                    ->numeric()
                    ->prefix('Rp'),
                
                Toggle::make('is_available')
                    ->required()
                    ->default(true)
                    ->label('Stok Tersedia?'),
                    
            ])->columnSpan(1), 

            Forms\Components\Group::make()->schema([
                FileUpload::make('image_url')
                    ->label('Foto Kamera')
                    ->image() 
                    ->directory('kamera-foto') 
                    ->required(),
                
                RichEditor::make('description')
                    ->columnSpanFull(),
                
                    
            ])->columnSpan(1), 

        ])->columns(2); 
    }

    public static function table(Table $table): Table
    {
        return $table
          ->columns([
            ImageColumn::make('image_url')->label('Foto'),
            
            TextColumn::make('name')->searchable()->sortable(),
            
            TextColumn::make('category.name')->label('Kategori')->sortable(),
            
            TextColumn::make('price_per_day')
                ->money('IDR') 
                ->sortable(),
            
            ToggleColumn::make('is_available')->label('Tersedia'), 
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
            'index' => Pages\ListCameras::route('/'),
            'create' => Pages\CreateCamera::route('/create'),
            'edit' => Pages\EditCamera::route('/{record}/edit'),
        ];
    }
}
