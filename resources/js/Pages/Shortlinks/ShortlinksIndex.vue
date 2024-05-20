<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import LinksTable from "@/Components/LinksTable.vue";
import { defineProps } from "vue";
import Card from "@/Components/Card.vue";

defineProps({
    shortlinks: Array,
});
</script>

<template>
    <AppLayout title="Shortlinks" active="Shortlinks">
        <Card>
            <LinksTable :shortlinks="shortlinks"/>
        </Card>
    </AppLayout>
</template>
