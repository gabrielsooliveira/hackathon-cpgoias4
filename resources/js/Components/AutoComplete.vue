<script setup>
import { ref, watch, onMounted } from 'vue';

const props = defineProps({
    label: {
        type: String,
        required: true
    },
    items: {
        type: Array,
        required: true
    },
    selectedId: {
        type: [String, Number],
        default: null
    },
    inputId: {
        type: String,
        required: true
    },
    placeholder: {
        type: String,
        default: 'Filtrar...'
    },
    campoBusca: {
        type: String,
        default: 'codigo'
    }
});

const emit = defineEmits(['update:selectedId']);

const filter = ref('');
const filteredItems = ref(props.items);
const showDropdown = ref(false);

const updateFilterValue = () => {
    if (props.items && props.selectedId) {
        const selectedItem = props.items.find(item => item.id === props.selectedId);
        filter.value = selectItem ? selectedItem[props.campoBusca] : '';
    }
};

watch([() => props.selectedId, () => props.items], updateFilterValue);

onMounted(updateFilterValue);

const filterItems = () => {
    const lowerCaseFilter = filter.value.toLowerCase();
    filteredItems.value = props.items.filter(item =>
        item[props.campoBusca].toLowerCase().includes(lowerCaseFilter)
    );
    showDropdown.value = filteredItems.value.length > 0 || filter.value === '';
};

const selectItem = (id, valorCampoBusca) => {
    emit('update:selectedId', id);
    filter.value = valorCampoBusca || '';
    showDropdown.value = false;
};

const hideDropdown = () => {
    setTimeout(() => {
        showDropdown.value = false;
    }, 200);
};
</script>

<template>
    <div class="position-relative">
        <label :for="inputId" class="form-label">{{ label }}</label>
        <input
            type="text"
            v-model="filter"
            @input="filterItems"
            class="form-control"
            :placeholder="placeholder"
            @focus="showDropdown = true"
            @blur="hideDropdown"
            @keyup.enter="selectItem"
        />
        <ul v-if="showDropdown" class="dropdown-menu show">
            <li @click="selectItem(null, 'Não Informado')" class="dropdown-item">Não Informado</li>
            <li
                v-for="item in filteredItems"
                :key="item.id"
                @click="selectItem(item.id, item[props.campoBusca])"
                class="dropdown-item"
            >
                {{ item[props.campoBusca] }}
            </li>
        </ul>
        <input type="hidden" :value="selectedId" />
    </div>
</template>

<style scoped>
.dropdown-menu {
    position: absolute;
    z-index: 1000;
    width: 100%;
    max-height: 30vh;
    overflow-y: auto;
    background-color: white;
    border: 1px solid #ccc;
    border-radius: 0.25rem;
}
</style>
