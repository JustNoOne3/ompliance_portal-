<x-filament-widgets::widget>
    <style>
        /* .aerw-cont{
            margin-right: -340px;
        }
        .cnpc-cont{
            margin-right: -340px;
        } */
    </style>
    <div class="grid grid-flow-col">
        <x-filament::section class="aerw-cont" style="float: right; width: 430px; margin-left: auto; right: 0;">
            @livewire('aerw-modal')
        </x-filament::section>
        <x-filament::section class="cnpc-cont" style="float: right; width: 430px;"> 
            @livewire('cnpc-modal')
        </x-filament::section>
    </div>
</x-filament-widgets::widget>
