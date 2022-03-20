<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" type="text/css" href="css/contrato.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@300;900&display=swap" rel="stylesheet">
    <title>PERMISO</title>
        <style>
           /*  #voucher{

                background-image: url(img/30.png);
                background-repeat: no-repeat;
                background-position: center;

            }
 */
        body{
            font-family: 'Noto Sans TC', sans-serif;
        }
        </style>

        <div id="voucher">

            <div style="position:absolute; top:30px;">
                <div style="align:center; margin-left:-15px;">
                    <img  src="img/12.png" class="fondo" width="730px" height="3px" alt="">
                </div>
            </div>

            <div style="position:absolute; top:60px;">
                <div style="align:center; margin-left:165px;">
                    <img  src="img/16.png" class="fondo" width="370px" height="90px" alt="">
                </div>
            </div>
            <p style="margin-left:240px; font-size:12; position:absolute; top:150px;" ><strong>PERMISO DE SALIDA PERSONAL</strong></p>
            <div style="position:absolute; top:520px;">
                <div style="align:center; margin-left:-15px;">
                    <img  src="img/12.png" class="fondo" width="730px" height="1px" alt="">
                </div>
            </div>

            <br><br><br><br><br>
            <div class="container">
                <img src="img/30.png" style="position:absolute; margin-left: -160px; top:-120px; " height="570px"  width="850px" alt="">
                <br>



                {{-- -------------------------NOMBRE------------------------------------------------ --}}
                <p style="margin-left:-60px; font-size:9; position:absolute;top:67px;" >NOMBRE DEL SOLICITANTE:</p>
                <p style="margin-left:250px; font-size:9; position:absolute; top:67px;" >{{ $empleado->nombre }}</p>
                <div style="margin-left:105px; border-bottom: 1px solid rgb(0, 0, 0); width:31rem; position:absolute; top:84px;"></div>
                {{-- -------------------------/NOMBRE------------------------------------------------ --}}

                {{-- -------------------------DEPARTAMENTO------------------------------------------------ --}}
                <p style="margin-left:-60px; font-size:9; position:absolute; top:90px;" >DEPARTAMENTO AL QUE PERTENECE:</p>
                <p style="margin-left:300px; font-size:9; position:absolute; top:90px;" >{{ $gerencia->nombre }}</p>
                <div style="margin-left:170px; border-bottom: 1px solid rgb(0, 0, 0); width:27rem; position:absolute; top:106px;"></div>
                {{-- -------------------------/DEPARTAMENTO------------------------------------------------ --}}

                {{-- -------------------------MOTIVO------------------------------------------------ --}}
                <p style="margin-left:-60px; font-size:9; position:absolute; top:116px;" >MOTIVO:</p>
                <p style="margin-left:20px; font-size:9; position:absolute; top:116px;" >{{ $permiso->motivo }}</p>
                <div style="margin-left:-8px; border-bottom: 1px solid rgb(0, 0, 0); width:38.1rem; position:absolute; top:133px;"></div>
                <div style="margin-left:-60px; border-bottom: 1px solid rgb(0, 0, 0); width:41.4rem; position:absolute; top:153px;"></div>
                {{-- -------------------------/MOTIVO------------------------------------------------ --}}

                {{-- -------------------------LUGAR Y FECHA------------------------------------------------ --}}
                <p style="margin-left:-60px; font-size:9; position:absolute;top:168px;" >LUGAR Y FECHA:</p>
                <p style="margin-left:80px; font-size:9; position:absolute; top:168px;" >TEGUCIGALPA M.D.C.  @if ($permiso->dias == 1 ) {{ $permiso->fecha_inicio }} @else  {{ $permiso->fecha_inicio }} AL {{ $permiso->fecha_final }} @endif</p>
                <div style="margin-left:40px; border-bottom: 1px solid rgb(0, 0, 0); width:35.4rem; position:absolute; top:184px;"></div>
                {{-- -------------------------/LUGAR Y FECHA------------------------------------------------ --}}

                {{-- -------------------------HORAS Y DIAS------------------------------------------------ --}}

                    {{-- -------------------------HORA SALIDA------------------------------------------------ --}}
                    <p style="margin-left:-60px; font-size:9; position:absolute;top:204px;" >HORA DE SALIDA:</p>
                    <p style="margin-left:100px; font-size:9; position:absolute; top:204px;" > @if ($permiso->dias > 1)- - @else {{ $permiso->hora_inicio }} @endif </p>
                    <div style="margin-left:47px; border-bottom: 1px solid rgb(0, 0, 0); width:8rem; position:absolute; top:220px;"></div>
                    {{-- -------------------------/HORA SALIDA------------------------------------------------ --}}

                    {{-- -------------------------HORAS ENTRADA------------------------------------------------ --}}
                    <p style="margin-left:-60px; font-size:9; position:absolute;top:231px;" >HORA DE ENTRADA:</p>
                    <p style="margin-left:100px; font-size:9; position:absolute; top:231px;" > @if ($permiso->dias > 1)- - @else {{ $permiso->hora_final }} @endif</p>
                    <div style="margin-left:60px; border-bottom: 1px solid rgb(0, 0, 0); width:7.3rem; position:absolute; top:248px;"></div>
                    {{-- -------------------------/HORAS ENTRADA------------------------------------------------ --}}

                    {{-- -------------------------DIAS------------------------------------------------ --}}
                    <p style="margin-left:-60px; font-size:9; position:absolute;top:258px;" >DIA(s):</p>
                    <p style="margin-left:115px; font-size:9; position:absolute; top:258px;" > @if ($permiso->dias == 1) - - @else {{ $permiso->dias }} @endif</p>
                    <div style="margin-left:60px; border-bottom: 1px solid rgb(0, 0, 0); width:7.3rem; position:absolute; top:275px;"></div>
                    {{-- -------------------------/DIAS------------------------------------------------ --}}

                {{-- -------------------------/HORAS Y DIAS------------------------------------------------ --}}

                {{-- -------------------------GOCE Y A CUENTA------------------------------------------------ --}}
                    {{-- -------------------------CON GOCE Y A CUENTAS DE VACACIONES------------------------------------------------ --}}
                    <p style="margin-left:190px; font-size:9; position:absolute;top:204px;" >CON GOCE DE SUELDO:</p>
                    <div style="margin-left:335px; border: 1px solid rgb(0, 0, 0); border-radius: 5px; width: 30px;height: 20px;opacity:0.8; position:absolute; top:203px;" class="casilla">@if ($goce->tipo_gose_sueldo_id == 1 && $permiso->idTipoPermiso != 7 && $permiso->idTipoPermiso != 5)<img src="img/ch2.png" style="margin-left:5px; color:#0A4A97;" height="20px"  width="20px" alt="">@endif </div>

                    <p style="margin-left:370px; font-size:9; position:absolute;top:204px;" >A CUENTA DE VACACIONES:</p>
                    <div style="margin-left:575px; border: 1px solid rgb(0, 0, 0); border-radius: 5px; width: 30px;height: 20px;opacity:0.8; position:absolute; top:203px;" class="casilla">@if ($permiso->idTipoPermiso == 7)<img src="img/ch2.png" style="margin-left:5px; color:#0A4A97;" height="20px"  width="20px" alt="">@endif</div>
                    {{-- -------------------------/CON GOCE Y A CUENTAS DE VACACIONES------------------------------------------------ --}}


                    {{-- -------------------------SIN GOCE Y OTROS------------------------------------------------ --}}
                    <p style="margin-left:190px; font-size:9; position:absolute;top:235px;" >SIN GOCE DE SUELDO:</p>
                    <div style="margin-left:335px; border: 1px solid rgb(0, 0, 0); border-radius: 5px; width: 30px;height: 20px;opacity:0.8; position:absolute; top:234px;" class="casilla">@if ($goce->tipo_gose_sueldo_id == 2)<img src="img/ch2.png" style="margin-left:5px; color:#0A4A97;" height="20px"  width="20px" alt="">@endif</div>

                    <p style="margin-left:377px; font-size:9; position:absolute;top:235px;" >OTROS:</p>
                    <div style="margin-left:575px; border: 1px solid rgb(0, 0, 0); border-radius: 5px; width: 30px;height: 20px;opacity:0.8; position:absolute; top:234px;" class="casilla">@if ($permiso->idTipoPermiso == 5)<img src="img/ch2.png" style="margin-left:5px; color:#0A4A97;" height="20px"  width="20px" alt="">@endif</div>
                    {{-- -------------------------/SIN GOCE Y OTROS------------------------------------------------ --}}
                {{-- -------------------------/GOCE Y A CUENTA------------------------------------------------ --}}


            </div>
                {{-- -------------------------FRIMAS FOOTER------------------------------------------------ --}}

                    {{-- -------------------------SOLICITANTE------------------------------------------------ --}}
                    <div style="margin-left:18px; border-bottom: 1px solid rgb(0, 0, 0); width:9rem; position:absolute; top:465px;"></div>
                    <p style="margin-left:35px; font-size:7; position:absolute; top:465px;" >FIRMA DE SOLICITANTE</p>
                    {{-- -------------------------/SOLICITANTE------------------------------------------------ --}}

                    {{-- -------------------------JEFE INMEDIATO------------------------------------------------ --}}
                    <div style="margin-left:235px; border-bottom: 1px solid rgb(0, 0, 0); width:9rem; position:absolute; top:465px;"></div>
                    <p style="margin-left:241px; font-size:7; position:absolute; top:465px;" >FIRMA DE JEFE/A INMEDIATO</p>
                    {{-- -------------------------/JEFE INMEDIATO------------------------------------------------ --}}

                    {{-- -------------------------GERENTE TALENTO HUMANO------------------------------------------------ --}}
                    <div style="margin-left:448px; border-bottom: 1px solid rgb(0, 0, 0); width:15rem; position:absolute; top:465px;"></div>
                    <p style="margin-left:452px; font-size:7; position:absolute; top:465px;" >AUTORIZADO POR GERENCIA DE TALENTO HUMANO</p>
                    {{-- -------------------------/GERENTE TALENTO HUMANO------------------------------------------------ --}}

                {{-- -------------------------/FRIMAS FOOTER------------------------------------------------ --}}
        </div>
</body>
<script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</script>
</html>
