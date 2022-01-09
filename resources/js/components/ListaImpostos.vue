<template>
    <div>
        <b-table small hover :items="items" :fields="fields" bordered></b-table>
    </div>
</template>

<script>

import cotacao from "../api/cotacao";
import eventbus from "../eventbus"

export default {
    data() {
        return {
            fields: [
                'id',
                {key: 'uf', label: 'UF'},
                {key: 'percentual_cotacao', label: 'Percentual Frete'},
                {key: 'valor_extra', label: 'Valor Taxa'},
                {key: 'transportadora.nome', label: 'Transportadora'},
            ],
            items: [],
        }
    },
    created() {
        this.getCotacoes()
        eventbus.$on('reloadList', this.getCotacoes)
    },
    methods: {
        async getCotacoes(){
            await cotacao.impostos()
                .then(dados => {
                    this.items = dados.data
                })
        },
    }
}
</script>
