import types from "../types"
import api from "../server/student"

export default {
    namespaced: true,
    state: {
        students: []
    },
    getters: {
        students: state => state.students,
    },  
    mutations: {
        [types.mutations.student.setStudents] (state, payload) {
            state.students = payload
        },
    },
    actions: {
        [types.actions.student.createStudent] ({commit}, payload) {
            try {
                return new Promise(api.createStudent(payload))
            } catch (error) {

            }
        },
        async [types.actions.student.getStudents] ({commit}, payload) {
            try {
                const res = await api.getStudents(payload)
                commit(types.mutations.student.setStudents, res.data)
            } catch (error) {
                throw new Error(error)
            }
        }
    }
}