<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdvokatResource\Pages;
use App\Models\Advokat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AdvokatResource extends Resource
{
    protected static ?string $model = Advokat::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationLabel = 'Advokats';
    protected static ?string $modelLabel = 'Advokat';
    protected static ?string $navigationGroup = 'Legal Management';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Personal Information')
                ->schema([
                    Forms\Components\TextInput::make('nama_lengkap')
                        ->label('Full Name')
                        ->required(),
                    Forms\Components\TextInput::make('no_induk')
                        ->label('Registration Number')
                        ->required()
                        ->unique(),
                    Forms\Components\TextInput::make('organisasi')
                        ->label('Organization')
                        ->required(),
                    Forms\Components\DatePicker::make('tanggal_penyumpahan')
                        ->label('Oath Date'),
                    Forms\Components\TextInput::make('tempat_penyumpahan')
                        ->label('Oath Location'),
                    Forms\Components\TextInput::make('no_ba_sumpah')
                        ->label('Oath Certificate Number'),
                ]),

            Forms\Components\Section::make('Contact Information')
                ->schema([
                    Forms\Components\TextInput::make('alamat_kantor')
                        ->label('Office Address'),
                    Forms\Components\TextInput::make('no_handphone')
                        ->label('Phone Number')
                        ->required(),
                    Forms\Components\TextInput::make('telp_kantor')
                        ->label('Office Phone'),
                ]),

            Forms\Components\Section::make('Bank Information')
                ->schema([
                    Forms\Components\TextInput::make('bank')
                        ->label('Bank Name'),
                    Forms\Components\TextInput::make('no_rekening')
                        ->label('Bank Account Number'),
                    Forms\Components\TextInput::make('nama_akun_bank')
                        ->label('Bank Account Name'),
                ]),

            Forms\Components\Section::make('Documents')
                ->schema([
                    Forms\Components\FileUpload::make('file_dokumen_kta')
                        ->label('KTA Document')
                        ->directory('advokats/file_dokumen_kta'),
                    Forms\Components\FileUpload::make('file_dokumen_penyumpahan')
                        ->label('Oath Document')
                        ->directory('advokats/file_dokumen_penyumpahan'),
                    Forms\Components\FileUpload::make('file_dokumen_ktp')
                        ->label('KTP Document')
                        ->directory('advokats/file_dokumen_ktp'),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('nama_lengkap')
                ->label('Full Name')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('no_induk')
                ->label('Registration Number')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('organisasi')
                ->label('Organization')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('tanggal_mulai_berlaku')
                ->label('Start Date')
                ->date()
                ->sortable(),
            Tables\Columns\TextColumn::make('tanggal_habis_berlaku')
                ->label('End Date')
                ->date()
                ->sortable(),
        ])
        ->filters([
            Tables\Filters\SelectFilter::make('organisasi')
                ->label('Organization')
                ->options(Advokat::pluck('organisasi', 'organisasi')->toArray()),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAdvokats::route('/'),
            'create' => Pages\CreateAdvokat::route('/create'),
            'edit' => Pages\EditAdvokat::route('/{record}/edit'),
        ];
    }
}