<x-layouts.main title="Student Profile">
    <div class="max-w-[900px] w-full space-y-lg mx-auto">
 <div
            class="bg-surface-container-lowest rounded-xl p-xl border border-outline-variant shadow-[0px_4px_20px_rgba(0,0,0,0.04)] flex flex-col md:flex-row items-center gap-xl">

            <div class="relative group inline-block">
                <img class="w-24 h-24 rounded-full object-cover border-2 border-outline/20 group-hover:opacity-70 transition-opacity duration-200"
                    src="{{ $user->avatar }}" alt="{{ $user->name }}">

                <form action="{{ route('dashboard.profile.avatar.update') }}" method="POST" enctype="multipart/form-data"
                    id="avatar-update-form" class="hidden">
                    @csrf
                    @method('PUT')
                    <input type="file" name="image" id="avatar-input" accept="image/*"
                        onchange="document.getElementById('avatar-update-form').submit()">
                </form>

                <label for="avatar-input"
                    class="absolute inset-0 flex items-center justify-center bg-black/40 text-white opacity-0 group-hover:opacity-100 rounded-full cursor-pointer transition-opacity duration-200">
                    <span class="material-symbols-outlined">edit</span>
                </label>

                @if ($user->image)
                    <form action="{{ route('dashboard.profile.avatar.destroy') }}" method="POST"
                        class="absolute -bottom-1 -right-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-error text-on-error rounded-full p-1.5 shadow-md hover:bg-error/90 transition-colors flex items-center justify-center"
                            title="Delete Avatar"
                            onclick="return confirm('Are you sure you want to delete your avatar?')">
                            <span class="material-symbols-outlined text-[16px]">delete</span>
                        </button>
                    </form>
                @endif
            </div>

            <div class="text-center md:text-left space-y-xs flex-1">
                <span
                    class="px-md py-0.5 bg-outline/10 text-outline border border-outline text-label-md font-label-md rounded-full uppercase">
                    {{ $user->role }}
                </span>
                <h1 class="text-headline-md font-headline-md text-on-surface font-bold mt-sm">{{ $user->name }}</h1>
                <p
                    class="text-body-md text-on-surface-variant flex items-center justify-center md:justify-start gap-xs">
                    <span class="material-symbols-outlined text-[18px]">mail</span> {{ $user->email }}
                </p>
            </div>
        </div>
   


    <div
        class="bg-surface-container-lowest rounded-xl p-xl border border-outline-variant shadow-[0px_4px_20px_rgba(0,0,0,0.04)]">
        <h3 class="text-label-lg font-label-lg text-primary uppercase tracking-wider mb-lg flex items-center gap-xs">
            <span class="material-symbols-outlined">school</span> Academic & Clinical Info
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-xl">
            <div class="space-y-xs">
                <span class="text-label-md text-outline block">Gender</span>
                <p class="text-body-lg font-bold text-on-surface capitalize">{{ $user->student?->gender ?? 'N/A' }}</p>
            </div>
            <div class="space-y-xs">
                <span class="text-label-md text-outline block">Birth Date</span>
                <p class="text-body-lg font-bold text-on-surface">
                    {{ $user->student?->birth ? \Carbon\Carbon::parse($user->student->birth)->format('M d, Y') : 'N/A' }}
                </p>
            </div>
            <div class="space-y-xs">
                <span class="text-label-md text-outline block">Mobile Number</span>
                <p class="text-body-lg font-bold text-on-surface">{{ $user->student?->mobile ?? 'N/A' }}</p>
            </div>
            <div class="space-y-xs">
                <span class="text-label-md text-outline block">Assigned Supervisor</span>
                <p class="text-body-lg font-bold text-primary hover:underline">
                    {{ $user->student?->supervisor?->user?->name ?? 'Not Assigned' }}
                </p>
            </div>
        </div>
    </div> </div>
    </div>
</x-layouts.main>
