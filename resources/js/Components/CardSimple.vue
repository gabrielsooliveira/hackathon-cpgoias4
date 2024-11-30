<script setup>
defineProps({
  title: {
    type: String,
    default: 'Not Found',
  },
  value: {
    type: String,
    default: '$00,00',
  },
  icon: {
    type: String,
    default: 'fas fa-circle-exclamation',
  },
  borderColor: {
    type: String,
    default: 'primary',
  },
  titleColor: {
    type: String,
    default: 'text-primary',
  },
});
</script>

<template>
  <div :class="['card', 'border', 'border-top-0', 'border-bottom-0', 'border-end-0', `border-${borderColor}`, 'shadow', 'h-100', 'py-2']">
    <div class="card-body">
      <div class="row g-0 align-items-center">
        <div class="col me-2">
          <div :class="['fw-bold', titleColor, 'text-uppercase', 'mb-1']">
            {{ title }}
          </div>
          <div class="h5 mb-0 fw-bold text-secondary">
            {{ value }}
          </div>
        </div>
        <div class="col-auto">
          <font-awesome-icon :icon="icon" size="2xl" :class="titleColor" />
        </div>
      </div>
    </div>
  </div>
</template>
