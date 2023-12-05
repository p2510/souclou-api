<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { ChevronLeftIcon, ClockIcon } from "@heroicons/vue/24/outline";
import { ref, computed, onMounted } from "vue";
import { formatNumber, obtainMention } from "@/Utils/fun";
let props = defineProps(["data"]);
let questionId = ref(0);

let currentQuestion = computed(() => {
    return props.data[questionId.value];
});

let success = ref(0);
let fail = ref(0);
let nextButton = ref(false);
let disableClick = ref(false);

let error = ref({
    one: false,
    two: false,
    three: false,
    four: false,
});
let validation = (suggestion) => {
    disableClick.value = true;
    clearInterval(timer);
    if (currentQuestion.value?.answer == suggestion) {
        success.value++;
    } else {
        fail.value++;
        switch (suggestion) {
            case "A":
                error.value.one = true;

                break;
            case "B":
                error.value.two = true;

                break;
            case "C":
                error.value.three = true;

                break;
            case "D":
                error.value.four = true;

                break;

            default:
                break;
        }
    }
    nextButton.value = true;
};

let time = ref(0);
let timer = setInterval(() => {
    time.value++;
    if (time.value === 30) {
        clearInterval(timer);
        disableClick.value = true;
        fail.value++;
        nextButton.value = true;
    }
}, 1000);

let next = () => {
    nextButton.value = false;
    error.value.one = false;
    error.value.two = false;
    error.value.three = false;
    error.value.four = false;
    disableClick.value = false;
    questionId.value++;

    time.value = 0;
    timer = setInterval(() => {
        time.value++;
        if (time.value === 30) {
            clearInterval(timer);
            disableClick.value = true;
            fail.value++;
            nextButton.value = true;
        }
    }, 1000);
};

onMounted(() => {});
</script>

<template>
    <Head title="Game soukoul" />
    <AuthenticatedLayout>
        <div class="h-screen bg-white">
            <div class="sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden p-4 flex items-center justify-around"
                >
                    <Link
                        :href="route('game')"
                        class="rounded-full p-2 bg-slate-700 text-white"
                        ><ChevronLeftIcon class="w-4 h-4"
                    /></Link>
                    <h2 class="text-3xl font-semibold text-center">Quiz</h2>
                </div>
                <div v-if="questionId + 1 <= 20">
                    <div class="flex items-center justify-between px-4 mt-6">
                        <h3 class="text-xl font-semibold">
                            Question {{ questionId + 1 }}/20
                        </h3>
                        <div class="flex items-center gap-2">
                            <span class="text-xl font-semibold text-pink-700"
                                >{{ time }}S
                            </span>
                            <ClockIcon class="w-6 h-6 text-pink-800" />
                        </div>
                    </div>
                    <!--question-->
                    <p
                        class="m-6 text-lg md:text-xl px-6 py-8 text-white bg-gradient-to-tr from-rose-600 to-pink-700 rounded-xl shadow-xl"
                    >
                        {{ currentQuestion.question }}
                    </p>
                    <!--Anwser-->
                    <section class="m-6">
                        <ol class="space-y-4">
                            <li
                                @click="validation('A')"
                                :class="[
                                    'rounded-lg border-2 p-4 text-md md:text-lg divide-x-2 flex flex-start gap-2 ',
                                    error.one
                                        ? 'border-red-200 text-white bg-red-600'
                                        : 'border-slate-200 text-slate-800',
                                    disableClick ? 'pointer-events-none' : '',
                                ]"
                            >
                                <span class="font-bold">A</span>
                                <span class="pl-2 font-semibold">{{
                                    currentQuestion.suggestion_one
                                }}</span>
                            </li>
                            <li
                                @click="validation('B')"
                                :class="[
                                    'rounded-lg border-2 p-4 text-md md:text-lg divide-x-2 flex flex-start gap-2',
                                    error.two
                                        ? 'border-red-200 text-white bg-red-600'
                                        : 'border-slate-200 text-slate-800',
                                    disableClick ? 'pointer-events-none' : '',
                                ]"
                            >
                                <span class="font-bold">B</span>
                                <span class="pl-2 font-semibold">{{
                                    currentQuestion.suggestion_two
                                }}</span>
                            </li>
                            <li
                                @click="validation('C')"
                                :class="[
                                    'rounded-lg border-2 p-4 text-md md:text-lg divide-x-2 flex flex-start gap-2',
                                    error.three
                                        ? 'border-red-200 text-white bg-red-600'
                                        : 'border-slate-200 text-slate-800',
                                    disableClick ? 'pointer-events-none' : '',
                                ]"
                            >
                                <span class="font-bold">C</span>
                                <span class="pl-2 font-semibold">{{
                                    currentQuestion.suggestion_three
                                }}</span>
                            </li>
                            <li
                                @click="validation('D')"
                                :class="[
                                    'rounded-lg border-2 p-4 text-md md:text-lg divide-x-2 flex flex-start gap-2',
                                    error.four
                                        ? 'border-red-200 text-white bg-red-600'
                                        : 'border-slate-200 text-slate-800',
                                    disableClick ? 'pointer-events-none' : '',
                                ]"
                            >
                                <span class="font-bold">D</span>
                                <span class="pl-2 font-semibold">{{
                                    currentQuestion.suggestion_four
                                }}</span>
                            </li>
                        </ol>

                        <div
                            class="flex justify-center"
                            v-if="nextButton == true"
                        >
                            <button
                                @click="next"
                                class="text-center bg-green-600 text-white rounded-lg px-4 py-2 mt-6"
                            >
                                Passez au suivant →
                            </button>
                        </div>
                        <div class="grid grid-cols-2 w-full gap-4 mt-4">
                            <p
                                class="cols-span-1 text-center bg-green-600 text-white rounded-lg p-6 mt-6"
                            >
                                Réussis : {{ success }}
                            </p>
                            <p
                                class="cols-span-1 text-center bg-red-600 text-white rounded-lg p-6 mt-6"
                            >
                                Echoués : {{ fail }}
                            </p>
                        </div>
                    </section>
                </div>
                <div v-else class="m-6">
                    <p
                        class="flex justify-center text-bold text-5xl gap-4 md:text-xl px-6 py-8 text-white bg-gradient-to-tr from-rose-600 to-pink-700 rounded-xl shadow-xl"
                    >
                        <span>{{ formatNumber(success) }}</span>
                        <span>/</span>
                        <span> 20</span>
                    </p>

                    <h4 class="my-2 text-md font-semibold text-slate-700">
                        Mention : {{ obtainMention(success) }}
                    </h4>

                   
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
