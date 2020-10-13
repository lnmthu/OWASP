<template>
  <section class="featured spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-title">
            <h2>Sản phẩm nổi bật</h2>
          </div>
          <div class="featured__controls">
            <ul>
              <li class="active" data-filter="*">Tất cả</li>
              <li
                v-for="(category, index) in getListFeturedCategory()"
                :key="index"
                :data-filter="'.' + category.sku"
              >
                {{ category.name }}
              </li>

            </ul>
          </div>
        </div>
      </div>
      <div class="row featured__filter">
        <div
          v-for="(product, index) in getListFeaturedProduct() "
          :key="index"
          :class="
            'col-lg-3 col-md-4 col-sm-6 mix ' +
            getSkuCategory(product.category_unique_id)
          "
        >
          <div class="featured__item">
            <div
              class="featured__item__pic set-bg"
              :style="{ backgroundImage: 'url(' + product.image_uri + ')' }"
            >
              <ul class="featured__item__pic__hover">
                <li>
                  <a href="#"><i class="fa fa-heart"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-retweet"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-shopping-cart"></i></a>
                </li>
              </ul>
            </div>
            <div class="featured__item__text">
              <h6>
                 <router-link
                  tag="a"
                  :to="{
                    name: 'detailProduct',
                    params: { unique_id: product.unique_id },
                  }"
                  >{{ product.name }}</router-link>
              </h6>
              <h5>{{ product.price }}</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { mapState } from "vuex";
export default {
  computed: {
    ...mapState(["listCategory", "listProduct"]),
  },
   
  methods: {
    getSkuCategory(unique_id) {
      for (var category of this.listCategory) {
        if(category.unique_id===unique_id)
          return category.sku;
      }
    },
    getListFeturedCategory(){
      var newArr=[]
      for( var category of this.listCategory){
        if(category.sort === 1){
            newArr.push(category);
        }
      }
      return newArr
    },
    getListFeaturedProduct() {
      var newArr = [];
      var length = this.listProduct.length;
      for (let i = 0; i < length; i++) {
        if (this.listProduct[i].status === 1) {
          newArr.push(this.listProduct[i]);
        }
      }
      return newArr;
    },
  },


};
</script>

<style scoped>
</style>