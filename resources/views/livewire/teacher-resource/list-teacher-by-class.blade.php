<div class="max-w-6xl mx-auto p-6 shadow-md rounded-lg">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-semibold text-gray-700">List Teacher by Class</h2>
    </div>

    <div class="mb-4">
        <select wire:model.live="class_id" class="border border-gray-300 rounded-lg p-2 w-full">
            @foreach ($classes as $classroom)
                <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
            @endforeach
        </select>
    </div>

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

    <div class="overflow-x-auto">
        <table class="w-full border border-gray-300 rounded-lg">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="py-2 px-4 border">Teacher Name</th>
                    <th class="py-2 px-4 border">Class</th>
                    <th class="py-2 px-4 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($teachers as $teacher)
                    <tr class="hover:bg-gray-100 transition">
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
                @empty
                    <tr>
                        <td colspan="2" class="py-2 px-4 border text-center text-gray-500">
                            No teachers in this class.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
