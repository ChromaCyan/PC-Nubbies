<template>
  <div>
    <canvas ref="chart"></canvas>
  </div>
</template>

<script setup>
import { ref, onMounted, watch } from 'vue';
import { Line } from 'vue-chartjs';

const props = defineProps({
  chartData: Object,
  options: Object,
});

const chartRef = ref(null);

const { renderChart } = Line;

onMounted(() => {
  renderChart(chartRef.value, props.chartData, props.options);
});

watch(props.chartData, () => {
  renderChart(chartRef.value, props.chartData, props.options);
});
</script>
