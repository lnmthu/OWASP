<template>
        <section class="breadcrumb-section set-bg" data-setbg="dist/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Organi Shop</h2>
                        <div class="breadcrumb__option">
                            <router-link to="/" tag="a">Home</router-link>
                            <span>{{ currentCategory.name }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import {mapState} from 'vuex'
    export default {
        computed:{...mapState(["currentCategory"])},
        created(){
            this.$store.dispatch("loadCurrentCategory",this.$route.params.unique_id);
        },
        watch:{
            $route(to,from){
                this.$store.dispatch("loadCurrentCategory",to.params.unique_id);
            }
        }
    }
</script>

<style scoped>

</style>