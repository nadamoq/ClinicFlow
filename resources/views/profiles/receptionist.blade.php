<x-layouts.main title="Receptionist Profile">
    <div class="max-w-[900px] w-full space-y-lg mx-auto">
        <div class="bg-surface-container-lowest rounded-xl p-xl border border-outline-variant shadow-[0px_4px_20px_rgba(0,0,0,0.04)] flex flex-col md:flex-row items-center gap-xl">
            <img class="w-24 h-24 rounded-full object-cover border-2 border-outline/20" 
                 src="{{ $user->avatar }}" alt="{{ $user->name }}">
            <div class="text-center md:text-left space-y-xs flex-1">
                <span class="px-md py-0.5 bg-outline/10 text-outline border border-outline text-label-md font-label-md rounded-full uppercase">
                    {{ $user->role }}
                </span>
                <h1 class="text-headline-md font-headline-md text-on-surface font-bold mt-sm">{{ $user->name }}</h1>
                <p class="text-body-md text-on-surface-variant flex items-center justify-center md:justify-start gap-xs">
                    <span class="material-symbols-outlined text-[18px]">mail</span> {{ $user->email }}
                </p>
            </div>
        </div>

        <div class="bg-surface-container-lowest rounded-xl p-xl border border-outline-variant shadow-[0px_4px_20px_rgba(0,0,0,0.04)]">
            <h3 class="text-label-lg font-label-lg text-outline uppercase tracking-wider mb-lg flex items-center gap-xs">
                <span class="material-symbols-outlined">desk</span> Desk Logistics
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-xl">
                <div class="space-y-xs">
                    <span class="text-label-md text-outline block">Office Number</span>
                    <p class="text-body-lg font-bold text-on-surface">{{ $user->receptionist?->office_number ?? 'N/A' }}</p>
                </div>
                <div class="space-y-xs">
                    <span class="text-label-md text-outline block">Location / Department Desk</span>
                    <p class="text-body-lg font-bold text-on-surface">{{ $user->receptionist?->location ?? 'N/A' }}</p>
                </div>
            </div>
        </div>
    </div>
</x-layouts.main>