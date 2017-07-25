<?php
	$name = $_POST['name'];	
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	$data_envio = date('d/m/Y');
	$hora_envio = date('H:i:s');


	$arquivo = "
  <style type='text/css'>
  body {
  margin:0px;
  font-family:Verdana;
  font-size:12px;
  color: #666666;
  }
  a{
  color: #666666;
  text-decoration: none;
  }
  a:hover {
  color: #FF0000;
  text-decoration: none;
  }
  </style>
    <html>
        <table border='0' cellpadding='1' cellspacing='1' bgcolor='#efefef'>
            <tr bgcolor='#fafafa'>      
                <td><b>Nome:</b> $name</td>
            </tr>
            <tr>
                <td><b>E-mail:</b> $email</td>
     		</tr>     
            <tr bgcolor='#fafafa'>
                <td><b>Mensagem:</b><br>$message</td>
            </tr>          
			<tr>
				<td>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></td>
			</tr>
        </table>
    </html>
  ";

// É necessário indicar que o formato do e-mail é html
  $headers = "Content-Type: text/html; charset=UTF-8";  
  
  $enviaremail = mail("lucio@rodriguessi.com.br", "Mensagem enviada pelo site: " . $subject, $arquivo , $headers);

  if($enviaremail){
  $mgm = "E-MAIL ENVIADO COM SUCESSO! <br> O link será enviado para o e-mail fornecido no formulário";
  echo " <meta http-equiv='refresh' content='10;URL=contato.php'>";
  } else {
  $mgm = "ERRO AO ENVIAR E-MAIL!";
  echo "";
  }
?>