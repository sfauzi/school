<div>
    <flux:modal name="edit-classroom" class="w-full">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Edit Classroom</flux:heading>
                <flux:subheading>Make changes to your personal details.</flux:subheading>
            </div>

            <flux:input label="Classroom" wire:model="name" placeholder="Classroom" />

            <div class="flex">
                <flux:spacer />
                <flux:button type="submit" variant="primary" wire:click="update">Save</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
