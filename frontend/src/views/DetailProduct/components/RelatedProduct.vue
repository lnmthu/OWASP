<template>
     <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Sản phẩm liên quan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6" v-for="(value,index) in getReloatedList()" :key="index">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" :style="{backgroundImage:'url('+value.image_uri+')'}">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6> <router-link
                  tag="a"
                  :to="{
                    name: 'detailProduct',
                    params: { unique_id: product.unique_id },
                  }"
                  >{{value.name}}</router-link>
                  </h6>
                            <h5>{{value.price}}</h5>
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
computed:{
    ...mapState(["listProduct","currentCategoryUniqueId","currentProduct"])
},
created(){
        this.$store.dispatch("loadListProduct")
        this.$store.dispatch("loadCurrentProduct",this.$route.params.unique_id);

},
watch:{
    currentCategoryUniqueId:function(){
        return this.currentCategoryUniqueId
    }
},
methods:{
    getReloatedList(){
        var newArr=[]
        for(let product of this.listProduct){
            if(product.category_unique_id==this.currentCategoryUniqueId 
            && product.unique_id!=this.currentProduct.unique_id )
            newArr.push(product)
        }
        return newArr
    }
},


};
</script>

<style scoped>

</style>