Exemplo de c�digo usando Telegram BOT para o envio de mensagens diretamente ao Telegram de um contato.

O arquivo exemplo.php cont�m um exemplo simples de como disparar uma mensagem para o telegram de um contato.

A Classe Telegram, permite que seja utilizada na p�gina do webhook, onde ir� receber as intera��es feitas com o boot.


� necess�rio a intera��o com o boot para poder obter as IDs dos contatos, ou seja, um contato precisa mandar um comando ou uma mensagem pro boot, a partir 
disso ele ir� aparecer no webhook.

Os m�todos que devem ser usados s�o estes.

    $html_json = telegram::getUpdates($TelegramBotToken);
    
    $arr = telegram::getListaChats($TelegramBotToken);

A vari�vel 	$TelegramBotToken deve conter o token do bot do telegram. Algo como: bot0000000:AAAAAAA-CCfadafsdfasdfa

� necess�rio obter o arquivo JSON, e ent�o salvar o chatID para ser utilizado posteriormente no telegram.

Para criar um bot telegram, v� na URL:  https://core.telegram.org/bots/

Uma refer�ncia que ajuda � essa URL aqui: https://blog.rodrigolira.net/2015/07/07/criando-um-bot-do-telegram-1/
	
