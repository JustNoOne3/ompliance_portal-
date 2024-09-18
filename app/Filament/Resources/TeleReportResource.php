<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeleReportResource\Pages;
use App\Filament\Resources\TeleReportResource\RelationManagers;
use App\Models\TeleReport;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Livewire;

use Filament\Tables\Columns\TextColumn;
use App\Models\Establishment;

use App\Livewire\TeleHeadInfolist;

use App\Filament\Exports\Month13thExporter;
use Filament\Tables\Actions\ExportAction;
use Filament\Actions\Exports\Enums\ExportFormat;

class TeleReportResource extends Resource
{
    protected static ?string $model = TeleReport::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $modelLabel = 'Telecommuting Report';

    protected static ?string $navigationLabel = 'Telecommuting Reports';

    protected static ?string $navigationGroup = 'Reports';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        // dd(Establishment::query()->where('est_id', 553995024660)->value('est_name'));
        return $table
            ->query(function() {
                if(Auth::user()->authority == '20'){
                    return TeleReport::query()->where('created_at', '!=', null);
                }else{
                    $est_array = Establishment::query()->where('region_id', Auth::user()->authority)->pluck('est_id');
                    return TeleReport::query()->whereIn($est_array);
                }
            })
            ->columns([
                TextColumn::make('created_at')
                    ->label('Date of Submission'),
                TextColumn::make('tele_reportType')
                    ->label('Type of Report')
                    ->toggleable(),
                TextColumn::make('tele_estabId')
                    ->label('Name of Establishment')
                    ->searchable()
                    ->formatStateUsing(fn (string $state): string => (Establishment::query()->where('est_id', $state)->value('est_name'))),

            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('view')
                    ->button()
                    ->icon('heroicon-o-eye')
                    ->label('View')
                    // ->action(function ($record){
                        
                    //     $ciphering = "AES-128-CTR";
                    //     $iv_length = openssl_cipher_iv_length($ciphering);
                    //     $options = 0;
                    //     $encryption_iv = '1234567891011121';
                    //     $encryption_key = "FkSeGoYe6KI8OAd";
                        
                    //     // Use openssl_encrypt() function to encrypt the data
                    //     $encryption = openssl_encrypt($record->tele_reportId, $ciphering,
                    //                 $encryption_key, $options, $encryption_iv);
                        
                    //     session()->put('estabId', $encryption);
                    //     // return redirect()->route('bwc_focal-tele-reports-report-view');
                    //     return;
                    // })
                    // ->modalContent(TeleHeadInfolist::class  )
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
            'index' => Pages\ListTeleReports::route('/'),
            'create' => Pages\CreateTeleReport::route('/create'),
            // 'view' => Pages\TeleHeadView::route('/view/{record}'),
            // 'edit' => Pages\EditTeleReport::route('/{record}/edit'),
        ];
    }
}
