<template>
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-home"></i>
          </span>
          Dashboard
        </h3>
        <nav aria-label="breadcrumb">
          <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
              <span></span>Product/Create
              <i
                class="
                  mdi mdi-alert-circle-outline
                  icon-sm
                  text-primary
                  align-middle
                "
              ></i>
            </li>
          </ul>
        </nav>
      </div>

      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <!-- <h4 class="card-title">Default form</h4>
              <p class="card-description">Basic form layout</p> -->
              <form class="forms-sample" @submit.prevent="submit" accept="multipart/form-data">
                <div class="form-group">
                  <label for="sl-name">Choose Category</label>
                  <select v-model="form.category_id"
                    class="form-control">
                    <option v-for="category in categories" value="category_id">{{category.category_name}}</option>
                  </select>
                  
                  
                 <!-- <div v-if="errors.brand_name" style="color:red">{{errors.brand_name}}</div> -->
                </div>
                <div class="form-group">
                  <label for="sl-name">Product Name</label>
                  <input
                    type="text"
                    v-model="form.name"
                    class="form-control"
                    id="sl-name"
                    placeholder="Product name"
                  />
                  
                 <!-- <div v-if="errors.brand_name" style="color:red">{{errors.brand_name}}</div> -->
                </div>
                <div class="form-group">
                  <label for="sl-name">Description</label>
                  <textarea  v-model="form.description"
                    class="form-control" rows="10" cols="40">
                    
                  </textarea>
                 
                 <!-- <div v-if="errors.brand_name" style="color:red">{{errors.brand_name}}</div> -->
                </div>
                <div class="form-group">
                  <label for="sl-name">Product Qty</label>
                  <input
                    type="text"
                    v-model="form.qty"
                    class="form-control"
                    id="sl-name"
                    placeholder="Product Qty"
                  />
                 <!-- <div v-if="errors.brand_name" style="color:red">{{errors.brand_name}}</div> -->
                </div>
                
                <div class="form-group">
                  <label for="sl-name">Product Price</label>
                  <input
                    type="text"
                    v-model="form.price"
                    class="form-control"
                    id="sl-name"
                    placeholder="Product Price"
                  />
                 <!-- <div v-if="errors.brand_name" style="color:red">{{errors.brand_name}}</div> -->
              </div>
                <div class="form-group">
                  <label for="sl-name">Product Sale Price</label>
                  <input
                    type="text"
                    v-model="form.sale_price"
                    class="form-control"
                    id="sl-name"
                    placeholder="Product Sale Price"
                  />
                 <!-- <div v-if="errors.brand_name" style="color:red">{{errors.brand_name}}</div> -->
                </div>
                <div class="form-group">
                  <label for="sl-img">Choose Image</label>
                  <input
                    type="file" accept="image/*" @input= "form.image = $event.target.files[0]"
                    class="form-control"
                    id="sl-img"
                  />
                  <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                    {{ form.progress.percentage }}%
                  </progress>

                </div>
                <!-- <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input
                    type="password"
                    class="form-control"
                    id="exampleInputPassword1"
                    placeholder="Password"
                  />
                </div>
                <div class="form-group">
                  <label for="exampleInputConfirmPassword1"
                    >Confirm Password</label
                  >
                  <input
                    type="password"
                    class="form-control"
                    id="exampleInputConfirmPassword1"
                    placeholder="Password"
                  />
                </div>
                <div class="form-check form-check-flat form-check-primary">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" /> Remember
                    me <i class="input-helper"></i
                  ></label>
                </div> -->
                <button type="submit"
                :disabled= "form.processing"
                 class="btn btn-gradient-primary me-2">
                  Submit
                </button>
                <inertia-link href="/product" class="btn btn-light">Back</inertia-link>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import AdminLayout from "../../../Shared/AdminLayout";
export default {
    
  layout: AdminLayout,
  props: {
        errors: Object,
        categories: Object,
    },
  data(){
   return{
     form: this.$inertia.form({
      category_id: null,
      name: null,
      description: null,
      qty: null,
      price: null,
      sale_price: null,
      image: null
    }),
     }},

  methods:{
   submit() {
     this.form.post("/product/store");
    },
   },
};
</script>

<style>
</style>
