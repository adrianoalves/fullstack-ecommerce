import {defineStore} from "pinia"

export const useUserStore = defineStore( 'UserStore', {
  state: () => ({
    token: null,
    data: null,
  }),
  actions: {

  },

  getters: {
    user: (state) => state.data
  }
})
