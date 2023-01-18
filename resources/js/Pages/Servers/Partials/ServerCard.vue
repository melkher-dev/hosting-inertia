<template>
    <div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Servers</h5>
                <div class="container">
                    <div class="row">
                        <div class="col-2 mt-3">
                            <label for="name">Name</label>
                        </div>
                        <div class="col-5">
                            <input class="form-control m-2" id="name" type="text">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-2 mt-3">
                            <label for="size">Server Plan</label>
                        </div>
                        <div class="col-5">
                            <select v-model="form.size" id="size" class="form-select m-2"
                                aria-label="Default select example">
                                <option :value="null" selected disabled>Select server plan</option>
                                <option v-for="size in sizes" :key="size.slug" :value="size.slug">
                                    {{ size.memory }} RAM, {{ size.disk }} GB Disk, {{ size.vcpus }} CPU cores, {{
                                        size.priceMonthly
                                    }}$/M, {{ size.description }}
                                </option>
                            </select>
                        </div>
                    </div>
                </div>


                <div class="container" v-if="availableRegions.length > 0">
                    <div class="row">
                        <div class="col-2 mt-3">
                            <label for="region">Available Regions</label>
                        </div>
                        <div class="col-5">
                            <select v-model="form.region" id="region" class="form-select m-2"
                                aria-label="Default select example">
                                <option :value="null" selected disabled>Select Region</option>
                                <option v-for="region in availableRegions" :key="region.slug" :value="region.slug">
                                    {{ region.name }}
                                </option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-2 mt-3">
                            <p>Default OS</p>
                        </div>
                        <div class="col-5">
                            <input v-model="form.os" class="form-control m-2" type="text" disabled>
                        </div>
                    </div>
                </div>
                <button class="btn btn-dark btn-sm m-2">Save</button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import { computed } from '@vue/reactivity';
// import { onMounted } from '@vue/runtime-core';

const props = defineProps({
    sizes: Object,
    regions: Object,
})

const form = useForm({
    size: null,
    region: null,
    os: 'Ubuntu 18.04 x64',
    name: null
});

// onMounted(() => {
//     if (props.sizes) {
//         form.os = 'Ubuntu 18.04 x64'
//     }
// })

const availableRegions = computed(() => {
    let currentSize = props.sizes.find(size => size.slug == form.size) || null;

    if (!currentSize) {
        return [];
    }

    return props.regions.filter((region) => currentSize.regions.includes(region.slug));
});

</script>