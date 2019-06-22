<template>
    <div>
        <h1>Update A Car Model</h1>
        <form @submit.prevent="updateCarModel">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Reference model:</label>
                        <input type="text" class="form-control" v-model="modelCar.id_model">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nom model:</label>
                        <input type="text" class="form-control" v-model="modelCar.nom_model">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</template>

<script>

    export default {

        data() {
            return {
                modelCar: {},
                errors:[]

            }

        },
        methods: {
            updateCarModel(){
                this.errors=[];
                this.axios.patch(`api/modelCars/${this.$route.params.id}`,this.modelCar).then((response) => {

                    this.$router.push({name: 'listModel'});
                }).catch(error=>{
                    if(error.response.status==422){
                        this.errors=error.response.data.errors
                    }
                })

            }
        },
        created() {

            this.axios.get(`api/modelCars/${this.$route.params.id}/edit`).then((response) => {
                this.modelCar = response.data;
            });
        }
    }


</script>