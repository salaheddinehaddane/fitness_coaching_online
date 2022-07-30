<template>

<div class="content-body">
    <div class="container-fluid">
     <div class="row">
         <div class="col-md-12">
             <div class="card">

      <div v-if="!done" class="container mt-5">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-8">
            <form  id="regForm">
                <h1 id="register">Mon bilan de semaine</h1>
                <div class="all-steps" id="all-steps">
                  <span class="step finish"><i class="fa fa-male"></i></span>
                  <span class="step"><i class="fa fa-cutlery"></i></span>
                  <span class="step"><i class="fa fa-heart"></i></span>
                  <span class="step"><i class="fa fa-balance-scale"></i></span>
                  <span class="step"><i class="fa fa-arrows-h"></i></span>
                  <span class="step"><i class="fa fa-check"></i></span>
                </div>


                <div class="tab">
                  <h4 >Mes Entrainements</h4>
                        <div class="inside_tab">
                            <input id="1" oninput="this.className = ''" type="radio" name="enthebdo.entrainement" v-model="hebdo.entrainement" :value="'J\'ai effectué tout les entrainements'" >
                             <label for="1"> J'ai effectué tout les entrainements </label>
                                <br>
                            <input id="2" oninput="this.className = ''" type="radio" name="enthebdo.entrainement" v-model="hebdo.entrainement" :value="'J\'ai effectué presque toute les entrainements'" >
                             <label for="2"> J'ai effectué presque toute les entrainements </label>
                                <br>
                           <input id="3" oninput="this.className = ''" type="radio" name="enthebdo.entrainement" v-model="hebdo.entrainement" :value="'Je n\'ai pas été assez assidu'" >
                             <label for="3"> Je n'ai pas été assez assidu </label>
                        </div>

                </div>
                <div class="tab">
                  <h4 >Mon Alimentations</h4>
                        <div class="inside_tab">
                            <input id="4" oninput="this.className = ''" type="radio" name="hebdo.nutrition" v-model="hebdo.nutrition" :value="'J\'ai suivé le plan à la lettre'" >
                             <label for="4"> J'ai suivé le plan à la lettre </label>
                                <br>
                            <input id="5" oninput="this.className = ''" type="radio" name="hebdo.nutrition" v-model="hebdo.nutrition" :value="'Je me suis laché un petit peu'" >
                             <label for="5"> Je me suis laché un petit peu </label>
                                <br>
                           <input id="6" oninput="this.className = ''" type="radio" name="hebdo.nutrition" v-model="hebdo.nutrition" :value="'Je n\'ai pas du tout suivi le plan'" >
                             <label for="6"> Je n'ai pas du tout suivi le plan </label>
                        </div>
                </div>
                <div class="tab">
                  <h4 >Mes sensations</h4>
                        <div class="inside_tab">
                            <input id="7" oninput="this.className = ''" type="radio" name="hebdo.sensation" v-model="hebdo.sensation" :value="'Je me sens bien, le programme me va'" >
                             <label for="7"> Je me sens bien, le programme me va </label>
                                <br>
                            <input id="8" oninput="this.className = ''" type="radio" name="hebdo.sensation" v-model="hebdo.sensation" :value="'Fatigué, le programme est trop dure'" >
                             <label for="8"> Fatigué, le programme est trop dure </label>
                                <br>
                           <input id="9" oninput="this.className = ''" type="radio" name="hebdo.sensation" v-model="hebdo.sensation" :value="'Je m\'accroche'" >
                             <label for="9"> Je m'accroche </label>


                        </div>

                </div>
                <div class="tab">
                  <h4>Mon Poids</h4>
                        <div class="inside_tab">
                            <table>
                                <tr>
                                    <td>Poids (KG): </td>
                                    <td><input style="margin-right: auto; margin-left: auto;" type="number" oninput="this.className=''" v-model="evolution.poid"></td>
                                </tr>
                            </table>
                        </div>

                </div>
                <div class="tab">
                  <h4>Mes Mesurations</h4>
                        <div class="inside_tab">
                            <table>
                                <tr>
                                    <td>Poitrin :</td>
                                    <td><input style="margin-right: auto; margin-left: auto;" type="number" oninput="this.className=''" v-model="evolution.poitrin"> (cm)</td>
                                </tr>
                                <tr>
                                    <td>Taille :</td>
                                    <td><input style="margin-right: auto; margin-left: auto;" type="number" oninput="this.className=''" v-model="evolution.taille"> (cm)</td>
                                </tr>
                                <tr>
                                    <td>Bras :</td>
                                    <td><input style="margin-right: auto; margin-left: auto;" type="number" oninput="this.className=''" v-model="evolution.bra"> (cm)</td>
                                </tr>
                                <tr>
                                    <td>Cuisse :</td>
                                    <td><input style="margin-right: auto; margin-left: auto;" type="number" oninput="this.className=''" v-model="evolution.cuisse"> (cm)</td>
                                </tr>
                            </table>

                        </div>

                </div>
                 <div class="tab">
                      <h4>Vérifiez votre bilan avant de valider</h4>
                            <div class="inside_tab text-center">
                               <button v-if="!valider" @click.prevent="Valider()" style="background-color:green;" class="btn btn-primary" > Valider </button>
                               <i style="color:green" v-else class="fa fa-check-circle fa-2x" ></i>
                            </div>

                    </div>

                <div class="thanks-message text-center" id="text-message"><h1 style="color:green"> <span> <i class="fa fa-check-circle"></i> </span> </h1>
                    <h3>Merci pour votre temps!</h3> <span>Le bilan a été envoyé à votre coach avec succès!</span>
                </div>
                <div style="overflow:auto;" id="nextprevious">
                    <div style="float:right;">
                      <button type="button" id="prevBtn"  @click="nextPrev(-1)"><i class="fa fa-angle-double-left"></i></button>
                      <button type="button" id="nextBtn" @click="nextPrev(1)"><i class="fa fa-angle-double-right"></i></button> </div>
                </div>
            </form>


        </div>
    </div>
</div>
            <div v-else style="height:500px" class="text-center py-4 px-4" ><h1 style="color:green; margin-top:50px"> <span> <i class="fa fa-check-circle"></i> </span> </h1>
                    <h3>Vous pouvez pas envoyer le bilan deux fois par semaine</h3> <span>Le bilan  de cette semaine a été envoyé à votre coach avec succès!</span>
                </div>
             </div>
         </div>
     </div>
    </div>
</div>
</template>



<script>
export default {
    data(){
            const today = new Date();
            const t= today.getFullYear()+'/'+ (today.getMonth()+1)+'/'+ today.getDate();
        return{
            done:false,
            currentTab : 0,
           evolution:{
            poid:0,
            poitrin:0,
            taille:0,
            bra:0,
            cuisse:0,
            date:t,
            id_client: localStorage.getItem('id'),
           },
           hebdo:{
               entrainement:'',
               nutrition:'',
               sensation:'',
               date:t,
               id_client:localStorage.getItem('id'),
           },
           valider:false,
        }
    },
        mounted() {
            if(localStorage.getItem('id') == null){
                window.location.href = '/';
            }
            this.verfier();
            this.document(),
            this.showTab(this.currentTab);
        },
    methods:{
        verfier(){
            axios.get('/api/verifier')
            .then(res=>{
                this.done=res.data;
                this.toastr();
            })
            .catch(err=>console.log('error: '+err))
        },
         toastr(){
            if(!this.done)
            {
                this.$toaster.error('Vous avez le droit d\' envoyer un bilan par semaine');
            }
            else
            {
                this.$toaster.error('Vous avez envoyé le bilan de cette semaine');
            }
        },
            hebdoInsert(){
                axios.post("/api/store-hebdo",this.hebdo)
                .then(res=>{
                    // this.done=res.data;
                })
                .catch(err=>console.log('error1: '+err))
            },
            evolutionInsert(){
                axios.post("/api/store-evolution",this.evolution)
                .then()
                .catch(err=>console.log('error2: '+err))
            },

            Valider(){
                this.hebdoInsert();
                this.evolutionInsert();
                this.valider=true;
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

  border:1px solid #6a1b9a !important;
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
    background-color: #6A1B9A;
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
    color: #6a1b9a;
    opacity: 0.5;
}

.step.active {
    opacity: 1
}


.step.finish {
   color: #fff;
   background: #6a1b9a;
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
</style>
