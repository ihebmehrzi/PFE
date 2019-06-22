<template>
    <div>
        <h1>Update A Car Category</h1>
        <form @submit.prevent="updateCategory">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Reference Category:</label>
                        <input type="text" class="form-control" v-model="category.id_categorie">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nom Category:</label>
                        <input type="text" class="form-control" v-model="category.nom_categorie">
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
                category: {},
                errors: []

            }

        },
        methods: {
            updateCategory(){
                this.errors=[];
                this.axios.patch(`api/category/${this.$route.params.id}`,this.category).then((response) => {

                    this.$router.push({name: 'listCategory'});
                }).catch(error=>{
                    if(error.response.status==422){
                        this.errors=error.response.data.errors
                    }
                })

            }
        },
        created() {

            this.axios.get(`api/category/${this.$route.params.id}/edit`).then((response) => {
                this.category = response.data;
            });
        }
    }


</script>