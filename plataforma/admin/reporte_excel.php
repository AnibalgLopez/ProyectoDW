<?php
error_reporting(0);
include("conexion_reportes.php");


// iniciamos un array donde vamos a meter lo datos de la tabla TB_CARRERA
$carreras = array ();
$id_carr = array ();
$finales2=0;

// iniciamos un array donde vamos a meter lo datos de la tabla TB_USUARIO
$usuario3 = array ();
$id_usu = array ();
$finales3=0;

// CUERIS DE CONSULTA A BASE DE DATOS 
	$resultado =mysqli_query ($con,"SELECT * FROM tb_alumnos order by tb_alumnos.ID_ALUMNO ");
	$query2 = mysqli_query ($con,"SELECT tb_carrera.NOM_CARRERA, tb_carrera.ID_CARRERA FROM tb_alumnos INNER JOIN tb_carrera on tb_alumnos.ID_CARRERA=tb_carrera.ID_CARRERA order by tb_alumnos.ID_ALUMNO "); 
	$query3 = mysqli_query ($con,"SELECT tb_usuario.ID_USUARIO, tb_usuario.NOM_USUARIO FROM tb_alumnos INNER JOIN tb_usuario on tb_alumnos.ID_USUARIO=tb_usuario.ID_USUARIO order by tb_alumnos.ID_ALUMNO");


	// CONSULTAMOS LOS DATOS DE LA TABLA TB_CARRERA Y LOS GUARDAOS EN EL ARREGLO
    while($row = mysqli_fetch_array($query2)){
	$id_carr [$finales2] = $row['ID_CARRERA'];
	$carreras [$finales2] = $row['NOM_CARRERA'];
	$finales2++;
	}

	// CONSULTAMOS LOS DATOS DE LA TABLA TB_USUARIO Y LOS GUARDAOS EN EL ARREGLO
	while($row2 = mysqli_fetch_array($query3)){
		$id_usu [$finales3] =   $row2['ID_USUARIO'];
		$usuario3 [$finales3] = $row2['NOM_USUARIO'];
		$finales3++;
		}
	

    
	if($resultado->num_rows > 0 ){
						
		date_default_timezone_set('America/Guatemala');

		if (PHP_SAPI == 'cli')
			die('Este archivo solo se puede ver desde un navegador web');

		/** Se agrega la libreria PHPExcel */
		require_once 'lib/PHPExcel/PHPExcel.php';

		// Se crea el objeto PHPExcel
		$objPHPExcel = new PHPExcel();

		// EL TITULO DEL REPORTE EN EXCEL
		$tituloReporte = "UNIVERSIDAD MARIANO GALVEZ DE GUATEMALA REPORTE DE ALUMNOS";
		// LOS TITULOS DE LOS DATOS 
		$titulosColumnas = array('No.', 'Nombre', 'Apellido' , 'Telefono', 'Email', 'Direccion', 'Carrera' , 'Usuario' );
		
		$objPHPExcel->setActiveSheetIndex(0)
        		    ->mergeCells('B2:I2');
						
		// Se agregan los titulos del reporte
		$objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('B2',  $tituloReporte) // Titulo del reporte
        ->setCellValue('B3',  $titulosColumnas[0])  //Titulo de las columnas
        ->setCellValue('C3',  $titulosColumnas[1])
        ->setCellValue('D3',  $titulosColumnas[2])
        ->setCellValue('E3',  $titulosColumnas[3])
        ->setCellValue('F3',  $titulosColumnas[4])
        ->setCellValue('G3',  $titulosColumnas[5])
		->setCellValue('H3',  $titulosColumnas[6]) 
		->setCellValue('I3',  $titulosColumnas[7]);
		
		//Se agregan los datos de los alumnos
		$i = 4; // SE DECLARA EN 4 PORQUE EN LA FILA No. 4 VA COMENSAR A ESCRIBIR LOS DATOS
		$firma = 4;  // SOLO ES PARA QUE NOS APARESCA HASTA ABAJO FIRMA._____________________
		$x = 0; // PARA RECORRER LOS AREGLOS Y ALAMACENAR LOS DATOS OBTENIDOS DE LAS CONSULTAS

		while ($fila = $resultado->fetch_array()) {
			$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('B'.$i, $fila['ID_ALUMNO'])
            ->setCellValue('C'.$i, $fila['NOM_ALUMNO'])
            ->setCellValue('D'.$i, $fila['APE_ALUMNO'])
            ->setCellValue('E'.$i, $fila['TEL_ALUMNO'])
            ->setCellValue('F'.$i, $fila['EMAIL_ALUMNO'])
            ->setCellValue('G'.$i, $fila['DIR_ALUMNO'])
			->setCellValue('H'.$i, $fila = $carreras[$x])
			->setCellValue('I'.$i, $fila = $usuario3[$x]);
			 $i++;
			 $firma++;
			 $x++;
		}

		$firmatexto = "Firma.______________________________";
		
		$objPHPExcel->setActiveSheetIndex(0)
		->mergeCells('B'.($firma+4).':'.'D'.($firma+4) );

		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('B'. ($firma+4), $firmatexto);


		
		$estiloTituloReporte = array(
        	'font' => array(
	        	'name'      => 'Arial Black',
    	        'bold'      => true,
        	    'italic'    => false,
                'strike'    => false,
               	'size' =>14,
	            	'color'     => array(
    	            	'rgb' => '17202A' // COLOR NEGRO LETRA
        	       	)
            ),
	        'fill' => array(
				'type'	=> PHPExcel_Style_Fill::FILL_SOLID,
				'color'	=> array('argb' => 'D5F5E3') // COLOR AMARILLO DE FONDO
			),
            'borders' => array(
               	'allborders' => array(
                	'style' => PHPExcel_Style_Border::BORDER_NONE                    
               	)
            ), 
            'alignment' =>  array(
        			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        			'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        			'rotation'   => 0,
        			'wrap'          => TRUE
    		)
        );

		$estiloTituloColumnas = array(
            'font' => array(
                'name'      => 'Arial',
                'bold'      => true,                          
                'color'     => array(
                    'rgb' => '17202A'// COLOR NEGRO LETRA
                )
            ),
            'fill' 	=> array(
				'type'		=> PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
				'rotation'   => 90,
        		'startcolor' => array(
            		'rgb' => 'DAF7A6'// COLOR VERDE DE FONDO
        		),
        		'endcolor'   => array(
            		'argb' => 'DAF7A6'// COLOR VERDE DE FONDO
        		)
			),
            'borders' => array(
            	'top'     => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
                    'color' => array(
                        'rgb' => 'DAF7A6'
                    )
                ),
                'bottom'     => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
                    'color' => array(
                        'rgb' => 'DAF7A6'
                    )
                )
            ),
			'alignment' =>  array(
        			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        			'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        			'wrap'          => TRUE
    		));
			

			
		$estiloInformacion = new PHPExcel_Style();
		$estiloInformacion->applyFromArray(
			array(
           		'font' => array(
               	'name'      => 'Arial',               
               	'color'     => array(
                   	'rgb' => '000000'
               	)
           	),
           	'fill' 	=> array(
				'type'		=> PHPExcel_Style_Fill::FILL_SOLID,
				'color'		=> array('argb' => 'FAE5D3') // FONDO VERDE EL DEMAS MARCO
			),
           	'borders' => array(
               	'left'     => array(
                   	'style' => PHPExcel_Style_Border::BORDER_THIN ,
	                'color' => array(
    	            	'rgb' => '3a2a47'
                   	)
               	)             
           	)
        ));
		 

		$objPHPExcel->getActiveSheet()->getStyle('B2:I2')->applyFromArray($estiloTituloReporte);
		$objPHPExcel->getActiveSheet()->getStyle('B3:I3')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "B3:I".($i-1));


		
				
		for($i = 'B'; $i <= 'I'; $i++){
			$objPHPExcel->setActiveSheetIndex(0)			
				->getColumnDimension($i)->setAutoSize(TRUE);
		}
		
		// Se asigna el nombre a la hoja
		$objPHPExcel->getActiveSheet()->setTitle('Alumnos UMG');

		// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
		$objPHPExcel->setActiveSheetIndex(0);
		// Inmovilizar paneles 
		//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
		$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,4);

		// Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Reporte de alumnos UMG.xlsx"');
		header('Cache-Control: max-age=0');

		

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');

		exit;
		
	}
	   else{

		header('Location: Reporte Alumnos.php');
	   }
?>