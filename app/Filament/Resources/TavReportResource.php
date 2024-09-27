<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TavReportResource\Pages;
use App\Filament\Resources\TavReportResource\RelationManagers;
use App\Models\TavReport;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TavReportResource extends Resource
{
    protected static ?string $model = TavReport::class;

    protected static ?string $navigationGroup = 'Forms';

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    protected static ?string $modelLabel = 'TAV Form';

    protected static ?string $pluralModelLabel = 'TAV Forms';

    protected static ?string $navigationLabel = 'Technical and Advisory Visits (TAV)';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('tav_reportName')
                    ->maxLength(255)
                    ->label('Name of Report'),
                Forms\Components\FileUpload::make('tav_reportUpload')
                    ->label('Soft Copy of Form'),
                Forms\Components\TextInput::make('tav_category')
                    ->maxLength(255)
                    ->label('Report/Form Category'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tav_reportName')
                    ->searchable()
                    ->label('Name of Report'),
                Tables\Columns\TextColumn::make('tav_reportUpload')
                    ->searchable()
                    ->label('Form'),
                Tables\Columns\TextColumn::make('tav_category')
                    ->searchable()
                    ->label('Category'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Created at'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Updated at'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListTavReports::route('/'),
            'create' => Pages\CreateTavReport::route('/create'),
            'view' => Pages\ViewTavReport::route('/{record}'),
            'edit' => Pages\EditTavReport::route('/{record}/edit'),
        ];
    }
}
