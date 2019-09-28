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
                <div class="row justify-content-md-center">
                    <div class="grafico grafico col-md-8" >
                        <canvas id='grafico' width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <!-- development version, includes helpful console warnings -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>

        consultar();

        function consultar(){
            var that = this;
            var url = '/resultados-test-mejora';
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
        }

        function graficar(response) {
            this.titulo = 'Mejora en test'
            var ctx = document.getElementById('grafico').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'polarArea',
                data: {
                    labels: ['Mejoraron','No mejoraron'],
                    datasets: [{
                        data: [response.data[0], response.data[1]],
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
        }


    </script>

@endsection