<?php
include "../controller/post.controller.php";
 $objet=new  postcontroller ();
 $tab=$objet ->listpost ();
  
?>

<center>
    <h1>List of posts</h1>

</center>




<table border="1" align="center" width="70%">
    <tr>
        <th>post_id</th>
        <th>title</th>
        <th>content</th>
        <th>topic</th>
        <th>date</th>
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
    <td> <?php echo j['post_id'] ?> </td> 
    <td> <?php echo j['title'] ?> </td>
    <td> <?php echo j['content'] ?> </td>
    <td> <?php echo j['date'] ?> </td>
    
</tr>
<?php
}
 
?>