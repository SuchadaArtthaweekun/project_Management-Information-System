<x-guest-layout>
    <x-auth-card>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

        @if ($message = Session::get('warning'))
            <div class="alert alert-warning alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

        @if ($message = Session::get('info'))
            <div class="alert alert-info alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                Please check the form below for errors
            </div>
        @endif
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- name_th -->
            <div>
                <x-label for="name" :value="__('name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus />
            </div>

            <!-- Name_en -->
            <div>
                <x-label for="name_en" :value="__('name_en')" />

                <x-input id="name_en" class="block mt-1 w-full" type="text" name="name_en" :value="old('name_en')"
                    required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required />
            </div>

            <!-- user_tel -->
            <div class="mt-4">
                <x-label for="user_tel" :value="__('phone number')" />

                <x-input id="user_tel" class="block mt-1 w-full" type="text" name="user_tel" :value="old('user_tel')"
                    required />
            </div>

            <!-- level -->
            <div class="mt-4">
                <x-label for="level" :value="__('ระดับ')" aria-placeholder="เช่น รหัสนักศึกษา" />

                <select class="form-control" id="exampleFormControlSelect1" name="level"
                    placeholder="รุ่น ปีการศึกษาที่เข้าเรียน">
                    <option selected value="นักศึกษา">นักศึกษา</option>
                    <option value="อาจารย์">อาจารย์</option>
                </select>
            </div>

            <!-- note -->
            <div class="mt-4">
                <x-label for="note" :value="__('descript')" aria-placeholder="เช่น รหัสนักศึกษา" />

                <x-input id="note" class="block mt-1 w-full" type="text" name="note" :value="old('note')"
                    required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4" onchange="fire">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('firstRegister') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

<script>
    Swal.fire('Any fool can use a computer')
</script>
