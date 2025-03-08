<x-layouts.app>

    <flux:heading size="xl" level="1">Parent</flux:heading>
    <flux:subheading size="lg" class="mb-6">{{ __('Manage your parent ') }}</flux:subheading>
    <flux:separator variant="subtle" />

    @livewire('parent-resource.list-parent')

</x-layouts.app>
