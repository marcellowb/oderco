<template>
    <div>

        <b-form class="py-4">
            <h4>Cadastro Cotação de Frete</h4>

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
                    Transportadora
                    <b-select
                        v-model="form.transportadora_id"
                        :options="listaTransportadora"
                        value-field="id"
                        text-field="nome"
                    >
                    </b-select>
                </b-col>
            </b-row>
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
                    Parcentual de Cotação (%)
                    <b-form-input
                        v-model="form.percentual_cotacao"
                        type="text"
                        maxlength="6"
                        v-money="{prefix:'', thousands: '', decimal: '.'}"
                    ></b-form-input>
                </b-col>
            </b-row>
            <b-row class="mb-4">
                <b-col>
                    Valor Extra (R$)
                    <b-form-input
                        v-model="form.valor_extra"
                        type="text"
                        maxlength="10"
                        v-money="{prefix:'', thousands: '', decimal: '.'}"
                    ></b-form-input>
                </b-col>
            </b-row>
            <b-row>
                <b-col>
                <b-button type="submit" variant="primary" @click.prevent="submitForm">Salvar</b-button>
                </b-col>
            </b-row>
        </b-form>

    </div>
</template>

<script>
import cotacao from "../api/cotacao";
import transportadora from "../api/transportadora";
import eventbus from "../eventbus"

export default {
    data() {
        return {
            form: {},
            listaTransportadora: [],
            listaUf: ['AC','AL','AM','AP','BA','CE','DF','ES','GO','MA','MG','MS','MT','PA','PB','PE','PI','PR','RJ','RN','RO','RR','RS','SC','SE','SP','TO',],
            errors: "",
            showErrors: false,
        }
    },
    components: {

    },
    mounted() {
        this.listaTransportadoras()
    },
    methods: {
        async listaTransportadoras(){
            await transportadora.list()
                .then(dados => {
                    this.listaTransportadora = dados.data
                })
        },
        submitForm(){

            this.errors = "";
            this.showErrors = false

            cotacao.cadastro(this.form)
                .then(result => {
                    eventbus.$emit('reloadList')
                    this.form = {}
                })
                .catch(errors => {
                    if(errors.response.status === 422){
                        this.errors = errors.response.data.errors;
                        this.showErrors = true
                    }
                })
        }
    }
}
</script>

