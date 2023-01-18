import types from "../types"
import api from "../server/application"

export default {
    namespaced: true,
    state: {
        applications: []
    },
    getters: {
        applications: state => state.applications,
    },
    mutations: {
        [types.mutations.application.setApplications] (state, payload) {
            state.applications = payload
        },
    },
    actions: {
        async [types.actions.application.getApplications] ({commit}, payload) {
            try {
                const res = await api.getApplicants(payload)
                commit(types.mutations.application.setApplications, res.data)
            } catch (error) {
                throw new Error(error)
            }
        }
    }
}
