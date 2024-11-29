<script setup>
import Toast from '@/js/Components/Toast.vue';
</script>

<template>
    <main class="px-5 py-2 mt-3">
        <slot></slot>
        <Toast></Toast>
    </main>
</template>
