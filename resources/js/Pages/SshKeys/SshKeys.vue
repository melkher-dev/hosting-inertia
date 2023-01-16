<template>
    <AuthenticatedLayout>
        <div class="d-flex justify-content-center m-2">
            <!-- Modal -->
            <vue-final-modal v-model="showModal">
                <div class="d-flex justify-content-center mt-5">
                    <div class="card" style="width: 50rem;">
                        <div class="card-body">
                            <h5 class="card-title">SSH keys</h5>
                            <input v-model="form.name" class="form-control m-2" type="text" placeholder="Enter name.">
                            <input v-model="form.key" class="form-control m-2" type="text" placeholder="Enter Key.">
                            <div class="d-flex justify-content-center mt-2">
                                <button @click="handleKey" class="btn btn-dark btn-sm">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </vue-final-modal>
            <button @click="showModal = true" class="btn btn-dark btn-sm">Add SSH Key</button>
        </div>
        <div class="float-right m-2" v-for="sshKey in sshKeys" :key="sshKey.id">
            <SshKeyCard :sshKey="sshKey" />
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import SshKeyCard from "@/Pages/SshKeys/Partials/SshKeyCard.vue";
import { $vfm, VueFinalModal, ModalsContainer } from 'vue-final-modal';
import { useForm } from '@inertiajs/inertia-vue3';
import { ref } from '@vue/reactivity';

let showModal = ref(false);

const props = defineProps({
    sshKeys: Object
})

const form = useForm({
    name: null,
    key: null
})

const handleKey = () => {
    form.post(route('ssh.key.store'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
    });
    showModal.value = false
}
</script>