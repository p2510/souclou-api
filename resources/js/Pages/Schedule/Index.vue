<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputError from "@/Components/InputError.vue";
import { ref } from "vue";
import "animate.css";
import { ArrowLeftIcon } from "@heroicons/vue/24/solid";

let props = defineProps(["data"]);

let showConfiguration = ref(false);
let changeShowConfiguration = () => {
    showConfiguration.value = !showConfiguration.value;
};

// show course
let dataSchedule = ref([]);
let dataDay = ref('Lundi');
let showSchedule = ref(false);
let changeShowSchedule = (day) => {
    showSchedule.value = !showSchedule.value;
    dataSchedule.value = props.data[day];
    dataDay.value=day
};

// Register course
const form = useForm({
    course: "",
    day: "",
    start_at: "",
    end_at: "",
});
const submit = () => {
    form.post(route("schedule.store"));
};
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
       
        <div class="h-screen bg-white">
            <div class="sm:px-6 lg:px-8">
                <div class="overflow-hidden p-4">
                    <h2 class="text-xl font-semibold">Emploi du temps</h2>
                    <div class="mt-8">
                   
                        <ul
                            class="flex px-4 justify-center gap-4 font-medium text-lg"
                        >
                            <li
                                @click="changeShowConfiguration"
                                :class="
                                    showConfiguration
                                        ? 'text-indigo-700 hover:text-indigo-800  border-b-2 border-spacing-2 border-indigo-800'
                                        : 'text-slate-400'
                                "
                            >
                                Voir
                            </li>
                            <li
                                @click="changeShowConfiguration"
                                :class="
                                    !showConfiguration
                                        ? 'text-indigo-700 hover:text-indigo-800  border-b-2 border-spacing-2 border-indigo-800'
                                        : 'text-slate-400'
                                "
                            >
                                Configurer
                            </li>
                        </ul>
                    </div>

                    <div
                        v-if="$page.props.flash?.success"
                        class="bg-green-600 rounded-lg p-2 text-white w-full mt-4"
                    >
                        {{ $page.props.flash.success }}
                    </div>

                    <transition
                        enter-active-class="animate__animated animate__fadeIn"
                        leave-active-class="animate__animated animate__fadeOut"
                        mode="out-in"
                    >
                        <!-- show timetable -->
                        <div v-if="showConfiguration">
                            <transition
                                enter-active-class="animate__animated animate__slideInLeft"
                                leave-active-class="animate__animated animate__zoomOut"
                                mode="out-in"
                            >
                                <ul
                                    class="mt-24 w-full grid grid-cols-2 gap-4"
                                    v-if="!showSchedule"
                                >
                                    <li
                                        class="bg-gradient-to-tr from-indigo-400 to-indigo-900 col-span-1 text-center py-10 text-white font-semibold text-2xl rounded-lg shadow-lg"
                                        @click="changeShowSchedule('Lundi')"
                                    >
                                        Lundi
                                    </li>
                                    <li
                                        class="bg-gradient-to-tr from-sky-400 to-sky-900 col-span-1 text-center py-10 text-white font-semibold text-2xl rounded-lg shadow-lg"
                                        @click="changeShowSchedule('Mardi')"
                                    >
                                        Mardi
                                    </li>
                                    <li
                                        class="bg-gradient-to-tr from-pink-400 to-pink-900 col-span-1 text-center py-10 text-white font-semibold text-2xl rounded-lg shadow-lg"
                                        @click="changeShowSchedule('mercredi')"
                                    >
                                        Mercredi
                                    </li>
                                    <li
                                        class="bg-gradient-to-tr from-teal-400 to-teal-900 col-span-1 text-center py-10 text-white font-semibold text-2xl rounded-lg shadow-lg"
                                        @click="changeShowSchedule('jeudi')"
                                    >
                                        jeudi
                                    </li>
                                    <li
                                        class="bg-gradient-to-tr from-purple-400 to-purple-900 col-span-1 text-center py-10 text-white font-semibold text-2xl rounded-lg shadow-lg"
                                        @click="changeShowSchedule('Vendredi')"
                                    >
                                        vendredi
                                    </li>
                                    <li
                                        class="bg-gradient-to-tr from-amber-400 to-amber-900 col-span-1 text-center py-10 text-white font-semibold text-2xl rounded-lg shadow-lg"
                                        @click="changeShowSchedule('Samedi')"
                                    >
                                        Samedi
                                    </li>
                                </ul>
                                <div v-else class="mt-16 w-full">
                                  
                                    <p
                                        class="font-bold text-md my-4 bg-gradient-to-tr from-pink-600 to-pink-800 px-4 py-2 text-white text-xl flex justify-between items-center"
                                    >
                                        <button
                                            @click="changeShowSchedule('Lundi')"
                                        >
                                            <ArrowLeftIcon class="w-6 h-6" />
                                        </button>
                                        <span> {{dataDay}}</span>
                                    </p>
                                    <div class="grid grid-cols-2 gap-2">
                                        <div
                                        v-for="(data, index) in dataSchedule" :key="index"
                                            class="col-span-1 py-2 px-4 rounded-md flex flex-col items-center gap-y-2 shadow-lg w-full bg-white"
                                        >
                                            <p
                                                class="text-sky-700 font-semibold text-2xl"
                                            >
                                                {{data.course}}
                                            </p>
                                            <div class="flex gap-2">
                                                <span
                                                    class="bg-pink-600 rounded-lg px-2 py-1 text-white"
                                                >
                                                {{data.start_at}}

                                                </span>
                                                <span
                                                    class="bg-white text-slate-800 border-2 border-slate-800 rounded-lg px-2 py-1"
                                                >
                                                {{data.end_at}}

                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </transition>
                        </div>
                        <!-- configure timetable-->
                        <section class="mt-8" v-else>
                            <form @submit.prevent="submit" class="space-y-6">
                                <div>
                                    <InputLabel
                                        for="day"
                                        value="Choisir un jour"
                                    />
                                    <select
                                        name="day"
                                        id="day"
                                        class="mt-1 block border-1 border-gray-400 w-full px-3 py-2 placeholder-gray-500 rounded-xl appearance-none focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600 shadow-sm"
                                        v-model="form.day"
                                        required
                                        autofocus
                                        autocomplete="day"
                                    >
                                        <option value="Lundi">Lundi</option>
                                        <option value="Mardi">Mardi</option>
                                        <option value="Mercredi">
                                            Mercredi
                                        </option>
                                        <option value="Jeudi">Jeudi</option>
                                        <option value="Vendredi">
                                            Vendredi
                                        </option>
                                        <option value="Samedi">Samedi</option>
                                    </select>
                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.day"
                                    />
                                </div>
                                <div>
                                    <InputLabel for="course" value="Matière " />
                                    <TextInput
                                        id="course"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="form.course"
                                        required
                                    />
                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.course"
                                    />
                                </div>
                                <div>
                                    <InputLabel
                                        for="start_at"
                                        value="Début du cours"
                                    />
                                    <TextInput
                                        id="start_at"
                                        type="time"
                                        class="mt-1 block w-full"
                                        v-model="form.start_at"
                                        required
                                    />
                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.start_at"
                                    />
                                </div>
                                <div>
                                    <InputLabel
                                        for="end_at"
                                        value="Fin du cours"
                                    />
                                    <TextInput
                                        id="end_at"
                                        type="time"
                                        class="mt-1 block w-full"
                                        v-model="form.end_at"
                                        required
                                    />
                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.end_at"
                                    />
                                </div>
                                <div
                                    class="flex flex-col items-center gap-2 w-full mt-4"
                                >
                                    <PrimaryButton
                                        class="w-1/2 flex justify-center"
                                        :class="{
                                            'opacity-25': form.processing,
                                        }"
                                        :disabled="form.processing"
                                    >
                                        Enregistrer
                                    </PrimaryButton>
                                </div>
                            </form>
                        </section>
                    </transition>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
