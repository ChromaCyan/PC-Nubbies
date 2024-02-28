<template>
    <AdminLayout>
        <div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
                <v-card class="h-32 md:h-64 bg-blue-500 text-white">
                    <v-card-title>
                        <v-icon left>mdi-account-multiple</v-icon> Total Users (Customer)
                    </v-card-title>
                    <v-card-text class="text-2xl">Users: {{ totalUsers }}</v-card-text>
                </v-card>
                <v-card class="h-32 md:h-64 bg-blue-500 text-white">
                    <v-card-title>
                        <v-icon left>mdi-cash-multiple</v-icon> Total Revenue
                    </v-card-title>
                    <v-card-text class="text-2xl">$ {{ totalSales }}</v-card-text>
                </v-card>
                <v-card class="h-32 md:h-64 bg-blue-500 text-white">
                    <v-card-title>
                        <v-icon left>mdi-cart-variant</v-icon> No. of Sales in Total
                    </v-card-title>
                    <v-card-text class="text-2xl">{{ totalSalesMade }}</v-card-text>
                </v-card>
                <v-card class="h-32 md:h-64 bg-green-500 text-white">
                    <v-card-title>
                        <v-icon left>mdi-tag-multiple</v-icon> No. of Sales (Category)
                    </v-card-title>
                    <v-card-text class="text-2xl">
                        <ul>
                            <li v-for="category in salesByCategory" :key="category.category_name">
                                {{ category.category_name }}: {{ category.total_sales }}
                            </li>
                        </ul>
                    </v-card-text>
                </v-card>
                <v-card class="h-32 md:h-64 bg-yellow-500 text-white">
                    <v-card-title>
                        <v-icon left>mdi-gender-male-female</v-icon> No. of Sales (Gender)
                    </v-card-title>
                    <v-card-text class="text-2xl">
                        <ul>
                            <li v-for="gender in salesByGender" :key="gender.gender">
                                {{ gender.gender ? 'Male' : 'Female' }} : {{ gender.total_sales }}
                            </li>
                        </ul>
                    </v-card-text>
                </v-card>
                <v-card class="h-32 md:h-64 bg-purple-500 text-white">
                    <v-card-title>
                        <v-icon left>mdi-human-greeting</v-icon> No. of Sales (Age Range)
                    </v-card-title>
                    <v-card-text class="text-2xl">
                        <ul>
                            <li v-for="ageRange in salesByAgeRange" :key="ageRange.age_range">
                                Ages {{ ageRangeMapping[ageRange.age_range] }} : {{ ageRange.total_sales }}
                            </li>
                        </ul>
                    </v-card-text>
                </v-card>
            </div>
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-96 mb-4 flex justify-end items-start mt-4">
                <select v-model="selectedTimeFrame" @change="updateRevenueData" class="mr-4">
                    <option value="day">Day</option>
                    <option value="week">Week</option>
                    <option value="month">Month</option>
                </select>
                <RevenueChart :chart-data="chartData" :options="chartOptions" />
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import { initFlowbite } from 'flowbite';
import AdminLayout from './Components/AdminLayout.vue';
import { defineProps } from 'vue';

onMounted(() => {
    initFlowbite();
});

const props = defineProps({
    totalUsers: Number,
    totalSales: Number,
    totalSalesMade: Number,
    salesByCategory: Array,
    salesByGender: Array,
    salesByAgeRange: Array,
    revenueData: Array,
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
            beginAtZero: true
        }
    }
});

const updateRevenueData = () => {
    const labels = props.revenueData.map(data => data.date);
    const revenueAmounts = props.revenueData.map(data => data.total_revenue);

    chartData.value = {
        labels: labels,
        datasets: [{
            label: 'Revenue',
            data: revenueAmounts,
        }]
    };
};

</script>
