<script setup>
import { ref } from "vue";
import Heading from "@/Components/Heading.vue";
import Navbar from "@/Components/Navbar.vue";
import Sidebar from "@/Components/Sidebar.vue";
import NavigationMenu from "@/Components/NavigationMenu.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";

const oldDesign = ref(true);
</script>

<template>
  <div>
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
      <template v-if="oldDesign">
        <Navbar />

        <Heading>
          <template #header>
            <slot name="header" />
          </template>
        </Heading>
        <main>
          <DangerButton
            class="
              flex-shrink-0
              px-4
              lg:px-8
              py-4
              flex flex-row
              items-center
              justify-between
            "
            @click="oldDesign = false"
            >Click Me</DangerButton
          >
          <slot />
        </main>
      </template>

      <template v-else>
        <div class="lg:flex flex-col lg:flex-row lg:min-h-screen w-full">
          <Sidebar />

          <div class="w-full">
            <NavigationMenu />

            <main
              class="
                flex-1
                relative
                z-0
                overflow-y-auto
                py-6
                focus:outline-none
              "
              tabindex="0"
            >
              <div>
                <div class="lg:min-h-96 px-4 sm:px-0">
                  <PrimaryButton class="mb-4" @click="oldDesign = true"
                    >Back to Old Shit</PrimaryButton
                  >
                  <slot />
                </div>
              </div>
            </main>
          </div>
        </div>
      </template>
    </div>
  </div>
</template>
