<?php
foreach($users as $key=>$value){
	
	?>
		<div class="user_entry">
			<div><i class="fa fa-user"></i><?=$value['name']?></div>
			<?php if (isset($request['emailenable'])): ?>
			<div><i class="fa fa-envelope"></i><?=$value['email']?></div>
			<?php endif; ?>
			<?php if (isset($request['phone'])): ?>			
			<div><i class="fa fa-phone"></i><?=$value['phone']?></div>
			<?php endif; ?>
			<?php if (isset($request['birthenable'])): ?>			
			<div><i class="fa fa-birthday-cake"></i><?=$value['birthdate']?></div>
			<?php endif; ?>
			<?php if (isset($request['address'])): ?>			
			<div><i class="fa fa-home"></i><?=$value['address']?></div>
			<?php endif; ?>			
			<div><i class="fa fa-quote-right"></i><?=$value['profile']?></div>
		</div>
	<?php
}
?>