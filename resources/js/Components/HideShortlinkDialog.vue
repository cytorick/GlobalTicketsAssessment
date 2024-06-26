<script setup>
import {ref, defineProps} from 'vue';
import {useForm, router} from '@inertiajs/vue3';
import {IconEyeOff, IconEye} from "@tabler/icons-vue";
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
    is_disabled: shortlink.is_disabled === true ? false : true,
    url: shortlink.url,
    destination: shortlink.destination,
};

const form = useForm(formData);

const saveLink = () => {
    console.log('Save link');
    console.log('Form: ', form.data());

    router.put(route('shortlinks.update', shortlink.id), form.data(), {
        onSuccess: () => {
            form.reset();
            toast.success('Short link has been updated', {
            });
        },
        onError: (errors) => {
            console.error("Create error: ", errors);
        }
    });
};

const customUrl = ref(false);
</script>

<template>
    <AlertDialog>
        <AlertDialogTrigger>
            <button type="button"
                    class="block rounded-md bg-[#FD0] p-2 text-center text-sm font-bold text-gray-900 shadow-sm hover:bg-[#1E2228] hover:text-white">
                <IconEyeOff :stroke="2" class="h-5 w-5 ml-auto" aria-hidden="true"
                            v-if="shortlink.is_disabled === false"/>
                <IconEye :stroke="2" class="h-5 w-5 ml-auto" aria-hidden="true" v-else/>
            </button>
        </AlertDialogTrigger>
        <AlertDialogContent>
            <AlertDialogHeader>
                <AlertDialogTitle>
                    {{ shortlink.is_disabled === true ? 'Enable' : 'Disable' }} Short Link
                </AlertDialogTitle>
                <AlertDialogDescription></AlertDialogDescription>
            </AlertDialogHeader>
            <form @submit.prevent="saveLink">
                <p class="mb-12">
                    Are you sure you want to {{ shortlink.is_disabled === true ? 'enable' : 'disable' }} this short
                    link?
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
                                class="ml-1 inline-flex justify-center py-2 px-4 border-2 border-transparent shadow-sm text-sm font-medium rounded-md text-[#1E2228] bg-[#FD0] hover:bg-[#1E2228] hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#FD0]">
                            {{ shortlink.is_disabled === true ? 'Enable' : 'Disable' }}
                        </button>
                    </AlertDialogCancel>
                </AlertDialogFooter>
            </form>
        </AlertDialogContent>
    </AlertDialog>
</template>
