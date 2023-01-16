<template>
  <div>
    <div>
      <form>
        <div class="card" style="width: 50rem">
          <div class="card-body">
            <h5 class="card-title">
              {{ provider.name }}
            </h5>
            <p class="card-text">
              Token
            </p>
            <input id="name" class="form-control m-2" type="text" placeholder="Token" v-model="form.token"
              :disabled="userProvider && !tokenEdit" />


            <template v-if="userProvider">
              <button @click="deleteToken" class="btn btn-danger btn-sm float-right m-2"
                :class="{ 'opacity-25': form.processing }">
                Delete token
              </button>

              <button class="btn btn-dark btn-sm float-right m-2" v-if="userProvider && !tokenEdit"
                :class="{ 'opacity-25': form.processing }" @click="tokenEdit = true">
                Edit Token
              </button>

              <button @click="updateToken" v-if="tokenEdit" class="btn btn-dark btn-sm float-right m-2"
                :class="{ 'opacity-25': form.processing }" :disabled="form.processing || (userProvider && !tokenEdit)">
                Update token
              </button>
            </template>

            <template v-else>
              <button @click="saveToken" class="btn btn-dark btn-sm float-right m-2"
                :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save token
              </button>
            </template>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import { onMounted, ref } from "@vue/runtime-core";
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
  description: String,

  provider: Object,
  userProvider: Object | null
});

const form = useForm({
  providerName: null,
  token: null,
});

let tokenEdit = ref(false);

onMounted(() => {
  if (props.userProvider) {
    form.providerName = props.userProvider.name
    form.token = props.userProvider.pivot.token
  }
});

const saveToken = () => {
  form.providerName = props.provider.name;
  form.post(route("provider.token.store"), {
    preserveScroll: true,
    onSuccess: () => form.reset(),
  });
  location.reload()
};

const deleteToken = () => {
  form.delete(route("provider.token.delete"), {
    preserveScroll: true
  });
};

const updateToken = () => {
  form.put(route("provider.token.update"), {
    preserveScroll: true
  });
  tokenEdit.value = false
}

</script>