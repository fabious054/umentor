 function logExecute(){
    console.log('Executando o script...');
 }

 function jqueryTest(){
      console.log('JQuery está funcionando!');
      $('h1').css('color','red');
   }



 function init() {
   logExecute();
   jqueryTest();
}

// ==========================
// Execução do Script
// ==========================
init();