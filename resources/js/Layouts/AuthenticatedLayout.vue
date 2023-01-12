<script setup>
import Sidebar from "@/Components/Sidebar.vue";
import Navbar from "@/Components/Navbar.vue";

</script>

<template>
  <div>
    <div class="min-h-screen bg-gray-100">
      <div class="lg:flex flex-col lg:flex-row lg:min-h-screen w-full">
        <!-- Sidebar -->
        <Sidebar />

        <!-- Navbar -->
        <div class="w-full">
          <Navbar />

          <main>
            <slot />
          </main>
        </div>
      </div>
    </div>
  </div>
</template>
