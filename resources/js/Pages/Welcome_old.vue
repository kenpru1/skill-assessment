<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Welcome" />

    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0"
    >
        <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                class="text-sm text-gray-700 dark:text-gray-500 underline"
                >Dashboard</Link
            >

            <template v-else>
                
                
               

                <nav class="site-nav">
                    <div class="container">
                        <div class="menu-bg-wrap">
                            <div class="site-navigation">
                                <div class="row g-0 align-items-center">
                                    <div class="col-2">
                                        <Link :href="route('index')" class="logo m-0 float-start">Kaney Quotes</Link><span class="text-primary">.</span>
                                        <!-- <a href="{{route('index')}}" class="logo m-0 float-start">Kaney Quotes<span class="text-primary">.</span></a> -->
                                    </div>
                                    <div class="col-8 text-center ">
                                        <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
                                            <li class="active"><Link :href="route('index')" class="text-sm text-gray-700 dark:text-gray-500 underline">Inicio</Link></li>
                                            
                                            <li><Link :href="route('login')" class="text-sm text-gray-700 dark:text-gray-500 underline">Ingresar</Link></li>
                                            <li><Link
                                                v-if="canRegister"
                                                :href="route('register')"
                                                class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline"
                                                >Registrarse</Link>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-2 text-end">
                                        <a href="#" class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
                                            <span></span>
                                        </a>

                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>

                <div class="hero overlay">
                    <img src="assets/images/site/blob.svg" alt="" class="img-fluid blob">
                    <div class="container">
                        <div class="row align-items-center justify-content-between pt-5">
                            <div class="col-lg-6 text-center text-lg-start pe-lg-5">
                                <h1 class="heading text-white mb-3" >Encuentra tu cita celebre.</h1>
                                <p class="text-white mb-5" >Revisa muchas citas y guarda tu favorita.</p>
                                
                            </div>
                            <div class="col-lg-6" >
                                <div class="img-wrap">
                                    <img src="assets/images/site/quote-steve-jobs.png" alt="Image" class="img-fluid rounded">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </template>
        </div>


        
    </div>
</template>
