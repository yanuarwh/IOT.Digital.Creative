<div class="container">


	<div class="row mt-3" >
		<div class='col-md-6'>
			<h3>Water level list</h3>
			<ul class="list-group">
				<table class="table">
					<thead>
   						<tr>
     						
     						<th  width="3000">Time</th>
      						<th  width="3000">Water Level(%)</th>
      						
   						</tr>
 					</thead>
 				<table>
				<?php foreach($waterlevel as $wl) : ?>
  					

  					<table class="table"  >
  						<tbody>
    							<tr>
      							
      							<th width="5000"> <?= $wl['time'] ?></th>
      							<th width="7000"> <?= $wl['Water_level'] ?> </th>
      						

    							</tr>
     					</tbody>
					</table>





  				<?php  endforeach; ?>
 
			</ul>

		</div>
	</div>
	
</div>