<script setup>
import CardProvider from "@/Components/CardProvider.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <!-- <div class="float-right">
      <CardProvider title="I NEED" description="A BUTTONA" class="m-5">
        <button class="btn btn-danger">КНОПОЧКА</button>
      </CardProvider>
    </div> -->
  </AuthenticatedLayout>
</template>
