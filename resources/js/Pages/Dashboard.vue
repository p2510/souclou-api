<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import { AdjustmentsHorizontalIcon } from "@heroicons/vue/24/outline";
import Carrousel from "@/Components/Carrousel.vue";
import { ref } from "vue";
import "animate.css";

let InstanceCategory = ref(1);

setInterval(() => {
    if (InstanceCategory.value === 2) {
        InstanceCategory.value = 1;
    } else {
        InstanceCategory.value++;
    }
}, 4000);
let InstanceMessage = ref(1);
setInterval(() => {
    if (InstanceMessage.value === 3) {
        InstanceMessage.value = 1;
    } else {
        InstanceMessage.value++;
    }
}, 5000);
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="h-screen bg-white">
            <div class="sm:px-6 lg:px-8">
                <div class="overflow-hidden flex">
                    <form class="flex w-full gap-4 p-4 mb-4">
                        <input
                            type="search"
                            class="basis-5/6 rounded-lg outline-none border-none bg-slate-100 bg-opacity-80 focus:outline-none"
                            placeholder="Recherche"
                        />
                        <button
                            class="basis-1/6 bg-gradient-to-tr from-indigo-600 to-indigo-900 bg-center rounded-lg flex justify-center items-center"
                            type="submit"
                        >
                            <AdjustmentsHorizontalIcon
                                class="h-6 w-6 text-white"
                            />
                        </button>
                    </form>
                </div>
                <!--Carrousel -->
                <Carrousel title="Ancien Sujet" redirect-all-url="/">
                    <transition
                        enter-active-class="animate__animated animate__slideInLeft"
                        leave-active-class="animate__animated animate__slideOutRight"
                        mode="out-in"
                    >
                        <div
                            class="grid grid-cols-6 gap-2"
                            v-if="InstanceCategory === 1"
                        >
                            <Link
                                href="/"
                                class="col-span-3 text-center p-4 bg-gradient-to-r from-blue-700 via-violet-600 to-violet-800 bg-center rounded-xl text-white"
                            >
                                Mathematique
                            </Link>
                            <Link
                                href="/"
                                class="col-span-3 text-center p-4 bg-gradient-to-r from-orange-700 via-amber-600 to-amber-800 bg-center rounded-xl text-white"
                            >
                                Anglais
                            </Link>
                        </div>
                        <div
                            class="grid grid-cols-6 gap-2"
                            v-else-if="InstanceCategory === 2"
                        >
                            <Link
                                href="/"
                                class="col-span-3 text-center p-4 bg-gradient-to-r from-sky-700 via-cyan-600 to-cyan-800 bg-center rounded-xl text-white"
                            >
                                Philosophie
                            </Link>
                            <Link
                                href="/"
                                class="col-span-3 text-center p-4 bg-gradient-to-r from-lime-700 via-green-600 to-green-800 bg-center rounded-xl text-white"
                            >
                                Histoire-Géo
                            </Link>
                        </div>
                    </transition>
                </Carrousel>
                <!--Cours d'aujourd'hui-->
                <div class="my-4">
                    <h3 class="px-4 py-2 font-medium text-lg text-slate-700">
                        Cours d'aujourd'hui
                    </h3>
                    <div class="p-4 flex flex-col gap-y-4">
                        <p
                            class="grid grid-cols-5 items-center text-sm space-x-2"
                        >
                            <span class="col-span-3 opacity-70">
                                Histoire-Géo</span
                            >
                            <span
                                class="text-center col-span-2 rounded-full py-1 px-2 bg-indigo-800 text-white"
                                >08h00</span
                            >
                        </p>

                        <p
                            class="grid grid-cols-5 items-center text-sm space-x-2"
                        >
                            <span class="col-span-3 opacity-70">
                                Mathématique</span
                            >
                            <span
                                class="text-center col-span-2 rounded-full py-1 px-2 bg-indigo-800 text-white"
                                >10h00</span
                            >
                        </p>
                        <p
                            class="grid grid-cols-5 items-center text-sm space-x-2"
                        >
                            <span class="col-span-3 opacity-70">
                                Philosophie</span
                            >
                            <span
                                class="text-center col-span-2 rounded-full py-1 px-2 bg-indigo-800 text-white"
                                >14h00</span
                            >
                        </p>
                        <p
                            class="grid grid-cols-5 items-center text-sm space-x-2"
                        >
                            <span class="col-span-3 opacity-70"> Anglais</span>
                            <span
                                class="text-center col-span-2 rounded-full py-1 px-2 bg-indigo-800 text-white"
                                >16h00</span
                            >
                        </p>
                    </div>
                </div>

                <!--message recent-->
                <div class="rounded-lg bg-white/50 shadow-lg">
                    <h3
                        class="rounded-t-lg px-4 py-2 font-medium text-lg bg-slate-100 text-indigo-700"
                    >
                        Nouveaux Messages
                    </h3>
                    <div class="p-4 flex flex-col gap-y-4">
                        <transition
                            enter-active-class="animate__animated animate__fadeIn"
                            leave-active-class="animate__animated animate__fadeOut"
                            mode="out-in"
                        >
                            <div
                                v-if="InstanceMessage === 1"
                                class="flex items-center w-full gap-2"
                            >
                                <img
                                    src="https://static.wixstatic.com/media/bf2df3_84ac883c75044766ad226ac8042a8364~mv2.png/v1/fill/w_422,h_480,al_c,lg_1,q_85,enc_auto/bf2df3_84ac883c75044766ad226ac8042a8364~mv2.png"
                                    alt=""
                                    class="w-12 h-12 rounded-full"
                                />
                                <div class="space-y-1">
                                    <h4 class="font-semibold text-md">
                                        Julien Eric marc
                                    </h4>
                                    <p class="text-sm opacity-70">
                                        Mais j'ai pas encore reçu le dernier ...
                                    </p>
                                </div>
                            </div>
                            <div
                                v-else-if="InstanceMessage === 2"
                                class="flex items-center w-full gap-2"
                            >
                                <img
                                    src="https://m1.quebecormedia.com/emp/emp/230426203226_03_dennis_maliq_barnef41cec52-1d66-4799-809c-25a1ac3168f8_ORIGINAL.jpg?impolicy=crop-resize&x=0&y=0&w=1280&h=720&width=925"
                                    alt=""
                                    class="w-12 h-12 rounded-full"
                                />
                                <div class="space-y-1">
                                    <h4 class="font-semibold text-md">
                                        François
                                    </h4>
                                    <p class="text-sm opacity-70">
                                        Mais j'ai pas encore reçu le dernier ...
                                    </p>
                                </div>
                            </div>
                            <div
                                v-else-if="InstanceMessage === 3"
                                class="flex items-center w-full gap-2"
                            >
                                <img
                                    src="https://static.wixstatic.com/media/bf2df3_84ac883c75044766ad226ac8042a8364~mv2.png/v1/fill/w_422,h_480,al_c,lg_1,q_85,enc_auto/bf2df3_84ac883c75044766ad226ac8042a8364~mv2.png"
                                    alt=""
                                    class="w-12 h-12 rounded-full"
                                />
                                <div class="space-y-1">
                                    <h4 class="font-semibold text-md">
                                        jean Luc
                                    </h4>
                                    <p class="text-sm opacity-70">
                                        Mais j'ai pas encore reçu le dernier ...
                                    </p>
                                </div>
                            </div>
                        </transition>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
