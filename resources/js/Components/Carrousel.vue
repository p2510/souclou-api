<template>
    <div class="p-4 w-full">
        <div class="flex items-center justify-between mb-6">
            <h3 class="font-bold text-2xl text-slate-900 opacity-80">
                {{ props.title }}
            </h3>

            <Link v-if="redirectAllUrl" :href="redirectAllUrl" class="text-slate-400"> Tout voir </Link>
        </div>

        
        <slot></slot>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    title: {
        type: String,
        required: true,
    },
    redirectAllUrl: {
        type: String,
        required: false,
    },
});
</script>
