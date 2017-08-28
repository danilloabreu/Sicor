<?php
$path = $_SERVER['DOCUMENT_ROOT'];

require("$path/sicor/util/aleatorio.php");
require("$path/sicor/controller/php/conexao.php");
require("$path/sicor/externo/function_externo.php");


header('Content-type: text/html; charset=utf-8');

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$codigo= geraSenha(6, false, true);

// Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer


insereCliente($conexao, $nome, $telefone, $email, $codigo);

require("$path/sicor/util/phpmailer/class.phpmailer.php");

// Inicia a classe PHPMailer

$mail = new PHPMailer();

// Define os dados do servidor e tipo de conexão

// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=	

$mail->IsSMTP(); // Define que a mensagem será SMTP

$mail->Host = "smtp.quilombonet.com.br"; // Endereço do servidor SMTP

$mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)

$mail->Username = 'sicor@quilombonet.com.br'; // Usuário do servidor SMTP

$mail->Password = 'do48soa5'; // Senha do servidor SMTP

// Define o remetente

// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

$mail->From = "sicor@quilombonet.com.br"; // Seu e-mail

$mail->FromName = "Jardim Pacaembu"; // Seu nome

// Define os destinatário(s)

// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

// $mail->AddAddress("formulario@rnavesseguros.com.br", "Contato");

$mail->AddAddress($email, "Contato");

// $mail->AddCC('criacao03@ewpropaganda.com.br', 'Contato'); // Copia

// $mail->AddBCC("criacao03@ewpropaganda.com.br", "Contato"); // Copia oculta

// Define os dados técnicos da Mensagem

// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

$mail->IsHTML(true); // Define que o e-mail será enviado como HTML

$mail->CharSet = 'charset=utf-8'; // Charset da mensagem (opcional)

// Define a mensagem (Texto e Assunto)

$corpo = "
    
<p>Seu código de acesso foi gerado com sucesso!</p>
<b>Seu código de acesso é: </b> $codigo <br>
<p>Para acessar o simulador clique no seguinte link</p>
<b><a href='http://sicor.quilombonet.com.br/sicor/externo/page_simulador_externo.php?telefone=$telefone&codigo=$codigo'>Simulador Jardim Pacaembu</a>
<p>Dúvidas, entre em contato conosco pelo (19) 3461-6568    
"
;

// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

$mail->Subject  = "Código de Acesso - Jardim Pacaembu"; // Assunto da mensagems

$mail->Body = $corpo;

// Define os anexos (opcional)

// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

//$mail->AddAttachment("c:/temp/documento.pdf", "novo_nome.pdf");  // Insere um anexo

// Envia o e-mail

$mail->CharSet = 'UTF-8';

if ($corpo !== '') {

$enviado = $mail->Send();

}

else {
	echo "<script type='text/javascript'>alert('Preencha todos os campos.');</script>";
	echo "<script type='text/javascript'>location.href='index.php'</script>";
}

// Limpa os destinatários e os anexos

$mail->ClearAllRecipients();

$mail->ClearAttachments();

// Exibe uma mensagem de resultado

if ($enviado) {
    echo "<script type='text/javascript'>alert('Seu link de acesso está disponível no seu e-mail.\\nEm caso de dúvidas, ligar para (19) 3461-6568');</script>";
    echo "<script type='text/javascript'>location.href='/sicor/externo/confirma_codigo.php'</script>";
} 

else {
	// echo "Mailer Error: " . $mail->ErrorInfo;
	echo "<script type='text/javascript'>alert('Sua mensagem não pode ser enviada.\\nPreencha novamente');</script>";
	echo "<script type='text/javascript'>location.href='/sicor/externo/solicita_codigo.php'</script>";
}

?>