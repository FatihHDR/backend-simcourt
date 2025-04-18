<?php

namespace App\Filament\Test\Resources;

use App\Filament\Test\Resources\DokumenPermohonanResource\Pages;
use App\Filament\Test\Resources\DokumenPermohonanResource\RelationManagers;
use App\Models\DokumenPermohonan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\IconColumn;

class DokumenPermohonanResource extends Resource
{
    protected static ?string $model = DokumenPermohonan::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    protected static ?string $navigationLabel = 'Request Documents';
    protected static ?string $modelLabel = 'Request Document';
    protected static ?string $navigationGroup = 'Case Management';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nama_dokumen')
                ->label('Document Name')
                ->required()
                ->placeholder('Enter the document name'),
            Forms\Components\TextInput::make('diupload_oleh')
                ->label('Uploaded By')
                ->required()
                ->placeholder('Enter the uploader name'),
            Forms\Components\Select::make('peran')
                ->label('Role')
                ->options([
                    'Kuasa Hukum' => 'Kuasa Hukum',
                    'Penggugat' => 'Penggugat',
                    'Tergugat' => 'Tergugat',
                ])
                ->required(),
            Forms\Components\FileUpload::make('file_path')
                ->label('File')
                ->directory('dokumen_permohonans')
                ->required(),
            Forms\Components\Select::make('status')
                ->label('Status')
                ->options([
                    'Belum terverifikasi' => 'Belum terverifikasi',
                    'Terverifikasi' => 'Terverifikasi',
                ])
                ->required(),
            Forms\Components\Textarea::make('keterangan')
                ->label('Description')
                ->placeholder('Enter additional information'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('nama_dokumen')
                ->label('Document Name')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('diupload_oleh')
                ->label('Uploaded By')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('peran')
                ->label('Role')
                ->sortable(),
            Tables\Columns\IconColumn::make('status')
                ->label('Verified')
                ->boolean(fn ($state) => $state === 'Terverifikasi') // Map "Terverifikasi" to true
                ->trueIcon('heroicon-o-check-circle') // Icon for true
                ->falseIcon('heroicon-o-x-circle') // Icon for false
                ->trueColor('success') // Color for true
                ->falseColor('danger') // Color for false
                ->getStateUsing(fn ($record) => $record->status === 'Terverifikasi'), // Ensure the correct state is used
            Tables\Columns\TextColumn::make('created_at')
                ->label('Created At')
                ->dateTime()
                ->sortable(),
        ])
        ->filters([
            Tables\Filters\SelectFilter::make('status')
                ->label('Status')
                ->options([
                    'Belum terverifikasi' => 'Belum terverifikasi',
                    'Terverifikasi' => 'Terverifikasi',
                ]),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): array|string|null
    {
        return static::getModel()::count() > 0 ? 'danger' : 'bg-danger';
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDokumenPermohonans::route('/'),
            'create' => Pages\CreateDokumenPermohonan::route('/create'),
            'edit' => Pages\EditDokumenPermohonan::route('/{record}/edit'),
        ];
    }
}