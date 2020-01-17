<?php
include ('a-session.php');

$un = $_SESSION['adusername'];

echo "
<div class='media'><a href='#' class='pull-left'></a>
                                        <div class='media-body'>
                                            <p><table class='popovertext'>
                                            <tr><td>Admin Name:  " . $un . "</td></tr>                                         
                                            </table>
                                            <a role='button' class='btn btn-warning btn-sm' href='a-logout.php'>Logout</a>                                          
                                        </div>
                                    </div>";
?>