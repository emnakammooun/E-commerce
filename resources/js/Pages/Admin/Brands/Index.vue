<template>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="mdi mdi-home"></i>
                    </span> Dashboard
                </h3>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                            <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="card">
                <div class="card-body">
                    <inertia-link class="btn btn-primary btn-sm card-title mb-4 text-right" href="/brand/create">Create</inertia-link>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Brand Name  </th>
                                <th> Brand Image </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="brand in brands" :key="brand.id">
                                <td> {{brand.id}}</td>
                                <td> {{brand.brand_name}}</td>
                                <td> <img :src="'/storage/'+brand.image" /> </td>
                                <td>
                                <inertia-link class="btn btn-primary btn-sm" :href="`/brand/${brand.id}/edit`">Edit</inertia-link>&nbsp;
                                <inertia-link class="btn btn-danger btn-sm" @click="destroy(brand.id)" as="button">Delete</inertia-link>
                                </td>

                            </tr>
                        </tbody>
                    </table>
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
        brands: Object,
    },
    methods: {
        destroy(id) {
            if (confirm('Are you sure you want to delete this record?')) {
                this.$inertia.post(`/brand/${id}/delete`);
            }
        },
    },

};
</script>

<style>
</style>
