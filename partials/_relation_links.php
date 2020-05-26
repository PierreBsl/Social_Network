<?php if(relation_link_to_display($_GET['id']) == CANCEL_RELATION_LINK): ?>
	
	Demande d'amitié déjà envoyée. 
		<a class="btn btn-primary pull-right" href="delete_friend.php?id=<?=$_GET['id'] ?>"><i class="far fa-times-hexagon"></i>Annuler la demande</a>

	<?php elseif(relation_link_to_display($_GET['id']) == ACCEPT_REJECT_RELATION_LINK): ?> 
		
		<a class="btn btn-info pull-right" href="accept_friend_request.php?id=<?=$_GET['id'] ?>">
			<i class="fas fa-user-check"></i> Accepter</a>
			
		<a class="btn btn-danger pull-right" href="delete_friend.php?id=<?=$_GET['id'] ?>">
			<i class="fas fa-user-times"></i> Refuser</a>

	<?php elseif(relation_link_to_display($_GET['id']) == DELETE_RELATION_LINK): ?> 
		
		<a class="btn btn-primary pull-right" href="delete_friend.php?id=<?=$_GET['id'] ?>" class="btn btn-primary pull-right">
			<i class="fas fa-user-minus"></i> Retirer de ma liste d'amis</a>

	<?php elseif(relation_link_to_display($_GET['id']) == ADD_RELATION_LINK): ?>
		
		<a class="btn btn-primary pull-right" href="add_friend.php?id=<?=$_GET['id'] ?>" class="btn btn-primary pull-right">
			<i class="fas fa-user-plus"></i> Ajouter comme ami</a>

	<?php endif; ?>