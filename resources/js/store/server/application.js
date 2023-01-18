import axios from "axios"

export default {
    getApplicants (payload) {
        return axios.get('/enrollment-applications/list', payload);
    },
}
