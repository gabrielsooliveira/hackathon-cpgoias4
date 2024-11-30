<script setup>
import { useForm, Head, Link } from '@inertiajs/vue3';
import ImageSrc from '@/assets/images/imagem_registro.svg';

const form = useForm({
    name: '',
    email: '',
    address: '',
    password: '',
    password_confirmation: '',
});
</script>

<template>
    <Head title="Registro"></Head>
    <div class="container">
        <div class="row mt-5 py-5">
            <div class="col-lg-6 mb-4 pe-5">
                <img class="img-fluid" :src="ImageSrc" loading="lazy" alt="Imagem Registro">
            </div>
            <div class="col-lg-6 mb-1">
                <div class="p-5 card bg-body-tertiary">
                    <h2 class="fw-bold text-primary mt-4 text-center">Registre-se agora mesmo <span class="text-secondary">!</span></h2>
                    <div class="form-signin w-100">
                        <form @submit.prevent="form.post(route('register_store'))">
                            <div>
                                <label class="form-label mt-2" for="name">Nome</label>
                                <input class="form-control" id="name" v-model="form.name" type="text" required autocomplete="name" />
                                <span v-if="form.errors.name">{{ form.errors.name }}</span>
                            </div>

                            <div>
                                <label class="form-label mt-2" for="email">Email</label>
                                <input class="form-control" id="email" v-model="form.email" type="email" required autocomplete="email" />
                                <span v-if="form.errors.email">{{ form.errors.email }}</span>
                            </div>

                            <div>
                                <label class="form-label mt-2" for="address">Endereço</label>
                                <input class="form-control" id="address" v-model="form.address" type="address" required autocomplete="address" />
                                <span v-if="form.errors.address">{{ form.errors.address }}</span>
                            </div>

                            <div>
                                <label class="form-label mt-2" for="password">Senha</label>
                                <input class="form-control" id="password" v-model="form.password" type="password" required />
                                <span v-if="form.errors.password">{{ form.errors.password }}</span>
                            </div>

                            <div>
                                <label class="form-label mt-2" for="password_confirmation">Confirme sua senha</label>
                                <input class="form-control" id="password_confirmation" v-model="form.password_confirmation" type="password" required />
                                <span v-if="form.errors.password_confirmation">{{ form.errors.password_confirmation }}</span>
                            </div>

                            <button class="btn btn-primary w-100 text-white mt-3" type="submit" aria-label="botão de registro">Registre-se</button>
                        </form>
                    </div>

                    <Link class="mt-4 link-dark" :href="route('login')" aria-label="login">Já possue conta? Faça login</Link>
                </div>
            </div>
        </div>
    </div>
</template>
