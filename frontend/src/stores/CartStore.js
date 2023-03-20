import {defineStore} from "pinia"

export const useCartStore = defineStore('CartStore', {
  state: () => ({
    items: []
  }),

  getters: {
    total: (state) => state.items.length
  }
})
