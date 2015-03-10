@include('includes_admin.cabecera')
@include('includes_admin.menu')

<div class="page-container">
  <!-- BEGIN PAGE HEAD -->
  <div class="page-head">
    <div class="container">
      <!-- BEGIN PAGE TITLE -->
      <div class="page-title">
        <h1>¡Hola! Aca puedes actualizar muchos de los contenidos, solo ten en cuenta que cada bloque trabaja independiente. Recuerda presionar el boton verde para guardar los cambios.</h1>
      </div>
      <!-- END PAGE TITLE -->
      <!-- BEGIN PAGE TOOLBAR -->
      <div class="page-toolbar">
      </div>
      <!-- END PAGE TOOLBAR -->
    </div>
  </div>
  <!-- END PAGE HEAD -->
  <!-- BEGIN PAGE CONTENT -->
  <div class="page-content">
    <div class="container">
      <!-- BEGIN PAGE CONTENT INNER -->
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-6">
            <div class="portlet box blue">
              <div class="portlet-title">
                <div class="caption">
                   Slides rotativos
                </div>
              </div>
              <div class="portlet-body form">
                          <!-- BEGIN FORM-->
                <div class="row" style="margin-left: 30px;margin-right: auto;">
                  <div class="col-md-11" >
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                           <!-- <th>
                             #
                          </th>-->
                         
                          <th>
                             Imagen
                          </th>
                             <th>
                             Texto
                          </th>
                          <th>
                             Editar
                          </th>
                          <th>
                             Eliminar
                          </th>
                          
                        </tr>
                        </thead>
                    <div class="row mix-grid thumbnails">
                      @foreach($slid as $slide)
                      <tr>
                        <div class=" col-md-4 product-item">
                          <div class="pi-img-wrapper" >
                            <div >
                              <!--<td style=" ">
                                {{$slide->id}}
                              </td>-->
                              
                              <td style=" margin: 15px;padding: 15px;">
                                <img src="{{asset('images/slides/'.$slide->imagen)}}" class="img-responsive" alt="Berry Lace Dress" style="height: 40px;width: 40px;">
                              </td>
                              <td style=" margin: 15px;padding: 15px; ">
                                <h5>{{$slide->texto}}</h5>
                              </td>
                                <td style=" margin: 15px;padding: 15px;">
                                <a href="<?=URL::to('admin/editarslider/'.$slide->id); ?>"><i class="fa fa-edit"></i></a>
                              </td>
                              <td class="lna" id="{{$slide->id}}">
                                <a href="javascript:;" class="eliminarEtp"><i class="fa fa-times"></i></a>
                              </td>
                            </div>         
                          </div>     
                        </div>
                      </tr>
                      @endforeach
                     <div class="space" style="height: 50px!important; clear: both!important;"></div>
                    </div>
                    </table>
                  </div>
                </div>
                          <!-- END FORM-->
              
                <!-- BEGIN FORM-->
                {{Form::open(array('url'=>'admin/nslider/','files'=>true,'class'=>'form-horizontal'))}}
                  <div class="form-body">
                    <div class="form-group">
                      <label class="col-md-4 control-label">Carga una nueva imagen desde tu pc</label>
                      <div class="col-md-8">
                        <input type="file" name="imagesl" id="exampleInputFile">
                      </div>
                    </div>
                    <div class="row" style="margin-left: 80px;margin-right: auto;">
                      <div class="col-md-11" >
                        <div class="row mix-grid thumbnails">
                        </div>
                      </div>
                    </div>
                    <div class="space" style="height: 50px!important; clear: both!important;"></div>
                    <div class="form-group">
                      <label class="control-label col-md-4">Coloca el texto que irá sobre la imagen</label>
                      <div class="col-md-8">
                        <textarea class="wysihtml5 form-control" rows="6" name="texto" ></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="form-actions fluid">
                    <div class="row">
                      <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn green">Click aquí agregar al carrusel</button>
                        <!--<button type="button" class="btn default">Cancelar</button>-->
                      </div>
                    </div>
                  </div>
                </form>
                          <!-- END FORM-->
              </div>
            </div>
            
          </div>
          <div class="col-md-6">
            <div class="portlet box blue">
              <div class="portlet-title">
                <div class="caption">
                   Introduccion Bushido - Modern Jujitsu
                </div>
              </div>
              <div class="portlet-body form">
                <!-- BEGIN FORM-->
                {{Form::open(array('url'=>'admin/actextointro/','files'=>true,'class'=>'form-horizontal'))}}
                  <div class="form-body">
                    <div class="form-group">
                      @foreach($textinf as $textin)
                      <label class="control-label col-md-2">Titulo </label>
                      <div class="col-md-10">
                        <input type="text" name="titulointro" value="{{$textin->titulo_intro}}" class="form-control" placeholder="">
                      </div>
                      <div class="space" style="height: 50px!important; clear: both!important;"></div>

                      <label class="control-label col-md-2">Subtitulo </label>
                      <div class="col-md-10">
                        <input type="text" name="subtitulointro" value="{{$textin->subtitulo_intro}}" class="form-control" placeholder="">
                      </div>
                      <div class="space" style="height: 50px!important; clear: both!important;"></div>

                      <div class="form-group">
                      <label class="col-md-3 control-label">Imagen (selecciona otra para reemplazar)</label>
                      <div class="col-md-9">
                        <input type="file" name="fotointro" id="exampleInputFile">
                      </div>
                      </div>
                      <div class="row" style="margin-left: 80px;margin-right: auto;">
                        <div class="col-md-11" >
                          <div class="row mix-grid thumbnails">
                            <div class=" col-md-4 product-item">
                              <div class="pi-img-wrapper" >
          
                                <img src="{{asset('images/fotointro/'.$textin->foto_introweb)}}" class="img-responsive" alt="Berry Lace Dress">
                              </div>    
                            </div>     
                          </div>
                        </div>
                      </div>
                      <div class="space" style="height: 50px!important; clear: both!important;"></div>
                      <label class="control-label col-md-2">Texto introductorio </label>
                      <div class="col-md-10">
                        <textarea class="wysihtml5 form-control" rows="6" name="introweb" >{{$textin->intro_web}}</textarea>
                      </div>
                      <!--<div class="space" style="height: 50px!important; clear: both!important;"></div>
                      <label class="control-label col-md-2">Contacto </label>
                      <div class="col-md-10">
                        <textarea class="wysihtml5 form-control" rows="6" name="contacto" >{{$textin->contacto}}</textarea>
                      </div>-->
                      <div class="space" style="height: 50px!important; clear: both!important;"></div>
                    <div class="row" style="margin-left: 80px;margin-right: auto;">
                      <div class="col-md-11" >
                        <div class="row mix-grid thumbnails">
                        </div>
                      </div>
                    </div>

                    @endforeach
                    </div>
                  </div>
                  <div class="form-actions fluid">
                    <div class="row">
                      <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn green">Guardar cambios</button>
                       <!-- <button type="button" class="btn default">Cancelar</button>-->
                      </div>
                    </div>
                  </div>
                </form>
                          <!-- END FORM-->
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="portlet box blue">
              <div class="portlet-title">
                <div class="caption">
                   Profesores
                </div>
              </div>
              <div class="portlet-body form">
                          <!-- BEGIN FORM-->
                <div class="row" style="margin-left: 30px;margin-right: auto;">
                  <div class="col-md-11" >
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                         <!-- <th>
                             #
                          </th>-->
                          <th>
                             Nombre
                          </th>
                           <th>
                             Intro
                          </th>
                          <th>
                             Foto
                          </th>
                          <th>
                             Editar
                          </th>
                          <th>
                             Eliminar
                          </th>
                          
                        </tr>
                        </thead>
                    <div class="row mix-grid thumbnails">
                      @foreach($instru as $instr)
                      <tr>
                        <div class=" col-md-4 product-item">
                          <div class="pi-img-wrapper" >
                            <div >
                             <!-- <td style=" ">
                                {{$instr->id}}
                              </td>-->
                               <td style=" margin: 15px;padding: 15px; ">
                                <h5>{{$instr->nombre}}</h5>
                              </td>
                              <td style=" margin: 15px;padding: 15px; ">
                                <h5>{{$instr->intro}}</h5>
                              </td>
                              <td>  
                                <img src="{{asset('images/instructores/'.$instr->foto)}}" class="img-responsive" alt="Berry Lace Dress" style="height: 40px;width: 40px;">
                              </td>
                               <td style=" margin: 15px;padding: 15px;">
                                <a href="<?=URL::to('admin/editarentrenador/'.$instr->id); ?>"><i class="fa fa-edit"></i></a>
                              </td>
                              <td class="lnai" id="{{$instr->id}}">
                                <a href="javascript:;" class="eliminarEtpins"><i class="fa fa-times"></i></a>
                              </td>
                            </div>         
                          </div>     
                        </div>
                      </tr>
                      @endforeach
                     <div class="space" style="height: 50px!important; clear: both!important;"></div>
                    </div>
                  </table>
                  </div>
                </div>
                          <!-- END FORM-->
            
                <!-- BEGIN FORM-->
                {{Form::open(array('url'=>'admin/nentre/','files'=>true,'class'=>'form-horizontal'))}}
                  <div class="form-body">
                    <div class="form-group">
                      <label class="control-label col-md-2">Nombre</label>
                      <div class="col-md-10">
                         <input type="text" name="nombre" value="" class="form-control" placeholder="">
                      </div>
                      <div class="space" style="height: 50px!important; clear: both!important;"></div>
                      <div class="form-group">
                      <label class="col-md-3 control-label">Foto</label>
                      <div class="col-md-9">
                        <input type="file" name="foto" id="exampleInputFile">
                      </div>
                      </div>
                     
                      <div class="space" style="height: 50px!important; clear: both!important;"></div>
                     
                      <label class="col-md-3 control-label" >Intro</label>
                      <div class="col-md-9">
                        <textarea class="wysihtml5 form-control" rows="6" name="intro" ></textarea>
                      </div>
                    <div class="row" style="margin-left: 80px;margin-right: auto;">
                      <div class="col-md-11" >
                        <div class="row mix-grid thumbnails">
                        </div>
                      </div>
                    </div>
                    </div>
                  </div>
                  <div class="form-actions fluid">
                    <div class="row">
                      <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn green">Guardar cambios</button>
                        <!--<button type="button" class="btn default">Cancelar</button>-->
                      </div>
                    </div>
                  </div>
                </form>
                          <!-- END FORM-->
              </div>
            </div>
             
          </div>
      <div class="col-md-6">
            <div class="portlet box blue">
              <div class="portlet-title">
                <div class="caption">
                   Galería de fotos
                </div>
              </div>
              <div class="portlet-body form">
                          <!-- BEGIN FORM-->
                <div class="row" style="margin-left: 30px;margin-right: auto;">
                  <div class="col-md-11" >
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                         <!-- <th>
                             #
                          </th>-->
                          <th>
                             Foto
                          </th>
                           <th>
                             Categoría
                          </th>
                            <th>
                            Texto
                          </th>
                           
                          
                          <th>
                             Editar
                          </th>
                          <th>
                             Eliminar
                          </th>
                          
                        </tr>
                        </thead>
                    <div class="row mix-grid thumbnails">
                      @foreach($galer as $gal)
                      <tr>
                        <div class=" col-md-4 product-item">
                          <div class="pi-img-wrapper" >
                            <div >
                              <!--<td style=" ">
                                {{$gal->id}}
                              </td>-->
                              <td>
                                <img src="{{asset('images/galeria/'.$gal->foto)}}" class="img-responsive" alt="Berry Lace Dress" style="height: 40px;width: 40px;">
                              </td>
                              <td style=" margin: 15px;padding: 15px; ">
                                <h5><?php if ($gal->categoria==1) {
                                  echo 'Guardia y Raspados';}
                                  elseif($gal->categoria==2){echo 'Escapes';}
                                  elseif ($gal->categoria==3) {
                                    echo 'Finalizaciones';
                                  }elseif ($gal->categoria==4) {
                                    echo 'Drills';
                                  }?></h5>
                              </td>
                              <td style=" margin: 15px;padding: 15px; ">
                                <h5>{{$gal->nombre}}</h5>
                              </td>
                               <td style=" margin: 15px;padding: 15px;">
                                <a href="<?=URL::to('admin/editargaleria/'.$gal->id); ?>"><i class="fa fa-edit"></i></a>
                              </td>
                              <td class="lnag" id="{{$gal->id}}">
                                <a href="javascript:;" class="eliminarEtpga"><i class="fa fa-times"></i></a>
                              </td>
                            </div>         
                          </div>     
                        </div>
                      </tr>
                      @endforeach
                     <div class="space" style="height: 50px!important; clear: both!important;"></div>
                    </div>
                    </table>
                  </div>
                </div>
                          <!-- END FORM-->
              </div>
                <div class="portlet-body form">
                <!-- BEGIN FORM-->
                {{Form::open(array('url'=>'admin/ngaler/','files'=>true,'class'=>'form-horizontal'))}}
                  <div class="form-body">
                    <div class="form-group">
                      <div class="form-group">
                      <label class="col-md-3 control-label">Foto</label>
                      <div class="col-md-9">
                        <input type="file" name="foto" id="exampleInputFile">
                      </div>
                      </div>
                     
                      <div class="space" style="height: 50px!important; clear: both!important;"></div>
                      
                        <label class="col-md-3 control-label" >Categoría</label>
                      <div class="col-md-9">
                          <select class="form-control" name="categoria">
                            <?php Combos::CrearCombo(); ?>
                          </select>
                      </div>
                      <div class="space" style="height: 50px!important; clear: both!important;"></div>
                        
                        <label class="control-label col-md-3">Texto</label>
                      <div class="col-md-9">
                         <input type="text" name="nombre" value="" class="form-control" placeholder="">
                      </div>
                      
                     
                      
                    <div class="row" style="margin-left: 80px;margin-right: auto;">
                      <div class="col-md-11" >
                        <div class="row mix-grid thumbnails">
                        </div>
                      </div>
                    </div>
                    </div>
                  </div>
                  <div class="form-actions fluid">
                    <div class="row">
                      <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn green">Agregar</button>
                      <!--  <button type="button" class="btn default">Cancelar</button>-->
                      </div>
                    </div>
                  </div>
                </form>
                          <!-- END FORM-->
              </div>
            </div>
             
          </div>
          
          <div class="col-md-6">
            <div class="portlet box blue">
              <div class="portlet-title">
                <div class="caption">
                   Eventos organizados por bushido
                </div>
              </div>
              <div class="portlet-body form">
                          <!-- BEGIN FORM-->
                <div class="row" style="margin-left: 80px;margin-right: auto;">
                  <div class="col-md-11" >
                    <div class="row mix-grid thumbnails">
                      @foreach($even as $event)
                        <div class=" col-md-4 product-item">
                          <div class="pi-img-wrapper" >
                            <div class="lnae" id="{{$event->id}}">
                              <a href="javascript:;" class="eliminarEtpe"><i class="fa fa-times"></i></a>
                                <img src="{{asset('images/eventos/'.$event->foto)}}" class="img-responsive" alt="Berry Lace Dress">
                            </div>         
                          </div>     
                        </div>
                      @endforeach
                     <div class="space" style="height: 50px!important; clear: both!important;"></div>
                    </div>
                  </div>
                </div>
                          <!-- END FORM-->
              
                <!-- BEGIN FORM-->
                {{Form::open(array('url'=>'admin/nevent/','files'=>true,'class'=>'form-horizontal'))}}
                  <div class="form-body">
                    <div class="form-group">
                      <label class="col-md-3 control-label">Banner de evento</label>
                      <div class="col-md-9">
                        <input type="file" name="foto" id="exampleInputFile">
                      </div>
                    </div>
                    <div class="row" style="margin-left: 80px;margin-right: auto;">
                      <div class="col-md-11" >
                        <div class="row mix-grid thumbnails">
                        </div>
                      </div>
                    </div>
                    
                  </div>
                  <div class="form-actions fluid">
                    <div class="row">
                      <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn green">Subir nuevo banner de evento</button>
                        <!--<button type="button" class="btn default">Cancelar</button>-->
                      </div>
                    </div>
                  </div>
                </form>
                          <!-- END FORM-->
              </div>
            </div>
            
          </div>
<div class="row">          
<div class="col-md-12">
              <div class="col-md-6">
            <div class="portlet box blue">
              <div class="portlet-title">
                <div class="caption">
                   Agregar nuevo horario de entrenamiento
                </div>
              </div>
              <div class="portlet-body form">
                <!-- BEGIN FORM-->
                  <div class="form-body">
                    <div class="form-group">
                      
                      <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                      {{Form::open(array('url'=>'admin/nhora/','files'=>true,'class'=>'form-horizontal'))}}
                        <form action="javascript:;" class="form-horizontal form-bordered">
                          <div class="form-body form">
                            

                            <label class="col-md-3 control-label" >Sede</label>
                            <div class="col-md-9">
                                <select class="form-control" name="sede">
                                  <?php Combos::CrearCombosede(); ?>
                                </select>
                            </div>
                             
                           
                            <label class="col-md-3 control-label" >Dia</label>
                            <div class="col-md-9">
                                <select class="form-control" name="dia">
                                  <?php Combos::CrearCombodias(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3">Hora de inicio</label>
                              <div class="col-md-3">
                                <div class="input-group">
                                  <input type="text" class="form-control timepicker timepicker-24" name="horai">
                                  <span class="input-group-btn">
                                  <button class="btn default" type="button"><i class="fa fa-clock-o"></i></button>
                                  </span>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3">Hora de fin</label>
                             <div class="col-md-3">
                                <div class="input-group">
                                  <input type="text" class="form-control timepicker timepicker-24" name="horaf">
                                  <span class="input-group-btn">
                                  <button class="btn default" type="button"><i class="fa fa-clock-o"></i></button>
                                  </span>
                                </div>
                              </div>
                            </div>
                            <label class="control-label col-md-2">leccion</label>
                            <div class="col-md-10">
                               <input type="text" name="leccion" value="" class="form-control" placeholder="">
                            </div>


                             <div class="form-actions fluid">
                              <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                  <button type="submit" class="btn green">Agregar</button>
                                 <!-- <button type="button" class="btn default">Cancelar</button>-->
                                </div>
                              </div>
                            </div>
                          
                          </div>
                        </form>
                        
                        <!-- END FORM-->
                      </div>
                    </div>
                   
                    
                  </div>
                 
               
                          <!-- END FORM-->
              </div>
            </div></div>
    <div class="col-md-6">
            <div class="portlet box blue">
              <div class="portlet-title">
                <div class="caption">
                  Horarios actuales
                </div>
              </div>
              <div class="portlet-body form">
                          <!-- BEGIN FORM-->
                <div class="row" style="margin-left: 30px;margin-right: auto;">
                  <div class="col-md-11" >
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>
                             #
                          </th>
                          <th>
                             Id_sede
                          </th>
                           <th>
                             Id_dia
                          </th>
                          <th>
                             Hora inicio
                          </th>
                          <th>
                             Hora fin
                          </th>
                          <th>
                             Leccion
                          </th>
                          <th>
                             Eliminar
                          </th>
                          
                        </tr>
                        </thead>
                    <div class="row mix-grid thumbnails">
                      @foreach($hor as $hora)
                      <tr>
                        <div class=" col-md-4 product-item">
                          <div class="pi-img-wrapper" >
                            <div >
                              <td style=" ">
                                {{$hora->id}}
                              </td>
                               <td style=" margin: 15px;padding: 15px; ">
                                <h5>{{$hora->id_sede}}</h5>
                              </td>
                              <td style=" margin: 15px;padding: 15px; ">
                                <h5>{{$hora->id_dia}}</h5>
                              </td>
                              <td style=" margin: 15px;padding: 15px; ">
                                <h5>{{$hora->hora_inicio}}</h5>
                              </td>
                               <td style=" margin: 15px;padding: 15px; ">
                                <h5>{{$hora->hora_fin}}</h5>
                              </td>
                              <td style=" margin: 15px;padding: 15px; ">
                                <h5>{{$hora->leccion}}</h5>
                              </td>
                              <td class="lnaho" id="{{$hora->id}}">
                                <a href="javascript:;" class="eliminarEtpho"><i class="fa fa-times"></i></a>
                              </td>
                            </div>         
                          </div>     
                        </div>
                      </tr>
                      @endforeach
                     <div class="space" style="height: 50px!important; clear: both!important;"></div>
                    </div>
                  </table>
                  </div>
                </div>
                          <!-- END FORM-->
              </div>
            </div>
          </div></div></div>
          <div class="col-md-6">
            <div class="portlet box blue">
              <div class="portlet-title">
                <div class="caption">
                   Formulario de contacto
                </div>
              </div>
              <div class="portlet-body form">
                <!-- BEGIN FORM-->
                {{Form::open(array('url'=>'admin/ncontac/','files'=>true,'class'=>'form-horizontal'))}}
                  <div class="form-body">
                    <div class="form-group">
                      @foreach($conta as $cont)
                      <label class="control-label col-md-2">Email destino</label>
                      <div class="col-md-10">
                         <input type="text" name="email" value="{{$cont->email}}" class="form-control" placeholder="">
                      </div>
                      <div class="space" style="height: 50px!important; clear: both!important;"></div>

                      <label class="col-md-3 control-label" >Texto cierre</label>
                      <div class="col-md-9">
                        <textarea class="wysihtml5 form-control" rows="6" name="intro" >{{$cont->texto_intro}}</textarea>
                      </div>

                      <!--<label class="col-md-3 control-label" >Parrafo 2</label>
                      <div class="col-md-9">
                        <textarea class="wysihtml5 form-control" rows="6" name="anexo" >{{$cont->anexo}}</textarea>
                      </div>-->
                    <div class="row" style="margin-left: 80px;margin-right: auto;">
                      <div class="col-md-11" >
                        <div class="row mix-grid thumbnails">
                        </div>
                      </div>
                    </div>
                    @endforeach
                    </div>
                  </div>
                  <div class="form-actions fluid">
                    <div class="row">
                      <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn green">Guardar cambios</button>
                     <!--   <button type="button" class="btn default">Cancelar</button>-->
                      </div>
                    </div>
                  </div>
                </form>
                          <!-- END FORM-->
              </div>
            </div>
             
          </div>
          <div class="col-md-6">
            <div class="portlet box blue">
              <div class="portlet-title">
                <div class="caption">
                   Fondos
                </div>
              </div>
              <div class="portlet-body form">
                <!-- BEGIN FORM-->
                {{Form::open(array('url'=>'admin/nfondo/','files'=>true,'class'=>'form-horizontal'))}}
                  <div class="form-body">
                    <div class="form-group">
                      <label class="col-md-3 control-label">Foto pie de página</label>
                      <div class="col-md-9">
                        <input type="file" name="foto" id="exampleInputFile">
                      </div>
                    </div>
                    <div class="form-group">
                     <label class="col-md-3 control-label" >Video</label>
                      <div class="col-md-9">
                        <textarea class="wysihtml5 form-control" rows="6" name="video" ></textarea>
                      </div>
                    </div>
                    
                    
                  </div>
                  <div class="form-actions fluid">
                    <div class="row">
                      <div class="col-md-offset-3 col-md-9">
                       
                       <!-- <button type="button" class="btn default">Cancelar</button>-->
                      </div>
                    </div>
                  </div>
                </form>
                          <!-- END FORM-->
              </div>
            </div>
            
          </div>
        </div>
      <!-- END PAGE CONTENT INNER -->
      </div>
    </div>
  <!-- END PAGE CONTENT -->
  </div>



<script type="text/javascript">
   //Add Etapas
  $('.eliminarEtp').click(function(){
    var data={};
    data.ides=$(this).parent().parent().find('.lna').attr('id');
    var elimianr = $(this).parent().parent();

    $.ajax({
      type: 'POST',
      data:data,      
      url: '../imgs/imgslider',           
      success: function(data) {
        $(elimianr).remove();
        console.log(data);
      }
    });
  });

   $('.eliminarEtpho').click(function(){
    var data={};
    data.ides=$(this).parent().parent().find('.lnaho').attr('id');
    var elimianr = $(this).parent().parent();
    console.log(data.ides);
    $.ajax({
      type: 'POST',
      data:data,      
      url: '../imgs/horasd',           
      success: function(data) {
        $(elimianr).remove();
        console.log(data);
      }
    });
  });

   $('.eliminarEtpe').click(function(){
    var data={};
    data.ides=$(this).parent().parent().find('.lnae').attr('id');
    var elimianr = $(this).parent().parent();

    $.ajax({
      type: 'POST',
      data:data,      
      url: '../imgs/event',           
      success: function(data) {
        $(elimianr).remove();
        console.log(data);
      }
    });
  });

  $('.eliminarEtpga').click(function(){
    var data={};
    data.ides=$(this).parent().parent().find('.lnag').attr('id');
    var elimianr = $(this).parent().parent();
    console.log(data.ides);
    $.ajax({
      type: 'POST',
      data:data,      
      url: '../imgs/galer',           
      success: function(data) {
        $(elimianr).remove();
        console.log(data);
      }
    });
  });

   $('.eliminarEtpins').click(function(){
    var data={};
    data.ides=$(this).parent().parent().find('.lnai').attr('id');
    var elimianr = $(this).parent().parent();

    $.ajax({
      type: 'POST',
      data:data,      
      url: '../imgs/instru',           
      success: function(data) {
        $(elimianr).remove();
        console.log(data);
      }
    });
  });
 



 
</script>

@include('includes_admin.piedepagina')