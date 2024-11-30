<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { Head } from '@inertiajs/vue3';
import CardSimple from '@/js/Components/CardSimple.vue';

// Importa os componentes do Chart.js e o LineChart
import { BarChart } from 'vue-chart-3';
import { LineChart } from 'vue-chart-3';

import {
  Chart as ChartJS,
  BarController,
  BarElement,
  CategoryScale,
  LinearScale,
  LineController, // Importa o LineController
  LineElement, // Importa o LineElement
  PointElement, // Importa o PointElement
  Title,
  Tooltip,
  Legend,
} from 'chart.js';

// Registra os controladores e elementos necessários no Chart.js
ChartJS.register(
  BarController,
  BarElement,
  CategoryScale,
  LinearScale,
  LineController, // Registra o LineController
  LineElement, // Registra o LineElement
  PointElement, // Registra o PointElement
  Title,
  Tooltip,
  Legend
);


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
  labels: [], // Horas (6, 12, 18, etc.)
  datasets: [
    {
      label: 'Temperatura na Superfície (°C)',
      backgroundColor: '#42A5F5',
      borderColor: '#1E88E5',
      data: [], // Valores correspondentes às horas
    }
  ],
});

const chartRaidData = ref({
  labels: [], // Horas (6, 12, 18, etc.)
  datasets: [
    {
      label: 'Duração de Radiação Solar (s)',
      backgroundColor: '#FF9933',
      borderColor: '#1E88E5',
      pointBackgroundColor: '#FF9933', // Cor dos pontos da linha
      pointBorderColor: '#FF9933',     // Cor da borda dos pontos
      data: [], // Valores correspondentes às horas
      fill: false, // Não preencher a área abaixo da linha
      tension: 0.1, // Controla a suavização da linha (0 para linha reta)
    },
  ],
});

const chartTempData = ref({
  labels: [], // Horas (6, 12, 18, etc.)
  datasets: [
    {
      label: 'Temperatura máxima',
      backgroundColor: '#E13E3B',
      borderColor: '#1E88E5',
      data: [], // Valores correspondentes às horas
    },{
      label: 'Temperatura mínima',
      backgroundColor: '#2492E0',
      borderColor: '#1E88E5',
      data: [], // Valores correspondentes às horas
    },
  ],
});

const chartOptions = ref({
  responsive: true,
  maintainAspectRatio: false,
  plugins: {
    title: {
      display: true,
      text: 'Temperatura máxima e mínima a 2m acima do solo',
    },
    tooltip: {
      mode: 'index',
      intersect: false,
    },
  },
});

const chartTempOptions = ref({
  responsive: true,
  maintainAspectRatio: false,
  plugins: {
    title: {
      display: true,
      text: 'Temperatura máxima e minima a 2m acima do solo hoje',
    },
    tooltip: {
      mode: 'index',
      intersect: false,
    },
  },
});

const chartRaidOptions = ref({
  responsive: true,
  maintainAspectRatio: false,
  plugins: {
    title: {
      display: true,
      text: 'Duração de Radiação Solar de Hoje',
    },
    tooltip: {
      mode: 'index',
      intersect: false,
    },
  },
});

// Função para obter os dados meteorológicos do backend Laravel
const fetchWeatherData = async () => {
  try {
    const response = await axios.get('/temperaturahoje');
    const weatherData = response.data.tmpsfc;
    const raidData = response.data.sunsdsfc;
    const maxTempData = response.data.tmax2m;
    const minTempData = response.data.tmin2m;

    chartData.value.labels = weatherData.map(item => `${item.horas / 10}h`);
    chartData.value.datasets[0].data = weatherData.map(item => item.valor);

    chartRaidData.value.labels = raidData.map(item => `${item.horas / 10}h`);
    chartRaidData.value.datasets[0].data = raidData.map(item => item.valor);

    chartTempData.value.labels = maxTempData.map(item => `${item.horas / 10}h`);
    chartTempData.value.datasets[0].data = maxTempData.map(item => item.valor);
    chartTempData.value.datasets[1].data = minTempData.map(item => item.valor);
  } catch (error) {
    console.error('Erro ao obter dados meteorológicos:', error);
  }
};

// Chama a função para obter os dados quando o componente é montado
onMounted(() => {
  fetchWeatherData();
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
    <div class="row mt-4">
        <div class="col-lg-6">
            <LineChart :chart-data="chartRaidData" :options="chartRaidOptions" />
        </div>
        <div class="col-lg-6">
            <BarChart :chart-data="chartTempData" :options="chartTempOptions" />
        </div>
    </div>
</template>

