import axios from "axios"

export default {
    createStudent (payload) {
        return axios.post('/student', payload);
    },
    getStudents (payload) {
        return axios.get('/students-list', payload);
    },
}