<template>
    <AdminLayout>
        <div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
                <!-- Active Customers -->
                <div class="dashboard-card bg-gray-500 text-white">
                    <v-card-title>
                        <v-icon left>mdi-account-multiple</v-icon> Total Users (Customer)
                    </v-card-title>
                    <v-card-text class="text-xl">
                        <ul>
                            <li class="text-lg">Users: {{ totalUsers }}</li>
                        </ul>
                    </v-card-text>
                </div>
                <!-- Active Products -->
                <div class="dashboard-card bg-cyan-500 text-white">
                    <v-card-title>
                        <v-icon left>mdi-cash-multiple</v-icon> Total Revenue
                    </v-card-title>
                    <v-card-text class="text-xl">
                        <ul>
                            <li class="text-lg">Total Revenue: $ {{ totalSales }}</li>
                        </ul>
                    </v-card-text>
                </div>
                <!-- No. of Sales in Total -->
                <div class="dashboard-card bg-blue-500 text-white">
                    <v-card-title>
                        <v-icon left>mdi-cart-variant</v-icon> No. of Sales in Total
                    </v-card-title>
                    <v-card-text class="text-xl">
                        <ul>
                            <li class="text-lg">Total Sales: {{ totalSalesMade }}</li>
                        </ul>
                    </v-card-text>
                </div>
                <!-- No. of Sales (Category) -->
                <div class="dashboard-card bg-green-500 text-white">
                    <v-card-title>
                        <v-icon left>mdi-tag-multiple</v-icon> No. of Sales (Category)
                    </v-card-title>
                    <v-card-text class="text-xl">
                        <ul>
                            <li v-for="category in salesByCategory" :key="category.category_name" class="text-lg">
                                {{ category.category_name }}: {{ category.total_sales }}
                            </li>
                        </ul>
                    </v-card-text>
                </div>
                <!-- No. of Sales (Gender) -->
                <div class="dashboard-card bg-yellow-500 text-white">
                    <v-card-title>
                        <v-icon left>mdi-gender-male-female</v-icon> No. of Sales (Gender)
                    </v-card-title>
                    <v-card-text class="text-xl">
                        <ul>
                            <li v-for="gender in salesByGender" :key="gender.gender" class="text-lg">
                                {{ gender.gender ? 'Male' : 'Female' }} : {{ gender.total_sales }}
                            </li>
                        </ul>
                    </v-card-text>
                </div>
                <!-- No. of Sales (Age Range) -->
                <div class="dashboard-card bg-purple-500 text-white">
                    <v-card-title>
                        <v-icon left>mdi-human-greeting</v-icon> No. of Sales (Age Range)
                    </v-card-title>
                    <v-card-text class="text-xl">
                        <ul>
                            <li v-for="ageRange in salesByAgeRange" :key="ageRange.age_range" class="text-lg">
                                Ages {{ ageRangeMapping[ageRange.age_range] }} : {{ ageRange.total_sales }}
                            </li>
                        </ul>
                    </v-card-text>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>
<script setup>
import { defineProps, ref } from 'vue';
import AdminLayout from './Components/AdminLayout.vue';

const props = defineProps({
    totalUsers: Number,
    totalSales: Number,
    totalSalesMade: Number,
    salesByCategory: Array,
    salesByGender: Array,
    salesByAgeRange: Array,
});

const ageRangeMapping = {
    '1': '18-24',
    '2': '25-34',
    '3': '35-45',
    '4': '46-59',
    '5': '60+',
};

const selectedTimeFrame = ref('day');
const chartData = ref({});
const chartOptions = ref({
    responsive: true,
    maintainAspectRatio: false,
    scales: {
        y: {
            beginAtZero: true,
        },
    },
});
/*
const updateRevenueData = () => {
  const revenueData = [
    { date: '2024-03-01', total_revenue: 100 },
    { date: '2024-03-02', total_revenue: 200 },
    { date: '2024-03-03', total_revenue: 150 },
  ];

  const labels = revenueData.map((data) => data.date);
  const revenueAmounts = revenueData.map((data) => data.total_revenue);

  chartData.value = {
    labels: labels,
    datasets: [{
      label: 'Revenue',
      backgroundColor: '#f87979',
      data: revenueAmounts,
    }],
  };
};
*/
</script>
<style scoped>
.dashboard-card {
    height: 12rem;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 1rem;
    border-radius: 0.5rem;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.dashboard-card v-card-title {
    font-size: 1.5rem;
    font-weight: bold;
}

.dashboard-card v-card-text {
    font-size: 2rem;
    font-weight: bold;
}

</style>
