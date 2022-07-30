<template>

    <div class="row">
        <div class="col-md-8 mx-auto my-auto">
            <form id="regForm">
                <h2 class="text-center" id="register">S'inscrire comme un coach</h2>
                <div class="all-steps" id="all-steps">
                    <span class="step finish"><i class="fa fa-male"></i></span>
                    <span class="step"><i class="fa fa-arrows-h"></i></span>
                    <span class="step"><i class="fa fa-check"></i></span>
                </div>


                <div class="tab">
                    <h4>Vos cordonnées</h4>
                    <div class="inside_tab">
                        <div class="form-group">
                            <label class="mb-1"><strong>Nom complete</strong></label>
                            <input v-model="coach.name" type="text" class="form-control" placeholder="nom complete">
                        </div>
                        <div class="form-group">
                            <label class="mb-1"><strong>Email</strong></label>
                            <input v-model="coach.email" type="email" class="form-control"
                                placeholder="hello@example.com">
                        </div>
                        <div class="form-group">
                            <label class="mb-1"><strong>Numéro de téléphone</strong></label>
                            <input v-model="coach.No_tel" type="text" class="form-control"
                                placeholder="Numéro de téléphone">
                        </div>
                        <div class="form-group">
                            <label class="mb-1"><strong>Mot de passe</strong></label>
                            <input v-model="coach.password" type="password" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label class="mb-1"><strong>Retapez mot de passe</strong></label>
                            <input v-model="repassword" type="password" class="form-control" value="">

                        </div>
                        <div class="text-danger">
                            {{error}}
                        </div>
                    </div>

                </div>

                <div class="tab">
                    <h4>Les abonnements</h4>
                    <div class="">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card text-center ">
                                    <div
                                        class="card-header text-center border-bottom-0 bg-transparent text-success pt-4">
                                        <h5></h5>
                                    </div>
                                    <div class="card-body border border-info">
                                        <h1>1 MOIS</h1>
                                        <h5 class="text-muted"><small>1 000 DH</small></h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><i class="fa fa-check text-success mx-2"></i>Avoir
                                            votre propre liste des entrainements</li>
                                        <li class="list-group-item"><i class="fa fa-check text-success mx-2"></i>Avoir
                                            votre propre liste des nutritions</li>
                                        <li class="list-group-item"><i class="fa fa-check text-success mx-2"></i>Lister
                                            votre clients et les suivi</li>
                                        <li class="list-group-item"><i
                                                class="fa fa-check text-success mx-2"></i>Personnaliser pour chaque
                                            client son plan de semaine</li>
                                    </ul>
                                    <div class="card-footer border-top-0">
                                        <label for="abonner">CHOISIR:</label> <br>
                                        <input v-model="coach.id_abonnement" :value="1" id="abonner" type="radio"
                                            name="abonner">
                                        <!-- <i class="fa fa-arrow-right"></i> -->

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card border border-success text-center">

                                    <div style="border-top-left-radius:10px;border-top-right-radius:10px"
                                        class="card-body border border-success ">
                                        <h5 style="letter-spacing: 4px;">Populaire</h5>
                                        <h1>6 MOIS</h1>
                                        <h5 class="text-muted"><small>4 000 DH</small></h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><i class="fa fa-check text-success mx-2"></i>Avoir
                                            votre propre liste des entrainements</li>
                                        <li class="list-group-item"><i class="fa fa-check text-success mx-2"></i>Avoir
                                            votre propre liste des nutritions</li>
                                        <li class="list-group-item"><i class="fa fa-check text-success mx-2"></i>Lister
                                            votre clients et les suivi</li>
                                        <li class="list-group-item"><i
                                                class="fa fa-check text-success mx-2"></i>Personnaliser pour chaque
                                            client son plan de semaine</li>
                                    </ul>
                                    <div class="card-footer border-top-0">
                                        <label for="abonner2">CHOISIR:</label> <br>
                                        <input v-model="coach.id_abonnement" :value="2" id="abonner2" type="radio"
                                            name="abonner">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-center">
                                    <div
                                        class="card-header text-center border-bottom-0 bg-transparent text-success pt-4">
                                        <h5></h5>
                                    </div>
                                    <div class="card-body border border-info">
                                        <h1>12 MOIS</h1>
                                        <h5 class="text-muted"><small>10 0000 DH</small></h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><i class="fa fa-check text-success mx-2"></i>Avoir
                                            votre propre liste des entrainements</li>
                                        <li class="list-group-item"><i class="fa fa-check text-success mx-2"></i>Avoir
                                            votre propre liste des nutritions</li>
                                        <li class="list-group-item"><i class="fa fa-check text-success mx-2"></i>Lister
                                            votre clients et les suivi</li>
                                        <li class="list-group-item"><i
                                                class="fa fa-check text-success mx-2"></i>Personnaliser pour chaque
                                            client son plan de semaine</li>
                                    </ul>
                                    <div class="card-footer border-top-0">
                                        <label for="abonner1">CHOISIR:</label> <br>
                                        <input v-model="coach.id_abonnement" :value="3" id="abonner1" type="radio"
                                            name="abonner">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="tab">
                    <h4>Valider votre cordonées et choix de l'abonnement</h4>
                    <div class="inside_tab text-center">

                        <table class="table table-striped">

                            <tbody>
                                <tr>
                                    <th scope="row">Nom</th>
                                    <td> {{coach.name}}</td>

                                </tr>
                                <tr>
                                    <th scope="row">Numéro du téléphone</th>
                                    <td> {{coach.No_tel}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td> {{coach.email}}</td>

                                </tr>
                                <tr>
                                    <th scope="row">Durée de l'abonnement</th>
                                    <td v-if="coach.id_abonnement == 1"> 1 MOIS</td>
                                    <td v-else-if="coach.id_abonnement == 2"> 6 MOIS</td>
                                    <td v-else-if="coach.id_abonnement == 3"> 12 MOIS</td>

                                </tr>
                                <tr>
                                    <th scope="row">Montant</th>
                                    <td v-if="coach.id_abonnement == 1"> 1 000 DH </td>
                                    <td v-else-if="coach.id_abonnement == 2"> 4 000 DH</td>
                                    <td v-else-if="coach.id_abonnement == 3"> 10 000 DH</td>

                                </tr>
                            </tbody>
                        </table>
                        <div class="text-center">

                            <input v-if="!valider" type="submit" @click.prevent="insert()" value="Je Valide"
                                class="btn btn-primary">
                            <i style="color:green" v-else class="fa fa-check-circle fa-2x"></i>

                        </div>
                    </div>

                </div>

                <div class="thanks-message text-center my-auto" id="text-message">
                    <div>
                        <h1 style="color:green"> <span> <i class="fa fa-check-circle"></i> </span> </h1>
                        <h3>Merci pour votre inscription!</h3> <span>Nous vous contacterons le plus tot possible</span>
                    </div>

                </div>
                <div style="overflow:auto;" id="nextprevious">
                    <div style="float:right;">
                        <button type="button" id="prevBtn" @click="nextPrev(-1)"><i
                                class="fa fa-angle-double-left"></i></button>
                        <button type="button" id="nextBtn" @click="nextPrev(1)"><i
                                class="fa fa-angle-double-right"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>



<script>
export default {
    data(){
        return{
            currentTab : 0,
            coach:{
                name:'',
                email:'',
                password:'',
                No_tel:"",
                id_abonnement:0
            },
            repassword:'',
            valider: false,
            error:'',
        }
    },
        mounted() {
            this.document(),
            this.showTab(this.currentTab);
        },
    methods:{
            document(){

                document.addEventListener("DOMContentLoaded", function(event) {
                    this.showTab(this.currentTab);
                    })
            },


              showTab(n) {
              var x = document.getElementsByClassName("tab");
              x[n].style.display = "block";
              if (n == 0) {
              document.getElementById("prevBtn").style.display = "none";
              } else {
              document.getElementById("prevBtn").style.display = "inline";
              }
              if (n == (x.length - 1)) {
              document.getElementById("nextBtn").innerHTML = '<i class="fa fa-angle-double-right"></i>';
              } else {
              document.getElementById("nextBtn").innerHTML = '<i class="fa fa-angle-double-right"></i>';
              }
              fixStepIndicator(n)
              },

               nextPrev(n) {
                   if (this.coach.password == this.repassword) {
                       this.error = "";
                       var x = document.getElementsByClassName("tab");
                       if (n == 1 && !this.validateForm()) return false;
                       x[this.currentTab].style.display = "none";
                       this.currentTab = this.currentTab + n;
                       if (this.currentTab >= x.length) {

                           document.getElementById("nextprevious").style.display = "none";
                           document.getElementById("all-steps").style.display = "none";
                           document.getElementById("register").style.display = "none";
                           document.getElementById("text-message").style.display = "block";
                       }
                       this.showTab(this.currentTab);
                   } else {
                       this.error = "Attention ! Les mots de passes ne sont pas identique"
                   }
              },

                validateForm() {
                   var x, y, i, valid = true;
                   x = document.getElementsByClassName("tab");
                   y = x[this.currentTab].getElementsByTagName("input");
                   for (i = 0; i < y.length; i++) {
                       if (y[i].value == "") {
                           y[i].className += " invalid";
                           valid = false;
                       }


                   }
                   if (valid) {
                       document.getElementsByClassName("step")[this.currentTab].className += " finish";
                   }
                   return valid;
               },

               fixStepIndicator(n) {
                   var i, x = document.getElementsByClassName("step");
                   for (i = 0; i < x.length; i++) {
                       x[i].className = x[i].className.replace(" active", "");
                   }
                   x[n].className += " active";
               },

               insert(){
                axios.post("/api/store_coach",this.coach)
                .then(res=>{
                    this.valider=true;
                })
               },

               store_date_abonnement(){
                axios.get('api/store_date_abonnement/'+this.coach.id_abonnement)
                .then(console.log('done2'))
               }



    }
}
</script>
<style scoped>
    #regForm {
    background-color: #ffffff;
    margin: 0px auto;
    font-family: Raleway;
    padding: 40px;
    border-radius: 10px
}

#register{

  color: #6A1B9A;
}

h1 {
    text-align: center
}

.tab input:focus{

  border:1px solid #2a9a1b !important;
  outline: none;
}

input.invalid {

    border:1px solid #e03a0666;
}

.tab {
    display: none;
    text-align: center;
}
.tab .inside_tab{
    width: 60%;
    margin-right: auto;
    margin-left: auto;
    text-align: start;
}

button {
    background-color: #2da81c;
    color: #ffffff;
    border: none;
    border-radius: 50%;
    padding: 10px 20px;
    font-size: 17px;
    font-family: Raleway;
    cursor: pointer
}

button:hover {
    opacity: 0.8
}

button:focus{

  outline: none !important;
}

#prevBtn {
    background-color: #bbbbbb
}


.all-steps{
      text-align: center;
    margin-top: 30px;
    margin-bottom: 30px;
    width: 100%;
    display: inline-flex;
    justify-content: center;
}

.step {
       height: 40px;
    width: 40px;
    margin: 0 2px;
    background-color: #bbbbbb;
    border: none;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 15px;
    color: #5d1b9b;
    opacity: 0.5;
}

.step.active {
    opacity: 1
}


.step.finish {
   color: #fff;
   background: #2da81c;
   opacity: 1;

}



.all-steps {
    text-align: center;
    margin-top: 30px;
    margin-bottom: 30px
}

.thanks-message {
    display: none
}

.card-body{
    background-color: #F3F3F3;
}

.table .ribbon{
  width: 150px;
  height: 150px;
  position: absolute;
  top: -10px;
  left: -10px;
  overflow: hidden;
}

.table .ribbon::before,
table .ribbon::after{
  position: absolute;
  content: "";
  z-index: -1;
  display: block;
  border: 7px solid #ba24f0;
  border-top-color: transparent;
  border-left-color: transparent;
}

</style>
