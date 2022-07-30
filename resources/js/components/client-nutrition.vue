<template>
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row mb-4">
                <div class="col-md-8 offset-md-2">
                    <div class="calender mb-4">

                        <div class="mb-2" style="background-color:#FFF; border-radius: 10px;">
                            <button @click="manageDates(new Date(Date.now() - 6.048e+8))" class="btn"
                                style="float:left"> <i class="fa fa-arrow-left"></i>
                            </button>
                            <button @click="manageDates(new Date(Date.now() + 6.048e+8))" class="btn"
                                style="float:right"> <i class="fa fa-arrow-right"></i>
                            </button>
                        </div>
                        <div class="slider">
                            <div class="top">
                                <div v-for="day,index in days" :key="day[index]" class="days">
                                    {{day}}/0{{month[index]}}</div>
                            </div>

                            <div class="bottom">
                                <div class="week" @click="getNutrition(date[0])">L</div>
                                <div class="week" @click="getNutrition(date[1])">M</div>
                                <div class="week" @click="getNutrition(date[2])">M</div>
                                <div class="week" @click="getNutrition(date[3])">J</div>
                                <div class="week" @click="getNutrition(date[4])">V</div>
                                <div class="week" @click="getNutrition(date[5])">S</div>
                                <div class="week" @click="getNutrition(date[6])">D</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="text-center">Petit déjeuner
                                <span class="ml-4">
                                    <i class="fa fa-clock-o"></i>
                                </span>
                            </h2>
                            <ul>
                                <li v-for="nut in nutrition_pd" :key="nut.id">
                                    {{nut.name}} : {{nut.quantite}} <small> g/unité</small>
                                    <span style="display:none">
                                    </span>
                                </li>

                            </ul>
                        </div>
                        <div class="card-footer">
                            <div class="info text-center">
                                <small>Calories : {{sommeClPd}} mg | Proteins : {{sommePrPd}} mg | Glucides
                                    :{{sommeGlPd}} mg</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="text-center">Déjeuner
                                <span class="ml-4">
                                    <i class="fa fa-clock-o"></i>
                                </span>
                            </h2>
                            <ul>
                                <li v-for="nut in nutrition_de" :key="nut.id">
                                    {{nut.name}} : {{nut.quantite}}<small> g/unité</small>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <div class="info text-center">
                                <small>Calories : {{sommeClDe}} mg | Proteins : {{sommePrDe}} mg | Glucides
                                    :{{sommeGlDe}} mg</small>
                                <!-- <small>Calories : {{calories_pd}} g | Proteins : {{proteins_pd}} g | Glucids : {{glucides_pd}} g</small> -->

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="text-center">Diner
                                <span class="ml-4">
                                    <i class="fa fa-clock-o"></i>
                                </span>
                            </h2>
                            <ul>
                                <li v-for="nut in nutrition_di" :key="nut.id">
                                    {{nut.name}} : {{nut.quantite}}<small> g/unité</small>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <div class="info text-center">
                                <small>Calories : {{sommeClDi}} mg | Proteins : {{sommePrDi}} mg | Glucides
                                    :{{sommeGlDi}} mg</small>
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
    data() {
        return{
            date:[],
            month:[],
            days:[],
            isCompleted:false,
            nutrition_pd:[],
            nutrition_de:[],
            nutrition_di:[],
            sommeClPd:0,
            sommePrPd:0,
            sommeGlPd:0,
            sommeClDe:0,
            sommePrDe:0,
            sommeGlDe:0,
            sommeClDi:0,
            sommePrDi:0,
            sommeGlDi:0,

        }

    },
    mounted() {
        if(localStorage.getItem('id') == null){
                window.location.href = '/';
            }
        this.manageDates();
        // this.somme_pd();
        // setTimeout( ()=> this.somme_pd(),5000);
    },
    methods: {
        manageDates(currentDate = new Date()){
        // let currentDate = new Date();
            this.days = [];
            this.date = [];
        var firstday = new Date(currentDate.setDate(currentDate.getDate() - currentDate.getDay() ));
        for(let i = 0 ; i < 7 ; i++){
            firstday.setDate(firstday.getDate() + 1 )
            this.days.push(
                firstday.getDate()
            )
            this.month.push(
                (firstday.getMonth() + 1)
            )
                this.date.push(
                    firstday.getFullYear()+"-"+(firstday.getMonth()+1)+"-"+firstday.getDate()
                )
        }
        },
        getNutrition_pd(date){
            axios.get("/api/get_nutrition_pd/"+localStorage.getItem('id')+"/"+date)
            .then(res=>{
                this.nutrition_pd=res.data;

                for (let i = 0; i < this.nutrition_pd.length; i++) {
                    this.sommeClPd=this.sommeClPd+this.nutrition_pd[i].sommeClPd;
                }
                for (let i = 0; i < this.nutrition_pd.length; i++) {
                    this.sommePrPd=this.sommePrPd+this.nutrition_pd[i].sommePrPd;
                }
                for (let i = 0; i < this.nutrition_pd.length; i++) {
                    this.sommeGlPd=this.sommeGlPd+this.nutrition_pd[i].sommeGlPd;
                }
            })
            .catch(err=>console.log('error: '+err))
        },
        getNutrition_de(date){
            axios.get("/api/get_nutrition_de/"+localStorage.getItem('id')+"/"+date)
            .then(res=>{
                this.nutrition_de=res.data;
                for (let i = 0; i < this.nutrition_de.length; i++) {
                    this.sommeClDe=this.sommeClDe+this.nutrition_de[i].sommeClDe;
                }
                for (let i = 0; i < this.nutrition_de.length; i++) {
                    this.sommePrDe=this.sommePrDe+this.nutrition_de[i].sommePrDe;
                }
                for (let i = 0; i < this.nutrition_de.length; i++) {
                    this.sommeGlDe=this.sommeGlDi+this.nutrition_de[i].sommeGlDe;
                }
            })
            .catch(err=>console.log('error: '+err))
        },
        getNutrition_di(date){
            axios.get("/api/get_nutrition_di/"+localStorage.getItem('id')+"/"+date)
            .then(res=>{
                this.nutrition_di=res.data;
                for (let i = 0; i < this.nutrition_di.length; i++) {
                    this.sommeClDi=this.sommeClDi+this.nutrition_di[i].sommeClDi;
                }
                for (let i = 0; i < this.nutrition_di.length; i++) {
                    this.sommePrDi=this.sommePrDi+this.nutrition_di[i].sommePrDi;
                }
                for (let i = 0; i < this.nutrition_di.length; i++) {
                    this.sommeGlDi=this.sommeGlDi+this.nutrition_di[i].sommeGlDi;
                }
            })
            .catch(err=>console.log('error: '+err))
        },
        getNutrition(date){
            const week = document.querySelectorAll('.week');
            week.forEach(day => {
            day.addEventListener('click', function () {
            week.forEach(e => {
                e.classList.remove('active')
            })
            day.classList.add('active')
                })
                });
            this.sommeClPd=0;
            this.sommePrPd=0;
            this.sommeGlPd=0;
            this.sommeClDe=0;
            this.sommePrDe=0;
            this.sommeGlDe=0;
            this.sommeClDi=0;
            this.sommePrDi=0;
            this.sommeGlDi=0;
            this.getNutrition_pd(date);
            this.getNutrition_de(date);
            this.getNutrition_di(date);
        }
    },
}
</script>
<style scoped>
.card{
    border-radius: 18px;
    box-shadow   : 4px 4px 25px rgba(0, 0, 0, 0.4);
    overflow     : hidden;
    cursor       : pointer;
    transition   : transform 0.4s;
}
.card:hover {
    transform : scale(1.05);
    box-shadow: 4px 4px 25px rgba(0, 0, 0, 0.2);
}
.card-footer{
    background-color: #03b43e;
}
.info{
    color:white;
    font-style: italic;
}
ul li{
    background-color: rgba(132, 187, 238, 0.986);
    padding: 5px 10px 5px 10px;
    margin-top: 10px;
    border-radius: 10px;
    color:white;
}
h2{
    margin-bottom: 20px;
    color:#03b43e;
    text-transform: uppercase;
    font-family: fantasy;
}
.calender{
    margin-left:0 auto 10px auto ;
    /* margin-bottom: 10px; */
    display: flex;
    flex-direction: column;
    height: 100px;
    font-weight: 600;
    /* background-color: #FFF;
    padding: 15px;
    border-radius: 10px; */
}
.bottom {
    cursor: pointer;
    flex: 5;
    background-color: rgb(255, 255, 255);
    align-items: center;
    display: flex;
    justify-content: space-around;
    font-size: 2rem;
}
.week{
    padding: 0 25px;
}
.top {
    flex: 3;
    color: #fff;
    background-color: #50d1dd;
    align-items: center;
    display: flex;
    justify-content: space-around;
    font-size: 1rem;
}
.active{
    color:#6CC51D
}

</style>
