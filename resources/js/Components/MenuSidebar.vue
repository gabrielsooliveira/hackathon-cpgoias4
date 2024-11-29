<script setup>
import { Link } from "@inertiajs/vue3";
import { Offcanvas } from 'bootstrap';

const props = defineProps({
    Items: Object,
});

const closeOffcanvas = () => {
    const offcanvasElement = document.getElementById('offcanvasMenuSidebar');
    const offcanvasInstance = Offcanvas.getInstance(offcanvasElement) || new Offcanvas(offcanvasElement);
    offcanvasInstance.hide();
};
</script>

<template>
    <nav class="navbar bg-primary" aria-label="Navbar principal do sistema">
        <div class="container-fluid">
            <button class="btn btn-sm btn-light fw-bold text-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenuSidebar" aria-controls="offcanvasMenuSidebar">
                <font-awesome-icon icon="fa-solid fa-bars-staggered" />
                Menu
            </button>
            <h2 class="navbar-brand fw-bold text-uppercase text-white">Sistema de Controle</h2>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasMenuSidebar" aria-labelledby="offcanvasMenuSidebarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasMenuSidebarLabel">
                        Menu
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 fw-semibold">
                        <li v-for="(item, index) in props.Items" :key="index" class="nav-item">
                            <template v-if="!item.submenu">
                                <Link :href="route(item.href)" class="nav-link link-primary" aria-current="page" @click="closeOffcanvas">
                                    <font-awesome-icon :icon="item.icon"/>
                                    <span class="ms-2">{{ item.title }}</span>
                                </Link>
                            </template>
                            <template v-else>
                                <a class="nav-link dropdown-toggle d-flex link-primary" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <font-awesome-icon :icon="item.icon" class="mt-1"/>
                                    <span class="font-medium ms-2 me-auto">{{ item.title }}</span>
                                </a>
                                <ul v-if="item.submenu" class="dropdown-menu dropdown-menu-lg-end">
                                    <li v-for="subItem in item.submenu" :key="subItem.title">
                                        <Link :href="route(subItem.href)" class="nav-link link-primary ms-3" aria-current="page" @click="closeOffcanvas">
                                            <font-awesome-icon :icon="subItem.icon" />
                                            <span class="ms-2">{{ subItem.title }}</span>
                                        </Link>
                                    </li>
                                </ul>
                            </template>
                        </li>
                        <li class="nav-item">
                            <Link class="nav-link link-primary" :href="route('logout')" method="post" as="button">
                                <font-awesome-icon icon="fa-solid fa-right-from-bracket" />
                                <span class="ms-2">Sair</span>
                            </Link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</template>
