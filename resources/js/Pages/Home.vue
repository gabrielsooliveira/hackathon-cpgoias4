<script setup>
import { Head } from '@inertiajs/vue3';
import MainNavbar from '@/js/Components/MainNavbar.vue';
import ImageLogo from '@/assets/images/imagem_logo.png';
import ImageSrc from '@/assets/images/imagem_principal.svg';
</script>

<template>
    <Head title="Home"></Head>

    <MainNavbar></MainNavbar>
    <div class="container mt-5">
        <img class="img-fluid" :src="ImageLogo" loading="lazy" alt="Imagem Logo" width="300">
        <div class="row">
            <div class="col-md-8 text-primary">
                <h1 class="fs-3">O que é a IRRIGAGO <span class="text-dark fw-bold fs-1">?</span></h1>
                <p class="fw-primaryer">
                    A escassez hídrica é um desafio significativo para o mundo, afetando a produtividade e a sustentabilidade das culturas. Para mitigar esses impactos, propomos uma solução integrada que utiliza tecnologias de <span class="fst-italic fw-semibold">IoT (Internet das Coisas)</span> e <span class="fst-italic fw-semibold">IA (Inteligência Artificial)</span> para otimizar o uso da água e garantir a eficiência na irrigação. Esta solução envolve a extração de água do lençol freático, o monitoramento em tempo real das condições do solo e das plantas, e a aplicação precisa de água através de um sistema de irrigação por gotejamento.
                </p>

                <p class="fw-primaryer">Nossa solução integra dados do <span class="fst-italic fw-semibold">CLIMWAT</span> e <span class="fst-italic fw-semibold">CROPWAT</span> para calcular as necessidades hídricas das culturas, os requisitos de irrigação com base nos dados de solo, clima e cultura e ajustar automaticamente as necessidades e os cronogramas de irrigação com base em dados de tempo real.</p>
            </div>
            <div class="col-md-4 text-center">
                <img class="img-fluid" :src="ImageSrc" loading="lazy" alt="Imagem Principal">
            </div>
        </div>
    </div>
</template>
