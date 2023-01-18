<template>
    <div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Servers</h5>
                <div class="dropdown">
                    <select v-model="form.size" class="form-select m-2" aria-label="Default select example">
                        <option :value="null" selected disabled>Select server plan</option>
                        <option v-for="size in sizes" :key="size.slug" :value="size.slug">
                            {{ size.memory }} RAM, {{ size.disk }} GB Disk, {{ size.vcpus }} CPU cores, {{
                                size.priceMonthly
                            }}$/M, {{ size.description }}
                        </option>
                    </select>

                    <select v-model="form.region" v-if="availableRegions.length > 0" class="form-select m-2"
                        aria-label="Default select example">
                        <option :value="null" selected disabled>Select Region</option>
                        <option v-for="region in availableRegions" :key="region.slug" :value="region.slug">
                            {{ region.name }}
                        </option>
                    </select>
                    <button class="btn btn-dark btn-sm m-2">Save</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import { computed } from '@vue/reactivity';

const props = defineProps({
    sizes: Object,
    regions: Object,
})

const form = useForm({
    size: null,
    region: null,
});

const availableRegions = computed(() => {
    let currentSize = props.sizes.find(size => size.slug == form.size) || null;

    if (!currentSize) {
        return [];
    }

    return props.regions.filter((region) => currentSize.regions.includes(region.slug));
});

</script>