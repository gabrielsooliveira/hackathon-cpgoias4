<script setup>
import { ref, onMounted } from 'vue';
import { Head } from '@inertiajs/vue3';
import axios from 'axios';

const historyData = ref([]);

// Função para simular dados ou obter dados do backend
const fetchHistoryData = async () => {
  try {
    // Simulando os dados. Substitua com chamada à API real quando disponível
    historyData.value = [
      { date: '2024-12-01', tempSurface: 22, solarRadiation: 200, tempMax: 25, tempMin: 18 },
      { date: '2024-12-02', tempSurface: 24, solarRadiation: 450, tempMax: 30, tempMin: 20 },
      { date: '2024-12-03', tempSurface: 28, solarRadiation: 500, tempMax: 33, tempMin: 22 },
      { date: '2024-12-04', tempSurface: 26, solarRadiation: 300, tempMax: 28, tempMin: 19 },
    ];
  } catch (error) {
    console.error('Erro ao obter dados históricos:', error);
  }
};

onMounted(() => {
  fetchHistoryData();
});
</script>

<template>
  <Head title="Histórico de Dados"></Head>

  <div class="container-fluid">
    <div class="row align-items-center mb-1">
        <div class="col-md-4 col-12">
            <h1 class="h5 mb-0 text-gray-800">HISTÓRICO DE DADOS</h1>
        </div>
        <div class="col-md-7 col-12 d-grid d-lg-flex gap-2 justify-content-lg-end mt-2">
            <a class="btn btn-secondary btn-sm fw-bold" aria-label="add product">
            + Adicionar Novo Produto
            </a>
            <button class="btn btn-primary btn-sm fw-bold" @click="showModalFilterProducts()">
                <font-awesome-icon icon="fa-solid fa-filter" /> Filtrar
            </button>
        </div>
    </div>
    <!-- Tabela de Histórico -->
    <div class="table-responsive mt-4">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Data</th>
            <th>Temperatura na Superfície (°C)</th>
            <th>Duração de Radiação Solar (s)</th>
            <th>Temperatura Máxima (°C)</th>
            <th>Temperatura Mínima (°C)</th>
          </tr>
        </thead>
        <tbody>
          <!-- Loop através dos dados históricos e exibe as informações -->
          <tr v-for="(item, index) in historyData" :key="index">
            <td>{{ item.date }}</td>
            <td>{{ item.tempSurface }}</td>
            <td>{{ item.solarRadiation }}</td>
            <td>{{ item.tempMax }}</td>
            <td>{{ item.tempMin }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<style scoped>
/* Estilo para a tabela */
.table {
  width: 100%;
  margin-top: 20px;
}

.table th, .table td {
  text-align: center;
  padding: 8px;
}

.table-striped tbody tr:nth-child(odd) {
  background-color: #f9f9f9;
}

.table-bordered {
  border: 1px solid #ddd;
}
</style>
