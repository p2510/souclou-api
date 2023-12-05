<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen flex flex-col justify-around items-center pt-6 sm:pt-0 bg-white dark:bg-gray-900 mx-8 ">
        <div>
            <Link href="/">
                <ApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
            </Link>
        </div>

        <div
            class="w-full sm:max-w-md m-4 px-6 py-4  bg-slate-50 bg-opacity-10 dark:bg-gray-800 shadow-md overflow-hidden rounded-xl"
        >
            <slot />
            
        </div>
    </div>
</template>
