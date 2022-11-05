import axios from "axios"

export default {
    getUtilities (payload) {
        return axios.get('/enrollment-applications/list', payload);
    },
}