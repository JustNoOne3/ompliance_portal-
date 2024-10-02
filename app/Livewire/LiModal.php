<?php

namespace App\Livewire;

use Livewire\Component;


use App\Models\LiReport;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Filament\Tables\Actions\Action;

use App\Models\LiSubmission;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;

use App\Models\Establishment;
use Illuminate\Support\Facades\Auth;

use Filament\Tables\Grouping\Group;

class LiModal extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(LiReport::query())
            ->columns([
                TextColumn::make('li_reportName')
                    ->label('Report / Form')
                    ->searchable(),
            ])
            ->groups([
                Group::make('li_category')
                    ->label(' '),
            ])
            ->defaultGroup('li_category')
            ->filters([
                // ...
            ])
            ->actions([
                Action::make('download')
                    ->color('danger')
                    ->label('Download Form')
                    ->button()
                    ->icon('heroicon-o-arrow-down-tray')
                    ->action(function (LiReport $record){
                        $path = "storage\\".$record->li_reportUpload;
                        return response()->download(public_path($path));
                    }),

                Action::make('submit') // if establishment is bind to the user
                    ->color('primary')
                    ->label('Submit')
                    ->hidden(function(){
                        if(Auth::user()->est_id){
                            return false;
                        }else{
                            return true;
                        }
                    })
                    ->button()
                    ->icon('heroicon-o-paper-airplane')
                    ->modalHeading('LI Form Submission')
                    ->form([
                        FileUpload::make('liSubmit_file')
                            ->label('Upload the filled form.')
                            ->required(),
                    ])
                    ->action(function (array $data, LiReport $record){
                        return LiSubmission::create([
                            'liSubmit_type' => $record->li_reportName,
                            'liSubmit_file' => $data['liSubmit_File'],
                            'liSubmit_status' => 'Submitted',
                            'liSubmit_region' => Establishment::query()->where('est_id', Auth::user()->est_id)->value('region_id'),
                        ]);
                    }),

                Action::make('submit1') // no registered establishment
                    ->color('primary')
                    ->label('Submit')
                    ->hidden(function(){
                        if(Auth::user()->est_id){
                            return true;
                        }else{
                            return false;
                        }
                    })
                    ->button()
                    ->icon('heroicon-o-paper-airplane')
                    ->modalHeading('LI Form Submission')
                    ->form([
                        Select::make('region_id')
                            ->required()
                            ->searchable()
                            ->native(false)
                            ->options([
                                1300000000 => 'National Capital Region (NCR)',
                                1400000000 => 'Cordillera Administrative Region (CAR)',
                                100000000 => 'Region I (Ilocos Region)',
                                200000000 => 'Region II (Cagayan Valley)',
                                300000000 => 'Region III (Central Luzon)',
                                400000000 => 'Region IV-A (CALABARZON)',
                                1700000000 => 'MIMAROPA Region',
                                500000000 => 'Region V (Bicol Region)',
                                600000000 => 'Region VI (Western Visayas)',
                                1800000000 => 'Negros Island Region (NIR)',
                                700000000 => 'Region VII (Central Visayas)',
                                800000000 => 'Region VIII (Eastern Visayas)',
                                900000000 => 'Region IX (Zamboanga Peninsula)',
                                1000000000 => 'Region X (Northern Mindanao)',
                                1100000000 => 'Region XI (Davao Region)',
                                1200000000 => 'Region XII (SOCCSKSARGEN)',
                                1600000000 => 'Region XIII (Caraga)',
                                1900000000 => 'Bangsamoro Autonomous Region in Muslim Mindanao (BARMM)',
                            ])
                            ->label("Select Region"),

                        FileUpload::make('liSubmit_file')
                            ->label('Upload the filled form.')
                            ->required(),
                    ])
                    ->action(function (array $data, LiReport $record){
                        return LiSubmission::create([
                            'liSubmit_type' => $record->li_reportName,
                            'liSubmit_file' => $data['liSubmit_File'],
                            'liSubmit_status' => 'Submitted',
                            'liSubmit_region' => $data['region_id'],
                            'liSubmit_user' => Auth::user()->id,
                        ]);
                    }),
            ])
            ->bulkActions([
                // ...
            ])
            ->emptyStateHeading('Empty')
            ->emptyStateDescription('There is no Available Forms right now. We\'ll be right back.')
            ->emptyStateIcon('heroicon-o-bookmark');
    }

    public function render()
    {
        return view('livewire.li-modal');
    }

    
}
