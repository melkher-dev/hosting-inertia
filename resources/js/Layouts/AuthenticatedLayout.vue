<script setup>
import { ref } from "vue";
import Sidebar from "@/Components/Sidebar.vue";
import NavigationMenu from "@/Components/NavigationMenu.vue";
</script>

<template>
  <div>
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
      <div class="lg:flex flex-col lg:flex-row lg:min-h-screen w-full">
        <Sidebar />

        <div class="w-full">
          <NavigationMenu />

          <main
            class="flex-1 relative z-0 overflow-y-auto py-6 focus:outline-none"
            tabindex="0"
          >
            <div>
              <div class="lg:min-h-96 px-4 sm:px-0">
                <slot />
              </div>
            </div>
          </main>
        </div>
      </div>
    </div>
  </div>
</template>
