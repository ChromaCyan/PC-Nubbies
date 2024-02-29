<template>
  <div>
    <bar-chart :chart-data="chartData" :options="chartOptions" />
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { Bar, mixins } from 'vue-chartjs';

const chartData = ref({
  labels: [],
  datasets: [{
    label: 'Revenue',
    backgroundColor: '#f87979',
    data: [],
  }]
});

const chartOptions = ref({
  responsive: true,
  maintainAspectRatio: false,
  scales: {
    y: {
      beginAtZero: true
    }
  }
});

</script>
