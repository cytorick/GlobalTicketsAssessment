<script setup>
import {defineProps} from 'vue';
import {
    IconChartDots,
    IconExternalLink,
    IconCircleCheck,
    IconX
} from '@tabler/icons-vue';
import {
    Tooltip,
    TooltipContent,
    TooltipProvider,
    TooltipTrigger
} from '@/shadcn/ui/tooltip'
import CreateShortlinkDialog from "@/Components/CreateShortlinkDialog.vue";
import EditShortlinkDialog from "@/Components/EditShortlinkDialog.vue";
import DeleteShortlinkDialog from "@/Components/DeleteShortlinkDialog.vue";
import HideShortlinkDialog from "@/Components/HideShortlinkDialog.vue";
import ShortlinkStatisticsDialog from "@/Components/ShortlinkStatisticsDialog.vue";

defineProps({
    shortlinks: Array,
});

const dateFormat = (date) => {
    return new Date(date).toLocaleString('en-US', {
        year: 'numeric',
        month: 'short',
        day: 'numeric',
    });
}

const statisticsCount = (shortlink) => {
    return shortlink.statistics.length + ' clicks' ?? '0 clicks';
}
</script>

<template>
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">
                Your short links
            </h1>
        </div>
        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            <CreateShortlinkDialog/>
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
                            Expires at
                        </th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold">
                            Disabled
                        </th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold">
                            Statistics
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
                    <tr v-for="shortlink in shortlinks" :key="shortlink.id" class="even:bg-gray-100 last:rounded-b-lg">
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">
                            {{ shortlink.title ?? '--' }}
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            <TooltipProvider>
                                <Tooltip>
                                    <TooltipTrigger>
                                        <a :href="'/l/' + shortlink.url" class="text-blue-400 hover:underline" target="_blank">
                                            /l/{{ shortlink.url }}
                                        </a>
                                    </TooltipTrigger>
                                    <TooltipContent>
                                        <p class="flex items-center">
                                            Visit Short Link
                                            <IconExternalLink :stroke="2" class="h-4 w-4 ml-2" aria-hidden="true"/>
                                        </p>
                                    </TooltipContent>
                                </Tooltip>
                            </TooltipProvider>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            <TooltipProvider>
                                <Tooltip>
                                    <TooltipTrigger>
                                        <a :href="shortlink.destination" class="text-blue-400 hover:underline"
                                           target="_blank">
                                            {{ shortlink.destination }}
                                        </a>
                                    </TooltipTrigger>
                                    <TooltipContent>
                                        <p class="flex items-center">
                                            Visit Destination
                                            <IconExternalLink :stroke="2" class="h-4 w-4 ml-2" aria-hidden="true"/>
                                        </p>
                                    </TooltipContent>
                                </Tooltip>
                            </TooltipProvider>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            {{ shortlink.expires_at ? dateFormat(shortlink.expires_at) : 'Never' }}
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            <IconCircleCheck :stroke="2" class="h-5 w-5 text-green-500" aria-hidden="true" v-if="shortlink.disabled"/>
                            <IconX :stroke="2" class="h-5 w-5 text-red-500" aria-hidden="true" v-else/>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            {{ statisticsCount(shortlink) }}
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            {{ dateFormat(shortlink.created_at) }}
                        </td>
                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-gray-500 text-right text-sm font-medium sm:pr-3 space-x-2">
                            <TooltipProvider>
                                <Tooltip>
                                    <TooltipTrigger>
                                        <HideShortlinkDialog :shortlink="shortlink"/>
                                    </TooltipTrigger>
                                    <TooltipContent>
                                        <p>Hide Short Link</p>
                                    </TooltipContent>
                                </Tooltip>
                            </TooltipProvider>
                            <TooltipProvider>
                                <Tooltip>
                                    <TooltipTrigger>
                                        <ShortlinkStatisticsDialog :shortlink="shortlink" :statistics="shortlink.statistics"/>
                                    </TooltipTrigger>
                                    <TooltipContent>
                                        <p>View Statistics</p>
                                    </TooltipContent>
                                </Tooltip>
                            </TooltipProvider>
                            <TooltipProvider>
                                <Tooltip>
                                    <TooltipTrigger>
                                        <DeleteShortlinkDialog :shortlink="shortlink"/>
                                    </TooltipTrigger>
                                    <TooltipContent>
                                        <p>Delete Short Link</p>
                                    </TooltipContent>
                                </Tooltip>
                            </TooltipProvider>
                            <TooltipProvider>
                                <Tooltip>
                                    <TooltipTrigger>
                                        <EditShortlinkDialog :shortlink="shortlink"/>
                                    </TooltipTrigger>
                                    <TooltipContent>
                                        <p>Edit Short Link</p>
                                    </TooltipContent>
                                </Tooltip>
                            </TooltipProvider>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
