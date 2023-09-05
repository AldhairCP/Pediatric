<?php
// Conectarse a la base de datos    seccion 1
$conexion = mysqli_connect("localhost", "root", "", "xddd");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Recopilar los datos del formulario
	$num = isset($_POST["num"]) ? $_POST["num"] : "";
	$fecha = isset($_POST["fecha"]) ? $_POST["fecha"] : "";
	$hora_llegada = isset($_POST["HoraLlegada"]) ? $_POST["HoraLlegada"] : "";
	$hora_atencion = isset($_POST["HoraAtencion"]) ? $_POST["HoraAtencion"] : "";

	$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
	$curp = isset($_POST["curp"]) ? $_POST["curp"] : "";
	$fecha_nacimiento = isset($_POST["fecha_nacimiento"]) ? $_POST["fecha_nacimiento"] : "";
	$edad = isset($_POST["edad"]) ? $_POST["edad"] : "";
	$estado = isset($_POST["estado"]) ? $_POST["estado"] : "";
	$municipio = isset($_POST["municipio"]) ? $_POST["municipio"] : "";
	$sexo = isset($_POST["sexo"]) ? $_POST["sexo"] : "";
	$procedencia_fija = isset($_POST["procedencia_fija"]) ? $_POST["procedencia_fija"] : "";
	$procedencia_otro = isset($_POST["procedencia_otro"]) ? $_POST["procedencia_otro"] : "";

	// Validar los campos del formulario
	if (empty($num) || empty($fecha) || empty($hora_llegada) || empty($hora_atencion) || empty($nombre) || empty($curp) || empty($fecha_nacimiento) || empty($edad) || empty($estado) || empty($municipio) || empty($sexo)) {
		echo "Error: Todos los campos son obligatorios";
	} elseif (!preg_match("/^[A-Z]{4}[0-9]{6}[H,M][A-Z]{2}[B,C,D,F,G,H,J,K,L,M,N,Ñ,P,Q,R,S,T,U,V,W,X,Y,Z]{3}[0-9,A-Z][0-9]$/i", $curp)) {
		echo "Error: El formato de la CURP es incorrecto";
	} else {
		// Preparar la consulta SQL
		$sql = "INSERT INTO expediente (num, fecha, HoraLlegada, HoraAtencion, nombre, curp, procedencia_fija, procedencia_otro, fecha_nacimiento, edad, estado, municipio, sexo) VALUES ('$num', '$fecha', '$hora_llegada', '$hora_atencion', '$nombre', '$curp', '$procedencia_fija','$procedencia_otro', '$fecha_nacimiento', '$edad', '$estado', '$municipio', '$sexo')";

		// Ejecutar la consulta SQL
		if (mysqli_query($conexion, $sql)) {
			// Si se insertó correctamente, mostrar mensaje al usuario
			echo "Paciente registrado correctamente. Nombre completo: " . $nombre . "<br>";
			echo "Datos guardados del paciente: <br>";
			echo "Num: " . $num . "<br>";
			echo "Fecha: " . $fecha . "<br>";
			echo "Hora de llegada: " . $hora_llegada . "<br>";
			echo "Hora de atención: " . $hora_atencion . "<br>";
			echo "Nombre: " . $nombre . "<br>";
			echo "CURP: " . $curp . "<br>";
			echo "Procedencia fija: " . $procedencia_fija . "<br>";
			echo "Procedencia otro: " . $procedencia_otro . "<br>";
			echo "Fecha de nacimiento: " . $fecha_nacimiento . "<br>";
			echo "Edad: " . $edad . "<br>";
			echo "Estado: " . $estado . "<br>";
			echo "Municipio: " . $municipio . "<br>";
			echo "Sexo: " . $sexo . "<br>";
		} else {
			// Si ocurrió un error, mostrar mensaje de error
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		
	}
}


// Procesar el formulario si se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $expediente = isset($_POST["expediente"]) ? $_POST["expediente"] : '';
    $motivoConsultaFactorRiesgo = isset($_POST["MotivoConsultaFactorRiesgo"]) ? $_POST["MotivoConsultaFactorRiesgo"] : '';
    $inmunocomprometidos = isset($_POST["Inmunocomprometidos"]) ? $_POST["Inmunocomprometidos"] : '';
    $inmunodeficiencias = isset($_POST["Inmunocomprometidos"]) ? $_POST["Inmunocomprometidos"] : '';
    $dolorAgudo = isset($_POST["DolorAgudo"]) ? $_POST["DolorAgudo"] : '';
    $enfermedadesBase = isset($_POST["EnfermedadesBase"]) ? $_POST["EnfermedadesBase"] : '';
    $hemorragiaNoTraumatica = isset($_POST["HemorragiaNoTraumatica"]) ? $_POST["HemorragiaNoTraumatica"] : '';
    $rn7DiasIctericia = isset($_POST["RN7DiasIctericia"]) ? $_POST["RN7DiasIctericia"] : '';
    $clasificacionEspecial = isset($_POST["ClasificacionEspecial"]) ? $_POST["ClasificacionEspecial"] : '';

    // Insertar un registro en la tabla "Expediente"
    $sqlExpediente = "INSERT INTO Expediente (Num, nombre) VALUES (1, 'Nombre Ejemplo')";
    if (mysqli_query($conexion, $sqlExpediente)) {
        // Obtener el ID del expediente recién insertado
        $expedienteId = mysqli_insert_id($conexion);

        // Insertar los datos en la tabla "Padecimientos"
        $sqlPadecimientos = "INSERT INTO Padecimientos (Expediente, MotivoConsultaFactorRiesgo, Inmunocomprometidos, Inmunodeficiencias, DolorAgudo, EnfermedadesBase, HemorragiaNoTraumatica, RN7DiasIctericia, ClasificacionEspecial) 
            VALUES ('$expedienteId', '$motivoConsultaFactorRiesgo', '$inmunocomprometidos', '$inmunodeficiencias', '$dolorAgudo', '$enfermedadesBase', '$hemorragiaNoTraumatica', '$rn7DiasIctericia', '$clasificacionEspecial')";



        // Si se insertó correctamente, mostrar mensaje al usuario
        echo "Paciente registrado correctamente. Nombre completo: " . $expedienteId . "<br>";
        echo "Datos guardados del paciente: <br>";
        echo "Num: " . $motivoConsultaFactorRiesgo . "<br>";
        echo "Fecha: " . $inmunocomprometidos . "<br>";
        echo "Hora de llegada: " . $inmunocomprometidos . "<br>";
        echo "Hora de atención: " . $inmunodeficiencias . "<br>";
        echo "Nombre: " . $dolorAgudo . "<br>";
        echo "CURP: " . $enfermedadesBase . "<br>";
        echo "Procedencia fija: " . $hemorragiaNoTraumatica . "<br>";
        echo "Procedencia otro: " . $rn7DiasIctericia . "<br>";
        echo "Fecha de nacimiento: " . $clasificacionEspecial . "<br>";





        if (mysqli_query($conexion, $sqlPadecimientos)) {
            echo "Los datos se han insertado correctamente";
        } else {
            echo "Error al insertar los datos en la tabla Padecimientos: " . mysqli_error($conexion);
        }
    } else {
        echo "Error al insertar los datos en la tabla Expediente: " . mysqli_error($conexion);
    }

}

// seccion 3 


// Obtener los valores del formulario
$Barra1 = isset($_POST["Barra1"]) ? $_POST["Barra1"] : "";
$Barra2 = isset($_POST["Barra2"]) ? $_POST["Barra2"] : "";

// Insertar los valores en la tabla EscalaDolor
$sql = "INSERT INTO EscalaDolor (Barra1, Barra2) VALUES ($Barra1, $Barra2)";

if (mysqli_query($conexion, $sql)) {
	echo "Los datos se han guardado correctamente en la base de datos.";

} else {
	echo "Error al guardar los datos en la base de datos: " . mysqli_error($conexion);
}

echo "Escala de dolor : " . $Barra1 . "<br>";
echo "Escala de caras de Wong-Baker : " . $Barra2 . "<br>";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $Apariencia = isset($_POST["Apariencia"]) ? $_POST["Apariencia"] : "";
    $Respiratorio = isset($_POST["Respiratorio"]) ? $_POST["Respiratorio"] : "";
    $Hidratacion = isset($_POST["Hidratacion"]) ? $_POST["Hidratacion"] : "";
    $Temperatura = isset($_POST["Temperatura"]) ? $_POST["Temperatura"] : "";
    $Inmunologico = isset($_POST["Inmunologico"]) ? $_POST["Inmunologico"] : "";
    $Circulacion = isset($_POST["Circulacion"]) ? $_POST["Circulacion"] : "";
    $Trauma = isset($_POST["Trauma"]) ? $_POST["Trauma"] : "";

    // Preparar y ejecutar la consulta SQL de inserción
    $sql = "INSERT INTO Indicadores (Apariencia, Respiratorio, Hidratacion, Temperatura, Inmunologico, Circulacion, Trauma)
            VALUES ('$Apariencia', '$Respiratorio', '$Hidratacion', '$Temperatura', '$Inmunologico', '$Circulacion', '$Trauma')";


    
    if (mysqli_query($conexion, $sql)) {
        echo "Los datos se han guardado correctamente en la base de datos.";
    } else {
        echo "Error al guardar los datos en la base de datos: " . mysqli_error($conexion);
    }
}


// seccion 5 diagnostico 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recopilar los datos del formulario
    $DiagnosticoProbable = isset($_POST["DiagnosticoProbable"]) ? $_POST["DiagnosticoProbable"] : "";
    $Peso = isset($_POST["Peso"]) ? $_POST["Peso"] : "";
    $FC = isset($_POST["FC"]) ? $_POST["FC"] : "";
    $FR = isset($_POST["FR"]) ? $_POST["FR"] : "";
    $Temp = isset($_POST["Temp"]) ? $_POST["Temp"] : "";
    $SatO2 = isset($_POST["SatO2"]) ? $_POST["SatO2"] : "";
    $SalaChoque = isset($_POST["SalaChoque"]) ? $_POST["SalaChoque"] : "";
    $Observacion = isset($_POST["Observacion"]) ? $_POST["Observacion"] : "";
    $CExterna = isset($_POST["CExterna"]) ? $_POST["CExterna"] : "";
    $CSalud = isset($_POST["CSalud"]) ? $_POST["CSalud"] : "";
    $SegundoNivel = isset($_POST["SegundoNivel"]) ? $_POST["SegundoNivel"] : "";
    $Domicilio = isset($_POST["Domicilio"]) ? $_POST["Domicilio"] : "";
    $NombreMedico = isset($_POST["NombreMedico"]) ? $_POST["NombreMedico"] : "";
    $CedulaProfesional = isset($_POST["CedulaProfesional"]) ? $_POST["CedulaProfesional"] : "";

    // Validar los campos del formulario

    // Preparar la consulta SQL
    $sql = "INSERT INTO Diagnostico (DiagnosticoProbable, Peso, FC, FR, Temp, SatO2, SalaChoque, Observacion, CExterna, CSalud, SegundoNivel, Domicilio, NombreMedico, CedulaProfesional) VALUES ('$DiagnosticoProbable', '$Peso', '$FC', '$FR', '$Temp', '$SatO2', '$SalaChoque', '$Observacion', '$CExterna', '$CSalud', '$SegundoNivel', '$Domicilio', '$NombreMedico', '$CedulaProfesional')";
}
   // Ejecutar la consulta SQL
if (mysqli_query($conexion, $sql)) {
    // Si se insertó correctamente, mostrar mensaje al usuario
    echo "Los datos se han guardado correctamente en la base de datos. ";
    echo "Diagnostico registrado correctamente " . $DiagnosticoProbable . "<br>";
    echo "peso " . $Peso . "<br>";
    echo "FC " . $FC . "<br>";
    echo "FR " . $FR . "<br>";
    echo "Temp " . $Temp . "<br>";
    echo "SatO2 " . $SatO2 . "<br>";
    echo "SalaChoque " . $SalaChoque . "<br>";
    echo "Observacion " . $Observacion . "<br>";
    echo "CExterna " . $CExterna . "<br>";
    echo "CSalud " . $CSalud . "<br>";
    echo "SegundoNivel " . $SegundoNivel . "<br>";
    echo "Domicilio " . $Domicilio . "<br>";
    echo "NombreMedico " . $NombreMedico . "<br>";
    echo "CedulaProfecional " . $CedulaProfesional . "<br>";
} else {
    // Si ocurrió un error, mostrar mensaje de error
    echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
}



// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>