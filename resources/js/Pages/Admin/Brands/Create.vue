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
              <span></span>Brand/Create
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
                  <label for="sl-name">Brand Name</label>
                  <input
                    type="text"
                    v-model="form.brand_name"
                    class="form-control"
                    id="sl-name"
                    placeholder="Brand name"
                  />
                 <!-- <div v-if="errors.brand_name" style="color:red">{{errors.brand_name}}</div> -->
                </div>
                <div class="form-group">
                  <label for="sl-img">Choose Image</label>
                  <input
                    type="file" accept="image/*" @input= "form.brand_image = $event.target.files[0]"
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
                <inertia-link href="/brand" class="btn btn-light">Back</inertia-link>
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
  data(){
   return{
     form: this.$inertia.form({
      brand_name: null,
      brand_image: null}),
     }},

  methods:{
   submit() {
     this.form.post("/brand/store");
    },
   },
};
</script>

<style>
</style>
