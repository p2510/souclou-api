<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
</script>

<template>
    <Head title="Game soukoul" />
    <AuthenticatedLayout>
        <div class="h-screen bg-white">
            <div class="sm:px-6 lg:px-8">
                <div class="overflow-hidden p-4">
                    <h2 class="text-xl font-semibold">Gaming</h2>

                    <div>
                        <ul class="mt-24 w-full grid grid-cols-2 gap-4">
                            <Link
                                class="bg-gradient-to-tr from-indigo-400 to-indigo-900 col-span-1 text-center py-10 text-white font-semibold text-2xl rounded-lg shadow-lg"
                                :href="route('quiz-challenge.index')"
                            >
                                Quiz
                            </Link>

                            <li
                                class="bg-gradient-to-tr from-sky-400 to-sky-900 col-span-1 text-center py-10 text-white font-semibold text-2xl rounded-lg shadow-lg"
                            >
                                La chasse
                            </li>
                            <li
                                class="bg-gradient-to-tr from-pink-400 to-pink-900 col-span-1 text-center py-10 text-white font-semibold text-2xl rounded-lg shadow-lg"
                            >
                                Memo
                            </li>
                            <li
                                class="bg-gradient-to-tr from-teal-400 to-teal-900 col-span-1 text-center py-10 text-white font-semibold text-2xl rounded-lg shadow-lg"
                            >
                                Quickly
                            </li>
                            <li
                                class="bg-gradient-to-tr from-purple-400 to-purple-900 col-span-1 text-center py-10 text-white font-semibold text-2xl rounded-lg shadow-lg"
                            >
                                Polygotte
                            </li>
                            <li
                                class="bg-gradient-to-tr from-amber-400 to-amber-900 col-span-1 text-center py-10 text-white font-semibold text-2xl rounded-lg shadow-lg"
                                @click="changeShowSchedule('Samedi')"
                            >
                                Roman
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
