<script setup>
import { ref } from "vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import MenuNav from "@/Components/MenuNav.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import { Link } from "@inertiajs/vue3";
import {
    HomeIcon,
    UserIcon,
    ChatBubbleLeftRightIcon,
    Square3Stack3DIcon,
    AcademicCapIcon,
    Squares2X2Icon,
    BellIcon,
    XCircleIcon,
    CalendarIcon,
    ClipboardDocumentListIcon,
    BeakerIcon,
    PuzzlePieceIcon,
    UserGroupIcon,
    TagIcon,
    FlagIcon,
    ArrowRightOnRectangleIcon,
} from "@heroicons/vue/24/outline";
import "animate.css";

const showingNavigationDropdown = ref(false);
let menuIsVisible = ref(false);
let ChangeVisibility = () => (menuIsVisible.value = !menuIsVisible.value);
</script>

<template>
    <div>
        <div class="min-h-screen flex flex-col">
            <div>
                <transition
                    enter-active-class="animate__animated animate__slideInLeft"
                    leave-active-class="animate__animated animate__slideOutLeft"
                    mode="out-in"
                >
                    <div
                        v-if="menuIsVisible"
                        class="fixed flex flex-col justify-around h-full w-full bg-gradient-to-b from-indigo-500 to-slate-800 bg-center z-50"
                    >
                        <div
                            class="custom-clip-path w-full h-screen bg-slate-800 absolute"
                        ></div>
                        <div class="flex justify-between items-center p-6 z-40">
                            <div class="flex items-center divide-x-2 w-full gap-2">
                                <div class="space-y-1">
                                    <h4
                                        class="font-semibold text-sm text-white uppercase"
                                    >
                                       Nom :  {{$page.props.auth.user.name}}
                                    </h4>
                                    <p class="text-xs opacity-90 text-white">
                                        Classe :  {{$page.props.auth.user.classroom}}
                                    </p>
                                </div>
                                <div class="pl-2 space-y-1">
                                    <h4
                                        class=" text-xs text-white uppercase "
                                    >
                                        {{$page.props.auth.user.establishment}}
                                    </h4>
                                  
                                </div>
                            </div>
                            <XCircleIcon
                                class="w-8 h-8 text-white"
                                @click="ChangeVisibility"
                            ></XCircleIcon>
                        </div>
                        <div class="mt-20 grid grid-cols-2 p-6 z-40">
                            <div class="col-span-2 space-y-2">
                                <MenuNav
                                    :href="route('schedule.index')"
                                    :active="route().current('schedule.index')"
                                    class="text-white flex items-center gap-2 w-full"
                                >
                                    <CalendarIcon class="h-8 w-8" />
                                    <span class="text-lg">
                                        Emploi du temps</span
                                    >
                                </MenuNav>
                                <MenuNav
                                    :href="route('subject.index')"
                                    :active="route().current('subject.index')"
                                    class="text-white flex gap-2 items-center w-full"
                                >
                                    <ClipboardDocumentListIcon
                                        class="h-8 w-8"
                                    />
                                    <span class="text-lg">Sujets et Exos</span>
                                </MenuNav>
                                <MenuNav
                                    :href="route('dashboard')"
                                    :active="route().current('dashboard')"
                                    class="text-white flex gap-2 items-center w-full"
                                >
                                    <BeakerIcon class="h-8 w-8" />
                                    <span class="text-lg">Mes examens</span>
                                </MenuNav>

                                <MenuNav
                                    :href="route('game')"
                                    :active="route().current('game')"
                                    class="text-white flex gap-2 items-center w-full"
                                >
                                    <PuzzlePieceIcon class="h-8 w-8" />
                                    <span class="text-lg">Gaming</span>
                                </MenuNav>
                                <MenuNav
                                    :href="route('dashboard')"
                                    :active="route().current('dashboard')"
                                    class="text-white flex gap-2 items-center w-full"
                                >
                                    <TagIcon class="h-8 w-8" />
                                    <span class="text-lg">Vos groupes</span>
                                </MenuNav>

                                <MenuNav
                                    :href="route('dashboard')"
                                    :active="route().current('dashboard')"
                                    class="text-white flex gap-2 items-center w-full"
                                >
                                    <UserGroupIcon class="h-8 w-8" />
                                    <span class="text-lg">Mes amis</span>
                                </MenuNav>
                                <MenuNav
                                    :href="route('dashboard')"
                                    :active="route().current('dashboard')"
                                    class="text-white flex gap-2 items-center w-full"
                                >
                                    <FlagIcon class="h-8 w-8" />
                                    <span class="text-lg">Bilan</span>
                                </MenuNav>
                            </div>
                        </div>
                        <Link
                            :href="route('logout')"
                            method="post"
                            as="button"
                            class="z-40 inline-flex justify-center gap-x-2 bg-white bg-opacity-80 rounded-full p-4 m-6"
                        >
                            <ArrowRightOnRectangleIcon
                                class="w-6 h-6 text-indigo-700"
                            />
                            <span class="text-indigo-700"> Deconnexion </span>
                        </Link>
                    </div>
                </transition>
                <nav
                    class="z-30 fixed top-0 w-full bg-white px-4 py-2 flex justify-between items-center"
                >
                    <Squares2X2Icon
                        class="h-6 w-6"
                        @click="ChangeVisibility"
                    ></Squares2X2Icon>
                    <div class="rounded-lg p-2 bg-slate-100 relative">
                        <BellIcon class="h-6 w-6"></BellIcon>
                        <span
                            class="absolute w-2 h-2 rounded-full bg-red-500 top-2 right-3"
                        ></span>
                    </div>
                </nav>
                <!-- Page Content -->
                <main class="mt-14">
                    <slot />
                </main>
            </div>
            <footer
                class="fixed bottom-0 w-full bg-white px-4 py-2 flex justify-around"
            >
                <MenuNav
                    :href="route('dashboard')"
                    :active="route().current('dashboard')"
                    class="flex flex-col"
                >
                    <HomeIcon class="h-6 w-6" />
                    <span> Acceuil</span>
                </MenuNav>
                <MenuNav class="flex flex-col">
                    <AcademicCapIcon class="h-6 w-6" />

                    <span> Cours</span>
                </MenuNav>
                <MenuNav class="flex flex-col">
                    <Square3Stack3DIcon class="h-6 w-6" />

                    <span>IA</span>
                </MenuNav>
                <MenuNav class="flex flex-col">
                    <ChatBubbleLeftRightIcon class="h-6 w-6" />

                    <span>Chat</span>
                </MenuNav>
                <MenuNav
                    :href="route('profile.edit')"
                    :active="route().current('profile.edit')"
                    class="flex flex-col"
                >
                    <UserIcon class="h-6 w-6" />

                    <span> Compte</span>
                </MenuNav>
            </footer>
        </div>
    </div>
</template>
<style>
.custom-clip-path {
    clip-path: polygon(100% 0%, 100% 49%, 100% 100%, 25% 100%, 75% 53%, 25% 0%);
}
</style>
