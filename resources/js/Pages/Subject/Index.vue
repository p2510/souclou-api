<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { ChevronLeftIcon, ChevronRightIcon } from "@heroicons/vue/24/outline";
import Modal from "@/Components/Modal.vue";
import SecondaryButton from '@/Components/SecondaryButton.vue';
import { ref, computed, onMounted } from "vue";
let props = defineProps(["data"]);
let selectedCourse = ref("SVT");

const courseChapters = computed(() => {
    const chaptersByCourse = {};
    props.data.forEach((subject) => {
        if (!chaptersByCourse[subject.course]) {
            chaptersByCourse[subject.course] = [];
        }
        chaptersByCourse[subject.course].push({
            chapter: subject.chapter,
            title: subject.title,
            content: subject.content,
        });
    });
    return chaptersByCourse;
});

const currentChapters = computed(() => {
    return courseChapters.value[selectedCourse.value] || [];
});

let show = ref(false);

const closeModal = () => {
    show.value = false;
};
let content=ref('')
let title=ref('')
const showModal = (c,t) => {
    content.value=c
    title.value=t
    show.value = true;
};


</script>

<template>
    <Head title="Subject " />
    <AuthenticatedLayout>
        <div class="h-screen bg-white">
            <div class="px-6 lg:px-8">
                <h3 class="font-bold text-3xl py-4">Sujets et Exos</h3>
                <ul
                    class="flex items-center gap-4 py-4 w-full overflow-x-scroll"
                >
                    <li
                        v-for="course in Object.keys(courseChapters || {})"
                        :key="course"
                        @click="selectedCourse = course"
                        :class="{
                            'font-semibold text-md bg-pink-600 py-1 px-2 rounded-md text-white shadow-md':
                                selectedCourse === course,
                            'font-medium text-md p-2':
                                selectedCourse !== course,
                        }"
                    >
                        {{ course }}
                    </li>
                </ul>

                <h4 class="font-bold text-xl py-4">Sujets et Exercices</h4>

                <ul class="pl-6 space-y-4">
                    <li
                        v-for="chapter in currentChapters"
                        :key="chapter.chapter"
                        @click="showModal(chapter.content,chapter.title)"
                        class="font-bold text-md flex justify-between gap-2 items-center"
                    >
                        <p class="flex flex-col gap-y-1">
                            <span>{{ chapter.title }}</span>
                            <span class="text-sm opacity-50">
                                {{ chapter.chapter }}
                            </span>
                        </p>
                        <ChevronRightIcon class="w-4 h-4" />
                    </li>
                </ul>
            </div>
            <Modal :show="show" @close="closeModal">
                <div class="p-6">
                    <h2
                        class="text-lg font-medium text-gray-900 dark:text-gray-100"
                    >
                       {{title}}
                    </h2>

                    <p v-html="content" class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                       
                    </p>

                    <div class="mt-6 flex justify-end">
                        <SecondaryButton @click="closeModal">Fermé</SecondaryButton>
                    </div>
                </div>
            </Modal>
        </div>
    </AuthenticatedLayout>
</template>

<style>
/* Pour masquer la barre de défilement par défaut */
.overflow-x-scroll::-webkit-scrollbar {
    display: none;
}

/* Pour styliser la barre personnalisée (par exemple, avec une couleur rouge) */
.overflow-x-scroll {
    scrollbar-color: red;
    scrollbar-width: thin;
}

.overflow-x-scroll::-webkit-scrollbar-track {
    background-color: #f1f1f1;
}

.overflow-x-scroll::-webkit-scrollbar-thumb {
    background-color: red;
    border-radius: 6px;
}
</style>
