<template>
 <div>
    <canvas class="bg-blue-500" ref="myChart"></canvas>
 </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import Chart from 'chart.js/auto';

const myChartRef = ref(null);

onMounted(() => {
 if (myChartRef.value) {
    const myChart = new Chart(myChartRef.value, {
       type: 'line',
       data: {
         labels: ['January', 'February'],
         datasets: [{
           label: 'Sample Data',
           data: [10, 20],
           backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)'],
           borderColor: ['rgb(75, 192, 192)', 'rgb(255, 99, 132)'],
           borderWidth: 1,
         }],
       },
       options: {
         scales: {
           y: {
             beginAtZero: true,
           },
         },
       },
    });
 }
});
</script>
