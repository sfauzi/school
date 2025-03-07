<div class="max-w-6xl mx-auto p-6 shadow-md rounded-lg">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-semibold text-gray-700">List Student by Class</h2>
    </div>

    <!-- Dropdown untuk memilih kelas -->
    <div class="mb-4">
        <flux:select wire:model.live="class_id">
            @foreach ($classes as $classroom)
                <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
            @endforeach
        </flux:select>
    </div>

    <!-- Tabel List Siswa -->
    <div class="overflow-x-auto">
        <table class="w-full border border-gray-300 rounded-lg">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="py-2 px-4 border">Student Name</th>
                    <th class="py-2 px-4 border">Class</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                    <tr class="hover:bg-gray-100 transition">
                        <td class="py-2 px-4 border">{{ $student->name }}</td>
                        <td class="py-2 px-4 border text-center">
                            {{ $student->classroom ? $student->classroom->name : 'No Class' }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="py-2 px-4 border text-center text-gray-500">
                            No students in this class.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
