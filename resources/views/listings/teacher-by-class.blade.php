<x-layouts.app>

    <flux:heading size="xl" level="1">Listing Teacher By Class</flux:heading>
    <flux:subheading size="lg" class="mb-6">{{ __('View and manage teachers based on selected class') }}
    </flux:subheading>
    <flux:separator variant="subtle" />

    @livewire('teacher-resource.list-teacher-by-class')

</x-layouts.app>
