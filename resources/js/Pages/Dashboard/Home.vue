<script setup>
import { ref } from 'vue';
import { Head } from '@inertiajs/vue3';
import CardSimple from '@/js/Components/CardSimple.vue';

// Importa o componente BarChart
import { BarChart } from 'vue-chart-3';
// Importa o Chart.js e registra os componentes necessários
import {
  Chart as ChartJS,
  BarController,
  BarElement,
  CategoryScale,
  LinearScale,
  Title,
  Tooltip,
  Legend,
} from 'chart.js';

// Registra os componentes do Chart.js
ChartJS.register(BarController, BarElement, CategoryScale, LinearScale, Title, Tooltip, Legend);

const items = [
  {
    id: 1,
    title: 'previsão da proxima chuva',
    value: '2 dias',
    icon: 'fas fa-calendar',
    borderColor: 'primary',
    titleColor: 'text-primary',
  },
  {
    id: 2,
    title: 'recuperação (mês)',
    value: 'R$ 480,00',
    icon: 'fas fa-dollar-sign',
    borderColor: 'success',
    titleColor: 'text-success',
  },
  {
    id: 3,
    title: 'qualidade da água',
    value: '85%',
    icon: 'fas fa-droplet',
    borderColor: 'primary',
    titleColor: 'text-primary',
  },
  {
    id: 4,
    title: 'analises pendentes',
    value: '5',
    icon: 'fas fa-envelope',
    borderColor: 'warning',
    titleColor: 'text-warning',
  },
];

const chartData = ref({
  labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril'],
  datasets: [
    {
      label: 'Vendas',
      backgroundColor: '#42A5F5',
      data: [65, 59, 80, 81],
    },
  ],
});

const chartOptions = ref({
  responsive: true,
  maintainAspectRatio: false,
});
</script>

<template>
    <Head title="Home"></Head>

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h5 mb-0 text-gray-800">DASHBOARD</h1>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4" v-for="item in items" :key="item.id">
                <CardSimple
                    :title="item.title"
                    :value="item.value"
                    :icon="item.icon"
                    :borderColor="item.borderColor"
                    :titleColor="item.titleColor"
                />
            </div>
        </div>

        <div class="mt-5">
            <BarChart :chart-data="chartData" :options="chartOptions" />
        </div>
    </div>
</template>

