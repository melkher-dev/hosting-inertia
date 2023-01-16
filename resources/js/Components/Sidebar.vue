<template>
  <div>
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-white" style="width: 280px">
      <Link href="/" class="
          d-flex
          align-items-center
          mb-3 mb-md-0
          me-md-auto
          link-dark
          text-decoration-none
        ">
      <svg class="bi me-2" width="40" height="50">
        <use xlink:href="#bootstrap"></use>
      </svg>
      <span class="fs-4">Hosting</span>
      </Link>
      <ul class="nav nav-pills flex-column mb-auto">
        <li>
          <Link :href="route('dashboard')" class="nav-link link-dark" :class="{ 'active': $page.url === '/dashboard' }"> Dashboard </Link>
        </li>
        <li class="nav-item">
          <Link :href="route('providers')" class="nav-link link-dark" :class="{ 'active': $page.url === '/providers' }"> Providers </Link>
        </li>
        <li>
          <Link :href="route('ssh-keys')" class="nav-link link-dark" :class="{ 'active': $page.url === '/ssh-keys' }"> SSH keys </Link>
        </li>
        <li>
          <Link href="#" class="nav-link link-dark"> shoto 1 </Link>
        </li>
        <li>
          <Link href="#" class="nav-link link-dark"> shoto 2 </Link>
        </li>
      </ul>
    </div>
  </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
</script>