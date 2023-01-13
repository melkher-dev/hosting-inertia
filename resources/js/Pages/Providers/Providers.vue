<template>
  <AuthenticatedLayout>
    <div
      class="float-right m-2"
      v-for="provider in providers"
      :key="provider.id"
    >
      <CardProvider :provider="provider" />
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import CardProvider from "@/Components/CardProvider.vue";

const props = defineProps({
  providers: Object,
});
</script>
