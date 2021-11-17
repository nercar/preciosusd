<?php
include("conex.php");
$su_usu = new AdminBD();
$su_usu->Conectar();

$activo = new area("","","","","");
$activo2 = new area_item("","","");
$activo3 = new status("","","");
$activo4 = new sucursal("","","");
$activo5 = new item("","","","","");
$activo6 = new sub_area("","");
error_reporting(E_ALL);
$paso=1;
?>
<!DOCTYPE html>  
<html>
<head>
    <title>Ciclo de Servicios | SAIG</title>
    <meta charset="utf-8" />  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>     
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>  
    <script type="text/javascript">  
        (function () {  
            'use strict';  
            window.addEventListener('load', function () {  
                var form = document.getElementById('form1');  
                form.addEventListener('submit', function (event) {  
                    if (form.checkValidity() === false) {  
                        event.preventDefault();  
                        event.stopPropagation();  
                    }  
                    form.classList.add('was-validated');  
                }, false);  
            }, false);  
        })();  
    </script>  
</head>  
<body>  
    <div class="container py-5">  
        <div class="row">  
            <div class="offset-md-2 col-md-8 offset-md-2">  
                <div class="card">  
                    <div class="card-header bg-primary text-white">  
                        <h4 class="card-title text-uppercase">Formulario SAIG</h4>
                    </div>
                    <div class="card-body">
                        <form id="form1" novalidate>
                            <div class="row">  
                                <div class="col-sm-8 col-md-8 col-xs-12">
                                    <label for="firstName">Sucursal:</label>
                                    <select class="custom-select" name="sucursal" id="sucursal" required>
                                    <option value="">Seleccione</option>
                                    <?php
                                      $resul4=$activo4->Consultar_Sucursal();
                                      if($resul4)
                                       {
                                        $con4=0;
                                        while($row4=mysqli_fetch_array($resul4))
                                         {
                                          $opq_id[$con4]=$row4[0];
                                          $opq_descripcion[$con4]=$row4[2];
                                    ?>
                                    <option value="<?php echo $opq_id[$con4]?>"><?php echo $opq_descripcion[$con4]?> </option>
                                    <?php
                                      $con4++;
                                         }
                                       }
                                    ?>
                                    </select>
                                    <div class="invalid-tooltip">Por favor seleccione la Sucursal.</div>
                                </div>
                                <div class="col-sm-4 col-md-4 col-xs-12">  
                                     <label for="Gender">Tipo de SAIG</label>
                                     <select class="custom-select" name="id_area" id="id_area" required>
                                         <option value="">Seleccione</option>
                                         <?php
                                           $resul6=$activo6->Consultar_Sub_Area($paso);
                                           if($resul6)
                                            {
                                             $con6=0;
                                             while($row6=mysqli_fetch_array($resul6))
                                              {
                                               $abc_id[$con6]=$row6[1];
                                               $abc_descripcion[$con6]=$row6[0];
                                         ?>
                                         <option value="<?php echo $abc_id[$con6]?>"><?php echo $abc_descripcion[$con6]?> </option>
                                         <?php
                                           $con6++;
                                              }
                                            }
                                         ?>
                                     </select>
                                     <div class="invalid-tooltip">Por favor seleccione el tipo de SAIG.</div>
                                </div>
                            </div>
                            <div class="row">  
                                <div class="col-sm-12 col-md-12 col-xs-12">  
                                    <div class="form-group">  
                                        <label>Profile Picture</label>  
                                        <div class="custom-file">  
                                            <input type="file" class="custom-file-input" id="validatedCustomFile" required>  
                                            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>  
                                            <div class="invalid-tooltip">Choose file for upload</div>  
                                        </div>  
                                    </div>  
                                </div>  
                            </div>  
                            <div class="row">  
                                <div class="col-sm-12 col-md-12 col-xs-12">  
                                    <label for="address">Observaciones</label>
                                    <textarea class="form-control" rows="3" id="address" aria-describedby="inputGroupPrepend" required></textarea>  
                                    <div class="invalid-tooltip">please enter address</div>  
                                </div>  
                            </div>  
                            <div class="row">  
                                <div class="col-sm-12 col-md-12 col-xs-12">  
                                   <div class="form-check">  
                                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>  
                                            <label class="form-check-label" for="invalidCheck">  
                                                Agree to terms and conditions  
                                            </label>  
                                            <div class="invalid-tooltip">  
                                                You must agree before submitting.  
                                            </div>  
                                        </div>  
                                </div>  
                            </div>  
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-xs-12">  
                                    <div class="float-right">  
                                        <button class="btn btn-danger rounded-0" type="submit">Cancel</button>  
                                        <button class="btn btn-primary rounded-0" type="submit">Register</button>  
                                    </div>  
                                </div>  
                            </div>  
                        </form>  
                    </div>  
                </div>  
            </div>  
        </div>  
    </div>  
</body>  
</html>