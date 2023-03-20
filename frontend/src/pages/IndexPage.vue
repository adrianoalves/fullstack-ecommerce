<template>
  <q-page class="flex flex-center">
    <div class="column q-pa-lg">
      <div class="row">
        <q-card round>
          <q-card-section class="bg-blue-14">
            <h4 class="text-h5 text-center text-white q-my-md">Login</h4>

          </q-card-section>
          <q-card-section>
            <q-form class="q-px-sm q-pt-sm">
              <q-input
                class="q-mb-md"
                outlined
                clearable
                v-model="email"
                type="email"
                label="Email">
                <template v-slot:prepend>
                  <q-icon name="local_post_office" />
                </template>
              </q-input>

              <q-input
                outlined
                clearable
                v-model="passwd"
                type="password"
                label="Senha">

                <template v-slot:prepend>
                  <q-icon name="lock_open" />
                </template>
              </q-input>
            </q-form>
          </q-card-section>

          <q-card-actions class="q-px-lg q-pb-lg">
            <q-btn
              unelevated
              size="lg"
              color="secondary"
              @click="submit"
              class="full-width text-white"
              label="login"
            />

          </q-card-actions>
        </q-card>
      </div>
    </div>
  </q-page>
</template>

<script>
import { defineComponent, ref } from 'vue'
import {api} from 'boot/axios';

export default defineComponent({
  name: 'IndexPage',

  setup() {

    const email = ref('testing@email.com')
    const passwd = ref('123456')

    return  {
      email, passwd,
      submit() {

        api.post('login', {
          email: email.value, passwd: passwd.value
        })
        .then( (res) => console.log(res) )
      }
    }
  }
})
</script>
