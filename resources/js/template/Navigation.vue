<template>
    <div>
        <b-navbar toggleable="lg" type="dark" class="topo">
            <b-navbar-brand href="#">
                <img src="/img/logo_oderco.svg" style="max-height: 50px">
            </b-navbar-brand>
            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
            <b-collapse id="nav-collapse" is-nav>
                <b-navbar-nav class="ml-auto">
<!--                    <b-nav-form>
                        <b-form-input size="sm" class="mr-sm-2" placeholder="Busca Contato"></b-form-input>
                        <b-button size="sm" class="my-2 my-sm-0" type="submit">Buscar</b-button>
                    </b-nav-form>-->
                </b-navbar-nav>
            </b-collapse>
        </b-navbar>
    </div>
</template>



<script>
export default {

}
</script>

<style>
.topo{
    background-color: #005FAD;
}
nav{
    background-color: darkgrey;
}
</style>
