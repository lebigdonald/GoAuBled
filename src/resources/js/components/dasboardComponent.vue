<template>
    <div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="index.html" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li><a href="charts.html" class=""><i class="lnr lnr-envelope"></i> <span>Messagerie</span></a></li>
						<li>
							<a href="#expeditions" data-toggle="collapse" class="collapsed"><i class="lnr lnr-exit"></i> <span>Mes Expeditions</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="expeditions" class="collapse ">
								<ul class="nav">
									<li><a href="mesExpeditionEnCours.html" class="">Mes expéditions en cours</a></li>
									<li><a href="mesExpeditionEffectuer.html" class="">Mes expéditions effectuées</a></li>
									<li><a href="mesAnnoncesExpedition.html" class="">Mes annonces en cours</a></li>
									<li><a href="page-lockscreen.html" class="">Vue sur les dépenses</a></li>
									<li><a href="page-lockscreen.html" class="">Expédier un colis</a></li>
								</ul>
							</div>
						</li>
						<li>
							<a href="#trajets" data-toggle="collapse" class="collapsed"><i class="lnr lnr-location"></i> <span>Mes Trajets</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="trajets" class="collapse ">
								<ul class="nav">
									<li><a href="page-profile.html" class="">Mes Trajets en cours</a></li>
									<li><a href="page-login.html" class="">Nombre de Trajets effectués</a></li>
									<li><a href="page-lockscreen.html" class="">Mes annonces en cours</a></li>
									<li><a href="page-lockscreen.html" class="">Vue sur les gains</a></li>
									<li><a href="page-lockscreen.html" class="">Ajouter un Trajet</a></li>
								</ul>
							</div>
						</li>
					</ul>
				</nav>
			</div>
		</div>
</template>
<script>
    export default {
        props: ['user'],
        data: function () {
            return {

            }
        },
        mounted: function() {
            
        }


    }

</script>