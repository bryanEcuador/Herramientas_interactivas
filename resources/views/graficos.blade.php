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
                <h1>Resultados test inicial de conocimiento</h1>
                <div class="row">

                    <graficos v-form="valor in form1" formulario="1" pregunta=@{{valor}}></graficos>
                   {{-- <graficos formulario="1" pregunta="2"></graficos>
                    <graficos formulario="1" pregunta="3"></graficos>
                    <graficos formulario="1" pregunta="4"></graficos>
                    <graficos formulario="1" pregunta="5"></graficos>
                    <graficos formulario="1" pregunta="6"></graficos>
                    <graficos formulario="1" pregunta="7"></graficos>
                    <graficos formulario="1" pregunta="8"></graficos>
                    <graficos formulario="1" pregunta="9"></graficos>
                    <graficos formulario="1" pregunta="10"></graficos>--}}
                </div>
            </div>
        </div>
{{--

        <div class="section-top-border" style="background-color: #E5E5E5"  >
            <div class="container">
                <h1>Resultados test medio de conocimiento</h1>
                <div class="row">
                    <graficos formulario="2" pregunta="11"></graficos>
                    <graficos formulario="2" pregunta="12"></graficos>
                    <graficos formulario="2" pregunta="13"></graficos>
                    <graficos formulario="2" pregunta="14"></graficos>
                    <graficos formulario="2" pregunta="15"></graficos>
                    <graficos formulario="2" pregunta="16"></graficos>
                    <graficos formulario="2" pregunta="17"></graficos>
                    <graficos formulario="2" pregunta="18"></graficos>
                    <graficos formulario="2" pregunta="19"></graficos>
                    <graficos formulario="2" pregunta="20"></graficos>
                </div>
            </div>
        </div>

        <div class="section-top-border" style="background-color: #E5E5E5"  >
            <div class="container">
                <h1>Resultados test final de conocimiento</h1>
                <div class="row">
                    <graficos formulario="3" pregunta="21"></graficos>
                    <graficos formulario="3" pregunta="22"></graficos>
                    <graficos formulario="3" pregunta="23"></graficos>
                    <graficos formulario="3" pregunta="24"></graficos>
                    <graficos formulario="3" pregunta="25"></graficos>
                    <graficos formulario="3" pregunta="26"></graficos>
                    <graficos formulario="3" pregunta="27"></graficos>
                    <graficos formulario="3" pregunta="28"></graficos>
                    <graficos formulario="3" pregunta="29"></graficos>
                    <graficos formulario="3" pregunta="30"></graficos>
                </div>
            </div>
        </div>
--}}


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
                    form1 : [1,2,3,4,5]

                }
            },
            created : function(){
              this.graficosDibujar()
              this.consultar();
            },
            methods: {

                graficosDibujar : function(){
                    var that = this;
                    var url = '/resultados-grafico/'+this.formulario+'/'+this.pregunta;
                    axios.get(url)
                        .then(function (response) {
                            console.log(response);

                        })
                        .catch(function (error) {

                        });
                },

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

                                ],
                                borderColor: [
                                    'rgba(255,99,132,1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(14, 112, 215, 1)',
                                    'rgba(74, 172, 90, 1)',
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
                }
            }
        });

        var app=new Vue({
            el: '#aplicacion'
        });
    </script>

@endsection