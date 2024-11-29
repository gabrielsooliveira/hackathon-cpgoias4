<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    data: {
        type: Array,
        required: true,
    },
    columns: {
        type: Array,
        required: true,
    },
    paginationLinks: {
        type: Array,
        default: () => [],
    },
    paginationInfo: {
        type: Object,
        default: () => ({})
    },
    actions: {
        type: Array,
        default: () => [],
    },
});

const getFieldValue = (item, field) => {
  return field.split('.').reduce((o, key) => (o ? o[key] : ''), item);
};

const formatValue = (value, formatter) => {
  return formatter ? formatter(value) : value;
};
</script>

<template>
    <div class="table-responsive">
        <table class="table table-borderless table-sm">
            <thead>
                <tr>
                    <th v-for="(column, index) in columns" :key="index" scope="col" class="text-truncate">
                        {{ column.label }}
                    </th>
                    <th v-if="$slots.actions" class="col-1">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in data" :key="item.id">
                    <td v-for="column in columns" :key="column.field" class="text-truncate" v-html="formatValue(getFieldValue(item, column.field), column.formatter)"></td>
                    <td v-if="$slots.actions" class="d-flex gap-1">
                        <slot name="actions" :item="item"></slot>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <nav v-if="paginationLinks.length > 0" aria-label="Paginação" class="mt-3 d-flex justify-content-between align-items-center">
        <span class="text-muted small">
            Exibindo do {{ paginationInfo.from }} até {{ paginationInfo.itemsDisplayed }} de {{ paginationInfo.totalItems }} itens
        </span>

        <ul class="pagination pagination-sm justify-content-center justify-content-lg-end flex-wrap mb-0">
            <li v-for="(link, index) in paginationLinks" :key="link.label" class="page-item"
                :class="{ active: link.isCurrentPage, disabled: !link.url }">
                <Link class="page-link" :href="link.url || '#'">
                    <span v-if="index == 0">Anterior</span>
                    <span v-else-if="index == paginationLinks.length - 1">Próximo</span>
                    <span v-else>{{ link.label }}</span>
                </Link>
            </li>
        </ul>
    </nav>
</template>
