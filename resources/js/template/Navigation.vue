<template>
    <div>
        <b-navbar toggleable="lg" type="dark" class="topo">
            <b-navbar-brand href="#">
                <img src="/img/logo_oderco.svg" style="max-height: 50px">
            </b-navbar-brand>
            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
            <b-collapse id="nav-collapse" is-nav>
                <b-navbar-nav class="ml-auto"></b-navbar-nav>
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
