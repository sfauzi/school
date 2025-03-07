<x-layouts.app>

    <flux:heading size="xl" level="1">Listing Student By Clas</flux:heading>
    <flux:subheading size="lg" class="mb-6">{{ __('View and manage students based on selected class') }}</flux:subheading>
    <flux:separator variant="subtle" />

    @livewire('student-resource.list-student-by-class')

</x-layouts.app>
