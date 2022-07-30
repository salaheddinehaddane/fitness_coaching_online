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
            </div>
            </div>
</template>

<script>
    export default {
        data(){
            return {
                current_user:{
                    id:localStorage.getItem('id')
                },
            }
        },
        mounted() {
            if(localStorage.getItem('id') == null){
                window.location.href = '/';
            }else{
                this.$toaster.success('Bienvenue '+localStorage.getItem('name'));
            }
        },
        methods:{

        }
    }
</script>
