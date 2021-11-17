<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>DatePicker Doble</title>

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/bootstrap.min.css">


<script>
$(function () {
    $('#date_range').daterangepicker({
        "locale": {
            "format": "DD-MM-YYYY",
            "separator": " - ",
            "applyLabel": "Guardar",
            "cancelLabel": "Cancelar",
            "fromLabel": "Desde",
            "toLabel": "Hasta",
            "customRangeLabel": "Personalizar",
            "daysOfWeek": [
                "Do",
                "Lu",
                "Ma",
                "Mi",
                "Ju",
                "Vi",
                "Sa"
            ],
            "monthNames": [
                "Enero",
                "Febrero",
                "Marzo",
                "Abril",
                "Mayo",
                "Junio",
                "Julio",
                "Agosto",
                "Setiembre",
                "Octubre",
                "Noviembre",
                "Diciembre"
            ],
            "firstDay": 1
        },
        "startDate": "01-07-2019",
        "endDate": "31-12-2019",
        "opens": "center"
    });
});
</script>


</head>
<body>

<!--<div class="card-footer">
 <label class="control-label col-sm-2 requiredField">Fecha: </label>
  <div class="input-group">
   <input class="form-control" type="text" id="date_range" name="date_range">
    <span class="input-group-append">
     <input name="consultar" type="submit" class="btn btn-primary btn-block" id="consultar" value="Consultar"/>
    </span>
  </div>
</div>-->

<div class="col-lg-3 col-md-4 col-xs-12">
  <div class="form-group">
    <label class="control-label col-sm-2 requiredField">Fecha: </label>
    <input class="form-control" type="text" id="date_range" name="date_range">
    <span class="input-group-append">
      <input name="consultar" type="submit" class="btn btn-primary btn-block" id="consultar" value="Consultar"/>
    </span>
  </div>
</div>

<div class="row">

  <div class="col-lg-4">
    <label class="control-label col-sm-2 requiredField">Fecha: </label>
    <input type="text" class="form-control">
    <span class="input-group-append">
      <input name="consultar" type="submit" class="btn btn-primary btn-block" id="consultar" value="Consultar"/>
    </span>
  </div>

  <div class="col-md-3">
    <label class="control-label col-sm-2 requiredField">Fecha: </label>
    <input type="text" class="form-control">
    <input name="consultar" type="submit" class="btn btn-primary btn-block" id="consultar" value="Consultar"/>
  </div>

  <div class="col-xs-5">
    <label class="control-label col-sm-2 requiredField">Fecha: </label>
    <input type="text" class="form-control">
    <input name="consultar" type="submit" class="btn btn-primary btn-block" id="consultar" value="Consultar"/>
  </div>

</div>
</body>
</html>