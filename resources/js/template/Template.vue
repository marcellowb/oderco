<template>
    <div>
        <Navigation></Navigation>
        <b-container class="py-3 container">
            <router-view/>
        </b-container>
    </div>
</template>


<script>

import Navigation from "./Navigation";

export default {
    components: {
        Navigation
    }
}
</script>

<style>
.container{
    background-color: #ffffff;
}
</style>
