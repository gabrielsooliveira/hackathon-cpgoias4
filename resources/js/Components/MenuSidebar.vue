<script setup>
import { ref } from 'vue';
import { Link } from "@inertiajs/vue3";
import logoUrl from '@/assets/images/imagem_logo_solo.png';

const isExpanded = ref(localStorage.getItem("isExpanded") === "true")

const ToggleMenu = () => {
	isExpanded.value = !isExpanded.value
	localStorage.setItem("isExpanded", isExpanded.value)
}
</script>

<template>
    <aside :class="`${isExpanded ? 'is-expanded' : ''}`">
		<div class="logo">
            <img :src="logoUrl" alt="Irrigago"/>
		</div>

		<div class="menu-toggle-wrap">
			<button class="menu-toggle" @click="ToggleMenu">
				<font-awesome-icon icon="fas fa-angles-right" class="material-icons"/>
			</button>
		</div>

        <h3>Menu</h3>

        <div class="menu">
            <Link class="button" :href="route('dashboard')">
                <font-awesome-icon icon="fa-solid fa-home" class="material-icons"/>
                <span class="text">Inicio</span>
            </Link>
            <Link class="button" :href="route('timeline_index')">
                <font-awesome-icon icon="fa-solid fa-calendar-days" class="material-icons"/>
                <span class="text">Cronograma</span>
            </Link>
            <Link class="button" :href="route('irrigation_index')">
                <font-awesome-icon icon="fa-solid fa-leaf" class="material-icons"/>
                <span class="text">Irrigação</span>
            </Link>
            <Link class="button" :href="route('history_index')">
                <font-awesome-icon icon="fa-solid fa-clock-rotate-left" class="material-icons"/>
                <span class="text">Historico</span>
            </Link>
        </div>

        <div class="flex"></div>

        <div class="menu">
            <Link class="button" :href="route('logout')" method="post" as="button">
                <font-awesome-icon icon="fa-solid fa-right-from-bracket" class="material-icons"/>
                <span class="text">Sair</span>
            </Link>
        </div>
	</aside>
</template>

<style lang="scss" scoped>
aside {
	display: flex;
	flex-direction: column;
	background-color: var(--dark);
	color: var(--light);
	width: calc(2rem + 32px);
	overflow: hidden;
	min-height: 100vh;
	padding: 1rem;
	transition: 0.2s ease-in-out;

	.flex {
		flex: 1 1 0%;
	}

	.logo {
		margin-bottom: 1rem;

		img {
			width: 2rem;
		}
	}

	.menu-toggle-wrap {
		display: flex;
		justify-content: flex-end;
		margin-bottom: 1rem;
		position: relative;
		top: 0;
		transition: 0.2s ease-in-out;

		.menu-toggle {
			transition: 0.2s ease-in-out;
			.material-icons {
				font-size: 2rem;
				color: var(--light);
				transition: 0.2s ease-out;
			}

			&:hover {
				.material-icons {
					color: var(--primary);
					transform: translateX(0.5rem);
				}
			}
		}
	}

	h3, .button .text {
		opacity: 0;
		transition: opacity 0.3s ease-in-out;
	}

	h3 {
		color: var(--grey);
		font-size: 0.875rem;
		margin-bottom: 0.5rem;
		text-transform: uppercase;
	}

	.menu {
		margin: 0 -1rem;

		.button {
			display: flex;
			align-items: center;
			text-decoration: none;

			transition: 0.2s ease-in-out;
			padding: 0.5rem 1rem;

			.material-icons {
				font-size: 2rem;
				color: var(--light);
				transition: 0.2s ease-in-out;
			}
			.text {
				color: var(--light);
				transition: 0.2s ease-in-out;
			}

			&:hover {
				background-color: var(--dark-alt);

				.material-icons, .text {
					color: var(--primary);
				}
			}

			&.router-link-exact-active {
				background-color: var(--dark-alt);
				border-right: 5px solid var(--primary);

				.material-icons, .text {
					color: var(--primary);
				}
			}
		}
	}

	.footer {
		opacity: 0;
		transition: opacity 0.3s ease-in-out;

		p {
			font-size: 0.875rem;
			color: var(--grey);
		}
	}

	&.is-expanded {
		width: var(--sidebar-width);

		.menu-toggle-wrap {
			top: -3rem;

			.menu-toggle {
				transform: rotate(-180deg);
			}
		}

		h3, .button .text {
			opacity: 1;
		}

		.button {
			.material-icons {
				margin-right: 1rem;
			}
		}

		.footer {
			opacity: 0;
		}
	}

	@media (max-width: 1024px) {
		position: absolute;
		z-index: 99;
	}
}
</style>
