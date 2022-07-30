<template>
<div class="content-body">
            <div class="container-fluid">
                <h3>Mes besoins journaliers</h3>
                <div class="row">

    <div class="col-xl-3 col-lg-6 col-sm-6">
						<div class="widget-stat card bg-danger">
							<div class="card-body  p-4">
								<div class="media">
									<span class="mr-3">
										<i class="flaticon-381-calendar-1"></i>
									</span>
									<div class="media-body text-white text-right">
										<p class="mb-1">Proteins</p>
										<h3 class="text-white">110g</h3>
									</div>
								</div>
							</div>
						</div>
                    </div>
					<div class="col-xl-3 col-lg-6 col-sm-6">
						<div class="widget-stat card bg-success">
							<div class="card-body p-4">
								<div class="media">
									<span class="mr-3">
										<i class="flaticon-381-diamond"></i>
									</span>
									<div class="media-body text-white text-right">
										<p class="mb-1">Kcalories</p>
										<h3 class="text-white">1568</h3>
									</div>
								</div>
							</div>
						</div>
                    </div>
					<div class="col-xl-3 col-lg-6 col-sm-6">
						<div class="widget-stat card bg-info">
							<div class="card-body p-4">
								<div class="media">
									<span class="mr-3">
										<i class="flaticon-381-heart"></i>
									</span>
									<div class="media-body text-white text-right">
										<p class="mb-1">Glucides</p>
										<h3 class="text-white">41g</h3>
									</div>
								</div>
							</div>
						</div>
                    </div>
					<div class="col-xl-3 col-lg-6 col-sm-6">
						<div class="widget-stat card bg-primary">
							<div class="card-body p-4">
								<div class="media">
									<span class="mr-3">
										<i class="flaticon-381-user-7"></i>
									</span>
									<div class="media-body text-white text-right">
										<p class="mb-1">Sommeil</p>
										<h3 class="text-white">8H</h3>
									</div>
								</div>
							</div>
						</div>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-md-12">
                      Votre lien :   <input class="form-control" disabled type="text" v-model="slug">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4>Votre abonnement:</h4>
                        <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Durée</th>
      <th scope="col">Date de début</th>
      <th scope="col">Date de fin</th>
      <th scope="col">Jour restant</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="ab in abonnement" :key="ab.id">
      <th scope="row"> {{ab.duree}} </th>
      <td> {{ab.date_debut}} </td>
      <td > {{ab.date_fin}} </td>
      <td> {{ab.reste}} jours </td>
      <td>
        <button @click="renouveler()" v-if=" ab.reste == 0 " class="btn btn-xs btn-primary">
                Renouveler
                </button>

      </td>
    </tr>

  </tbody>
</table>
<div id="renouveler" class="row" style="display:none">
    <div class="col-md-12">
        <div class="form-group mt-4">
    Choisir un abonnement :
    <select class="form-contol" v-model="request">
        <option :value="1" > 1 MOIS - 1 000 DH </option>
        <option :value="2"> 6 MOIS - 4 000 DH </option>
        <option :value="3"> 12 MOIS - 10 000 DH</option>
    </select>
    <button @click="valider()" class="btn btn-primary"> Valider </button>
</div>
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
          return{
            abonnement:{
                id_abonnement:0,
                id_payement:0,
                type:'',
                date_debut:'',
                date_fin:'',
                reste:0
            },
            slug:'http://127.0.0.1:8000/invitation/'+localStorage.getItem('id'),
            request:0,
          }
        },
        mounted() {
            if(localStorage.getItem('id') == null){
                window.location.href = '/';
            }else{
                this.$toaster.success('Bienvenue '+localStorage.getItem('name'),{timeout: 2000});
                this.getAbonnement();
            }
        },
        methods: {
            getAbonnement(){
                axios.get('/api/abonnement/'+localStorage.getItem('id'))
                .then(res=>{
                    this.abonnement = res.data;
                     console.log('cc'+this.abonnement[0].id_abonnement);
                console.log('cc'+this.abonnement[0].id_payement);
                })
            },
            renouveler(){
                 document.getElementById("renouveler").style["display"]="inline";;

            },
            valider(){
                axios.get('/api/renouveler/'+localStorage.getItem('id')+'/'+this.request+'/'+this.abonnement[0].id_payement)
                .then(res=>{
                    this.$toaster.success('Votre demande de renouvelement a été envoyé avec succèes!',{timeout: 10000});
                })

            }
        }
    }
</script>
