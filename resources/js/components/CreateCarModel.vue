<template>
    <div>
        <h1>Create A Car model</h1>
        <form @submit.prevent="addModel">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Reference model:</label>
                        <input type="text" class="form-control" v-model="modelsCar.id_model" name="id_model">
                        <span v-if="errors.id_model" class="text-danger">{{errors.id_model[0]}}</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Marque:</label>
                        <select v-model="modelsCar.marque_id" class="form-control">
                            <option disabled value="" selected="selected">Please select one</option>
                            <option v-for="marque in marques" :key="marque.id" :value="marque.id">
                                {{marque.nom_marque}}
                            </option>

                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>nom model:</label>
                        <input type="text" class="form-control" v-model="modelsCar.nom_model" name="nom_model">
                        <span v-if="errors.nom_model" class="text-danger">{{errors.nom_model[0]}}</span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {

        data(){
            return {
                modelsCar: {},
                errors:[],
                marques:[]

            }

        },
        methods:{

            addModel(){

                this.errors=[];
                this.axios.post('api/modelCars',this.modelsCar)
                    .then((response) => {

                        Toast.fire({
                            type: 'success',
                            title: 'Model added successfully'
                        });


                        this.$router.push({name: 'listModel'});


                }).catch(error=>{
                    if(error.response.status==422){
                        this.errors=error.response.data.errors
                    }
                })

            },


        },
        created() {
            this.axios.get('api/marque').then(response => {
                this.marques = response.data.data;
            });
        }
    }
</script>