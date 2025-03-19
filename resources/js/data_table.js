$(document).ready(function(){
  if ($('#marketing_cliente')) {
    new DataTable('#marketing_cliente', {
      layout: {
        topStart: {},
        topEnd: {},
        bottomStart: {},
        bottomEnd: {}
      },
      scrollX: true
    });
  }
});