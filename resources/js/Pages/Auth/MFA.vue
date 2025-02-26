<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';
import ReCaptcha from '@/Components/Auth/Captcha.vue';
import Swal from 'sweetalert2';
import { onMounted } from 'vue';

const props = defineProps({
    signedUrl: String,
});


const form = useForm({
    code: '',
    token_captcha: ''
});

const submit = () => {

    if (!form.token_captcha) {
        form.errors.token_captcha = 'Verifica que no eres un robot.';
        return;
    }
    form.post(props.signedUrl, {
        preserveScroll: true,
        data: {
            code: form.code,
            token_captcha: form.token_captcha,
        },
        onFinish: (es) =>{
            console.log(es);
        } ,
        onSuccess: (response) => {
            console.log(response);
        },
        onError: (error) => {
            console.log(error);
        }
    });


};

</script>

<template>
    <GuestLayout>

        <Head title="Verificación de Código" />

        <div class="mb-4 text-center">
            <p class="text-gray-600">Ingresa el código de verificación enviado a tu correo.</p>
        </div>

        <form @submit.prevent="submit" class="space-y-4">
            <div>
                <InputLabel for="code" value="Código de verificación" />

                <TextInput id="code" type="text" class="mt-1 block w-full" v-model="form.code" required autofocus />

                <InputError class="mt-2" :message="form.errors.code" />
            </div>

            <div class="block mt-4">
                <ReCaptcha v-if="!form.processing" :setToken="value => form.token_captcha = value" />
                <InputError class="mt-2" :message="form.errors.token_captcha" />
            </div>

            <div class="flex items-center justify-center">
                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Verificar Código
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
