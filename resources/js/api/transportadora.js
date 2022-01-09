import api from "./api";

export default {
    async list(){
        return api.get(`/transportadora/`)
    },
}
