<?php

namespace App\Filament\Resources\LegalCaseResource\Pages;

use App\Filament\Resources\LegalCaseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Database\Eloquent\Builder;
use App\Models\LegalCase;

class ListLegalCases extends ListRecords
{
    protected static string $resource = LegalCaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'All' => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query; // No filtering for 'All'
                })
                ->badge(LegalCase::count()), // Count of all legal cases
            'Open Cases' => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->where('status', 'open');
                })
                ->badge(LegalCase::where('status', 'open')->count()), // Count of open cases
            'Closed Cases' => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->where('status', 'closed');
                })
                ->badge(LegalCase::where('status', 'closed')->count()), // Count of closed cases
            'Pending Cases' => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->where('status', 'pending');
                })
                ->badge(LegalCase::where('status', 'pending')->count()), // Count of pending cases
        ];
    }
}