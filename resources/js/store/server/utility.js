import axios from "axios"

export default {
    getUtilities () {
        return axios.get('/utilities/list');
    },
    updateUtility (payload) {
        return axios.put(`/utility/${payload.id}`, payload);
    }
}