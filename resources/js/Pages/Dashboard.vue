<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
</script>

<template>

  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <div class="card m-2">
      <div class="card-body d-flex justify-content-center">
        This is Dashboard
      </div>
    </div>
  </AuthenticatedLayout>
</template>
