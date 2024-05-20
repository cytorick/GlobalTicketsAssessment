<script setup>
import {ref, defineProps, computed} from 'vue';
import {IconChartDots} from "@tabler/icons-vue";
import {
    AlertDialog,
    AlertDialogCancel,
    AlertDialogContent, AlertDialogDescription, AlertDialogFooter,
    AlertDialogHeader,
    AlertDialogTitle, AlertDialogTrigger
} from "@/shadcn/ui/alert-dialog/index.js";
import Card from '@/Components/Card.vue';
import { Bar } from 'vue-chartjs'
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js';

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

// Define the chart data
const chartData = computed(() => {
    if (!statistics || statistics.length === 0) {
        return {
            labels: [],
            datasets: []
        };
    }

    // Group statistics by date and count the rows for each date
    const dataMap = new Map();
    statistics.forEach(stat => {
        const date = dateFormat(stat.created_at);
        if (!dataMap.has(date)) {
            dataMap.set(date, 0);
        }
        dataMap.set(date, dataMap.get(date) + 1); // Increment count for the date
    });

    // Sort the data by date
    const sortedData = [...dataMap.entries()].sort((a, b) => new Date(a[0]) - new Date(b[0]));

    // Take only the top 5 dates
    const top5Data = sortedData.slice(0, 5);

    const labels = top5Data.map(entry => entry[0]); // Extract dates
    const data = top5Data.map(entry => entry[1]); // Extract counts

    return {
        labels: labels,
        datasets: [{
            label: 'Views',
            data: data,
            backgroundColor: '#FD0',
        }]
    };
});

// Define the chart options
const chartOptions = {
    responsive: true,
    scales: {
        x: {
            title: {
                display: true,
                text: 'Date'
            }
        },
        y: {
            title: {
                display: true,
                text: 'Views',
            },
            ticks: {
                stepSize: 1,
            }
        }
    }
};

// Define the props
const props = defineProps({
    shortlink: Object,
    statistics: Array,
});

// Format the date
const dateFormat = (date) => {
    return new Date(date).toLocaleString('en-US', {
        year: 'numeric',
        month: 'short',
        day: 'numeric',
    });
}

// Calculate the time passed since the date
const timePassed = (date) => {
    const now = new Date();
    const created = new Date(date);
    const diff = now - created;
    const seconds = Math.floor(diff / 1000);
    const minutes = Math.floor(seconds / 60);
    const hours = Math.floor(minutes / 60);
    const days = Math.floor(hours / 24);
    const months = Math.floor(days / 30);
    const years = Math.floor(months / 12);

    if (years > 0) {
        return years + 'y';
    } else if (months > 0) {
        return months + 'm';
    } else if (days > 0) {
        return days + 'd';
    } else if (hours > 0) {
        return hours + 'h';
    } else if (minutes > 0) {
        return minutes + 'min';
    } else {
        return seconds + 'sec';
    }
}

// Construct the props
const shortlink = props.shortlink;
const statistics = props.statistics;

// Count the total views
const totalViews = (shortlink) => {
    return statistics.length ?? '0';
}

// Give the last click date
const lastClick = (shortlink) => {
    if (statistics.length === 0) {
        return 'N/A';
    }
    return statistics[statistics.length - 1].created_at;
}

// Give the first click date
const firstClick = (shortlink) => {
    if (statistics.length === 0) {
        return 'N/A';
    }
    return statistics[0].created_at;
}
</script>

<template>
    <AlertDialog>
        <AlertDialogTrigger>
            <button type="button"
                    class="block rounded-md bg-[#FD0] p-2 text-center text-sm font-bold text-gray-900 shadow-sm hover:bg-[#1E2228] hover:text-white">
                <IconChartDots :stroke="2" class="h-5 w-5 ml-auto" aria-hidden="true"/>
            </button>
        </AlertDialogTrigger>
        <AlertDialogContent>
            <AlertDialogHeader>
                <AlertDialogTitle>
                    Short Link Statistics for {{ shortlink.title }}
                </AlertDialogTitle>
                <AlertDialogDescription></AlertDialogDescription>
            </AlertDialogHeader>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                <Card class="col-span-1 !bg-gray-200 text-center">
                    <span class="text-3xl font-bold">
                        {{ totalViews() ?? 0 }}
                    </span>
                    <h3 class="text-sm font-semibold text-gray-500 mt-2">
                        Total Clicks
                    </h3>
                </Card>
                <Card class="col-span-1 !bg-gray-200 text-center">
                    <span class="text-3xl font-bold">
                        {{ lastClick() === !'N/A' ? timePassed(lastClick()) : 'N/A' }}
                    </span>
                    <h3 class="text-sm font-semibold text-gray-500 mt-2">
                        Last Click
                    </h3>
                </Card>
                <Card class="col-span-1 !bg-gray-200 text-center">
                    <span class="text-3xl font-bold">
                        {{ firstClick() === !'N/A' ? timePassed(firstClick()) : 'N/A' }}
                    </span>
                    <h3 class="text-sm font-semibold text-gray-500 mt-2">
                        First Click
                    </h3>
                </Card>
                <Card class="col-span-3 !bg-gray-200">
                    <Bar :options="chartOptions" :data="chartData" />
                </Card>
            </div>
            <AlertDialogFooter>
                <AlertDialogCancel>
                    <AlertDialogCancel>
                        <button type="button" @click="closeDialog"
                                class="ml-1 inline-flex justify-center py-2 px-4 border-2 border-[#1E2228] shadow-sm text-sm font-medium rounded-md text-[#1E2228] hover:bg-[#1E2228] hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#FD0]">
                            Close
                        </button>
                    </AlertDialogCancel>
                </AlertDialogCancel>
            </AlertDialogFooter>
        </AlertDialogContent>
    </AlertDialog>
</template>
