<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
<nav class="navbar navbar-expand-lg" aria-label="Offcanvas navbar large">
    <div class="container-fluid">
        <div class="row w-100 align-items-center gx-0 px-3 d-lg-none">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <Link class="navbar-brand text-uppercase text-primary fw-bold mb-0" href="#">irrigago</Link>
                <button
                    class="nav-link link-primary"
                    type="button"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar2"
                    aria-controls="offcanvasNavbar2"
                    aria-label="Botão de menu">
                    <font-awesome-icon :icon="['fas', 'bars']" size="lg"/>
                </button>
            </div>
        </div>

      <div class="offcanvas offcanvas-start text-bg-primary" tabindex="-1" id="offcanvasNavbar2" aria-labelledby="offcanvasNavbar2Label">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title text-primary" id="offcanvasNavbar2Label">Offcanvas</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-center flex-grow-1 pe-3 fw-bold">
            <li class="nav-item">
              <Link class="nav-link link-primary" href="#">Home</Link>
            </li>
            <li class="nav-item">
                <Link class="nav-link link-primary" :href="route('login')">Acesso</Link>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</template>
