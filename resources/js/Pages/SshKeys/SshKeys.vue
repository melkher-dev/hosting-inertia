<template>
    <AuthenticatedLayout>
        <div class="float-right m-2">
            <SshKeyCard />
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import SshKeyCard from "@/Pages/SshKeys/Partials/SshKeyCard.vue";
</script>