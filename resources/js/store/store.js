import Vue from "vue"
import Vuex from "vuex"
import createPersistedState from 'vuex-persistedstate'
import user from "./modules/user"
import student from "./modules/student"

Vue.use(Vuex)

export default new Vuex.Store({
  plugins: [
    createPersistedState()
  ],
  modules: {
    user,
    student
  }
})