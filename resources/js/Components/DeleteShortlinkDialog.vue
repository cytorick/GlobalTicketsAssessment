<script setup>
import {ref, defineProps} from 'vue';
import {useForm, router} from '@inertiajs/vue3';
import {IconTrash} from "@tabler/icons-vue";
import {
    AlertDialog,
    AlertDialogCancel,
    AlertDialogContent, AlertDialogDescription, AlertDialogFooter,
    AlertDialogHeader,
    AlertDialogTitle, AlertDialogTrigger
} from "@/shadcn/ui/alert-dialog/index.js";
import {toast} from "vue-sonner";

const props = defineProps({
    shortlink: Object,
});

const shortlink = props.shortlink;

const formData = {
    title: shortlink.title,
    destination: shortlink.destination,
    expires_at: shortlink.expires_at,
    url: shortlink.url,
};

const form = useForm(formData);

const deleteLink = () => {
    router.delete(route('shortlinks.destroy', shortlink.id), form.data(), {
        onSuccess: () => {
            form.reset();
            toast.success('Short link has been created', {
            });
        },
        onError: (errors) => {
            toast.error('Error deleting short link', {
                description: errors,
            });
        }
    });
};
</script>

<template>
    <AlertDialog>
        <AlertDialogTrigger>
            <button type="button"
                    class="block rounded-md bg-red-600 p-2 text-center text-sm font-bold text-white shadow-sm hover:bg-[#1E2228] hover:text-white">
                <IconTrash :stroke="2" class="h-5 w-5 ml-auto" aria-hidden="true"/>
            </button>
        </AlertDialogTrigger>
        <AlertDialogContent>
            <AlertDialogHeader>
                <AlertDialogTitle>
                    Delete Short Link
                </AlertDialogTitle>
                <AlertDialogDescription></AlertDialogDescription>
            </AlertDialogHeader>
            <form @submit.prevent="deleteLink">
                <p class="mb-12">
                    Are you sure you want to delete this short link?
                </p>
                <AlertDialogFooter>
                    <AlertDialogCancel>
                        <button type="button" @click="closeDialog"
                                class="ml-1 inline-flex justify-center py-2 px-4 border-2 border-[#1E2228] shadow-sm text-sm font-medium rounded-md text-[#1E2228] hover:bg-[#1E2228] hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#FD0]">
                            Cancel
                        </button>
                    </AlertDialogCancel>
                    <AlertDialogCancel>
                        <button type="submit"
                                class="ml-1 inline-flex justify-center py-2 px-4 border-2 border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-[#1E2228] hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#FD0]">
                            Delete
                        </button>
                    </AlertDialogCancel>
                </AlertDialogFooter>
            </form>
        </AlertDialogContent>
    </AlertDialog>
</template>
