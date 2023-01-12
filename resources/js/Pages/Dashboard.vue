<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
import WidgetCard from "@/Components/WidgetCard.vue";
import Icon from "@/Components/Icon.vue";
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-3">
          <WidgetCard title="Total clients" number="6389" type="warning">
            <template #icon>
              <Icon type="users" fill />
            </template>
          </WidgetCard>

          <WidgetCard
            title="Account balance"
            number="$ 46,760.89"
            type="success"
          >
            <template #icon>
              <Icon type="money" fill />
            </template>
          </WidgetCard>

          <WidgetCard title="New sales" number="376" type="info">
            <template #icon>
              <Icon type="cart" fill />
            </template>
          </WidgetCard>
        </div>
        <div
          class="
            bg-white
            dark:bg-gray-800
            overflow-hidden
            shadow-sm
            sm:rounded-lg
          "
        >
          <div class="p-6 text-gray-900 dark:text-gray-100">
            {{ $page.props.auth.user.name }} Rapashka!
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
