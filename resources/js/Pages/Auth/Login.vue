<script setup>
import { useForm, Head, Link } from '@inertiajs/vue3';

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

    <div class="d-flex align-items-center text-center py-5 vh-100">
        <div class="form-signin w-lg-25 m-auto">
            <div class="card p-5">
                <form @submit.prevent="form.post(route('login_store'))">
                    <h1 class="h3 mb-3 fw-bold text-primary text-uppercase">painel de dashboard</h1>
                    <div v-if="props.flash.error" class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ props.flash.error }}
                    </div>
                    <div class="form-floating mt-2">
                        <input type="email" class="form-control" id="floatingEmail" v-model="form.email"
                            placeholder="name@example.com">
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating mt-2">
                        <input type="password" class="form-control" id="floatingPassword" v-model="form.password"
                            placeholder="Password">
                        <label for="floatingPassword">Senha</label>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mt-3">Entrar</button>
                </form>
                <Link class="mt-4 link-dark" :href="route('register')" aria-label="registre-se">Ainda não possui uma conta? Registra-se</Link>
            </div>
        </div>
    </div>
</template>
