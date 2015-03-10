<?php
/**
* 
*/
class Combos
{
	public static function ComboSimple($tabla,$id,$imprime)
	{
		$query = DB::table($tabla)
			->get();
		foreach ($query as $select) {
				echo '<option value="'.$select->$id.'">'.$select->$imprime.'</option>';
			
		}
	}
	public static function CrearCombo()
	{
		$query = DB::table('cms_galeria_cat')
			->get();
		foreach ($query as $select) {
			echo '<option value="'.$select->id.'" >'.$select->nombre.'</option>';
		}
	}

	public static function CrearCombodias()
	{
		$query = DB::table('cms_dias')
			->get();
		foreach ($query as $select) {
			echo '<option value="'.$select->id.'" >'.$select->dia.'</option>';
		}
	}

	public static function CrearCombosede()
	{
		$query = DB::table('cms_sede')
			->get();
		foreach ($query as $select) {
			echo '<option value="'.$select->id.'" >'.$select->sede.'</option>';
		}
	}

	public static function Cargarvideo()
	{
		$query = DB::table('cms_fondos')
			->get();
		foreach ($query as $select) {
			echo $select->video;
		}
	}


	public static function CrearDistrid($id)
	{

		$a = array();
		$horarios = DB::table('cms_horarios')
			->join('cms_dias','cms_dias.id','=','cms_horarios.id_dia')
			->where('cms_horarios.id_sede', '=', $id)
		  	->orderBy('cms_horarios.id_dia', 'ASC')
			->groupBy('cms_horarios.id_dia')
			->get();
		$dias=0;
		$lecciones = DB::table('cms_horarios')
			->where('cms_horarios.id_sede', '=', $id)
		  	->orderBy('cms_horarios.hora_inicio', 'ASC')
		  	->orderBy('cms_horarios.id_dia', 'ASC')
			->get();

			echo '<tr style="background-color: #d3d3d3;">
					<td style="text-align: center; background-color: #fff;"></td>';
		foreach ($horarios as $select) {

			echo '<td>'.$select->dia.'</td>';
			$dias=$dias+1;
		}
			echo '</tr>';
			
			foreach ($lecciones as $lec) {
				$a[] = $lec;
			}
			$c=1;
			echo '<tr>';
			
			for ($i=0; $i < count($a); $i++) { 

				if ($a[$i]->id_dia == 1 && $c<2) {
					 $hoi = strtotime($a[$i]->hora_inicio);
					 $hof = strtotime($a[$i]->hora_fin);
					 $hoii = date("g:i a", $hoi) ;
					 $hoif = date("g:i a", $hof) ;
					echo '<td>'.$hoii.'&nbsp;- '.$hoif.'</td>';
				}
					
					if ($a[$i]->id_dia == $c) {
						echo   '<td>'.$a[$i]->leccion.'</td>';
						$c=$c+1;
					}else
					{
						if ($c==1) {
							 $hoi = strtotime($a[$i]->hora_inicio);
							 $hof = strtotime($a[$i]->hora_fin);
							 $hoii = date("g:i a", $hoi) ;
							 $hoif = date("g:i a", $hof) ;
							echo '<td>'.$hoii.'&nbsp;- '.$hoif.'</td>';
						}
						echo   '<td></td>';
						$c=$c+1;
							if ($c<=$dias) {
							
								echo   '<td>'.$a[$i]->leccion.'</td>';
							$c=$c+1;
							}
						
					}

					if ($c>$dias ) {

						echo '</tr>';
						echo '<tr>';
						if ($a[$i]->id_dia==1) {
							if ($a[$i]->id_dia == 1 ) {
								 $hoi = strtotime($a[$i]->hora_inicio);
								 $hof = strtotime($a[$i]->hora_fin);
								 $hoii = date("g:i a", $hoi) ;
								 $hoif = date("g:i a", $hof) ;
								echo '<td>'.$hoii.'&nbsp;- '.$hoif.'</td>';
							}
							echo   '<td>'.$a[$i]->leccion.'</td>';
							$c=2;	
						}elseif ($a[$i]->id_dia==2 && $c==$dias+1 ) {
							if ($a[$i]->id_dia == 2 || $c == 1) {
								 $hoi = strtotime($a[$i]->hora_inicio);
								 $hof = strtotime($a[$i]->hora_fin);
								 $hoii = date("g:i a", $hoi) ;
								 $hoif = date("g:i a", $hof) ;
								echo '<td>'.$hoii.'&nbsp;- '.$hoif.'</td>';
							}

							echo   '<td></td>';
							echo   '<td>'.$a[$i]->leccion.'</td>';
							$c=3;
						}
						else
						{

							$c=1;
						}
						
					}

			}
			echo '</tr>';

			
					/*echo '<tr>';		

						
						echo '<td>'.$lec->leccion.'   '.$lec->hora_inicio.'   '.$lec->id_dia.'</td>';
					
					echo '</tr>';*/
	}


	public static function mapsede($id){
		if ($id==1) {
			echo '<embed src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3901.0472490560296!2d-77.006918!3d-12.108918000000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTLCsDA2JzMyLjEiUyA3N8KwMDAnMjQuOSJX!5e0!3m2!1ses!2ses!4v1414877844595" width="800" height="600" frameborder="0" style="border:0"></embed>
';
		}elseif($id==2){
			echo '<embed src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1950.5661872161263!2d-77.0587726!3d-12.103089099999996!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTLCsDA2JzExLjEiUyA3N8KwMDMnMzEuNiJX!5e0!3m2!1ses!2ses!4v1414877256975" width="800" height="600" frameborder="0"></embed>
';
		}
	}
	
	
	public static function eventos()
	{
		$dato=DB::table('cm_eventos')
			->orderBy('cm_eventos.id', 'ASC')
			->get();

		foreach ($dato as $row)
		{		
			$rutaimg = 'src="../../images/eventos/'.$row->foto.'"';
			?>
    
    			

				<div class="col-sm-6 col-lg-4 opacity">
						<div class="entry">
							<div class="entry-image">
								<img  <?php echo $rutaimg;?>/>
												
							</div>							
						</div>
					</div>
				
     	<?php
			
		}
	}
/*
	public static function fondo()
	{
		$dato=DB::table('cms_fondos')
			->get();

		foreach ($dato as $row)
		{		
			$ruta = '../../images/parallax/'.$row->fondo_conta.;
			$rutaimg = 'style="background-image: url('.$ruta.');"';
			?>
    
    			

				<div class="full-bg-image" <?php echo $rutaimg;?> > </div>
				
     	<?php
			
		}
	}
*/

	public static function slider_principal()
	{
		$dato=DB::table('cms_sliders')
			->orderBy('cms_sliders.id', 'ASC')
			->get();

		foreach ($dato as $row)
		{		
			$rutaimg = 'style="background-image: url(../../images/slides/'.$row->imagen.');"';
			?>
    
    			<li>
						<div <?php echo $rutaimg;?> class="fullscreen-image">
							<div class="parallax-overlay"></div>
							<div class="header-text-entry">
								<div class="header-text">
                                    
									<h1><?php  echo $row->texto; ?></h1>
								</div>	
							</div>
						</div>
				</li>
				
     	<?php
			
		}
	}

	public static function estaticas_intro()
	{


		$dato=DB::table('cms_estaticas')
			->orderBy('cms_estaticas.id', 'ASC')
			->get();

		foreach ($dato as $row)
		{			
			$rutaimg = 'src="../../images/fotointro/'.$row->foto_introweb.'"';
			?>
			<div class="row">
					
					<div class="col-xs-12">
						<hgroup class="slogan align-center opacity">
							<h1><?php echo $row->titulo_intro; ?></h1>
							<h2><?php echo $row->subtitulo_intro; ?></h2>	
						</hgroup>	
					</div>

				</div>
   			 <div class="row">
				<div class="col-md-7 ">
					
					<img class="opacity" alt="" <?php echo $rutaimg;?>/>
				</div>
				<div class="col-md-5 ">
					<p class="opacity">
						 <?php echo nl2br($row->intro_web);  ?>
					</p>
					
				</div>
			</div>			
			
			<?php
			
		}
	}   

	public static function instructores()
	{

		$dato=DB::table('cms_instructores')
			->orderBy('cms_instructores.id', 'ASC')
			->get();

		foreach ($dato as $row)
		{			
			$rutaimg= 'src="../../images/instructores/'.$row->foto.'"';
			?>
			<article class="scale">
					<div class="contents clearfix">
						<div class="team-info">
							<div class="team-image">

								<a class="single-image team-plus-icon" href="#"><img <?php echo $rutaimg; ?>></a>
							</div>
							<hgroup class="team-group">
							<h2 class="team-title"><?php echo $row->nombre; ?></h2>							
							</hgroup>
						</div>
						<!--/ .team-info-->
						<div class="team-content">
							<div class="team-entry">
								<p>
									<?php echo nl2br($row->intro);  ?>
								</p>
								
								<!--/ .social-icons-->
							</div>
							<!--/ .team-entry-->
						</div>
						<!--/ .team-content-->
					</div>
					<!--/ .contents-->
					</article>
			
			<?php
			
		}
	}

	public static function categorias_galeria()
	{
		$dato=DB::table('cms_galeria_cat')
			->orderBy('cms_galeria_cat.id', 'ASC')
			->get();

		
		foreach ($dato as $row)
		{		
			$datafil = 	'data-filter="'.nl2br($row->id).'"';
			?>
			<li class="filter" <?php echo $datafil;?>><?php echo nl2br($row->nombre);  ?></li>	
			
			<?php
			
		}
	}



	public static function fotos_galeria()
	{
		

		$dato=DB::table('cms_galeria')
			->orderBy('cms_galeria.id', 'ASC')
			->get();
		foreach ($dato as $row)
		{	
		$rutaimg= 'src="../../images/galeria/'.$row->foto.'"';
     		 ?>

		<li class="<?php echo nl2br($row->categoria);  ?> mix mix_all opacity2x">
			<div class="work-item">
				<img <?php echo $rutaimg; ?>>
				<!--<img src="<?php echo nl2br($row->foto);  ?>">-->
				<div class="image-extra">
					<div class="extra-content">
						<div class="inner-extra">							
							<h6 class="extra-category">
							<?php echo nl2br($row->nombre);  ?> </h6>							
							<a class="single-image plus-icon" data-fancybox-group="folio" href="<?php echo nl2br($row->foto);  ?>">Image</a>
						</div>
						<!--/ .inner-extra-->
					</div>
					<!--/ .extra-content-->
				</div>
				<!--/ .image-extra-->
			</div>
		<!--/ .work-item-->
		</li>
      <?php
  		}
	}
}
?>