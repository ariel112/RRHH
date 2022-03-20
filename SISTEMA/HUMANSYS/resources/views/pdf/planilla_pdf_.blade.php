<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/contrato.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Formato final de planilla</title>

</head>
<body>
    <img src="img/66.png" width="110px" height="80px" alt="" style="top:-30px; position: absolute; margin-left:-15px;">
    <img src="img/6.jpg" width="110px" height="80px" alt="" style="top:-30px; position: absolute; margin-left:1150px;">

    <div style="position:absolute; top:-90px; padding:40px; margin: 0 auto">
        <div style="display: flex; justify-content: center; margin-left:355px">
            <div style="line-height=100%  text-align: center">
                <p style="text-align: center; font-size:9;float:left;font-family: Arial;"><b><br>PROGRAMA PRESIDENCIAL DE BECAS "HONDURAS 20/20" (PCM 013-2017)
                <br>PLANILLA DE SUELDOS
                <br>EMPLEADOS EN CONTRATO POR TIEMPO DEFINIDO
                <br>PERIODO DEL {{ $planilla->dia }} DE {{ $mes_inicia }} AL {{ $planilla->diaf }} DE  {{ $mes_finaliza }} DEL 2021
                <br>CUENTA ADMINISTRATIVA  CTA.00200008362498/ FICOHSA</b></p>
            </div>
        </div>
    </div>
<br>
<br><br>
        <table class="table" {{-- style="margin-left: auto;" --}} >
            <thead style="border: 1px solid black; font-size:7;">
              <tr >
                  @for ($i = 0; $i < count($data[0]); $i++)
                    <th style="border: 1px solid black; text-transform: capitalize; text-align:center;" scope="col">{{ $data[0][$i] }}</th>
                  @endfor
              </tr>
            </thead>
            <tbody >
                @php
                    $conteo = sizeof($data);
                @endphp
                @for ($k = 1; $k < $conteo; $k++)
                    @php
                        $columnas_empleado = sizeof($data[$k]);
                    @endphp
                    <tr>
                        @for ($s = 0; $s < $columnas_empleado; $s++)
                            <td style="border: 1px solid black; font-size:7; text-align:center;">{{ $data[$k][$s] }}</td>
                        @endfor
                    </tr>
                @endfor


            </tbody>
        </table>
        <h5 style="font-size:9;">TOTAL PLANILLA</h5>
        <hr>
        <ul>
            <li style="font-size:9;">TOTAL SUELDOS CATORCENALES: Lps. {{ $deducciones_totales->sueldos_catorcenales }}</li>
            <li style="font-size:9;">TOTAL DEDUCCIONES POR LLEGADAS TARDE: Lps. {{ $deducciones_totales->total_llegadas_tarde }}</li>
            <li style="font-size:9;"><b>TOTAL DEDUCCIONES: Lps. {{ $deducciones_totales->total_deducciones }}</b> </li>
            <li style="font-size:9;"><b>TOTAL A PAGAR: Lps. {{ $deducciones_totales->sueldos_netos }}</b></li>
        </ul>
          <br>
          <label for=""><b>NOTAS: </b></label>
          <ul >
              @foreach ($notas as $item)
                <li style="font-size:9;">{{ $item->descripcion }}</li>
              @endforeach
          </ul>
          <br><br><br>
          <div style="text-align: center">
            <p>_______________________________________</p>
            <p style="text-align: center; font-size:11;font-family: Arial;">{{ $gerente->nombre }} <br> COORDINADOR(A) TÉCNICO </p>
        </div>


</body>
<script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</script>
</html>

