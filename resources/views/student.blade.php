<x-layouts.app>

    <flux:heading size="xl" level="1">Student</flux:heading>
    <flux:subheading size="lg" class="mb-6">{{ __('Manage your student ') }}</flux:subheading>
    <flux:separator variant="subtle" />

    @livewire('student-resource.list-student')

</x-layouts.app>
