<template>
  <div>
    <form @submit.prevent="submit">
      <div class="card" style="width: 50rem">
        <div class="card-body">
          <h5 class="card-title">
            {{ provider.name }}
          </h5>
          <p class="card-text">
            Enter your token
          </p>
          <input id="name" class="form-control m-2" type="text" placeholder="Token" v-model="form.token" />
          <PrimaryButton class="float-right mt-2" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
            Save token
          </PrimaryButton>
        </div>
      </div>
    </form>
  </div>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import PrimaryButton from "./PrimaryButton.vue";

const props = defineProps({
  description: String,

  provider: Object,
});

const form = useForm({
  providerName: null,
  token: null,
});

const submit = () => {
  form.providerName = props.provider.name;
  form.post(route("provider.token.store"), {
    preserveScroll: true,
    onSuccess: () => form.reset(),
    onError: () => {
      // if (form.errors.password) {
      //   form.reset('password', 'password_confirmation');
      //   passwordInput.value.focus();
      // }
      // if (form.errors.current_password) {
      //   form.reset('current_password');
      //   currentPasswordInput.value.focus();
      // }
    },
  });
};

</script>