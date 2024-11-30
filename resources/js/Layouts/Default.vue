<script setup>
import Toast from '@/js/Components/Toast.vue';
</script>

<template>
    <main class="vh-100 bg-light bg-gradient pt-5">
        <slot></slot>
        <Toast />
    </main>
</template>
