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
              Enter your token
            </p>
            <input id="name" class="form-control m-2" type="text" placeholder="Token" v-model="form.token"
              :disabled="userProvider && !tokenEdit" />


            <template v-if="userProvider">
              <DangerButton @click="deleteToken" class="float-right mt-2" :class="{ 'opacity-25': form.processing }">
                Delete token
              </DangerButton>

              <PrimaryButton type="button" class="float-right mt-2" v-if="userProvider && !tokenEdit"
                :class="{ 'opacity-25': form.processing }"
                @click="tokenEdit = true">
                Edit Token
              </PrimaryButton>

              <PrimaryButton @click="updateToken" v-if="tokenEdit" class="float-right mt-2"
                :class="{ 'opacity-25': form.processing }" :disabled="form.processing || (userProvider && !tokenEdit)">
                Update token
              </PrimaryButton>
            </template>

            <template v-else>
              <PrimaryButton @click="saveToken" class="float-right mt-2" :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing">
                Save token
              </PrimaryButton>
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
}

</script>