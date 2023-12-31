<div class="bg-danger-subtle p-3 rounded">
    <header>
        <div class="h4 p-2 mb-4 text-danger border-bottom border-danger">
            {{ __('Delete Account') }}
        </div>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirm-user-deletion">
        {{ __('Delete Account') }}
    </button>

    <div class="modal fade" id="confirm-user-deletion" tabindex="-1" aria-labelledby="confirm-user-deletion-label"
        aria-hidden="true">
        <div class="modal-dialog">
            <form method="post" action="{{ route('admin.profile.destroy') }}" class="modal-content p-6">
                @csrf
                @method('delete')

                <div class="p-4">

                    <h2 class="modal-title text-lg font-medium text-gray-900" id="confirm-user-deletion-label">
                        {{ __('Are you sure you want to delete your account?') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                    </p>

                    <div class="mt-6">
                        <label for="password" class="visually-hidden">{{ __('Password') }}</label>

                        <input id="password" name="password" type="password" class="form-control"
                            placeholder="{{ __('Password') }}" />

                        <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                    </div>

                    <div class="mt-3 d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">
                            {{ __('Cancel') }}
                        </button>

                        <button type="submit" class="btn btn-danger ml-3">
                            {{ __('Delete Account') }}
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
