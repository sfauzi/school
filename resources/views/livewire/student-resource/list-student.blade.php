<div>
    <div class="max-w-6xl mx-auto p-6 shadow-md rounded-lg">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-700">List Student</h2>
        </div>
        <flux:modal.trigger name="create-student">
            <flux:button variant="primary">Create Student</flux:button>
        </flux:modal.trigger>

        @livewire('student-resource.student-create')
        @livewire('student-resource.student-edit')

        <flux:modal name="delete-student" class="min-w-[22rem]">
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
                        <th class="py-2 px-4 border">Student Name</th>
                        <th class="py-2 px-4 border">Student Class</th>
                        <th class="py-2 px-4 border">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr class=" hover:bg-gray-100 transition">
                            <td class="py-2 px-4 border">{{ $student->name }}</td>
                            <td class="py-2 px-4 border text-center">
                                {{ $student->classroom ? $student->classroom->name : 'No Class' }}
                            </td>
                            <td class="py-2 px-4 border text-center">
                                <flux:button variant="primary" wire:click="edit('{{ $student->id }}')" size="sm">
                                    Edit
                                </flux:button>

                                <flux:button wire:click="delete('{{ $student->id }}')" size="sm">
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
