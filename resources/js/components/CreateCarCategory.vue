<template>
    <div>
        <h1>Create A Car Category</h1>
        <form @submit.prevent="addCategory">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Reference CAtegory:</label>
                        <input type="text" class="form-control" v-model="CategoyCar.id_categorie" name="id_categorie">
                        <span v-if="errors.id_categorie" class="text-danger">{{errors.id_categorie[0]}}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nom Category:</label>
                        <input type="text" class="form-control" v-model="CategoyCar.nom_categorie" name="nom_categroie">
                        <span v-if="errors.nom_categorie" class="text-danger">{{errors.nom_categorie[0]}}</span>
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
                CategoyCar: {},
                errors:[]

            }

        },
        methods:{

            addCategory(){

                this.errors=[];
                this.axios.post('api/category',this.CategoyCar)
                    .then((response) => {


                        Toast.fire({
                            type: 'success',
                            title: 'Category added successfully'
                        });
                        this.$router.push({name: 'listCategory'});


                    }).catch(error=>{
                    if(error.response.status==422){
                        this.errors=error.response.data.errors
                    }
                })

            },


        }
    }
</script>