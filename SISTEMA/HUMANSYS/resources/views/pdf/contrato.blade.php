<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/contrato.css">
    <title>Contrato</title>

</head>
<body >{{-- Contrato de {{ $contrato->nombre }} --}}
    {{-- <div style="position:absolute; top:-45px; right:-50px;"> --}}

    {{-- <div style="height: -30px;
                background: #203D7A ;
                position: absolute;
                before {
                        position: absolute;
                        top: -65px; right: -50px;
                        border-top: 40px solid #203D7A ;
                        border-left: 35px solid #203D7A ;
                        width: 270;
                }"></div>
    <div style="height: -40px;
                background: #203D7A ;
                position: absolute;
                transform: rotate(-90deg);
                before {
                    position: absolute;
                    top: -65px; left: 180px;
                    border-top: 40px solid #203D7A ;
                    border-left: 35px solid #203D7A ;
                    width: 800;
                }"></div>
    <div style="height: -40px;
                background: #203D7A ;
                position: absolute;
                transform: rotate(90deg);
                    before {
                        position: absolute;
                        top: 1300px; left: -615px;
                        border-top: 40px solid #203D7A ;
                        border-left: 35px solid #203D7A ;
                        width: 800;
                    }"></div> --}}

        <div>
            <img src="img/13.png" style="width:400px; height:20px; margin-left:348px; margin-top:-45px;"  alt="">
            <img src="img/13.png" style="width:400px; height:20px; margin-left:530px; margin-top:-45px; transform: rotate(-90deg);"  alt="">
        </div>



<div class="container" >
        {{-- -------------------PRIMER PAGINA-----------------------------------
        --------------------------------------------------------------------------
        ---------------------------------------------------------------------------}}

        <div style="position:absolute; top:40px;">
            <div style="float:left; margin-left:100px;">
                <img src="img/4.jpg" class="fondo" width="205px" height="75px" alt="">
            </div>

            <div style="float:left; margin-left:155px;">
                <img src="img/6.jpg" style="align-content: center" class="fondo" width="130px" height="65px" alt="">
            </div>
        </div>

        <div style="position:absolute; top:60px; padding:50px;">
            <h5 style="text-align: center;font-family: Arial;font-size:12;"><u>CONTRATO INDIVIDUAL DE TRABAJO POR TIEMPO DEFINIDO</u></h5>
            <h5 style="text-align: center; font-family: Arial;font-size:12;">{{$contrato->num_delegacion}}</h5>

            <p style="text-align: justify; font-family: Arial;font-size:12;">Nosotros, <b>HAZEL ALEJANDRA ESCOBAR RAMIREZ</b> mayor de edad, hondureña, casada, Licenciada en Administración de Empresas, con identidad número 0801-1982-10044, Registro Tributario Nacional número 08011982100440 y de este domicilio, quien actúa en su condición de Coordinador Técnico del Programa Presidencial de Becas “Honduras 20/20” creado mediante Decreto Ejecutivo Numero PCM-013-2017, facultades que acredito mediante Acuerdo de Delegación No. GL-PPBH-001/2021 de fecha 4 de enero del presente año, quien en lo sucesivo se denominará <b>“EL CONTRATANTE” {{ $contrato->nombre }}</b> , hondureño, mayor de edad, {{ $contrato->estado_civil }}, {{ $contrato->profesion }} con tarjeta de identidad No. {{ $contrato->identidad }} y de este domicilio, y en los sucesivo se le denominará “EL TRABAJADOR”, hemos convenido celebrar el presente <b>CONTRATO INDIVIDUAL DE TRABAJO POR TIEMPO DEFINIDO</b> el cual se regirá por las cláusulas y condiciones siguientes:</p>

            <p style="text-align: justify; font-family: Arial;font-size:12;"><b><u>PRIMERO: DE LA EXCLUSIVIDAD</u>. EL TRABAJADOR</b> manifiesta: que en este acto y por medio del presente contrato, <b>SE OBLIGA</b> a prestar sus servicios a favor del <b>CONTRATANTE</b>, comprometiendo su esfuerzo y capacidad de trabajo, en forma exclusiva, bajo la subordinación y dependencia de la <b>GERENCIA DE SEGUIMIENTO Y LOS DEMAS ADMINISTRADORES Y REPRESENTANTES QUE DESIGNE EL CONTRATANTE</b>, desempeñándose en el puesto de: <b>{{$cargos->nombre}}</b>, quien llevara a cabo las siguientes funciones:@php $count = 0;@endphp @foreach ($funciones as $funcion) <b>{{ $count += 1}})</b> {{ $funcion->nombre }}@endforeach. Otras actividades que se deriven de la naturaleza de su puesto de trabajo y/o de las actividades generales que realice el Programa Presidencial de Becas Honduras 20/20.</p>
            <p style="text-align: justify; font-family: Arial;font-size:12;"><b><u>SEGUNDO: PERIODO DE PRUEBA</u>. EL TRABAJADOR</b> queda sujeto a un periodo de prueba de sesenta días (60) el cual tiene por objeto apreciar por parte del CONTRATANTE las aptitudes y capacidades de <b>EL TRABAJADOR</b> y por parte de este último, si le convienen o no las condiciones de trabajo que ofrece <b>EL CONTRATANTE.</b> El periodo de prueba será remunerado.</p>
        </div>

        <div style="position:absolute; top:880px;">
            <div>
                <img src="img/12.png" width="700px" height="2px" alt="">
            </div>

            <div style="float:left; line-height=150%">
                <p style="text-align: left; font-size:11;float:left;font-size:11;font-family: Arial;"><br>becashonduras2020.gob.hn<br>info@becashonduras2020.gob.hn</p>
            </div>
            <div style="float:right; line-height=150%">
                <p style="text-align: center; font-size:11;float:left;font-size:11; font-family: Arial;">Edificio Torre Altamira contiguo a Punto Farma,<br>Anillo periférico 1.2 km del puente a desnivel,<br> Teléfonos: 2221-7035/2221-7030/2221-8031.</p>
            </div>
        </div>
        {{-- -------------------SEGUNDA PAGINA-----------------------------------
        --------------------------------------------------------------------------
        ---------------------------------------------------------------------------}}
        <H1 style="PAGE-BREAK-AFTER: always"></H1>
        <div style="position:absolute; top:10px;">
            <div style="float:left; margin-left:100px;">
                <img src="img/4.jpg" class="fondo" width="205px" height="75px" alt="">
            </div>

            <div style="float:left; margin-left:95px;">
                <img src="img/6.jpg" style="align-content: center" class="fondo" width="130px" height="65px" alt="">
            </div>
        </div>

        <div style="position:absolute; top:80px; padding:50px;">
            <p style="text-align: justify; font-family: Arial;font-size:11;"><b><u>TERCERO: VIGENCIA DEL CONTRATO.</u></b> El presente contrato Individual de Trabajo será por tiempo definido, con vigencia del 06 de Abril del año 2021 hasta el 30 de Junio del año 2021.</p>
            <p style="text-align: justify; font-family: Arial;font-size:11;"><b><u>CUARTO: LUGAR DE TRABAJO.</u>EL TRABAJADOR</b> , desempeñara las funciones y actividades en la Ciudad de Tegucigalpa M.D.C., o cualquiera de las oficinas del <b>PROGRAMA PRESIDENCIAL DE BECAS HONDURAS 20/20</b> a nivel nacional, cuando así lo requiera la naturaleza de las actividades a prestar de parte de <b>EL TRABAJADOR.</b></p>
            <p style="text-align: justify; font-family: Arial;font-size:11;"><b><u>QUNTO: JORNADA-HORARIO DE TRABAJO.</u></b> La jornada de trabajo que prestará <b>EL TRABAJADOR</b>, será de lunes a jueves de 8:00 AM a 5:00 PM y los viernes de 8:00 AM a 12:00 AM, <b>EL CONTRATANTE</b> se reserva el derecho de poder cambiar este horario durante la vigencia del presente contrato siempre apegado a la jornada ordinaria ya establecida en el Código de Trabajo de Honduras. Las horas que desempeñe <b>EL TRABAJADOR</b> fuera de esta jornada de trabajo ordinaria, se consideraran horas extras siempre y cuando sean requeridas por su jefe inmediato y aprobadas por la Gerencia de Talento Humano para su pago. </p>
            <p style="text-align: justify; font-family: Arial;font-size:11;"><b><u>SEXTO: DIA DE VACACIONES</u>. EL TRABAJADOR</b> gozará de un día de vacaciones remuneradas por cada mes de trabajo, la solicitud de vacaciones <b>EL TRABAJADOR</b> deberá realizarla ante su jefe inmediato con 5 días de anticipación, una vez aprobado por su jefe inmediato será remitido a la Gerencia de Talento Humano para su debido control.  </p>
            <p style="text-align: justify; font-family: Arial;font-size:11;">Por cada cinco (5) días de trabajo comprendidos de lunes a viernes, habrá dos (2) días de descanso, si por necesidades urgentes del <b>CONTRATANTE</b> se trabaja en días de descanso o días feriados, <b>EL TRABAJADOR</b> requerido conservara su derecho y se le será concedido cuando este lo solicite por escrito a la Gerencia de Talento Humano previo autorización de su jefe inmediato. </p>
            <p style="text-align: justify; font-family: Arial;font-size:11;"><b><u>SEPTIMO: CONFIDENCIALIDAD DE LA INFORMACIÓN.</u></b> Se compromete a mantener absoluta confidencialidad y abstenerse de comunicar a terceros, directa o indirectamente, cualquier información o conocimiento de carácter financiero, técnico, contable, comercial, gerencial, administrativo o de cualquier otra naturaleza, tales como sistemas de Internet, alianzas estratégicas y demás convenios con terceros que <b>EL TRABAJADOR</b> pueda obtener o conocer durante y con ocasión de la prestación de sus servicios con <b>EL CONTRATANTE.</b> Asimismo, en la fecha de terminación de sus servicios, <b>EL TRABAJADOR</b> deberá devolver <b>AL CONTRATANTE</b>, todos los documentos, manuales, libros, correspondencia, publicaciones, herramientas y demás activos y literatura que éste pueda haber obtenido, conocido, preparado o utilizado en su trabajo mientras prestaba sus servicios para <b>EL CONTRATANTE.</b></p>
        </div>

        <div style="position:absolute; top:880px;">
            <div>
                <img src="img/12.png" width="700px" height="2px" alt="">
            </div>
            <div style="float:left; line-height=150%">
                <p style="text-align: left; font-size:11;float:left;font-size:11;font-family: Arial;"><br>becashonduras2020.gob.hn<br>info@becashonduras2020.gob.hn</p>
            </div>
            <div style="float:right; line-height=150%">
                <p style="text-align: center; font-size:11;float:left;font-size:11; font-family: Arial;">Edificio Torre Altamira contiguo a Punto Farma,<br>Anillo periférico 1.2 km del puente a desnivel,<br> Teléfonos: 2221-7035/2221-7030/2221-8031.</p>
            </div>
        </div>
        <H1 style="PAGE-BREAK-AFTER: always"></H1>
        {{-- ------------------TERCERA PAGINA-----------------------------------
        --------------------------------------------------------------------------
        ---------------------------------------------------------------------------}}
        <div style="position:absolute; top:10px;">
            <div style="float:left; margin-left:100px;">
                <img src="img/4.jpg" class="fondo" width="205px" height="75px" alt="">
            </div>

            <div style="float:left; margin-left:95px;">
                <img src="img/6.jpg" style="align-content: center" class="fondo" width="130px" height="65px" alt="">
            </div>
        </div>
        <div style="position:absolute; top:80px; padding:50px;">
            <p style="text-align: justify; font-family: Arial;font-size:11;"><b><u>OCTAVO: INSTRUMENTOS, ÚTILES Y/O MATERIAL DE TRABAJO</u></b>. EL TRABAJADOR se obliga a cuidar con el mayor esmero y eficacia, los instrumentos, útiles y material que <b>EL CONTRATANTE</b> le proporcione para realizar su trabajo, por lo tanto se responsabiliza ante <b>EL CONTRATANTE</b> del buen cuidado del inventario de   instrumentos, útiles y/o materiales, quedando entendido que <b>EL TRABAJADOR</b> acepta que dicha responsabilidad alcanza hasta la fecha que le corresponda el cuidado de los mismos y en el caso de que falte, se pierda, dañe o deteriore cualquier instrumento, útil y/o material, documentación o información de trabajo, que esté bajo su responsabilidad, desde esta fecha reconoce su valor como aquél que aparezca en el inventario que mantenga <b>EL CONTRATANTE</b>, y autoriza a que <b>EL CONTRATANTE</b> le deduzca de sus salarios, comisiones, bonificaciones, gratificaciones, prestaciones y/o de cualquier otra forma de remuneración que se le adeude, el  valor  de  dichos  instrumentos,  útiles y/o materiales, documentación o información  que  haya  perdido, extraviado, dañado y/o deteriorado, salvo que se trate del desgaste normal por el uso de los mismos.-</p>
            <p style="text-align: justify; font-family: Arial;font-size:11;"><b><u>NOVENO: REMUNERACIÓN.</u> EL CONTRATANTE</b> manifiesta que <b>EL TRABAJADOR</b> devengará un salario mensual, de <b>VEINTICINCO MIL LEMPIRAS EXACTOS (L. {{ $contrato->sueldo }})</b>, cuyo pago será divido y cancelado cada dos semanas o catorcenal. La fecha de pago se adelantará al día hábil inmediato, si el establecido no lo fuere. <b>EL TRABAJADOR</b> recibirá del <b>CONTRATANTE</b> una bonificación que se otorgará una vez al año el equivalente a una vez el salario ordinario mensual que devengue, quedando sujeto el pago del mismo a la disponibilidad financiera y presupuestaria del <b>CONTRATANTE</b>, el personal deberá haber laborado al menos noventa días.</p>
            <p style="text-align: justify; font-family: Arial;font-size:11;"><b><u>DECIMO: RESCISIÓN:</u></b> Se podrá rescindir el presente contrato sin responsabilidad para el <b>PROGRAMA PRESIDENCIAL DE BECAS HONDURAS 20/20</b> por las causas siguientes: <b>a)</b> Por acuerdo entre las partes; <b>b)</b> Por muerte de <b>“EL TRABAJADOR”</b>; <b>c)</b> Por comprobarse plenamente la incapacidad, negligencia, ineficiencia, o cualquiera actitud negativa que pueda poner en precario la prestación del servicio; <b>d)</b> Por fuerza mayor o caso fortuito que impidan el cumplimiento de las condiciones pactadas; <b>e)</b> Cuando el titular del “PROGRAMA PRESIDENCIAL DE BECAS HONDURAS 20/20” pierda la confianza en “EL TRABAJADOR” en la prestación de sus servicios profesionales; <b>f)</b> Por todo daño material causado dolosamente a los edificios, obras, mobiliario o equipo, vehículos, instrumentos y demás objetos relacionados para prestar sus servicios profesionales y toda grave negligencia que ponga en peligro la seguridad de las personas o de las cosas; <b>g)</b> Todo acto inmoral o delictuoso que “EL TRABAJADOR” cometa en el establecimiento o lugar donde presta sus servicios profesionales cuando sea debidamente comprobado ante la autoridad competente; <b>h)</b> Revelar o dar a conocer asuntos de carácter reservado en perjuicio del “PROGRAMA PRESIDENCIAL DE BECAS HONDURAS 20/20”; <b>i)</b> Por incumplimiento de las cláusulas del presente contrato; y <b>j)</b> Por tres llamadas de atención por escrito de su superior inmediato; <b>k)</b> por las causas reguladas por la legislación aplicable;</p>
        </div>

        <div style="position:absolute; top:880px;">
            <div>
                <img src="img/12.png" width="700px" height="2px" alt="">
            </div>
            <div style="float:left; line-height=150%">
                <p style="text-align: left; font-size:11;float:left;font-size:11;font-family: Arial;"><br>becashonduras2020.gob.hn<br>info@becashonduras2020.gob.hn</p>
            </div>
            <div style="float:right; line-height=150%">
                <p style="text-align: center; font-size:11;float:left;font-size:11; font-family: Arial;">Edificio Torre Altamira contiguo a Punto Farma,<br>Anillo periférico 1.2 km del puente a desnivel,<br> Teléfonos: 2221-7035/2221-7030/2221-8031.</p>
            </div>
        </div>
        <H1 style="PAGE-BREAK-AFTER: always"></H1>
        {{-- -------------------CUARTA PAGINA-----------------------------------
        --------------------------------------------------------------------------
        ---------------------------------------------------------------------------}}
        <div style="position:absolute; top:10px;">
            <div style="float:left; margin-left:100px;">
                <img src="img/4.jpg" class="fondo" width="205px" height="75px" alt="">
            </div>

            <div style="float:left; margin-left:95px;">
                <img src="img/6.jpg" style="align-content: center" class="fondo" width="130px" height="65px" alt="">
            </div>
        </div>
        <div style="position:absolute; top:80px; padding:50px;">
            <p style="text-align: justify; font-family: Arial;font-size:11;"><b><u>DECIMO-PRIMERO: OTROS DOCUMENTOS DEL CONTRATO DE TRABAJO.</u></b> Forman parte de este Contrato Individual de Trabajo, las adendas que firmen las Partes en su relación de trabajo; El Reglamento Interno de Trabajo de <b>EDUCREDITO</b>; planes de trabajo, tablas o reglamentos de comisiones, de viáticos; convenios de secretividad y confidencialidad; inventarios de instrumentos, útiles y/ material de trabajo; las autorizaciones firmadas, así como cualquier otro documento que firmen las Partes y esté vinculado con la relación de trabajo.</p>
            <p style="text-align: justify; font-family: Arial;font-size:11;"><b><u>DECIMO-SEGUNDO: INCUMPLIMIENTOS Y/O SANCIONES.</u> EL TRABAJADOR</b> se obliga a cumplir estrictamente el horario y la jornada de trabajo y/o el cambio de éstos, así como a desempeñar correctamente sus labores durante horas extras, acatar las órdenes e instrucciones y demás disposiciones dictadas por <b>EL CONTRATANTE</b>, para el mejor desempeño de sus actividades. En caso de que <b>EL TRABAJADOR</b> incumpla sus obligaciones contractuales y legales, será sancionada conforme lo indica el Código del Trabajo vigente y el Reglamento Interno de Trabajo, en caso que aplique.</p>
            <p style="text-align: justify; font-family: Arial;font-size:11;"><b><u>DECIMO-TERCERO: DOMICILIO Y JURISDICCIÓN.</u></b> Ambas Partes, manifiestan que para resolver sus conflictos, diferencias, discrepancias, disputas, y/o reclamaciones que deriven de este Contrato, y para ejercitar las acciones o derechos derivados de este Contrato, expresamente se obligan: En primer término a resolver por la vía conciliatoria entre ambas partes; y, en caso de no lograr un arreglo, o si este fuere parcial, se someten a las disposiciones de la Secretaria de Estado en los Despachos de Trabajo y Seguridad Social por medio de Inspectoría General o el centro de conciliaciones; agotada la vía administrativa sin arreglo alguno; ambas partes, acuerdan someterse a la jurisdicción de los Juzgados de Letras del Trabajo del Departamento de Francisco Morazán.</p>
            <p style="text-align: justify; font-family: Arial;font-size:11;">En fe de lo anterior y aceptadas las cláusulas contenidas en este <b>CONTRATO INDIVIDUAL DE TRABAJO POR TIEMPO DEFINIDO</b>, se procede a la firma del presente, en la ciudad de Tegucigalpa M.D.C., a los cuatro (06) días del mes de Abril del año 2021. </p>
        </div>
        <div style="position:absolute; top:700px; padding:40px;">
            <div style="float:left; line-height=150%">
                <h1>________________</h1>
                <p style="text-align: center; font-size:9;float:left;font-family: Arial;"><b>HAZEL ALEJANDRA ESCOBAR RAMIREZ<br>COORDINADOR TECNICO DEL PROGRAMA<br>PRESIDENCIAL DE BECAS “HONDURAS 20/20”</b></p>
            </div>
            <div style="float:right; line-height=150%">
                <h1>_________________</h1>
                <p style="text-align: center; font-size:9; float:left;font-family: Arial;"><b>{{ $contrato->nombre }}<br>“EL TRABAJADOR”</b></p>
            </div>
        </div>
        <div style="position:absolute; top:880px;">
            <div>
                <img src="img/12.png" width="700px" height="2px" alt="">
            </div>
            <div style="float:left; line-height=150%">
                <p style="text-align: left; font-size:11;float:left;font-size:11;font-family: Arial;"><br>becashonduras2020.gob.hn<br>info@becashonduras2020.gob.hn</p>
            </div>
            <div style="float:right; line-height=150%">
                <p style="text-align: center; font-size:11;float:left;font-size:11; font-family: Arial;">Edificio Torre Altamira contiguo a Punto Farma,<br>Anillo periférico 1.2 km del puente a desnivel,<br> Teléfonos: 2221-7035/2221-7030/2221-8031.</p>
            </div>
        </div>



</div>

</body>
</html>
