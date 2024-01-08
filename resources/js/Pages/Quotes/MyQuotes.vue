<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import Swal from 'sweetalert2'
import { Head } from '@inertiajs/vue3'
import { onMounted } from 'vue';
import jQuery from 'jquery'
import  axios from 'axios'
import { defineProps, ref,  reactive } from 'vue';
import Store from '@/Store/index';


let loading = false;


const $: JQueryStatic = jQuery

let message: Object = ''


const props = defineProps({
    quotes :{type:Object},
    result : {type:[]},
    user_id : {type:Number},
})


onMounted(() => {
    loading = true
    getMyQuotes()
})

const { result, user_id } = props;


let API_URL = import.meta.env.VITE_API_URL

const deleteQuote = (id:Number) => {
    loading = false

    axios.delete(API_URL + 'deleteQuote/' + id ).then(response => {
            message = response.data

            location.reload()
            
        }).catch(errors => {
            console.log(errors)
        })

}

const getMyQuotes = () => {
    axios.get(API_URL + 'myQuotes').then(response => {
        
        
    }).catch(errors => {
        console.log(errors)
    });
}


</script>
<template>
    
    <Head title="Quotes"></Head>
    <AuthenticatedLayout>
        <template #header>
            <div class="container-fluid mt-3 bg-white">
                <div class="row mt-3">
                    <div class="col-md-4 offset-md-4">
                        <div class="d-grid mx-auto text-center">
                            <a href="/quote">
                                <button type="button" class="btn btn-primary text-white" >
                                    <i class="p-2 fa-solid fa-refresh"></i>Mostrar más...
                                </button>
                            </a>
                            
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <h2 >{{ message }}</h2>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-10 offset-md-1">
                        <div class="table-responsive">
                            <table class="table table-stripeted table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Mis Citas Favorias</th><th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <tr v-for="quote,index in quotes" :key="quote.id">
                                        <td>{{ index+1 }}</td>
                                        <td>{{ quote.quote }}</td>
                                        <td>
                                            <button class="btn btn-primary" @click="deleteQuote(quote.id)">
                                            <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
        </template>
    </AuthenticatedLayout>

</template>