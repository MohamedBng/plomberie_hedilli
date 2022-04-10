	<footer>
		<div id="Contact">
			<p class="title">Contactez-nous</p>
			<div class="underlignText"></div>
			<p id="num">0766558594</p>
		</div>
		<form id="formulaireMail" method="POST" onsubmit="return erreur();">
			<div id="AllTheForm">
				<div id="mailPrenomNom">
					<input id="nom" type="text" name="nom" placeholder=" Nom" required>
					<input id="mail" type="email" name="mail" placeholder=" Mail" required>
					<input id="confirmationMail" type="email" name="confirmationMail" placeholder="Confirmation Mail" required>
					<input id="ville" type="text" name="ville" placeholder=" Ville" required>
					<input id="telephone" type="text" name="telephone" placeholder=" Telephone" required >
					<input id="sujet" type="text" name="sujet" placeholder=" Sujet" required>
				</div>
				<div id="textarea">
					
					<textarea required id="contenu" name="message" placeholder= " Détaillez votre problème"></textarea>
				</div>
		    </div>
			<div id="boutonform">
				<button type="submit">Envoyer</button>
			</div>
	    </form>
	    <div id="footer">
	    	<p>Mentions légale</p>
	    	<p>Crédits photos</p>
	    	<div class="underlignFooter"></div>
	    	<div id="logoFooter">
	    		<img src="image/logo_small.png">
	    	</div>
	    </div>
	</footer>
	
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
		<script src="js/aos.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

	</body>
</html>