<div>
    <flux:modal name="create-teacher" class="w-full">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Create Teacher</flux:heading>
                <flux:subheading>Enter teacher details.</flux:subheading>
            </div>

            <flux:input label="Teacher Name" wire:model="name" placeholder="Enter teacher name" />

            <flux:select label="Select Classroom" wire:model="class_id">
                <option value="">-- Select Classroom --</option>
                @foreach ($classrooms as $classroom)
                    <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                @endforeach
            </flux:select>

            <div class="flex">
                <flux:spacer />
                <flux:button type="submit" variant="primary" wire:click.prevent="store">Save</flux:button>
            </div>
        </div>
    </flux:modal>


</div>
