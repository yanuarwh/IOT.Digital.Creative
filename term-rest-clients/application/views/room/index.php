


<div class="container">


	<div class="row mt-3" >
		<div class='col-md-6'>
			<h3>Room List</h3>
			<ul class="list-group">
				<table class="table">
					<thead>
   						<tr>
     						
     						<th  width="3000">Room</th>
      						<th  width="3000">Temperature(C)</th>
      						<th  width="3000">Humidity(%)</th>
      						<th  width="3000">Last updated</th>
   						</tr>
 					</thead>
 				<table>
				<?php foreach($rooms as $rm) : ?>
  					

  					<table class="table"  >
  						<tbody>
    							<tr>
      							
      							<th width="5000"> <?= $rm['id'] ?></th>
      							<th width="7000"> <?= $rm['temperature'] ?> </th>
      							<th width="5000" > <?= $rm['humidity'] ?></th>
      							<th width="4000"> <?= $rm['Last-Updated'] ?></th>

    							</tr>
     					</tbody>
					</table>





  				<?php  endforeach; ?>
 
			</ul>

		</div>
	</div>
	
</div>