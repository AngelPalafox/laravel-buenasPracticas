<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import ReCaptcha from '@/Components/Auth/Captcha.vue';
import Swal from 'sweetalert2';
const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    token_captcha: null,
});

const submit = () => {
    if (form.token_captcha === null) {
        form.errors.token_captcha = 'Verifica que no eres un robot.';
        return;
    }
    form.post(route('register'), {
        onFinish: () => {
            form.reset('password', 'password_confirmation', 'token_captcha');
        },
        onSuccess: (response) => {
            Swal.fire({
                icon: 'success',
                title: 'Registro exitoso',
                text: 'Verifica tu correo para activar tu cuenta.',
            }).then((t) => {
                window.location.href = route('login');
            });
        },
        onError: (error) => {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Intenta de nuevo',
            });
        },
    });
};
</script>

<template>
    <GuestLayout>

        <Head title="Register" />

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="Name" />

                <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus
                    autocomplete="name" />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="Email" />

                <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required
                    autocomplete="username" />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />

                <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required
                    autocomplete="new-password" />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Confirm Password" />

                <TextInput id="password_confirmation" type="password" class="mt-1 block w-full"
                    v-model="form.password_confirmation" required autocomplete="new-password" />

                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>
            <div class="block mt-4">
                <ReCaptcha v-if="!form.processing" :setToken="value => form.token_captcha = value"
                    :error="form.errors.token_captcha" />
            </div>
            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Already registered?
                </Link>

                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
