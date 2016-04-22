<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>Graphique Vitesse</title>
    <link rel="stylesheet" type="text/css" href="chartist.min.css"/>
    <link rel="stylesheet" type="text/css" href="graph.css"/>
    <script src="jquery.js"></script>
    <script src="chartist.min.js"></script>
    <script src="selectionNotAllowed.js"></script>
    <meta http-equiv="refresh" content="2; URL=http://localhost/chartservice/graphVitesse.php?id_cycliste1=80&id_cycliste2=81&id_cycliste3=82&id_cycliste4=83">
</head>
<body>
  <h1>Vitesse</h1>
    <div class="ct-chart ct-perfect-fourth"></div>
</body>

<script type="text/javascript">
    function test() {

        var i_min=0;
        var i_max=0;

        <?php
          if (isset($_GET["id_cycliste1"])){
            $idC1 = $_GET["id_cycliste1"];?>
            i_min = <?php echo $idC1;?>
            i_max = <?php echo $idC1;?>
            <?php
          }

          if (isset($_GET["id_cycliste2"])){
            $idC2 = $_GET["id_cycliste2"];?>
            i_max = <?php echo $idC2;?>
            <?php
          }

          if (isset($_GET["id_cycliste3"])){
            $idC3 = $_GET["id_cycliste3"];?>
            i_max = <?php echo $idC3;?>
            <?php
          }

          if (isset($_GET["id_cycliste4"])){
            $idC4 = $_GET["id_cycliste4"];?>
            i_max = <?php echo $idC4;?>;
            <?php
          }
        ?>

        var c=0;
        var series = [];
          for (var i = i_min; i < i_max; ++i) {


            $.ajax({url: "test.php?id_cycliste="+i, success: function(result){
              var i=0;
              var ser = []

                  for (v of result){
                    // alert("test1 " + v);
                    //alert("Salope"+v);
                    ser[i] = v.y;
                    ++i;
                    // alert(1);
                  }
                  // alert(2)
                  series[c] = ser;
                  ++c;
                            }});
                        //alert ("Tu va te prendre une calotte"+series.toString());
                        // alert("test 2"+series.toString())

          //   $.ajax(("test.php?id_cycliste="+i), function (result) {
          //     var i=0;
          //     var ser = []
          //
          //     for (v of result){
          //       alert("Salope"+v);
          //       ser[i] = v.y;
          //       ++i;
          //       alert(1);
          //     }
          //     alert(2)
          //     series[c] = ser;
          //     ++c;
          //           })
          //           alert ("Tu va te prendre une calotte"+series.toString());
           }

          var options = {
// Don't draw the line chart points
showPoint: false,
// Disable line smoothing
lineSmooth: false,
// X-Axis specific configuration
axisX: {
  // We can disable the grid for this axis
  showGrid: false,
  // and also don't show the label
  showLabel: true
},
// Y-Axis specific configuration
axisY: {
  // Lets offset the chart a bit from the labels
  offset: 60,
  // The label interpolation function enables you to modify the values
  // used for the labels on each axis. Here we are converting the
  // values into million pound.
  labelInterpolationFnc: function(value) {
    return value + 'km/h';
  }
}
};


          // var data = {labels,series}
          var data = {
// A labels array that can contain any sort of values
labels : [0,2,4,6,8,10,12,14,16],
// Our series array that contains series objects or in this case series data arrays
series
};

  for (var i = i_min; i < i_max; ++i) {
    new Chartist.Line('.ct-chart', data, options);
  }
  }
        test();
</script>
</html>