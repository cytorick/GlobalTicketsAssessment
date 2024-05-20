<script setup>
import {onMounted} from 'vue';
import {useForm, router} from '@inertiajs/vue3';
import {IconPlus,IconRefresh} from "@tabler/icons-vue";
import {
    AlertDialog,
    AlertDialogCancel,
    AlertDialogContent, AlertDialogDescription, AlertDialogFooter,
    AlertDialogHeader,
    AlertDialogTitle, AlertDialogTrigger
} from "@/shadcn/ui/alert-dialog/index.js";
import {toast} from "vue-sonner";
import Card from "@/Components/Card.vue";

// Construct the form
const form = useForm({
    title: '',
    url: '',
    destination: '',
    expires_at: '',
})

// Generate a random URL
const generateUrl = () => {
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    const length = Math.floor(Math.random() * 2) + 9; // Random length of 9 or 10 characters
    let result = '';
    for (let i = 0; i < length; i++) {
        const randomIndex = Math.floor(Math.random() * characters.length);
        result += characters.charAt(randomIndex);
    }
    return result;
}

// Set the initial value of form.url when the component is mounted
onMounted(() => {
    form.url = generateUrl(); // Set the initial value of form.url when the component is mounted
});

// Close the dialog
const closeDialog = () => {
    form.reset();
};

// Save the link
const saveLink = () => {
    console.log('Save link');
    console.log('Form: ', form.data());
    router.post('/shortlinks/store', form.data(), {
        onSuccess: () => {
            form.reset();
            toast.success('Short link has been created', {
            });
        },
        onError: (errors) => {
            toast.error('Create error', {
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
                    class="block rounded-md bg-[#FD0] p-2 text-center text-sm font-bold text-gray-900 shadow-sm hover:bg-[#1E2228] hover:text-white">
                <IconPlus :stroke="2" class="h-5 w-5" aria-hidden="true"/>
            </button>
        </AlertDialogTrigger>
        <AlertDialogContent>
            <AlertDialogHeader>
                <AlertDialogTitle>
                    Create a new short link
                </AlertDialogTitle>
                <AlertDialogDescription></AlertDialogDescription>
            </AlertDialogHeader>
            <form @submit.prevent="saveLink">
                <Card class="!bg-gray-200">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">
                            Name
                        </label>
                        <div class="mt-1">
                            <input type="text" name="name" id="name"
                                   class="block w-full shadow-sm sm:text-sm focus:ring-[#FD0] focus:border-[#FD0] border-gray-300 rounded-md border p-2"
                                   v-model="form.title" required>
                            <span class="text-xs text-gray-500">This name will be used to identify the short link</span>
                            <span class="text-red-500" v-if="form.errors.title">{{ form.errors.title }}</span>
                        </div>
                    </div>
                    <div class="mt-4">
                        <label for="destination" class="block text-sm font-medium text-gray-700">
                            Destination
                        </label>
                        <div class="mt-1">
                            <input type="text" name="destination" id="destination"
                                   class="block w-full shadow-sm sm:text-sm focus:ring-[#FD0] focus:border-[#FD0] border-gray-300 rounded-md border p-2"
                                   v-model="form.destination" required>
                            <span class="text-xs text-gray-500">The destination URL of the short link</span>
                            <span class="text-red-500" v-if="form.errors.destination">{{ form.errors.destination }}</span>
                        </div>
                    </div>
                    <div class="mt-4">
                        <label for="destination" class="block text-sm font-medium text-gray-700">
                            Expires at
                        </label>
                        <div class="mt-1">
                            <input type="date" name="expires_at" id="expires_at"
                                   class="block w-full shadow-sm sm:text-sm focus:ring-[#FD0] focus:border-[#FD0] border-gray-300 rounded-md border p-2"
                                   v-model="form.expires_at">
                            <span class="text-xs text-gray-500">The date when the short link will expire</span>
                            <span class="text-red-500" v-if="form.errors.expires_at">{{ form.errors.expires_at }}</span>
                        </div>
                    </div>
                </Card>
                <Card class="my-4 !bg-gray-200">
                    <div>
                        <div class="flex justify-between items-center">
                            <label for="url" class="block text-sm font-medium text-gray-700">
                                Url
                            </label>
                            <span>
                                <button type="button"
                                        @click="form.url = generateUrl()">
                                    <IconRefresh :stroke="2" class="h-4 w-4 text-gray-700" aria-hidden="true"/>
                                </button>
                            </span>
                        </div>
                        <div class="mt-1">
                            <input
                                type="text"
                                name="url"
                                id="url"
                                class="block w-full shadow-sm sm:text-sm focus:ring-[#FD0] focus:border-[#FD0] border-gray-300 rounded-md border p-2"
                                v-model="form.url"
                                disabled
                            >
                            <span class="text-red-500" v-if="form.errors.url">{{ form.errors.url }}</span>
                        </div>
                    </div>
                </Card>
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
                            Save
                        </button>
                    </AlertDialogCancel>
                </AlertDialogFooter>
            </form>
        </AlertDialogContent>
    </AlertDialog>
</template>
