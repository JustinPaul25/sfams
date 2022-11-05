import types from "../types"
import api from "../server/utility"

export default {
    namespaced: true,
    state: {
        utilities: []
    },
    getters: {
        utilities: state => state.utilities,
    },  
    mutations: {
        [types.mutations.utility.setUtilities] (state, payload) {
            state.utilities = payload
        },
    },
    actions: {
        async [types.actions.utility.getUtilities] ({commit}) {
            try {
                const res = await api.getUtilities()
                commit(types.mutations.utility.setUtilities, res.data)
            } catch (error) {
                throw new Error(error)
            }
        },
        async [types.actions.utility.updateUtility] ({commit}, payload) {
            try {
                await api.updateUtility(payload)
            } catch (error) {
                throw new Error(error)
            }
        }
    }
}