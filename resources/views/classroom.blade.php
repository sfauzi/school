<x-layouts.app>

    <flux:heading size="xl" level="1">Classroom</flux:heading>
    <flux:subheading size="lg" class="mb-6">{{ __('Manage your classroom ') }}</flux:subheading>
    <flux:separator variant="subtle" />

    @livewire('classroom-resource.list-classroom')

</x-layouts.app>
