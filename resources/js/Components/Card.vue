<script setup>
import { ref } from 'vue';
</script>

<template>
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="p-4 sm:p-6">
           <slot />
        </div>
    </div>
</template>
