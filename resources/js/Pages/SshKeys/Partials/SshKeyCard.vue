<template>
  <div>
    <div class="card" style="width: 50rem;">
      <div class="card-body">
        <h5 class="card-title">SSH key</h5>
        <input v-model="updateKeyForm.name" class="form-control m-2" type="text" :disabled="!keyEdit">
        <input v-model="updateKeyForm.key" class="form-control m-2" type="text" :disabled="!keyEdit">

        <template v-if="!keyEdit">
          <button @click="keyEdit = true" class="btn btn-dark btn-sm float-right m-2">Edit key</button>
        </template>

        <template v-else>
          <button class="btn btn-danger btn-sm float-right m-2">Delete key</button>
          <button @click="updateKey" class="btn btn-dark btn-sm float-right m-2">Update key</button>
        </template>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import { ref } from '@vue/reactivity';
import { onMounted } from '@vue/runtime-core';

const props = defineProps({
  sshKey: Object | null
})

let keyEdit = ref(false);

const updateKeyForm = useForm({
  id: null,
  name: null,
  key: null
})

onMounted(() => {
  if (props.sshKey) {
    updateKeyForm.id = props.sshKey.id
    updateKeyForm.name = props.sshKey.name
    updateKeyForm.key = props.sshKey.key
  }
})

const updateKey = () => {
  updateKeyForm.put(route('ssh.key.update'), {
    preserveScroll: true
  });
  keyEdit.value = false
}
</script>