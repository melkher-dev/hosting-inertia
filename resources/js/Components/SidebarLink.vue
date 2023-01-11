<template>
  <div class="block px-4 py-2 mt-2space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <NavLink
      :href="route(name)"
      :active="route().current(name)"
      class="text-lg"
    >
      {{ capitalize(name) }}
    </NavLink>
  </div>
</template>

<script setup>
import NavLink from "@/Components/NavLink.vue";

defineProps(["name"]);

const capitalize = (str) => {
  return `${str[0].toUpperCase()}${str.slice(1)}`;
};
</script>
