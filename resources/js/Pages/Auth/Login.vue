<script setup>
import { useForm , Head } from '@inertiajs/vue3';

const form = useForm({
    email: '',
    password: '',
});

const props = defineProps({
    flash: {
        type: Object,
        default: () => ({})
    }
});
</script>

<template>
    <Head title="Login"></Head>
    <div class="row mt-5 px-5">
        <div class="col-lg-6 mb-4">
            <h2 class="fw-bold text-secondary">Registre-se agora mesmo <span class="text-primary">!</span></h2>
        </div>
        <div class="col-lg-6 mb-1">
            <div class="p-5 card bg-body-tertiary">
                <div class="form-signin w-100">
                    <form @submit.prevent="form.post(route('login'))">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" v-model="form.email" type="email" required autofocus placeholder="name@example.com"/>
                            <label for="floatingInput">Email</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="password" v-model="form.password" type="password" autofocus required placeholder="password.required"/>
                            <label for="floatingPassword">Senha</label>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 text-white mt-3" aria-label="botão de login">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <Link :href="route('register')" aria-label="registre-se">Ainda não possui uma conta? Registra-se</Link>
    </div>
</template>

