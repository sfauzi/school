<div>
    <div class="max-w-6xl mx-auto p-6 shadow-md rounded-lg">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-700">List Classroom</h2>
        </div>
        <flux:modal.trigger name="create-classroom">
            <flux:button variant="primary">Create Classroom</flux:button>
        </flux:modal.trigger>

        @livewire('classroom-resource.classroom-create')
        @livewire('classroom-resource.classroom-edit')

        <flux:modal name="delete-classroom" class="min-w-[22rem]">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Delete class?</flux:heading>

                    <flux:subheading>
                        <p>You're about to delete this class.</p>
                        <p>This action cannot be reversed.</p>
                    </flux:subheading>
                </div>

                <div class="flex gap-2">
                    <flux:spacer />

                    <flux:modal.close>
                        <flux:button variant="ghost">Cancel</flux:button>
                    </flux:modal.close>

                    <flux:button type="submit" variant="danger" wire:click="destroy">Delete class</flux:button>
                </div>
            </div>
        </flux:modal>

        <div class="overflow-x-auto mt-[30px]">
            <table class="w-full border border-gray-300 rounded-lg">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="py-2 px-4 border">Class Name</th>
                        <th class="py-2 px-4 border">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($classrooms as $classroom)
                        <tr class=" hover:bg-gray-100 transition">
                            <td class="py-2 px-4 border">{{ $classroom->name }}</td>
                            <td class="py-2 px-4 border text-center">
                                <flux:button variant="primary" wire:click="edit('{{ $classroom->id }}')" size="sm">
                                    Edit
                                </flux:button>

                                <flux:button wire:click="delete('{{ $classroom->id }}')" size="sm">
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
