<?php

namespace App\lang;

class elyon{

	public static function lang($attribut = null){
		return [
			'fr' => [
			    'success-store-activation'      => "Activation enregistré comme avoir.",
			    'error-login'                   => "Désolé, Vous n'etes pas autorisé a avoir acces cette plateforme.",
			    'error-login'                   => "Mot de passe ou Email incorrect.",
			    'success-reset'                 => "Un message a été envoyé a votre adresse mail. Veuillez le consulter pour continuer le processus.",
			    'error-reset'                   => "Email invalide! Veuillez réessayer.",
			    'success-register'              => "Votre compte a été enrégistré avec succès. Veuillez contacter un administrateur pour l'actvation pour pouvoir accés à la plateforme.",
			    'success-change-password'       => "Mot de passe modifier avec succés.",
			    'error-change-password'         => "Mot de passe incorrect.",
			    'success-logout'                => "Déconnecter avec succés",
			    
			    'success-store-feminin'         => "$attribut enregistrée avec succes.",
			    'success-update-feminin'        => "$attribut modifiée avec succes.",
			    'success-delete-feminin'        => "$attribut supprimée avec succes.",

			    'success-store-masculin'        => "$attribut enregistré avec succes.",
			    'success-update-masculin'       => "$attribut modifié avec succes.",
			    'success-delete-masculin'       => "$attribut supprimé avec succes.",

			    'success-edit-profile-user'     => "Profile Modifier acec succés.",
			    'success-delete-profile-user'   => "Compte supprimé.",
			],

			'en' => [
			    'success-store-activation'      => "Activation enregistré comme avoir.",
			    'error-login'                   => "Désolé, Vous n'etes pas autorisé a avoir acces cette plateforme.",
			    'error-login'                   => "Mot de passe ou Email incorrect.",
			    'success-reset'                 => "Un message a été envoyé a votre adresse mail. Veuillez le consulter pour continuer le processus.",
			    'error-reset'                   => "Email invalide! Veuillez réessayer.",
			    'success-register'              => "Votre compte a été enrégistré avec succès. Veuillez contacter un administrateur pour l'actvation pour pouvoir accés à la plateforme.",
			    'success-change-password'       => "Mot de passe modifier avec succés.",
			    'error-change-password'         => "Mot de passe incorrect.",
			    'success-logout'                => "Déconnecter avec succés",
			    
			    'success-store-feminin'         => "$attribut enregistrée avec succes.",
			    'success-update-feminin'        => "$attribut modifiée avec succes.",
			    'success-delete-feminin'        => "$attribut supprimée avec succes.",

			    'success-store-masculin'        => "$attribut enregistré avec succes.",
			    'success-update-masculin'       => "$attribut modifié avec succes.",
			    'success-delete-masculin'       => "$attribut supprimé avec succes.",

			    'success-edit-profile-user'     => "Profile Modifier acec succés.",
			    'success-delete-profile-user'   => "Compte supprimé.",
			],
		];
	} 

}

?>