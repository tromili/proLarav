function comboproyecto(val){
	var data ={};
	data.accion='comboproyecto';	
	data.idp=val;	
	
		$.ajax({
		    type: 'POST',
		    data:data,       
		    url: '../class/ajax.php',           
		    success: function(data) {
		    	$('#etapa').html(data);
		            
		      
		    }
		});
	
}
function SaveEntregable(){
	$( "#formregentre" ).submit();
}

function EditaEntregable(){
	$( "#EditaEntregable" ).submit();
}


function eliminarboda(tabla,id){
	var data ={};	
	data.tabla=tabla;	
	data.idc= id;	
	$('#f'+id).remove();
		$.ajax({
		    type: 'POST',
		    data:data,       
		    url: '/veesy/bodas/eliminarboda',           
		    success: function(data) {
		    	
		            
		      
		    }
		});
}

function editarboda(id){
	var data ={};	
	data.idc= id;	
		$.ajax({
		    type: 'POST',
		    data:data,       
		    url: '/veesy/bodas/editarboda',           
		    success: function(data) {
		    	console.log(data);
		    	var partes = data.split('||');
		    	$('#edita_boda #idboda').val(partes[0]);
		    	$('#edita_boda #nombrepareja').val(partes[1]);
		    	$('#edita_boda #textintro').html(partes[2]); 
		    	$('#edita_boda .imgprincipal2').html(partes[3]); 

		    	$('#imgdestacada').ddslick({
		    		width:'100%',
    onSelected: function(selectedData){
        //callback function: do something with selectedData;
        $('.dd-selected-value').attr('id','dd-selected-value');
        $('.dd-selected-value').attr('name','dd-selected-value');
    }   
});         
		      
		    }
		});

}

function actimgprincipal(valr,id){
	var data ={};
	data.accion='actuaestado';		
	data.idc= id;
	data.estado= valr;

		$.ajax({
		    type: 'POST',
		    data:data,
		    async:true,       
		    url: '../class/ajax.php',           
		    success: function(data) {
		    	console.log(data);
		    	$('#f'+id+' td').eq(5).html('<div class="estadotabla" id="'+id+'" onclick="actiselet(this)">'+data+' <i class="fa fa-angle-down"></i></div>');
		    }
	});
}

function actiselet(ojb){
	
		var estados = '<select onchange="actestado(this.value,\''+$(ojb).attr('id')+'\');"><option></option><option value="0">Pendiente</option><option value="1">En revisión</option><option value="2">Validado</option><option value="3">Anulado</option></select>';
		$(ojb).parent().html(estados);	

}
var interval=null;
var idc = null;
var userx  =null;
var cerrar = 0;
function actualizachat(id,user){
	var data ={};
	data.accion='actualizachat';		
	data.idc= id;	
	data.user= user;
	cerrar = 1;
	idc=id;
	userx = user;
	$('.btnguardarf').attr('onclick',"registraobser("+user+","+id+",1)");
		$.ajax({
		    type: 'POST',
		    data:data,
		    async:true,       
		    url: '../class/ajax.php',           
		    success: function(data) {
		    	var partes = data.split('||');
		    	//console.log(data);
		    	$('.chats').html(partes[0]);
		    	$('.notas').fadeIn('fast');
		    	 $('.scroller').animate({ scrollTop: $('.chats').height()}, 1000);
		    	 $('.nombentregable').html(partes[1]);
		    	 interval = setInterval('actualizachat('+id+','+user+')',5000);

		    }
	});

	clearInterval(interval);


}

function registraobser(user,entregable,tipo){
	var data ={};
	data.accion='registraobser';
	data.user=user;
	data.entregable=entregable;
	data.tipo=tipo;
	data.obs=$('.txtobser').val();
	if(data.obs!=''){
		$.ajax({
		    type: 'POST',
		    data:data,       
		    url: '../class/ajax.php',           
		    success: function(data) {
		      
		      $('.chats').append(data);
		      $('.scroller').animate({ scrollTop: $('.chats').height()}, 1000);
		      $('.txtobser').val('');
		      
		      
		    }
		});
	}else{
		$('.txtobser').focus();
	}
}

function eliminaentrachat(id,objty){
	var data ={};
	data.accion='eliminaentrachat';
	data.idc=id;
	$(objty).parent().parent().fadeOut('slow',function(){
		$(this).remove();
	});
	
		$.ajax({
		    type: 'POST',
		    data:data,       
		    url: '../class/ajax.php',           
		    success: function(data) {	     
		      console.log(data);
		      
		    }
		});
	
}

function actestado(valr,id){
	var data ={};
	data.accion='actuaestado';		
	data.idc= id;
	data.estado= valr;

		$.ajax({
		    type: 'POST',
		    data:data,
		    async:true,       
		    url: '/veesy/bodas/actuaestado',           
		    success: function(data) {
		    	console.log(data);
		    	$('#f'+id+' td').eq(2).html('<div class="estadotabla" id="'+id+'" onclick="actiselet(this)">'+data+' <i class="fa fa-angle-down"></i></div>');
		    }
	});
}

function actiselet(ojb){
	
		var estados = '<select onchange="actestado(this.value,\''+$(ojb).attr('id')+'\');"><option></option><option value="0">Borrador</option><option value="1">Publicado</option></select>';
		$(ojb).parent().html(estados);	

}
	var objt= '';
$(document).ready(function(e){
	
	



	$('.imgprincipal').on('click',function(){
		var objt = $(this);
		var data ={};
		data.idc=$(this).attr('id');
		$.ajax({
		    type: 'POST',
		    data:data,
		    async:true,      
		    url: '/veesy/bodas/cargaselect',           
		    success: function(data) {	     
		      //console.log(data);

				objt.parent().html(data);
		      
		    }
		});
	

		
		
	});

	$('.actdel').on('click',function(){
		var divaviso = '<div class="aviso aveliminar">Desea eliminar esta entrada<div class="btnsmen"><a class="btn btn2 default" onclick="$(\'.aviso\').fadeOut(500).remove();">no</a><a class="btn btn2 green" onclick="'+$(this).attr('data-funcion')+'">si</a></div></div>';
		$(this).parent().append(divaviso).hide(0).fadeIn(500);
	});

	$('.estadotabla').on('click',function(){
		var estados = '<select onchange="actestado(this.value,\''+$(this).attr('id')+'\');"><option></option><option value="0">Borrador</option><option value="1">Publicado</option></select>';


		$(this).parent().html(estados);
		
	});

	


});

function delfilalist(obj){
	$(obj).parent().fadeOut('slow',function(){
	    $(this).remove();
	  });
}

function cerrarfila(obj){
  $(obj).parent().fadeOut('slow',function(){
    $(this).remove();
  });
}

function agregarradio(obj){
  $(obj).parent().find('.gruporadios').append("<div class='filar'><div class='radiol'><input type='radio' class='radiof' /></div><div class='valradior'><input type='text' class='textradio autoc' placeholder='nombre' onclick='creaaucto(this,\"r\");'/><input type='text' class='textradio valord' placeholder='valor'/></div><a class='delintform' onclick='delfilalist(this)'><i class='fa fa-minus'></i></a></div>");
}

function agregarcheck(obj){
  $(obj).parent().find('.grupochecks').append("<div class='filar'><div class='radiol'><input type='checkbox' class='checkboxf' /></div><div class='valradior'><input type='text' class='textcheckbox autoc' placeholder='nombre' onclick='creaaucto(this,\"c\");'/><input type='text' class='textcheckbox valord' placeholder='valor'/></div><a class='delintform' onclick='delfilalist(this)'><i class='fa fa-minus'></i></a></div>");
}

function agregaroption(obj){
  $(obj).parent().find('.grupooptions').append("<div class='filar'><div class='valradior'><input type='text' class='textcheckbox autoc' placeholder='nombre' onclick='creaaucto(this,\"s\");'/><input type='text' class='textcheckbox valord' placeholder='valor'/></div><a class='delintform' onclick='delfilalist(this)'><i class='fa fa-minus'></i></a></div>");
}

function agregarfk(obj){
  $(obj).parent().find('.grupofks').append("<div class='filar'><div class='valradior'><input type='text' class='textcheckbox valord' placeholder='nombre'/> <input type='text' class='textcheckbox autoc' placeholder='fk' onclick='listaforms(this,\"s\");'/></div><a class='delintform' onclick='delfilalist(this)'><i class='fa fa-minus'></i></a></div>");
}


function guardarform(){
  var campos='',labels='', nombrecampo='', placeholder='',valores='',classcampo='',idc='';
  $('.areaforms .campo').each(function(){

   // campos = campo + $(this).attr('data-tipo')+'||';
 campos = campos + $(this).attr('data-tipo')+'||';
 idc = $('#idf').val();
   // labels = labels + $(this).find('labelf').val()+'||';

       switch($(this).attr('data-tipo')){

       	case 'fk':
          // labels = labels + '-' +'||';

          nombrecampo = nombrecampo + $(this).find('.valord').val()+'||';
          valores = valores + $(this).find('.autoc').val()+'||';


           //console.log($(this).html());

          /* $('.areaforms .campo .grupofks .autoc').each(function(){
              //console.log($(this).html());
              labels = labels + $(this).val()+'--';
           });*/
           
           //labels = labels.substring(0, labels.length-2);

           /*$('.areaforms .campo .grupofks .valord').each(function(){
              valores = valores + $(this).val()+'--';
           });*/
//////////////////////////////

           


           //valores = valores.substring(0, valores.length-2);
           labels = labels +'-||';
           //valores = valores +'||';            
           placeholder = placeholder + $(this).find('.placeholder').val()+'||';
           classcampo = placeholder+'-'+'||';   
           break;
       
          case 'titulo':
            labels = labels + '-' +'||';
            nombrecampo = nombrecampo +'-'+'||';
            valores = valores + $(this).find('.titulof').val()+'||';
            placeholder = placeholder+'-'+'||'; 
            classcampo = classcampo + $(this).find('.classcampo').val()+'||';
            break;

          case 'introtexto':
            labels = labels + '-' +'||';
            nombrecampo = nombrecampo +'-'+'||';
            valores = valores + $(this).find('.introtextareaf').val()+'||';
            classcampo = classcampo + $(this).find('.classcampo').val()+'||';
            placeholder = placeholder+'-'+'||';           
            break;

          case 'texto':
            labels = labels + $(this).find('.labelf').val() +'||';
            nombrecampo = nombrecampo +$(this).find('.nombrecampo').val()+'||';
            valores = valores + '-'+'||';
            placeholder = placeholder + $(this).find('.placeholder').val()+'||';
            classcampo = classcampo + $(this).find('.classcampo').val()+'||';           
            break;

          case 'cuadrotexto':
            labels = labels + $(this).find('.labelf').val() +'||';
            nombrecampo = nombrecampo +$(this).find('.nombrecampo').val()+'||';
            valores = valores + '-'+'||';
            placeholder = placeholder + '-'+'||';
            classcampo = classcampo + $(this).find('.classcampo').val()+'||';           
            break;

          case 'desplegable':
            labels = labels + $(this).find('.labelf').val() +'--';

            nombrecampo = nombrecampo + $(this).find('.nombrecampo').val()+'||';

            //console.log($(this).html());

            $(this).find('.grupooptions .autoc').each(function(){
              //console.log($(this).html());
              labels = labels + $(this).val()+'--';
            });
           
            labels = labels.substring(0, labels.length-2);

            $(this).find('.grupooptions .valord').each(function(){
              valores = valores + $(this).val()+'--';
            });

            valores = valores.substring(0, valores.length-2);

            labels = labels +'||';
            valores = valores +'||';            
            placeholder = placeholder + '-'+'||';
            classcampo = classcampo + $(this).find('.classcampo').val()+'||';           
            break;

          case 'radio':
            labels = labels + $(this).find('.labelf').val() +'--';
            nombrecampo = nombrecampo + $(this).find('.nombrecampo').val()+'||';


            $(this).find('.gruporadios .autoc').each(function(){
              labels = labels + $(this).val()+'--';
            });
           
            labels = labels.substring(0, labels.length-2);

            $(this).find('.gruporadios .valord').each(function(){
              valores = valores + $(this).val()+'--';
            });

            valores = valores.substring(0, valores.length-2);
            labels = labels +'||';
            valores = valores +'||';             
            placeholder = placeholder + '-'+'||';
            classcampo = classcampo + $(this).find('.classcampo').val()+'||';             
            break;

          case 'checkbox':
            labels = labels + $(this).find('.labelf').val() +'--';
            nombrecampo = nombrecampo + $(this).find('.nombrecampo').val()+'||';

            $('.areaforms .campo .grupochecks .autoc').each(function(){
              labels = labels + $(this).val()+'--';
            });
           
            labels = labels.substring(0, labels.length-2);

           $('.areaforms .campo .grupochecks .valord').each(function(){
              valores = valores + $(this).val()+'--';
            });

            valores = valores.substring(0, valores.length-2);

            labels = labels +'||';
            valores = valores +'||';             
            placeholder = placeholder + '-'+'||';
            classcampo = classcampo + $(this).find('.classcampo').val()+'||';           
            break;

          case 'imagen':
            labels = labels + $(this).find('.labelf').val() +'||';
            nombrecampo = nombrecampo + $(this).find('.nombrecampo').val()+'||';
            valores = valores + '-'+'||';
            placeholder = placeholder + '-'+'||';
            classcampo = classcampo + '-'+'||';          
            break;

           case 'archivos':
            labels = labels + $(this).find('.labelf').val() +'||';
            nombrecampo = nombrecampo + $(this).find('.nombrecampo').val()+'||';
            valores = valores + '-'+'||';
            placeholder = placeholder + '-'+'||';
            classcampo = classcampo + '-'+'||';           
            break;

          case 'enviar':
            labels = labels + $(this).find('.labelf').val() +'||';
            nombrecampo = nombrecampo +'-'+'||';
            valores = valores + '-'+'||';
            placeholder = placeholder + '-'+'||';
            classcampo = classcampo + $(this).find('.classcampo').val()+'||';           
            break;

        }

//console.log('labels='+labels+'\n'+'nombrecampo='+nombrecampo+'\n'+'valores='+valores);
        

  });

var data ={};
data.nombreform = $('#nombre').val();
data.campos=campos;
data.labels=labels;
data.nombrecampo=nombrecampo;
data.placeholder=placeholder;
data.valores=valores;
data.classcampo=classcampo;
data.idc=idc;

  $.ajax({
      type: 'POST',
      data:data,       
      url: '/veesy/forms/saveform',           
      success: function(data) {      
        //console.log(data);  
        if(data)
        	location.href = '/veesy/modules/';

      }
  });

//labels='', nombrecampo='', placeholder='',valores='',classcampo='';
}


function creaaucto(obj,s){

       $(obj).autocomplete({
        source: function(request, response) {
            jQuery.ajax({
                url: '/veesy/modules/datos/'+s,
                dataType: 'json',
                data: {
		            q: request.term
		          },
                success: function(data) {
                    response(data);
                    //console.log(data);
                }
            });
        },
        minLength: 2,
        select: function(event, data) { 

          //var partes = data.item.id.split('|');
            $(this).parent().find('.valord').val(data.item.id); 
        }
    });
}


function listaforms(obj){

       $(obj).autocomplete({
        source: function(request, response) {
            jQuery.ajax({
                url: '/veesy/modules/listforms',
                dataType: 'json',
                data: {
		            q: request.term
		          },
                success: function(data) {
                    response(data);
                    //console.log(data);
                }
            });
        },
        minLength: 2,
        select: function(event, data) { 

          //var partes = data.item.id.split('|');
          //$(this).attr('data_id',data.item.id); 

          var datoo ={};
			datoo.tabla = data.item.value;
          $.ajax({
		      type: 'POST',
		      data:datoo,
		      async:true,       
		      url: '/veesy/modules/listacampos',           
		      success: function(data) {      
		       console.log(data);  
		       $(obj).parent().append(data);

		      }
		  });


        }
    });

     
 
}


  function eliminarforms(tabla,id){
	var data ={};	
	data.tabla=tabla;	
	data.idc= id;	
	$('#f'+id).remove();
		$.ajax({
		    type: 'POST',
		    data:data,       
		    url: '/veesy/forms/eliminartabla',           
		    success: function(data) {
		    	
		            
		      
		    }
		});
 }