<template>
    <AuthenticatedLayout>
        <div class="float-right m-2" v-for="provider in providers" :key="provider.id">
            <ProviderCard :provider="provider" :userProvider="getUserProvider(provider)" />
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ProviderCard from "@/Pages/Providers/Partials/ProviderCard.vue";

const props = defineProps({
    providers: Object,
    userProviders: Object
});

const getUserProvider = (provider) => {
    return props.userProviders.filter(prov => prov.name == provider.name)[0];
}
</script>
