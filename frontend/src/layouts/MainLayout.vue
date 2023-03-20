<template>
  <q-layout view="lHh Lpr lFf">
    <q-header class="bg-blue-14">
      <q-toolbar>
        <q-btn
          flat
          round
          icon="storefront"
          aria-label="Menu"
        />

        <q-toolbar-title>
          IN8 Ecommerce App
        </q-toolbar-title>

        <div>made by Adriano Alves</div>
      </q-toolbar>
    </q-header>

    <q-page-container>
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script>
import { defineComponent } from 'vue'

export default defineComponent({
  name: 'MainLayout',

  setup () {

    return {
    }
  }
})
</script>
