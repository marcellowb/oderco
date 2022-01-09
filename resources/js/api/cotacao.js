import api from "./api";

export default {
    async impostos(){
        return api.get("/cotacao")
    },
    async cadastro(form){
        return api.post('/cotacao', form)
    },
    async consulta(form){
        return api.put('/cotacao', form)
    },

/*    async get(id){
        return api.get(`/contato/${id}`)
    },
    async insert(form){
        return api.post('/contato', form)
    },
    async update(form, id){
        return api.put(`/contato/${id}`, form)
    },
    async delete(id){
        return api.delete(`/contato/${id}`)
    },*/
}
