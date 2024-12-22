<?php

namespace App\Filament\Resources\MembershipResource\Pages;

use App\Filament\Resources\MembershipResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;
use Filament\Support\Enums\IconPosition;

class ListMemberships extends ListRecords
{
    protected static string $resource = MembershipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make()
                ->icon('heroicon-m-user-group')
                ->iconPosition(IconPosition::Before),
                // ->badge(Attendance::query()->where('active', true)->count()),
            'premium' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('membership_type', 'like', 'premium')),
            'basic' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('membership_type', 'like', 'basic')),
        ];
    }
}
