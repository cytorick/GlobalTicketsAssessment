<script setup>
import {ref} from "vue";
import {
    Dialog,
    DialogPanel,
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
    TransitionChild,
    TransitionRoot,
} from '@headlessui/vue'
import {
    Bars3Icon,
    BellIcon,
    CalendarIcon,
    ChartPieIcon,
    Cog6ToothIcon,
    DocumentDuplicateIcon,
    FolderIcon,
    HomeIcon,
    UsersIcon,
    XMarkIcon,
} from '@heroicons/vue/24/outline'
import {ChevronDownIcon, MagnifyingGlassIcon} from '@heroicons/vue/20/solid'

const navigation = [
    {name: 'Dashboard', href: '#', icon: HomeIcon, current: true},
    {name: 'Team', href: '#', icon: UsersIcon, current: false},
    {name: 'Projects', href: '#', icon: FolderIcon, current: false},
    {name: 'Calendar', href: '#', icon: CalendarIcon, current: false},
    {name: 'Documents', href: '#', icon: DocumentDuplicateIcon, current: false},
    {name: 'Reports', href: '#', icon: ChartPieIcon, current: false},
]
const teams = [
    {id: 1, name: 'Heroicons', href: '#', initial: 'H', current: false},
    {id: 2, name: 'Tailwind Labs', href: '#', initial: 'T', current: false},
    {id: 3, name: 'Workcation', href: '#', initial: 'W', current: false},
]
const userNavigation = [
    {name: 'Your profile', href: '#'},
    {name: 'Sign out', href: '#'},
]

const sidebarOpen = ref(false)

defineProps({
    title: String,
})
</script>

<template>
    <div class="bg-gray-100">
        <TransitionRoot as="template" :show="sidebarOpen">
            <Dialog class="relative z-50 lg:hidden" @close="sidebarOpen = false">
                <TransitionChild as="template" enter="transition-opacity ease-linear duration-300"
                                 enter-from="opacity-0" enter-to="opacity-100"
                                 leave="transition-opacity ease-linear duration-300" leave-from="opacity-100"
                                 leave-to="opacity-0">
                    <div class="fixed inset-0 bg-gray-900/80"/>
                </TransitionChild>

                <div class="fixed inset-0 flex">
                    <TransitionChild as="template" enter="transition ease-in-out duration-300 transform"
                                     enter-from="-translate-x-full" enter-to="translate-x-0"
                                     leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0"
                                     leave-to="-translate-x-full">
                        <DialogPanel class="relative mr-16 flex w-full max-w-xs flex-1">
                            <TransitionChild as="template" enter="ease-in-out duration-300" enter-from="opacity-0"
                                             enter-to="opacity-100" leave="ease-in-out duration-300"
                                             leave-from="opacity-100" leave-to="opacity-0">
                                <div class="absolute left-full top-0 flex w-16 justify-center pt-5">
                                    <button type="button" class="-m-2.5 p-2.5" @click="sidebarOpen = false">
                                        <span class="sr-only">Close sidebar</span>
                                        <XMarkIcon class="h-6 w-6 text-white" aria-hidden="true"/>
                                    </button>
                                </div>
                            </TransitionChild>
                            <!-- Sidebar component, swap this element with another sidebar if you like -->
                            <div
                                class="flex grow flex-col gap-y-5 overflow-y-auto bg-gray-900 px-6 pb-4 ring-1 ring-white/10">
                                <div class="flex h-16 shrink-0 items-center">
                                    <img class="h-8 w-auto"
                                         src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                                         alt="Your Company"/>
                                </div>
                                <nav class="flex flex-1 flex-col">
                                    <ul role="list" class="flex flex-1 flex-col gap-y-7">
                                        <li>
                                            <ul role="list" class="-mx-2 space-y-1">
                                                <li v-for="item in navigation" :key="item.name">
                                                    <a :href="item.href"
                                                       :class="[item.current ? 'bg-gray-800 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800', 'group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold']">
                                                        <component :is="item.icon" class="h-6 w-6 shrink-0"
                                                                   aria-hidden="true"/>
                                                        {{ item.name }}
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <div class="text-xs font-semibold leading-6 text-gray-400">Your teams</div>
                                            <ul role="list" class="-mx-2 mt-2 space-y-1">
                                                <li v-for="team in teams" :key="team.name">
                                                    <a :href="team.href"
                                                       :class="[team.current ? 'bg-gray-800 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800', 'group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold']">
                                                        <span
                                                            class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border border-gray-700 bg-gray-800 text-[0.625rem] font-medium text-gray-400 group-hover:text-white">{{
                                                                team.initial
                                                            }}</span>
                                                        <span class="truncate">{{ team.name }}</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="mt-auto">
                                            <a href="#"
                                               class="group -mx-2 flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-gray-400 hover:bg-gray-800 hover:text-white">
                                                <Cog6ToothIcon class="h-6 w-6 shrink-0" aria-hidden="true"/>
                                                Settings
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </Dialog>
        </TransitionRoot>

        <!-- Static sidebar for desktop -->
        <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-[#1E2228] px-6 pb-4">
                <div class="flex h-16 shrink-0 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="272.085"
                         height="30" viewBox="0 0 272.085 30">
                        <defs>
                            <clipPath id="clip-path_684">
                                <rect id="Rectangle_684" width="272.085" height="30" fill="none"></rect>
                            </clipPath>
                        </defs>
                        <g clip-path="url(#clip-path_684)">
                            <path id="Path_213"
                                  d="M16.342,62.161l-.1-2.155a2.048,2.048,0,0,1-.344.769,2.931,2.931,0,0,1-.687.692,3.553,3.553,0,0,1-1.018.5,4.271,4.271,0,0,1-1.311.192H5.447a11.21,11.21,0,0,1-2.686-.267,3.3,3.3,0,0,1-1.667-.93,3.7,3.7,0,0,1-.853-1.743A12.824,12.824,0,0,1,0,56.484V50.323a12.392,12.392,0,0,1,.242-2.66,3.79,3.79,0,0,1,.853-1.757,3.42,3.42,0,0,1,1.667-.968,10.291,10.291,0,0,1,2.686-.293h8.885a4.779,4.779,0,0,1,1.68.268,4.65,4.65,0,0,1,1.222.662,3.806,3.806,0,0,1,.815.84,4.792,4.792,0,0,1,.458.8l-2.164,2.24a3.026,3.026,0,0,0-.738-.929,2.252,2.252,0,0,0-1.5-.42H5.472a2.228,2.228,0,0,0-1.629.457,2.6,2.6,0,0,0-.433,1.753v5.638A9.18,9.18,0,0,0,3.5,57.4a1.716,1.716,0,0,0,.331.825,1.116,1.116,0,0,0,.636.381,4.682,4.682,0,0,0,1.006.089H13.44a3.525,3.525,0,0,0,2.011-.417,1.434,1.434,0,0,0,.56-1.227V54.829H9.444V51.978h9.8V62.161Z"
                                  transform="translate(0.001 -36.21)" fill="#fff"></path>
                            <path id="Path_214" d="M117.486,62.161V44.646H120.9V58.7h13.187v3.462Z"
                                  transform="translate(-95.287 -36.21)" fill="#fff"></path>
                            <path id="Path_215"
                                  d="M389.853,62.161V44.646H403.8a10.553,10.553,0,0,1,2.317.217,3.473,3.473,0,0,1,1.527.726,2.831,2.831,0,0,1,.84,1.375,7.8,7.8,0,0,1,.254,2.164v1.095a2.569,2.569,0,0,1-2.317,2.876,3.34,3.34,0,0,1,1.935.917,3.126,3.126,0,0,1,.789,2.342V57.5a7.123,7.123,0,0,1-.305,2.253,3.1,3.1,0,0,1-.955,1.438,3.825,3.825,0,0,1-1.667.751,11.748,11.748,0,0,1-2.418.217Zm15.478-12.55a1.594,1.594,0,0,0-.344-1.171,1.694,1.694,0,0,0-1.186-.331H393.264V51.9h10.562a1.535,1.535,0,0,0,1.161-.369,1.833,1.833,0,0,0,.344-1.26Zm.407,6.837a1.957,1.957,0,0,0-.37-1.353,1.986,1.986,0,0,0-1.441-.392H393.264v4H403.8a2.342,2.342,0,0,0,1.543-.366,1.655,1.655,0,0,0,.4-1.253Z"
                                  transform="translate(-316.193 -36.21)" fill="#fff"></path>
                            <path id="Path_216"
                                  d="M513.272,62.161l-2.189-4.073H500.518l-2.189,4.073h-3.92l9.6-17.515h3.59l9.6,17.515Zm-7.459-14.078-3.971,7.255h7.943Z"
                                  transform="translate(-400.992 -36.21)" fill="#fff"></path>
                            <path id="Path_217" d="M624.56,62.161V44.646h3.411V58.7h13.187v3.462Z"
                                  transform="translate(-506.553 -36.21)" fill="#fff"></path>
                            <path id="Path_218" d="M787.167,62.161V48.108h-6.389V44.646h16.191v3.462h-6.39V62.161Z"
                                  transform="translate(-633.254 -36.21)" fill="#fd0"></path>
                            <path id="Path_219" d="M1254.018,62.161V48.108h-6.389V44.646h16.191v3.462h-6.39V62.161Z"
                                  transform="translate(-1011.897 -36.21)" fill="#fd0"></path>
                            <rect id="Rectangle_681" width="3.412" height="17.515" transform="translate(165.929 8.436)"
                                  fill="#fd0"></rect>
                            <path id="Path_220"
                                  d="M918.263,62.161a10.314,10.314,0,0,1-2.622-.28,3.52,3.52,0,0,1-1.668-.929,3.739,3.739,0,0,1-.891-1.744,11.721,11.721,0,0,1-.267-2.724V50.323a11.717,11.717,0,0,1,.267-2.724,3.834,3.834,0,0,1,.891-1.757,3.381,3.381,0,0,1,1.668-.929,10.783,10.783,0,0,1,2.622-.268h9.827a4.888,4.888,0,0,1,1.693.268,4.6,4.6,0,0,1,1.234.662,3.809,3.809,0,0,1,.815.84,4.76,4.76,0,0,1,.458.8l-2.189,2.24a2.6,2.6,0,0,0-.738-.929,2.314,2.314,0,0,0-1.5-.42h-9.572a2.161,2.161,0,0,0-1.6.483,2.513,2.513,0,0,0-.458,1.727v6.171a5.3,5.3,0,0,0,.076.966,1.573,1.573,0,0,0,.293.685,1.288,1.288,0,0,0,.624.419,3.374,3.374,0,0,0,1.069.14h9.7a2.254,2.254,0,0,0,1.5-.42,2.7,2.7,0,0,0,.713-.929l2.19,2.221a4.866,4.866,0,0,1-.458.808,3.79,3.79,0,0,1-.815.846,4.579,4.579,0,0,1-1.234.667,4.847,4.847,0,0,1-1.693.269Z"
                                  transform="translate(-740.344 -36.21)" fill="#fd0"></path>
                            <path id="Path_221"
                                  d="M1045.8,62.161l-6.9-6.874-5.27,4.735v2.138h-3.462V44.646h3.462V55.695L1045.8,44.646h4.964l-9.5,8.5,9.445,9.012Z"
                                  transform="translate(-835.523 -36.21)" fill="#fd0"></path>
                            <path id="Path_222"
                                  d="M1148.6,62.161V44.646h16.8v3.462H1152.01v3.87h13.008V54.8H1152.01v3.9H1165.4v3.462Z"
                                  transform="translate(-931.578 -36.21)" fill="#fd0"></path>
                            <path id="Path_223"
                                  d="M1360.585,57.2a7.936,7.936,0,0,1-.306,2.368,3.407,3.407,0,0,1-.98,1.565,4.074,4.074,0,0,1-1.769.866,11.319,11.319,0,0,1-2.648.267h-12.372l.229-3.463h11.914a6.434,6.434,0,0,0,1.158-.088,1.563,1.563,0,0,0,.738-.317,1.248,1.248,0,0,0,.382-.594,3.163,3.163,0,0,0,.114-.923,1.92,1.92,0,0,0-.484-1.5,2.915,2.915,0,0,0-1.833-.417h-7.1a10.524,10.524,0,0,1-2.635-.279,4.059,4.059,0,0,1-1.705-.863,3.258,3.258,0,0,1-.93-1.473,6.967,6.967,0,0,1-.279-2.082v-.585a7.894,7.894,0,0,1,.279-2.235,3.2,3.2,0,0,1,.943-1.523,4.155,4.155,0,0,1,1.744-.863,10.919,10.919,0,0,1,2.686-.279H1360q-.1.885-.2,1.731t-.229,1.731h-11.838a2.512,2.512,0,0,0-1.718.433,2.006,2.006,0,0,0-.446,1.476,2.053,2.053,0,0,0,.446,1.489,2.459,2.459,0,0,0,1.718.445h7a12.035,12.035,0,0,1,2.75.268,4.462,4.462,0,0,1,1.807.827,3.159,3.159,0,0,1,.993,1.413,5.919,5.919,0,0,1,.306,2Z"
                                  transform="translate(-1088.5 -36.32)" fill="#fd0"></path>
                            <path id="Path_224"
                                  d="M247.1,8.7a5.527,5.527,0,0,0-1.323-2.574A5.2,5.2,0,0,0,243.3,4.741a15.144,15.144,0,0,0-3.82-.411h-4.532V0h-4.462V4.33h-4.532a15.268,15.268,0,0,0-3.875.411,5.188,5.188,0,0,0-2.459,1.381,5.378,5.378,0,0,0-1.3,2.574,17.83,17.83,0,0,0-.372,3.955v9.029a17.821,17.821,0,0,0,.372,3.955,5.378,5.378,0,0,0,1.3,2.575,5.184,5.184,0,0,0,2.459,1.38,15.252,15.252,0,0,0,3.875.41h13.526a15.127,15.127,0,0,0,3.82-.41,5.2,5.2,0,0,0,2.478-1.38,5.527,5.527,0,0,0,1.323-2.575,17,17,0,0,0,.391-3.955V12.65A17.006,17.006,0,0,0,247.1,8.7m-4.608,12.992a3.741,3.741,0,0,1-.653,2.569,3.281,3.281,0,0,1-2.37.669H225.965a3.275,3.275,0,0,1-2.369-.669,3.736,3.736,0,0,1-.653-2.569V12.679a3.741,3.741,0,0,1,.672-2.587,3.224,3.224,0,0,1,2.35-.689h4.522V12.76h4.462V9.4h4.521a3.226,3.226,0,0,1,2.351.689,3.744,3.744,0,0,1,.671,2.587Z"
                                  transform="translate(-176.765 0.001)" fill="#fd0"></path>
                            <rect id="Rectangle_682" width="4.541" height="4.723" transform="translate(53.722 14.862)"
                                  fill="#fd0"></rect>
                            <rect id="Rectangle_683" width="9.1" height="3.462" transform="translate(136.514 15.462)"
                                  fill="#fff"></rect>
                        </g>
                    </svg>
                </div>
                <nav class="flex flex-1 flex-col">
                    <ul role="list" class="flex flex-1 flex-col gap-y-7">
                        <li>
                            <ul role="list" class="-mx-2 space-y-1">
                                <li v-for="item in navigation" :key="item.name">
                                    <a :href="item.href"
                                       :class="[item.current ? 'bg-gray-800 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800', 'group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold']">
                                        <component :is="item.icon" class="h-6 w-6 shrink-0" aria-hidden="true"/>
                                        {{ item.name }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="text-xs font-semibold leading-6 text-gray-400">Your teams</div>
                            <ul role="list" class="-mx-2 mt-2 space-y-1">
                                <li v-for="team in teams" :key="team.name">
                                    <a :href="team.href"
                                       :class="[team.current ? 'bg-gray-800 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800', 'group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold']">
                                        <span
                                            class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border border-gray-700 bg-gray-800 text-[0.625rem] font-medium text-gray-400 group-hover:text-white">{{
                                                team.initial
                                            }}</span>
                                        <span class="truncate">{{ team.name }}</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="mt-auto">
                            <a href="#"
                               class="group -mx-2 flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-gray-400 hover:bg-gray-800 hover:text-white">
                                <Cog6ToothIcon class="h-6 w-6 shrink-0" aria-hidden="true"/>
                                Settings
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="lg:pl-72">
            <div
                class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-4 border-b border-gray-200 bg-white px-4 shadow-sm sm:gap-x-6 sm:px-6 lg:px-8">
                <button type="button" class="-m-2.5 p-2.5 text-gray-700 lg:hidden" @click="sidebarOpen = true">
                    <span class="sr-only">Open sidebar</span>
                    <Bars3Icon class="h-6 w-6" aria-hidden="true"/>
                </button>

                <!-- Separator -->
                <div class="h-6 w-px bg-gray-900/10 lg:hidden" aria-hidden="true"/>

                <div class="flex flex-1 gap-x-4 self-stretch lg:gap-x-6">
                    <div class="relative flex flex-1 items-center">
                        <span class="text-xl font-semibold leading-6 text-gray-900">
                            {{ title }}
                        </span>
                    </div>
                    <div class="flex items-center gap-x-4 lg:gap-x-6">

                        <!--Separator -->
                        <div class="hidden lg:block lg:h-6 lg:w-px lg:bg-gray-900/10" aria-hidden="true"/>

                        <!-- Profile dropdown -->
                        <Menu as="div" class="relative">
                            <MenuButton class="-m-1.5 flex items-center p-1.5">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full bg-gray-50"
                                     src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                     alt=""/>
                                <span class="hidden lg:flex lg:items-center">
                  <span class="ml-4 text-sm font-semibold leading-6 text-gray-900" aria-hidden="true">Tom Cook</span>
                  <ChevronDownIcon class="ml-2 h-5 w-5 text-gray-400" aria-hidden="true"/>
                </span>
                            </MenuButton>
                            <transition enter-active-class="transition ease-out duration-100"
                                        enter-from-class="transform opacity-0 scale-95"
                                        enter-to-class="transform opacity-100 scale-100"
                                        leave-active-class="transition ease-in duration-75"
                                        leave-from-class="transform opacity-100 scale-100"
                                        leave-to-class="transform opacity-0 scale-95">
                                <MenuItems
                                    class="absolute right-0 z-10 mt-2.5 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none">
                                    <MenuItem v-for="item in userNavigation" :key="item.name" v-slot="{ active }">
                                        <a :href="item.href"
                                           :class="[active ? 'bg-gray-50' : '', 'block px-3 py-1 text-sm leading-6 text-gray-900']">{{
                                                item.name
                                            }}</a>
                                    </MenuItem>
                                </MenuItems>
                            </transition>
                        </Menu>
                    </div>
                </div>
            </div>

            <main class="py-10 bg-gray-100">
                <div class="px-4 sm:px-6 lg:px-8">
                    <!-- Slot for page content -->
                    <slot/>
                </div>
            </main>
        </div>
    </div>
</template>
