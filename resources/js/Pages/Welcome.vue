<script setup>
import { Head, Link } from "@inertiajs/vue3";

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    logoUrl: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Welcome" />

    <div
        v-if="canLogin"
        class="relative h-screen bg-gradient-to-tr from-indigo-600 to-indigo-900 bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"
    >
        <div
            v-if="$page.props.auth.user"
            class="h-full flex flex-col justify-around p-5"
        >
            <div class="flex justify-center">
                <img
                    :src="logoUrl"
                    alt="le logo de souclou"
                    class="w-60 h-40"
                />
            </div>
            <Link
                :href="route('dashboard')"
                class="block text-center w-full p-4 text-indigo-700 bg-white hover:opacity-70 transition duration-300 ease-in-out rounded-lg shadow-md"
                >Dashboard</Link
            >
        </div>

        <div v-else class="h-full flex flex-col justify-around">
            <div class="flex justify-center">
                <img
                    :src="logoUrl"
                    alt="le logo de souclou"
                    class="w-60 h-40"
                />
            </div>
            <div class="p-5">
                <Link
                    href="/register"
                    class="block text-center w-full p-4 text-indigo-700 bg-white hover:opacity-70 transition duration-300 ease-in-out rounded-lg shadow-md"
                    >Intégrer souclou</Link
                >
                <p class="text-sm pt-2 text-white">
                    Vous êtes déjà membre ?
                    <Link href="/login" class="underline"> Connectez-vous</Link>
                </p>
            </div>
        </div>
    </div>
</template>

<style></style>
