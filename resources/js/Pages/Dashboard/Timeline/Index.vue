<script setup>
import { ref } from 'vue';
import { Head } from '@inertiajs/vue3';

// Dados fictícios para alimentar a tabela
const cronograma = ref([
    { codigo: '001', data: '2024-12-01', atividade: 'Plantação de soja para colheita no primeiro semestre', status: 'Ativo', acao: 'Visualizar' },
    { codigo: '002', data: '2024-12-05', atividade: 'Instalação e calibração do sistema de irrigação por gotejamento', status: 'Ativo', acao: 'Visualizar' },
    { codigo: '003', data: '2024-12-10', atividade: 'Reparo completo da cerca ao redor da propriedade devido a danos causados por intempéries', status: 'Suspenso', acao: 'Visualizar' },
    { codigo: '004', data: '2024-12-15', atividade: 'Aplicação de fertilizantes líquidos para melhoria da qualidade do solo em todas as áreas agrícolas', status: 'Ativo', acao: 'Visualizar' },
]);
</script>

<template>
    <Head title="Home"></Head>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h5 mb-0 text-gray-800">CRONOGRAMA</h1>
    </div>

    <div class="card p-5 mt-4">
        <table class="table table-hover table-sm">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Data Programada</th>
                    <th>Atividade</th>
                    <th>Status</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in cronograma" :key="index">
                    <td>{{ item.codigo }}</td>
                    <td>{{ item.data }}</td>
                    <td>{{ item.atividade }}</td>
                    <td :class="item.status == 'Ativo' ? 'text-success' : 'text-danger'">{{ item.status }}</td>
                    <td class="d-flex gap-1">
                        <button class="btn btn-primary btn-sm ">Visualizar</button>
                        <button class="btn btn-primary btn-sm">Monitorar</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
