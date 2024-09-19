
<x-filament-widgets::widget>
    <x-filament::section class="">
        <div>
            <div class="grid grid-flow-col">
                @livewire('wair-modal')
                @livewire('month13th-modal')
                    
                
            </div>
            <div class="grid grid-flow-col">
                {{-- <x-filament::button wire:click="teleReport" color="warning" size="xl" outlined style="margin: 15px;">
                    <div class="grid grid-flow-rows">
                        <img src="{{asset('images/1.png')}}" alt="" class="mr-2 mx-auto" style="width: 240px;">
                        <a class="text-base text-center text-wrap" style="text-wrap: wrap;">TELECOMMUTING REPORT</a>
                    </div>
                </x-filament::button> --}}
                <x-filament::button wire:click="fwa" color="success" size="xl" outlined style="margin: 15px;">
                    <div class="grid grid-flow-rows">
                        <img src="{{asset('images/2.png')}}" alt="" class="mr-2 mx-auto" style="width: 240px;">
                        <a class="text-base text-center text-wrap" style="text-wrap: wrap;">FLEXIBLE WORK ARRANGEMENT <br> / ALTERNATIVE WORK SCHEME <br> REPORT</a>
                    </div>
                </x-filament::button>
                @if(App\Models\Establishment::where('est_id', Illuminate\Support\Facades\Auth::user()->est_id)->value('est_class') == '1')
                    @livewire('tele-modal')
                @else
                    <x-filament::button wire:click="branchOnly" color="warning" size="xl" outlined style="margin: 15px; width: 95%;">
                        <div class="grid grid-flow-rows">
                            <img src="{{asset('images/1.png')}}" alt="" class="mr-2 mx-auto" style="width: 240px;">
                            <a class="text-base text-center text-wrap" style="text-wrap: wrap;">TELECOMMUTING REPORT</a>
                        </div>
                    </x-filament::button>
                @endif
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
