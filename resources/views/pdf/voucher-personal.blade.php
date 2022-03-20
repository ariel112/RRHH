<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/contrato.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Voucher de Planilla</title>

</head>
<body>
    <style>
        td{
            font-family: Arial;font-size:11;
            padding-left:15px;
        }

    </style>
    <div style="position:absolute; top:-15px;">
        <div style="align:center; margin-left:100px;">
            <img style="opacity: 0.5;" src="img/16.png" class="fondo" width="510px" height="110px" alt="">
        </div>
    </div>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="container">
            <table class="table" style="width: 110%;border: 1px solid black; position:absolute; left:53px; ">
                <thead style="background-color: #5C9EEC; border: 1px solid black;">
                  <tr>
                    <th style="font-family: Arial;font-size:11;" >DEDUCCIONES</th>
                    <th ></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td >Empleado: {{ $empleado->id }}</td>
                    <td>Teléfono: {{ $empleado->telefono_1 }}</td>
                  </tr>
                  <tr>
                    <td>Identidad: {{ $empleado->identidad }}</td>
                    <td>Correo: {{ $empleado->email_institucional }}</td>
                  </tr>
                  <tr>
                    <td> Nombre: {{ $empleado->nombre }}</td>
                    <td>Inicio: {{ $planilla->fecha_inicio }}</td>
                  </tr>
                  <tr>
                    <td>Gerencia: {{ $cargo->gerencia}}</td>
                    <td>Finalización: {{ $planilla->fecha_final}}</td>
                  </tr>
                  <tr>
                    <td>Puesto: {{ $cargo->cargo}}</td>
                    <td></td>
                  </tr>
                </tbody>
                <thead style="background-color: #5C9EEC; border: 1px solid black;">
                    <tr>
                      <th style="font-family: Arial;font-size:11;"  >DESCRIPCIÓN</th>
                      <th ></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                      <td>Salario:</td>
                      <td style="border-left: 1px solid black;">Lps. {{ $pago->catorcena }}</td>
                    </tr>
                    @foreach ($pagos_deducciones_fijas as $pagos_deducciones_fija)
                    <tr>
                        <td>{{ $pagos_deducciones_fija->nombre_deduccion }}:</td>
                        <td style="border-left: 1px solid black;">Lps. {{ $pagos_deducciones_fija->monto }}</td>
                    </tr>
                    @endforeach
                    @if ($pagos_deducciones_variables)
                        @foreach ($pagos_deducciones_variables as $pagos_deducciones_variable)
                            <tr>
                                <td>{{ $pagos_deducciones_variable->nombre_deduccion }}:</td>
                                <td style="border-left: 1px solid black;">Lps. {{ $pagos_deducciones_variable->monto }}</td>
                            </tr>
                        @endforeach
                    @endif
                    <tr>
                        <td>Otros:</td>
                        <td style="border-left: 1px solid black;">Lps. {{ $pago->llegadas_tarde_monto }}</td>
                    </tr>
                    <thead style="border: 1px solid black;">
                        <tr>
                            <th style="font-family: Arial;font-size:11; padding-left:15px;" >SUELDO NETO</th>
                            <th style="font-family: Arial;font-size:11; border-left: 1px solid black; padding-left:15px;"  >Lps. {{ $pago->sueldo_neto }}</th>
                        </tr>
                    </thead>
                  </tbody>
            </table>
            <div style="position:absolute; top:680px; padding:40px; margin: 0 auto">
                <div style="display: flex; justify-content: center; margin-left:40px">
                    <div style="text-align: center">
                        <p>_______________________________________</p>
                        <p style="text-align: center; font-size:11;font-family: Arial;">Departamento de Talento Humano</p>
                    </div>
                </div>
            </div>
        </div>
</body>
<script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</script>
</html>
