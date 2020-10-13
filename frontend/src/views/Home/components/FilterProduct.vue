<template>
  <section class="latest-product spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="latest-product__text">
            <h4>Sản phẩm cũ nhất</h4>
            <div class="latest-product__slider ">
              <div
                class="latest-prdouct__slider__item"
                v-for="(product, index) in getListProductOldest()"
                :key="index"
              >
              <router-link
                class="latest-product__item"
                  tag="a"
                  :to="{
                    name: 'detailProduct',
                    params: { unique_id: product.unique_id },
                  }"
                  >
                  <div class="latest-product__item__pic">
                    <img :src="product.image_uri" alt="" />
                  </div>
                  <div class="latest-product__item__text">
                    <h6>{{ product.name }}</h6>
                    <span>{{ product.price }}</span>
                  </div>
                </router-link>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="latest-product__text">
            <h4>Sản phẩm mới nhất</h4>
            <div class="latest-product__slider ">
              <div
                class="latest-prdouct__slider__item"
                v-for="(product, index) in getListProductNewest()"
                :key="index"
              >
                 <router-link
                class="latest-product__item"
                  tag="a"
                  :to="{
                    name: 'detailProduct',
                    params: { unique_id: product.unique_id },
                  }"
                  >
                  <div class="latest-product__item__pic">
                    <img :src="product.image_uri" alt="" />
                  </div>
                  <div class="latest-product__item__text">
                    <h6>{{ product.name }}</h6>
                    <span>{{ product.price }}</span>
                  </div>
                 </router-link>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="latest-product__text">
            <h4>Sản phẩm sắp có</h4>
            <div class="latest-product__slider">
              <div
                class="latest-prdouct__slider__item"
                v-for="(product, index) in getListProductFuture()"
                :key="index"
              >
                 <router-link
                class="latest-product__item"
                  tag="a"
                  :to="{
                    name: 'detailProduct',
                    params: { unique_id: product.unique_id },
                  }"
                  >
                  <div class="latest-product__item__pic">
                    <img :src="product.image_uri" alt="" />
                  </div>
                  <div class="latest-product__item__text">
                    <h6>{{ product.name }}</h6>
                    <span>{{ product.price }}</span>
                  </div>
                 </router-link>
              </div>
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
  computed:{
    ...mapState(["listCategory","listProduct"]),
  },



  methods: {
    getPublicProduct() {
      var newArr = [];
      for (let product of this.listProduct)
        if (product.status == 1) newArr.push(product);
      return newArr.splice(0, 3);
    },
    getListProductOldest() {
      var newArr = [];
      var length = this.listProduct.length;
      var data = null;
      for (let i = 0; i < length - 1; i++) {
        for (let j = i + 1; j < length; j++) {
          if (
            new Date(this.listProduct[i].created_at) >
            new Date(this.listProduct[j].created_at)
          ) {
            let temp = this.listProduct[i];
            this.listProduct[i] = this.listProduct[j];
            this.listProduct[j] = temp;
          }
        }
      }
      return this.getPublicProduct();
    },
    getListProductNewest() {
      var newArr = [];
      var length = this.listProduct.length;
      var data = null;
      for (let i = 0; i < length - 1; i++) {
        for (let j = i + 1; j < length; j++) {
          if (
            new Date(this.listProduct[i].created_at) <
            new Date(this.listProduct[j].created_at)
          ) {
            let temp = this.listProduct[i];
            this.listProduct[i] = this.listProduct[j];
            this.listProduct[j] = temp;
          }
        }
      }
      return this.getPublicProduct();
    },
    getListProductFuture() {
      var newArr = [];
      var length = this.listProduct.length;
      for (let i = 0; i < length; i++) {
        if (this.listProduct[i].status != 1) {
          newArr.push(this.listProduct[i]);
        }
      }
      return newArr.splice(0, 3);
    },
  },
};
</script>
<style scoped>
</style>