<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import Card from '@/Components/Card.vue';
import LinksTable from '@/Components/LinksTable.vue';
import UserInformation from '@/Components/UserInformation.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <div class="grid grid-cols-4 gap-4">
            <Card class="col-span-4">
                <h1 class="text-2xl text-gray-800">
                    Welcome <span class="font-bold">{{ $page.props.auth.user.name }}</span>, 👋🏻
                </h1>
                <p class="mt-2 text-sm text-gray-600">
                    I hope you're having a great day so far!
                </p>
            </Card>
            <Card class="col-span-3">
                <LinksTable/>
            </Card>
            <Card class="col-span-1">
                <p>
                    This application is an example for Global Tickets.
                </p>
                <p class="mt-4">
                    The application is built using Laravel, Vue.js, and Jetstream. For the front-end, Tailwind CSS with
                    Shadcn UI is used. The application is a "simple" URL shortener. You can create short links, view
                    them, and delete them.
                </p>
                <p class="mt-4">
                    <p class="font-semibold">
                        Main technologies used:
                    </p>
                    <ul class="list-disc pl-4">
                        <li>
                            <a href="https://laravel.com" class="text-blue-500 hover:underline" target="_blank">Laravel</a>
                        </li>
                        <li>
                            <a href="https://vuejs.org" class="text-blue-500 hover:underline" target="_blank">Vue.js</a>
                        </li>
                        <li>
                            <a href="https://jetstream.laravel.com" class="text-blue-500 hover:underline" target="_blank">Jetstream</a>
                        </li>
                        <li>
                            <a href="https://tailwindcss.com" class="text-blue-500 hover:underline" target="_blank">Tailwind CSS</a>
                        </li>
                        <li>
                            <a href="https://www.shadcn-vue.com/docs/" class="text-blue-500 hover:underline" target="_blank">Shadcn UI</a>
                        </li>
                    </ul>
                    <p class="mt-4">
                        Extra packages used:
                    </p>
                    <ul class="list-disc pl-4">
                        <li>
                               <a href="https://tabler.io/icons/" class="text-blue-500 hover:underline" target="_blank">Tabler Icons</a>
                        </li>
                        <li>
                            <a href="https://heroicons.com" class="text-blue-500 hover:underline" target="_blank">Heroicons</a>
                        </li>
                    </ul>
                    <p class="mt-4">
                        Example application created by <a href="https://linkedin/cytorick" class="text-blue-500 hover:underline" target="_blank">Rick Visser</a>.
                    </p>
                </p>
            </Card>
        </div>
    </AppLayout>
</template>
