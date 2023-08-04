<x-guest-layout>
    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <!-- First Name -->
        <div>
            <x-input-label for="first-name" :value="__('First Name')" />
            <x-text-input id="first-name" class="block mt-1 w-full" type="text" name="first_name"
                :value="old('first_name')" required autofocus autocomplete="name" />
            @error('first_name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Last Name -->
        <div class="mt-4">
            <x-input-label for="last-name" :value="__('Last Name')" />
            <x-text-input id="last-name" class="block mt-1 w-full" type="text" name="last_name"
                :value="old('last_name')" required autocomplete="name" />
            @error('last_name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Username -->
        <div class="mt-4">
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')"
                required autocomplete="username" />
            @error('username')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />

                @error('password_confirmation')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-primary-button class="ml-4">
                    {{ __('Create user') }}
                </x-primary-button>
            </div>
    </form>
</x-guest-layout>
