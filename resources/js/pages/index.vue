<template>
    <div>
        <b-row align-h="between">
            <b-col md="5">
                <CadastroCotacoes/>
            </b-col>
            <b-col md="5">
                <CotarFrete/>
            </b-col>
        </b-row>
        <hr class="mt-4">
        <b-row>
            <b-col class="mt-2">
                <ListaImpostos/>
            </b-col>
        </b-row>
    </div>
</template>

<script>
import cotacao from "../api/cotacao";

import CadastroCotacoes from "../components/CadastroCotacoes";
import CotarFrete from "../components/CotarFrete";
import ListaImpostos from "../components/ListaImpostos";

export default {
    data() {
        return {

        }
    },
    components: {
        CadastroCotacoes,
        CotarFrete,
        ListaImpostos,
    },
    mounted() {

    },
    methods: {
        async getContatos(search){
            await cotacao.list()
                .then(dados => {
                    this.items = dados.data
                })
        },
        inserirContato(){
            this.$router.push({name:'InserirContato'})
        },
        visualizarContato(id){
            this.$router.push({name:'VisualizarContato', params: {id:id}})
        },
        editarContato(id){
            this.$router.push({name:'EditarContato', params: {id:id}})
        },
        excluirContato(contato){
            this.$refs['delete-modal'].showModal(contato)
        }
    }
}
</script>

<style scoped>
.b-icon{
    cursor: pointer;
}
</style>
