<?php

namespace App\Filament\Resources\TavReportResource\Pages;

use App\Filament\Resources\TavReportResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTavReports extends ListRecords
{
    protected static string $resource = TavReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('upload_form')
                ->color('primary')
                ->label('Add a New Form')
                ->modalHeading('Add a New TAV Form')
                ->form([
                    TextInput::make('tav_reportName')
                        ->label('Name/Type of Form')
                        ->maxLength(255)
                        ->required(),
                    TextInput::make('tav_category')
                        ->label('Form Category'),
                    FileUpload::make('tav_reportUpload')
                        ->label('Upload the form.')
                        ->required(),
                ])
                ->action(function (array $data){
                    return LiReport::create([
                        'li_reportName' => $data['tav_reportName'],
                        'li_category' => $data['tav_category'],
                        'li_reportUpload' => $data['tav_reportUpload'],
                    ]);
                }),
        ];
    }
}
