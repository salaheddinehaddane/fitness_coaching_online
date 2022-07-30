<template>

<div class="row">
    <div class="col-md-8 mx-auto my-auto">
        <form  id="regForm">
                <h2 class="text-center" id="register">Bienvenue chez le coach {{c.name}}</h2>
                <div class="all-steps" id="all-steps">
                  <span class="step finish"><i class="fa fa-male"></i></span>
                  <span class="step finish"><i class="fa fa-male"></i></span>
                  <span class="step"><i class="fa fa-arrows-h"></i></span>
                  <span class="step"><i class="fa fa-check"></i></span>
                </div>


                <div class="tab">
                  <h4 >Vos cordonnées</h4>
                        <div class="inside_tab">
                            <div class="form-group">
                                            <label class="mb-1"><strong>Nom complete</strong></label>
                                            <input v-model="coach.name" type="text" class="form-control" placeholder="nom complete">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input v-model="coach.email" type="email" class="form-control" placeholder="hello@example.com">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Numéro de téléphone</strong></label>
                                            <input v-model="coach.No_tel" type="text" class="form-control" placeholder="Numéro de téléphone">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Mot de passe</strong></label>
                                            <input v-model="coach.password" type="password" class="form-control" value="">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Retapez mot de passe</strong></label>
                                            <input v-model="repassword" type="password" class="form-control" value="">

                                        </div>
                                        <div class="text-danger" >
                                            {{error}}
                                        </div>
                        </div>

                </div>

<div class="tab">
                  <h4 >Votre format dès l'inscription</h4>
                        <div class="inside_tab">
                            <div class="form-group">
                                            <label class="mb-1"><strong>Poids (Kg)</strong></label>
                                            <input v-model="format_initial.poid" type="number" class="form-control" placeholder="Poid">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Taille (cm)</strong></label>
                                            <input v-model="format_initial.taille" type="number" class="form-control" placeholder="Taille">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Poitrin (cm)</strong></label>
                                            <input v-model="format_initial.poitrin" type="number" class="form-control" placeholder="Poitrine">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Bras (cm)</strong></label>
                                            <input v-model="format_initial.bra" type="number" class="form-control" placeholder="Bras">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Cuisse (cm)</strong></label>
                                            <input v-model="format_initial.cuisse" type="number" class="form-control" placeholder="Cuisse">
                                        </div>


                        </div>
                </div>
                <div class="tab">
                  <h4 class="mb-4" >QUEL PHYSIQUE SOUHAITES-TU ?</h4>
                        <div class="inside_tab">

                <div class="row">
                    <div class="col-md-4" style="border-right:solid 1px black">
                     <label for="at">   <h4 class="text-center">Physique Athlétique</h4>
                       <div>
                        <img class="float-right" src="https://cdn.fizzup.com/full/register/physique_athletique.png" alt="">
                        </div>
                        </label>
                        <div class="text-center">
                            <input v-model="coach.id_cible" :value="1" type="radio" name="format" id="at">
                        </div>
                    </div>
                    <div class="col-md-4" style="border-right:solid 1px black">
                    <label for="ms" >
                        <h4 class="text-center">Physique<br> Massif</h4>
                       <div>
                        <img class="float-right" src="https://cdn.fizzup.com/full/register/physique_massif.png" alt="">
                        </div>
                        </label>
                        <div class="text-center">
                            <input v-model="coach.id_cible" :value="2" type="radio" name="format" id="ms">
                        </div>
                    </div>
                    <div class="col-md-4 box">
                        <label for="sc" >
                        <h4 class="text-center">Physique<br> Sec</h4>
                       <div>
                        <img class="float-right" src="https://cdn.fizzup.com/full/register/physique_sec.png" alt="">
                        </div>
                        </label>
                        <div class="text-center">
                            <input v-model="coach.id_cible" :value="3" type="radio" name="format" id="sc">
                        </div>
                    </div>

                </div>

                        </div>
                </div>


    <div class="tab">
                      <h4>Valider votre information</h4>
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
      <th scope="row">Poids</th>
      <td>
        {{format_initial.poid}}
      </td>
    </tr>

    <tr>
      <th scope="row">Taille</th>
      <td> {{format_initial.taille}} </td>
    </tr>
    <tr>
      <th scope="row">Poitrine</th>
      <td> {{format_initial.poitrin}} </td>
    </tr>
    <tr>
      <th scope="row">Bras</th>
      <td> {{format_initial.bra}} </td>
    </tr>
    <tr>
      <th scope="row">Cuisse</th>
      <td> {{format_initial.cuisse}} </td>
    </tr>
    <tr>
      <th scope="row">Physique souhaité</th>
      <td v-if="coach.id_cible == 1"> Physique Athlétique </td>
      <td v-if="coach.id_cible == 2"> Physique Massif </td>
      <td v-if="coach.id_cible == 3"> Physique Sec </td>
    </tr>

  </tbody>
</table>
<div class="text-center">

    <input v-if="!valider" type="submit" @click.prevent="insert()" value="Je Valide" class="btn btn-primary">
            <i style="color:green" v-else class="fa fa-check-circle fa-2x" ></i>

</div>
                            </div>

                    </div>

                <div  class="thanks-message text-center my-auto" id="text-message">
                 <div>
                   <h1 style="color:green"> <span> <i class="fa fa-check-circle"></i> </span> </h1>
                    <h3>Merci pour votre inscription!</h3> <span>Votre coach vous contacterons le plus tot possible</span>
                 </div>

                </div>
                <div style="overflow:auto;" id="nextprevious">
                    <div style="float:right;">
                      <button type="button" id="prevBtn"  @click="nextPrev(-1)"><i class="fa fa-angle-double-left"></i></button>
                      <button type="button" id="nextBtn" @click="nextPrev(1)"><i class="fa fa-angle-double-right"></i></button> </div>
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
                id_cible:0,
                id_coach:localStorage.getItem('id_cooach'),
            },
            repassword: '',
           valider:false,
            error:"",
           format_initial:{
            poid:"",
            taille:'',
            poitrin:'',
            bra:'',
            cuisse:'',
           },
           c:{
            name:''
           },

        }
    },
        mounted() {
            this.document()
            this.getUrl()
            this.getCoach()
            this.showTab(this.currentTab)
        },
    methods:{
        getUrl(){
                let baseUrl = (window.location).href;
                let strs = baseUrl.split('/');
                let id = strs.at(-1);
                localStorage.setItem('id_cooach',id);
                this.coach.id_coach = id;
               },
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
                store_initial(){
                axios.post('/api/store_initial/',this.format_initial)
                .then(console.log('done2'))
                .catch(err=>console.log('err2'+err))
                console.log('wk ' +this.format_initial.id_client);
                console.log('test: '+this.test)
               },

               insert(){
                axios.post("/api/store_client",this.coach)
                .then(res=>{
                    this.valider=true;
                    // console.log('id: '+res.data);
                    this.format_initial.id_client = res.data;
                    console.log('id f '+ this.format_initial.id_client)
                    this.store_initial();
                })
                .catch(err=>console.log(err));
               },

               getCoach(){
                axios.get('/api/get_coach/'+this.coach.id_coach)
                .then(
                    res=>{
                        this.c = res.data
                    }
                )
               }




    }
}
</script>
