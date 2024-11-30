<!DOCTYPE html>
<html>
<head>
    <title>Update Post</title>
    <link rel="stylesheet" href="../styles/updatepost.css">
</head>
<body>
    <div id="login" align="left">
        <table>
            <tr>
                <td>
                    <fieldset>
                        <legend><h3>Update Post</h3></legend>
                        <div align="center">
                            <form action="../controller/updatepostcontrol.php" method="POST">
                                <table>
                                    <tr>
                                        <td><input type="number" id="post_id" placeholder="Enter Post ID"name="post_id" required></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><textarea name="updated_post_text" id="updated_post_text" rows="6" cols="50" placeholder="Enter Updated Post Text" required></textarea></td>
                                    </tr>
                                    
                                    <input type="hidden" name="post_id_hidden" id="post_id_hidden" value="<?php echo isset($post_id) ? $post_id : ''; ?>">
                                    <tr>
                                        <td colspan="3"><input type="submit" name="update_post" value="Update Post"></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </fieldset>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
