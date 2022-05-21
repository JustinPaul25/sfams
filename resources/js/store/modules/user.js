import types from "../types"
import api from "../server/user"

export default {
    namespaced: true,
    state: {
        users: [],
        errors: "",
    },
    getters: {
        users: state => state.users,
        errors: state => state.errors
    },
    mutations: {
        [types.mutations.user.setUsers] (state, payload) {
            state.users = payload
        },
        [types.mutations.user.setErrors] (state, payload) {
            state.errors = payload
        }
    },
    actions: {
        async [types.actions.user.getUsers] ({commit}, payload) {
            try {
                const res = await api.getUsers(payload)
                commit(types.mutations.user.setUsers, res.data)
            } catch (error) {
                throw new Error(error)
            }
        },
        async [types.actions.user.createUser] ({commit}, payload) {
            try {
                const res = await api.createUser(payload)
                commit(types.mutations.user.setErrors, [])
            } catch (error) {
                commit(types.mutations.user.setErrors, error.response.data.errors)
            }
        },
        async [types.actions.user.updateUser] ({commit}, payload) {
            try {
                const res = await api.updateUser(payload)
                commit(types.mutations.user.setErrors, [])
            } catch (error) {
                commit(types.mutations.user.setErrors, error.response.data.errors)
            }
        }
    }
}