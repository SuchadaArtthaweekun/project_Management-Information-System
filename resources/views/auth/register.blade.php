<head>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/dashboard.css'); ?>">
</head>
<x-guest-layout>
    <x-auth-card>
        
{{--        
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert">×</button>
            </div>
        @endif

        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert">×</button>
            </div>
        @endif

        @if ($message = Session::get('warning'))
            <div class="alert alert-warning alert-block">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert">×</button>
            </div>
        @endif

        @if ($message = Session::get('info'))
            <div class="alert alert-info alert-block">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert">×</button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                Please check the form below for errors
                <button type="button" class="close" data-dismiss="alert">×</button>
            </div>
        @endif --}}
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
                <x-label for="name" :value="__('ชื่อ-สกุล (ภาษาไทย) ไม่ต้องมีคำหน้า')" style="font-size: 16px" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus style="font-size: 16px" />
            </div>

            <!-- Name_en -->
            <div>
                <x-label for="name_en" :value="__('ชื่อ-สกุล (ภาษาอังกฤษ)')" style="font-size: 16px; margin-top:20px" />

                <x-input id="name_en" class="block mt-1 w-full" type="text" name="name_en" :value="old('name_en')"
                    required autofocus style="font-size: 16px" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('อีเมล')" style="font-size: 16px" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required style="font-size: 16px" />
            </div>

            <!-- username -->
            <div class="mt-4">
                <x-label for="username" :value="__('รหัสนักศึกษา หรือ รหัสอาจารย์')" aria-placeholder="เช่น รหัสนักศึกษา"
                    style="font-size: 16px" />

                <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')"
                    required style="font-size: 16px" />
            </div>

            <!-- user_tel -->
            <div class="mt-4">
                <x-label for="user_tel" :value="__('เบอร์โทร')" style="font-size: 16px" />

                <x-input id="user_tel" class="block mt-1 w-full" type="text" name="user_tel" :value="old('user_tel')"
                    required style="font-size: 16px" />
            </div>

            <!-- level -->
            <div class="mt-4">
                <x-label for="level" :value="__('ระดับ')" aria-placeholder="เช่น รหัสนักศึกษา"
                    style="font-size: 16px" />


                <select class="form-control" name="level" style="font-size: 14px">
                    <option value="นักศึกษา" style="font-size: 14px">นักศึกษา</option>
                    <option value="อาจารย์" style="font-size: 14px">อาจารย์</option>
                </select>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('รหัสผ่าน')" style="font-size: 16px" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" style="font-size: 16px" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('ยืนยันรหัสผ่าน')" style="font-size: 16px" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required style="font-size: 16px" />
            </div>

            <div class="flex items-center justify-end mt-4" onchange="fire">
                {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a> --}}

                <button class="ml-4 btn btn-primary" onclick="conf()">
                    เสร็จสิ้น
                <button>

            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

<script>
    function myFunction() {
        alert("I am an alert box!");
    }


    ff = () => {
    alert('You clicked the button!');
    }

    const conf = (id) => {
            Swal.fire({
                title: 'ต้องการสมัครสมาชิกใช่หรือไม่',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ตกลง',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`http://127.0.0.1:8000/store`).then((respons) => {
                        console.log(respons)
                    })
                    Swal.fire(
                        'สมัครเสร็จสิ้น!'
                    ).then(() => {
                        location.reload();
                    })
                }
            })
        }

</script>
