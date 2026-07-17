<x-layouts.main title="Procedures">
  
            <section class="px-xl py-lg">
                <div class="mb-xl">
                    <h2 class="font-headline-lg text-headline-lg text-on-surface">Medical Procedures</h2>
                    <p class="text-on-surface-variant font-body-lg">View all available treatments and clinical services.
                    </p>
                </div>
                <!-- Bento Grid Summary Stats -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-lg mb-xl">
                    <div
                        class="bg-surface-container-lowest p-lg rounded-xl border border-outline-variant shadow-[0px_4px_20px_rgba(0,0,0,0.04)] flex items-center gap-md">
                        <div class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined" data-icon="inventory_2">inventory_2</span>
                        </div>
                        <div>
                            <p class="text-on-surface-variant font-label-md">Total Services</p>
                            <p class="text-headline-sm font-bold">{{ $procedures->count() }}</p>
                        </div>
                    </div>
                    
                    <div
                        class="bg-surface-container-lowest p-lg rounded-xl border border-outline-variant shadow-[0px_4px_20px_rgba(0,0,0,0.04)] flex items-center gap-md">
                        <div class="w-12 h-12 rounded-lg bg-tertiary/10 flex items-center justify-center text-tertiary">
                            <span class="material-symbols-outlined" data-icon="payments">payments</span>
                        </div>
                        <div>
                            <p class="text-on-surface-variant font-label-md">Base Price</p>
                            <p class="text-headline-sm font-bold">$120.00</p>
                        </div>
                    </div>
                    <div
                        class="bg-surface-container-lowest p-lg rounded-xl border border-outline-variant shadow-[0px_4px_20px_rgba(0,0,0,0.04)] flex items-center gap-md overflow-hidden relative">
                        <div class="relative z-10">
                            <p class="text-on-surface-variant font-label-md">Updates</p>
                            <p class="text-headline-sm font-bold">Today</p>
                        </div>
                        <div class="absolute -right-4 -bottom-4 opacity-5">
                            <span class="material-symbols-outlined text-[80px]" data-icon="update">update</span>
                        </div>
                    </div>
                </div>
                <!-- Main Directory Table -->
                <div
                    class="bg-surface-container-lowest rounded-xl border border-outline-variant shadow-[0px_4px_20px_rgba(0,0,0,0.04)] overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-surface-container-low border-b border-outline-variant">
                                    <th
                                        class="px-lg py-md font-label-md text-on-surface-variant uppercase tracking-wider">
                                        Name</th>
                                    <th
                                        class="px-lg py-md font-label-md text-on-surface-variant uppercase tracking-wider">
                                        Description</th>
                                    <th
                                        class="px-lg py-md font-label-md text-on-surface-variant uppercase tracking-wider text-center">
                                        Duration (Minutes)</th>
                                    <th
                                        class="px-lg py-md font-label-md text-on-surface-variant uppercase tracking-wider text-right">
                                        Price</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-outline-variant/30">
                               @foreach ($procedures as $procedure)

                                <tr class="hover:bg-surface-container-low transition-colors">
                                    <td class="px-lg py-lg">
                                        <div class="flex items-center gap-md">
                                            <div
                                                class="w-8 h-8 rounded bg-primary-fixed flex items-center justify-center text-primary">
                                                <span class="material-symbols-outlined text-[18px]"
                                                    data-icon="dentistry">dentistry</span>
                                            </div>
                                            <span class="font-bold text-on-surface">{{ $procedure->name }}</span>
                                        </div>
                                    </td>
                                    <td class="px-lg py-lg text-on-surface-variant max-w-xs">{{$procedure->description}}</td>
                                    <td class="px-lg py-lg text-center">
                                        <span
                                            class="px-sm py-xs bg-surface-container rounded-full text-label-sm font-medium">{{$procedure->duration_minutes}}
                                            min</span>
                                    </td>
                                    <td class="px-lg py-lg text-right font-bold text-primary">${{ number_format($procedure->price, 2) }}  </td>
                                </tr>
                                @endforeach
                         
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination / Table Footer -->
                    <div
                        class="px-lg py-md bg-surface-container-low flex justify-between items-center border-t border-outline-variant">
                       
                </div>
            </section>
       
  
</x-layouts.main>
