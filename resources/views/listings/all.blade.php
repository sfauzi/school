<x-layouts.app>

    <flux:heading size="xl" level="1">List of Students, Classes, and Teachers
    </flux:heading>
    <flux:subheading size="lg" class="mb-6">{{ __('Easily manage students and teachers by selecting a class') }}
    </flux:subheading>
    <flux:separator variant="subtle" />

    @livewire('listing')

</x-layouts.app>
