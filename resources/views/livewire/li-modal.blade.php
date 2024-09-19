<x-filament::modal id="modal-li" width="5xl">
    <x-slot name="trigger" style="height: 100%;">
        <x-filament::button color="warning" size="xl" outlined style="margin: 15px; width: 100%;">
            <div class="grid grid-flow-rows">
                <img src="{{asset('images/li-1.png')}}" alt="" class="mr-2 mx-auto" style="width: 100%;">
            </div>
        </x-filament::button>
    </x-slot>

    <div class="grid grid-flow-rows">
        <div class="h-14 font-bold text-2xl text-white p-4 text-center border border-gray-900 rounded-md mb-4" style="background-color: #2190ff; dark:background-color: #5A5D64;">
            Labor Inspection
        </div>
        <div class="grid grid-flow-col b-0">

            <div class="module_1 grid grid-flow-rows border-2 border-blue-500 rounded-md" style="height: 400px; margin: 10px;">
                <div class="text-base text-center text-wrap">
                    Module 1
                </div>
                <div class="grid grid-flow-col inset-x-0 bottom-0">
                    <x-filament::button wire:click="module1_download" color="success" size="" outlined style="margin: 15px; height: 30px;">
                        <div class="grid grid-flow-rows">
                            <a class="text-base text-center text-wrap" style="text-wrap: wrap; ">DOWNLOAD</a>
                        </div>
                    </x-filament::button>
                    <x-filament::button wire:click="module1_submit" color="success" size="" outlined style="margin: 15px; height: 30px;">
                        <div class="grid grid-flow-rows">
                            <a class="text-base text-center text-wrap" style="text-wrap: wrap; ">SUBMIT</a>
                        </div>
                    </x-filament::button>
                </div>
            </div>

            <div class="module_2 grid grid-flow-rows border-2 border-blue-500 rounded-md" style="height: 400px; margin: 10px;">
                <div class="text-base text-center text-wrap">
                    Module 2
                </div>
                <div class="grid grid-flow-col inset-x-0 bottom-0">
                    <x-filament::button wire:click="module2_download" color="success" size="" outlined style="margin: 15px; height: 30px;">
                        <div class="grid grid-flow-rows">
                            <a class="text-base text-center text-wrap" style="text-wrap: wrap; ">DOWNLOAD</a>
                        </div>
                    </x-filament::button>
                    <x-filament::button wire:click="module2_submit" color="success" size="" outlined style="margin: 15px; height: 30px;">
                        <div class="grid grid-flow-rows">
                            <a class="text-base text-center text-wrap" style="text-wrap: wrap; ">SUBMIT</a>
                        </div>
                    </x-filament::button>
                </div>
            </div>

            <div class="module_3 grid grid-flow-rows border-2 border-blue-500 rounded-md" style="height: 400px; margin: 10px;">
                <div class="text-base text-center text-wrap">
                    Module 3
                </div>
                <div class="grid grid-flow-col inset-x-0 bottom-0">
                    <x-filament::button wire:click="module3_download" color="success" size="" outlined style="margin: 15px; height: 30px;">
                        <div class="grid grid-flow-rows">
                            <a class="text-base text-center text-wrap" style="text-wrap: wrap; ">DOWNLOAD</a>
                        </div>
                    </x-filament::button>
                    <x-filament::button wire:click="module3_submit" color="success" size="" outlined style="margin: 15px; height: 30px;">
                        <div class="grid grid-flow-rows">
                            <a class="text-base text-center text-wrap" style="text-wrap: wrap; ">SUBMIT</a>
                        </div>
                    </x-filament::button>
                </div>
            </div> 

        </div>
        <div class="mx-auto">
            <x-filament::button wire:click="track" color="primary" size="xl" style="margin: auto; width: 500px;">
                <div class="grid grid-flow-col">
                    <x-filament::icon
                        icon="heroicon-m-magnifying-glass"
                        class="h-5 w-5 text-white-500 dark:text-white-1000"
                    />
                    <a class="text-base text-center text-wrap" style="color: white; padding-left: 15px;">Browse Submissions</a>
                </div>
            </x-filament::button>
        </div>
    </div>
    

</x-filament::modal>