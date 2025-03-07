<div class="max-w-6xl mx-auto p-6 shadow-md rounded-lg">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-semibold text-gray-700">List Student by Class</h2>
    </div>

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

    <div class="mb-4">
        <flux:select wire:model.live="class_id">
            @foreach ($classes as $classroom)
                <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
            @endforeach
        </flux:select>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full border border-gray-300 rounded-lg">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="py-2 px-4 border">Student Name</th>
                    <th class="py-2 px-4 border">Class</th>
                    <th class="py-2 px-4 border text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                    <tr class="hover:bg-gray-100 transition">
                        <td class="py-2 px-4 border">{{ $student->name }}</td>
                        <td class="py-2 px-4 border text-center">
                            {{ $student->classroom ? $student->classroom->name : 'No Class' }}
                        </td>
                        <td class="py-2 px-4 border text-center">
                            <flux:button variant="primary" wire:click="edit('{{ $student->id }}')" size="sm">
                                Edit
                            </flux:button>
                            <flux:button variant="danger" wire:click="delete('{{ $student->id }}')" size="sm">
                                Delete
                            </flux:button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="py-2 px-4 border text-center text-gray-500">
                            No students in this class.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
