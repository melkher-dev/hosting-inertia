<template>
    <AuthenticatedLayout>
        <div
            class="float-right m-2"
            v-for="provider in providers"
            :key="provider.id"
        >
            <CardProvider
                :provider="provider"
                :userProvider="getUserProvider(provider)"
            />
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import CardProvider from "@/Pages/Providers/Partials/CardProvider.vue";

const props = defineProps({
    providers: Object,
    userProviders: Object
});

const getUserProvider = (provider) => {
    return props.userProviders.filter(prov => prov.name == provider.name)[0];
}
</script>
