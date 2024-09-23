<x-filament::modal id="modal-cnpc" width="5xl">
    <x-slot name="trigger" >
        <x-filament::button color="warning" size="xl"  style="margin: 15px;">
            <div class="grid grid-flow-rows">
                <img src="{{asset('images/cnpc_bus.png')}}" alt="" class="mr-2 mx-auto" style="width: 240px;">
                <a class="text-base text-center text-wrap" style="text-wrap: wrap;">Bus Company</a>
            </div>
        </x-filament::button>
    </x-slot>

    <div class="grid grid-flow-rows">
        <div class="h-14 font-bold text-2xl text-white p-4 text-center border border-gray-900 rounded-md mb-4" style="background-color: #0F0B3A; dark:background-color: #5A5D64; margin-bottom: 20px;">
            Form here
        </div>
    </div>

</x-filament::modal>