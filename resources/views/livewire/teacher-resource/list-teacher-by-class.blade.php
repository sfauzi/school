<div class="max-w-6xl mx-auto p-6 shadow-md rounded-lg">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-semibold text-gray-700">List Teacher by Class</h2>
    </div>

    <!-- Dropdown untuk memilih kelas -->
    <div class="mb-4">
        <select wire:model.live="class_id" class="border border-gray-300 rounded-lg p-2 w-full">
            @foreach ($classes as $classroom)
                <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Tabel List Guru -->
    <div class="overflow-x-auto">
        <table class="w-full border border-gray-300 rounded-lg">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="py-2 px-4 border">Teacher Name</th>
                    <th class="py-2 px-4 border">Class</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($teachers as $teacher)
                    <tr class="hover:bg-gray-100 transition">
                        <td class="py-2 px-4 border">{{ $teacher->name }}</td>
                        <td class="py-2 px-4 border text-center">
                            {{ $teacher->classroom ? $teacher->classroom->name : 'No Class' }}
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
