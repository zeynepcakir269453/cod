<!DOCTYPE html>
<html>
<head>
    <title>Üye Girişi</title>
</head>

<body>
<form method="post">
    <table width="600" align="center" border="1" cellspacing="5" cellpadding="5">
        <tr>
            <td colspan="2"><?php echo @$error; ?></td>
        </tr>
        <tr>
            <td>Kullanıcı Adı </td>
            <td><input type="text" name="name"/></td>
        </tr>

        <tr>
            <td width="230">Kullanıcı Şifre</td>
            <td width="329"><input type="password" name="password"/></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <button type="submit" name="submit" value="1" class="btn btn-primary">Submit</button>
        </tr>
    </table>

</form>
</body>
</html>
