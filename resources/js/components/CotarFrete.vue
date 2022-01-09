<template>
    <div>

        <b-form class="py-4">
            <h4>Cotar Frete</h4>

            <template v-if="showErrors">
                <b-alert show variant="danger">
                    <ul class="px-4">
                        <li v-for="(error, i) in errors">
                            <ul class="px-0">
                                <li v-for="msg in error">{{ msg }}</li>
                            </ul>
                        </li>
                    </ul>
                </b-alert>
            </template>

            <b-row class="mb-4">
                <b-col>
                    UF
                    <b-form-select
                        v-model="form.uf"
                        :options="listaUf"
                        value-field="id"
                        text-field="nome"
                    ></b-form-select>
                </b-col>
            </b-row>
            <b-row class="mb-4">
                <b-col>
                    Valor do Pedido (R$)
                    <b-form-input
                        v-model="form.valor_pedido"
                        type="text"
                        maxlength="10"
                        v-money="{prefix:'', thousands: '', decimal: '.'}"
                    ></b-form-input>
                </b-col>
            </b-row>
            <b-row>
                <b-col>
                    <b-button type="submit" variant="primary" @click.prevent="submitForm">Cotar</b-button>
                </b-col>
            </b-row>
        </b-form>
        <hr>
        <b-row>
            <b-col>
                <b-table small hover :items="listaCotacao" :fields="fields" bordered>

                    <template #cell(index)="data">
                        {{ data.index + 1 }}
                    </template>


                </b-table>
            </b-col>
        </b-row>

    </div>
</template>

<script>
import cotacao from "../api/cotacao";

export default {
    data() {
        return {
            form: {},
            rank: 1,
            listaCotacao: [],
            listaUf: ['AC','AL','AM','AP','BA','CE','DF','ES','GO','MA','MG','MS','MT','PA','PB','PE','PI','PR','RJ','RN','RO','RR','RS','SC','SE','SP','TO',],

            fields: [
                {key: 'index', label: 'Rank'},
                {key: 'transportadora_nome', label: 'Transportadora'},
                {key: 'valor_cotacao', label: 'Valor Cotação'},
            ],

            errors: "",
            showErrors: false,
        }
    },
    components: {

    },
    mounted() {

    },
    methods: {
        async realizarCotacao(){
            await cotacao.consulta(this.form)
                .then(dados => {
                    this.listaCotacao = dados.data
                })
                .catch(errors => {
                    if(errors.response.status === 422){
                        this.errors = errors.response.data.errors;
                        this.showErrors = true
                    }
                })
        },
        submitForm(){

            this.realizarCotacao()

        }
    }
}
</script>

