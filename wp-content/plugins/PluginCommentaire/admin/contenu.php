<?php
    global $wpdb;
    $query = "SELECT * FROM {$wpdb->prefix}comments";
    $liste_commentaires = $wpdb->get_results($query,ARRAY_A);
    if(empty($liste_commentaires)){
        $liste_commentaires = array();
    }
?> 

<?php
    echo "<h1 class='wp-heading-inline'>".get_admin_page_title()."</h1>";
?> 
<div class="wrap">
    <a class="page-title-action">Ajouter nouvelle</a>
    <br><br><br>

    <table class="wp-list-table widefat fixed striped pages">
        <thead>
            <th>Commentaires</th>   
            <th>Utilisateur</th>    
            <th>Email</th>  
            <th>Date et Heure</th>              
        </thead>
        <tbody id="the-list">
            <?php
                foreach ($liste_commentaires as $key => $value){
                    $comentaire = $value['comment_content'];
                    $user = $value['comment_author'];
                    $email = $value['comment_author_email'];
                    $date = $value['comment_date'];
                    echo "
                        <tr>
                            <td>$comentaire</td>
                            <td>$user</td>
                            <td>$email</td>
                            <td>$date</td>
                            <td>
                                <a class='page-title-action'>Editer</a>
                                <a class='page-title-action'>Effacer</a>
                            </td>
                        </tr>
                    ";
                }
            ?> 
        </tbody>
    </table>
</div>