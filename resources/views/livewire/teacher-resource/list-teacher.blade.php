<div>
    <div class="max-w-6xl mx-auto p-6 shadow-md rounded-lg">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-700">List Teacher</h2>
        </div>
        <flux:modal.trigger name="create-teacher">
            <flux:button variant="primary">Create Teacher</flux:button>
        </flux:modal.trigger>

        @livewire('teacher-resource.teacher-create')
        @livewire('teacher-resource.teacher-edit')

        <flux:modal name="delete-teacher" class="min-w-[22rem]">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Delete teacher?</flux:heading>

                    <flux:subheading>
                        <p>You're about to delete this teacher.</p>
                        <p>This action cannot be reversed.</p>
                    </flux:subheading>
                </div>

                <div class="flex gap-2">
                    <flux:spacer />

                    <flux:modal.close>
                        <flux:button variant="ghost">Cancel</flux:button>
                    </flux:modal.close>

                    <flux:button type="submit" variant="danger" wire:click="destroy">Delete teacher</flux:button>
                </div>
            </div>
        </flux:modal>

        <div class="overflow-x-auto mt-[30px]">
            <table class="w-full border border-gray-300 rounded-lg">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="py-2 px-4 border">Teacher Name</th>
                        <th class="py-2 px-4 border">Teacher Class</th>
                        <th class="py-2 px-4 border">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teachers as $teacher)
                        <tr class=" hover:bg-gray-100 transition">
                            <td class="py-2 px-4 border">{{ $teacher->name }}</td>
                            <td class="py-2 px-4 border text-center">
                                {{ $teacher->classroom ? $teacher->classroom->name : 'No Class' }}
                            </td>
                            <td class="py-2 px-4 border text-center">
                                <flux:button variant="primary" wire:click="edit('{{ $teacher->id }}')" size="sm">
                                    Edit
                                </flux:button>

                                <flux:button wire:click="delete('{{ $teacher->id }}')" size="sm">
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
