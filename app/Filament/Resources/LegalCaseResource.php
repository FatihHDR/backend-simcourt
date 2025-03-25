<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LegalCaseResource\Pages;
use App\Models\LegalCase;
use App\Filament\Resources\LegalCaseResource\Pages\ListLegalCase;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class LegalCaseResource extends Resource
{
    protected static ?string $model = LegalCase::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationLabel = 'Legal Cases';
    protected static ?string $modelLabel = 'Legal Case';
    protected static ?string $navigationGroup = 'Case Management';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')
                ->label('Title')
                ->required()
                ->placeholder('Enter case title'),
            Forms\Components\Textarea::make('description')
                ->label('Description')
                ->required()
                ->placeholder('Enter case description'),
            Forms\Components\Select::make('status')
                ->label('Status')
                ->options([
                    'open' => 'Open',
                    'closed' => 'Closed',
                    'pending' => 'Pending',
                ])
                ->required(),
            Forms\Components\Select::make('payment_status')
                ->label('Payment Status')
                ->options([
                    'paid' => 'Paid',
                    'unpaid' => 'Unpaid',
                ])
                ->required(),
            Forms\Components\Select::make('lawyer_id')
                ->label('Lawyer')
                ->relationship('lawyer', 'name')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('title')
                ->label('Title')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('status')
                ->label('Status')
                ->sortable()
                ->toggleable(),
            Tables\Columns\TextColumn::make('payment_status')
                ->label('Payment Status')
                ->sortable()
                ->toggleable(),
            Tables\Columns\TextColumn::make('lawyer.name')
                ->label('Lawyer')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('created_at')
                ->label('Created At')
                ->dateTime()
                ->sortable()
                ->toggleable(),
        ])
        ->filters([
            Tables\Filters\SelectFilter::make('status')
                ->label('Status')
                ->options([
                    'open' => 'Open',
                    'closed' => 'Closed',
                    'pending' => 'Pending',
                ]),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }

    public static function getNavigationBadgeColor(): array|string|null
    {
        return static::getModel()::count() > 0 ? 'danger' : 'bg-danger';
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLegalCases::route('/'),
            'create' => Pages\CreateLegalCase::route('/create'),
            'edit' => Pages\EditLegalCase::route('/{record}/edit'),
        ];
    }
}