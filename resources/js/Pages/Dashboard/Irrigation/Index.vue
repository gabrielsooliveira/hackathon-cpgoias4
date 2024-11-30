<script setup>
import { Head } from '@inertiajs/vue3';
import CardSimple from '@/js/Components/CardSimple.vue';

const items = [
    { id: 1, title: 'Previsão da próxima chuva', value: '2 dias', icon: 'fas fa-calendar', borderColor: 'primary', titleColor: 'text-primary' },
    { id: 2, title: 'Desenvolvimento das plantas', value: '67%', icon: 'fa-solid fa-seedling', borderColor: 'success', titleColor: 'text-success' },
    { id: 3, title: 'Qualidade da água', value: '85%', icon: 'fas fa-droplet', borderColor: 'primary', titleColor: 'text-primary' },
    { id: 4, title: 'Tempo da última irrigação', value: '5H', icon: 'fas fa-clock', borderColor: 'primary', titleColor: 'text-primary' },
];
</script>

<template>
    <Head title="Home"></Head>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h5 mb-0 text-gray-800">CONTROLE DE IRRIGAÇÃO</h1>
    </div>

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4" v-for="item in items" :key="item.id">
            <CardSimple :title="item.title" :value="item.value" :icon="item.icon" :borderColor="item.borderColor"
                :titleColor="item.titleColor" />
        </div>

        <div class="col-md-4">
            <div class="card p-5">
                <h4 class="fw-bold text-uppercase">Controle</h4>

                <div class="form-check form-switch mt-3">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                    <label class="form-check-label" for="flexSwitchCheckChecked">Irrigação da Área 1</label>
                </div>

                <div class="form-check form-switch mt-3">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                    <label class="form-check-label" for="flexSwitchCheckChecked">Irrigação da Área 2</label>
                </div>

                <div class="form-check form-switch mt-3">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                    <label class="form-check-label" for="flexSwitchCheckChecked">Irrigação da Área 3</label>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <select class="form-select" aria-label="Default select example">
                <option selected>Selecionar Área</option>
                <option value="1">Área 1</option>
                <option value="2">Área 2</option>
                <option value="3">Área 3</option>
            </select>
            <iframe class="w-100 h-100 mt-3" src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3886.8658044599915!2d-39.58637691545119!3d-13.044212728453562!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTPCsDAyJzM5LjIiUyAzOcKwMzQnNTMuNCJX!5e0!3m2!1spt-BR!2sbr!4v1732973595847!5m2!1spt-BR!2sbr" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</template>
