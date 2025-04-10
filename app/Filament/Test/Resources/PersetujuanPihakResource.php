<?php

namespace App\Filament\Test\Resources;

use App\Filament\Test\Resources\PersetujuanPihakResource\Pages;
use App\Filament\Test\Resources\PersetujuanPihakResource\RelationManagers;
use App\Models\PersetujuanPihak;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\IconColumn;

class PersetujuanPihakResource extends Resource
{
    protected static ?string $model = PersetujuanPihak::class;

    protected static ?string $navigationIcon = 'heroicon-o-scale';
    protected static ?string $navigationLabel = 'Approval Parties';
    protected static ?string $modelLabel = 'Approval Party';
    protected static ?string $navigationGroup = 'Case Management';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('pihak_id')
                    ->label('Party')
                    ->relationship('pihak', 'nama_lengkap') // Use 'nama_lengkap' instead of 'name'
                    ->required(),
                Forms\Components\Select::make('persetujuan')
                    ->label('Approval')
                    ->options([
                        'setuju' => 'Accepted',
                        'tidak_setuju' => 'Not Accepted',
                        'belum_membuat' => 'Not Made Yet',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('pihak.nama_lengkap')
                ->label('Party')
                ->searchable()
                ->sortable(),
            IconColumn::make('persetujuan')
                ->label('Approval')
                ->icon(fn (string $state): string => match ($state) {
                    'setuju' => 'heroicon-o-check-circle', // Icon for "Agree"
                    'tidak_setuju' => 'heroicon-o-x-circle', // Icon for "Disagree"
                    'belum_membuat' => 'heroicon-o-question-mark-circle', // Icon for "Not Made Yet"
                    default => 'heroicon-o-question-mark-circle', // Default icon
                })
                ->color(fn (string $state): string => match ($state) {
                    'setuju' => 'success', // Green for "Agree"
                    'tidak_setuju' => 'danger', // Red for "Disagree"
                    'belum_membuat' => 'warning', // Yellow for "Not Made Yet"
                    default => 'gray', // Default color
                }),
            Tables\Columns\TextColumn::make('created_at')
                ->label('Created At')
                ->dateTime()
                ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('persetujuan')
                    ->label('Approval')
                    ->options([
                        'setuju' => 'Agree',
                        'tidak_setuju' => 'Disagree',
                        'belum_membuat' => 'Not Made Yet',
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
            'index' => Pages\ListPersetujuanPihaks::route('/'),
            'create' => Pages\CreatePersetujuanPihak::route('/create'),
            'edit' => Pages\EditPersetujuanPihak::route('/{record}/edit'),
        ];
    }
}