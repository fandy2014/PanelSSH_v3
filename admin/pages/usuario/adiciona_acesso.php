<?php
require_once("../../../pages/system/seguranca.php");
require_once("../../../pages/system/config.php");

protegePagina("admin");

	
		if( (isset($_POST["usuario"])) and(isset($_POST["qtd"])) and ($_POST["servidor"]!=0) ){
			
			
			$SQLAcesso = "select * from acesso_servidor WHERE id_servidor = '".$_POST['servidor']."' 
			                                 and id_usuario='".$_POST['usuario']."'  ";
            $SQLAcesso = $conn->prepare($SQLAcesso);
            $SQLAcesso->execute();
					
			if(($SQLAcesso->rowCount()) > 0){
				echo '<script type="text/javascript">';
			echo 	'alert("Servidor ja esta salvo!");';
			echo	'window.location="../../home.php?page=usuario/listar";';
			echo '</script>';
			}else{
				
				
				
                $InsertAcesso = "INSERT INTO acesso_servidor (id_servidor, id_usuario, qtd)
                  VALUES ('".$_POST['servidor']."', '".$_POST['usuario']."', '".$_POST['qtd']."'  )  ";
                $InsertAcesso = $conn->prepare($InsertAcesso);
                $InsertAcesso->execute();
					
                
                    echo '<script type="text/javascript">';
	        		echo 	'alert("Adicionado com sucesso!");';
		        	echo	'window.location="../../home.php?page=usuario/perfil&id_usuario='.$_POST['usuario'] .' ";';
		        	echo '</script>';
			
			
                

			}
			
		}else{
			echo '<script type="text/javascript">';
			echo 	'alert("Preencha todos os campos!");';
			echo	'window.location="../../home.php?page=usuario/perfil&id_usuario='.$_POST['usuario'] .' ";';
			echo '</script>';
			
		}
	
		
			
			?>