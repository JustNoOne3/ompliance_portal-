<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WairResource\Pages;
use App\Filament\Resources\WairResource\RelationManagers;
use App\Models\Wair;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use App\Filament\Exports\Month13thExporter;
use Filament\Tables\Actions\ExportAction;
use Filament\Actions\Exports\Enums\ExportFormat;

use App\Models\Establishment;
use Filament\Tables\Columns\TextColumn;

class WairResource extends Resource
{
    protected static ?string $model = Wair::class;

    protected static ?string $navigationIcon = 'heroicon-o-shield-exclamation';

    protected static ?string $modelLabel = 'Workplace Accident / Illness Report';

    protected static ?string $navigationLabel = 'Workplace Accident / Illness Reports';

    protected static ?string $navigationGroup = 'Reports';

    protected static bool $shouldRegisterNavigation = true;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('created_at')
                    ->label('Date of Submission'),
                TextColumn::make('wairs_reportType')
                    ->label('Type of Report')
                    ->toggleable(),
                TextColumn::make('wairs_estabId')
                    ->label('Name of Establishment')
                    ->searchable()
                    ->formatStateUsing(fn (string $state): string => (Establishment::query()->where('est_id', $state)->value('est_name'))),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->headerActions([
                ExportAction::make()
                    ->exporter(Month13thExporter::class)
                    ->label('Export to Excel')
                    ->formats([
                        ExportFormat::Xlsx,
                    ])
                    ->fileName(date('Y-m-d') . '- 13th Month Report'),
            ])
            ->emptyStateHeading('Empty')
            ->emptyStateDescription('There is no Report Data yet')
            ->emptyStateIcon('heroicon-o-bookmark');
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
            'index' => Pages\ListWairs::route('/'),
            'create' => Pages\CreateWair::route('/create'),
            'edit' => Pages\EditWair::route('/{record}/edit'),
        ];
    }
}
