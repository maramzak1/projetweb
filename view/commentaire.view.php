<?php
include "../controller/commenteire.controller.php";
 $objet=new  commentairecontroller ();
 $tab=$objet ->listCommentaire ();
  
?>

<center>
    <h1>List of comments</h1>

</center>




<table border="1" align="center" width="70%">
    <tr>
        <th>comment_id</th>
        <th>comment_text</th>
        <th>author</th>
        <th>created_a</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>


        <tr>

        </tr>





</table>
<?php
foreach($tab as $j){
?>
<tr>
    <td> <?php echo j['comment_id'] ?> </td> 
    <td> <?php echo j['comment_text'] ?> </td>
    <td> <?php echo j['author'] ?> </td>
    <td> <?php echo j['created_at'] ?> </td>
    
</tr>
<?php
}
 
?>