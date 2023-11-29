<?php

include '../controller/ticketC.php';
include '../model/ticket.php';
$error = "";
$ticket = null;
$ticketC = new ticketC();
if (
    isset($_POST["date"]) &&
    isset($_POST["prix"])&&
    isset($_POST["date_limite"])&&
    isset($_POST["quantite"])&&
    isset($_POST["heure"])&&
    isset($_POST["lieu"]) 
   
) {
    if (
        !empty($_POST['date']) &&
        !empty($_POST["prix"])&&
        !empty($_POST["date_limite"])&&
        !empty($_POST["quantite"])&&
        !empty($_POST["heure"])&&
        !empty($_POST["lieu"]) 
    ) 
        {
          foreach ($_POST as $key => $value) 
          {
              echo "Key: $key, Value: $value<br>";
          }
          $ticket = new ticket(
              null,
            $_POST['date'],
            $_POST['prix'],
            $_POST['date_limite'],
            $_POST['quantite'],
            $_POST['heure'],
            $_POST['lieu']
          );
          var_dump($ticket);
          
          $ticketC->updateticket($ticket, $_POST['id_ticket']);
  
          header('Location:afficheticket.php');
      } 
      else
          $error = "Missing information";
  
}

?>

<html>
  
  

                <?php
                if (isset($_POST['id_ticket'])) {
                  $ticket = $ticketC->showticket($_POST['id_ticket']);
                    if ($ticket) { // Check if $concert is not null
                ?>
                        <form action="" method="POST">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="id_ticket">ID</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="basic-default-id" name="id_ticket" value="<?php echo $ticket['id_ticket']; ?>" readonly />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="date">date</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="basic-default-name" name="date" value="<?php echo $ticket['date']; ?>" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="prix">prix</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="basic-default-name" name="prix" value="<?php echo $ticket['prix']; ?>" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="datelimite">datelimite</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="basic-default-name" name="datelimite" value="<?php echo $ticket['date_limite']; ?>" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="quantite">quantite</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="basic-default-name" name="quantite" value="<?php echo $ticket['quantite']; ?>" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="heure">heure</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="basic-default-name" name="heure" value="<?php echo $ticket['heure']; ?>" />
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="lieu">lieu</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="basic-default-name" name="lieu" value="<?php echo $ticket['lieu']; ?>" />
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary" name="update_ticket">Update</button>
                                </div>
                            </div>
                           
                        </form>

                        <?php
                        // Handle form submission
                        if (isset($_POST['update_ticket'])) {
                            // Check if the expected keys exist in $_POST before using them
                            $id_ticket = isset($_POST['id_ticket']) ? $_POST['id_ticket'] : '';
                            $date = isset($_POST["date"]) ? $_POST['date']: '';
                           
                             $prix=isset($_POST["prix"])?$_POST["prix"]:'';
                             $date_limite=isset($_POST["date_limite"])?$_POST["date_limite"]: '';
                             $quantite=isset($_POST["quantite"])?$_POST["quantite"]: '';
                             $heure=isset($_POST["heure"])?$_POST["heure"]: '';
                             $lieu=isset($_POST["lieu"])?$_POST["lieu"]: ''; 
                            

                            // Create a concert object
                            $updatedticket = new ticket($id_ticket, $date,$prix,$date_limite,$quantite,$heure,$lieu);

                            // Update the concert in the database
                            $ticketC->updateticket($updatedticket, $id_ticket);

                            // Redirect to the desired location after updating
                            header('Location: afficheticket.php');
                        }
                        ?>

                <?php
                    } else {
                        echo "ticket not found"; // Handle the case where the concert is not found
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
            </body>
            </html>







