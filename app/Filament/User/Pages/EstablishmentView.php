<?php

namespace App\Filament\User\Pages;

use Filament\Pages\Page;
use Filament\Actions;
use App\Models\Establishment;
use Illuminate\Support\Facades\Auth;

class EstablishmentView extends Page
{
    protected static ?string $navigationIcon = 'heroicon-s-building-office';

    protected static ?string $navigationLabel = 'My Establishment';

    protected ?string $heading = 'Establishment Information';

    protected static string $view = 'filament.user.pages.establishment-view';

    protected function getHeaderActions(): array {

        return [
            Actions\Action::make('acknowledge')
                ->label('Rule 1020')
                ->hidden(function(){
                    $est = Establishment::query()->where('est_id', Auth::user()->est_id)->first();
                    if($est){
                        if($est->est_certIssuance){
                            return false;
                        }else{
                            return true;
                        }
                    }else{
                        return true;
                    }
                    
                })
                ->icon('heroicon-s-document-text')
                ->button()
                ->color('secondary')
                ->action(function(){
                    session()->put('est_id', Auth::user()->est_id);
                    return redirect()->route('user-certificate');
                }),
            // Actions\EditAction::make('edit')
            //     ->label('Edit Details')
            //     ->icon('heroicon-s-pencil-square')
            //     ->button()
            //     ->color('warning'),
        ];
    }

    public static function getPages(): array
    {
        return [
            'edit' => Pages\EditEstablishment::route('/{record}/edit'),
        ];
    }

}
