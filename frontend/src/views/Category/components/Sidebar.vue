<template>
  <div class="sidebar">
    <div class="sidebar__item">
      <h4>Menu</h4>
      <ul>
        <li v-for="(value, index) in listCategory" :key="index">
          <router-link
            tag="a"
            :to="{
              name: 'category',
              params: { unique_id: value.unique_id },
            }"
          >
            {{ value.name }}
          </router-link>
        </li>
      </ul>
    </div>
    <!-- <div class="sidebar__item">
      <h4>Giá</h4>
      <div class="price-range-wrap">
        <div
          class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
          data-min="10"
          data-max="540"
        >
          <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
          <span
            tabindex="0"
            class="ui-slider-handle ui-corner-all ui-state-default"
          ></span>
          <span
            tabindex="0"
            class="ui-slider-handle ui-corner-all ui-state-default"
          ></span>
        </div>
        <div class="range-slider">
          <div class="price-input">
            <input type="text" id="minamount" />
            <input type="text" id="maxamount" />
          </div>
        </div>
      </div>
    </div> -->
    <!-- <div class="sidebar__item sidebar__item__color--option">
      <h4>Colors</h4>
      <div class="sidebar__item__color sidebar__item__color--white">
        <label for="white">
          White
          <input type="radio" id="white" />
        </label>
      </div>
      <div class="sidebar__item__color sidebar__item__color--gray">
        <label for="gray">
          Gray
          <input type="radio" id="gray" />
        </label>
      </div>
      <div class="sidebar__item__color sidebar__item__color--red">
        <label for="red">
          Red
          <input type="radio" id="red" />
        </label>
      </div>
      <div class="sidebar__item__color sidebar__item__color--black">
        <label for="black">
          Black
          <input type="radio" id="black" />
        </label>
      </div>
      <div class="sidebar__item__color sidebar__item__color--blue">
        <label for="blue">
          Blue
          <input type="radio" id="blue" />
        </label>
      </div>
      <div class="sidebar__item__color sidebar__item__color--green">
        <label for="green">
          Green
          <input type="radio" id="green" />
        </label>
      </div>
    </div>
    <div class="sidebar__item">
      <h4>Popular Size</h4>
      <div class="sidebar__item__size">
        <label for="large">
          Large
          <input type="radio" id="large" />
        </label>
      </div>
      <div class="sidebar__item__size">
        <label for="medium">
          Medium
          <input type="radio" id="medium" />
        </label>
      </div>
      <div class="sidebar__item__size">
        <label for="small">
          Small
          <input type="radio" id="small" />
        </label>
      </div>
      <div class="sidebar__item__size">
        <label for="tiny">
          Tiny
          <input type="radio" id="tiny" />
        </label>
      </div>
    </div> -->
    <div class="sidebar__item">
      <div class="latest-product__text">
        <h4>Sản phẩm sắp có</h4>
        <div class="latest-product__slider">
          <div class="latest-prdouct__slider__item"
                v-for="(product, index) in getListProductFuture()"
                :key="index"
          >
            <a href="#" class="latest-product__item">
              <div class="latest-product__item__pic">
                <img :src="product.image_uri" alt="" />
              </div>
              <div class="latest-product__item__text">
                <h6>{{product.name}}</h6>
                <span>{{product.price}}</span>
              </div>
            </a>
           
          </div>

        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState } from "vuex";
export default {

  computed: {
    ...mapState(["listCategory", "listProduct"]),
  },
    created(){
      this.$store.dispatch("loadListProduct");
    this.$store.dispatch("loadListCategory");
    },
    methods:{
      getListProductFuture() {
      var newArr = [];
      var length = this.listProduct.length;
      for (let i = 0; i < length; i++) {
        if (this.listProduct[i].status != 1) {
          newArr.push(this.listProduct[i]);
        }
      }

      return newArr.splice(0,3);
    },
    },

};
</script>

<style scoped>
</style>