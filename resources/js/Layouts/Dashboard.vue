<script setup>
import MenuSidebar from '@/js/Components/MenuSidebar.vue';
import Toast from '@/js/Components/Toast.vue';
</script>

<template>
    <div class="app">
        <MenuSidebar/>
        <main>
            <slot></slot>
            <Toast />
        </main>
	</div>
</template>

<style lang="scss">
:root {
	--primary: #77c1e9;
	--primary-alt: #3cb7c7;
	--grey: #64748b;
	--dark: #2a3131;
	--dark-alt: #334155;
	--light: #f1f5f9;
	--sidebar-width: 300px;
}

* {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	font-family: 'Fira sans', sans-serif;
}

body {
	background: var(--light);
    overflow: hidden;
}

button {
	cursor: pointer;
	appearance: none;
	border: none;
	outline: none;
	background: none;
}

.app {
	display: flex;

	main {
		flex: 1 1 0;
		padding: 2rem;
		overflow-y: auto;
        max-height: 100vh;

		@media (max-width: 1024px) {
			padding-left: 6rem;
		}
	}
}
</style>
