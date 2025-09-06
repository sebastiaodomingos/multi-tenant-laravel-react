<x-filament::page>
    <div class="grid grid-cols-4 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-5 gap-6">
        @foreach ($this->getServices() as $service)
            <a href="{{ Request::url() }}/{{$service->id}}/edit"  class="relative group bg-white cursor-pointer rounded-xl overflow-hidden shadow transition transform hover:-translate-y-1 hover:shadow-2xl flex items-center justify-center p-4 shadow grid grid-rows-2 gap-4">
                <div class="col-span-2" >
                    <x-dynamic-component 
                            :component="$service->logo" 
                            class=" object-cover transition-transform duration-300 group-hover:scale-105 text-cyan-400"
                    />
                </div>
                            <!-- Hover Overlay -->
                <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-15 transition duration-300"></div>
                <div class="col-span-2 row-span-2 items-center justify-center grid grid-rows-2 text-white-500">
                        <div class="font-bold text-lg text-white-500">{{ $service->name }}</div>
                        <div class="flex items-center space-x-2 text-sm text-white-500">
                            {{-- Enabled / Disabled --}}
                            @if($service->enabled)
                                <x-heroicon-o-check-circle class="w-4 h-4 text-white-500" />
                                <div>Enabled</div>
                            @else
                                <x-heroicon-o-x-circle class="w-4 h-4 text-red-500" />
                                <div>Disabled</div>
                            @endif

                            {{-- Test Mode --}}
                            @if($service->test_mode)
                                <x-heroicon-o-beaker class="w-4 h-4 text-blue-500" title="Test Mode"/>
                                <div>Test</div>
                            @endif
                        </div>
                </div>
            </a>
        @endforeach
    </div>
</x-filament::page>
