<x-layouts.app>

    <flux:heading size="xl" level="1">Teacher</flux:heading>
    <flux:subheading size="lg" class="mb-6">{{ __('Manage your teacher ') }}</flux:subheading>
    <flux:separator variant="subtle" />

    @livewire('teacher-resource.list-teacher')

</x-layouts.app>
