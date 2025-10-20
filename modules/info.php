<?php
/**
 * WebEngine CMS
 * https://webenginecms.org/
 * 
 * @version 1.2.1
 * @author Lautaro Angelico <http://lautaroangelico.com/>
 * @copyright (c) 2013-2020 Lautaro Angelico, All Rights Reserved
 * 
 * Licensed under the MIT license
 * http://opensource.org/licenses/MIT
 */

// Module Title
echo '<div class="page-title"><span>'.lang('module_titles_txt_17').'</span></div>';

?>

<!-- SERVER STATISTICS -->
<div class="background-universal">
	 <div class="page-info-container">
		<div class="warning-donation">
			<i class="fa-solid fa-triangle-exclamation"></i>
			<h4>IMPORTANTE: Nuestro modo de comunicación es nuestro <a href="https://discord.gg/Vtcktf7jB7" target=blank>Discord</a>. Únete para estar al tanto de todas las noticias.</h4>
		</div>
		<!-- Información del Servidor -->
<div class="table-responsive rounded-3 shadow mb-4 overflow-hidden">
  <table class="table table-hover text-white align-middle mb-0">
    <thead class="bg-primary text-white text-center">
      <tr>
        <th colspan="2">Información del Servidor</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Server Version</td>
        <td><?php echo config('server_info_season'); ?></td>
      </tr>
      <tr>
        <td>Experience</td>
        <td><?php echo config('server_info_exp'); ?></td>
      </tr>
      <tr>
        <td>Drop</td>
        <td><?php echo config('server_info_drop'); ?></td>
      </tr>
    </tbody>
  </table>
</div>

<!-- Información VIP -->
<div class="table-responsive rounded-3 shadow overflow-hidden">
  <table class="table table-hover text-white align-middle mb-0">
    <thead class="bg-primary text-white text-center">
      <tr>
        <th colspan="2">Información VIP</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Experience</td>
        <td>VIP1: x200 | VIP2: x250</td>
      </tr>
      <tr>
        <td>Drop</td>
        <td>VIP1: 50% | VIP2: 55%</td>
      </tr>
      <tr>
        <td>Nivel Reset</td>
        <td>VIP1: 390 | VIP2: 380</td>
      </tr>
      <tr>
        <td>Acceso a Mapas</td>
        <td>VIP1: Land, Kanturu, Raklion y Tirgus</td>
      </tr>
      <tr>
        <td></td>
        <td>VIP2: Land, Kanturu, Raklion, Tirgus y Crywolf</td>
      </tr>
    </tbody>
  </table>
</div>

		 
		 <br />
		 
		 <!-- CHAOS MACHINE RATES -->
		 <h2 class="unicial mb-3 text-white">Chaos Machine</h2>

<div class="table-responsive rounded-3 shadow overflow-hidden">
  <table class="table table-hover text-white align-middle mb-0">
    <thead class="bg-primary text-white text-center">
      <tr>
        <th rowspan="2" class="align-middle" style="width:30%;">Combination</th>
        <th colspan="2">Maximum Success Rate</th>
      </tr>
      <tr>
        <th style="width:30%;">Normal</th>
        <th style="width:30%;">VIP1 / VIP2</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Item Luck</td>
        <td class="text-center">20%</td>
        <td class="text-center">21% / 22%</td>
      </tr>
      <tr>
        <td>Items +10</td>
        <td class="text-center">50% + Luck</td>
        <td class="text-center">55% / 60% + Luck</td>
      </tr>
      <tr>
        <td>Items +11</td>
        <td class="text-center">40% + Luck</td>
        <td class="text-center">45% / 50% + Luck</td>
      </tr>
      <tr>
        <td>Wings Level 1</td>
        <td class="text-center">65%</td>
        <td class="text-center">70% / 70%</td>
      </tr>
      <tr>
        <td>Wings Level 2</td>
        <td class="text-center">50%</td>
        <td class="text-center">60% / 60%</td>
      </tr>
    </tbody>
  </table>
</div>

		 
		 <br />
		 
		 <!-- PARTY EXPERIENCE BONUS -->
		 <h2 class="unicial mb-3 text-white">Party Bonus Experience</h2>

<div class="table-responsive rounded-3 shadow overflow-hidden">
  <table class="table table-hover text-white align-middle mb-0">
    <thead class="bg-primary text-white text-center">
      <tr>
        <th rowspan="2" class="align-middle" style="width:30%;">Members</th>
        <th colspan="2">Experience Rate</th>
      </tr>
      <tr>
        <th class="text-center">Mismas Razas</th>
        <th class="text-center">Diferentes Razas</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>2 Players</td>
        <td class="text-center">EXP% + 10%</td>
        <td class="text-center">EXP% + 15%</td>
      </tr>
      <tr>
        <td>3 Players</td>
        <td class="text-center">EXP% + 30%</td>
        <td class="text-center">EXP% + 45%</td>
      </tr>
      <tr>
        <td>4 Players</td>
        <td class="text-center">EXP% + 40%</td>
        <td class="text-center">EXP% + 65%</td>
      </tr>
      <tr>
        <td>5 Players</td>
        <td class="text-center">EXP% + 40%</td>
        <td class="text-center">EXP% + 65%</td>
      </tr>
    </tbody>
  </table>
</div>

		 
		 <br />
		 
		 <!-- COMMANDS -->
		 <h2 class="unicial mb-3 text-white">Comandos</h2>

<div class="table-responsive rounded-3 shadow overflow-hidden">
  <table class="table table-hover text-white align-middle mb-0">
    <thead class="bg-primary text-white">
      <tr>
        <th style="width:30%;">Comando</th>
        <th>Descripción</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>/reset</td>
        <td>Resetea tu personaje.</td>
      </tr>
      <tr>
        <td>/pk</td>
        <td>Limpia el pk de tu personaje.</td>
      </tr>
      <tr>
        <td>/post</td>
        <td>Envía un mensaje global.</td>
      </tr>
      <tr>
        <td>/f [points]</td>
        <td>Agrega puntos en Fuerza.</td>
      </tr>
      <tr>
        <td>/a [points]</td>
        <td>Agrega puntos en Agilidad.</td>
      </tr>
      <tr>
        <td>/v [points]</td>
        <td>Agrega puntos en Vida.</td>
      </tr>
      <tr>
        <td>/e [points]</td>
        <td>Agrega puntos en Energía.</td>
      </tr>
      <tr>
        <td>/re [on/off/auto]</td>
        <td>Activa, desactiva o acepta solicitudes automáticamente.</td>
      </tr>
      <tr>
        <td>Resto de Comandos</td>
        <td>Ver en menú letra K del juego.</td>
      </tr>
    </tbody>
  </table>
</div>

		 
		 <br />
		 
		 <!-- VIDEO -->
		 <h2 class="unicial text-white">Video Presentacion</h2>
		 <iframe class="video-info" width="636" height="357" src="https://www.youtube.com/embed/UTPWDxVBhr4?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	 </div>
	</div>
	 