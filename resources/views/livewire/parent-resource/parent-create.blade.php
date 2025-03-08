<div>
    <flux:modal name="create-parent" class="w-full">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Create Parent</flux:heading>
                <flux:subheading>Enter parent details.</flux:subheading>
            </div>

            <flux:input label="Parent Name" wire:model="name" placeholder="Enter parent name" />

            <flux:select label="Select Student" wire:model="student_id">
                <option value="">-- Select Student --</option>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </flux:select>

            {{-- <flux:select label="Select Classroom" wire:model="class_id">
                <option value="">-- Select Classroom --</option>
                @foreach ($classrooms as $classroom)
                    <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                @endforeach
            </flux:select> --}}

            <div class="flex">
                <flux:spacer />
                <flux:button type="submit" variant="primary" wire:click.prevent="store">Save</flux:button>
            </div>
        </div>
    </flux:modal>


</div>
