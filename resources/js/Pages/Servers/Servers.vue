<template>
    <AuthenticatedLayout>
        <div class="m-2">
            <server-card :sizes="sizes" :regions="regions" />
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ServerCard from './Partials/ServerCard.vue';

const props = defineProps({
    sizes: Object,
    regions: Object
})
</script>