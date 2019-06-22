<<template>
    <div>
        <h1>Edit A Car</h1>
        <form @submit.prevent="updateCar">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Voiture matricul:</label>
                        <input type="text" class="form-control" v-model="voiture.v_matricule" name="v_matricule">

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>kilometrage:</label>
                        <input type="text" class="form-control" v-model="voiture.kilometrage" name="kilometrage">

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>couleur:</label>
                        <input type="text" class="form-control" v-model="voiture.couleur" name="couleur">

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>prix:</label>
                        <input type="text" class="form-control" v-model="voiture.prix" name="prix" >

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>disponibilite:</label>
                        <input type="text" class="form-control" v-model="voiture.disponibilite" name="disponibilite">

                    </div>
                </div>
            </div><br />
            <div class="form-group">
                <button class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
</template>

<script>

    export default {

        data() {
            return {
                voiture: {},
                errors: []

            }

        },
        methods: {
            updateCar() {
                this.errors=[];
                this.axios.patch(`api/cars/${this.$route.params.id}`, this.voiture).then((response) => {


                    this.$router.push({name: 'listV'});
                }).catch(error=>{
                    if(error.response.status==422){
                        this.errors=error.response.data.errors
                    }
                })

            }
        },
        created() {

           // this.errors=[];

            this.axios.get(`api/cars/${this.$route.params.id}`)
                .then((response) => {
                    this.voiture = response.data;

            });
        }
    }

</script>