<?php

namespace App\Filament\Resources\StudentGroupResource\Pages;

use App\Filament\Resources\StudentGroupResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Database\Eloquent\Builder;
use App\Models\StudentGroup;

class ListStudentGroups extends ListRecords
{
    protected static string $resource = StudentGroupResource::class;

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
                ->badge(StudentGroup::count()), // Count of all student groups
            'This Week' => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->where('created_at', '>=', now()->subWeek());
                })
                ->badge(StudentGroup::where('created_at', '>=', now()->subWeek())->count()), // Count for this week
            'This Month' => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->where('created_at', '>=', now()->subMonth());
                })
                ->badge(StudentGroup::where('created_at', '>=', now()->subMonth())->count()), // Count for this month
            'This Year' => Tab::make()
                ->modifyQueryUsing(function (Builder $query) {
                    return $query->where('created_at', '>=', now()->subYear());
                })
                ->badge(StudentGroup::where('created_at', '>=', now()->subYear())->count()), // Count for this year
        ];
    }
}