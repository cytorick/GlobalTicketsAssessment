<script setup>
const createdAt = () => {
    const date = new Date();
    const formattedDate = date.toLocaleDateString('en-GB'); // en-GB locale gives DD/MM/YYYY format
    return formattedDate;
};
</script>

<template>
    <div class="flex flex-row space-x-4">
        <div>
            <img class="h-16 w-16 rounded-full object-cover" :src="$page.props.auth.user.profile_photo_url" :alt="$page.props.auth.user.name">
        </div>
        <div>
            <h3 class="text-lg font-semibold text-gray-800">
                {{ $page.props.auth.user.name }}
            </h3>
            <p class="text-sm text-gray-600">
                {{ $page.props.auth.user.email }}
            </p>
            <p class="text-sm text-gray-600 mt-6">
                Member since {{ createdAt() }}
            </p>
        </div>
    </div>
</template>
