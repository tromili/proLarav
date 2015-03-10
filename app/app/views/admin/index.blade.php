@include('includes_front.cabecera')
@include('includes_front.menu')

<div id="wrapper">
	<section id="home" class="page">
	<section class="section padding-off">
	<div id="slides">
		<ul class="slides-container">
			<?php Combos::slider_principal(); ?>
		</ul>
		<nav class="slides-navigation">
		<a href="#" class="prev">1</a>
		<a href="#" class="next">2</a>
		</nav>
	</div>
	<!--/ #slides-->
	</section>
	<!--/ .section-->
	</section>
	<!--/ .page-->
	<section id="about" class="page">
	<section class="section">
	<div class="container">
		
			<?php Combos::estaticas_intro(); ?>
	
	</div>
	<!--/ .container-->
	</section>
	
	</section>
	<!--/ .section-->
	<section id="team" class="page">
        <section class="section parallax" style="background-color: #ooo;">
	<div class="full-bg-image full-bg-image-fixed" style=" opacity: 0.07; filter: alpha(opacity = 7);">
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<hgroup class="section-title align-center opacity">
				<h1>NUESTROS INSTRUCTORES</h1>
				<h2>MAS QUE UN EQUIPO UNA GRAN FAMILIA</h2>
				</hgroup>
			</div>
		</div>
		<!--/ .row-->
	</div>
	<!--/ .container-->
	<section class="team-member">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="team-contents clearfix">

					<?php Combos::instructores(); ?>
					
				</div>
				<!--/ .team-contents-->
			</div>
		</div>
		<!--/ .row-->
	</div>
	<!--/ .container-->
	</section>
	<!--/ .team-member-->
	</section>
	<!--/ .section-->
	
	<!--/ .section-->
	</section>
	<!--/ .page-->
    <section class="page" id="horarios">
    <section class="section " style="background-color: #f8f8f8;">
	<div class="container">
		<div class="row">
			<div class="col-md-12 ">
				<h1 class="theme-title website-general-color opacity" style="font-weight: 100; text-align: center; margin-bottom: 15px; font-size: 60px; ">HORARIOS</h1>
				<h2 class="theme-title border-title opacity" style="font-weight: 300; text-align: center; margin-bottom: 70px; ">VEN Y PRUEBA NUESTRO ESTILO DE ENTRENAMIENTO</h2>
			</div>
		</div>
		<!--/ .row-->
		<div class="row">
			<div class="col-md-12 ">
				<div class="tabs-holder">
					<ul class="tabs-nav">
						<li class="active"><a href="#">Sede San Borja</a></li>
						<li><a href="#">Sede San Isidro</a></li>
					</ul>
					<div class="tabs-container">
						@foreach($horarios as $hora)

						<div class="tab-content">
							<p>
								{{$hora->direccion}}
							</p>
							<table style="" border="1" cellspacing="1" cellpadding="1" border="1px solid black">
							<tbody>
                             	
									<?php Combos::CrearDistrid($hora->id); ?>
                             		

							</tbody>
							</table>
							<div class="google-maps">
								<?php Combos::mapsede($hora->id); ?>
							</div>
						</div>
						
						@endforeach
					</div>
					<!--/ .tabs-container-->
				</div>
				<!--/ .team-member-->
			</div>
		</div>
		<!--/ .row-->
	</div>
	<!--/ .container-->
	</section>
</section>
<section class="section parallax" style="">
	<div class="parallax-overlay">
	</div>
	<div class="full-bg-image full-bg-image-fixed" style=" opacity: 1; filter: alpha(opacity = 100);">
	</div>
	<!--/ .container-->
	</section>
	<section class="page" id="services">
	<section class="section " style="">
	<div class="container">
		<div class="row">
			<div class="col-md-12 ">
				<h1 class="theme-title website-general-color opacity" style="font-weight: 100; text-align: center; font-size: 60px; ">NUESTROS ÚLTIMOS EVENTOS</h1>
				<h2 class="theme-title border-title opacity" style="font-weight: 300; text-align: center; margin-bottom: 70px; ">MANTENTE AL TANTO PARA FORMAR PARTE DE ELLOS</h2>
			</div>
		</div>
		<!--/ .row-->
		<div class="row">
			<div class="col-md-12 ">
				<div class="row">		
				<?php Combos::eventos(); ?>
                    
				</div>
				
			</div>
		</div>
		<!--/ .row-->
	</div>
	<!--/ .container-->
	</section>
	<!--/ .section-->
	<section class="section parallax" style="">
	<div class="parallax-overlay">
	</div>
	<div class="full-bg-image full-bg-image-fixed" style=" opacity: 1; filter: alpha(opacity = 100);">
	</div>
	<!--/ .container-->
	</section>
	<!--/ .section-->
	<!--/ .section-->
	</section>
    <section id="folio" class="page">
	<section class="section padding-bottom-off">
	<section class="page" id="blog">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<hgroup class="section-title align-center opacity">
				<h1>Galería de fotos</h1>
				</hgroup>
			</div>
		</div>
		<!--/ .row-->
		<div class="row">
			<div class="col-xs-12">
				<ul id="portfolio-filter" class="portfolio-filter opacity">
					<li class="filter active" data-filter="all">Todas</li>
					 <?php Combos::categorias_galeria(); ?>
				</ul>
				<!--/ #portfolio-filter -->
			</div>
		</div>
		<!--/ .row-->
	</div>
	<!--/ .container-->
	<ul id="portfolio-items" class="portfolio-items">
		
		<?php Combos::fotos_galeria(); ?>
		
	</ul>
	<!--/ .portfolio-items-->
	</section>
	<!--/ .section-->
	</section>
	
	<!-- - - - - - - - - - - - - - Footer - - - - - - - - - - - - - - - - -->
  <section class="page" id="contacts">
  <footer id="footer">
  <section class="section parallax parallax-bg-4">
  @foreach($fond as $fondo)
  <div class="full-bg-image" style="background-image: url(../../images/parallax/{{$fondo->fondo_conta}});">
  @endforeach
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-6 opacity">
        @if(Session::has('status'))
            <div class="alert alert-success alert-dismissable">
               	<button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>{{ Session::get('status') }}</strong>
            </div>
        @endif
        {{Form::open(array('url'=>'/contacto/','files'=>true,'class'=>'form-horizontal'))}}
          <p class="input-block">
            <input type="text" name="nombre" id="name" placeholder="Name *"/>
          </p>
          <p class="input-block">
            <input type="email" name="email" id="email" placeholder="Email *"/>
          </p>
          <p class="input-block">
            <input type="url" name="website" id="url" placeholder="Website"/>
          </p>
          <p class="input-block">
            <textarea name="mensaje" id="message" placeholder="Message *"></textarea>
          </p>
          <p class="input-block">
            <button class="button turquoise submit" type="submit" id="submit"><i class="icon-paper-plane-2"></i></button>
          </p>
        </form>
        <!--/ .contact-form-->
      </div>
      <div class="col-md-6">
        <div id="text-2" class="widget widget_text">
          <div class="textwidget opacityRun">
            @foreach($conta as $cont)
              <p>{{$cont->texto_intro}}</p>
              
             
            @endforeach
          </div>
        </div>
        <div class="widget widget_social clearfix">
          <ul class="social-icons clearfix opacityRun">
            <li class="facebook">
            <a title="Facebook" target="_blank" href="https://www.facebook.com/pages/Bushido-Fight-Team/356701547693274?fref=ts"><i class="icon-facebook"></i>Facebook</a>
            </li>
            
            <li class="youtube">
            <a title="Youtube" target="_blank" href="https://youtube.com/"><i class="icon-youtube"></i>Youtube</a>
            </li>
          </ul>
          <!--/ .social-list-->
        </div>
        <!--/ .widget_social-->
      </div>
      <div class="col-md-6">
        <div class="widget widget_text opacity">
          <?php //$dato->estaticas_contacto(); ?>
        </div>
                
        <!--/ .widget
        <div class="widget widget_social opacity">
          <ul class="social-icons">
            
            <li class="facebook"><a href="#"><i class="icon-facebook"></i>Facebook</a></li>
            
          </ul>
          <!--/ .social-icons-->
        </div>
        <!--/ .widget-->
      </div>
    </div>
    <!--/ .row-->
  </div>
  <!--/ .container-->
  </section>
  <!--/ .section-->
  <div class="logo-in-footer">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <h1><img src="images/logo_horizontal_blanco.png" width="288" height="92"></h1>
        </div>
      </div>
      <!--/ .row-->
    </div>
    <!--/ .container-->
  </div>
  <!--/ .logo-in-footer-->
  <div class="bottom-footer clearfix">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <div class="copyright">
             Bushido © 2015. Todos los derechos reservados.
          </div>
          <!--/ .cppyright-->
        </div>
        <div class="col-sm-3 col-sm-offset-3">
          <div class="developed">
             Developed by <a target="_blank" href="http://apros.pe/">Apros</a> & Estudio Urbano
          </div>
          <!--/ .developed-->
        </div>
      </div>
      <!--/ .row-->
    </div>
    <!--/ .container-->
  </div>
  <!--/ .bottom-footer-->
  </footer>





@include('includes_front.piedepagina')