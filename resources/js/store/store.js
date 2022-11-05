import Vue from "vue"
import Vuex from "vuex"
import createPersistedState from 'vuex-persistedstate'
import user from "./modules/user"
import student from "./modules/student"
import utility from "./modules/utility"
import application from "./modules/application"

Vue.use(Vuex)

export default new Vuex.Store({
  plugins: [
    createPersistedState()
  ],
  modules: {
    user,
    student,
    utility,
    application
  }
})