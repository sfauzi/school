<div>
    <div class="max-w-6xl mx-auto p-6 shadow-md rounded-lg">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-700">List Parent</h2>
        </div>
        <flux:modal.trigger name="create-parent">
            <flux:button variant="primary">Create Parent</flux:button>
        </flux:modal.trigger>

        @livewire('parent-resource.parent-create')
        @livewire('parent-resource.parent-edit')

        <flux:modal name="delete-parent" class="min-w-[22rem]">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Delete student?</flux:heading>

                    <flux:subheading>
                        <p>You're about to delete this student.</p>
                        <p>This action cannot be reversed.</p>
                    </flux:subheading>
                </div>

                <div class="flex gap-2">
                    <flux:spacer />

                    <flux:modal.close>
                        <flux:button variant="ghost">Cancel</flux:button>
                    </flux:modal.close>

                    <flux:button type="submit" variant="danger" wire:click="destroy">Delete student</flux:button>
                </div>
            </div>
        </flux:modal>

        <div class="overflow-x-auto mt-[30px]">
            <table class="w-full border border-gray-300 rounded-lg">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="py-2 px-4 border">Parent Name</th>
                        <th class="py-2 px-4 border">Student Name</th>
                        <th class="py-2 px-4 border">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($parents as $parent)
                        <tr class=" hover:bg-gray-100 transition">
                            <td class="py-2 px-4 border">{{ $parent->name }}</td>
                            <td class="py-2 px-4 border text-center">
                                {{ $parent->student ? $parent->student->name : 'No Student' }}
                            </td>
                            <td class="py-2 px-4 border text-center">
                                <flux:button variant="primary" wire:click="edit('{{ $parent->id }}')" size="sm">
                                    Edit
                                </flux:button>

                                <flux:button wire:click="delete('{{ $parent->id }}')" size="sm">
                                    Delete
                                </flux:button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
