<template>
 <div>
    <select v-model="selectedTimeFrame">
      <option value="day">Day</option>
      <option value="week">Week</option>
      <option value="month">Month</option>
    </select>
    <canvas ref="chartContainer" style="height: 370px; width: 100%;"></canvas>
 </div>
</template>

<script setup>
import { ref, onMounted, watch } from 'vue';
import { usePage } from '@inertiajs/vue3';

const { props } = usePage();
const selectedTimeFrame = ref('day');
const chartContainer = ref(null);
const chartInstance = ref(null);

// Access totalSales from props
const totalSales = ref(props.totalSales || 0);

const chartData = ref([]);
const chartLabels = ref([]);

const fetchAndUpdateChart = async () => {
 // Fetch revenue data from the backend based on the selected time frame
 const response = await fetch(`/admin/revenue-data?timeFrame=${selectedTimeFrame.value}`);
 const revenueData = await response.json();

 // Update chartData and chartLabels with the fetched data
 chartData.value = revenueData.map(data => data.total_revenue);
 chartLabels.value = revenueData.map(data => data.date); // Adjust this based on your date format

 // Calculate total revenue from the fetched data
 totalSales.value = revenueData.reduce((a, b) => a + b.total_revenue, 0);

 renderChart();
};

const renderChart = () => {
 if (chartContainer.value) {
    const ctx = chartContainer.value.getContext('2d');
    // Destroy the existing chart instance if it exists
    if (chartInstance.value) {
      chartInstance.value.destroy();
    }
    // Create a new chart instance
    chartInstance.value = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: chartLabels.value,
        datasets: [{
          label: 'Total Revenue',
          data: chartData.value,
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
 }
};

// Watch for changes to selectedTimeFrame and update the chart
watch(selectedTimeFrame, () => {
 fetchAndUpdateChart();
});

// Call fetchAndUpdateChart when the component is mounted
onMounted(() => {
 fetchAndUpdateChart();
});
</script>
