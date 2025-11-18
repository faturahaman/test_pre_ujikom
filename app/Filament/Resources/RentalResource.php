<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RentalResource\Pages;
use App\Models\Rental;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class RentalResource extends Resource
{
    protected static ?string $model = Rental::class;

    // Ikon di sidebar menu (opsional, bisa ganti yang lain)
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    
    // Label di sidebar
    protected static ?string $navigationLabel = 'Rental Requests';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Section 1: Informasi Penyewa
                Forms\Components\Section::make('Customer Information')
                    ->schema([
                        Forms\Components\TextInput::make('nama_lengkap')
                            ->label('Full Name')
                            ->required()
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('nomor_telp')
                            ->label('WhatsApp Number')
                            ->tel()
                            ->required()
                            ->maxLength(20),
                            
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                    ])->columns(2),

                // Section 2: Detail Rental
                Forms\Components\Section::make('Rental Details')
                    ->schema([
                        // Dropdown untuk memilih Kamera
                        Forms\Components\Select::make('camera_id')
                            ->relationship('camera', 'name') // Relasi ke model Camera
                            ->label('Camera Model')
                            ->searchable()
                            ->preload()
                            ->required(),

                        // Status Rental (Ini yang paling penting untuk diedit admin)
                        Forms\Components\Select::make('status')
                            ->options([
                                'pending'   => 'Pending',
                                'confirmed' => 'Confirmed (Sedang Disewa)',
                                'returned'  => 'Returned (Sudah Kembali)',
                                'cancelled' => 'Cancelled (Dibatalkan)',
                            ])
                            ->default('pending')
                            ->required()
                            ->native(false), // Tampilan dropdown lebih bagus

                        // Tanggal Sewa
                        Forms\Components\DatePicker::make('rent_date_start')
                            ->label('Start Date')
                            ->required(),

                        Forms\Components\DatePicker::make('rent_date_end')
                            ->label('End Date')
                            ->required()
                            ->afterOrEqual('rent_date_start'), // Validasi tgl akhir >= tgl awal
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Request Date')
                    ->date()
                    ->sortable(),

                Tables\Columns\TextColumn::make('nama_lengkap')
                    ->label('Customer')
                    ->searchable(),

                Tables\Columns\TextColumn::make('camera.name') // Mengambil nama kamera dari relasi
                    ->label('Camera')
                    ->searchable(),

                Tables\Columns\TextColumn::make('rent_date_start')
                    ->date()
                    ->label('Start'),

                Tables\Columns\TextColumn::make('rent_date_end')
                    ->date()
                    ->label('End'),

                // Badge Status dengan Warna
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'gray',
                        'confirmed' => 'warning',
                        'returned' => 'success',
                        'cancelled' => 'danger',
                    }),
            ])
            ->defaultSort('created_at', 'desc') // Urutkan dari yang terbaru
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'confirmed' => 'Confirmed',
                        'returned' => 'Returned',
                        'cancelled' => 'Cancelled',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(), // Tombol Edit
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
            'index' => Pages\ListRentals::route('/'),
            'create' => Pages\CreateRental::route('/create'),
            'edit' => Pages\EditRental::route('/{record}/edit'),
        ];
    }
}