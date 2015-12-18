$(function(){
    
        //PEGA A DATA DO BANCO
        var dataEnvio = $('#hiddenDataAcesso').val();
        
        //SEPARA A DATA
        var novaData = dataEnvio.split("/");
        
        var dia = parseInt(novaData[0]);
        var mes = parseInt(novaData[1]);
        var ano = parseInt(novaData[2]) + 2000; //ano de 2000
        
        //CONVERTER A DATA DO BANDO EM TIME
        var dataTime = new Date(ano, 01, 01).getTime();
        
       
        
        //DETERMINA O TEMPO RESTANTE (tempoEnvio - agora)
        var tempoRestante = dataTime - new Date().getTime();
        
        
    
	//1 * 24 * 60 * 60 * 1000
	var note = $('#note'),
            ts = (new Date()).getTime() + tempoRestante,
            newYear = false;

//        var note = $('#note'),
//            ts = tempoRestante,
//            newYear = false;


		
	$('#countdown').countdown({
		timestamp	: ts,
		callback	: function(days, hours, minutes, seconds){
			
			var message = "";
			
//			message += days + " dia" + ( days==1 ? '':'s' ) + ", ";
//			message += hours + " hora" + ( hours==1 ? '':'s' ) + ", ";
//			message += minutes + " minuto" + ( minutes==1 ? '':'s' ) + " and ";
//			message += seconds + " segundo" + ( seconds==1 ? '':'s' ) + " <br />";

                        message += days + " : ";
			message += hours + " : ";
			message += minutes + " : ";
			message += seconds + " <br />";
			
			note.html(message);
                        
                        
                        
                        if(days == 0 && hours == 0 && minutes == 0 && seconds == 0){
                            note.html("Acesso liberado! " + new Date().getTime() + ", " + dataTime );
                            
                            //CODIGO DE LIBERAR ACESSO AO BOTÃO : ATIVAR BOTÃO DE RESPONDER
                            $("#btnResponderFormulario").attr("disabled", false);
                              
                        }
                        
		}
	});
	
});
