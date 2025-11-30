<?php

namespace App\Filament\Exports;

use App\Models\Rental;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class RentalExporter extends Exporter
{
    protected static ?string $model = Rental::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID Order'),

            ExportColumn::make('created_at')
                ->label('Tanggal Request')
                ->formatStateUsing(fn ($state) => \Carbon\Carbon::parse($state)->format('d/m/Y H:i')),

            ExportColumn::make('nama_lengkap')
                ->label('Nama Penyewa'),

            ExportColumn::make('nomor_telp')
                ->label('WhatsApp'),

            // Mengambil data dari relasi (Dot Notation)
            ExportColumn::make('camera.name')
                ->label('Unit Kamera'),

            ExportColumn::make('rent_date_start')
                ->label('Mulai Sewa'),

            ExportColumn::make('rent_date_end')
                ->label('Selesai Sewa'),

            ExportColumn::make('total_days')
                ->label('Durasi (Hari)'),

            ExportColumn::make('total_price')
                ->label('Total Harga')
                ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.')),

            ExportColumn::make('status')
                ->formatStateUsing(fn (string $state): string => ucfirst($state)),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Laporan rental berhasil diexport. ' . number_format($export->successful_rows) . ' baris data telah diproses.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' baris gagal diexport.';
        }

        return $body;
    }
}