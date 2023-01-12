<template>
  <div>
    <div
      class="d-flex flex-column flex-shrink-0 p-3 bg-white"
      style="width: 280px"
    >
      <Link
        href="/"
        class="
          d-flex
          align-items-center
          mb-3 mb-md-0
          me-md-auto
          link-dark
          text-decoration-none
        "
      >
        <svg class="bi me-2" width="40" height="32">
          <use xlink:href="#bootstrap"></use>
        </svg>
        <span class="fs-4">Sidebar</span>
      </Link>
      <hr />
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <Link href="#" class="nav-link active" aria-current="page">
            <svg class="bi me-2" width="16" height="16">
              <use xlink:href="#home"></use>
            </svg>
            Home
          </Link>
        </li>
        <li>
          <Link href="#" class="nav-link link-dark">
            <svg class="bi me-2" width="16" height="16">
              <use xlink:href="#speedometer2"></use>
            </svg>
            Dashboard
          </Link>
        </li>
        <li>
          <Link href="#" class="nav-link link-dark">
            <svg class="bi me-2" width="16" height="16">
              <use xlink:href="#table"></use>
            </svg>
            Orders
          </Link>
        </li>
        <li>
          <Link href="#" class="nav-link link-dark">
            <svg class="bi me-2" width="16" height="16">
              <use xlink:href="#grid"></use>
            </svg>
            Products
          </Link>
        </li>
        <li>
          <Link href="#" class="nav-link link-dark">
            <svg class="bi me-2" width="16" height="16">
              <use xlink:href="#people-circle"></use>
            </svg>
            Customers
          </Link>
        </li>
      </ul>
    </div>
  </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
</script>