<div>
    <div class="row">
       <div class="col-md-10 col-md-offset-1">
           <div class="panel panel-default">
               <div class="panel-body">
                   <canvas id="canvas" height="280" width="600"></canvas>
               </div>
           </div>
        </div>
     </div>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
    <script>
    var url = "{{ url('answers/' . $this->participantId . '/results') }}";
    var Dimensions = new Array();
    var Prices = new Array();
    $(document).ready(function(){
        $.get(url, function(response){
        console.log(response);
        response.forEach(function(data){
            Dimensions.push(data.dimension);
            Prices.push(data.max);
        });
        var ctx = document.getElementById("canvas").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels:Dimensions,
                    datasets: [{
                        label: 'Resultado',
                        data: Prices,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        });
    });
    </script>
</div>
