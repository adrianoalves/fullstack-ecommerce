<template>
  <q-page class="flex flex-center">
    <div class="column q-pa-lg">
      <div class="row">
        <q-card round>
          <q-card-section class="bg-blue-14">
            <h4 class="text-h5 text-center text-white q-my-md">Login</h4>

          </q-card-section>
          <q-card-section>
            <div class="text-amber-7">store front</div>
          </q-card-section>

          <q-card-actions class="q-px-lg q-pb-lg">
            <q-btn
              unelevated
              size="lg"
              color="secondary"
              @click="submit"
              class="full-width text-white"
              label="entrar"
            />

          </q-card-actions>
        </q-card>
      </div>
    </div>
  </q-page>
</template>

<script setup>
import { ref } from 'vue'
import {api} from 'boot/axios';
import { useUserStore } from 'stores/UserStore'

const email = ref('testing@email.com')
const passwd = ref('123456')
const userStore = useUserStore()

const submit = () => {

  api.post('login', {
    email: email.value, passwd: passwd.value
  })
  .then( (res) => {
    userStore.token = res.data.token
    userStore.data  = res.data.user
  })
}

</script>
