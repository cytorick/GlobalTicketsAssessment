<script setup>
const people = [
    {name: 'Google', title: '/l/1x224s', email: 'https://google.nl', role: '19-12-2024'},
    {name: 'Facebook', title: '/l/1x224s', email: 'https://facebook.nl', role: '19-12-2024'},
    {name: 'Instagram', title: '/l/1x224s', email: 'https://instagram.nl', role: '19-12-2024'},
    {name: 'Twitter (X)', title: '/l/1x224s', email: 'https://x.nl', role: '19-12-2024'},
    // More people...
];

import {
    IconPlus,
    IconEdit,
} from '@tabler/icons-vue';
</script>

<template>
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">
                Your short links
            </h1>
            <p class="mt-2 text-sm text-gray-700">
                Here you will find a table with 10 of your most recent short links.
            </p>
        </div>
        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            <button type="button"
                    class="block rounded-md bg-[#FD0] p-2 text-center text-sm font-bold text-gray-900 shadow-sm hover:bg-[#1E2228] hover:text-white">
                <IconPlus :stroke="2" class="h-6 w-6" aria-hidden="true"/>
            </button>
        </div>
    </div>
    <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8 rounded-lg">
                <table class="min-w-full divide-y divide-gray-300 !rounded-lg">
                    <thead class="bg-[#1E2228] text-white">
                    <tr>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold sm:pl-3 rounded-tl-lg">
                            Name
                        </th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold">
                            Url
                        </th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold">
                            Destination
                        </th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold">
                            Created at
                        </th>
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3 text-right rounded-tr-lg">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                    <tr v-for="person in people" :key="person.email" class="even:bg-gray-100 last:rounded-b-lg">
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">
                            {{ person.name }}
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            <a href="" class="text-blue-400 hover:underline" target="_blank">
                                {{ person.title }}
                            </a>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            <a href="" class="text-blue-400 hover:underline" target="_blank">
                                {{ person.email }}
                            </a>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ person.role }}</td>
                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-gray-500 text-right text-sm font-medium sm:pr-3">
                            <a href="#" class="hover:text-[#1E2228] hover:shadow-sm ml-auto">
                                <IconEdit :stroke="2" class="h-5 w-5 ml-auto" aria-hidden="true"/>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
