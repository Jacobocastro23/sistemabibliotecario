<?php
	$Nie=$_POST['niecheck'];
	$newSection=$_POST['newSection'];
	if(count($Nie)>=1){
		$CountErrors=0;
		foreach ($Nie as $nies){
			if(!consultasSQL::UpdateSQL("estudiante", "CodigoSeccion='$newSection'", "NIE='$nies'")){
				$CountErrors++;
			}
		}
		if($CountErrors>=1){
	        echo '<script type="text/javascript">
	            swal({ 
	                title:"¡Ocurrió un error inesperado!", 
	                text:"Tuvimos algunos problemas al realizar la operación solicitada, puede ser que algunos estudiantes no se cambiaron de sección, por favor intenta nuevamente", 
	                type: "error", 
	                confirmButtonText: "Aceptar" 
	            });
	        </script>';
	    }else{
	        echo '<script type="text/javascript">
	            swal({ 
	                title:"¡Estudiantes cambiados de sección!", 
	                text:"Los estudiantes seleccionados fueron cambiados de sección con éxito", 
	                type: "success", 
	                confirmButtonText: "Aceptar" 
	            },
	            function(isConfirm){  
	            });
	        </script>';
	    }
	}else{
		echo '<script type="text/javascript">
			swal({ 
				title:"¡Ocurrió un error inesperado!", 
				text:"No has marcado ningun estudiante", 
				type: "error", 
				confirmButtonText: "Aceptar" 
			});
		</script>';
	}