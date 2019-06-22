<template>
    <div id="contrat">
        <div class="col-12 grid-margin">
            <h1><center>CONTRAT DE LOCATION DE CAMPING-CAR  </center></h1>
            <div class="rq-contact-us-form-content" >
                <div class="rq-car-listing-wrapper">
                    <div class="rq-listing-choose rq-listing-list">
                        <div class="row">
                            <br><br>
                            Garage du Grand-Pont<br>
                            Camping-car International<br>
                            Rue du Grand-Pont 10<br>
                            1350 Orbe<br>
                            Tél : 024 441 12 12<br>
                            Natel : 079 606 31 76 ou 079 433 20 86<br><br><br>
                        </div>
                        <h3>Le Garage du Grand-Pont loue à Monsieur/Madame</h3>
                        <div class="row">
                            <div id="bloc" >
                                <form  >
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <br>
                                                <label class="col-sm-3 col-form-label">&nbsp;Nom</label>
                                                <div class="col-sm-9">
                                                    <p>{{reservation.nom}}</p>  </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Prenom</label>
                                                <div class="col-sm-9">
                                                    <p>{{reservation.prenom}}</p>  </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <br>
                                                <label class="col-sm-4 col-form-label">&nbsp;Tél. privé</label>
                                                <div class="col-sm-6">
                                                    <p>{{reservation.tel}}</p>  </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Prenom</label>
                                                <div class="col-sm-9">
                                                    <p>{{reservation.email}}</p>  </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <br>
                                                <label class="col-sm-12 col-form-label">&nbsp;Prise en charge du camping-car le : </label>
                                                <div class="col-sm-9">
                                                    <p>{{reservation.date_pris_en_charge}}</p>  </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label">Le client s'engage à ramener le véhicule le :</label>
                                                <div class="col-sm-9">
                                                    <p>{{reservation.date_fin_reservation}}</p>  </div>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="col-md-10">

        </div>
        <div class="row">
            <div class="col-md-8"></div>
            <div class="col-md-2">
                <button class="btn btn-primary" v-on:click="showPdf(reservation.email)">Download contrat</button>
            </div>
            <div class="col-md-8"></div>

            <div class="col-md-2">
                <!--button class="btn btn-primary" v-on:click="showPdf(reservation.email)">Send Mail</button-->
                <button class="btn btn-primary" v-on:click="sendMail(reservation.email)">Send Mail</button>
            </div>
        </div><br />


    </div>
</template>
<script>

    import jsPDF from 'jspdf';
    export default {

        data(){
            return {
                reservation: {},
                voiture: {},
                test:false,
                isDisplay: false
            }
        },
        methods:{

            showPdf(email) {
                console.log('im in show pdf')

                console.log("email : ",email)
                var doc = new jsPDF()
                doc.fromHTML(document.getElementById("contrat"), 20,20,{'width':200});//<-- not good. How can I refactor this?

                doc.save("tes.pdf");
                var pdf=doc.output()
                console.log('pdf',pdf)
                this.sendMail(email,pdf)

            },
            //sendMail(email,pdf){
            sendMail(email){

                let formData = new FormData();

             //   formData.append('pdf',pdf);
                formData.append('email',email);
              //    formData.append('id',id);

                this.axios.post('api/sendMail?email=',formData)
                    .then((response) => {
                        console.log(response)


                        Swal.fire(
                            'Email sent!',
                            'This reservation has been confirmed.',
                            'success'
                        )
                        this.$router.push({name: 'listR'});

                    });

            }
        },


        created(){
            this.axios.get(`api/reservations/${this.$route.params.id}`)
                .then((response) => {
                    this.reservation = response.data;

                });
        }
    }
</script>

<style>
    #bloc {
        border: solid black 2px;
        width : 700px;
    padding-top:  20px;
        padding-left:  20px;

    }
</style>