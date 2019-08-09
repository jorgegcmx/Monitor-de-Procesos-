<?php
include_once 'header.php';
//Nutry Facil
$url='http://localhost:8000/nutryfacil/1/12/2019';
$r = file_get_contents("".$url."");
$dato= json_decode($r,true);  
$fecha = array_column($dato,'Fecha');
$kilos = array_column($dato,'kilos');

//Pollo No 10
$urlpollo10='http://localhost:8000/pollo10/1/12/2019';
$rpollo = file_get_contents("".$urlpollo10."");
$datos= json_decode($rpollo,true);  
$fechapollo = array_column($datos,'Fecha');
$kilospollo = array_column($datos,'kilos');

//Pollo No 10
$urlpollo9='http://localhost:8000/pollo9/1/12/2019';
$rpollo9 = file_get_contents("".$urlpollo9."");
$datos9= json_decode($rpollo9,true);  
$fechapollo9 = array_column($datos9,'Fecha');
$kilospollo9 = array_column($datos9,'kilos');
?>
<?php
?>
<div id="myDiv"><!-- Plotly chart will be drawn inside this DIV --></div>

<div id="myDiv2"></div>
<script>
var listFecha = new Array(<?php echo json_encode($fecha); ?>);
var listKilos = new Array(<?php echo json_encode($kilos); ?>);

var listFechapollo = new Array(<?php echo json_encode($fechapollo); ?>);
var listKilospollo = new Array(<?php echo json_encode($kilospollo); ?>);

var listFechapollo9 = new Array(<?php echo json_encode($fechapollo9); ?>);
var listKilospollo9 = new Array(<?php echo json_encode($kilospollo9); ?>);

Plotly.d3.csv("https://raw.githubusercontent.com/plotly/datasets/master/finance-charts-apple.csv", function(err, rows){

function unpack(rows, key) {
return rows.map(function(row) { return row[key]; });
}
var trace1 = {
type: "scatter",
mode: "linea",
name: 'Nutry facil',
x: listFecha[0],
y: listKilos[0],
line: {color: '#FC4404'}
}
var trace2 = {
type: "scatter",
mode: "Pollo No. 10",
name: 'Pollo No. 10',
x: listFechapollo[0],
y: listKilospollo[0],
line: {color: '#17BECF'}
}
var trace3 = {
type: "scatter",
mode: "Pollo No. 9",
name: 'Pollo No. 9',
x: listFechapollo9[0],
y: listKilospollo9[0],
line: {color: '#3396FF'}
}

var data = [trace1,trace2,trace3];  
var layout = {
title: 'Ventas', 
};
Plotly.newPlot('myDiv', data, layout, {showSendToCloud: true});
})
</script>

<script>
const rand = () => Math.random();
var x = [1, 2, 3, 4, 5];
const new_data = (trace) => Object.assign(trace, {y: x.map(rand)});

// add random data to three line traces
var data = [
	{mode:'lines', line: {color: "#b55400"}},
	{mode: 'lines', line: {color: "#393e46"}},
	{mode: 'lines', line: {color: "#222831"}}
].map(new_data);

var layout = {
	title: 'User Zoom Resets
When uirevision Changes',
	uirevision:'true',
	xaxis: {autorange: true},
	yaxis: {autorange: true}
};

Plotly.react(graphDiv, data, layout);

var myPlot = document.getElementById('graphDiv');

var cnt = 0;
var interval = setInterval(function() {
	data = data.map(new_data);

	// user interation will mutate layout and set autorange to false
	// so we need to reset it to true
	layout.xaxis.autorange = true;
	layout.yaxis.autorange = true;

	// a new random number should ensure that uirevision will be different
	// and so the graph will autorange after the Plotly.react
	layout.uirevision = rand();

	Plotly.react(graphDiv, data, layout);
  if(cnt === 100) clearInterval(interval);
}, 2500);
</script>

  <!-- Plotly.js -->
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>
<body>
<!-- Plotly chart will be drawn inside this DIV -->

  <script>
var listFecha = new Array(<?php echo json_encode($fecha); ?>);
var listKilos = new Array(<?php echo json_encode($kilos); ?>);

var listFechapollo = new Array(<?php echo json_encode($fechapollo); ?>);
var listKilospollo = new Array(<?php echo json_encode($kilospollo); ?>);

var listFechapollo9 = new Array(<?php echo json_encode($fechapollo9); ?>);
var listKilospollo9 = new Array(<?php echo json_encode($kilospollo9); ?>);

var trace1 = {
  x: listFecha[0],
  y: listKilos[0],
  name: 'Nutry Facil',
  marker: {color: '#FC4404'},
  type: 'bar'
};

var trace2 = {
  x: listFechapollo[0],
  y: listKilospollo[0],
  name: 'No 10',
  marker: {color: '17BECF'},
  type: 'bar'
};

var trace3 = {
  x: listFechapollo9[0],
  y: listKilospollo9[0],
  name: 'No 9',
  marker: {color: '#3396FF'},
  type: 'bar'
};

var data = [trace1, trace2, trace3];

var layout = {
  title: 'US Export of Plastic Scrap',
  xaxis: {tickfont: {
      size: 14,
      color: 'rgb(107, 107, 107)'
    }},
  yaxis: {
    title: 'USD (millions)',
    titlefont: {
      size: 16,
      color: 'rgb(107, 107, 107)'
    },
    tickfont: {
      size: 14,
      color: 'rgb(107, 107, 107)'
    }
  },
  legend: {
    x: 0,
    y: 1.0,
    bgcolor: 'rgba(255, 255, 255, 0)',
    bordercolor: 'rgba(255, 255, 255, 0)'
  },
  barmode: 'group',
  bargap: 0.15,
  bargroupgap: 0.1
};

Plotly.newPlot('myDiv2', data, layout);
  </script>

</body>