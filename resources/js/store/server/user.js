import axios from "axios"

export default {
    getUsers (payload) {
        return axios.get('/users/list', payload);
    },
    createUser (payload) {
        return axios.post('/users', payload);
    },
    updateUser (payload) {
        return axios.put(`/users/${payload.id}`, payload);
    }
}