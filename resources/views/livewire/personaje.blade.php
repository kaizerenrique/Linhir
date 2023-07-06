<div>
    <p class="m-4 dark:text-gray-200">Hola Mundo XD</p>

    <x-secondary-button wire:click="modalprueba()" wire:loading.attr="disabled">
        {{ __('Modal') }}
    </x-secondary-button>

     <!-- Delete User Confirmation Modal -->
     <x-dialog-modal wire:model="modalPrueba">
        <x-slot name="title">
            {{ __('Delete Account') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}

            
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('modalPrueba')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="" wire:loading.attr="disabled">
                {{ __('Delete Account') }}
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>
