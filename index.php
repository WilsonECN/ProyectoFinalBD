<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
 <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>
<script src="js/jquery-2.1.4.js" type="text/javascript"></script>
<link href="assets/bootstrap/logincss/bootstrap.min.css" rel="stylesheet"/>    
<link href="assets/bootstrap/logincss/bootstrap-theme.css" rel="stylesheet"/>
<link href="css/normalize.css" rel="stylesheet">
<link href="css/estilos.css" rel="stylesheet">
<link href="css/paraiconos.css" rel="stylesheet" />
<link href="fonts/JandaManateeSolid.ttf" rel="stylesheet" />
<link rel="stylesheet" href="css/paraicono.css">
<link rel="stylesheet" href="alertaschidas/sweetalert.css"/>
<script src="alertaschidas/sweetalert-dev.js"></script>   

</head>
<style>
@font-face{
font-family:Fuentechida;
src:url(fonts/JandaManateeSolid.ttf);
}
    body{
        background-image: url(assets/img/principal22.jpg);
        background-size:cover;
        background-repeat: no-repeat;
        background-attachment:fixed;
    }
    .formulario{
        transition: 2s;
        margin-top: 90px;
        width: 30%;
        box-shadow: 0px 0px 10px rgba(213,213,213 ,1),0px 0px 10px rgba(556,556,556 ,550);
    }
/*COLORES DE FONDO ROSADO */
    .formulario:hover{
        transition: .8s;
        background-color: #81f7f3;
    }
.logo{
        height: 75px;
        margin-top: 40px;
    }
 .espaciado{
        margin-top: 40px;
    }
/*ARCO DE COLOR */
    fieldset{
        transition: 2s;
        margin-bottom: 50px;
        border-color: BLACK;
        border-style: groove;
        border-width: 3px;
        border-radius: 10px;
    }
   h3,h4{
        color:BLACK;
        text-align: center;
        font-family: fuentechida;
    }
    .Input{
        transition: .8s;
        background-color: rgba(0,0,0,.5);
        color: black;
        border-color:#006;
	border-bottom-color:white;
        border-bottom-style:groove;
	border-left:none;
	border-right:none;
	border-top:none;
        border-width: 1px;
        
    }
    .Input:hover{
        transition: .8s;
	background-color:rgba(55,71,79 ,.5);
	box-shadow:inset;
        border-bottom-color:green;
	}
    .Input:focus{
        transition: .8s;
	border-bottom-color:green;
    }
    @media screen and (max-width:750px) {
        .logo{
            height: 150px;
        }
        .formulario{
            transition: 2s;
            width: 95%;
            margin-top: 20px;
        }
    }
</style>

<body>
    <div class="container formulario">
         <div class="row">
               <div class="col-xs-4 col-xs-offset-4  ">
                <img src="assets/img/hoy.png" class="logo center-block">
                </div>
        </div>
         <div class=" espaciado">
                </div>
        <div class="row">
            <fieldset class="col-xs-10 col-xs-offset-1">
                <legend class="hidden-xs">
                    <h3>Inicio de Sesi&oacute;n</h3>
                </legend>
                <form action= "validar.php" method="post" >
                    <div class="form-group">
                    <label class="col-xs-12" for="usuario"><h4>Usuario</h4></label>
                 <div class="col-xs-10 col-xs-offset-1">
                    <input type="text" name="usuario" id="usuario" class="form-control Input">
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="col-xs-12" for="password"><h4>Contraseña</h4></label>
                 <div class="col-xs-10 col-xs-offset-1">
                    <input type="password" name="password" id="password" class="form-control col-xs-12 Input">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-danger center-block">Aceptar</button>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
</body>
</html>
