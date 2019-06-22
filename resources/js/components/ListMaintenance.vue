<template>
    <div>
        <h1>Liste des voitures en maintenance</h1>
        <div class="row">
            <div class="col-md-8"></div>
            <div class="col-md-2">
                <router-link :to="{ name: 'createM' }" class="btn btn-primary">Ajouter </router-link><br>

                <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModel">-->
                    <!--Add-->
                <!--</button>-->
            </div>

        </div><br />
        <div style="overflow-x:auto;">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>

                <th>Description maintenance</th>
                <th>Date debut maintenance</th>
                <th>Date fin maintenance</th>
                <th>Facture maintenance</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="maintenanceCar in maintenancesCar" :key="maintenanceCar.id">
                <td>{{maintenanceCar.id}}</td>
                <td>{{maintenanceCar.desc_maintenance}}</td>
                <td>{{maintenanceCar.date_deb_maintenance}}</td>
                <td>{{maintenanceCar.date_fin_maintenance}}</td>
                <td>{{maintenanceCar.montant_maintenance}}</td>

                <!--<td><router-link :to="{name: 'editModel', params: { id: modelCar.id }}" class="btn btn-primary">Edit</router-link>-->
                    <!--<button class="btn btn-danger" @click.prevent="deleteModel(modelCar.id)">Delete</button></td>-->
            </tr>

            </tbody>
        </table>
        </div>
        <br><br>

        <div class="pagination">
            <button class="btn btn-default" v-on:click="fetchPaginateCategories(pagination.prev_page_url)" :disabled="!pagination.prev_page_url">
                Previous
            </button>

            <span>  &nbsp; Page {{pagination.current_page}} of {{pagination.last_page}} &nbsp;    </span>

            <button class="btn btn-default" v-on:click="fetchPaginateCategories(pagination.next_page_url)"  :disabled="!pagination.next_page_url">
                Next
            </button>

        </div>



        <!---------------------------- modaaaaaaaaaal ------------------->



        <!--<div class="modal fade" id="addModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
            <!--<div class="modal-dialog" role="document">-->
                <!--<div class="modal-content">-->
                    <!--<div class="modal-header">-->
                        <!--<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>-->
                        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
                            <!--<span aria-hidden="true">&times;</span>-->
                        <!--</button>-->
                    <!--</div>-->
                    <!--<div class="modal-body">-->
                        <!--<form >-->
                            <!--<div class="row">-->
                                <!--<div class="col-md-6">-->
                                    <!--<div class="form-group">-->
                                        <!--<label>Reference model:</label>-->
                                        <!--<input type="text" class="form-control" v-model="modelCar.id_model" name="id_model">-->
                                        <!--<span v-if="errors.id_model" class="text-danger">{{errors.id_model[0]}}</span>-->
                                    <!--</div>-->
                                <!--</div>-->
                            <!--</div>-->
                            <!--<div class="row">-->
                                <!--<div class="col-md-6">-->
                                    <!--<div class="form-group">-->
                                        <!--<label>nom model:</label>-->
                                        <!--<input type="text" class="form-control" v-model="modelCar.nom_model" name="nom_model">-->
                                        <!--<span v-if="errors.nom_model" class="text-danger">{{errors.nom_model[0]}}</span>-->
                                    <!--</div>-->
                                <!--</div>-->
                            <!--</div>-->

                            <!--<div class="modal-footer">-->
                                <!--<button type="button" class="btn btn-primary"  data-dismiss="modal" @click.prevent="addModel">Create Model</button>-->
                                <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->

                            <!--</div>-->
                        <!--</form>-->
                    <!--</div>-->

                <!--</div>-->
            <!--</div>-->
        <!--</div>-->


        <!---------------------------- modaaaaaaaaaal ------------------->
    </div>
</template>

<script>


    export default {

        data() {
            return {
                maintenancesCar: [],
                url:'api/maintenances',
                pagination:[],
                errors:[],
                maintenanceCar: {},
            }

        },
        methods:{
            test(){
                console.log('test');
            },
            getAll(){
                this.axios.get(this.url).then(response => {
                    this.maintenancesCar = response.data.data;


                    console.log( this.maintenancesCar);
                    this.makePagination(response.data)
                });

            },
            deleteModel(id){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        this.axios.delete('api/modelCars/' + id).then(response => {

                            this.getAll()

                            Swal.fire(
                                'Model Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )

                        });
                    }
                })



            },
            makePagination(data) {
                let pagination = {
                    current_page: data.current_page,
                    last_page: data.last_page,
                    next_page_url: data.next_page_url,
                    prev_page_url: data.prev_page_url
                }
                this.pagination = pagination
            },

            fetchPaginateCategories(url) {
                this.url = url;
                this.getAll();

            }

        },

        created() {
            this.getAll();
        }
    }

</script>