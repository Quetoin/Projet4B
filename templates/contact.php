<?php $this->title="Contact";?>
        
<h1 class="titresWhite">Formulaire de contact</h1>

  <div id="mainDivContact" class="mainDiv">
    <form action="index.php?action=messageSent" method="post">
      <h2 class="titresWhite">Contactez-moi</h2>
        
        <div class="row rowMobile">
          <div class="col">
            <label for="nom">Nom :</label><br />
            <input type="text" id="nom" name="nom" required placeholder="Nom"/>
          </div>

          <div class="col">
            <label for="prenom">Prénom :</label><br />
            <input type="text" id="prenom" name="prenom" placeholder="Prénom" required/>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <label for="email">Votre adresse mail :</label><br />
            <input type="email" id="email" name="email" placeholder="Adresse mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required size="30" />
          </div>
        </div>

        <div class="row">
          <div class="col">
            <label for="objet">Objet du message (- de 255 caractères) :</label>
            <input type="text" id="objet" name="objet" placeholder="Objet">
          </div>
        </div>

        <div class="row">
          <div class="col">
            <label for="content">Message :</label><br />
            <textarea id="content" name="content" placeholder="Votre message ici"></textarea>
          </div>
        </div>

        <div>
          <input type="submit" />
        </div>
        
      </form>
    </div>