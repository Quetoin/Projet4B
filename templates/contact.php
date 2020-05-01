<?php $this->title="Contact";?>
        
<h1 class="titresWhite">Formulaire de contact</h1>

  <div id="mainDivContact" class="mainDiv">
    <form action="index.php?action=messageSent" method="post">
        
        <div>
          <label for="nom">Nom</label><br />
          <input type="text" id="nom" name="nom" required />
        </div>

        <div>
          <label for="prenom">Prénom</label><br />
          <input type="text" id="prenom" name="prenom" required/>
        </div>

        <div>
          <label for="email">Votre adresse mail</label><br />
          <input type="email" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required size="30" />
        </div>

        <div>
          <label for="content">Message</label><br />
          <textarea id="content" name="content"></textarea>
        </div>

        <div>
          <input type="submit" />
        </div>
        
      </form>
    </div>