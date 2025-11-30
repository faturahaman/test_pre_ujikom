<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RentalResource\Pages;
use App\Models\Rental;
use App\Filament\Exports\RentalExporter; // Pastikan file Exporter sudah dibuat via artisan
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\ExportAction; 
use Filament\Tables\Actions\ExportBulkAction; 

class RentalResource extends Resource
{
    protected static ?string $model = Rental::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    
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
                            ->disabled() // Admin hanya melihat, tidak mengedit data user
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('nomor_telp')
                            ->label('WhatsApp Number')
                            ->tel()
                            ->disabled()
                            ->maxLength(20),
                            
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->disabled()
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
                            ->disabled()
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
                            ->native(false), 
                            
                        // Tanggal Sewa
                        Forms\Components\DatePicker::make('rent_date_start')
                            ->label('Start Date')
                            ->disabled(),                                       
                        
                        Forms\Components\DatePicker::make('rent_date_end')
                            ->label('End Date')
                            ->disabled()
                            ->afterOrEqual('rent_date_start'), 

                        // Total Price (Disabled karena hitungan sistem)
                        Forms\Components\TextInput::make('total_price')
                            ->label('Total Price')
                            ->disabled()
                            ->dehydrated(false) // Data tidak dikirim ulang ke DB saat save agar aman
                            ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.')),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Request Date')
                    ->date('d M Y H:i') // Format tanggal lebih rapi
                    ->sortable(),

                Tables\Columns\TextColumn::make('nama_lengkap')
                    ->label('Customer')
                    ->searchable(),

                Tables\Columns\TextColumn::make('camera.name') 
                    ->label('Camera')
                    ->searchable(),

                Tables\Columns\TextColumn::make('rent_date_start')
                    ->date()
                    ->label('Start'),

                Tables\Columns\TextColumn::make('rent_date_end')
                    ->date()
                    ->label('End'),

                Tables\Columns\TextColumn::make('total_price')
                    ->label('Total Price')
                    ->money('IDR', locale: 'id'),

                // Badge Status dengan Warna
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'gray',
                        'confirmed' => 'warning',
                        'returned' => 'success',
                        'cancelled' => 'danger',
                        default => 'gray',
                    }),
            ])
            ->defaultSort('created_at', 'desc') 
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'confirmed' => 'Confirmed',
                        'returned' => 'Returned',
                        'cancelled' => 'Cancelled',
                    ]),
            ])
            // === [1] HEADER ACTION (TOMBOL EXPORT DI ATAS) ===
            ->headerActions([
                ExportAction::make()
                    ->exporter(RentalExporter::class)
                    ->label('Download Laporan')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->color('primary'),
            ])
            // =================================================
            ->actions([
                Tables\Actions\EditAction::make(), 
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    
                    // === [2] BULK ACTION (EXPORT YANG DICENTANG) ===
                    ExportBulkAction::make()
                        ->exporter(RentalExporter::class)
                        ->label('Export Terpilih'),
                    // ===============================================
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