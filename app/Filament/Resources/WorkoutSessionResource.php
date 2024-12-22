<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WorkoutSessionResource\Pages;
use App\Filament\Resources\WorkoutSessionResource\RelationManagers;
use App\Models\WorkoutSession;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\Filter;
use Malzariey\FilamentDaterangepickerFilter\Filters\DateRangeFilter;

class WorkoutSessionResource extends Resource
{
    protected static ?string $model = WorkoutSession::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('session_name')
                    ->label('Session Name'),
                DatePicker::make('session_date')
                    ->label('Session Date'),
                TimePicker::make('start_time')
                    ->label('Start Time'),
                TimePicker::make('end_time')
                    ->label('End Time'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('session_name'),
                TextColumn::make('session_date')
                    ->date(),
                TextColumn::make('start_time')
                    ->time('g:i A'),
                TextColumn::make('end_time')
                    ->time('g:i A'),
            ])
            ->filters([ 
                DateRangeFilter::make('session_date'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListWorkoutSessions::route('/'),
            'create' => Pages\CreateWorkoutSession::route('/create'),
            'edit' => Pages\EditWorkoutSession::route('/{record}/edit'),
        ];
    }
}
