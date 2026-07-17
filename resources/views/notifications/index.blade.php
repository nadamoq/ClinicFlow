<x-layouts.main>
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-xl">
        <div>
            <h2 class="font-headline-lg text-headline-lg text-on-surface">Notifications</h2>
            <p class="font-body-md text-body-md text-on-surface-variant">Stay updated with your clinical appointments and student evaluations.</p>
        </div>
        <div class="flex items-center gap-3">
            @if (auth()->user()->unreadNotifications->count() > 0)
                <form action="{{ route('dashboard.notifications.markAllAsRead') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="flex items-center gap-2 px-4 py-2 rounded-lg font-label-md text-label-md text-primary bg-primary-fixed hover:bg-primary transition-all hover:text-on-primary active:scale-95">
                        <span class="material-symbols-outlined text-[18px]">done_all</span>
                        Mark All as Read
                    </button>
                </form>
            @endif
        </div>
    </div>

    <!-- Notifications Feed -->
    <div class="space-y-4">
        @forelse($notifications as $notification)
            @php
                $isUnread = $notification->unread();
                $type = class_basename($notification->type);
                $isAppointment = $type === 'SupervisorAppointmentNotification';
                $isEvaluation = $type === 'EvalutedStudentNotification';
               

            @endphp
              
            <div class="rounded-xl p-md flex items-start gap-4 notification-item group relative overflow-hidden transition-all duration-300
                {{ $isUnread ? 'bg-surface-container-low border border-primary/20 shadow-sm' : 'bg-white border border-surface-variant opacity-80' }}">

                @if ($isUnread)
                    <div class="absolute left-0 top-0 bottom-0 w-1 bg-primary"></div>
                @endif

                <!-- Dynamic Icon -->
                <div class="w-12 h-12 flex-shrink-0 rounded-xl flex items-center justify-center 
                    {{ $isAppointment ? 'bg-primary-container text-primary' : 'bg-secondary-container text-on-secondary-container' }}">
                    <span class="material-symbols-outlined text-[24px]">
                        {{ $isAppointment ? 'calendar_month' : 'grade' }}
                    </span>
                </div>

                <!-- Notification Content -->
                <div class="flex-1 min-w-0">
                    <div class="flex justify-between items-start mb-1">
                        <h4 class="font-headline-sm text-[16px] text-on-surface font-semibold">
                            {{ $isAppointment ? 'New Appointment Request' : 'Clinical Evaluation Received' }}
                        </h4>
                        <span class="text-[11px] font-medium text-on-surface-variant whitespace-nowrap ml-2">
                            {{ $notification->created_at->diffForHumans() }}
                        </span>
                    </div>

                    <p class="font-body-md text-on-surface-variant">
                        @if ($isAppointment)
                            Student <span class="font-semibold text-on-surface">{{ $notification->data['student_name'] }}</span> has requested a consultation on 
                            <span class="font-medium">{{ $notification->data['date'] }}</span> at {{ \Carbon\Carbon::parse($notification->data['start_time'])->format('h:i A') }}
                        @elseif($isEvaluation)
                            Your clinical performance for 
                            <span class="font-semibold text-on-surface">{{ $notification->data['appointment']['patient']['name'] ?? 'Case' }}</span> 
                            has been graded: <span class="font-bold text-primary">{{ $notification->data['mark'] }}%</span>.
                        @endif
                    </p>
                    
                    <!-- Action Buttons -->
                    {{-- <div class="flex items-center gap-3 mt-4">
                        <a href="{{ $isAppointment ? route('dashboard.appointments.show',$notification->data['appointment_id']) : route('dashboard.evaluations.show',$notification->data['evaluation_id']) }}"
                            class="px-4 py-1.5 {{ $isUnread ? 'bg-primary text-on-primary' : 'border border-outline text-on-surface-variant' }} rounded-lg font-label-md text-label-md hover:opacity-80 transition-opacity">
                            View Details
                        </a> --}}

                        @if ($isUnread)
                            <form action="{{ route('dashboard.notifications.read', $notification->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="px-4 py-1.5 text-on-surface-variant hover:text-primary font-label-md text-label-md transition-colors">
                                    Mark as Read
                                </button>
                            </form>
                        @endif
                    </div>
                </div>

                <!-- Delete Action -->
                <div class="flex flex-col gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                    <form action="{{ route('dashboard.notifications.destroy', $notification->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" class="p-1.5 rounded-md text-on-surface-variant hover:bg-error-container hover:text-error transition-colors">
                            <span class="material-symbols-outlined text-[20px]">delete</span>
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="text-center py-16 border-2 border-dashed border-surface-variant rounded-2xl">
                <span class="material-symbols-outlined text-[48px] text-surface-variant block mb-4">notifications_off</span>
                <h3 class="font-headline-sm text-on-surface">All caught up!</h3>
                <p class="text-on-surface-variant">You have no new notifications.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-xl flex justify-center">
        {{ $notifications->links() }}
    </div>
</x-layouts.main>