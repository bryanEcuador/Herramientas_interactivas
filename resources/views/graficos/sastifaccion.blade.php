@extends('layouts.principal')
@section('css')
    <style>
        .grafico {
            position: relative;
            background: #ffffff;
            border-radius: 3px;
            padding: 20px;
            -webkit-box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
            box-shadow: 10px 20px 20px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 30px 10px -2px rgba(0, 0, 0, 0.2);
            margin-bottom: 30px;
            margin-right: 40px;
            margin-left: 40px;
            -webkit-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }
    </style>
@endsection
@section('content')
    <div style="margin-top: 70px; padding: 40px;" id="aplicacion">


         <div class="section-top-border" style="background-color: #E5E5E5"  >
             <div class="container">
                 <h1>Resultados encuesta sastifacción inicial</h1>
                 <div class="row">
                     <graficos formulario="7" pregunta="31"></graficos>
                     <graficos formulario="7" pregunta="32"></graficos>
                     <graficos formulario="7" pregunta="33"></graficos>
                     <graficos formulario="7" pregunta="34"></graficos>
                     <graficos formulario="7" pregunta="35"></graficos>
                     <graficos formulario="7" pregunta="36"></graficos>
                     <graficos formulario="7" pregunta="37"></graficos>
                 </div>
             </div>
         </div>

         <div class="section-top-border" style="background-color: #E5E5E5"  >
             <div class="container">
                 <h1>Resultados encuesta sastifacción final</h1>
                 <div class="row">
                     <graficos formulario="8" pregunta="38"></graficos>
                     <graficos formulario="8" pregunta="39"></graficos>
                     <graficos formulario="8" pregunta="40"></graficos>
                     <graficos formulario="8" pregunta="41"></graficos>
                     <graficos formulario="8" pregunta="42"></graficos>
                     <graficos formulario="8" pregunta="43"></graficos>
                     <graficos formulario="8" pregunta="44"></graficos>
                     <graficos formulario="8" pregunta="45"></graficos>
                 </div>
             </div>
         </div>


    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <!-- development version, includes helpful console warnings -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        Vue.component('graficos', {
            props: ['formulario','pregunta'],
            template: `<div class="grafico col-md-5" >
                 <h4>@{{titulo}}</h4>
                  <canvas :id=id width="400" height="400"></canvas>
              </div>`,
            data: function() {
                return {
                    titulo: '',
                    datos : [],
                    labels :[],
                    valores : [],
                    id : this.formulario+''+this.pregunta,
                    errores : 0

                }
            },
            created : function(){
                this.consultar();
            },
            methods: {
                consultar: function() {
                    let body = document.getElementsByName('body')
                    var that = this;
                    var url = '/resultados-grafico/'+this.formulario+'/'+this.pregunta;
                    axios.get(url)
                        .then(function (response) {
                            console.log(response);
                            that.graficar(response)
                        })
                        .catch(function (error) {
                            ++that.errores
                            if(that.errores <= 3)
                                that.consultar()
                        });
                },
                graficar: function (data) {
                    this.variables(data)
                    this.titulo = (data.data[2])
                    var ctx = document.getElementById(this.id).getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'polarArea',
                        data: {
                            labels: this.labels,
                            datasets: [{
                                data: this.valores,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(14, 112, 215, 0.2)',
                                    'rgba(74, 172, 90, 0.2)',
                                    'rgba(14, 102, 90, 0.2)'

                                ],
                                borderColor: [
                                    'rgba(255,99,132,1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(14, 112, 215, 1)',
                                    'rgba(74, 172, 90, 1)',
                                    'rgba(14, 102, 90, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {

                        }
                    });
                },

                variables: function(data){
                    if(data.data[1][0] != null ){
                        console.log(data.data[1][0])
                        this.valores.push(data.data[1][0])
                    }
                    if(data.data[1][1] != null ){
                        this.valores.push(data.data[1][1])
                    }
                    if(data.data[1][2] != null ){
                        this.valores.push(data.data[1][2])
                    }
                    if(data.data[1][3] != null ){
                        this.valores.push(data.data[1][3])
                    }
                    if(data.data[1][4] != null ){
                        this.valores.push(data.data[1][4])
                    }

                    if(data.data[0][0] != null ){
                        this.labels.push(data.data[0][0])
                    }
                    if(data.data[0][1] != null ){
                        this.labels.push(data.data[0][1])
                    }
                    if(data.data[0][2] != null ){
                        this.labels.push(data.data[0][2])
                    }
                    if(data.data[0][3] != null ){
                        this.labels.push(data.data[0][3])
                    }
                    if(data.data[0][4] != null ){
                        this.labels.push(data.data[0][4])
                    }
                }
            }
        });

        var app=new Vue({
            el: '#aplicacion'
        });
    </script>

@endsection