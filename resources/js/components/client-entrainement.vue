<template>
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-xl-12">
                                <!-- <h1 class="text-center" style="margin-bottom:15px" >Entrainements</h1> -->
                                <div class="card plan-list">
                                    <div class="card-body">
                                        <div class="calender">

                                            <div class="mb-2">
                                                <button @click="manageDates(new Date(Date.now() - 6.048e+8))"
                                                    class="btn" style="float:left"> <i class="fa fa-arrow-left"></i>
                                                </button>
                                                <button @click="manageDates(new Date(Date.now() + 6.048e+8))"
                                                    class="btn" style="float:right"> <i class="fa fa-arrow-right"></i>
                                                </button>
                                            </div>
                                            <div class="slider">
                                                <div class="top">
                                                    <div v-for="day,index in days" :key="day[index]" class="days">
                                                        {{day}}/0{{month[index]}}</div>
                                                </div>

                                                <div class="bottom">
                                                    <div class="week" @click="getEntrainement(date[0])">L</div>
                                                    <div class="week" @click="getEntrainement(date[1])">M</div>
                                                    <div class="week" @click="getEntrainement(date[2])">M</div>
                                                    <div class="week" @click="getEntrainement(date[3])">J</div>
                                                    <div class="week" @click="getEntrainement(date[4])">V</div>
                                                    <div class="week" @click="getEntrainement(date[5])">S</div>
                                                    <div class="week" @click="getEntrainement(date[6])">D</div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr width="50%">

                                        <table class="zigzag mx-auto">
                                            <thead>
                                                <tr>
                                                    <th>Séance</th>
                                                    <th>Exercice</th>
                                                    <th>Serie</th>
                                                    <th>Temps de repos</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="ent in entrainement" :key="ent.id">
                                                    <td>{{ent.cible}}</td>
                                                    <td>{{ent.name}}</td>
                                                    <td>{{ent.serie}}</td>
                                                    <td>{{ent.temps_repos}} min</td>
                                                </tr>
                                            </tbody>
                                        </table>



                                    </div>
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
    data() {
        return{
            isCompleted:false,
            entrainement:[],
            date:[],
            month:[],
            days:[],
        }

    },
    mounted() {
        if(localStorage.getItem('id') == null){
                window.location.href = '/';
            }
        this.manageDates();
    },
    methods: {
        getEntrainement(date){
            const week = document.querySelectorAll('.week');
            week.forEach(day => {
            day.addEventListener('click', function () {
            week.forEach(e => {
                e.classList.remove('active')
            })
            day.classList.add('active')
                })
                })
            axios.get('/api/get_entrainement/'+localStorage.getItem('id')+'/'+date)
            .then(res=>{
                this.entrainement=res.data;
            })
        },
        get(id){
            this.test = id;
            // console.log('salam')
        },
        getMonday(){
           var currentDate = new Date();
           var firstday = new Date(currentDate.setDate(currentDate.getDate() - currentDate.getDay()));

           return firstday.getDate() +1;
            // return firstday.getDate() +1;
        },
        manageDates(currentDate = new Date()) {
        // let currentDate = new Date();
            var firstday = new Date(currentDate.setDate(currentDate.getDate() - currentDate.getDay()));
            this.days = [];
            this.date = [];
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
    }
    },
}
</script>
<style scoped>
ul,li{
    list-style:circle !important;
    padding-left: 10px;
    margin-left: 10px;
}

h1 {
  color: black;
  font-family: fantasy;
  text-transform: uppercase;
  font-size: 2em;
  margin-bottom: 0;
}

table {
  /* font-family: sans-serif; */
}
table th,
table td {
  padding: 0.25em 0.5em;
  text-align: center;
}
table th:nth-child(1),
table td:nth-child(1) {
  text-align: left;
}
table td {
  background-color: #eee;
  color:black;
}
table th {
  background-color: #009;
  color: #fff;

}

.zigzag {
  border-collapse: separate;
  border-spacing: 0.25em 1em;
}
.zigzag tbody tr:nth-child(odd) {
  transform: rotate(2deg);
}
.zigzag thead tr,
.zigzag tbody tr:nth-child(even) {
  transform: rotate(-2deg);
}
.calender{
    margin-left:0 auto 10px auto ;
    /* margin-bottom: 10px; */
    display: flex;
    flex-direction: column;
    height: 100px;
    font-weight: 600;
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
