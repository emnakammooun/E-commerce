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
              <span></span>Slider/Create
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
                  <label for="sl-position">Slider Position</label>
                  <input
                    type="text"
                    v-model="form.slider_position"
                    class="form-control" 
                    id="sl-position"
                    placeholder="Slider Position"
                  />
                 <!--<div v-if="errors.title" style="color:red">{{errors.title}}</div> -->
                </div>
                <div class="form-group">
                  <label for="sl-position">Title</label>
                  <input
                    type="text"
                    v-model="form.title"
                    class="form-control" 
                    id="sl-position"
                    placeholder="Slider Title"
                  />
                 <!--<div v-if="errors.title" style="color:red">{{errors.title}}</div> -->
                </div>
                <div class="form-group">
                  <label for="sl-position">Description</label>
                  <textarea v-model="form.description"
                  class="form.control" rows="10" cols="40"></textarea>
                
                 <!--<div v-if="errors.description" style="color:red">{{errors.description}}</div> -->
                </div>
                <div class="form-group">
                  <label for="sl-position">Button Name</label>
                  <input
                    type="text"
                    v-model="form.btn_name"
                    class="form-control"
                    id="sl-position"
                    placeholder="Slider Button Name"
                  />
              <!--<div v-if="errors.btn_name" style="color:red">{{errors.btn_name}}</div> -->   
                </div>
                <div class="form-group">
                  <label for="sl-position">Button Link</label>
                  <input
                    type="text"
                    v-model="form.btn_link"
                    class="form-control"
                    id="sl-position"
                    placeholder="Slider Button Link"
                  />
                 <!--  <div v-if="errors.btn_link" style="color:red">{{errors.btn_link}}</div> -->
                </div>
              
                <div class="form-group">
                  <label for="sl-img">Choose Image</label>
                  <input
                    type="file" accept="image/*" @input= "form.slider_image = $event.target.files[0]"
                    class="form-control"
                    id="sl-img"
                  />
                  <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                    {{ form.progress.percentage }}%
                  </progress>

                </div>

                <div class="form-group">
                  <label for="sl-position">Status </label>
                  <select  v-model="form.status"
                    class="form-control">
                    <option value="1" selected>Active</option>
                    <option value="0">Block</option>
                  </select>
                  
                </div>
                
                <button type="submit"
                :disabled= "form.processing"
                 class="btn btn-gradient-primary me-2">
                  Submit
                </button>
                <inertia-link href="/slider" class="btn btn-light">Back</inertia-link>
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
    slider_position:null,
    slider_image:null,
    title:null,
    description:null,
    btn_link:null,
    btn_name:null,
    status: null,
  }),
     }},

  methods:{
   submit() {
     this.form.post("/slider/store");
    },
   },
};
</script>

<style>
</style>
