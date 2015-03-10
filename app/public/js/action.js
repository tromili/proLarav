$(document).ready(function(){
  $('.find_producto').autocomplete({ 
      minLength: 3,
      autoFocus: true,
      selectFirst: true,
      source: function(request, response){
          $.ajax({
              context: document.body,
              cache: false,
              async: false,
              type: "POST", 
              url: "/carrito/buscar",
              dataType: "json", 
              data: {
                  model_name: 'producto',
                  term: request.term,
                  factor: $('.cfactor').text()
              },
              success: function(data) {
                  response(data);
              }
          });
      },              
      select: function(event, ui){
         /*alert(ui.item.nombre);*/
         event.preventDefault();
         $(".find_producto").val('');
         var llenado_tbl=incre_repetido(ui.item.codigo);
         if(llenado_tbl==0){
          llenado(ui); 
         }
      }                       
  });
  /*Barras*/
(function($) {
    $.fn.onEnter = function(func) {
        this.bind('keypress', function(e) {
            if (e.keyCode == 13) func.apply(this, [e]);    
        });               
        return this; 
     };
})(jQuery);

$( function () {
    $(".find_code").onEnter( function() {
      var data={};
      data.cbarra=$(this).val();
      data.factor=$('.cfactor').text();
        $.ajax({
          type: 'POST',
          data:data,       
          url: '/carrito/cbara',         
          success: function(data) {
              if(data.length>2){
                var respuesta = $.parseJSON(data);
                /*console.log(respuesta.id);*/
                $(".find_code").val('');
                var llenado_tbl=incre_repetido(respuesta.codigo);
                if(llenado_tbl==0){
                  console.log(respuesta);
                  llenadoBarra(respuesta); 
                }
              }else{
                alert('El producto no se encuentra registrado');
              }
          }
        });       
    });
});


});
function incre_repetido(codprd)
{
  var retorno=0;
  $(document).ready(function() {
    $('.codprd').each(function() {
      
      if($(this).text()==codprd)
      {
        var lna = $(this).parent();
        $(lna).find('.cantidad').val(parseFloat($(lna).find('.cantidad').val())+1);
        total_productos(lna);
        retorno=1;
      }
    });

  });
  return retorno;
}
function total_productos(lna)
{
  var punidad=parseFloat($(lna).find('.punit').text());
  var cantidad=parseFloat($(lna).find('.cantidad').val());
  $(lna).find('.ttlprd').html((punidad*cantidad).toFixed(2));
  sumaprds();
}
function llenado(ui){
    var tr='<tr>';
    tr+='<td class="idPRD" id="'+ui.item.id+'"><div class="imgtmn"><img src="../../imgprd/'+ui.item.imagen+'"></div></td>';
    tr+='<td class="codprd">'+ui.item.codigo+'</td>';
    tr+='<td class="nbrprd">'+ui.item.nombre+'</td>';
    tr+='<td>'+ui.item.color+'</td>';
    tr+='<td class="punit">'+(ui.item.factor).toFixed(2)+'</td>';
    tr+='<td><input tipe="text" class="form-control cantidad" value="1"></td>';
    tr+='<td class="ttlprd">'+(ui.item.factor).toFixed(2)+'</td>';
    tr+='</tr>';
    $('.prod').append(tr);
    sumaprds();
}
function llenadoBarra(ui){
    var tr='<tr>';
    tr+='<td class="idPRD" id="'+ui.id+'"><div class="imgtmn"><img src="../../imgprd/'+ui.imagen+'"></div></div></td>';
    tr+='<td class="codprd">'+ui.codigo+'</td>';
    tr+='<td class="nbrprd">'+ui.nombre+'</td>';
    tr+='<td>'+ui.color+'</td>';
    tr+='<td class="punit">'+(ui.factor).toFixed(2)+'</td>';
    tr+='<td><input tipe="text" class="form-control cantidad" value="1"></td>';
    tr+='<td class="ttlprd">'+(ui.factor).toFixed(2)+'</td>';
    tr+='</tr>';
    $('.prod').append(tr);
    sumaprds();
}
function sumaprds()
{
  $(document).ready(function() {
    var total=0;
    $('.ttlprd').each(function() {
      total+=parseFloat($(this).text());
    });
    var subtotalDescuento=total - $('.descuentoPRD').val();
    $('.subtotalPRD').html((subtotalDescuento).toFixed(2));
    $('.igvPRD').html((subtotalDescuento*18/100).toFixed(2));
    $('.totaPRD').html(((subtotalDescuento*18/100)+subtotalDescuento).toFixed(2));
    var totalf=((subtotalDescuento*18/100)+subtotalDescuento).toFixed(2);
    var pago=$('.pagoEf').val();
    var vuelto=0;
    if((parseFloat(pago)-parseFloat(totalf))<=0)
    {
      vuelto=0;
    }
    else
    {
     vuelto=parseFloat(pago)-parseFloat(totalf); 
    }
    $('.vueltoEf').html(vuelto.toFixed(2));
  });
}
$('.pagoEf').keyup(function(event) {
  sumaprds();
});
$('.descuentoPRD').keyup(function(event) {
  sumaprds();
});
$('.grprof').click(function(){
	var data={};
	data.idRegistro=$('.idRegistro').attr('id');
  data.fpago=$('.fpago').val();
  data.tcomprobante=$('.tcomprobante').val();
  data.fventa=$('.fventa').val();
  data.recordatorio=$('.recordatorio').val();
  data.frecordatorio=$('.frecordatorio').val();
  //Totales
  data.descuentoPRD=$('.descuentoPRD').val();
  data.subtotalPRD=$('.subtotalPRD').text();
  data.igvPRD=$('.igvPRD').text();
  data.totaPRD=$('.totaPRD').text();
  /*pagos*/
  data.pagoEf=$('.pagoEf').val();
  data.vueltoEf=$('.vueltoEf').text();
  /*detalle*/
	data.idPRD=new Array();
  data.punit=new Array();
	data.codprd=new Array();
	data.cantidad=new Array();
	var i=0;
	$('.idPRD').each(function(){
		var lna = $(this).parent();
		data.idPRD[i]=$(lna).find('.idPRD').attr('id');
    data.punit[i]=$(lna).find('.punit').text();
		data.codprd[i]=$(lna).find('.codprd').text();
		data.cantidad[i]=$(lna).find('.cantidad').val();
		i++;
	});
	$.ajax({
	    type: 'POST',
	    data:data,       
	    url: '/carrito/ncotiza',         
	    success: function(data) {
	    		location.href='../detalle/'+data;
	    }
  	});
});
//notas
$('.envnota').click(function() {
   sendnota();
});
$( function () {
    $(".notamsg").onEnter( function() {
      sendnota();
    });
});
function sendnota()
{
  var data={};
  data.mensaje=$('.notamsg').val();
  data.registro=$('.idRegistro').attr('id');
  data.iduser=iduser;
  data.user=user;
  var userRG=data.user;
  $.ajax({
    type: 'POST',
    data:data,       
    url: '/mensajes/notas',         
    success: function(data) {
      console.log(data.id);
      dato='<li class="in">';
      dato+='<b>'+userRG+' </b>';
      dato+='<span class="datetime">'+data.created_at+'</span>';
      dato+='<span class="body">'+data.mensaje_nota+'</span>';
      dato+='</li>';
      $('.chats').append(dato);
      $('.notamsg').val('');
    }
  });
}
/*end notas*/
