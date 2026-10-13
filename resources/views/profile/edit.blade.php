<x-app-layout>
    <x-slot name="header">
        {{ __('Profile') }}
    </x-slot>

    <div class="max-w-2xl space-y-6">
        <div class="card p-6 sm:p-8">
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="card p-6 sm:p-8">
            @include('profile.partials.update-password-form')
        </div>
    </div>
</x-app-layout>
