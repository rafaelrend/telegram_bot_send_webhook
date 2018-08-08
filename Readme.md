Exemplo de código usando Telegram BOT para o envio de mensagens diretamente ao Telegram de um contato.

O arquivo exemplo.php contém um exemplo simples de como disparar uma mensagem para o telegram de um contato.

A Classe Telegram, permite que seja utilizada na página do webhook, onde irá receber as interações feitas com o boot.


É necessário a interação com o boot para poder obter as IDs dos contatos, ou seja, um contato precisa mandar um comando ou uma mensagem pro boot, a partir 
disso ele irá aparecer no webhook.

Os métodos que devem ser usados são estes.

    $html_json = telegram::getUpdates($TelegramBotToken);
    
    $arr = telegram::getListaChats($TelegramBotToken);

A variável 	$TelegramBotToken deve conter o token do bot do telegram. Algo como: bot0000000:AAAAAAA-CCfadafsdfasdfa

É necessário obter o arquivo JSON, e então salvar o chatID para ser utilizado posteriormente no telegram.

Para criar um bot telegram, vá na URL:  https://core.telegram.org/bots/

Uma referência que ajuda é essa URL aqui: https://blog.rodrigolira.net/2015/07/07/criando-um-bot-do-telegram-1/
	
